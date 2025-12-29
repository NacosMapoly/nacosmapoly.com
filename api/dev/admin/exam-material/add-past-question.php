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
		$exam_session=trim($_POST['exam_session']);
		$level_id=trim($_POST['level_id']);
		$semester_id=trim($_POST['semester_id']);
        $course_code = str_replace(' ', '',trim(strtoupper($_POST['course_code'])));
		$course_title =str_replace("'", "\'", ucwords(strtolower($_POST['course_title'])));
		$course_unit=trim($_POST['course_unit']);
        $thumbnail=$_FILES['thumbnail']['name'];
        $exam_material = $_FILES["exam_material"];
		$status_id=trim($_POST['status_id']);
			

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
        if (empty($thumbnail)){
			$response = [
				'response'=> 400,
				'success'=> false,
				'message'=> 'EXAM PICTURE REQUIRED! Choose exam picture and try again.'
			];
			goto end;
		}
		if (empty($exam_material)){
			$response = [
				'response'=> 400,
				'success'=> false,
				'message'=> 'EXAM NATERIAL REQUIRED! Upload exam material and try again.'
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

		$query=mysqli_query($conn,"SELECT course_code FROM past_question_tab WHERE course_code='$course_code' AND exam_session='$exam_session'")or die (mysqli_error($conn));
		$checkCount=mysqli_num_rows($query);

		if ($checkCount>0){
			$response = [
				'response'=> 400,
				'success'=> false,
				'message'=> "COURSE CODE EXIST! Course code already registered, try again"
			]; 
			goto end;	
		}
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
		//////////////geting sequence//////////////////////////
		$sequence=$callclass->_get_sequence_count($conn, 'PQ');
		$array = json_decode($sequence, true);
		$no= $array[0]['no'];
		/// Generate PQ ID ///////
		$datetime = date("Ymdhis");
		$past_question_id='PQ'.$no.$datetime;

		$thumbnail = $course_code . '_' . $datetime . '_' . $thumbnail;
		if (!move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $pastQuestionPixPath . $thumbnail)) {
			$response = [
				'response' => 400,
				'success' => false,
				'message' => 'PICTURE UPLOAD ERROR! Contact your Engineer For Help'
			];  
			goto end;
		}

		$e_sesstion= str_replace(" / ", "-", $exam_session);
		$material = $course_code . '_' . $e_sesstion . '_Session_' . $datetime . '_' . $fileName;
		if (!move_uploaded_file($exam_material["tmp_name"], $pastQuestionExamMaterialPath . $material)) {
			$response = [
				'response' => 400,
				'success' => false,
				'message' => 'MATERIAL UPLOAD ERROR! Sorry, there was an error uploading your file, check and try again.'
			];  
			goto end;
		} 
		/// Insert Into past_question_tab///////
		mysqli_query($conn,"INSERT INTO `past_question_tab`
		(`past_question_id`, `exam_session`, `level_id`, `semester_id`, `course_code`, `course_title`, `course_unit`, `thumbnail`, `material`, `status_id`, `created_by`, `created_at`) VALUES
		('$past_question_id', '$exam_session', '$level_id', '$semester_id', '$course_code', '$course_title', '$course_unit', '$thumbnail', '$material','$status_id', '$login_staff_id', NOW())")or die (mysqli_error($conn));

		$response = [
			'response'=> 200,
			'success'=> true,
			'message'=> "SUCCESS! Past Question Registration Successful!",
		]; 
		/////////// get alert//////////////////////////////////
		$alert_detail="Success Alert: A Past Question was created successfully by  $login_staff_fullname. DETAILS: ID: $past_question_id, COURSE CODE: $course_code, COURSE TITLE: $course_title";
		$callclass->_alert_sequence_and_update($conn,$login_staff_id,$login_staff_fullname,$login_role_id,$alert_detail,$ip_address,$system_name);

		
end:
echo json_encode($response);
?>