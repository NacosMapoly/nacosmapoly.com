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
		$page_category_id=trim(strtolower($_POST['page_category_id']));
		$event_cat_id = trim(strtoupper($_POST['event_cat_id']));
		$reg_title =str_replace("'", "\'", ($_POST['reg_title']));
		$event_date=trim($_POST['event_date']);
		$event_start_time=trim($_POST['event_start_time']);
		$event_start_meridian = trim(strtoupper($_POST['event_start_meridian']));
		$event_end_time=trim($_POST['event_end_time']);
		$event_end_meridian = trim(strtoupper($_POST['event_end_meridian']));
		$event_location=trim($_POST['event_location']);
		$reg_thumbnail=$_FILES['reg_thumbnail']['name'];
		$status_id=trim($_POST['status_id']);
			
		if (empty($page_category_id)){
			$response = [
				'response'=> 400,
				'success'=> false,
				'message'=> 'PAGE CATEGORY ID REQUIRED! Check page category ID and try again.'
			];
			goto end;
		}	
		if (empty($event_cat_id)){
			$response = [
				'response'=> 400,
				'success'=> false,
				'message'=> 'EVENT CATEGORY ID REQUIRED! Check event category and try again.'
			];
			goto end;
		}		
		
		if (empty($reg_title)){
			$response = [
				'response'=> 400,
				'success'=> false,
				'message'=> 'EVENT TITLE REQUIRED! Check event title and try again.'
			];
			goto end;
		}

		if (empty($event_date)){
			$response = [
				'response'=> 400,
				'success'=> false,
				'message'=> 'EVENT DATE REQUIRED! Check event date and try again.'
			];
			goto end;
		}

		if (empty($event_start_time)){
			$response = [
				'response'=> 400,
				'success'=> false,
				'message'=> 'EVENT START TIME REQUIRED! Check event start time and try again.'
			];
			goto end;
		}

		if (empty($event_start_meridian)){
			$response = [
				'response'=> 400,
				'success'=> false,
				'message'=> 'EVENT START MERIDIAN REQUIRED! Check event start meridian and try again.'
			];
			goto end;
		}

		if (empty($event_end_time)){
			$response = [
				'response'=> 400,
				'success'=> false,
				'message'=> 'EVENT END TIME REQUIRED! Check event end time and try again.'
			];
			goto end;
		}

		if (empty($event_end_meridian)){
			$response = [
				'response'=> 400,
				'success'=> false,
				'message'=> 'EVENT END MERIDIAN REQUIRED! Check event end meridian and try again.'
			];
			goto end;
		}

		if (empty($event_location)){
			$response = [
				'response'=> 400,
				'success'=> false,
				'message'=> 'EVENT LOCATION REQUIRED! Check event location and try again.'
			];
			goto end;
		}

		if (!$reg_thumbnail){
			$response = [
				'response'=> 400,
				'success'=> false,
				'message'=> 'EVENT PICTURE REQUIRED! check event image and try again.'
			];
			goto end;
		}

		if (empty($status_id)){
			$response = [
				'response'=> 400,
				'success'=> false,
				'message'=> 'STATUS REQUIRED! Select the status and try again.'
			];
			goto end;
		}

			$title_check=mysqli_query($conn,"SELECT reg_title FROM publish_tab WHERE reg_title='$reg_title' AND page_category_id='$page_category_id' ");
			$checkCount=mysqli_num_rows($title_check);

			if ($checkCount>0){ 
				$response = [
					'response' => 400,
					'success' => false,
					'message' => "EVENT TITLE NOT ACCETABLE! Event already exist"
				]; 

				$alert_detail="EVENT REGISTRATION FAILED: event with title $reg_title can not be registered as its already exist. By ADMIN: $login_staff_fullname";	
				$callclass->_alert_sequence_and_update($conn,$login_staff_id,$login_staff_fullname,$login_role_id,$alert_detail,$ip_address,$system_name);
				goto end;
			}	
				$getDetail=$callclass->_get_setup_backend_settings_detail($conn, 'BK_ID001');
				$array = json_decode($getDetail, true);
				$current_academics_session= $array[0]['current_academics_session'];

				//////////////geting sequence//////////////////////////
				$sequence=$callclass->_get_sequence_count($conn, 'EVENT');
				$array = json_decode($sequence, true);
				$no= $array[0]['no'];

				/// Generate Publish ID ///////
				$publish_id='EVENT'.$no.date("Ymdhis");

				$allowedExts = array("jpg", "jpeg", "JPEG", "JPG", "gif", "png","PNG","GIF","webp","WEBP");
				$extension = pathinfo($_FILES['reg_thumbnail']['name'], PATHINFO_EXTENSION);
				
				if (!in_array(($extension), $allowedExts)) {
					$response = [
						'response' => 108,
						'success' => false,
						'message' => 'INVALID PICTURE FORMAT! Check the picture format and try again.'
					];  
					goto end;
				}

					$datetime = date("Ymdhi");
					$reg_thumbnail = $publish_id . '_' . $datetime . '_' . $reg_thumbnail;
					$uploadPath = $eventProfilePixPath . $reg_thumbnail;
			
						if (!move_uploaded_file($_FILES["reg_thumbnail"]["tmp_name"], $uploadPath)) {
							$response = [
								'response' => 109,
								'success' => false,
								'message' => 'PICTURE UPLOAD ERROR! Contact your Engineer For Help'
							];  
							goto end;
						}

						$event_date_with_time = "$event_date $event_start_time:00 $event_start_meridian"; 

						/// Insert Into Publish Tab///////
						mysqli_query($conn,"INSERT INTO `publish_tab`
						(`academics_session`,`page_category_id`, `publish_id`, `reg_title`, `event_cat_id`, `event_date`, `event_start_time`, `event_start_meridian`, `event_end_time`, `event_end_meridian`, `event_location`, `reg_pix`, `status_id`, `modified_by`, `created_time`, `updated_time`) VALUES  
						('$current_academics_session', '$page_category_id', '$publish_id', '$reg_title', '$event_cat_id', '$event_date_with_time', '$event_start_time', '$event_start_meridian', '$event_end_time', '$event_end_meridian', '$event_location', '$reg_thumbnail', '$status_id', '$login_staff_id', NOW(), NOW())")or die (mysqli_error($conn));

						$page_cat_array=$callclass->_get_setup_page_category_detail($conn, $page_category_id);
						$fetch_page_cat = json_decode($page_cat_array, true);
						$page_category_name= $fetch_page_cat[0]['page_category_name'];

						$response = [
							'response'=> 200,
							'success'=> true,
							'message'=> "SUCCESS! Event Registration Successful!",
							'publish_id'=> $publish_id
						]; 
						/////////// get alert//////////////////////////////////
						$alert_detail="Success Alert: A $page_category_name was created successfully by  $login_staff_fullname. DETAILS: Title: $reg_title | ID: $publish_id";
						$callclass->_alert_sequence_and_update($conn,$login_staff_id,$login_staff_fullname,$login_role_id,$alert_detail,$ip_address,$system_name);
		
		
end:
echo json_encode($response);
?>