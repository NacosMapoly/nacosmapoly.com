<?php
//=========================================================================================================================
$thename='NACOS MAPOLY';
$apiKey = isset($_SERVER['HTTP_APIKEY']) ? $_SERVER['HTTP_APIKEY'] : null;
$expected_api_key='cb7821c2-64bd-439a-ac30-0xcbad050d61';

$ip_address=$_SERVER['REMOTE_ADDR']; //ip used
$system_name=gethostname();//computer used
// Get user agent (browser/device information)
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$deviceUsedDetails = $ip_address.'|'.$system_name.'|'.$user_agent;
/// all constance
$websiteUrl='https://nacosmapoly.com';
//$websiteUrl='http://localhost/projects/nacosmapoly.com';
$PAYSTACK_PAYMENT_KEY_TEST = 'pk_live_c90acf8a2f81f1eda8c7434f1bc0529e85b72961';
?>