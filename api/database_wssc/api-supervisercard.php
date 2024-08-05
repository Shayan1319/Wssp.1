<?php
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-type, Access-Control-Allow-Methods, Authorization, X-requested-with');
$data = json_decode(file_get_contents("php://input"), true);
include('../../link/desigene/db.php');
// Your existing code for fetching data goes here...
$currentDate = date('Y-m-d');


$emil = $data['Attendance_Supervisor_ID'];
// Query to count the number of employees 
$query = mysqli_query($conn, "SELECT COUNT(id) AS total_employees FROM employeedata WHERE `Attendance_Supervisor`=$emil");
$row = mysqli_fetch_array($query);
$employeeCountotal = $row['total_employees'];
// Query to count the number of employees with status 'PRESENT' on the current date
$sql = "SELECT COUNT(DISTINCT e.EmployeeNo) AS employeeCount FROM employeedata AS e INNER JOIN atandece AS a ON e.EmployeeNo = a.Employeeid WHERE a.status = 'PRESENT' AND a.Date = '$currentDate' AND e.Attendance_Supervisor = $emil";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $employeeCount = $row['employeeCount'];
} else {
    $employeeCount = 0;
}
// Query to count the number of employees with status 'ABSENT' on the current date
$sql = "SELECT COUNT(DISTINCT e.EmployeeNo) AS employeeCountABSENT FROM employeedata AS e INNER JOIN atandece AS a ON e.EmployeeNo = a.Employeeid WHERE a.status = 'ABSENT' AND a.Date = '$currentDate' AND e.Attendance_Supervisor = $emil";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $employeeCountABSENT = $row['employeeCountABSENT'];
} else {
    $employeeCountABSENT = 0;
}
// Query to count the number of employees with DDorOT 'DOUBLE DUTY' on the current date
$sql = "SELECT COUNT(DISTINCT e.EmployeeNo) AS employeeCountDDorOT FROM employeedata AS e INNER JOIN atandece AS a ON e.EmployeeNo = a.Employeeid WHERE a.DDorOT = 'DOUBLE DUTY' AND a.Date = '$currentDate' AND e.Attendance_Supervisor = $emil";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $employeeCountDDorOT = $row['employeeCountDDorOT'];
} else {
    $employeeCountDDorOT = 0;
}
// Query to count the number of employees with DDorOT 'OVERTIME' on the current date
$sql = "SELECT COUNT(DISTINCT e.EmployeeNo) AS employeeCountOVERTIME FROM employeedata AS e INNER JOIN atandece AS a ON e.EmployeeNo = a.Employeeid WHERE a.DDorOT = 'OVERTIME' AND a.Date = '$currentDate' AND e.Attendance_Supervisor = $emil";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $employeeCountOVERTIME = $row['employeeCountOVERTIME'];
} else {
    $employeeCountOVERTIME = 0;
} 


// leverequest 


$sql = "SELECT COUNT(DISTINCT e.EmployeeNo) AS totalAcceptLeaves
        FROM employeedata AS e
        INNER JOIN leavereq AS l ON e.EmployeeNo = l.EmployeeNo
        WHERE l.Statusofmanger = 'ACCPET' AND l.StatusofGm = 'ACCPET' AND l.LeaveFrom = '$currentDate' AND e.Attendance_Supervisor = $emil";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalAcceptLeaves = $row['totalAcceptLeaves'];
} else {
    $totalAcceptLeaves = 0;
}

$sql = "SELECT COUNT(DISTINCT e.EmployeeNo) AS totalREJECTEDLeaves
        FROM employeedata AS e
        INNER JOIN leavereq AS l ON e.EmployeeNo = l.EmployeeNo
        WHERE l.Statusofmanger = 'REJECTED' || l.StatusofGM = 'REJECTED' AND l.LeaveFrom >= '$currentDate' AND e.Attendance_Supervisor = $emil";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalREJECTEDLeaves = $row['totalREJECTEDLeaves'];
} else {
    $totalREJECTEDLeaves = 0;
}


$sql = "SELECT COUNT(DISTINCT e.EmployeeNo) AS totalLeaves
        FROM employeedata AS e
        INNER JOIN leavereq AS l ON e.EmployeeNo = l.EmployeeNo
        WHERE  l.LeaveFrom >= '$currentDate' AND e.Attendance_Supervisor = $emil";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalLeaves = $row['totalLeaves'];
} else {
    $totalLeaves = 0;
}
// travelrequest
// totle number of travle request
$sql = "SELECT COUNT(DISTINCT e.EmployeeNo) AS 
        TravelReq FROM employeedata AS e 
        INNER JOIN travelrequest AS t ON e.EmployeeNo = t.EmployeeNo
        WHERE t.DepartureOn >= '$currentDate' AND e.Attendance_Supervisor = $emil";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $TravelReq = $row['TravelReq'];
} else {
    $TravelReq = 0;
}
$sql = "SELECT COUNT(DISTINCT e.EmployeeNo) AS TravelReqAprove
        FROM employeedata AS e
        INNER JOIN travelrequest AS t ON e.EmployeeNo = t.EmployeeNo
        WHERE t.Statusofmanger = 'ACCPET' AND t.StatusofGM = 'ACCPET' AND t.DepartureOn >= '$currentDate' AND e.Attendance_Supervisor = $emil";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $TravelReqAprove = $row['TravelReqAprove'];
} else {
    $TravelReqAprove = 0;
}

$sql = "SELECT COUNT(DISTINCT e.EmployeeNo) AS TravelReqPENDING
        FROM employeedata AS e
        INNER JOIN travelrequest AS t ON e.EmployeeNo = t.EmployeeNo
        WHERE t.Statusofmanger = 'PENDING' || t.StatusofGM = 'PENDING' AND t.DepartureOn >= '$currentDate' AND e.Attendance_Supervisor = $emil";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $TravelReqPENDING = $row['TravelReqPENDING'];
} else {
    $TravelReqPENDING = 0;
}
$sql = "SELECT COUNT(DISTINCT e.EmployeeNo) AS TravelReqREJECTED
        FROM employeedata AS e
        INNER JOIN travelrequest AS t ON e.EmployeeNo = t.EmployeeNo
        WHERE t.Statusofmanger = 'REJECTED'|| t.StatusofGM = 'REJECTED' AND t.DepartureOn >= '$currentDate' AND e.Attendance_Supervisor = $emil";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $TravelReqREJECTED = $row['TravelReqREJECTED'];
} else {
    $TravelReqREJECTED = 0;
}

// Tabill
$sql = "SELECT COUNT(DISTINCT e.EmployeeNo) AS 
        Tabill FROM employeedata AS e 
        INNER JOIN tabill AS t ON e.EmployeeNo = t.EmployeeNo
        INNER JOIN travelrequest AS tr ON t.RequestNoTravel=tr.RequestNo
        WHERE tr.Statusofmanger = 'ACCPET' AND tr.StatusofGM = 'ACCPET' AND t.DateofApply >= '$currentDate' AND e.Attendance_Supervisor = $emil";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $Tabill = $row['Tabill'];
} else {
    $Tabill = 0;
}
$sql = "SELECT COUNT(DISTINCT e.EmployeeNo) AS tabillAprove
        FROM employeedata AS e
        INNER JOIN tabill AS t ON e.EmployeeNo = t.EmployeeNo
        INNER JOIN travelrequest AS tr ON t.RequestNoTravel=tr.RequestNo
        WHERE tr.Statusofmanger = 'ACCPET' AND tr.StatusofGM = 'ACCPET' AND t.Statusofmanger = 'ACCPET' AND t.StatusofGM = 'ACCPET' AND t.DateofApply >= '$currentDate' AND e.Attendance_Supervisor = $emil";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $tabillAprove = $row['tabillAprove'];
} else {
    $tabillAprove = 0;
}
$sql = "SELECT COUNT(DISTINCT e.EmployeeNo) AS tabillPENDING
        FROM employeedata AS e
        INNER JOIN tabill AS t ON e.EmployeeNo = t.EmployeeNo
        INNER JOIN travelrequest AS tr ON t.RequestNoTravel=tr.RequestNo
        WHERE tr.Statusofmanger = 'ACCPET' AND tr.StatusofGM = 'ACCPET' AND t.Statusofmanger = 'PENDING' || t.StatusofGM = 'PENDING' AND t.DateofApply >= '$currentDate' AND e.Attendance_Supervisor = $emil";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $tabillPENDING = $row['tabillPENDING'];
} else {
    $tabillPENDING = 0;
}
$sql = "SELECT COUNT(DISTINCT e.EmployeeNo) AS tabillREJECTED
        FROM employeedata AS e
        INNER JOIN tabill AS t ON e.EmployeeNo = t.EmployeeNo
        INNER JOIN travelrequest AS tr ON t.RequestNoTravel=tr.RequestNo
        WHERE tr.Statusofmanger = 'ACCPET' AND tr.StatusofGM = 'ACCPET' AND t.Statusofmanger = 'REJECTED' ||t.StatusofGM = 'REJECTED' AND t.DateofApply >= '$currentDate' AND e.Attendance_Supervisor = $emil";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $tabillREJECTED = $row['tabillREJECTED'];
} else {
    $tabillREJECTED = 0;
}
// Create an associative array to store the data
$data = array(
    'employeeCount'=>$employeeCount,
    'employeeCountABSENT'=>$employeeCountABSENT,
    'employeeCountDDorOT'=>$employeeCountDDorOT,
    'employeeCountOVERTIME'=>$employeeCountOVERTIME,
    'totalAcceptLeaves'=>$totalAcceptLeaves,
    'totalREJECTEDLeaves'=>$totalREJECTEDLeaves,
    'totalLeaves'=>$totalLeaves,
    'TravelReq'=>$TravelReq,
    'TravelReqAprove'=>$TravelReqAprove,
    'TravelReqPENDING'=>$TravelReqPENDING,
    'TravelReqREJECTED'=>$TravelReqREJECTED,
    'Tabill'=>$Tabill,
    'tabillAprove'=>$tabillAprove,
    'tabillPENDING'=>$tabillPENDING,
    'tabillREJECTED'=>$tabillREJECTED
);

// Output the data as JSON
echo json_encode($data);
?>