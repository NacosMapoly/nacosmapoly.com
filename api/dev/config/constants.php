<?php
//=========================================================================================================================
$thename='NACOS MAPOLY';
$apiKey = isset($_SERVER['HTTP_APIKEY']) ? $_SERVER['HTTP_APIKEY'] : null;
$expected_api_key='cb7821c2-64bd-439a-ac30-0xcbad050d61';

$ip_address=$_SERVER['REMOTE_ADDR']; //ip used
$system_name=gethostname();//computer used

/// all constance
$websiteUrl='https://nacosmapoly.com';
//$websiteUrl='http://localhost/projects/nacosmapoly.com';

$documentStoragePath=$websiteUrl.'/api/uploaded-files/dev';

$staffProfilePixPath = '../../../uploaded-files/dev/staff-pix/';
$excoProfilePixPath = '../../../uploaded-files/dev/exco-pix/';
$eventProfilePixPath = '../../../uploaded-files/dev/event-pix/';
$galleryProfilePixPath = '../../../uploaded-files/dev/gallery-pix/';
$seoflyerPixPath = '../../../../uploaded-files/dev/seo-flyer-pix/';
$publishPicturesPath = '../../../../uploaded-files/dev/page-pictures/';
$blogProfilePixPath = '../../../uploaded-files/dev/blog-pix/';
$pastQuestionPixPath = '../../../uploaded-files/dev/exam-material/exam-pix/';
$pastQuestionExamMaterialPath = '../../../uploaded-files/dev/exam-material/material/';
$courseContentPixPath = '../../../uploaded-files/dev/course-pix/';
?>