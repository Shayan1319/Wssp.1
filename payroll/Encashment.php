<?php
session_start();
error_reporting(0);
// links to database
include('../link/desigene/db.php');
if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber']) || $_SESSION['Designation'] != 'Payroll manager') {
  // Log the unauthorized access attempt for auditing purposes
  error_log("Unauthorized access attempt. User: {$_SESSION['loginid']}");
  
  // Redirect to the logout page
  header("Location: ../logout.php");
  exit; // Ensure that the script stops execution after the header redirection
} else{
    if(isset($_POST['Gratuity'])){
        $employee=$_POST['employee_no'];
        $fromdate=$_POST['from'];
        $todate=$_POST['to'];
?>        
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include ('link/links.php')?>
  </head>
  <body>
    <div id="main">
      <?php include('link/desigene/navbar.php')?>
            <div class="container-fluid m-auto py-5 table-responsive ">
                <form action="insertGrduty.php" method="post">    
                    <table class="table">
                        <thead>
                            <?php 
                            $selecttime= mysqli_query($conn,"SELECT  `ToDate` FROM `timeperiod` LIMIT 1;");
                            $timedate=mysqli_fetch_assoc($selecttime);
                            $timeperiod=$timedate['ToDate'];
                            ?>
                                  
                            <tr>
                                <th>
                                    <table class="table text-center">
                                        <thead>
                                            <tr>
                                                <th>Employee No</th>
                                                <th>Emp. Name</th>
                                                <th>Emp. Designation</th>
                                                <th>Grade</th>
                                                <th>Joining Date</th>
                                                <th>Contr. Exp.Date</th>
                                                <th colspan="3" >Total Service <br>
                                                Y   &nbsp; M    &nbsp;  D</th>
                                                <th colspan="3">Period Service <br>
                                                Y   &nbsp; M    &nbsp;  D
                                                </th>
                                                <th colspan="3">Gratuity  Rate<br>
                                                Y   &nbsp; M    &nbsp;  D
                                                </th>
                                                <th colspan="3"> Service Gratuity Breakup<br>
                                                Y   &nbsp; M    &nbsp;  D
                                                </th>
                                                <th colspan="3">Period Gratuity Breakup<br>
                                                Y   &nbsp; M    &nbsp;  D
                                                </th>
                                                <th>
                                                Total Period
                                                Gratuity
                                                </th>
                                                <th>
                                                Total Service
                                                Gratuity
                                                </th>

                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php
                                            if ($employee != "") {
                                                $sql = "SELECT * FROM `employeedata` WHERE `EmployeeNo`='$employee' && STR_TO_DATE(`Joining_Date`, '%d %m %Y') <= DATE_SUB(STR_TO_DATE('$timeperiod', '%Y-%m-%d'), INTERVAL 1 YEAR);";
                                            } else {
                                                $sql = "SELECT * FROM `employeedata` WHERE STR_TO_DATE(`Joining_Date`, '%d %m %Y') <= DATE_SUB(STR_TO_DATE('$timeperiod', '%Y-%m-%d'), INTERVAL 1 YEAR);";
                                            }
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                $a = 1;
                                                while ($row = mysqli_fetch_array($result)) {
                                                    $emil = $row['Id'];
                                                    $empNo = $row['EmployeeNo'];
                                                    $working_day = 4 * ($row['Weekly_Working_Days']);
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <input hidden type="text" name="EmployeeNo[]" id="EmployeeNo_<?php echo $a; ?>" value="<?php echo $row['EmployeeNo']; ?>"><?php echo $row['EmployeeNo']; ?> 
                                                        </td>
                                                        <td>
                                                            <input hidden type="text" name="fName[]" id="fName_<?php echo $a; ?>" value="<?php echo $row['fName'] . " " . $row['lName']; ?>"><?php echo $row['fName'] . " " . $row['lName']; ?> 
                                                        </td>
                                                        <td>
                                                            <input hidden type="text" name="Job_Tiltle[]" id="Job_Tiltle_<?php echo $a; ?>" value="<?php echo $row['Job_Tiltle']; ?>"><?php echo $row['Job_Tiltle']; ?> 
                                                        </td>
                                                        <td>
                                                            <input hidden type="text" name="Grade[]" id="Grade_<?php echo $a; ?>" value="<?php echo $row['Grade']; ?>"><?php echo $row['Grade']; ?> 
                                                        </td>
                                                        <td>
                                                            <input hidden type="text" name="Joining_Date[]" id="Joining_Date_<?php echo $a; ?>" value="<?php echo $row['Joining_Date']; ?>"><?php echo $row['Joining_Date']; ?> 
                                                        </td>
                                                        <td>
                                                            <input hidden type="text" name="Contract_Expiry_Date[]" id="Contract_Expiry_Date_<?php echo $a; ?>" value="<?php echo $row['Contract_Expiry_Date']; ?>"><?php echo $row['Contract_Expiry_Date']; ?> 
                                                        </td>
                                                        <?php
                                                        // Fetch all employees' Joining_Date
                                                        $selectEmployees = mysqli_query($conn, "SELECT `Joining_Date` FROM `employeedata` WHERE `Id`='$emil' ");
                                                        $select_gross_pay = mysqli_query($conn, "SELECT `gross_pay` FROM `earning_deduction_fund` WHERE `employee_id`='$emil'");

                                                        while ($employee = mysqli_fetch_assoc($selectEmployees)) {
                                                            $joiningDate = $employee['Joining_Date'];
                                                            // Create DateTime objects
                                                            $joiningDateTime = DateTime::createFromFormat('d m Y', $joiningDate);
                                                            $toDateTime = DateTime::createFromFormat('Y-m-d', $timeperiod); // Assuming $timeperiod is already in 'Y-m-d' format
                                                            // Calculate the difference
                                                            $interval = $joiningDateTime->diff($toDateTime);
                                                            echo '<td><input hidden type="text" name="TotalServiceY[]" id="TotalServiceY_' . $a . '" value="' . $interval->y . '">' . $interval->y . '</td>';
                                                            echo '<td><input hidden type="text" name="TotalServiceM[]" id="TotalServiceM_' . $a . '" value="' . $interval->m . '">' . $interval->m . '</td>';
                                                            echo '<td><input hidden type="text" name="TotalServiceD[]" id="TotalServiceD_' . $a . '" value="' . $interval->d . '">' . $interval->d . '</td>';
                                                        }

                                                        // Fetch all employees' Joining_Date
                                                        $currentYear = date('Y');
                                                        $period = '01-07-'. $currentYear; // July 1st of the current year
                                                        $joiningDateTime = DateTime::createFromFormat('d-m-Y', $period);
                                                        $toDateTime = DateTime::createFromFormat('Y-m-d', $timeperiod); // Assuming $timeperiod is already in 'Y-m-d' format
                                                        // Calculate the difference
                                                        $interval = $joiningDateTime->diff($toDateTime);
                                                        echo '<td><input hidden type="text" name="PeriodServiceY[]" id="PeriodServiceY_' . $a . '" value="' . $interval->y . '">' . $interval->y . '</td>';
                                                        echo '<td><input hidden type="text" name="PeriodServiceM[]" id="PeriodServiceM_' . $a . '" value="' . $interval->m . '">' . $interval->m . '</td>';
                                                        echo '<td><input hidden type="text" name="PeriodServiceD[]" id="PeriodServiceD_' . $a . '" value="' . $interval->d . '">' . $interval->d . '</td>';
                                                        // Fetch all employees' Joining_Date
                                                        if(mysqli_num_rows($select_gross_pay)>0){
                                                        while ($employeedata = mysqli_fetch_assoc($select_gross_pay)) {
                                                            $gross_pay = $employeedata['gross_pay'];
                                                            $daypermonth = $row['Weekly_Working_Days'] * 4;

                                                            echo '<td><input hidden type="text" name="GratuityRateY[]" id="GratuityRateY_' . $a . '" value="0">' . round($gross_pay * 12) . '</td>';
                                                            echo '<td><input hidden type="text" name="GratuityRateM[]" id="GratuityRateM_' . $a . '" value="' . round($gross_pay) . '">' . round($gross_pay) . '</td>';
                                                            echo '<td><input hidden type="text" name="GratuityRateD[]" id="GratuityRateD_' . $a . '" value="' . round($gross_pay / $daypermonth) . '">' . round($gross_pay / $daypermonth) . '</td>';
                                                        }}
                                                        else{
                                                            echo '<td><input hidden type="text" name="GratuityRateY[]" id="GratuityRateY_' . $a . '" value="0">0</td>';
                                                            echo '<td><input hidden type="text" name="GratuityRateM[]" id="GratuityRateM_' . $a . '" value="0">0</td>';
                                                            echo '<td><input hidden type="text" name="GratuityRateD[]" id="GratuityRateD_' . $a . '" value="0">0</td>';
                                                            
                                                        }

                                                        $selectEmployees = mysqli_query($conn, "SELECT `Joining_Date` FROM `employeedata` WHERE `Id`='$emil' ");
                                                        while ($employee = mysqli_fetch_assoc($selectEmployees)) {
                                                            $joiningDate = $employee['Joining_Date'];
                                                            // Create DateTime objects
                                                            $joiningDateTime = DateTime::createFromFormat('d m Y', $joiningDate);
                                                            $toDateTime = DateTime::createFromFormat('Y-m-d', $timeperiod); // Assuming $timeperiod is already in 'Y-m-d' format
                                                            // Calculate the difference
                                                            $interval = $joiningDateTime->diff($toDateTime);
                                                            $select_gross_pay = mysqli_query($conn, "SELECT `gross_pay` FROM `earning_deduction_fund` WHERE `employee_id`='$emil' ");
                                                            
                                                            if(mysqli_num_rows($select_gross_pay)>0)
                                                            {
                                                            while ($employeedata = mysqli_fetch_assoc($select_gross_pay)) {
                                                                $gross_pay = $employeedata['gross_pay'];

                                                                echo '<td><input hidden type="text" name="ServiceGratuityBreakupY[]" id="ServiceGratuityBreakupY_' . $a . '" value="' . round($gross_pay * $interval->y) . '">' . round($gross_pay * $interval->y) . '</td>';
                                                                echo '<td><input hidden type="text" name="ServiceGratuityBreakupM[]" id="ServiceGratuityBreakupM_' . $a . '" value="' . round($gross_pay * $interval->m) . '">' . round($gross_pay * $interval->m) . '</td>';
                                                                echo '<td><input hidden type="text" name="ServiceGratuityBreakupD[]" id="ServiceGratuityBreakupD_' . $a . '" value="' . round($gross_pay / $interval->d) . '">' . round($gross_pay / $interval->d) . '</td>';
                                                            }
                                                        }
                                                        else{
                                                            echo '<td><input hidden type="text" name="ServiceGratuityBreakupY[]" id="ServiceGratuityBreakupY_' . $a . '" value="0">0</td>';
                                                                echo '<td><input hidden type="text" name="ServiceGratuityBreakupM[]" id="ServiceGratuityBreakupM_' . $a . '" value="0">0</td>';
                                                                echo '<td><input hidden type="text" name="ServiceGratuityBreakupD[]" id="ServiceGratuityBreakupD_' . $a . '" value="0">0</td>';
                                                        }
                                                    }

                                                        $currentYear = date('Y');
                                                        $period = '01-07-' . $currentYear; // July 1st of the current year

                                                        $joiningDateTime = DateTime::createFromFormat('d-m-Y', $period);

                                                        $toDateTime = DateTime::createFromFormat('Y-m-d', $timeperiod); // Assuming $timeperiod is already in 'Y-m-d' format

                                                        // Calculate the difference
                                                        $interval = $joiningDateTime->diff($toDateTime);
                                                        $select_gross_pay = mysqli_query($conn, "SELECT `gross_pay` FROM `earning_deduction_fund` WHERE `employee_id`='$emil' ");
                                                            if(mysqli_num_rows($select_gross_pay)>0){
                                                                while ($employeedata = mysqli_fetch_assoc($select_gross_pay)) {
                                                                    $gross_pay = $employeedata['gross_pay'];
                                                                    echo '<td><input hidden type="text" name="PeriodGratuityBreakupY[]" id="PeriodGratuityBreakupY_' . $a . '" value="' . round($gross_pay * $interval->y) . '">' . round($gross_pay * $interval->y) . '</td>';
                                                                    echo '<td><input hidden type="text" name="PeriodGratuityBreakupM[]" id="PeriodGratuityBreakupM_' . $a . '" value="' . round($gross_pay * $interval->m) . '">' . round($gross_pay * $interval->m) . '</td>';
                                                                    echo '<td><input hidden type="text" name="PeriodGratuityBreakupD[]" id="PeriodGratuityBreakupD_' . $a . '" value="' . round($gross_pay / $interval->d) . '"> ' . round($gross_pay / $interval->d) . '</td>';
                                                                }
                                                            }else
                                                            {
                                                                echo '<td><input hidden type="text" name="PeriodGratuityBreakupY[]" id="PeriodGratuityBreakupY_' . $a . '" value="0">0</td>';
                                                                echo '<td><input hidden type="text" name="PeriodGratuityBreakupM[]" id="PeriodGratuityBreakupM_' . $a . '" value="0">0</td>';
                                                                echo '<td><input hidden type="text" name="PeriodGratuityBreakupD[]" id="PeriodGratuityBreakupD_' . $a . '" value="0"> 0</td>';
                                                            }
                                                        ?>
                                                        <td>
                                                            <?php
                                                            $currentYear = date('Y');
                                                            $period = '01-07-' . $currentYear; // July 1st of the current year
                                            
                                                            $joiningDateTime = DateTime::createFromFormat('d-m-Y', $period);
                                            
                                            
                                                            $toDateTime = DateTime::createFromFormat('Y-m-d', $timeperiod); // Assuming $timeperiod is already in 'Y-m-d' format
                                                        
                                            
                                                            // Calculate the difference
                                                            $interval = $joiningDateTime->diff($toDateTime);
                                                            $select_gross_pay = mysqli_query($conn, "SELECT `gross_pay` FROM `earning_deduction_fund` WHERE `employee_id`='$emil' ");
                                                                if(mysqli_num_rows($select_gross_pay)){
                                                                    while ($employeedata = mysqli_fetch_assoc($select_gross_pay)) {
                                                                        $gross_pay = $employeedata['gross_pay'];
                                                                        echo '<input hidden type="text" name="TotalPeriodGratuity[]" id="TotalPeriodGratuity_' . $a . '" value="' . round($gross_pay * $interval->y) + round($gross_pay*$interval->m) + round($gross_pay / $interval->d) .'">' . round($gross_pay * $interval->y) + round($gross_pay*$interval->m) + round($gross_pay / $interval->d) .'';
                                                                    }
                                                                }
                                                                else{
                                                                    echo '<input hidden type="text" name="TotalPeriodGratuity[]" id="TotalPeriodGratuity_' . $a . '" value="0">0';
                                                                }
                                                            ?>
                                                        </td>
                                                        <td>
                                                        <?php
                                                        $selectEmployees = mysqli_query($conn, "SELECT `Joining_Date` FROM `employeedata` WHERE `Id`='$emil' ");
                                                        while ($employee = mysqli_fetch_assoc($selectEmployees)) {
                                                            $joiningDate = $employee['Joining_Date'];
                                                            // Create DateTime objects
                                                            $joiningDateTime = DateTime::createFromFormat('d m Y', $joiningDate);
                                                            $toDateTime = DateTime::createFromFormat('Y-m-d', $timeperiod); // Assuming $timeperiod is already in 'Y-m-d' format
                                                            // Calculate the difference
                                                            $interval = $joiningDateTime->diff($toDateTime);
                                                            $select_gross_pay = mysqli_query($conn, "SELECT `gross_pay` FROM `earning_deduction_fund` WHERE `employee_id`='$emil' ");
                                                            if(mysqli_num_rows($select_gross_pay)){
                                                                while ($employeedata = mysqli_fetch_assoc($select_gross_pay)) {
                                                                    $gross_pay = $employeedata['gross_pay'];
                                                                    echo '<input hidden type="text" name="TotalGratuity[]" id="TotalGratuity_' . $a . '" value="' . (round($gross_pay * $interval->y) + round($gross_pay * $interval->m) + round($gross_pay / $interval->d)) . '">' . (round($gross_pay * $interval->y) + round($gross_pay * $interval->m) + round($gross_pay / $interval->d)) . '';
                                                                }
                                                            }
                                                            else{
                                                                echo '<input hidden type="text" name="TotalGratuity[]" id="TotalGratuity_' . $a . '" value="0">0';
                                                            }
                                                        }
                                                        ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $a++;
                                                }
                                            } else {
                                                echo "Data not exist";
                                            }
                                            ?>
                                        </tbody>


                                    </table>
                                </th>
                            </tr>
                        </thead>
                    </table>
                    <div class="form-content">
                        <button type="submit" class="btn btn-primary" name="submit">Save</button>
                    </div>
                </form>    
            </div>
          </div>
  </body>
</html><?php }
else if(isset($_POST['Encashment'])){

$employee = $_POST['employee_no'];
$fromdateselect = $_POST['from'];
$todateselect = $_POST['to'];

// Create date objects from the provided year and month
$formattedFromDate = $fromdateselect . '-07-01'; // Start of the period
$formattedToDate= $todateselect . '-06-30'; // End of the period

// Format the dates
$fromdate = date('Y-m-d', strtotime($formattedFromDate));
$todate = date('Y-m-d', strtotime($formattedToDate));

// Display the values
echo date('y', strtotime($fromdate)) . "-" . date('Y', strtotime($todate)) . " " . $employee;

    
?>
       
<html lang="en">
  <head>
    <?php include ('link/links.php')?>
  </head>
  <body>
    <div id="main">
      <?php include('link/desigene/navbar.php')?>
            <div class="container-fluid m-auto py-5 table-responsive ">
                <form action="insertGrduty.php" method="post">
                <table class="table">
                        <thead>
                                  
                            <tr>
                                <th>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Employee</th>
                                                <th>Ann. Leave Enti-ment</th>
                                                <th>Ann. Leave Availed</th>
                                                <th>Ann. Leave Balance</th>
                                                <th>Ann. Leave Payable</th>
                                                <th>Gross Pay (Monthly)</th>
                                                <th>Gross Pay (Yearly)</th>
                                                <th>Gross Pay (Daily)</th>
                                                <th>Amount Payable</th>
                                                <th>Bank Branch</th>
                                                <th>Account No</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if($employee!=""){
                                            $sql = "SELECT * FROM `employeedata` WHERE `EmployeeNo`='$employee'";
                                            }
                                            else{
                                            $sql = "SELECT * FROM `employeedata`";
                                            }
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            $a = 1;
                                            while ($row = mysqli_fetch_array($result)) {
                                                $emil = $row['Id'];
                                                $empNo = $row['EmployeeNo'];
                                                $working_day = 4*($row['Weekly_Working_Days']);
                                                ?>
                    <input type="text" name="Period" value="<?php echo date('y', strtotime($fromdate)) . "-" . date('Y', strtotime($todate))?>" id="">

                                                <tr>
                                                    <td><?php echo $row['EmployeeNo']; ?><h5><?php echo $row['fName']; ?> <?php echo $row['lName']; ?></h5><?php echo $row['Joining_Date']; ?>
                                                <input type="number" name="EmployeeNo[]" value="<?php echo $row['EmployeeNo'];?>" id="EmployeeNo">
                                                </td>
                                                    <td>15
                                                        <input type="text" value="15" name="Ann_Leave_Entitlement[]" id="Ann_Leave_Entitlement">
                                                    </td>
                                                    <td><?php $contleave=mysqli_query($conn,"SELECT SUM(TotalDays) AS empleave FROM `leavereq` WHERE `EmployeeNo`='$empNo' && `Statusofmanger`='ACCEPT' && `StatusofGm`='ACCEPT' && `LeaveTo`>='$fromdate' && `LeaveTo`<='$todate';");
                                                    
                                                        // Check if the query executed correctly
                                                        if (!$contleave) {
                                                            die('Query Error: ' . mysqli_error($conn));
                                                        }

                                                        // Fetch the data
                                                        $countdata = mysqli_fetch_assoc($contleave);

                                                        // Check if data is fetched and if 'empleave' is NULL
                                                        if ($countdata && !is_null($countdata['empleave'])) {
                                                            echo $countdata['empleave'].'<input type="number" name[]="Ann_Leave_Availed" value="'.$countdata['empleave'].'">';
                                                        } else {
                                                            echo '0'.'<input type="number" name="Ann_Leave_Availed[]" value="0">';
                                                        }
                                                        ?>
                                                        </td>
                                                    <td><?php
                                                        $contleave = mysqli_query($conn, "SELECT 15-SUM(TotalDays) AS empleave FROM `leavereq` WHERE `EmployeeNo`='$empNo' && `Statusofmanger`='ACCEPT' && `StatusofGm`='ACCEPT' && `LeaveTo`>='$fromdate' && `LeaveTo`<='$todate'");

                                                        // Check if the query executed correctly
                                                        if (!$contleave) {
                                                            die('Query Error: ' . mysqli_error($conn));
                                                        }

                                                        // Fetch the data
                                                        $countdata = mysqli_fetch_assoc($contleave);

                                                        // Check if data is fetched and if 'empleave' is NULL
                                                        if ($countdata && !is_null($countdata['empleave'])) {
                                                            echo $countdata['empleave'].'<input type="number" name="Ann_Leave_Balance[]" value="'.$countdata['empleave'].'">';
                                                        } else {
                                                            echo '15'.'<input type="number" name="Ann_Leave_Balance[]" value="15">';
                                                        }
                                                        ?>
                                                        </td>
                                                        
                                                    <td><?php
                                                        $contleave = mysqli_query($conn, "SELECT (15-SUM(TotalDays)) / 2.0 AS empleave FROM `leavereq` WHERE `EmployeeNo`='$empNo' && `Statusofmanger`='ACCEPT' && `StatusofGm`='ACCEPT' && `LeaveTo`>='$fromdate' && `LeaveTo`<='$todate'");

                                                        // Check if the query executed correctly
                                                        if (!$contleave) {
                                                            die('Query Error: ' . mysqli_error($conn));
                                                        }
                                                        // Fetch the data
                                                        $countdata = mysqli_fetch_assoc($contleave);
                                                        // Check if data is fetched and if 'empleave' is NULL
                                                        if ($countdata && !is_null($countdata['empleave'])) {

                                                            echo $countdata['empleave']/2.0.'<input type="number" name="Ann_Leave_Payable[]" value="'.$countdata['empleave']/2.0.'">';
                                                        } else {
                                                            echo 15 / 2.0;
                                                            echo 15 / 2.0.'<input type="number" name="Ann_Leave_Payable[]" value="'. 15 / 2.0.'">';
                                                        }
                                                        ?>
                                                        </td>
                                                    <td><?php $contleave=mysqli_query($conn,"SELECT (gross_pay) FROM `earning_deduction_fund` WHERE `employee_id`='$emil';");
                                                    $countdata = mysqli_fetch_assoc($contleave); 
                                                    echo $countdata['gross_pay'].'<input type="number" name="Gross_Pay_Monthly[]" value="'. $countdata['gross_pay'].'">';
                                                    
                                                    ?></td>
                                                    <td><?php $contleave=mysqli_query($conn,"SELECT (gross_pay)*12 AS pay FROM `earning_deduction_fund` WHERE `employee_id`='$emil';");
                                                    $countdata = mysqli_fetch_assoc($contleave); 
                                                    echo $countdata['pay'].'<input type="number" name="Gross_Pay_Yearly[]" value="'.$countdata['pay'].'">';?></td>
                                                    <td><?php $contleave=mysqli_query($conn,"SELECT (gross_pay)/$working_day  AS pay FROM `earning_deduction_fund` WHERE `employee_id`='$emil';");
                                                    $countdata = mysqli_fetch_assoc($contleave); 
                                                    echo $countdata['pay'].'<input type="number" name="Gross_Pay_Daily[]" value="'.$countdata['pay'].'">';?></td>
                                                     <td>
                                                     <?php
                                                        $LeavePayable = mysqli_query($conn, "SELECT (15-SUM(TotalDays)) / 2.0 AS empleave FROM `leavereq` WHERE `EmployeeNo`='$empNo' && `Statusofmanger`='ACCEPT' && `StatusofGm`='ACCEPT' && `LeaveTo`>='$fromdate' && `LeaveTo`<='$todate'");

                                                        // Check if the query executed correctly
                                                        if (!$LeavePayable) {
                                                            die('Query Error: ' . mysqli_error($conn));
                                                        }

                                                        // Fetch the data
                                                        $LeavePayabledata = mysqli_fetch_assoc($LeavePayable);

                                                        // Check if data is fetched and if 'empleave' is NULL
                                                        if ($LeavePayabledata && !is_null($LeavePayabledata['empleave'])) {
                                                            $days= $LeavePayabledata['empleave'];

                                                        } else {
                                                            $days= 15 / 2.0;
                                                        }
                                                        ?>
                                                        <?php $contleave=mysqli_query($conn,"SELECT (gross_pay)/$working_day  AS pay FROM `earning_deduction_fund` WHERE `employee_id`='$emil';");
                                                    $countdata = mysqli_fetch_assoc($contleave);
                                                    echo $days*$countdata['pay'].'<input type="number" name="Amount_Payable[]" value="'.$days*$countdata['pay'].'">';?></td>
                                                    <td>
                                                        <?php
                                                        // Output bank and branch details
                                                        echo $row['Salary_Bank'] . " | " . $row['Salary_Branch'];
                                                        ?>
                                                        <!-- Form input field with the concatenated value -->
                                                        <input type="text" name="Bank_Branch[]" value="<?php echo htmlspecialchars($row['Salary_Bank'] ." ". $row['Salary_Branch']); ?>">
                                                    </td>

                                                    <td><?php echo $row['Account_No'].'<input type="number" name="Account_No[]" value="'.$row['Account_No'].'">'?></td>
                                                </tr>
                                                <?php
                                                $a++;
                                            }
                                        } else {
                                            echo "Data not exist";
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </th>
                            </tr>
                        </thead>
                    </table>
                    <div class="form-content">
                        <button type="submit" class="btn btn-primary" name="submit_encasement">Save</button>
                    </div>
                </form>    
            </div>
          </div>
  </body>
</html> 
<?php
    } 
}?>