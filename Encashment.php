<?php
session_start();
error_reporting(0);

include 'link/desigene/db.php';

if(isset($_POST['Encashment'])){
    $employee=$_POST['employee_no'];
    $fromdate=$_POST['from'];
    $todate=$_POST['to'];
        
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>Leave Encasement</title>
        <meta content="" name="description">
        <meta content="" name="keywords">
         <!-- Google Fonts -->
         <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Dosis:300,400,500,,600,700,700i|Lato:300,300i,400,400i,700,700i" rel="stylesheet">
         <!-- font-awesome -->
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
         <!-- Vendor CSS Files -->
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="dist/select2/select2.min.css">
        <link rel="stylesheet" href="dist/sweat-alerts/sweetalert.css">
        <link rel="stylesheet" href="css/style.css">
        <!-- Custom JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
        <script src="dist/select2/select2.min.js"></script>
        <script src="dist/js/validations.js"></script>
        <script src="dist/sweat-alerts/sweetalert.js"></script>
        <!-- CKEditor -->
        <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script> 
        </head>
        <body>
        <button type="button" id="print" style="position: fixed;" class="btn btn-success no-print">Generate PDF</button>
        <div id="content">
            <div class="row text-center mt-5">
               <div class="col-4 text-center mt-5">
                    <img src="image/1662096718940.jpg" class="w-50 img-fluid " alt="">
                </div>
                <div class="col-8 text-center mt-5">
                    <h3>Water & Sanitation Services Company</h3>
                    <h6>Mingora Swat</h6>
                    <h6> Leave Encasement</h6>
                    <h6> <?php echo date('d-M-Y', strtotime($fromdate))." To ".date('d-M-Y', strtotime($todate))?></h6>
                </div>
                <p>Date : <?php echo date("d-M-Y")?></p>
                    <table class="table">
                        <thead>
                                  
                            <tr>
                                <th>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Employee</th>
                                                <th>Ann. Leave
                                                Enti-ment</th>
                                                <th> Ann. Leave Availed</th>
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
                                                <tr>
                                                    <td><?php echo $row['EmployeeNo']; ?><h5><?php echo $row['fName']; ?> <?php echo $row['lName']; ?></h5><?php echo $row['Joining_Date']; ?></td>
                                                    <td>15</td>
                                                    <td><?php $contleave=mysqli_query($conn,"SELECT SUM(TotalDays) AS empleave FROM `leavereq` WHERE `EmployeeNo`='$empNo' && `Statusofmanger`='ACCEPT' && `StatusofGm`='ACCEPT' && `LeaveTo`>='$fromdate' && `LeaveTo`<='$todate';");
                                                    
                                                        // Check if the query executed correctly
                                                        if (!$contleave) {
                                                            die('Query Error: ' . mysqli_error($conn));
                                                        }

                                                        // Fetch the data
                                                        $countdata = mysqli_fetch_assoc($contleave);

                                                        // Check if data is fetched and if 'empleave' is NULL
                                                        if ($countdata && !is_null($countdata['empleave'])) {
                                                            echo $countdata['empleave'];
                                                        } else {
                                                            echo 0;
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
                                                            echo $countdata['empleave'];
                                                        } else {
                                                            echo 15;
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
                                                            echo $countdata['empleave'];
                                                        } else {
                                                            echo 15 / 2.0;
                                                        }
                                                        ?>
                                                        </td>
                                                    <td><?php $contleave=mysqli_query($conn,"SELECT (gross_pay) FROM `earning_deduction_fund` WHERE `employee_id`='$emil';");
                                                    $countdata = mysqli_fetch_assoc($contleave); echo $countdata['gross_pay'];?></td>
                                                    <td><?php $contleave=mysqli_query($conn,"SELECT (gross_pay)*12 AS pay FROM `earning_deduction_fund` WHERE `employee_id`='$emil';");
                                                    $countdata = mysqli_fetch_assoc($contleave); echo $countdata['pay'];?></td>
                                                    <td><?php $contleave=mysqli_query($conn,"SELECT (gross_pay)/$working_day  AS pay FROM `earning_deduction_fund` WHERE `employee_id`='$emil';");
                                                    $countdata = mysqli_fetch_assoc($contleave); echo $countdata['pay'];?></td>
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
                                                    $countdata = mysqli_fetch_assoc($contleave); echo $days*$countdata['pay'];?></td>
                                                    <td><?php echo $row['Salary_Bank']." | ".$row['Salary_Branch']?></td>
                                                    <td><?php echo $row['Account_No']?></td>
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
                </div>
               
                <hr>
                <div class="text-center">
                    <b>Human Resource Department WSSC Swat.</b>
                </div>
                <p style="font-size: 8px;" >Software by Kurtlar Developer www.kurtlardeveloper.com</p>
                <hr>
</div>
            
    <style>@media print {
    .no-print {
        display: none;
    }
}
</style>
    
    

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function () {
                    $('#print').click(function(l) {
                        window.print();
                    });
                });
            </script>
        </body>

        </html>
<?php
    } 
    
else if(isset($_POST['Gratuity'])){
    $employee=$_POST['employee_no'];
    $fromdate=$_POST['from'];
    $todate=$_POST['to'];
        
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>Gratuity</title>
        <meta content="" name="description">
        <meta content="" name="keywords">
         <!-- Google Fonts -->
         <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Dosis:300,400,500,,600,700,700i|Lato:300,300i,400,400i,700,700i" rel="stylesheet">
         <!-- fontawesome -->
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
         <!-- Vendor CSS Files -->
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="dist/select2/select2.min.css">
        <link rel="stylesheet" href="dist/sweat-alerts/sweetalert.css">
        <link rel="stylesheet" href="css/style.css">
        <!-- Custom JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
        <script src="dist/select2/select2.min.js"></script>
        <script src="dist/js/validations.js"></script>
        <script src="dist/sweat-alerts/sweetalert.js"></script>
        <!-- CKEditor -->
        <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script> 
        </head>
        <body>
        <button type="button" id="print" style="position: fixed;" class="btn btn-success no-print">Generate PDF</button>
        <div id="content">
            <div class="row text-center mt-5">
               <div class="col-4 text-center mt-5">
                    <img src="image/1662096718940.jpg" class="w-50 img-fluid " alt="">
                </div>
                <div class="col-8 text-center mt-5">
                    <h3>Water & Sanitation Services Company</h3>
                    <h6>Mingora Swat</h6>
                    <h6>Gratuity Statement as on:<?php echo date("d-M-Y")?></h6>
                    <h6><?php echo date('d-M-Y', strtotime($fromdate))." To ".date('M-Y', strtotime($todate))?></h6>
                </div>
                    <table class="table ">
                        <thead>
                            <?php 
                            $selecttime= mysqli_query($conn,"SELECT  `ToDate` FROM `timeperiod` LIMIT 1;");
                            $timedate=mysqli_fetch_assoc($selecttime);
                            $timeperiod=$timedate['ToDate'];
                            ?>
                                  
                            <tr>
                                <th>
                                    <table class="table">
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
                                            if($employee!=""){
                                            $sql = "SELECT * FROM `employeedata` WHERE `EmployeeNo`='$employee' && STR_TO_DATE(`Joining_Date`, '%d %m %Y') <= DATE_SUB(STR_TO_DATE('$timeperiod', '%Y-%m-%d'), INTERVAL 1 YEAR);";
                                            }
                                            else{
                                            $sql = "SELECT * FROM `employeedata` WHERE STR_TO_DATE(`Joining_Date`, '%d %m %Y') <= DATE_SUB(STR_TO_DATE('$timeperiod', '%Y-%m-%d'), INTERVAL 1 YEAR);";
                                            }
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            $a = 1;
                                            while ($row = mysqli_fetch_array($result)) {
                                                $emil = $row['Id'];
                                                $empNo = $row['EmployeeNo'];
                                                $working_day = 4*($row['Weekly_Working_Days']);
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['EmployeeNo']; ?></td>
                                                    <td><h5><?php echo $row['fName']; ?> <?php echo $row['lName']; ?></h5></td>
                                                    <td><?php echo $row['Job_Tiltle']; ?></td>
                                                    <td><?php echo $row['Grade']; ?></td>
                                                    <td><?php echo $row['Joining_Date']; ?></td>
                                                    <td><?php echo $row['Contract_Expiry_Date']; ?></td>
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
                                                     echo '<td>'.$interval->y .'</td>'.'<td>'.$interval->m .'</td>'.'<td>'.$interval->d .'</td>';
                                                }
                                                // Fetch all employees' Joining_Date
                                                    $currentYear = date('Y');
                                                    $period = '01-07-' . $currentYear; // July 1st of the current year
                                                    $joiningDateTime = DateTime::createFromFormat('d-m-Y', $period);
                                                    $toDateTime = DateTime::createFromFormat('Y-m-d', $timeperiod); // Assuming $timeperiod is already in 'Y-m-d' format
                                                    // Calculate the difference
                                                    $interval = $joiningDateTime->diff($toDateTime);
                                                     echo '<td>'.$interval->y .'</td>'.'<td>'.$interval->m .'</td>'.'<td>'.$interval->d .'</td>';
                                                    // Fetch all employees' Joining_Date
                                                $select_gross_pay = mysqli_query($conn, "SELECT `gross_pay` FROM `earning_deduction_fund` WHERE `employee_id`='$emil' ");
                                                while ($employeedata = mysqli_fetch_assoc($select_gross_pay)) {
                                                    $gross_pay = $employeedata['gross_pay'];
                                                    $daypermonth=$row['Weekly_Working_Days']*4;
                                                    echo '<td>' . round($gross_pay * 12) . '</td>' . 
                                                    '<td>' . round($gross_pay) . '</td>' . 
                                                    '<td>' . round($gross_pay / $daypermonth) . '</td>';
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
                                                        
    
                                                        echo '<td>' . round($gross_pay * $interval->y) . '</td>' . 
                                                        '<td>' . round($gross_pay*$interval->m) . '</td>' . 
                                                        '<td>' . round($gross_pay / $interval->d) . '</td>';
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
                                                        
    
                                                        echo '<td>' . round($gross_pay * $interval->y) . '</td>' . 
                                                        '<td>' . round($gross_pay*$interval->m) . '</td>' . 
                                                        '<td>' . round($gross_pay / $interval->d) . '</td>';
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
                                                            
        
                                                            echo '<td>' . round($gross_pay * $interval->y) + round($gross_pay*$interval->m) + round($gross_pay / $interval->d) . '</td>';
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
                                                        
    
                                                        echo '<td>' . round($gross_pay * $interval->y) + round($gross_pay*$interval->m) + round($gross_pay / $interval->d) . '</td>';
                                                    }                                              
                                                }
                                               
                                                    ?>
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
                </div>
               
                <hr>
                <div class="text-center">
                    <b>Human Resource Department WSSC Swat.</b>
                </div>
                <p style="font-size: 8px;" >Software by Kurtlar Developer www.kurtlardeveloper.com</p>
                
                <hr>
</div>
            
    <style>@media print {
    .no-print {
        display: none;
    }
}
</style>
    
    

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function () {
                    $('#print').click(function(l) {
                        window.print();
                    });
                });
            </script>
        </body>

        </html>
<?php
    } 
    ?>