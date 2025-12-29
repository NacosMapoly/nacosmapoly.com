<?php require_once '../../config/connection.php';?>
<?php require_once '../../config/admin-session-check.php';?>
<?php
///// check for API security
if ($apiKey!=$expected_api_key){
	$response = [
        'response'=> 98,
        'success'=> false,
        'message'=> 'SECURITY ACCESS DENIED! You are not allowed to execute this command due to a security breach.'
    ]; 
	goto end;
} 
	if($check==0){ 
		$response = [
			'response'=> 99,
			'success'=> false,
			'message'=> 'SESSION EXPIRED! Please LogIn Again.'
		];  
		goto end;
	}
		/////////////// Variable Declaration/////////////////
		$page_category_id=trim(strtolower($_POST['page_category_id']));
		$publish_id=trim(strtoupper($_POST['publish_id']));
		$level_id=trim($_POST['level_id']);
		$course_study_title = trim($_POST['course_study_title']);
		$thumbnail=$_FILES['thumbnail']['name'];
		$course_content = mysqli_real_escape_string($conn, $_POST['course_content']);
		$status_id=trim($_POST['status_id']);
		

		if (empty($page_category_id)){
			$response = [
				'response'=> 400,
				'success'=> false,
				'message'=> 'PAGE CATEGORY ID REQUIRED! Check page category ID and try again.'
			];
			goto end;
		}
		if (empty($publish_id)){
			$response = [
				'response'=> 400,
				'success'=> false,
				'message'=> 'PUBLISH ID REQUIRED! Fill in publish ID and try again.'
			];
			goto end;
		}	
		if ($level_id > 2){
			if (empty($course_study_title)){
				$response = [
					'response'=> 400,
					'success'=> false,
					'message'=> 'COURSE STUDY TITLE REQUIRED! Fill in course ID and try again.'
				];
				goto end;
			}
			
		}else{
			if (empty($course_content)){
				$response = [
					'response'=> 400,
					'success'=> false,
					'message'=> 'COURSE CONTENT REQUIRED! Fill in course content and try again.'
				];
				goto end;
			}
		}
		if (empty($status_id)){
			$response = [
				'response'=> 400,
				'success'=> false,
				'message'=> 'STATUS REQUIRED! Select the status and try again.'
			];
			goto end;
		}
	

		$title_check=mysqli_query($conn,"SELECT course_study_title FROM publish_tab WHERE course_study_title='$course_study_title' AND course_level_id='$level_id' AND publish_id!='$publish_id'");
		$checkCount=mysqli_num_rows($title_check);
		if ($checkCount>0){ 
			$response = [
				'response' => 400,
				'success' => false,
				'message'=> "COURSE CONTENT ALREADY EXIT! Kindly, check and try again"
			]; 

			$alert_detail="COURSE REGISTRATION FAILED: Course with title $course_study_title can not be registered as its already exist. By ADMIN: $login_staff_fullname";	
			$callclass->_alert_sequence_and_update($conn,$login_staff_id,$login_staff_fullname,$login_role_id,$alert_detail,$ip_address,$system_name);
			goto end;
		}

		$getDetail=$callclass->_get_setup_backend_settings_detail($conn, 'BK_ID001');
		$array = json_decode($getDetail, true);
		$current_academics_session= $array[0]['current_academics_session'];

		if ($level_id > 2){
			$getDetails = $callclass->_get_publish_detail($conn, $publish_id);
			$array = json_decode($getDetails, true);
			$db_thumbnail = $array[0]['reg_pix'];
			$datetime = date("Ymdhi");
			if (!empty($thumbnail)){
				unlink($courseContentPixPath . $db_thumbnail);
				$new_thumbnail = $publish_id . '_' . $datetime . '_' . $thumbnail;
				if (!move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $courseContentPixPath . $new_thumbnail)) {
					$response = [
						'response' => 107,
						'success' => false,
						'message' => 'PICTURE UPLOAD ERROR! Contact your Engineer For Help',
						
					];  
					goto end;
				}
			}else{
				$new_thumbnail = $db_thumbnail;
			}
				/// update course_content_tab///////
				mysqli_query($conn,"UPDATE publish_tab SET 
				academics_session='$current_academics_session', page_category_id='$page_category_id', publish_id='$publish_id',  course_level_id='$level_id', course_study_title='$course_study_title', reg_pix='$new_thumbnail', status_id='$status_id', modified_by='$login_staff_id', updated_time=NOW() WHERE publish_id='$publish_id'")or die (mysqli_error($conn));
		}else{
					/// update course_content_tab///////
				mysqli_query($conn,"UPDATE publish_tab SET 
				academics_session='$current_academics_session', page_category_id='$page_category_id', publish_id='$publish_id',  course_level_id='$level_id', course_content='$course_content', status_id='$status_id', modified_by='$login_staff_id', updated_time=NOW() WHERE publish_id='$publish_id'")or die (mysqli_error($conn));
		}
			$response = [
				'response'=> 200,
				'success'=> true,
				'message'=> "SUCCESS! Course Updated Successful!",
			]; 
			/////////// get alert//////////////////////////////////
			$alert_detail="Success Alert: A Course Content was updated successfully by  $login_staff_fullname. DETAILS: ID: $course_content_id, COURSE STUDY: $course_study_title";
			$callclass->_alert_sequence_and_update($conn,$login_staff_id,$login_staff_fullname,$login_role_id,$alert_detail,$ip_address,$system_name);
end:
echo json_encode($response);
?>