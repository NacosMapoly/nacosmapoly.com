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

		$select=
			"SELECT 
			a.page_category_id, a.publish_id, a.course_level_id, a.course_study_title, 
			a.course_content, a.reg_pix, a.status_id, a.updated_time,b.status_name, 
			d.level_name, d.level_title, e.page_url, e.seo_description
			FROM 
				publish_tab a
			JOIN 
				setup_status_tab b ON a.status_id = b.status_id
			JOIN 
				setup_level_tab d ON a.course_level_id = d.level_id
			LEFT JOIN 
				pages_tab e ON a.publish_id = e.publish_id
			WHERE 
				a.page_category_id = 'course_category' 
				AND a.status_id = 1
			ORDER BY 
				a.created_time ASC;
			";
		
			$query=mysqli_query($conn,$select)or die (mysqli_error($conn));
			$all_record_count=mysqli_num_rows($query);

			if($all_record_count==0){
				$response = [
					'response'=> 400,
					'success'=> false,
					'message'=> 'No Record found!!!'
				];  
				goto end;
			}
			while ($fetch_query = mysqli_fetch_all($query, MYSQLI_ASSOC)) {
				foreach ($fetch_query as &$new_data) {
					$new_data['documentStoragePath'] = "$documentStoragePath/course-pix";
				}
				$response = [
					'response'=> 200,
					'success'=> true,
					'all_record_count'=> $all_record_count,
					'data'=>  $fetch_query
				];  
			}	
end:
echo json_encode($response);
?>