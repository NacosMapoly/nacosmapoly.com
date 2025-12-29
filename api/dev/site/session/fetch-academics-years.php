	<?php require_once '../../config/connection.php'; ?>

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


	$query = mysqli_query($conn, "SELECT `session` FROM academics_session_tab ORDER BY `session` DESC") or die(mysqli_error($conn));
	$all_record_count = mysqli_num_rows($query);
	if ($all_record_count == 0) {
		$response = [
			'response' => 400,
			'success' => false,
			'message' => "ACADEMICS SESSION NOT UPDATED!"
		];
		goto end;
	} 
	while ($fetchDetails = mysqli_fetch_all($query, MYSQLI_ASSOC)) {
		$response = [
			'response'=> 200,
			'success'=> true,
			'data'=>  $fetchDetails
		];  
	}
	
	
end:
echo json_encode($response);
	?>