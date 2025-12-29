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
		$phone_number=trim($_POST['phone_number']);
		$whatsapp_number=trim($_POST['whatsapp_number']);
		$email_address=trim($_POST['email_address']);
		$instagram_link=trim($_POST['instagram_link']);
		
		if (empty($phone_number)){
			$response = [
				'response'=> 400,
				'success'=> false,
				'message'=> 'PHONE NUMBER! Check phone number and try again.'
			];
			goto end;
		}

		if (empty($whatsapp_number)){
			$response = [
				'response'=> 400,
				'success'=> false,
				'message'=> 'SMTP WHATSAPP REQUIRED! Check whatsapp and try again.'
			];
			goto end;
		}

		if (empty($email_address)){
			$response = [
				'response'=> 400,
				'success'=> false,
				'message'=> 'EMAIL ADDRESS REQUIRED! Check email address and try again.'
			];
			goto end;
		}

		if (empty($instagram_link)){
			$response = [
				'response'=> 400,
				'success'=> false,
				'message'=> 'INSTAGRAM LINK REQUIRED! Check instagram link and try again.'
			];
			goto end;
		}
		$getDetail = $callclass->_get_setup_backend_settings_detail($conn, 'BK_ID001');
		$array = json_decode($getDetail, true);
		$current_academics_session = $array[0]['current_academics_session'];
		
		mysqli_query($conn,"UPDATE setup_backend_settings_tab SET phone_number='$phone_number', whatsapp_number='$whatsapp_number',
		email_address='$email_address', instagram_link='$instagram_link', updated_by='$login_staff_id' WHERE backend_setting_id='BK_ID001'") or die (mysqli_error($conn));

			$response = [
				'response'=> 200,
				'success'=> true,
				'message'=> "CONTACT UPDATED! contact updated Successful!"
			]; 

			$alert_detail="CONTACT UPDATED SUCCESSFULLY: The Nacos Contact was updated by $login_staff_fullname, ACADEMIC SESSION - $current_academics_session";
			$callclass->_alert_sequence_and_update($conn,$login_staff_id,$login_staff_fullname,$login_role_id,$alert_detail,$ip_address,$system_name);	

end:
echo json_encode($response);
?>