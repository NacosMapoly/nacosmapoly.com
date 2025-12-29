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

	/////////////// Variable Declaration/////////////////
	$session = trim($_POST['session']);
	$session_start_date = trim($_POST['session_start_date']);
	$session_end_date = trim($_POST['session_end_date']);
	$semester_id = trim($_POST['semester_id']);

	if (empty($session)) {
		$response = [
			'response' => 400,
			'success' => false,
			'message' => 'SESSION REQUIRED! fiil in session and try again.'
		];
		goto end;
	}
	if (empty($session_start_date)) {
		$response = [
			'response' => 400,
			'success' => false,
			'message' => 'SESSION START DATE REQUIRED! fill in session start date and try again.'
		];
		goto end;
	}
	if (empty($session_end_date)) {
		$response = [
			'response' => 400,
			'success' => false,
			'message' => 'SESSION END DATE REQUIRED! fill in session end date and try again.'
		];
		goto end;
	}
	if (empty($semester_id)) {
		$response = [
			'response' => 400,
			'success' => false,
			'message' => 'Semester REQUIRED! fill in semester and try again.'
		];
		goto end;
	}


	$query = mysqli_query($conn, "SELECT `session` FROM academics_session_tab WHERE `session`='$session'") or die(mysqli_error($conn));
	$all_record_count = mysqli_num_rows($query);
	if ($all_record_count > 0) {
		mysqli_query($conn, "UPDATE academics_session_tab SET `session`='$session', 
		session_start_date='$session_start_date', session_end_date='$session_end_date', semester_id='$semester_id', 
		`updated_at`=NOW(), updated_by='$login_staff_id' WHERE `session`='$session'") or die(mysqli_error($conn));
	} else {
		$getDetail = $callclass->_get_setup_backend_settings_detail($conn, 'BK_ID001');
		$array = json_decode($getDetail, true);
		$current_academics_session = $array[0]['current_academics_session'];

		$getQuery = mysqli_query($conn, "SELECT * FROM executive_tab WHERE `academics_session`='$current_academics_session'") or die(mysqli_error($conn));
		$all_record_count = mysqli_num_rows($getQuery);
		if ($all_record_count > 0) {
			mysqli_query($conn, "UPDATE executive_tab SET `level_id`=5 WHERE `academics_session`='$current_academics_session'") or die(mysqli_error($conn));
		}
		mysqli_query($conn, "INSERT INTO `academics_session_tab`
		(`session`, `session_start_date`, `session_end_date`, `semester_id`, `updated_by`, `created_at`) VALUES 
		('$session', '$session_start_date', '$session_end_date', '$semester_id', '$login_staff_id',  NOW())") or die(mysqli_error($conn));
	}
	mysqli_query($conn, "UPDATE setup_backend_settings_tab SET `current_academics_session`='$session' WHERE `backend_setting_id`='BK_ID001'") or die(mysqli_error($conn));

	$fetchAcademicsSession = mysqli_query($conn, "SELECT a.*, b.* FROM academics_session_tab a, setup_semester_tab b WHERE a.semester_id=b.semester_id AND  a.`session`='$session'") or die(mysqli_error($conn));
	$fetchDetails = mysqli_fetch_assoc($fetchAcademicsSession);
	$response = [
		'response' => 200,
		'success' => true,
		'message' => "SESSION UPDATED! Session Updated Successful!",
		'academicsSessionData' => $fetchDetails
	];

	$alert_detail = "ACADEMICS SESSION UPDATED SUCCESSFULLY: The academics session was updated by $login_staff_fullname";
	$callclass->_alert_sequence_and_update($conn, $login_staff_id, $login_staff_fullname, $login_role_id, $alert_detail, $ip_address, $system_name);

	end:
	echo json_encode($response);
	?>