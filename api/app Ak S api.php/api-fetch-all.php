<?php
header('Content-type: application/json');
header('Acces-Control-Allow-Origin: *');
//$data=json-decode(file-get-contents("php://input"), true);
$data = json_decode(file_get_contents("php://input"), true);
include "config.php";
$sql= "SELECT * FROM `singin`";
$result=mysqli_query($conn,$sql )or die("sql query failed");
if(mysqli_num_rows($result)> 0){
$output=mysqli_fetch_all($result, MYSQLI_ASSOC);
echo json_encode($output);

}else{

    echo json_encode(array('message' =>'No Record Found', 'status'=> false)); 

}


?>