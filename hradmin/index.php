<?php
session_start();
error_reporting(0);
// links to database
include('link/desigene/db.php');

if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber'])) {
    ?>   <script>
        location.replace('../logout.php')
    </script><?php
  } else{

?><!DOCTYPE html>
<html lang="en">
<head>
   <?php include ('link/links.php')?>
</head>
<body>
    <?php include ('link/desigene/sidebar.php')?>
<div id="main">
<?php include('link/desigene/navbar.php')?>
<div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-3 col-md-3 m-4 p-3">
                   <a href="EXITCLEARANCEFORM.php">
                   <div class="card text-white mb-3" style="max-width: 18rem;background-color:#0C1C5F;">
                        <div class="card-header">Exit clearance from</div>
                        <div class="card-body">
                            <h5 class="card-title">Number</h5>
                            <p class="card-text">
                                <?php
                                include ('link/desigene/db.php');
                                // Query to get the sum of rate column for the current month
                                $query = mysqli_query($conn, "SELECT COUNT(*) AS CountNullRows
                                FROM employee_exit
                                WHERE HRMS IS NULL
                                  AND HRMS_Remarks IS NULL
                                  AND EOBI IS NULL
                                  AND EOBI_Remarks IS NULL
                                  AND Leve IS NULL
                                  AND Leve_Remarks IS NULL
                                  AND Gratuity IS NULL
                                  AND HR_Approved_Date IS NULL
                                  AND Gratuity_Remarks IS NULL;
                                ");
                                $row = mysqli_fetch_array($query); // Use $query instead of $result
                                echo $row['CountNullRows'];
                                ?>
                            </p>
                        </div>
                    </div>
                   </a> 
                </div>
                <div class="col-sm-12 col-lg-3 col-md-3 m-4 p-3">
                    <div class="card text-white mb-3" style="max-width: 18rem;background-color:#0C1C5F;">
                        <div class="card-header">Total Amount Payroll of this mounth</div>
                        <div class="card-body">
                            <h5 class="card-title">RS</h5>
                            <p class="card-text">
                                <?php
                                include ('link/desigene/db.php');
                                // Query to get the sum of rate column for the current month
                                $query = mysqli_query($conn, "SELECT SUM(rate) AS total_rate FROM rate WHERE MONTH(Date) = MONTH(CURRENT_DATE()) AND YEAR(Date) = YEAR(CURRENT_DATE())");
                                $row = mysqli_fetch_array($query); // Use $query instead of $result
                                echo $row['total_rate'];
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3 col-md-3 m-4  p-3">
                    <div class="card text-light mb-3" style="max-width: 18rem;background-color:#2A64C4">
                        <div class="card-header">Total Amount WSSC of This Mounth</div>
                        <div class="card-body">
                            <h5 class="card-title">RS</h5>
                            <p class="card-text">
                                <?php
                                include ('link/desigene/db.php');
                                // Query to get the sum of rate column for the current month
                                $query = mysqli_query($conn, "SELECT SUM(rate) AS total_rate_wssc FROM rate WHERE EmployementType = 'WSSC' AND MONTH(Date) = MONTH(CURRENT_DATE()) AND YEAR(Date) = YEAR(CURRENT_DATE());");
                                $row = mysqli_fetch_array($query); // Use $query instead of $result
                                echo $row['total_rate_wssc'];
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3 col-md-3 m-4  p-3">
                    <div class="card text-white mb-3" style="max-width: 18rem;background-color:#61AFE4">
                        <div class="card-header">Total Amount Tma of This Mounth</div>
                        <div class="card-body">
                            <h5 class="card-title">RS</h5>
                            <p class="card-text">
                                <?php
                                include ('link/desigene/db.php');
                                // Query to get the sum of rate column for the current month
                                $query = mysqli_query($conn, "SELECT SUM(rate) AS total_rate_tma FROM rate WHERE EmployementType = 'TMA' AND MONTH(Date) = MONTH(CURRENT_DATE()) AND YEAR(Date) = YEAR(CURRENT_DATE())");
                                
                                $row = mysqli_fetch_array($query); // Use $query instead of $result
                                echo $row['total_rate_tma'];
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3 col-md-3 m-4  p-3">
                    <div class="card text-white mb-3" style="max-width: 18rem;background-color:#0C6170">
                        <div class="card-header">Amount Difference b/w WSSC And TMA</div>
                        <div class="card-body">
                            <h5 class="card-title">RS</h5>
                            <p class="card-text">
                                <?php
                                include ('link/desigene/db.php');
                                // Query to get the sum of rate column for the current month
                                $query = mysqli_query($conn, "SELECT
                                (SELECT SUM(rate) FROM rate WHERE EmployementType = 'TMA' AND MONTH(Date) = MONTH(CURRENT_DATE()) AND YEAR(Date) = YEAR(CURRENT_DATE())) -
                                (SELECT SUM(rate) FROM rate WHERE EmployementType = 'WSSC' AND MONTH(Date) = MONTH(CURRENT_DATE()) AND YEAR(Date) = YEAR(CURRENT_DATE())) AS rate_difference;");
                                $row = mysqli_fetch_array($query); // Use $query instead of $result
                                echo $row['rate_difference'];
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3 col-md-3 m-4  p-3">
                    <div class="card text-light mb-3" style="max-width: 18rem; background-color:#37BEB0">
                        <div class="card-header">Amount Difference Previous Month</div>
                        <div class="card-body">
                            <h5 class="card-title">RS</h5>
                            <p class="card-text">
                                <?php
                                include ('link/desigene/db.php');
                                // Query to get the sum of rate column for the current month
                                $query = mysqli_query($conn, "SELECT
                                (SELECT SUM(rate) FROM rate WHERE MONTH(Date) = MONTH(CURRENT_DATE()) AND YEAR(Date) = YEAR(CURRENT_DATE())) -
                                (SELECT SUM(rate) FROM rate WHERE MONTH(Date) = MONTH(CURRENT_DATE() - INTERVAL 1 MONTH) AND YEAR(Date) = YEAR(CURRENT_DATE() - INTERVAL 1 MONTH)) AS rate_difference_previous_month;");
                                $row = mysqli_fetch_array($query); // Use $query instead of $result
                                echo $row['rate_difference_previous_month'];
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3 col-md-3 m-4  p-3">
                    <div class="card mb-3" style="max-width: 18rem; background-color:#A4E5E0">
                        <div class="card-header">Total Employees</div>
                        <div class="card-body">
                            <h5 class="card-title">Number</h5>
                            <p class="card-text">
                                <?php
                                include ('link/desigene/db.php');
                                // Query to get the sum of rate column for the current month
                               // Query to get the total number of employees
                                $query = mysqli_query($conn, "SELECT COUNT(id) AS total_employees FROM employeedata");
                                $row = mysqli_fetch_array($query);
                                echo $row['total_employees'];
                                // Close the database connection
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3 col-md-3 m-4  p-3">
                    <div class="card text-white mb-3" style="max-width: 18rem; background-color:#3A93B0">
                        <div class="card-header">Total Employees With Payroll</div>
                        <div class="card-body">
                            <h5 class="card-title">Number</h5>
                            <p class="card-text">
                                <?php
                                include ('link/desigene/db.php');
                                  // Get the current month and year
                                $current_month = date('m');
                                $current_year = date('Y');

                                // Query to count the number of distinct employees with added payroll
                                $query = mysqli_query($conn, "SELECT COUNT(DISTINCT employee_id) AS total_employees FROM rate WHERE MONTH(Date) = $current_month AND YEAR(Date) = $current_year");
                                $row = mysqli_fetch_assoc($query);
                                $total_employees_with_payroll = $row['total_employees'];

                                echo $total_employees_with_payroll;

                                // Close the database connection
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3 col-md-3 m-4  p-3">
                    <div class="card text-white mb-3" style="max-width: 18rem; background-color:#6DBEC3">
                        <div class="card-header">Total Employees Without Payroll</div>
                        <div class="card-body">
                            <h5 class="card-title">Number</h5>
                            <p class="card-text">
                                <?php
                                include ('link/desigene/db.php');
                                        // Get the current month and year
                                    $current_month = date('m');
                                    $current_year = date('Y');

                                    // Query to count the total number of distinct employees
                                    $total_query = mysqli_query($conn, "SELECT COUNT(id) AS total_employees FROM employeedata");

                                    // Query to count the number of distinct employees with added payroll
                                    $payroll_query = mysqli_query($conn, "SELECT COUNT(DISTINCT employee_id) AS employees_with_payroll FROM rate WHERE MONTH(Date) = $current_month AND YEAR(Date) = $current_year");

                                    $total_row = mysqli_fetch_assoc($total_query);
                                    $payroll_row = mysqli_fetch_assoc($payroll_query);

                                    $total_employees = $total_row['total_employees'];
                                    $employees_with_payroll = $payroll_row['employees_with_payroll'];

                                    // Calculate the number of employees without added payroll
                                    $employees_without_payroll = $total_employees - $employees_with_payroll;

                                    echo $employees_without_payroll;


                                // Close the database connection
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>


<?php include('link/desigene/script.php')?>
</body>
</html>
<?php }?>