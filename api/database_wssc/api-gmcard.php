<?php
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
include "../../link/desigene/db.php";
$currentDate = date('Y-m-d');
// Query to count the number of employees 
$query = mysqli_query($conn, "SELECT COUNT(id) AS total_employees FROM employeedata");
$row = mysqli_fetch_array($query);
$employeeCountotal = $row['total_employees'];
// Query to count the number of employees with status 'PRESENT' on the current date
$sql = "SELECT COUNT(DISTINCT e.EmployeeNo) AS employeeCount FROM employeedata AS e INNER JOIN atandece AS a ON e.EmployeeNo = a.Employeeid WHERE a.status = 'PRESENT' AND a.Date = '$currentDate'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $employeeCount = $row['employeeCount'];
} else {
    $employeeCount = 0;
}
// Query to count the number of employees with status 'ABSENT' on the current date
$sql = "SELECT COUNT(DISTINCT e.EmployeeNo) AS employeeCountABSENT FROM employeedata AS e INNER JOIN atandece AS a ON e.EmployeeNo = a.Employeeid WHERE a.status = 'ABSENT' AND a.Date = '$currentDate'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $employeeCountABSENT = $row['employeeCountABSENT'];
} else {
    $employeeCountABSENT = 0;
}
// Query to count the number of employees with DDorOT 'DOUBLE DUTY' on the current date
$sql = "SELECT COUNT(DISTINCT e.EmployeeNo) AS employeeCountDDorOT FROM employeedata AS e INNER JOIN atandece AS a ON e.EmployeeNo = a.Employeeid WHERE a.DDorOT = 'DOUBLE DUTY' AND a.Date = '$currentDate'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $employeeCountDDorOT = $row['employeeCountDDorOT'];
} else {
    $employeeCountDDorOT = 0;
}
// Query to count the number of employees with DDorOT 'OVERTIME' on the current date
$sql = "SELECT COUNT(DISTINCT e.EmployeeNo) AS employeeCountOVERTIME FROM employeedata AS e INNER JOIN atandece AS a ON e.EmployeeNo = a.Employeeid WHERE a.DDorOT = 'OVERTIME' AND a.Date = '$currentDate'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $employeeCountOVERTIME = $row['employeeCountOVERTIME'];
} else {
    $employeeCountOVERTIME = 0;
} 

// leave 
$sql = "SELECT COUNT(DISTINCT e.EmployeeNo) AS totalPendingLeaves
        FROM employeedata AS e
        INNER JOIN leavereq AS l ON e.EmployeeNo = l.EmployeeNo
        WHERE l.StatusofGm = 'PENDING' AND l.LeaveFrom >= '$currentDate'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalPendingLeaves = $row['totalPendingLeaves'];
} else {
    $totalPendingLeaves = 0;
}
$sql = "SELECT COUNT(DISTINCT e.EmployeeNo) AS totalAcceptLeaves
        FROM employeedata AS e
        INNER JOIN leavereq AS l ON e.EmployeeNo = l.EmployeeNo
        WHERE l.StatusofGm = 'ACCPET' AND l.Statusofmanger = 'ACCPET' AND l.LeaveFrom = '$currentDate'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalAcceptLeaves = $row['totalAcceptLeaves'];
} else {
    $totalAcceptLeaves = 0;
}
$sql = "SELECT COUNT(DISTINCT e.EmployeeNo) AS totalAPROVELeaves
        FROM employeedata AS e
        INNER JOIN leavereq AS l ON e.EmployeeNo = l.EmployeeNo
        WHERE l.StatusofGm = 'ACCPET' AND l.LeaveFrom >= '$currentDate'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalAPROVELeaves = $row['totalAPROVELeaves'];
} else {
    $totalAPROVELeaves = 0;
}

$sql = "SELECT COUNT(DISTINCT e.EmployeeNo) AS totalREJECTEDLeaves
        FROM employeedata AS e
        INNER JOIN leavereq AS l ON e.EmployeeNo = l.EmployeeNo
        WHERE l.StatusofGm = 'REJECTED' AND l.LeaveFrom >= '$currentDate'";

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
        WHERE  l.LeaveFrom >= '$currentDate'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalLeaves = $row['totalLeaves'];
} else {
    $totalLeaves = 0;
}
// Payroll
$query = mysqli_query($conn, "SELECT SUM(rate) AS total_rate FROM rate WHERE MONTH(Date) = MONTH(CURRENT_DATE()) AND YEAR(Date) = YEAR(CURRENT_DATE())");

if ($query) {
    $result = mysqli_fetch_assoc($query);
    $total_rate = $result['total_rate'];
    if($total_rate = 0){
        $total_rate = 0;
    }
}
$query = mysqli_query($conn, "SELECT SUM(rate) AS total_rate_wssc FROM rate WHERE EmployementType = 'WSSC' AND MONTH(Date) = MONTH(CURRENT_DATE()) AND YEAR(Date) = YEAR(CURRENT_DATE());");
if ($query) {
    $result = mysqli_fetch_assoc($query);
    $total_rate_wssc = $result['total_rate_wssc'];
    if($total_rate_wssc = 0){
        $total_rate_wssc = 0;
    }
}                          
$query = mysqli_query($conn, "SELECT SUM(rate) AS total_rate_tma FROM rate WHERE EmployementType = 'TMA' AND MONTH(Date) = MONTH(CURRENT_DATE()) AND YEAR(Date) = YEAR(CURRENT_DATE())");
if ($query) {
    $result = mysqli_fetch_assoc($query);
    $total_rate_tma = $result['total_rate_tma'];
    if($total_rate_tma = 0){
        $total_rate_tma = 0;
    }
} 
$query = mysqli_query($conn, "SELECT(SELECT SUM(rate) FROM rate WHERE EmployementType = 'TMA' AND MONTH(Date) = MONTH(CURRENT_DATE()) AND YEAR(Date) = YEAR(CURRENT_DATE())) -(SELECT SUM(rate) FROM rate WHERE EmployementType = 'WSSC' AND MONTH(Date) = MONTH(CURRENT_DATE()) AND YEAR(Date) = YEAR(CURRENT_DATE())) AS rate_difference;");
if ($query) {
    $result = mysqli_fetch_assoc($query);
    $rate_difference = $result['rate_difference'];
    if($rate_difference = 0){
        $rate_difference = 0;
    }
} 
$query = mysqli_query($conn, "SELECT (SELECT SUM(rate) FROM rate WHERE MONTH(Date) = MONTH(CURRENT_DATE()) AND YEAR(Date) = YEAR(CURRENT_DATE())) -(SELECT SUM(rate) FROM rate WHERE MONTH(Date) = MONTH(CURRENT_DATE() - INTERVAL 1 MONTH) AND YEAR(Date) = YEAR(CURRENT_DATE() - INTERVAL 1 MONTH)) AS rate_difference_previous_month;");
if ($query) {
    $result = mysqli_fetch_assoc($query);
    $rate_difference_previous_month = $result['rate_difference_previous_month'];
    if($rate_difference_previous_month = 0){
        $rate_difference_previous_month = 0;
    }
} 
$query = mysqli_query($conn, "SELECT COUNT(id) AS total_employees FROM employeedata WHERE `Online Status`='PENDING'");
if (mysqli_num_rows($query)) {
    $result = mysqli_fetch_assoc($query);
    $total_employees = $result['total_employees'];
  }   else{
        $total_employees = 0;
    }

// Query to count the number of distinct employees with added payroll
$query = mysqli_query($conn, "SELECT COUNT(DISTINCT employee_id) AS total_employees_witout_payroll FROM rate");
if ($query) {
    $result = mysqli_fetch_assoc($query);
    $total_employees_witout_payroll = $result['total_employees_witout_payroll'];
    if($total_employees_witout_payroll = 0){
        $total_employees_witout_payroll = 0;
    }
} 
// Query to count the number of distinct employees with added payroll
$query = mysqli_query($conn, "SELECT  COUNT(id) AS total_employees_payroll FROM rate");
if ($query) {
    $result = mysqli_fetch_assoc($query);
    $total_employees_payroll = $result['total_employees_payroll'];
    if($total_employees_payroll = 0){
        $total_employees_payroll = 0;
    }
} 
// taravel request

$sql = "SELECT COUNT(DISTINCT e.EmployeeNo) AS TravelReq
        FROM employeedata AS e
        INNER JOIN travelrequest AS t ON e.EmployeeNo = t.EmployeeNo
        WHERE t.DepartureOn >= '$currentDate'";

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
        WHERE t.Statusofmanger = 'ACCPET' AND t.StatusofGM = 'ACCPET' AND t.DepartureOn >= '$currentDate'";

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
        WHERE t.Statusofmanger = 'ACCPET' AND t.StatusofGM = 'PENDING' AND t.DepartureOn >= '$currentDate'";

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
        WHERE t.Statusofmanger = 'ACCPET' AND t.StatusofGM = 'REJECTED' AND t.DepartureOn >= '$currentDate'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $TravelReqREJECTED = $row['TravelReqREJECTED'];
} else {
    $TravelReqREJECTED = 0;
}

// Your database connection code here

$sql = "SELECT COUNT(*) AS EmployeeCountexp
        FROM employeedata
        WHERE Contract_Expiry_Date <= DATE_SUB(CURRENT_DATE(), INTERVAL 3 MONTH)";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $employeeCountexp = $row['EmployeeCountexp'];
    
} else {
  $employeeCountexp =0;
}
// Tabill
$sql = "SELECT COUNT(DISTINCT e.EmployeeNo) AS 
        Tabill FROM employeedata AS e 
        INNER JOIN tabill AS t ON e.EmployeeNo = t.EmployeeNo
        INNER JOIN travelrequest AS tr ON t.RequestNoTravel=tr.RequestNo
        WHERE tr.Statusofmanger = 'ACCPET' AND tr.StatusofGM = 'ACCPET' AND t.DateofApply >= '$currentDate'";

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
        WHERE tr.Statusofmanger = 'ACCPET' AND tr.StatusofGM = 'ACCPET' AND t.Statusofmanger = 'ACCPET' AND t.StatusofGM = 'ACCPET' AND t.DateofApply >= '$currentDate'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $tabillAprove = $row['tabillAprove'];
} else {
    $tabillAprove = 0;
}
$sql = "SELECT COUNT(DISTINCT e.EmployeeNo) AS tabillaccept
        FROM employeedata AS e
        INNER JOIN tabill AS t ON e.EmployeeNo = t.EmployeeNo
        INNER JOIN travelrequest AS tr ON t.RequestNoTravel=tr.RequestNo
        WHERE tr.Statusofmanger = 'ACCPET' AND tr.StatusofGM = 'ACCPET' AND t.Statusofmanger = 'ACCPET' AND t.StatusofGM = 'ACCPET' AND t.DateofApply >= '$currentDate'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $tabillaccept = $row['tabillaccept'];
} else {
    $tabillaccept = 0;
}
$sql = "SELECT COUNT(DISTINCT e.EmployeeNo) AS tabillPENDING
        FROM employeedata AS e
        INNER JOIN tabill AS t ON e.EmployeeNo = t.EmployeeNo
        INNER JOIN travelrequest AS tr ON t.RequestNoTravel=tr.RequestNo
        WHERE tr.Statusofmanger = 'ACCPET' AND tr.StatusofGM = 'ACCPET' AND t.Statusofmanger = 'ACCPET' AND t.StatusofGM = 'PENDING' AND t.DateofApply >= '$currentDate'";

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
        WHERE tr.Statusofmanger = 'ACCPET' AND tr.StatusofGM = 'ACCPET' AND t.Statusofmanger = 'ACCPET' AND t.StatusofGM = 'REJECTED' AND t.DateofApply >= '$currentDate'";

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
    'totalPendingLeaves'=>$totalPendingLeaves,
    'totalAcceptLeaves'=>$totalAcceptLeaves,
    'totalAPROVELeaves'=>$totalAPROVELeaves,
    'totalREJECTEDLeaves'=>$totalREJECTEDLeaves,
    'totalLeaves'=>$totalLeaves,
    'TravelReq'=>$TravelReq,
    'TravelReqAprove'=>$TravelReqAprove,
    'TravelReqPENDING'=>$TravelReqPENDING,
    'TravelReqREJECTED'=>$TravelReqREJECTED,
    'Tabill'=>$Tabill,
    'tabillAprove'=>$tabillAprove,
    'tabillaccept'=>$tabillaccept,
    'tabillPENDING'=>$tabillPENDING,
    'tabillREJECTED'=>$tabillREJECTED,
    'total_employees'=>$total_employees,
    'employeeCountexp'=>$employeeCountexp,
    'total_rate'=> $total_rate,
    'total_rate_wssc'=> $total_rate_wssc,
    'total_rate_tma'=> $total_rate_tma,
    'rate_difference'=> $rate_difference,
    'rate_difference_previous_month'=> $rate_difference_previous_month,
    'total_employees_witout_payroll'=> $total_employees_witout_payroll,
    'total_employees_payroll'=> $total_employees_payroll
);

// Output the data as JSON
echo json_encode($data);
?>