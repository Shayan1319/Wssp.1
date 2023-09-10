<?php
header('Content-type: application/json');
header('Acces-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-type, Access-Control-Allow-Methods, Authoization, X-requested-with');
$data = json_decode(file_get_contents("php://input"), true);
// $name=$data['id'];
// $number=$data['Image'];
// $email=$data['Address'];
// $address=$data['Detail'];
// $password=$data['Type'];
$name=$data['name'];
$number=$data['number'];
$email=$data['email'];
$address=$data['address'];
$password=$data['password'];
include "config.php";
// $sql= "INSERT INTO singin( Image,Address ,Detail,Type ) VALUES ('{$Imagename}','{$Address}','{$Detail}','{$Type}')";
$sql= "INSERT INTO `singin`( `name`, `number`, `email`, `address`, `password`) VALUES ('$name','$number','$email','$address','$password')";

// if=mysqli_query($conn,$sqli ){
    if(mysqli_query($conn,$sql)){
    // echo jason_encode(array('message' =>'inserted', 'status'=> true)); 
    echo json_encode(array('message' =>'inserted', 'status'=> true)); 
}else{
    // echo jason_encode(array('message' =>'No Record inserted', 'status'=> false)); 
    echo json_encode(array('message' =>'No Record inserted', 'status'=> false)); 
}

?>
