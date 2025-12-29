<?php require_once '../config/connection.php'; ?>
<?php require_once '../config/admin-session-check.php'; ?>
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

            $getDetails = mysqli_query($conn, "SELECT * FROM setup_time_option_tab") or die(mysqli_error($conn));
            $getCount = mysqli_num_rows($getDetails);
            if ($getCount > 0) { /// start if 2
                    while ($fetchDetails = mysqli_fetch_all($getDetails, MYSQLI_ASSOC)) {
                        $response = [
                            'code' => 200,
                            'success' => true,
                            'message' => 'TIME FETCH SUCCESSFULLY!',
                            'data' => $fetchDetails,
                        ];
                    }
                    
                } else { // else 3
                    $response = [
                        'code' => 400,
                        'success' => false,
                        'message' => 'NO RECORD FOUND!',
                    ];
                } // end if 3


end:
echo json_encode($response);
?>


