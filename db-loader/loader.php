<?php 

define("DB_HOST", "localhost");
define("DB_USERNAME", "mapolynacos_usr_0110");
define("DB_PASSWORD", "XqG;afSr-=?#");
define("DB_NAME", "mapolynacos_nacos_app");


$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
if(!$connection)
    die("Error connecting to database");


$loadFilePath = "records.csv";

$loadFile = fopen($loadFilePath, "r+");
$sql = "INSERT INTO users(id,firstname,lastname,othername,email,matric_number,level,gender,phone,programme_mode,course_of_study, created_at, `status`) VALUES";
while(!feof($loadFile)){
    $data = fgets($loadFile);
    if(!$data)
        continue;
    $records = explode(",", $data);
    $rec = '';
    foreach($records as $item){
        $item = trim($item);
        $rec .= "'$item',";
    }
    $id = uniqid(mt_rand(1000,9999));
    $status = '1';
    $created_at = date("Y-m-d", time());
    $rec = "'$id',".$rec."'$created_at', '$status'";
    $rec = trim($rec, ',');
    $sql .= "($rec),";
}
$sql = trim($sql, ',');
mysqli_query($connection, $sql);
echo "Done";