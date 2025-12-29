<?php require_once '../../config/connection.php';?>
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

		$select="SELECT a.fullname, a.email, a.profile_pix, b.position_name
		FROM staff_tab a, setup_position_tab b
		WHERE a.position_id=b.position_id AND a.status_id=1 
		AND a.role_id <3 ";
	
		$query=mysqli_query($conn,$select)or die (mysqli_error($conn));
		$all_record_count=mysqli_num_rows($query);
		if($all_record_count==0){
			$response = [
				'response'=> 200,
				'success'=> true,
				'message'=> 'No Record found!!!'
			];  
			goto end;
		}

			$response = [
				'response'=> 200,
				'success'=> true,
				'all_record_count'=> $all_record_count,
				'data'=>  array()
			];  

			while ($fetch_query = mysqli_fetch_assoc($query)) {
				$fetch_query['documentStoragePath'] = "$documentStoragePath/staff-pix";
				$response['data'][] = $fetch_query;
			}
				
end:
echo json_encode($response);
?>