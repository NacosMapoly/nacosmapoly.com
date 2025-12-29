<?php require_once '../config/connection.php'; ?>

<?php
if ($apiKey != $expected_api_key) { // start if 0
    $response = [
        'response' => 98,
        'success' => false,
        'message' => 'SECURITY ACCESS DENIED! You are not allowed to execute this command due to a security breach.'
    ];
    goto end;
}

$getDetails = mysqli_query($conn, "SELECT * FROM post_tab") or die(mysqli_error($conn));
$getCount = mysqli_num_rows($getDetails);
if ($getCount == 0) { /// start if 2
    $response = [
        'code' => 400,
        'success' => false,
        'message' => 'NO RECORD FOUND!',
    ];
    goto end;
}

while ($fetchDetails = mysqli_fetch_all($getDetails, MYSQLI_ASSOC)) {
    $response = [
        'code' => 200,
        'success' => true,
        'message' => 'POST FETCH SUCCESSFULLY!',
        'data' => $fetchDetails,
    ];
}


end:
echo json_encode($response);
?>


