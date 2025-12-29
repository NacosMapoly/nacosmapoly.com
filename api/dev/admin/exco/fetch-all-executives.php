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

		$academics_session=trim($_POST['academics_session']);
		$status_id=trim(strtoupper($_POST['status_id']));
		$search_keywords =trim(($_POST['search_keywords']));

		$select="SELECT a.*, b.post_name, c.status_name, d.level_name
		FROM executive_tab a, post_tab b, setup_status_tab c, setup_level_tab d
		WHERE a.academics_session LIKE '%$academics_session%' AND a.status_id LIKE '%$status_id%' AND 
		(a.academics_session LIKE '%$search_keywords%'OR a.surname LIKE '%$search_keywords%' OR a.firstname LIKE '%$search_keywords%' OR b.post_name LIKE '%$search_keywords%') AND
		a.post_id=b.post_id AND a.status_id=c.status_id AND a.level_id=d.level_id";
		
			$getDetails=mysqli_query($conn,$select)or die (mysqli_error($conn));
			$all_record_count=mysqli_num_rows($getDetails);
			if($all_record_count==0){
				$response = [
					'response'=> 200,
					'success'=> true,
					'message'=> 'NO RECORD FOUND!!!'
				];  
				goto end;
			}

			while ($fetchDetails = mysqli_fetch_all($getDetails, MYSQLI_ASSOC)) {
				$response = [
					'response'=> 200,
					'success'=> true,
					'all_record_count'=> $all_record_count,
					'documentStoragePath' =>"$documentStoragePath/exco-pix",
					'usersData'=>  $fetchDetails
				];  
			}
				
end:
echo json_encode($response);
?>