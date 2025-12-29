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

$exco_id = trim(strtoupper($_POST['exco_id']));

$select = "SELECT 
    a.*, 
    b.post_name, 
    c.status_name, 
    d.level_name, 
    COALESCE(e.course_study_title, '') AS course_study_title
FROM executive_tab a
JOIN post_tab b ON a.post_id = b.post_id
JOIN setup_status_tab c ON a.status_id = c.status_id
JOIN setup_level_tab d ON a.level_id = d.level_id
LEFT JOIN course_study_tab e ON a.course_study_id = e.course_study_id
WHERE a.exco_id = '$exco_id';
";

$getDetails = mysqli_query($conn, $select) or die(mysqli_error($conn));
$all_record_count = mysqli_num_rows($getDetails);

$fetchDetails = mysqli_fetch_assoc($getDetails);
$response = [
	'response' => 200,
	'success' => true,
	'documentStoragePath' => "$documentStoragePath/exco-pix",
	'userData' =>  $fetchDetails
];


end:
echo json_encode($response);
?>