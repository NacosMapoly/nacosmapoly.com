<?php require_once '../config/connection.php'; ?>
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
    $prog_mode_id = trim(($_POST['prog_mode_id']));
    
    $getDetails = mysqli_query($conn, "SELECT * FROM setup_programme_mode_tab") or die(mysqli_error($conn));
    $getCount = mysqli_num_rows($getDetails);

    if ($getCount > 0) {
        while ($fetchDetails = mysqli_fetch_all($getDetails, MYSQLI_ASSOC)) {
            $response = [
                'response'=> 400,
                'success' => true,
                'message' => 'PROGRAMME FETCH SUCCESSFULLY!',
                'data' => $fetchDetails,
            ];
        }
    } else {
        $response = [
            'response'=> 200,
            'success' => false,
            'message' => 'NO RECORD FOUND!',
        ];
    }

end:
echo json_encode($response);
?>


