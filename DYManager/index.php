<?php 
session_start();
error_reporting(0);
// links to database
include('link/desigene/db.php');
if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber']) || $_SESSION['Designation'] != 'DYManager') {
  // Log the unauthorized access attempt for auditing purposes
  error_log("Unauthorized access attempt. User: {$_SESSION['loginid']}");
  
  // Redirect to the logout page
  header("Location: ../logout.php");
  exit; // Ensure that the script stops execution after the header redirection
}else {
    // Your code for logged-in users goes here
    $currentDate = date('Y-m-d');


$empid = $_SESSION['EmployeeNumber'];
// Query to count the number of employees 
$query = mysqli_query($conn, "SELECT COUNT(id) AS total_employees FROM employeedata WHERE `DY_Supervisor`=$empid");
$row = mysqli_fetch_array($query);
$employeeCountotal = $row['total_employees'];
// Query to count the number of employees with status 'PRESENT' on the current date
$sql = "SELECT COUNT(DISTINCT e.EmployeeNo) AS employeeCount FROM employeedata AS e INNER JOIN atandece AS a ON e.EmployeeNo = a.Employeeid WHERE a.status = 'PRESENT' AND a.Date = $currentDate AND e.DY_Supervisor = $empid";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $employeeCount = $row['employeeCount'];
} else {
    $employeeCount = 0;
}
// Query to count the number of employees with status 'ABSENT' on the current date
$sql = "SELECT COUNT(DISTINCT e.EmployeeNo) AS employeeCountABSENT FROM employeedata AS e INNER JOIN atandece AS a ON e.EmployeeNo = a.Employeeid WHERE a.status = 'ABSENT' AND a.Date = '$currentDate' AND e.DY_Supervisor = $empid";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $employeeCountABSENT = $row['employeeCountABSENT'];
} else {
    $employeeCountABSENT = 0;
}
// Query to count the number of employees with DDorOT 'DOUBLE DUTY' on the current date
$sql = "SELECT COUNT(DISTINCT e.EmployeeNo) AS employeeCountDDorOT FROM employeedata AS e INNER JOIN atandece AS a ON e.EmployeeNo = a.Employeeid WHERE a.DDorOT = 'DOUBLE DUTY' AND a.Date = '$currentDate' AND e.DY_Supervisor = $empid";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $employeeCountDDorOT = $row['employeeCountDDorOT'];
} else {
    $employeeCountDDorOT = 0;
}
// Query to count the number of employees with DDorOT 'OVERTIME' on the current date
$sql = "SELECT COUNT(DISTINCT e.EmployeeNo) AS employeeCountOVERTIME FROM employeedata AS e INNER JOIN atandece AS a ON e.EmployeeNo = a.Employeeid WHERE a.DDorOT = 'OVERTIME' AND a.Date = '$currentDate' AND e.DY_Supervisor = $empid";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $employeeCountOVERTIME = $row['employeeCountOVERTIME'];
} else {
    $employeeCountOVERTIME = 0;
} 


// leverequest 

$sql = "SELECT COUNT(DISTINCT e.EmployeeNo) AS totalPendingLeaves
        FROM employeedata AS e
        INNER JOIN leavereq AS l ON e.EmployeeNo = l.EmployeeNo
        WHERE l.Statusofmanger = 'PENDING' AND l.LeaveFrom >= '$currentDate' AND e.DY_Supervisor = $empid";

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
        WHERE l.Statusofmanger = 'ACCPET' AND l.StatusofGm = 'ACCPET' AND l.LeaveFrom = '$currentDate' AND e.DY_Supervisor = $empid";

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
        WHERE l.Statusofmanger = 'ACCPET' AND l.StatusofGm = 'PENDING' AND l.LeaveFrom >= '$currentDate' AND e.DY_Supervisor = $empid";

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
        WHERE l.Statusofmanger = 'REJECTED' AND l.LeaveFrom >= '$currentDate' AND e.DY_Supervisor = $empid";

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
        WHERE  l.LeaveFrom >= '$currentDate' AND e.DY_Supervisor = $empid";

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
        WHERE t.DepartureOn >= '$currentDate' AND e.DY_Supervisor = $empid";

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
        WHERE t.Statusofmanger = 'ACCPET' AND t.StatusofGM = 'ACCPET' AND t.DepartureOn >= '$currentDate' AND e.DY_Supervisor = $empid";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $TravelReqAprove = $row['TravelReqAprove'];
} else {
    $TravelReqAprove = 0;
}
$sql = "SELECT COUNT(DISTINCT e.EmployeeNo) AS TravelReqaccept
        FROM employeedata AS e
        INNER JOIN travelrequest AS t ON e.EmployeeNo = t.EmployeeNo
        WHERE t.Statusofmanger = 'ACCPET' AND t.DepartureOn >= '$currentDate' AND e.DY_Supervisor = $empid";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $TravelReqaccept = $row['TravelReqaccept'];
} else {
    $TravelReqaccept = 0;
}
$sql = "SELECT COUNT(DISTINCT e.EmployeeNo) AS TravelReqPENDING
        FROM employeedata AS e
        INNER JOIN travelrequest AS t ON e.EmployeeNo = t.EmployeeNo
        WHERE t.Statusofmanger = 'PENDING' AND t.DepartureOn >= '$currentDate' AND e.DY_Supervisor = $empid";

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
        WHERE t.Statusofmanger = 'REJECTED' AND t.DepartureOn >= '$currentDate' AND e.DY_Supervisor = $empid";

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
        WHERE tr.Statusofmanger = 'ACCPET' AND tr.StatusofGM = 'ACCPET' AND t.DateofApply >= '$currentDate' AND e.DY_Supervisor = $empid";

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
        WHERE tr.Statusofmanger = 'ACCPET' AND tr.StatusofGM = 'ACCPET' AND t.Statusofmanger = 'ACCPET' AND t.StatusofGM = 'ACCPET' AND t.DateofApply >= '$currentDate' AND e.DY_Supervisor = $empid";

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
        WHERE tr.Statusofmanger = 'ACCPET' AND tr.StatusofGM = 'ACCPET' AND t.Statusofmanger = 'ACCPET' AND t.DateofApply >= '$currentDate' AND e.DY_Supervisor = $empid";

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
        WHERE tr.Statusofmanger = 'ACCPET' AND tr.StatusofGM = 'ACCPET' AND t.Statusofmanger = 'PENDING' AND t.DateofApply >= '$currentDate' AND e.DY_Supervisor = $empid";

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
        WHERE tr.Statusofmanger = 'ACCPET' AND tr.StatusofGM = 'ACCPET' AND t.Statusofmanger = 'REJECTED' AND t.DateofApply >= '$currentDate' AND e.DY_Supervisor = $empid";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $tabillREJECTED = $row['tabillREJECTED'];
} else {
    $tabillREJECTED = 0;
}
$sql = "SELECT COUNT(*) AS Appraisals
        FROM employee_performance AS t
        INNER JOIN employeedata AS e ON e.EmployeeNo = t.EmployeeID
        WHERE t.Intelligence IS NULL AND t.Intelligence IS NULL AND t.Intelligence IS NULL AND t.Intelligence IS NULL AND t.Intelligence IS NULL AND t.ConfidenceAndWillPower IS NULL AND t.AcceptanceOfResponsibility IS NULL AND t.ReliabilityUnderPressure IS NULL AND t.FinancialResponsibility IS NULL AND t.RelationsWithSuperiors IS NULL AND t.RelationsWithColleagues IS NULL AND t.RelationsWithSubordinates IS NULL AND t.BehaviorWithPublic IS NULL AND t.AblityToDecideRoutineMatters IS NULL AND t.KnowledgeOfRelavantLawsETC IS NULL AND e.DY_Supervisor = $empid";
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
   <style>
    h4, h3 {
      text-align: center;
    }
    a{
      text-decoration: none;
    }

   </style>
</head>
<body>
  <div id="main">
    <?php include('link/desigene/navbar.php')?>

<div class="container-fluid m-auto p-5">
    <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
              <h1 style="color: darkblue;">WELCOME USER NAME</h1>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
              <h2 style="color: darkblue;">TODAY'S ATTENDANCE</h2>
          </div>
          <div class="col-lg-4 col-xs-12">
              <!-- small box -->
              <div class="small-box text-white" style="background-color:darkblue" >
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
            </div><!-- ./col -->
          <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box text-white" style="background-color:darkblue" >
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
            </div><!-- ./col -->
          <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box text-white" style="background-color:darkblue" >
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
            </div><!-- ./col -->
          <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box text-white" style="background-color:darkblue" >
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
            </div><!-- ./col -->
          <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box text-white" style="background-color:darkblue" >
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
            </div><!-- ./col -->
          <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box text-white" style="background-color:darkblue" >
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
            </div><!-- ./col -->      
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
              <h2 style="color: darkblue;">LEAVE REQUESTS</h2>
          </div>
          <div class="col-lg-4 col-xs-12">
            <!-- small box -->
            <div class="small-box text-white" style="background-color: #3784ff;" >
              <div class="inner">
              <h3><?php echo $totalLeaves?>
            <script> var vetsciencestotalLeaves= <?php echo $totalLeaves?>;</script>
            </h3>
                <h4>TOTAL LEAVE REQUEST</h4>
              </div>
              <div class="icon" style="color: #f0f8ff7d;" >
                <i class="fa fa-bar-chart"></i>
              </div>
            </div>
          </div><!-- ./col -->
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
             <a href="aprove.php" style="text-decoration: none;" >
             <div class="small-box text-white" style="background-color: #3784ff;" >
                <div class="inner">
                <h3><?php echo $totalAPROVELeaves?>
              <script> var vetsciencestotalAPROVELeaves= <?php echo $totalAPROVELeaves?>;</script>
              </h3>
                  <h4>APROVE</h4>
                </div>
                <div class="icon" style="color: #f0f8ff7d;" >
                  <i class="fa fa-check"></i>
                </div>
              </div>
             </a>
            </div><!-- ./col -->
          <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <a href="Leavereq.php" style="text-decoration: none;">
              <div class="small-box text-white" style="background-color: #3784ff;" >
                <div class="inner">
                <h3><?php echo $totalPendingLeaves?>
              <script> var vetsciencestotalPendingLeaves= <?php echo $totalPendingLeaves?>;</script>
              </h3>
                  <h4>PENDING</h4>
                </div>
                <div class="icon" style="color: #f0f8ff7d;" >
                  <i class="fa fa-clock-o"></i>
                </div>
              </div>
              </a>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <a href="Reject.php" style="text-decoration: none;" >
              <div class="small-box text-white" style="background-color: #3784ff;" >
                <div class="inner">
                <h3><?php echo $totalREJECTEDLeaves?>
              <script> var vetsciencestotalREJECTEDLeaves= <?php echo $totalREJECTEDLeaves?>;</script>
              </h3>
                  <h4>REJECTED</h4>
                </div>
                <div class="icon" style="color: #f0f8ff7d;" >
                  <i class="fa fa-ban"></i>
                </div>
              </div>
              </a>
            </div><!-- ./col -->
            
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <h2 style="color: darkblue;">Appraisals and others</h2>
            </div>
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <a href="aprasals.php">
              <div class="small-box text-white" style="background-color: #7EC8E3;" >
                <div class="inner">
                <h3><?php echo $Appraisals?>
              <script> var Appraisals= <?php echo $Appraisals?>;</script>
              </h3>
                  <h4>Appraisals</h4>
                </div>
                <div class="icon">
                  <i class="fa fa-clock-o"></i>
                </div>
              </div>
              </a>
            </div><!-- ./col -->
            <!-- <div class="col-lg-4 col-xs-6">
              
              <div class="small-box bg-blue">
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
              <a href="aprovetabill.php" style="text-decoration: none;">
              <div class="small-box bg-blue">
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
              
              <a href="tabill.php" style="text-decoration: none;">
              <div class="small-box bg-blue">
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
              
              <a href="tabillRejecet.php" style="text-decoration: none;">
              <div class="small-box bg-blue">
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
            </div> -->
              <div class="col-12">
                <div class="row">
                <div class="col-sm-12 col-lg-6 col-md-6">
              <div class="p-4"><iframe class="chartjs-hidden-iframe" style="display: block; overflow: hidden; border: 0px none; margin: 0px; inset: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;" tabindex="-1"></iframe>
              <canvas id="myChart" style="width: 520px; max-width: 600px; display: block; height: 259px;" width="780" height="388"></canvas>
              <script>
                            var xValues = ["Employee Coun", "Present", "Over Time", "Duble Duty", "Leaves"];
                            var yValues = [employeeCountotal, employeeCount, employeeOVERTIME, DDorOT, Leaves];
                            var barColors = ["darkblue", "#2b5797", "#145DA0",  "#2E8BC0", "#00aba9"];

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
                                "#2b5797",
                                "#145DA0",
                                "#2E8BC0",
                                "#00aba9"
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
<?php }?>