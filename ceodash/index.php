<?php
session_start();
error_reporting(0);
// links to database
include('link/desigene/db.php');
if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber']) || $_SESSION['Designation'] != 'CEO') {
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
        t.RemarksOfSecondCountersigningOfficer IS NULL
        AND t.NameOfSecondCountersigningOfficer IS NULL
        AND t.DesignationOfSecondCountersigningOfficer IS NULL
        AND t.DateOfSecondCountersigningOfficer IS NULL";
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
      #fullDiv ul {
          margin: 0;
          padding: 0;
      }
      
      #fullDiv li {
          float: left;
          display: block;
          width: 14.2857%;
          text-align: center;
          list-style-type: none;
      }
      
      #fullDiv li:nth-child(n+1):nth-child(-n+7) {
          font-weight: 900;
          color: #e67e22;
      }
      
      #fullDiv li:nth-child(n+39),
      #fullDiv li:nth-child(n+8):nth-child(-n+16) {
          font-weight: 900;
          color: rgba(0, 0, 0, .3);
      }
      
      #fullDiv li:hover:nth-child(n+8):nth-child(-n+38),
      #fullDiv li:nth-child(17) {
          border-radius: 5px;
          background-color: #1abc9c;
          color: #ecf0f1;
      }
      
      .form-group label {
          font-weight: bold;
      }
      /* width */
      
      ::-webkit-scrollbar {
          width: 20px;
      }
      /* Track */
      
      ::-webkit-scrollbar-track {
          box-shadow: inset 0 0 5px grey;
          border-radius: 10px;
      }
      /* Handle */
      
      ::-webkit-scrollbar-thumb {
          background: red;
          border-radius: 10px;
      }
      /* Handle on hover */
      
      ::-webkit-scrollbar-thumb:hover {
          background: #b30000;
      }
      h5, h3 {
        text-align: center;
      }
      a{
        text-decoration: none;
      }
  </style>
  <body>
    <div id="main">
        <?php include('link/desigene/navbar.php')?>
        <div class="container px-3 py-5">
          <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                
            </div>
            <div class="col-md-3 col-xs-12">
              <!-- small box -->
              <a href="EXITCLEARANCEFORM.php">
              <div style="background-color: #6471d3; text-decoration:none;" class="small-box text-white">
                <div class="inner">
                <h3><?php echo $exit_form?></h3>
                  <h5>Employee Clearance Form</h5>
                </div>
                
              </div>
              </a>
            </div><!-- ./col -->
            <div class="col-md-3 col-xs-12">
              <a href="aprasals.php">
                <!-- small box -->
              <div style="background-color: #6471d3; text-decoration:none;" class="small-box text-white">
                <div class="inner">
                  <h3><?php echo $Appraisals?></h3>
                  <h5>Employee Appraisal</h5>
                </div>
              </div>
              </a>
            </div><!-- ./col -->
            <div class="col-md-3 col-xs-12">
              <!-- small box -->
              <div style="background-color: #6471d3; text-decoration:none;" class="small-box text-white">
                <div class="inner">
                  <h3><?php echo $employeeCountexp?></h3>
                  <h5>Employee Contact Expiry</h5>
                </div>
              </div>
            </div><!-- ./col -->
            <div class="col-md-3 col-xs-12">
              <a href="" style>
                <!-- small box -->
              <div style="background-color: #6471d3; text-decoration:none;" class="small-box text-white">
                <div class="inner">
                  <h3><?php echo $total_employees?></h3>
                  <h5>Total Employees Pending</h5>
                </div>
              </div>
              </a>
            </div><!-- ./col -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <h3 style="color: darkblue;">Travel request</h3>
            </div>
            <div class="col-md-3 col-xs-6">
              <!-- small box -->
              <div class="small-box text-white" style="background-color:#7887f8 !important;" >
                <div class="inner">
                <h3><?php echo $TravelReq?>
              <script> var TravelReq= <?php echo $TravelReq?>;</script>
              </h3>
                  <h5>Total Number of Travel Request</h5>
                </div>
              </div>
            </div><!-- ./col -->
            <div class="col-md-3 col-xs-6">
              <!-- small box -->
              <div class="small-box text-white" style="background-color:#7887f8 !important;" >
                <div class="inner">
                <h3><?php echo $TravelReqAprove?>
              <script> var TravelReqAprove= <?php echo $TravelReqAprove?>;</script>
              </h3>
                  <h5>Number of Travel Request Accepted</h5>
                </div>
              </div>
            </div><!-- ./col -->
            <div class="col-md-3 col-xs-6">
              <!-- small box -->
              <a href="travelreq.php" style="text-decoration: none;">
              <div class="small-box text-white" style="background-color:#7887f8 !important;" >
                <div class="inner">
                <h3><?php echo $TravelReqPENDING?>
              <script> var TravelReqPENDING= <?php echo $TravelReqPENDING?>;</script>
              </h3>
                  <h5>Travel Request Pending</h5>
                </div>
              </div>
              </a>
            </div><!-- ./col -->
            <div class="col-md-3 col-xs-6">
              <!-- small box -->
              <a href="travelRejecet.php" style="text-decoration: none;">
              <div class="small-box text-white" style="background-color:#7887f8 !important;" >
                <div class="inner">
                <h3><?php echo $TravelReqREJECTED?>
              <script> var TravelReqREJECTED= <?php echo $TravelReqREJECTED?>;</script>
              </h3>
                  <h5>Travel Request Rejected</h5>
                </div>
              </div>
              </a>
            </div><!-- ./col -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <h3 style="color: darkblue;">TA Bill</h3>
            </div>
            <div class="col-md-3 col-xs-6">
              <!-- small box -->
              <div class="small-box text-white" style="background-color: #7d8bf7e0;">
                        <d;">
                <div class="inner">
                <h3><?php echo $Tabill?>
              <script> var Tabill= <?php echo $Tabill?>;</script>
              </h3>
                  <h5>Total Number of TA Bill</h5>
                </div>
              </div>
            </div><!-- ./col -->
            <div class="col-md-3 col-xs-6">
              <!-- small box -->
              <div class="small-box text-white" style="background-color: #7d8bf7e0;">
                        <d;">
                <div class="inner">
                <h3><?php echo $tabillAprove?>
              <script> var tabillAprove= <?php echo $tabillAprove?>;</script>
              </h3>
                  <h5>Number of TA Bill Accepted</h5>
                </div>
              </div>
            </div><!-- ./col -->
            <div class="col-md-3 col-xs-6">
              <!-- small box -->
              <a href="aprovetabill.php" style="text-decoration: none;">
              <div class="small-box text-white" style="background-color: #7d8bf7e0;">
                            <d;">
                <div class="inner">
                <h3><?php echo $tabillaccept?>
              <script> var tabillaccept= <?php echo $tabillaccept?>;</script>
              </h3>
                  <h5>TA Bill Approved</h5>
                </div>
              </div>
              </a>
            </div>
            <div class="col-md-3 col-xs-6">
              <!-- small box -->
              <a href="tabill.php" style="text-decoration: none;">
              <div class="small-box text-white" style="background-color: #7d8bf7e0;">
                            <d;">
                <div class="inner">
                <h3><?php echo $tabillPENDING?>
              <script> var tabillPENDING= <?php echo $tabillPENDING?>;</script>
              </h3>
                  <h5>TA Bill Pending</h5>
                </div>
              </div>
              </a>
            </div><!-- ./col -->
            <div class="col-md-3 col-xs-6">
              <!-- small box -->
              <a href="tabillRejecet.php" style="text-decoration: none;">
              <div class="small-box text-white" style="background-color: #7d8bf7e0;">
                            <d;">
                <div class="inner">
                <h3><?php echo $tabillREJECTED?>
              <script> var tabillREJECTED= <?php echo $tabillREJECTED?>;</script>
              </h3>
                  <h5>TA Bill Rejected</h5>
                </div>
              </div>
              </a>
            </div><!-- ./col -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <h3 style="color: darkblue;">PayRoll</h3>
            </div>
            <div class="col-md-3 col-xs-12">
              <!-- small box -->
              <div class="small-box text-white" style="background-color: #919df3;">
                        <d;" >
                <div class="inner">
                  <h3><?php echo $total_rate ?></h3>
                  <h5>Total Amount Payroll for this Month</h5>
                </div>
              </div>
            </div><!-- ./col -->
            <div class="col-md-3 col-xs-12">
              <!-- small box -->
              <div class="small-box text-white" style="background-color: #919df3;">
                        <d;" >
                <div class="inner">
                  <h3><?php echo $total_rate_wssc ?></h3>
                  <h5>Total Amount WSSC for this Month</h5>
                </div>
              </div>
            </div><!-- ./col -->
            <div class="col-md-3 col-xs-12">
              <!-- small box -->
              <div class="small-box text-white" style="background-color: #919df3;">
                        <d;" >
                <div class="inner">
                  <h3><?php echo $total_rate_tma ?></h3>
                  <h5>Total Amount TMA for this Month</h5>
                </div>
              </div>
            </div><!-- ./col -->
            <div class="col-md-3 col-xs-12">
              <!-- small box -->
              <div class="small-box text-white" style="background-color: #919df3;">
                        <d;" >
                <div class="inner">
                  <h3><?php echo $rate_difference ?></h3>
                  <h5>Amount Difference b/w WSSC And TMA</h5>
                </div>
              </div>
            </div><!-- ./col -->
            <div class="col-md-3 col-xs-12">
              <!-- small box -->
              <div class="small-box text-white" style="background-color: #919df3;">
                        <d;" >
                <div class="inner">
                  <h3><?php echo $rate_difference_previous_month ?></h3>
                  <h5>Amount Difference Previous Month</h5>
                </div>
              </div>
            </div><!-- ./col -->
            <div class="col-md-3 col-xs-12">
              <!-- small box -->
              <div class="small-box text-white" style="background-color: #919df3;">
                        <d;" >
                <div class="inner">
                  <h3><?php echo $total_employees_payroll?></h3>
                  <h5>Total Employees Witho Payroll</h5>
                </div>
              </div>
            </div><!-- ./col -->
            <div class="col-md-3 col-xs-12">
              <!-- small box -->
              <div class="small-box text-white" style="background-color: #919df3;">
                        <d;" >
                <div class="inner">
                  <h3><?php echo $total_employees_witout_payroll?></h3>
                  <h5>Total Employees Without Payroll</h5>
                </div>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <h3 style="color: darkblue;">TODAY'S ATTENDANCE</h3>
            </div>
            <div class="col-md-3 col-xs-12">
              <!-- small box -->
              <div class="small-box text-white" style="background-color: #b0b8fa;">
                        <d;" >
                <div class="inner">
                  <h3>
                  <?php echo $employeeCountotal; ?>
                  <script> var employeeCountotal=<?php echo $employeeCountotal?>;</script>
                  </h3>
                  <h5>TOTAL ATTENDANCE</h5>
                </div>
              </div>
            </div><!-- ./col -->     
            <div class="col-md-3 col-xs-6">
                <!-- small box -->
                <div class="small-box text-white" style="background-color: #b0b8fa;">
                        <d;" >
                  <div class="inner">
                    <h3><?php echo $employeeCount; ?>
                  <script> var employeeCount=<?php echo $employeeCount?>;</script>
                  </h3>
                    <h5>PRESENT</h5>
                  </div>
                </div>
              </div><!-- ./col -->
            <div class="col-md-3 col-xs-6">
                <!-- small box -->
                <div class="small-box text-white" style="background-color: #b0b8fa;">
                        <d;" >
                  <div class="inner">
                  <h3><?php echo $employeeCountABSENT; ?>
                <script> var employeeCountABSENT=<?php echo $employeeCountABSENT?>;</script>
                </h3>
                    <h5>ABSENT</h5>
                  </div>
                </div>
              </div><!-- ./col -->
            <div class="col-md-3 col-xs-6">
                <!-- small box -->
                <div class="small-box text-white" style="background-color: #b0b8fa;">
                        <d;" >
                  <div class="inner">
                  <h3><?php echo $totalAcceptLeaves?>
                <script> var Leaves = <?php echo $totalAcceptLeaves?>;</script>
                </h3>
                    <h5>LEAVE</h5>
                  </div>
                </div>
              </div><!-- ./col -->
            <div class="col-md-3 col-xs-6">
                <!-- small box -->
                <div class="small-box text-white" style="background-color: #b0b8fa;">
                        <d;" >
                  <div class="inner">
                  <h3><?php echo $employeeCountOVERTIME;?>
                <script> var employeeOVERTIME = <?php echo $employeeCountOVERTIME?>;</script>
                </h3>
                    <h5>OVER TIME</h5>
                  </div>
                </div>
              </div><!-- ./col -->
            <div class="col-md-3 col-xs-6">
                <!-- small box -->
                <div class="small-box text-white" style="background-color: #b0b8fa;">
                        <d;" >
                  <div class="inner">
                  <h3><?php echo $employeeCountDDorOT;?>
                <script> var DDorOT = <?php echo $employeeCountDDorOT?>;</script>
                </h3>
                    <h5>DOUBLE DUTY</h5>
                  </div>
                </div>
              </div><!-- ./col -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <h3 style="color: darkblue;">LEAVE REQUESTS</h3>
            </div>
            <div class="col-md-3 col-xs-12">
              <!-- small box -->
              <div class="small-box text-white" style="background:#c7cdff;;" >
                <div class="inner">
                <h3><?php echo $totalLeaves?>
              <script> var vetsciencestotalLeaves= <?php echo $totalLeaves?>;</script>
              </h3>
                  <h5>TOTAL LEAVE REQUEST</h5>
                </div>
              </div>
            </div><!-- ./col -->
            <div class="col-md-3 col-xs-6">
              <!-- small box -->
             <a href="aprove.php" style="text-decoration: none;" >
             <div class="small-box text-white" style="background:#c7cdff;;" >
                <div class="inner">
                <h3><?php echo $totalAPROVELeaves?>
              <script> var vetsciencestotalAPROVELeaves= <?php echo $totalAPROVELeaves?>;</script>
              </h3>
                  <h5>APROVE</h5>
                </div>
              </div>
             </a>
            </div><!-- ./col -->
            <div class="col-md-3 col-xs-6">
              <!-- small box -->
              <a href="Leavereq.php" style="text-decoration: none;">
              <div class="small-box text-white" style="background:#c7cdff;;" >
                <div class="inner">
                <h3><?php echo $totalPendingLeaves?>
                <script> var vetsciencestotalPendingLeaves= <?php echo $totalPendingLeaves?>;</script>
                </h3>
                    <h5>PENDING</h5>
                </div>
              </div>
              </a>
            </div><!-- ./col -->
            <div class="col-md-3 col-xs-6">
              <!-- small box -->
              <a href="Reject.php" style="text-decoration: none;" >
              <div class="small-box text-white" style="background:#c7cdff;;" >
                <div class="inner">
                <h3><?php echo $totalREJECTEDLeaves?>
              <script> var vetsciencestotalREJECTEDLeaves= <?php echo $totalREJECTEDLeaves?>;</script>
              </h3>
                  <h5>Rejected</h5>
                </div>
              </div>
              </a>
            </div><!-- ./col -->
            <div class="col-lg-12 col-sm-12">
            <div class="row">
            <div class="col-sm-12 col-lg-6 col-md-6">
                    <div class="p-4"><iframe class="chartjs-hidden-iframe" style="display: block; overflow: hidden; border: 0px none; margin: 0px; inset: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;" tabindex="-1"></iframe>
                        <canvas id="myChart" style="width: 520px; max-width: 600px; display: block; height: 259px;" width="780" height="388"></canvas>
                        <script>
                            var xValues = ["Employee Coun", "Present", "Over Time", "Duble Duty", "Leaves"];
                            var yValues = [employeeCountotal, employeeCount, employeeOVERTIME, DDorOT, Leaves];
                            var barColors = ["darkblue", "#0000FF", "#189AB4", "#75E6DA", "#D4F1F4"];

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
                                "darkblue",
                                "#0000FF",
                                "#189AB4",
                                "#75E6DA",
                                "#D4F1F4"
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