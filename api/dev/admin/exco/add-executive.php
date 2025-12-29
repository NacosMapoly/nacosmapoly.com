	<?php require_once '../../config/connection.php'; ?>
	<?php require_once '../../config/admin-session-check.php'; ?>

	<?php
	///// check for API security
	if ($apiKey != $expected_api_key) {
		$response = [
			'response' => 98,
			'success' => false,
			'message' => 'SECURITY ACCESS DENIED! You are not allowed to execute this command due to a security breach.'
		];
		goto end;
	}

	if ($check == 0) {
		$response = [
			'response' => 99,
			'success' => false,
			'message' => 'SESSION EXPIRED! Please LogIn Again.'
		];
		goto end;
	}

	/////////////// Vvariable Declaration/////////////////
	$academics_session = trim($_POST['academics_session']);
	$matric_no = str_replace(' ', '', trim($_POST['matric_no']));
	$surname = trim(strtoupper($_POST['surname']));
	$firstname = trim(strtoupper($_POST['firstname']));
	$nickname = trim(strtoupper($_POST['nickname']));
	$email = str_replace(' ', '', trim(strtolower($_POST['email'])));
	$phone = str_replace(' ', '', trim($_POST['phone']));
	$level_id = trim($_POST['level_id']);
	$course_study_id = trim($_POST['course_study_id']);
	$post_id = trim($_POST['post_id']);
	$status_id = trim($_POST['status_id']);

	if (empty($academics_session)) {
		$response = [
			'response' => 400,
			'success' => false,
			'message' => 'ACADEMIC SESSION REQUIRED! Fill inacademic session and try again.'
		];
		goto end;
	}
	if (empty($matric_no)) {
		$response = [
			'response' => 400,
			'success' => false,
			'message' => 'MATRIC NO REQUIRED! Fill in matric no and try again.'
		];
		goto end;
	}

	if (empty($surname)) {
		$response = [
			'response' => 400,
			'success' => false,
			'message' => 'SURNAME REQUIRED! Fill in surname and try again.'
		];
		goto end;
	}

	if (empty($firstname)) {
		$response = [
			'response' => 400,
			'success' => false,
			'message' => 'FIRST NAME REQUIRED! Fill in first name and try again.'
		];
		goto end;
	}

	if (empty($email)) {
		$response = [
			'response' => 400,
			'success' => false,
			'message' => 'EMAIL REQUIRED! Fill in email address and try again.'
		];
		goto end;
	}

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$response = [
			'response' => 400,
			'success' => false,
			'message' => "ERROR: $email is NOT a valid email address"
		];
		goto end;
	}

	if (empty($phone)) {
		$response = [
			'response' => 400,
			'success' => false,
			'message' => 'PHONE NUMBER REQUIRED! Fill in phone number and try again.'
		];
		goto end;
	}

	if (!preg_match('/^\d{1,11}$/', $phone)) {
		$response = [
			'response' => 400,
			'success' => false,
			'message' => 'PHONE NUMBER INVALID! It must be numeric and no more than 11 digits.'
		];
		goto end;
	}
	if (empty($level_id)) {
		$response = [
			'response' => 400,
			'success' => false,
			'message' => 'LEVEL REQUIRED! Fill in level and try again.'
		];
		goto end;
	}
	if ($level_id > 4) {
		if (empty($course_study_id)) {
			$response = [
				'response' => 400,
				'success' => false,
				'message' => 'COURSE OF STUDY REQUIRED! Fill in course of study and try again.'
			];
			goto end;
		}
	}
	if (empty($post_id)) {
		$response = [
			'response' => 400,
			'success' => false,
			'message' => 'POST REQUIRED! Fill in post and try again.'
		];
		goto end;
	}
	if (empty($status_id)) {
		$response = [
			'response' => 400,
			'success' => false,
			'message' => 'STATUS REQUIRED! Fill in status and try again.'
		];
		goto end;
	}

	$getDetail = $callclass->_get_setup_backend_settings_detail($conn, 'BK_ID001');
	$array = json_decode($getDetail, true);
	$current_academics_session = $array[0]['current_academics_session'];


	$checkMail = mysqli_query($conn, "SELECT email FROM executive_tab WHERE email='$email' AND academics_session='$current_academics_session'") or die(mysqli_error($conn));
	$checkCount = mysqli_num_rows($checkMail);
	if ($checkCount > 0) {
		$response = [
			'response' => 400,
			'success' => false,
			'message' => "EMAIL EXIST! Email address already used by another exco",
			'email' => $email,
		];
		goto end;
	}

	$usercheck = mysqli_query($conn, "SELECT matric_no FROM executive_tab WHERE matric_no='$matric_no' AND academics_session='$current_academics_session'") or die(mysqli_error($conn));
	$checkCount = mysqli_num_rows($usercheck);
	if ($checkCount > 0) {
		$response = [
			'response' => 400,
			'success' => false,
			'message' => "MATRIC NO EXIST! Matric no already used by another exco",
			'matric_no' => $matric_no,
		];
		goto end;
	}

	//////////////geting sequence//////////////////////////
	$sequence = $callclass->_get_sequence_count($conn, 'EXCO');
	$array = json_decode($sequence, true);
	$no = $array[0]['no'];
	/// generate exco_id
	$exco_id = 'EXCO' . $no . date("Ymdhis");

	$fullname = $surname . " " . $firstname;
	/// Insert Into executive Tab
	mysqli_query($conn, "INSERT INTO `executive_tab`
	(`exco_id`, `matric_no`, `surname`, `firstname`, `nickname`, `email`, `phone`, `level_id`, `course_study_id`, `post_id`, `status_id`, `academics_session`, `profile_pix`, `created_by`, `created_at`) VALUES
	('$exco_id', '$matric_no', '$surname', '$firstname', '$nickname', '$email', '$phone', '$level_id', '$course_study_id', '$post_id', '$status_id', '$academics_session', 'avatar.jpg', '$login_staff_id', NOW())") or die(mysqli_error($conn));

	$userCheck = mysqli_query($conn, "SELECT a.post_name FROM post_tab a, executive_tab b WHERE a.post_id=b.post_id AND b.exco_id='$exco_id'") or die(mysqli_error($conn));
	$getDetail = mysqli_fetch_array($userCheck);
	$post_name = $getDetail['post_name'];
	
	$query = mysqli_query($conn, "SELECT `session` FROM academics_session_tab WHERE `session`='$academics_session'") or die(mysqli_error($conn));
	$all_record_count = mysqli_num_rows($query);
	if ($all_record_count > 0) {
		mysqli_query($conn, "UPDATE academics_session_tab SET `session`='$academics_session',  
		`updated_at`=NOW(), updated_by='$login_staff_id' WHERE `session`='$academics_session'") or die(mysqli_error($conn));
	} else {
		mysqli_query($conn, "INSERT INTO `academics_session_tab`
		(`session`, `updated_by`, `created_at`) VALUES 
		('$academics_session','$login_staff_id',  NOW())") or die(mysqli_error($conn));
	}

	$response = [
		'response' => 200,
		'success' => true,
		'message' => "SUCCESS! Executive Registration Successful!",
	];
	$alert_detail = "EXECUTIVE REGISTRATION SUCCESSFUL: A admin whose name - $login_staff_fullname, successfully registered a new exco. DETAILS: - Full Name: $fullname, ID: $exco_id, Email: $email, POST: $post_name, SESSION: $current_academics_session";
	$callclass->_alert_sequence_and_update($conn, $login_staff_id, $login_staff_fullname, $login_role_id, $alert_detail, $ip_address, $system_name);


	end:
	echo json_encode($response);
	?>