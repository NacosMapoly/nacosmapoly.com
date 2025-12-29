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
		$past_question_id=trim($_POST['past_question_id']);
		$exam_session=trim($_POST['exam_session']);
		$level_id=trim($_POST['level_id']);
		$semester_id=trim($_POST['semester_id']);
        $course_code = str_replace(' ', '', trim(strtoupper($_POST['course_code'])));
		$course_title =str_replace("'", "\'", ucwords(strtolower($_POST['course_title'])));
		$course_unit=trim($_POST['course_unit']);
        $thumbnail=$_FILES['thumbnail']['name'];
        $exam_material = $_FILES["exam_material"];
		$status_id=trim($_POST['status_id']);
			

		if (empty($past_question_id)){
			$response = [
				'response'=> 400,
				'success'=> false,
				'message'=> 'PAST QUESTION ID REQUIRED! Fill in past question ID and try again.'
			];
			goto end;
		}	
		if (empty($exam_session)){
			$response = [
				'response'=> 400,
				'success'=> false,
				'message'=> 'EXAM SESSION REQUIRED! Fill in exam session and try again.'
			];
			goto end;
		}		
	

		if (empty($level_id)){
			$response = [
				'response'=> 400,
				'success'=> false,
				'message'=> 'LEVEL ID REQUIRED! Fill in level ID and try again.'
			];
			goto end;
		}
        if (empty($semester_id)){
			$response = [
				'response'=> 400,
				'success'=> false,
				'message'=> 'SEMESTER ID REQUIRED! Fill in semester ID and try again.'
			];
			goto end;
		}
		if (empty($course_code)){
			$response = [
				'response'=> 400,
				'success'=> false,
				'message'=> 'COURSE CODE REQUIRED! Fill in course code and try again.'
			];
			goto end;
		}
        if (empty($course_title)){
			$response = [
				'response'=> 400,
				'success'=> false,
				'message'=> 'COURSE TITLE REQUIRED! Fill in course title and try again.'
			];
			goto end;
		}
		if (empty($course_unit)){
			$response = [
				'response'=> 400,
				'success'=> false,
				'message'=> 'COURSE UNIT REQUIRED! Fill in course unit and try again.'
			];
			goto end;
		}
		if (!is_numeric($course_unit)) {
			$response = [
				'response'=> 400,
				'success'=> false,
				'message'=> 'COURSE UNIT ERROR! Course unit only accept numeric value.'
			];
			goto end;
		}
		if (empty($status_id)){
			$response = [
				'response'=> 400,
				'success'=> false,
				'message'=> 'STATUS ID REQUIRED! Select the status ID and try again.'
			];
			goto end;
		}

		$course_unit = intval($course_unit);

		$query=mysqli_query($conn,"SELECT course_code FROM past_question_tab WHERE course_code='$course_code' AND exam_session='$exam_session' AND past_question_id!='$past_question_id'")or die (mysqli_error($conn));
		$checkCount=mysqli_num_rows($query);

		if ($checkCount>0){
			$response = [
				'response'=> 400,
				'success'=> false,
				'message'=> "COURSE CODE EXIST! Course code already registered, try again"
			]; 
			goto end;	
		}

		if ($thumbnail){
			$allowedExts = array("jpg", "jpeg", "JPEG", "JPG", "gif", "png","PNG","GIF","webp","WEBP");
			$extension = pathinfo($_FILES['thumbnail']['name'], PATHINFO_EXTENSION);
			
			if (!in_array(($extension), $allowedExts)) {
				$response = [
					'response' => 400,
					'success' => false,
					'message' => 'INVALID PICTURE FORMAT! Check the picture format and try again.'
				];  
				goto end;
			}
		}
		
		if (!empty($exam_material)){
			$fileName = basename($exam_material["name"]);
			$uploadMaterialPath = $pastQuestionExamMaterialPath.$fileName;
			$fileType = strtolower(pathinfo($uploadMaterialPath, PATHINFO_EXTENSION));
			if ($fileType != "pdf") {
				$response = [
					'response' => 400,
					'success' => false,
					'message' => 'FILE TYPE ERROR! Only PDF files are allowed and try again.'
				];  
				goto end;
			}
		}

		$s_array = $callclass->_get_past_question_details($conn, $past_question_id);
		$fetch = json_decode($s_array, true);
		$db_thumbnail = $fetch[0]['thumbnail'];
		$db_material = $fetch[0]['material'];

		$datetime = date("Ymdhi");

		if (!empty($thumbnail)){
			unlink($pastQuestionPixPath . $db_thumbnail);
			
			$new_thumbnail = $course_code . '_' . $datetime . '_' . $thumbnail; // Use original file name

			if (!move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $pastQuestionPixPath . $new_thumbnail)) {
				$response = [
					'response' => 400,
					'success' => false,
					'message' => 'PICTURE UPLOAD ERROR! Contact your Engineer For Help'
				];  
				goto end;
			}
		}else{
			$new_thumbnail = $db_thumbnail;
		}

		if (!empty($exam_material)){
			unlink($pastQuestionExamMaterialPath . $db_material);
			
			$e_sesstion= str_replace(" / ", "-", $exam_session);
			$new_material = $course_code . '_' . $e_sesstion . '_Session_' . $datetime . '_' . $fileName;

			if (!move_uploaded_file($exam_material["tmp_name"], $pastQuestionExamMaterialPath . $new_material)) {
				$response = [
					'response' => 400,
					'success' => false,
					'message' => 'MATERIAL UPLOAD ERROR! Sorry, there was an error uploading your file, check and try again.'
				];  
				goto end;
			} 
		}else{
			$new_material = $db_material;
		}
		
		mysqli_query($conn, "UPDATE past_question_tab SET exam_session='$exam_session',
		level_id='$level_id', semester_id='$semester_id', course_code='$course_code', course_title='$course_title', course_unit='$course_unit', 
		thumbnail='$new_thumbnail', material='$new_material', status_id='$status_id', updated_by='$login_staff_id', updated_at=NOW()
		WHERE past_question_id='$past_question_id'") or die(mysqli_error($conn));

		$response = [
			'response'=> 200,
			'success'=> true,
			'message'=> "SUCCESS! Past Question Update Successful!",
		]; 
		/////////// get alert//////////////////////////////////
		$alert_detail="Success Alert: A Past Question was updated successfully by  $login_staff_fullname. DETAILS: ID: $past_question_id, COURSE CODE: $course_code, COURSE TITLE: $course_title";
		$callclass->_alert_sequence_and_update($conn,$login_staff_id,$login_staff_fullname,$login_role_id,$alert_detail,$ip_address,$system_name);

		
end:
echo json_encode($response);
?>