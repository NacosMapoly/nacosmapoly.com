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

		/////////////// Vvariable Declaration/////////////////
		$staff_id=trim(str_replace(' ', '', strtoupper($_POST['staff_id'])));
		$fullname=trim(strtoupper($_POST['fullname']));
		$phone = str_replace(' ', '', trim($_POST['phone']));
		$email = str_replace(' ', '',trim(strtolower($_POST['email'])));
		$position_id=trim($_POST['position_id']);
		$role_id=trim($_POST['role_id']);
		$status_id=trim($_POST['status_id']);
			
		if (empty($staff_id)){
			$response = [
				'response'=> 100,
				'success'=> false,
				'message'=> 'STAFF ID REQUIRED! Check Staff ID and try again.'
			];
			goto end;
		}

		if (empty($fullname)){
			$response = [
				'response'=> 101,
				'success'=> false,
				'message'=> 'FULL NAME REQUIRED! Check the full name and try again.'
			];
			goto end;
		}

		if (empty($phone)){
			$response = [
				'response'=> 102,
				'success'=> false,
				'message'=> 'PHONE NUMBER REQUIRED! Check phone number and try again.'
			];
			goto end;
		}

		if (!preg_match('/^\d{1,11}$/', $phone)) {
			$response = [
				'response' => 103,
				'success' => false,
				'message' => 'PHONE NUMBER INVALID! It must be numeric and no more than 11 digits.'
			];
			goto end;
		}
		
		if (empty($email)){
			$response = [
				'response'=> 104,
				'success'=> false,
				'message'=> 'EMAIL REQUIRED! Check email address and try again.'
			];
			goto end;
		}

		if (empty($position_id)){
			$response = [
				'response'=> 104,
				'success'=> false,
				'message'=> 'POSITION ID REQUIRED! Check position Id and try again.'
			];
			goto end;
		}

		if (empty($role_id)){
			$response = [
				'response'=> 106,
				'success'=> false,
				'message'=> 'ROLE REQUIRED! Select a role and try again.'
			];
			goto end;
		}

		if (empty($status_id)){
			$response = [
				'response'=> 107,
				'success'=> false,
				'message'=> 'STATUS REQUIRED! Select the status and try again.'
			];
			goto end;
		}

			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$response = [
					'response'=> 108,
					'success'=> false,
					'message'=> "ERROR: $email is NOT a valid email address"
				]; 
				goto end;
			}
				$usercheck=mysqli_query($conn,"SELECT * FROM staff_tab WHERE email='$email' AND staff_id != '$staff_id'");
				$useremail=mysqli_num_rows($usercheck);

				if ($useremail>0){
					$response = [
						'response'=> 109,
						'success'=> false,
						'message'=> "EMAIL NOT ACCETABLE! $email already used by another admin"
					]; 
					goto end;	
				}

					/// Update Into Satff Tab
					mysqli_query($conn,"UPDATE staff_tab SET fullname='$fullname', phone='$phone', email='$email', position_id='$position_id', role_id='$role_id', status_id='$status_id' WHERE staff_id='$staff_id'") or die (mysqli_error($conn));
					
					$queryPosition=mysqli_query($conn,"SELECT b.position_name FROM staff_tab a, setup_position_tab b WHERE a.position_id=b.position_id AND a.position_id ='$position_id'");
					$fetch=mysqli_fetch_array($queryPosition);
					$position_name= $fetch['position_name'];

					$response = [
						'response'=> 110,
						'success'=> true,
						'message'=> "SUCCESS! Staff Updated Successful!",
						'staff_id'=> $staff_id,
					]; 
					$alert_detail="STAFF UPDATED SUCCESSFUL: A admin whose name - $login_staff_fullname, successfully updated a staff. DETAILS: - Full Name: $fullname, ID: $staff_id, Email: $email, POSITION: $position_name";	
					$callclass->_alert_sequence_and_update($conn,$login_staff_id,$login_staff_fullname,$login_role_id,$alert_detail,$ip_address,$system_name);

end:
echo json_encode($response);
?>