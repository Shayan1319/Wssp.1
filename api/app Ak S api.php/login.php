<?php
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-type, Access-Control-Allow-Methods, Authorization, X-requested-with');

$data = json_decode(file_get_contents("php://input"), true);
$email = $data['email'];
$password = $data['password'];

include "config.php";

// Check if the user exists
$sql = "SELECT * FROM `singin` WHERE `email`='$email' AND `password`='$password'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    // User found, send success response
    $user = mysqli_fetch_assoc($result);
    unset($user['password']); // Remove password from response for security
    echo json_encode(array('message' => 'Login successful', 'status' => true, 'user' => $user));
} else {
    // User not found, send error response
    echo json_encode(array('message' => 'Login failed', 'status' => false));
}
?>
