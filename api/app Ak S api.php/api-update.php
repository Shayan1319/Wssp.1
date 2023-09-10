<?php
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-type, Access-Control-Allow-Methods, Authorization, X-requested-with');

$data = json_decode(file_get_contents("php://input"), true);
$id = $data['updateid'];
$name = $data['name'];
$number = $data['number'];
$address = $data['address'];
$email = $data['email'];
$password = $data['password'];

include "config.php";

$sql = "UPDATE `singin` SET `name`='$name', `number`='$number', `email`='$email', `address`='$address', `password`='$password' WHERE `id`='$id'";

if (mysqli_query($conn, $sql)) {
    echo json_encode(array('message' => 'Updated', 'status' => true));
} else {
    echo json_encode(array('message' => 'Not updated', 'status' => false));
}
?>
