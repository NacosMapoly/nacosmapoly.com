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


	$exam_session = trim(strtoupper($_POST['exam_session']));
	$search_keywords = trim(($_POST['search_keywords']));

	$select =
		"SELECT
				a.*, b.level_name, c.semester_name, d.status_name
				FROM past_question_tab a, setup_level_tab b, setup_semester_tab c, setup_status_tab d
				WHERE
				a.level_id=b.level_id AND a.semester_id=c.semester_id AND a.status_id=d.status_id AND a.status_id =1 AND
				a.exam_session LIKE '%$exam_session%' AND (a.exam_session LIKE '%$search_keywords%' OR a.course_code LIKE '%$search_keywords%' OR a.course_title LIKE '%$search_keywords%') ORDER BY RAND()";

	$query = mysqli_query($conn, $select) or die(mysqli_error($conn));
	$all_record_count = mysqli_num_rows($query);
	if ($all_record_count == 0) {
		$response = [
			'response' => 200,
			'success' => true,
			'message' => 'NO COURSE FOUND!!!'
		];
		goto end;
	}
	$selectAllExamSession = "SELECT DISTINCT(exam_session) FROM past_question_tab";
	$examSessionQuery=mysqli_query($conn,$selectAllExamSession)or die (mysqli_error($conn));
	
	while ($fetch_all_exam_session = mysqli_fetch_all($examSessionQuery, MYSQLI_ASSOC)) {
		while ($fetch_query = mysqli_fetch_all($query, MYSQLI_ASSOC)) {
			foreach ($fetch_query as &$new_data) {
				$new_data['examPixPath'] = "$documentStoragePath/exam-material/exam-pix";
				$new_data['examMaterialPath'] = "$documentStoragePath/exam-material/material";
			}
			$response = [
				'response' => 200,
				'success' => true,
				'all_record_count' => $all_record_count,
				'all_past_exam_session' =>  $fetch_all_exam_session,
				'data' =>  $fetch_query,
			];
		}
	}
	end:
	echo json_encode($response);
	?>