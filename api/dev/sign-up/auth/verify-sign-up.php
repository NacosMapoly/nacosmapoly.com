<?php require_once '../config/connection.php';?>

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

		/////////////// Vvariable Declaration/////////////////
		$firstname=str_replace(' ', '',trim(strtoupper($_POST['firstname'])));
		$surname=str_replace(' ', '',trim(strtoupper($_POST['surname'])));
        $phone = str_replace(' ', '', trim($_POST['phone']));
        $gender_id = str_replace(' ', '',trim(strtolower($_POST['gender_id'])));
        
        $level_id = trim(strtoupper($_POST['level_id']));
        $is_matric_no = trim(strtoupper($_POST['is_matric_no']));
        $matric_number = str_replace(' ', '',trim(strtoupper($_POST['matric_number'])));
		$email = str_replace(' ', '',trim(strtolower($_POST['email'])));
        $confirm_email = str_replace(' ', '',trim(strtolower($_POST['confirm_email'])));
       
		$course_of_study = trim(strtoupper($_POST['course_of_study']));
        $programme_mode = str_replace(' ', '',trim(strtolower($_POST['programme_mode'])));
        $password = trim($_POST['password']);
        $confirmed_password = trim($_POST['confirmed_password']);
			
		if (empty($firstname)){
			$response = [
				'response'=> 400,
				'success'=> false,
				'message'=> 'FIRST NAME REQUIRED! Fill in First Name and try again.'
			];
			goto end;
		}	
		if (empty($surname)){
			$response = [
				'response'=> 400,
				'success'=> false,
				'message'=> 'SURNAME REQUIRED! Fill in Surname and try again.'
			];
			goto end;
		}
       if (empty($phone)){
			$response = [
				'response'=> 400,
				'success'=> false,
				'message'=> 'PHONE NUMBER REQUIRED! Check phone number and try again.'
			];
			goto end;
		}
        if (!preg_match('/^\d{1,11}$/', $phone)) {
			$response = [
				'response' => 400,
				'success' => false,
				'message' => 'PHONE NUMBER INVALID! It must be numeric and no more than 11 digits.'
			];
			goto end;
		}
        if (empty($gender_id)){
			$response = [
				'response'=> 400,
				'success'=> false,
				'message'=> 'GENDER ID REQUIRED! Select Gender and try again.'
			];
			goto end;
		}

		if (empty($level_id)){
			$response = [
				'response'=> 400,
				'success'=> false,
				'message'=> 'LEVEL REQUIRED! Select Level and try again.'
			];
			goto end;
		}
		if ($is_matric_no == 'YES'){
			if (empty($matric_number)){
				$response = [
					'response'=> 400,
					'success'=> false,
					'message'=> 'MATRIC NUMBER REQUIRED! Fill in Matric Number and try again.'
				];
				goto end;
			}
		
			if (!$callclass->isValidMatricNo($matric_number)) {
				$response = [
					'response'=> 403,
					'success'=> false,
					'message'=> "INVALID MATRIC NUMBER FORMAT! Kindly check Matric Number and try again"
				]; 
				goto end;
			}
		}
		if (empty($email)){
			$response = [
				'response'=> 400,
				'success'=> false,
				'message'=> 'EMAIL REQUIRED! Check email address and try again.'
			];
			goto end;
		}
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $response = [
                'response'=> 107,
                'success'=> false,
                'message'=> "ERROR: $email is NOT a valid email address"
            ]; 
            goto end;
		}
        if (empty($confirm_email)){
			$response = [
				'response'=> 400,
				'success'=> false,
				'message'=> 'CONFIRMED EMAIL REQUIRED! Check Confirmed email address and try again.'
			];
			goto end;
		}
        if ($email != $confirm_email){
            $response = [
				'response'=> 400,
				'success'=> false,
				'message'=> 'EMAIL NOT MATCHED! Check email address and try again.'
			];
			goto end;
        }
        if ($level_id =='HND I'){
            if (empty($course_of_study)){
                $response = [
                    'response'=> 400,
                    'success'=> false,
                    'message'=> 'COURSE STUDY REQUIRED! Select Course Study and try again.'
                ];
                goto end;
            }
        }
		if (empty($programme_mode)){
			$response = [
				'response'=> 400,
				'success'=> false,
				'message'=> 'PROGRAMME MODE REQUIRED! Select Programme Mode and try again.'
			];
			goto end;
		}
        if (empty($password)){
			$response = [
				'response'=> 400,
				'success'=> false,
				'message'=> 'PASSWORD REQUIRED! Fill in Password and try again.'
			];
			goto end;
		}
        if (empty($confirmed_password)){
			$response = [
				'response'=> 400,
				'success'=> false,
				'message'=> 'CONFIRMED PASSWORD REQUIRED! Fill in Confirmed Password and try again.'
			];
			goto end;
		}
        if ($password!=$confirmed_password){
			$response = [
				'response'=> 400,
				'success'=> false,
				'message'=> 'PASSWORD NOT MATCH! Kindly Check Password and try again.'
			];
			goto end;
		}

        $query=mysqli_query($conn,"SELECT email FROM users WHERE email='$email'");
        $userCheck=mysqli_num_rows($query);
        if ($userCheck>0){
            $response = [
                'response'=> 401,
                'success'=> false,
                'message'=> "EMAIL ADDRESS ALREADY EXIST! Kindly proceed to login or forgot password",
            ]; 
            goto end;	
        }
		if ($is_matric_no == 'YES'){
			$query=mysqli_query($conn,"SELECT matric_number FROM users WHERE matric_number='$matric_number'");
			$userCheck=mysqli_num_rows($query);
			if ($userCheck>0){
				$response = [
					'response'=> 402,
					'success'=> false,
					'message'=> "MATRIC NUMBER ALREADY EXIST BY STUDENT! Kindly check Matric Number and try again",
			]; 
				goto end;	
			}
		}
		/// Generate USER ID for student
		$user_id= 'USER'.date('Ymd').uniqid();
		$payment_reference= $callclass->generatePaymentReference();

 		$options = [
        	'cost' => 12
        ];
        // Generate bcrypt hash
        $hash_password = password_hash($password, PASSWORD_BCRYPT, $options);

		$sessionQuery=mysqli_query($conn,"SELECT id FROM academic_sessions WHERE `status`=1");
       	$fetchData=mysqli_fetch_array($sessionQuery);
		$session_id=$fetchData['id']; 

		$academicSettingQuery=mysqli_query($conn,"SELECT id FROM academic_settings WHERE `status`=1");
       	$fetchData=mysqli_fetch_array($academicSettingQuery);
		$academic_setting_id=$fetchData['id']; 

		$amountPaymentQuery="SELECT al.name AS level_name,
									p.id AS payment_id,
									p.target_wallet_id AS wallet_id,
									p.name AS payment_name,
									p.amount AS department_fee,
									p.misc_amount_charged AS charges,
									p.created_at AS latest_payment_date
								FROM 
									academic_level_payments alp
								JOIN 
									academic_levels al ON alp.level_id = al.id
								JOIN 
									payments p ON alp.payment_id = p.id
								WHERE 
									al.code IN ('$level_id') AND
									alp.created_at = (
										SELECT MAX(alp2.created_at)
										FROM academic_level_payments alp2
										JOIN academic_levels al2 ON alp2.level_id = al2.id
										WHERE al2.name = al.name
									);";

        $amountDetails=mysqli_query($conn,$amountPaymentQuery);
       	$fetchData=mysqli_fetch_array($amountDetails);
		$wallet_id=$fetchData['wallet_id'];
		$payment_name=$fetchData['payment_name'];
		$department_fee=$fetchData['department_fee'];
		$payment_id=$fetchData['payment_id'];
		$charges=$fetchData['charges'];
             
        $response = [
            'response'=> 200,
            'success'=> true,
            'studentData'=> [
				'user_id'=> $user_id,
				'firstname'=> $firstname,
				'surname'=> $surname,
				'fullname'=> ucwords(strtolower($surname. ' '. $firstname)),
				'phone'=> $phone,
				'email'=> $email,
				'is_matric_no'=> $is_matric_no,
				'matric_number'=> $matric_number,
				'gender_id'=> $gender_id,
				'level_id'=> $level_id,
				'course_of_study'=> $course_of_study,
				'programme_mode'=> $programme_mode,
				'password'=> $hash_password,
			],
			'settingsData'=> [
				'session_id'=> $session_id,
				'academic_setting_id'=> $academic_setting_id,
			],
			'paymentData'=> [
				'user_id'=> $user_id,
				'payment_reference'=> $payment_reference,
				'payment_name'=> $payment_name,
				'payment_id'=> $payment_id,
				'wallet_id'=> $wallet_id,
				'amount'=> $department_fee,
				'charges'=> $charges,
				'transaction_type'=> 'payment',
				'payment_method'=> 'Paystack',
				'paystack_payment_key'=> $PAYSTACK_PAYMENT_KEY_TEST,
			]

        ];	
end:
echo json_encode($response);
?>