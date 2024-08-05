<?php
session_start();
error_reporting(0);
// links to database
include('link/desigene/db.php');
if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber']) || $_SESSION['Designation'] != 'GM') {
  // Log the unauthorized access attempt for auditing purposes
  error_log("Unauthorized access attempt. User: {$_SESSION['loginid']}");
  
  // Redirect to the logout page
  header("Location: ../logout.php");
  exit; // Ensure that the script stops execution after the header redirection
} else {
    // Your code for logged-in users goes here
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
$sql = "SELECT COUNT(*) AS timeperiod FROM salary WHERE `HrReview` = 'ACCEPT' AND `finace` = 'ACCEPT' AND `ceo` = 'PENDING'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $timeperiod = $row['timeperiod'];
} else {
    $timeperiod = 0;
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
$query = mysqli_query($conn, "SELECT COUNT(id) AS total_employees FROM atandece WHERE `GMStatus`='PENDING'");
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
$query = mysqli_query($conn, "SELECT COUNT(id) AS total_employees_payroll FROM rate");
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
$query = mysqli_query($conn,"SELECT COUNT(*) AS exit_form FROM employee_exit AS e
INNER JOIN employeedata AS l ON e.Employee_id = l.EmployeeNo
WHERE e.Handover_File IS NULL AND e.Handover_File_Remarks IS NULL AND e.Handover_Info IS NULL AND e.Handover_Info_Remarks IS NULL AND e.Capital_Equipment IS NULL AND e.Capital_Remarks IS NULL AND e.HOD_Other IS NULL AND e.HOD_Remarks IS NULL AND e.HOD_Approved_Date IS NULL;");
if ($query->num_rows > 0) {
  $row = $query->fetch_assoc();
  $exit_form = $row['exit_form'];
} else {
  $exit_form = 0;
}
$query = mysqli_query($conn,"SELECT COUNT(*) AS exit_form FROM employee_exit AS e
INNER JOIN employeedata AS l ON e.Employee_id = l.EmployeeNo
WHERE e.Handover_File IS NULL AND e.Handover_File_Remarks IS NULL AND e.Handover_Info IS NULL AND e.Handover_Info_Remarks IS NULL AND e.Capital_Equipment IS NULL AND e.Capital_Remarks IS NULL AND e.HOD_Other IS NULL AND e.HOD_Remarks IS NULL AND e.HOD_Approved_Date IS NULL;");
if ($query->num_rows > 0) {
  $row = $query->fetch_assoc();
  $exit_form = $row['exit_form'];
} else {
  $exit_form = 0;
}

$sql = "SELECT COUNT(*) AS Appraisals
FROM employee_performance AS t
INNER JOIN employeedata AS e ON e.EmployeeNo = t.EmployeeID
WHERE
        t.CEOQ1 IS NULL
        AND t.CEOQ2 IS NULL
        AND t.NameOfCountersigningOfficer IS NULL
        AND t.DesignationOfCountersigningOfficer IS NULL
        AND t.DateOfCountersigningOfficer IS NULL;
";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $Appraisals = $row['Appraisals'];
        }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <?php include ('link/links.php')?>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>
  <style>
     
      h4, h3 {
        text-align: center;
      }
      a{
        text-decoration: none;
      }
  </style>
  <body>
    <?php include('link/desigene/navbar.php')?>
    <?php include('link/desigene/sidebar copy.php')?>
    <div id="main">
        <div class="container-fluid py-5">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
              <div class="colmd-12 text-center">
              <?php $emil= $_SESSION['EmployeeNumber'];
                $select=mysqli_query($conn,"SELECT `fName`, `mName`, `lName` FROM `employeedata` WHERE `EmployeeNo` = '$emil'");
                $name=mysqli_fetch_assoc($select);
                ?>
                  <h1 style="color: darkblue;">WELCOME Mr <?php echo $name['fName'].' '.$name['mName'].' '.$name['lName']?></h1>
                  <h3> Manager</h3>
              </div>
            </div>
            <div class="col-lg-4 col-xs-12">
              <!-- small box -->
              <a href="EXITCLEARANCEFORM.php">
              <div class="small-box text-white" style="background-color:#6471d3" >
                <div class="inner">
                <h3><?php echo $exit_form?></h3>
                  <h4>Employee Clearance Form</h4>
                </div>
                <div class="icon" style=" color: #ffffff3d;" >
                <i class="fa-solid fa-person-walking-dashed-line-arrow-right"></i>
                </div>
              </div>
              </a>
            </div>
            <div class="col-lg-4 col-xs-12">
              <a href="aprasals.php">
                <!-- small box -->
              <div class="small-box text-white" style="background-color:#6471d3" >
                <div class="inner">
                  <h3><?php echo $Appraisals?></h3>
                  <h4>Employee Appraisal</h4>
                </div>
                <div class="icon" style="    color: #ffffff3d;" >
                <i class="fa-solid fa-person-circle-check"></i>
                </div>
              </div>
              </a>
            </div>
            <div class="col-lg-4 col-xs-12">
              <!-- small box -->
              <div class="small-box text-white" style="background-color:#6471d3" >
                <div class="inner">
                  <h3><?php echo $employeeCountexp?></h3>
                  <h4>Employee Contact Expiry</h4>
                </div>
                <div class="icon" style="    color: #ffffff3d;" >
                <i class="fa-solid fa-id-badge"></i>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-xs-12">
              <a href="employeeCountotal.php" style>
                <!-- small box -->
              <div class="small-box text-white" style="background-color:#6471d3" >
                <div class="inner">
                  <h3><?php echo $total_employees?></h3>
                  <h4>Total Employees Attendees Pending</h4>
                </div>
                <div class="icon" style=" color: #ffffff3d;" ><i class="fa-solid fa-person-digging"></i>
                </div>
              </div>
              </a>
            </div>
            
            <div class="col-lg-4 col-xs-12">
              <a href="employeeCountotal copy.php" style>
                <!-- small box -->
              <div class="small-box text-white" style="background-color:#6471d3" >
                <div class="inner">
                  <h3><?php echo $timeperiod ?></h3>
                  <h4>Employee pay</h4>
                </div>
                <div class="icon" style=" color: #ffffff3d;" ><i class="fa-solid fa-person-digging"></i>
                </div>
              </div>
              </a>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <h2>Travel request</h2>
            </div>
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box text-white" style="background-color:#7887f8" >
                <div class="inner">
                <h3><?php echo $TravelReq?>
              <script> var TravelReq= <?php echo $TravelReq?>;</script>
              </h3>
                  <h4>Number of Travel Request</h4>
                </div>
                <div class="icon">
                  <i class="fa fa-clock-o"></i>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box text-white" style="background-color:#7887f8" >
                <div class="inner">
                <h3><?php echo $TravelReqAprove?>
              <script> var TravelReqAprove= <?php echo $TravelReqAprove?>;</script>
              </h3>
                  <h4>Number of Travel Request Accepted</h4>
                </div>
                <div class="icon">
                  <i class="fa fa-clock-o"></i>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <a href="travelreq.php" style="text-decoration: none;">
              <div class="small-box text-white" style="background-color:#7887f8" >
                <div class="inner">
                <h3><?php echo $TravelReqPENDING?>
              <script> var TravelReqPENDING= <?php echo $TravelReqPENDING?>;</script>
              </h3>
                  <h4>Travel Request Pending</h4>
                </div>
                <div class="icon">
                  <i class="fa fa-clock-o"></i>
                </div>
              </div>
              </a>
            </div>
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <a href="travelRejecet.php" style="text-decoration: none;">
              <div class="small-box text-white" style="background-color:#7887f8" >
                <div class="inner">
                <h3><?php echo $TravelReqREJECTED?>
              <script> var TravelReqREJECTED= <?php echo $TravelReqREJECTED?>;</script>
              </h3>
                  <h4>Travel Request REJECTED</h4>
                </div>
                <div class="icon">
                  <i class="fa fa-clock-o"></i>
                </div>
              </div>
              </a>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <h2>PayRoll</h2>
            </div>
            <div class="col-lg-4 col-xs-12">
              <!-- small box -->
              <div class="small-box text-white" style="background-color:#7d8bf7e0;" >
                <div class="inner">
                  <h3><?php echo $total_rate ?></h3>
                  <h4>Total Amount Payroll of this Month</h4>
                </div>
                <div class="icon" style="color: #ffffff85;" >
                    <i class="fa-regular fa-credit-card"></i>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-xs-12">
              <!-- small box -->
              <div class="small-box text-white" style="background-color:#7d8bf7e0;" >
                <div class="inner">
                  <h3><?php echo $total_rate_wssc ?></h3>
                  <h4>Total Amount WSSC of This Month</h4>
                </div>
                <div class="icon" style="color: #ffffff85;" >
                <i class="fa-solid fa-rupee-sign"></i>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-xs-12">
              <!-- small box -->
              <div class="small-box text-white" style="background-color:#7d8bf7e0;" >
                <div class="inner">
                  <h3><?php echo $total_rate_tma ?></h3>
                  <h4>Total Amount TMA of This Month</h4>
                </div>
                <div class="icon" style="color: #ffffff85;" >
                <i class="fa-solid fa-rupee-sign"></i>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-xs-12">
              <!-- small box -->
              <div class="small-box text-white" style="background-color:#7d8bf7e0;" >
                <div class="inner">
                  <h3><?php echo $rate_difference ?></h3>
                  <h4>Amount Difference b/w WSSC And TMA</h4>
                </div>
                <div class="icon" style="color: #ffffff85;" >
                <i class="fa-solid fa-arrow-up-wide-short"></i><i class="fa-solid fa-arrow-down-wide-short"></i>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-xs-12">
              <!-- small box -->
              <div class="small-box text-white" style="background-color:#7d8bf7e0;" >
                <div class="inner">
                  <h3><?php echo $rate_difference_previous_month ?></h3>
                  <h4>Amount Difference Previous Month</h4>
                </div>
                <div class="icon" style="color: #ffffff85;" ><i class="fa-solid fa-chart-column"></i>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-xs-12">
              <!-- small box -->
              <div class="small-box text-white" style="background-color:#919df3;" >
                <div class="inner">
                  <h3><?php echo $total_employees_payroll?></h3>
                  <h4>Total Employees With Payroll</h4>
                </div>
                <div class="icon" style="color: #ffffff85;" ><i class="fa-solid fa-money-check-dollar"></i>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-xs-12">
              <!-- small box -->
              <div class="small-box text-white" style="background-color:#919df3;" >
                <div class="inner">
                  <h3><?php echo $total_employees_witout_payroll?></h3>
                  <h4>Total Employees Without Payroll</h4>
                </div>
                <div class="icon" style="color: #ffffff85;" ><i class="">💵</i>
                </div>
              </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <h2>TA Bill</h2>
            </div>
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box text-white" style="background-color:#919df3" >
                <div class="inner">
                <h3><?php echo $Tabill?>
              <script> var Tabill= <?php echo $Tabill?>;</script>
              </h3>
                  <h4>Number of TA Bill</h4>
                </div>
                <div class="icon">
                  <i class="fa fa-clock-o"></i>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box text-white" style="background-color:#919df3" >
                <div class="inner">
                <h3><?php echo $tabillAprove?>
              <script> var tabillAprove= <?php echo $tabillAprove?>;</script>
              </h3>
                  <h4>Number of TA Bill Accepted</h4>
                </div>
                <div class="icon">
                  <i class="fa fa-clock-o"></i>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <a href="aprovetabill.php" style="text-decoration: none;">
              <div class="small-box text-white" style="background-color:#919df3" >
                <div class="inner">
                <h3><?php echo $tabillaccept?>
              <script> var tabillaccept= <?php echo $tabillaccept?>;</script>
              </h3>
                  <h4>TA Bill Approved</h4>
                </div>
                <div class="icon">
                  <i class="fa fa-clock-o"></i>
                </div>
              </div>
              </a>
            </div>
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <a href="tabill.php" style="text-decoration: none;">
              <div class="small-box text-white" style="background-color:#919df3" >
                <div class="inner">
                <h3><?php echo $tabillPENDING?>
              <script> var tabillPENDING= <?php echo $tabillPENDING?>;</script>
              </h3>
                  <h4>TA bill Pending</h4>
                </div>
                <div class="icon">
                  <i class="fa fa-clock-o"></i>
                </div>
              </div>
              </a>
            </div>
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <a href="tabillRejecet.php" style="text-decoration: none;">
              <div class="small-box text-white" style="background-color:#919df3" >
                <div class="inner">
                <h3><?php echo $tabillREJECTED?>
              <script> var tabillREJECTED= <?php echo $tabillREJECTED?>;</script>
              </h3>
                  <h4>TA bill REJECTED</h4>
                </div>
                <div class="icon">
                  <i class="fa fa-clock-o"></i>
                </div>
              </div>
              </a>
            </div>
           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <h2>TODAY'S ATTENDANCE</h2>
            </div>
            <div class="col-lg-4 col-xs-12">
              <!-- small box -->
              <div class="small-box text-white" style="background-color:#b0b8fa;" >
                <div class="inner">
                  <h3>
                  <?php echo $employeeCountotal; ?>
                  <script> var employeeCountotal=<?php echo $employeeCountotal?>;</script>
                  </h3>
                  <h4>TOTAL ATTENDANCE</h4>
                </div>
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
              </div>
            </div>     
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box text-white" style="background-color:#b0b8fa;" >
                  <div class="inner">
                    <h3><?php echo $employeeCount; ?>
                  <script> var employeeCount=<?php echo $employeeCount?>;</script>
                  </h3>
                    <h4>PRESENT</h4>
                  </div>
                  <div class="icon">
                    <i class="fa fa-user"></i>
                  </div>
                </div>
              </div>
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box text-white" style="background-color:#b0b8fa;" >
                  <div class="inner">
                  <h3><?php echo $employeeCountABSENT; ?>
                <script> var employeeCountABSENT=<?php echo $employeeCountABSENT?>;</script>
                </h3>
                    <h4>ABSENT</h4>
                  </div>
                  <div class="icon">
                    <i class="fa fa-ban"></i>
                  </div>
                </div>
              </div>
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box text-white" style="background-color:#b0b8fa;" >
                  <div class="inner">
                  <h3><?php echo $totalAcceptLeaves?>
                <script> var Leaves = <?php echo $totalAcceptLeaves?>;</script>
                </h3>
                    <h4>LEAVE</h4>
                  </div>
                  <div class="icon">
                    <i class="fa fa-running"></i>
                  </div>
                </div>
              </div>
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box text-white" style="background-color:#b0b8fa;" >
                  <div class="inner">
                  <h3><?php echo $employeeCountOVERTIME;?>
                <script> var employeeOVERTIME = <?php echo $employeeCountOVERTIME?>;</script>
                </h3>
                    <h4>OVER TIME</h4>
                  </div>
                  <div class="icon">
                    <i class="fa fa-clock"></i>
                  </div>
                </div>
              </div>
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box text-white" style="background-color:#b0b8fa;" >
                  <div class="inner">
                  <h3><?php echo $employeeCountDDorOT;?>
                <script> var DDorOT = <?php echo $employeeCountDDorOT?>;</script>
                </h3>
                    <h4>DOUBLE DUTY</h4>
                  </div>
                  <div class="icon">
                    <i class="fa fa-gear"></i>
                  </div>
                </div>
              </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <h2>LEAVE REQUESTS</h2>
            </div>
            <div class="col-lg-4 col-xs-12">
              <!-- small box -->
              <div class="small-box text-white" style="background-color:#c7cdff;" >
                <div class="inner">
                <h3><?php echo $totalLeaves?>
              <script> var vetsciencestotalLeaves= <?php echo $totalLeaves?>;</script>
              </h3>
                  <h4>TOTAL LEAVE REQUEST</h4>
                </div>
                <div class="icon">
                  <i class="fa fa-bar-chart"></i>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
             <a href="aprove.php" style="text-decoration: none;" >
             <div class="small-box text-white" style="background-color:#c7cdff;" >
                <div class="inner">
                <h3><?php echo $totalAPROVELeaves?>
              <script> var vetsciencestotalAPROVELeaves= <?php echo $totalAPROVELeaves?>;</script>
              </h3>
                  <h4>APROVE</h4>
                </div>
                <div class="icon">
                  <i class="fa fa-check"></i>
                </div>
              </div>
             </a>
            </div>
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <a href="Leavereq.php" style="text-decoration: none;">
              <div class="small-box text-white" style="background-color:#c7cdff;" >
                <div class="inner">
                <h3><?php echo $totalPendingLeaves?>
              <script> var vetsciencestotalPendingLeaves= <?php echo $totalPendingLeaves?>;</script>
              </h3>
                  <h4>PENDING</h4>
                </div>
                <div class="icon">
                  <i class="fa fa-clock-o"></i>
                </div>
              </div>
              </a>
            </div>
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <a href="Reject.php" style="text-decoration: none;" >
              <div class="small-box text-white" style="background-color:#c7cdff;" >
                <div class="inner">
                <h3><?php echo $totalREJECTEDLeaves?>
              <script> var vetsciencestotalREJECTEDLeaves= <?php echo $totalREJECTEDLeaves?>;</script>
              </h3>
                  <h4>REJECTED</h4>
                </div>
                <div class="icon">
                  <i class="fa fa-ban"></i>
                </div>
              </div>
              </a>
            </div>
            <div class="col-lg-12 col-sm-12">
            <div class="row">
            <div class="col-sm-12 col-lg-6 col-md-6">
                    <div class="p-4"><iframe class="chartjs-hidden-iframe" style="display: block; overflow: hidden; border: 0px none; margin: 0px; inset: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;" tabindex="-1"></iframe>
                        <canvas id="myChart" style="width: 520px; max-width: 600px; display: block; height: 259px;" width="780" height="388"></canvas>
                        <script>
                            var xValues = ["Employee Coun", "Present", "Over Time", "Duble Duty", "Leaves"];
                            var yValues = [employeeCountotal, employeeCount, employeeOVERTIME, DDorOT, Leaves];
                            var barColors = ["#000C66", "#0000FF", "#055C9D", "#0E86D4", "#68BBE3"];

                            new Chart("myChart", {
                                type: "bar",
                                data: {
                                    labels: xValues,
                                    datasets: [{
                                        backgroundColor: barColors,
                                        data: yValues
                                    }]
                                },
                                options: {
                                    legend: {
                                        display: false
                                    },
                                    title: {
                                        display: true,
                                        text: ""
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6 col-md-6">
                    <div class="p-4"><iframe class="chartjs-hidden-iframe" style="display: block; overflow: hidden; border: 0px none; margin: 0px; inset: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;" tabindex="-1"></iframe>

                        <canvas id="myChart1" style="width: 400px; max-width: 400px; display: block; height: 400px;" width="600" height="600"></canvas>

                        <script>
                            var xValues = ["Employee Coun", "Present", "Over Time", "Duble Duty", "Leaves"];
                            var yValues = [employeeCountotal, employeeCount, employeeOVERTIME, DDorOT, Leaves];
                            var barColors = [
                                "#000C66",
                                "#0000FF",
                                "#055C9D",
                                "#0E86D4",
                                "#68BBE3"
                            ];

                            new Chart("myChart1", {
                                type: "pie",
                                data: {
                                    labels: xValues,
                                    datasets: [{
                                        backgroundColor: barColors,
                                        data: yValues
                                    }]
                                },
                                options: {
                                    title: {
                                        display: true,
                                        text: ""
                                    }
                                }
                            });
                        </script>

                    </div>
                </div>
            </div>
            </div>
          </div>
        </div>
    </div>
    <?php include('link/desigene/script.php')?>
  </body>
</html>
<?php
  }
?>