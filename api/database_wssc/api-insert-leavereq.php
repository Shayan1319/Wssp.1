<?php
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-type, Access-Control-Allow-Methods, Authorization, X-requested-with');

$data = json_decode(file_get_contents("php://input"), true);

$EmployeeNo = $data['EmployeeNo'];
$PhoneNumberOnLeave = $data['PhoneNumberOnLeave'];
$LeaveType = strtoupper($data['LeaveType']);
$LeaveFrom = $data['LeaveFrom'];
$LeaveTo = $data['LeaveTo'];
$TotalDays = $data['TotalDays'];
$LeaveAvailed = $data['LeaveAvailed'];
$Description = $data['Description']; // corrected the variable name

include "config.php";

$sql = "INSERT INTO leavereq (EmployeeNo, PhoneNumberOnLeave, LeaveType, LeaveFrom, LeaveTo, TotalDays, LeaveAvailed, Description) VALUES ('$EmployeeNo', '$PhoneNumberOnLeave', '$LeaveType', '$LeaveFrom', '$LeaveTo', '$TotalDays', '$LeaveAvailed', '$Description')";

if (mysqli_query($conn, $sql)) {
    echo json_encode(array('message' => 'Inserted', 'status' => true));
} else {
    echo json_encode(array('message' => 'Not inserted', 'status' => false));
}
?>
