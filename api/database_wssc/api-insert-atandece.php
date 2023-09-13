<?php
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-type, Access-Control-Allow-Methods, Authorization, X-requested-with');
$data = json_decode(file_get_contents("php://input"), true);

$Employeeid = $data['Employeeid'];
$Shift = strtoupper($data['Shift']);
$Tehsil = strtoupper($data['Tehsil']);
$Area = strtoupper($data['Area']);
$Date = $data['Date'];
$DDorOT = strtoupper($data['DDorOT']);
$status = strtoupper($data['status']);

include "../../link/desigene/db.php";

$sql = "INSERT INTO `atandece`( `Employeeid`, `Shift`, `Tehsil`, `Area`, `Date`, `DDorOT`, `status`) VALUES ('$Employeeid','$Shift','$Tehsil','$Area','$Date','$DDorOT','$status')";

if (mysqli_query($conn, $sql)) {
    echo json_encode(array('message' => 'Inserted', 'status' => true));
} else {
    echo json_encode(array('message' => 'Not inserted', 'status' => false));
}
?>
