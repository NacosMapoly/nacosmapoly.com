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

    $getPictures ="SELECT 
    sn, publish_id, pictures
    FROM pages_pictures_tab
    ORDER BY RAND() LIMIT 12";

    $query=mysqli_query($conn,$getPictures)or die (mysqli_error($conn));

    $all_record_count=mysqli_num_rows($query);

    if($all_record_count==0){
        $response = [
            'response'=> 100,
            'success'=> false,
            'message'=> 'No Record found!!!'
        ];  
        goto end;
    }

    $response = [
        'response' => 200,
        'success' => true,
        'gallery' => array()
    ];
    
    while ($fetch_query = mysqli_fetch_assoc($query)) {
        $fetch_query['documentStoragePath'] = "$documentStoragePath/page-pictures/";
        $response['gallery'][] =$fetch_query;        
    }
   
end:
echo json_encode($response);
?>