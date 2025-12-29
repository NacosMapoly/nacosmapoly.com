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

	$getDetail = $callclass->_get_setup_backend_settings_detail($conn, 'BK_ID001');
	$array = json_decode($getDetail, true);
	$current_academics_session = $array[0]['current_academics_session'];

	$select = "SELECT a.*, CONCAT(a.surname, ' ', a.firstname) AS fullname, b.post_name, c.status_name, d.level_name
		FROM executive_tab a, post_tab b, setup_status_tab c, setup_level_tab d
		WHERE a.level_id=d.level_id AND a.status_id=c.status_id AND a.post_id=b.post_id AND a.academics_session != '$current_academics_session' ORDER BY RAND()";

	$getDetails = mysqli_query($conn, $select) or die(mysqli_error($conn));
	$all_record_count = mysqli_num_rows($getDetails);
	if ($all_record_count == 0) {
	$response = [
		'response' => 400,
		'success' => false,
		'message' => 'NO RECORD FOUND!!!'
	];
	goto end;
	}
	$selectAllPastAcademicsSession = "SELECT DISTINCT(academics_session) FROM executive_tab WHERE academics_session !='$current_academics_session'";
	$academicsSessionQuery = mysqli_query($conn, $selectAllPastAcademicsSession) or die(mysqli_error($conn));
	
	while ($fetch_all_academics_session = mysqli_fetch_all($academicsSessionQuery, MYSQLI_ASSOC)) {
		while ($fetchDetails = mysqli_fetch_all($getDetails, MYSQLI_ASSOC)) {
			$response = [
				'response' => 200,
				'success' => true,
				'all_record_count' => $all_record_count,
				'documentStoragePath' => "$documentStoragePath/exco-pix",
				'usersData' =>  $fetchDetails,
				'fetch_all_academics_session' => $fetch_all_academics_session
			];
		}
	}

	end:
	echo json_encode($response);
?>