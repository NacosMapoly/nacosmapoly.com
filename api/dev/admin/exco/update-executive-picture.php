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

		/////////////// Variable Declaration/////////////////
		$exco_id=trim(strtoupper($_POST['exco_id']));
		$profile_pix=$_FILES['profile_pix']['name'];

			$allowedExts = array("jpg", "jpeg", "JPEG", "JPG", "gif", "png","PNG","GIF","webp","WEBP");
			$extension = pathinfo($_FILES['profile_pix']['name'], PATHINFO_EXTENSION);
			
			if (!in_array(($extension), $allowedExts)) {
				$response = [
					'response' => 400,
					'success' => false,
					'message' => 'INVALID PICTURE FORMAT! Check the picture format and try again.'
				];  
				goto end;
			}
				$getDetail=$callclass->_get_setup_backend_settings_detail($conn, 'BK_ID001');
				$array = json_decode($getDetail, true);
				$current_academics_session= $array[0]['current_academics_session'];
				$academics_session = str_replace(" / ", "_", $current_academics_session);

				$datetime = date("Ymdhi");
				$profile_pix = $academics_session . '_' . $exco_id . '_' . $datetime . '.' . $extension;
				$uploadPath = $excoProfilePixPath . $profile_pix;
				
					if (!move_uploaded_file($_FILES["profile_pix"]["tmp_name"], $uploadPath)) {
						$response = [
							'response' => 400,
							'success' => false,
							'message' => 'PICTURE UPLOAD ERROR! Contact your Engineer For Help'
						];  
						goto end;
					}
			
						$user_array = $callclass->_get_executives_details($conn, $exco_id);
						$user_array = json_decode($user_array, true);
						$db_passport = $user_array[0]['profile_pix'];
						$surname = $user_array[0]['surname'];
						$firstname = $user_array[0]['firstname'];
						$fullname = $surname . ' ' . $firstname;
						
						if ($db_passport != 'avatar.jpg') {
							unlink($excoProfilePixPath . $db_passport);
						}

						mysqli_query($conn,"UPDATE `executive_tab` SET profile_pix='$profile_pix' WHERE exco_id='$exco_id'")or die (mysqli_error($conn));

						$response = [
							'response'=> 200,
							'success'=> true,
							'message'=> 'SUCCESS! Executive picture updated successfully!'
						];  

						$alert_detail="EXECUTIVE PICTURE UPDATED SUCCESSFUL: A admin whose name - $login_staff_fullname, successfully uploaded his/her profile picture. DETAILS: - Full Name: $fullname, ID: $exco_id";	
						$callclass->_alert_sequence_and_update($conn,$login_staff_id,$login_staff_fullname,$login_role_id,$alert_detail,$ip_address,$system_name);

end:
echo json_encode($response);
?>