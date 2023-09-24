<?php
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-type, Access-Control-Allow-Methods, Authorization, X-requested-with');

$data = json_decode(file_get_contents("php://input"), true);

$EmployeeId = $data['EmployeeId'];
$date = date('Y-m-d'); // Use 'Y-m-d' format for MySQL DATE type

include('../link/desigene/db.php'); // Make sure to include your database connection file

$update=mysqli_query($conn,"UPDATE `leavereq` SET `Statusofmanger`='REJECTED', `DateOfAccepManager`='$date' WHERE  `Id`=$id");
if ($update) {
    echo json_encode(array('message' => 'Record updated successfully', 'status' => true));
} else {
    echo json_encode(array('message' => 'Record update failed', 'status' => false));
}




?>