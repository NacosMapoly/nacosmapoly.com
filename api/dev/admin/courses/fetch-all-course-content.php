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

		$status_id=trim(strtoupper($_POST['status_id']));
		$level_id=trim(strtoupper($_POST['level_id']));
		$search_keywords =trim(($_POST['search_keywords']));

		$select=
			"SELECT
			a.publish_id, a.course_level_id, a.course_study_title, a.course_content, a.reg_pix, a.status_id, a.updated_time, b.status_name, d.level_name, d.level_title
			FROM publish_tab a, setup_status_tab b, setup_level_tab d
			WHERE 
			a.status_id=b.status_id AND a.course_level_id=d.level_id AND a.status_id LIKE '%$status_id%'AND a.course_level_id LIKE '%$level_id%'AND
			(a.course_level_id LIKE '%$search_keywords%') ORDER BY a.created_time ASC";
		
			$query=mysqli_query($conn,$select)or die (mysqli_error($conn));
			$all_record_count=mysqli_num_rows($query);

			if($all_record_count==0){
				$response = [
					'response'=> 400,
					'success'=> false,
					'message'=> 'No Record found!!!'
				];  
				goto end;
			}
			while ($fetch_query = mysqli_fetch_all($query, MYSQLI_ASSOC)) {
				foreach ($fetch_query as &$new_data) {
					$new_data['documentStoragePath'] = "$documentStoragePath/course-pix";
				}
				$response = [
					'response'=> 200,
					'success'=> true,
					'all_record_count'=> $all_record_count,
					'data'=>  $fetch_query
				];  
			}
				
end:
echo json_encode($response);
?>