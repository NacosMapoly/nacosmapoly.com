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
		if (empty($level_id)) {
			$response = [
				'response'=> 400,
				'success'=> false,
				'message'=> 'LEVEL ID REQUIRED! Fill in level ID and try again.'
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
			if (empty($thumbnail)){
				$response = [
					'response'=> 400,
					'success'=> false,
					'message'=> 'COURSE PICTURE REQUIRED! Select course picture and try again.'
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

		$title_check=mysqli_query($conn,"SELECT course_study_title FROM publish_tab WHERE course_study_title='$course_study_title' AND page_category_id='$page_category_id'");
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

			//////////////geting sequence//////////////////////////
			$datetime = date("Ymdhis");
			$sequence=$callclass->_get_sequence_count($conn, 'COUR');
			$array = json_decode($sequence, true);
			$no= $array[0]['no'];
			/// Generate Course ID ///////
			$publish_id='COUR'.$no.$datetime;

			if ($level_id > 2){
				$allowedExts = array("jpg", "jpeg", "JPEG", "JPG", "gif", "png","PNG","GIF","webp","WEBP");
				$extension = pathinfo($_FILES['thumbnail']['name'], PATHINFO_EXTENSION);
				if (!in_array(($extension), $allowedExts)) {
					$response = [
						'response' => 106,
						'success' => false,
						'message' => 'INVALID PICTURE FORMAT! Check the picture format and try again.'
					];  
					goto end;
				}
				$thumbnail = $publish_id . '_' . $datetime . '_' . $thumbnail;
				$uploadPath = $courseContentPixPath . $thumbnail;
				if (!move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $uploadPath)) {
					$response = [
						'response' => 107,
						'success' => false,
						'message' => 'PICTURE UPLOAD ERROR! Contact your Engineer For Help'
					];  
					goto end;
				}
					/// Insert Into Course Tab///////
				mysqli_query($conn,"INSERT INTO `publish_tab`
				(`academics_session`, `page_category_id`, `publish_id`, `course_level_id`, `course_study_title`, `reg_pix`, `status_id`, `modified_by`, `created_time`, `updated_time`) VALUES  
				('$current_academics_session', '$page_category_id', '$publish_id', '$level_id', '$course_study_title', '$thumbnail', '$status_id', '$login_staff_id', NOW(), NOW())")or die (mysqli_error($conn));
			}else{
				/// Insert Into Course Tab///////
				mysqli_query($conn,"INSERT INTO `publish_tab`
				(`academics_session`, `page_category_id`, `publish_id`, `course_level_id`, `course_content`, `status_id`, `modified_by`, `created_time`, `updated_time`) VALUES  
				('$current_academics_session', '$page_category_id', '$publish_id', '$level_id', '$course_content', '$status_id', '$login_staff_id', NOW(), NOW())")or die (mysqli_error($conn));
			}
							
			$response = [
				'response'=> 200,
				'success'=> true,
				'message'=> "SUCCESS! Course Registration Successful!",
			]; 
			/////////// get alert//////////////////////////////////
			$alert_detail="Success Alert: A Course Content was created successfully by  $login_staff_fullname. DETAILS: ID: $publish_id";
			$callclass->_alert_sequence_and_update($conn,$login_staff_id,$login_staff_fullname,$login_role_id,$alert_detail,$ip_address,$system_name);
	
		
end:
echo json_encode($response);
?>