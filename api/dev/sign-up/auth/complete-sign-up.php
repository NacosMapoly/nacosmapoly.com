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
        $user_id = trim($_POST['user_id']);
        $firstname=str_replace(' ', '',trim(strtoupper($_POST['firstname'])));
		$surname=str_replace(' ', '',trim(strtoupper($_POST['surname'])));
        $phone = str_replace(' ', '', trim($_POST['phone']));
        $email = str_replace(' ', '',trim(strtolower($_POST['email'])));
        $is_matric_no = str_replace(' ', '',trim(strtoupper($_POST['is_matric_no'])));
        $matric_number = str_replace(' ', '',trim(strtoupper($_POST['matric_number'])));
        $gender_id = str_replace(' ', '',trim(strtolower($_POST['gender_id'])));
        $level_id = trim(strtoupper($_POST['level_id']));
        $course_of_study = trim(strtoupper($_POST['course_of_study']));
        $programme_mode = str_replace(' ', '',trim(strtolower($_POST['programme_mode'])));
        $password = trim($_POST['password']);
        $session_id = trim($_POST['session_id']);
        $academic_setting_id = trim($_POST['academic_setting_id']);
        $payment_id = trim($_POST['payment_id']);
        $payment_name = trim($_POST['payment_name']);
        $wallet_id = trim($_POST['wallet_id']);
        $amount = trim($_POST['amount']);
        $charges = trim($_POST['charges']);
        $transaction_type = trim($_POST['transaction_type']);
        $payment_method = trim($_POST['payment_method']);
        $payment_reference = trim($_POST['payment_reference']);

        $query=mysqli_query($conn,"SELECT email FROM users WHERE email='$email'");
        $userCheck=mysqli_num_rows($query);
        if ($userCheck>0){
            $response = [
                'response'=> 400,
                'success'=> false,
                'message'=> "EMAIL ADDRESS ALREADY EXIST! Kindly proceed to login or forgot password"
            ]; 
            goto end;	
        }
        if ($is_matric_no == 'YES'){
            $query=mysqli_query($conn,"SELECT matric_number FROM users WHERE matric_number='$matric_number'");
            $userCheck=mysqli_num_rows($query);
            if ($userCheck>0){
                $response = [
                    'response'=> 400,
                    'success'=> false,
                    'message'=> "MATRIC NUMBER ALREADY EXIST BY STUDENT! Kindly check Matric Number and try again"
                ]; 
                goto end;	
            }
        }
        $academicSessionQuery=mysqli_query($conn,"SELECT `session` FROM academic_sessions WHERE `status`=1");
        $fetchData=mysqli_fetch_array($academicSessionQuery);
        $academicSession=$fetchData['session'];
        $shortYear = substr($academicSession, 2, 2);
        
        if ($level_id == 'HND I'){
            $programme_mode == 'full-time' ? $pid=$course_of_study.'/F/' : $pid=$course_of_study.'/P/';
        }else{
            $programme_mode == 'full-time' ? $pid='ND/F/' : $pid='ND/P/';
        }
        //////////////geting sequence//////////////////////////
        $sequence=$callclass->_get_sequence_count($conn, 'CSD');
        $array = json_decode($sequence, true);
        $no= $array[0]['no'];
        $departmental_id = $shortYear.'/CS/'.$pid.$no;

        $payment_channel="card";

        /// Insert to users tab
        mysqli_query($conn,"INSERT INTO `users`
        (`id`, `firstname`, `lastname`, `email`, `departmental_id`, `matric_number`, `level`, `programme_mode`, `phone`,`gender`, `password`, `login_location`, `status`, `created_at`, `updated_at`, `course_of_study`) VALUES
        ('$user_id', '$firstname','$surname', '$email', '$departmental_id', '$matric_number', '$level_id', '$programme_mode', '$phone', '$gender_id', '$password', '$deviceUsedDetails', 1, NOW(), NOW(), '$course_of_study')")or die (mysqli_error($conn));
        /// Insert to payment trasaction tab
        mysqli_query($conn,"INSERT INTO `payment_transactions`
        (`userid`, `level`, `session_id`, `academic_setting_id`, `amount`, `charges`, `payment_id`, `transaction_type`, `payment_method`, `payment_channel`, `payment_reference`, `transaction_date`, `narration`, `status`, `created_at`, `updated_at`) VALUES
        ('$user_id', '$level_id','$session_id', '$academic_setting_id', '$amount', '$charges', '$payment_id', '$transaction_type', '$payment_method', '$payment_channel', '$payment_reference', NOW(), '$payment_name', 'paid', NOW(), NOW())")or die (mysqli_error($conn));

        $walletQuery = "SELECT a.new_balance 
                        FROM wallet_logs a, academic_sessions b 
                        WHERE a.session_id = b.id AND b.status=1
                        ORDER BY a.created_at DESC 
                        LIMIT 1;";
        $walletDetails=mysqli_query($conn,$walletQuery);
       	$fetchData=mysqli_fetch_array($walletDetails);
        $previous_balance=$fetchData['new_balance'];
        $new_balance= $previous_balance + $amount;
        /// Insert to wallet logs tab
        mysqli_query($conn,"INSERT INTO `wallet_logs`
        (`wallet_id`, `session_id`, `previous_balance`, `transaction_amount`, `new_balance`, `transaction_type`, `status`, `created_at`, `updated_at`) VALUES
        ('$wallet_id','$session_id', '$previous_balance', '$amount', '$new_balance', 'credit', 1, NOW(), NOW())")or die (mysqli_error($conn));
		mysqli_query($conn,"UPDATE `account_wallets` SET account_balance='$new_balance', updated_at=NOW() WHERE id='$wallet_id' AND session_id='$session_id'")or die (mysqli_error($conn));
        $response = [
            'response'=> 200,
            'success'=> true,
            'message'=> "SUCCESS! Student Registration Successful!",
        ];	
end:
echo json_encode($response);
?>