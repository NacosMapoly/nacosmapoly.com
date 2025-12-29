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

	$query = mysqli_query($conn, "SELECT `current_academics_session` FROM setup_backend_settings_tab WHERE `backend_setting_id`='BK_ID001'") or die(mysqli_error($conn));
	$all_record_count = mysqli_num_rows($query);
	if ($all_record_count == 0) {
		$response = [
			'response' => 400,
			'success' => false,
			'message' => "INVALID ACADEMICS SESSION! Academics session not updated!"
		];
		goto end;
	} 
	$fetch_query = mysqli_fetch_assoc($query);
	$current_academics_session=$fetch_query['current_academics_session'];

	$fetchAcademicsSession = mysqli_query($conn, "SELECT a.*, b.semester_name FROM academics_session_tab a, setup_semester_tab b WHERE a.semester_id=b.semester_id AND  a.`session`='$current_academics_session'") or die(mysqli_error($conn));
	$fetchDetails = mysqli_fetch_assoc($fetchAcademicsSession);
	$response = [
		'code' => 200,
		'success' => true,
		'message' => 'ACADEMICS SESSION FETCH SUCCESSFULY!',
		'data' => $fetchDetails,
	];
	
	
	end:
	echo json_encode($response);
	?>