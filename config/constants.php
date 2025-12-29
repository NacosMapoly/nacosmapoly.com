<?php
	error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_WARNING);
	$website_auto_url =(isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$thename='NACOS MAPOLY'; 

	// ---------------- Local URL ---------------------------- //
	//$website_url='http://localhost/projects/nacosmapoly.com';
	//$code_version=date('Ymdhis');

	// -------------- Production URL --------------------- //
	//$website_url='http://192.168.236.51/projects/nacosmapoly.com';
	$website_url='https://nacosmapoly.com';
	$code_version='12.52';

	$nacos_student_registration_url=$website_url.'/sign-up/';
	$nacos_student_login_portal_url='https://app.nacosmapoly.com/';
	
	//-------------- SCHOOL URL ----------------------//
	$school_websites_url='https://mapoly.edu.ng/';
	$school_student_portal_url='https://v4.mapoly.edu.ng/dashboard';
?>

<script>
	//-----------  online constants -----------------------//
	var website_url='https://nacosmapoly.com';
	//var website_url='http://localhost/projects/nacosmapoly.com';
	//var website_url='http://192.168.236.51/projects/nacosmapoly.com';

	var apiKey ='cb7821c2-64bd-439a-ac30-0xcbad050d61';
	var endPoint=website_url+'/api/dev'; /// Server End Point url
	
	var user_signup_local_url=website_url+'/sign-up/config/code'; /// For Admin local_url //

	var admin_login_local_url=website_url+'/admin/config/code'; /// For Admin local_url //
	var index_local_url=website_url+'/config/code'; /// For Site local_url //
	var admin_local_portal_url=website_url+'/admin/a/config/code'; /// admin local portal url
	var admin_portal_url=website_url+'/admin/a'; /// admin portal url
	var admin_login_portal_url=website_url+'/admin'; /// For Admin local_url //
</script>

