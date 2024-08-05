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
        if (isset($_POST['submit'])) {
            // Retrieve and sanitize input hidden data
            $employeeNos = $_POST['EmployeeNo'];
            $fNames = $_POST['fName'];
            $jobTitles = $_POST['Job_Tiltle'];
            $grades = $_POST['Grade'];
            $joiningDates = $_POST['Joining_Date'];
            $contractExpiryDates = $_POST['Contract_Expiry_Date'];
            $totalServiceYs = $_POST['TotalServiceY'];
            $totalServiceMs = $_POST['TotalServiceM'];
            $totalServiceDs = $_POST['TotalServiceD'];
            $periodServiceYs = $_POST['PeriodServiceY'];
            $periodServiceMs = $_POST['PeriodServiceM'];
            $periodServiceDs = $_POST['PeriodServiceD'];
            $gratuityRateYs = $_POST['GratuityRateY'];
            $gratuityRateMs = $_POST['GratuityRateM'];
            $gratuityRateDs = $_POST['GratuityRateD'];
            $serviceGratuityBreakupYs = $_POST['ServiceGratuityBreakupY'];
            $serviceGratuityBreakupMs = $_POST['ServiceGratuityBreakupM'];
            $serviceGratuityBreakupDs = $_POST['ServiceGratuityBreakupD'];
            $periodGratuityBreakupYs = $_POST['PeriodGratuityBreakupY'];
            $periodGratuityBreakupMs = $_POST['PeriodGratuityBreakupM'];
            $periodGratuityBreakupDs = $_POST['PeriodGratuityBreakupD'];
            $totalPeriodGratuities = $_POST['TotalPeriodGratuity'];
            $totalGratuities = $_POST['TotalGratuity'];
            
            foreach ($employeeNos as $index => $employeeNo) {
                $fName = mysqli_real_escape_string($conn, $fNames[$index]);
                $jobTitle = mysqli_real_escape_string($conn, $jobTitles[$index]);
                $grade = mysqli_real_escape_string($conn, $grades[$index]);
                $joiningDate = mysqli_real_escape_string($conn, $joiningDates[$index]);
                $contractExpiryDate = mysqli_real_escape_string($conn, $contractExpiryDates[$index]);
                $totalServiceY = mysqli_real_escape_string($conn, $totalServiceYs[$index]);
                $totalServiceM = mysqli_real_escape_string($conn, $totalServiceMs[$index]);
                $totalServiceD = mysqli_real_escape_string($conn, $totalServiceDs[$index]);
                $periodServiceY = mysqli_real_escape_string($conn, $periodServiceYs[$index]);
                $periodServiceM = mysqli_real_escape_string($conn, $periodServiceMs[$index]);
                $periodServiceD = mysqli_real_escape_string($conn, $periodServiceDs[$index]);
                $gratuityRateY = mysqli_real_escape_string($conn, $gratuityRateYs[$index]);
                $gratuityRateM = mysqli_real_escape_string($conn, $gratuityRateMs[$index]);
                $gratuityRateD = mysqli_real_escape_string($conn, $gratuityRateDs[$index]);
                $serviceGratuityBreakupY = mysqli_real_escape_string($conn, $serviceGratuityBreakupYs[$index]);
                $serviceGratuityBreakupM = mysqli_real_escape_string($conn, $serviceGratuityBreakupMs[$index]);
                $serviceGratuityBreakupD = mysqli_real_escape_string($conn, $serviceGratuityBreakupDs[$index]);
                $periodGratuityBreakupY = mysqli_real_escape_string($conn, $periodGratuityBreakupYs[$index]);
                $periodGratuityBreakupM = mysqli_real_escape_string($conn, $periodGratuityBreakupMs[$index]);
                $periodGratuityBreakupD = mysqli_real_escape_string($conn, $periodGratuityBreakupDs[$index]);
                $totalPeriodGratuityValue = mysqli_real_escape_string($conn, $totalPeriodGratuities[$index]);
                $totalGratuityValue = mysqli_real_escape_string($conn, $totalGratuities[$index]);
    
                // Check if record already exists
                $checkQuery = "SELECT COUNT(*) as count FROM `gratuity` WHERE empNo = '$employeeNo'";
                $result = mysqli_query($conn, $checkQuery);
                $row = mysqli_fetch_assoc($result);
    
                if ($row['count'] > 0) {
                    // Record exists
                    echo "<script>alert('Record for EmployeeNo $employeeNo already exists');</script>";
                } else {
                    // Prepare and execute the insert query
                    $query = "INSERT INTO `gratuity` (
                        empNo, EmpName, EmpDesignation, Grade, JoiningDate, ContrExpDate, 
                        TotalServiceD, TotalServiceM, TotalServiceY, PeriodServiceD, 
                        PeriodServiceM, PeriodServiceY, GratuityRateD, GratuityRateM, 
                        GratuityRateY, ServiceGratuityBreakupD, ServiceGratuityBreakupM, 
                        ServiceGratuityBreakupY, PeriodGratuityBreakupD, PeriodGratuityBreakupM, 
                        PeriodGratuityBreakupY, TotalPeriodGratuity, TotalServiceGratuity
                    ) VALUES (
                        '$employeeNo', '$fName', '$jobTitle', '$grade', '$joiningDate', 
                        '$contractExpiryDate', '$totalServiceD', '$totalServiceM', '$totalServiceY', 
                        '$periodServiceD', '$periodServiceM', '$periodServiceY', '$gratuityRateD', 
                        '$gratuityRateM', '$gratuityRateY', '$serviceGratuityBreakupD', 
                        '$serviceGratuityBreakupM', '$serviceGratuityBreakupY', 
                        '$periodGratuityBreakupD', '$periodGratuityBreakupM', '$periodGratuityBreakupY', 
                        '$totalPeriodGratuityValue', '$totalGratuityValue'
                    )";
                    if (mysqli_query($conn, $query)) {
                        echo "<script>alert('Data inserted successfully');location.replace('Gratuity.php');</script>";
                    } else {
                        echo "Error: " . mysqli_error($conn) . "<br>";
                    }
                }
            }
    
            // Close the connection
            $conn->close();
        }
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
                $period = '01-07-' . $currentYear; // July 1st of the current year
                $joiningDateTime = DateTime::createFromFormat('d-m-Y', $period);
                $toDateTime = DateTime::createFromFormat('Y-m-d', $timeperiod); // Assuming $timeperiod is already in 'Y-m-d' format
                // Calculate the difference
                $interval = $joiningDateTime->diff($toDateTime);
                echo '<td><input hidden type="text" name="PeriodServiceY[]" id="PeriodServiceY_' . $a . '" value="' . $interval->y . '">' . $interval->y . '</td>';
                echo '<td><input hidden type="text" name="PeriodServiceM[]" id="PeriodServiceM_' . $a . '" value="' . $interval->m . '">' . $interval->m . '</td>';
                echo '<td><input hidden type="text" name="PeriodServiceD[]" id="PeriodServiceD_' . $a . '" value="' . $interval->d . '">' . $interval->d . '</td>';
                // Fetch all employees' Joining_Date
                $select_gross_pay = mysqli_query($conn, "SELECT `gross_pay` FROM `earning_deduction_fund` WHERE `employee_id`='$emil' ");
                while ($employeedata = mysqli_fetch_assoc($select_gross_pay)) {
                    $gross_pay = $employeedata['gross_pay'];
                    $daypermonth = $row['Weekly_Working_Days'] * 4;

                    echo '<td><input hidden type="text" name="GratuityRateY[]" id="GratuityRateY_' . $a . '" value="' . round($gross_pay * 12) . '">' . round($gross_pay * 12) . '</td>';
                    echo '<td><input hidden type="text" name="GratuityRateM[]" id="GratuityRateM_' . $a . '" value="' . round($gross_pay) . '">' . round($gross_pay) . '</td>';
                    echo '<td><input hidden type="text" name="GratuityRateD[]" id="GratuityRateD_' . $a . '" value="' . round($gross_pay / $daypermonth) . '">' . round($gross_pay / $daypermonth) . '</td>';
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

                    while ($employeedata = mysqli_fetch_assoc($select_gross_pay)) {
                        $gross_pay = $employeedata['gross_pay'];

                        echo '<td><input hidden type="text" name="ServiceGratuityBreakupY[]" id="ServiceGratuityBreakupY_' . $a . '" value="' . round($gross_pay * $interval->y) . '">' . round($gross_pay * $interval->y) . '</td>';
                        echo '<td><input hidden type="text" name="ServiceGratuityBreakupM[]" id="ServiceGratuityBreakupM_' . $a . '" value="' . round($gross_pay * $interval->m) . '">' . round($gross_pay * $interval->m) . '</td>';
                        echo '<td><input hidden type="text" name="ServiceGratuityBreakupD[]" id="ServiceGratuityBreakupD_' . $a . '" value="' . round($gross_pay / $interval->d) . '">' . round($gross_pay / $interval->d) . '</td>';
                    }
                }

                $currentYear = date('Y');
                $period = '01-07-' . $currentYear; // July 1st of the current year

                $joiningDateTime = DateTime::createFromFormat('d-m-Y', $period);

                $toDateTime = DateTime::createFromFormat('Y-m-d', $timeperiod); // Assuming $timeperiod is already in 'Y-m-d' format

                // Calculate the difference
                $interval = $joiningDateTime->diff($toDateTime);
                $select_gross_pay = mysqli_query($conn, "SELECT `gross_pay` FROM `earning_deduction_fund` WHERE `employee_id`='$emil' ");

                while ($employeedata = mysqli_fetch_assoc($select_gross_pay)) {
                    $gross_pay = $employeedata['gross_pay'];

                    echo '<td><input hidden type="text" name="PeriodGratuityBreakupY[]" id="PeriodGratuityBreakupY_' . $a . '" value="' . round($gross_pay * $interval->y) . '">' . round($gross_pay * $interval->y) . '</td>';
                    echo '<td><input hidden type="text" name="PeriodGratuityBreakupM[]" id="PeriodGratuityBreakupM_' . $a . '" value="' . round($gross_pay * $interval->m) . '">' . round($gross_pay * $interval->m) . '</td>';
                    
                    echo '<td><input hidden type="text" name="PeriodGratuityBreakupD[]" id="PeriodGratuityBreakupD_' . $a . '" value="' . round($gross_pay / $interval->d) . '"> ' . round($gross_pay / $interval->d) . '</td>';
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
     
                         while ($employeedata = mysqli_fetch_assoc($select_gross_pay)) {
                             $gross_pay = $employeedata['gross_pay'];
                             
     
                             echo '<input hidden type="text" name="TotalPeriodGratuity[]" id="TotalPeriodGratuity_' . $a . '" value="' . round($gross_pay * $interval->y) + round($gross_pay*$interval->m) + round($gross_pay / $interval->d) .'">';
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

                    while ($employeedata = mysqli_fetch_assoc($select_gross_pay)) {
                        $gross_pay = $employeedata['gross_pay'];

                        echo '<input hidden type="text" name="TotalGratuity[]" id="TotalGratuity_' . $a . '" value="' . (round($gross_pay * $interval->y) + round($gross_pay * $interval->m) + round($gross_pay / $interval->d)) . '">';
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
  
</script>
  </body>
</html><?php }}?>