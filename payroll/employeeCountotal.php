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
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <?php include('link/links.php') ?>
        <style>
            h4,
            h3 {
                text-align: center;
            }
        </style>
    </head>
    
    <body>
        <div id="main">
            <?php include('link/desigene/navbar.php') ?>
            <div class="container-fluid m-auto p-5">
                <div class="row my-3">
                    <div class="col-12">
                        <div class="accordion" id="accordionExample">
                            <?php
                            $select = mysqli_query($conn, 'SELECT * FROM `timeperiod` ORDER BY `timeperiod`.`ID` DESC ');
                            $a = 1;
    
                            while ($rowofTP = mysqli_fetch_array($select)) {
                                if (isset($_POST["submit" . $a])) {
                                    $Status = $_POST['Status'];
                                    $Ids = $_POST['Id'];
                                    $Date = date('Y-m-d');  // Change 'Y-M-D' to 'Y-m-d'
                                    foreach ($Ids as $key => $Id) {
                                        $salarySql = mysqli_query($conn, "UPDATE `atandece` SET `PayrollStatus`='{$Status[$key]}', `PayrollStatusDate`='$Date' WHERE `id`='$Id'");               
                                        if ($salarySql) {
                                            echo '<script>alert( "Data updated successfully");</script>';
                                            ?>
                                            <script>
                                              location.replace('employeeCountotal.php');
                                            </script>
                                            <?php 
                                        } else {
                                            echo '<script>alert( "Error updating data: ' . mysqli_error($conn) . '");</script>';
                                        }
                                    }
                                }                            
                            ?>
                                <form action="" method="post">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading<?php echo $a ?>">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $a ?>" aria-expanded="true" aria-controls="collapse<?php echo $a ?>">
                                                Time Period # <?php echo $rowofTP['ID'] ?> | From: <?php echo $rowofTP['FromDate'] ?> | To: <?php echo $rowofTP['ToDate'] ?> | Working day: <?php echo $rowofTP['WrokingDays'] ?>
    
                                                <button type="submit" name="submit<?php echo $a ?>" class="btn btn-primary">Update Records</button>
                                            </button> 
                                        </h2>
                                        <div id="collapse<?php echo $a ?>" class="accordion-collapse collapse show" aria-labelledby="heading<?php echo $a ?>" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="accordion" id="employeeAccordion<?php echo $a ?>">
                                                <?php
                                                    $selectmang = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `Status`='ON-DUTY' && `type`='MANAGER'");
                                                    $m = 1;
                                                    while ($rowomang = mysqli_fetch_array($selectmang)) {
                                                        echo "Manager";
                                                    ?>
                                                        <div class="accordion-item">
                                                            <!-- Adjust the fields accordingly based on your database structure -->
                                                            <h2 class="accordion-header" id="headingEmp<?php echo $m . $a ?>">
                                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEmp<?php echo $m . $a ?>" aria-expanded="true" aria-controls="collapseEmp<?php echo $m . $a ?>">
                                                                    Employee # <?php echo $rowomang['EmployeeNo'] ?> | Name : <?php echo $rowomang['fName'] ?> <?php echo $rowomang['mName'] ?> <?php echo $rowomang['lName'] ?> | Type: <?php echo $rowomang['Job_Tiltle'] ?> | Employeement Group: <?php echo $rowomang['Employement_Group'] ?> | Employee Class: <?php echo $rowomang['Employee_Class'] ?> |  <?php 
                                                                    $employee_nocount=$rowomang['EmployeeNo'];
                                                                    $fromdatetoatt=$rowofTP['FromDate'];
                                                                    $todatetoatt=$rowofTP['ToDate'];
                                                                    $resultatdcont = mysqli_query($conn, "SELECT COUNT(*) AS TotalAttendance FROM atandece WHERE `Employeeid` = $employee_nocount &&  `Date`>=$fromdatetoatt && `Date`<=$todatetoatt");
                                                                    if (mysqli_num_rows($resultatdcont) > 0) {
                                                                        while ($rownubatd = mysqli_fetch_assoc($resultatdcont)) {
                                                                            echo "Attendees: " . $rowofTP['WrokingDays'] . " / " . $rownubatd["TotalAttendance"] . "<br>";
                                                                        }
                                                                    } else {
                                                                        echo "Attendees: " . $rowofTP['WrokingDays'] . " / " . 0 . "<br>";
                                                                    }
                                                                    ?>
                                                                </button>
                                                            </h2>
                                                            <div id="collapseEmp<?php echo $m . $a ?>" class="accordion-collapse collapse show" aria-labelledby="headingEmp<?php echo $m . $a ?>" data-bs-parent="#employeeAccordion<?php echo $m . $a ?>">
                                                                <div class="accordion-body">
                                                                    <!-- Populate table data based on your requirements -->
                                                                    <table class="table">
                                                                        <thead style="background-color: darkblue;">
                                                                            <tr>
                                                                                <th scope="col" class="text-white">#</th>
                                                                                <th scope="col" class="text-white">Employee No</th>
                                                                                <th scope="col" class="text-white">Employee Name</th>
                                                                                <th scope="col" class="text-white">Designation</th>
                                                                                <th scope="col" class="text-white">Employee Class</th>
                                                                                <th scope="col" class="text-white">Date</th>
                                                                                <th scope="col" class="text-white">Shift</th>
                                                                                <th scope="col" class="text-white">Tehsil</th>
                                                                                <th scope="col" class="text-white">Status</th>
                                                                                <th scope="col" class="text-white">DDorOT</th>
                                                                                <th scope="col" class="text-white">Accept</th>
                                                                                <th scope="col" class="text-white">Reject</th>
                                                                                <th scope="col" class="text-white">Accept Status</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="table-data">
                                                                            <!-- Populate this with actual data from your database -->
                                                                            <?php
                                                                            $empnumber = $rowomang['EmployeeNo'];
                                                                            $fromdate = $rowofTP['FromDate'];
                                                                            $todate = $rowofTP['ToDate'];
                                                                            $workingdate = $rowofTP['WrokingDays'];
                                                                            $selectat = mysqli_query($conn, "SELECT * FROM `atandece` WHERE  `Employeeid`='$empnumber' && `Date`>='$fromdate' && `Date`<='$todate'");
                                                                            while ($rowoeatend = mysqli_fetch_array($selectat)) {
                                                                            ?>
                                                                                <tr>
                                                                                    <td scope="col">#</td>
                                                                                    <td scope="col"><?php echo $rowomang['EmployeeNo'] ?></td>
                                                                                    <td scope="col"><?php echo $rowomang['fName'] ?> <?php echo $rowomang['mName'] ?> <?php echo $rowomang['lName'] ?></td>
                                                                                    <td scope="col"><?php echo $rowomang['Job_Tiltle'] ?></td>
                                                                                    <td scope="col"> <?php echo $rowomang['Employee_Class'] ?></td>
                                                                                    <td scope="col"><?php echo $rowoeatend['Date'] ?></td>
                                                                                    <td scope="col"><?php echo $rowoeatend['Shift'] ?></td>
                                                                                    <td scope="col"><?php echo $rowoeatend['Tehsil'] ?></td>
                                                                                    <td scope="col"><?php echo $rowoeatend['status'] ?></td>
                                                                                    <td scope="col"><?php echo $rowoeatend['DDorOT'] ?></td>
                                                                                    <td>
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input" value="ACCEPT" type="radio" name="Status[<?php echo $rowoeatend['id'] ?>]" id="flexRadioDefaultAccept<?php echo $rowoeatend['id'] ?>" checked>
                                                                                            <label class="form-check-label" for="flexRadioDefaultAccept<?php echo $rowoeatend['id'] ?>">
                                                                                                Accept
                                                                                            </label>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="number" value="<?php echo $rowoeatend['id'] ?>" hidden name="Id[<?php echo $rowoeatend['id']?>]" id="">
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input" value="Reject" type="radio" name="Status[<?php echo $rowoeatend['id'] ?>]" id="flexRadioDefaultReject<?php echo $rowoeatend['id'] ?>">
                                                                                            <label class="form-check-label" for="flexRadioDefaultReject<?php echo $rowoeatend['id'] ?>">
                                                                                                Reject
                                                                                            </label>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td><?php echo $rowoeatend['ManagerStatus'] ?></td>
                                                                                </tr>
                                                                            <?php } ?>
                                                                            <!-- End of data loop -->
    
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr><hr>
                                                    <?php
                                                    $Employee_Manager =  $rowomang['EmployeeNo'];
                                                    $selectEmp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `Status`='ON-DUTY' && `Employee_Manager`=$Employee_Manager && `type`='SUPERVISO'");
                                                    $e = 1;
                                                    while ($rowoemp = mysqli_fetch_array($selectEmp)) {
                                                        echo "Superviser";
                                                    ?>
                                                        <div class="accordion-item">
                                                            <!-- Adjust the fields accordingly based on your database structure -->
                                                            <h2 class="accordion-header" id="headingEmp<?php echo $m. $e . $a ?>">
                                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEmp<?php echo $m. $e . $a ?>" aria-expanded="true" aria-controls="collapseEmp<?php echo $m. $e . $a ?>">
                                                                    Employee # <?php echo $rowoemp['EmployeeNo'] ?> | Name : <?php echo $rowoemp['fName'] ?> <?php echo $rowoemp['mName'] ?> <?php echo $rowoemp['lName'] ?> | Type: <?php echo $rowoemp['Job_Tiltle'] ?> | Employeement Group: <?php echo $rowoemp['Employement_Group'] ?> | Employee Class: <?php echo $rowoemp['Employee_Class'] ?> |  <?php 
                                                                    $employee_nocount=$rowoemp['EmployeeNo'];
                                                                    $fromdatetoatt=$rowofTP['FromDate'];
                                                                    $todatetoatt=$rowofTP['ToDate'];
                                                                    $resultatdcont = mysqli_query($conn, "SELECT COUNT(*) AS TotalAttendance FROM atandece WHERE `Employeeid` = $employee_nocount &&  `Date`>=$fromdatetoatt && `Date`<=$todatetoatt");
                                                                    if (mysqli_num_rows($resultatdcont) > 0) {
                                                                        while ($rownubatd = mysqli_fetch_assoc($resultatdcont)) {
                                                                            echo "Attendees: " . $rowofTP['WrokingDays'] . " / " . $rownubatd["TotalAttendance"] . "<br>";
                                                                        }
                                                                    } else {
                                                                        echo "Attendees: " . $rowofTP['WrokingDays'] . " / " . 0 . "<br>";
                                                                    }
                                                                    ?>
                                                                </button>
                                                            </h2>
                                                            <div id="collapseEmp<?php echo $m. $e . $a ?>" class="accordion-collapse collapse show" aria-labelledby="headingEmp<?php echo $m. $e . $a ?>" data-bs-parent="#employeeAccordion<?php echo $m. $e . $a ?>">
                                                                <div class="accordion-body">
                                                                    <!-- Populate table data based on your requirements -->
                                                                    <table class="table">
                                                                        <thead style="background-color: darkblue;">
                                                                            <tr>
                                                                                <th scope="col" class="text-white">#</th>
                                                                                <th scope="col" class="text-white">Employee No</th>
                                                                                <th scope="col" class="text-white">Employee Name</th>
                                                                                <th scope="col" class="text-white">Designation</th>
                                                                                <th scope="col" class="text-white">Employee Class</th>
                                                                                <th scope="col" class="text-white">Date</th>
                                                                                <th scope="col" class="text-white">Shift</th>
                                                                                <th scope="col" class="text-white">Tehsil</th>
                                                                                <th scope="col" class="text-white">Status</th>
                                                                                <th scope="col" class="text-white">DDorOT</th>
                                                                                <th scope="col" class="text-white">Accept</th>
                                                                                <th scope="col" class="text-white">Reject</th>
                                                                                <th scope="col" class="text-white">Accept Status</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="table-data">
                                                                            <!-- Populate this with actual data from your database -->
                                                                            <?php
                                                                            $empnumber = $rowoemp['EmployeeNo'];
                                                                            $fromdate = $rowofTP['FromDate'];
                                                                            $todate = $rowofTP['ToDate'];
                                                                            $workingdate = $rowofTP['WrokingDays'];
                                                                            $selectat = mysqli_query($conn, "SELECT * FROM `atandece` WHERE `ManagerStatus`='ACCEPT' &&  `Employeeid`='$empnumber' && `Date`>='$fromdate' && `Date`<='$todate'");
                                                                            while ($rowoeatend = mysqli_fetch_array($selectat)) {
                                                                            ?>
                                                                                <tr>
                                                                                    <td scope="col">#</td>
                                                                                    <td scope="col"><?php echo $rowoemp['EmployeeNo'] ?></td>
                                                                                    <td scope="col"><?php echo $rowoemp['fName'] ?> <?php echo $rowoemp['mName'] ?> <?php echo $rowoemp['lName'] ?></td>
                                                                                    <td scope="col"><?php echo $rowoemp['Job_Tiltle'] ?></td>
                                                                                    <td scope="col"> <?php echo $rowoemp['Employee_Class'] ?></td>
                                                                                    <td scope="col"><?php echo $rowoeatend['Date'] ?></td>
                                                                                    <td scope="col"><?php echo $rowoeatend['Shift'] ?></td>
                                                                                    <td scope="col"><?php echo $rowoeatend['Tehsil'] ?></td>
                                                                                    <td scope="col"><?php echo $rowoeatend['status'] ?></td>
                                                                                    <td scope="col"><?php echo $rowoeatend['DDorOT'] ?></td>
                                                                                    <td>
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input" value="ACCEPT" type="radio" name="Status[<?php echo $rowoeatend['id'] ?>]" id="flexRadioDefaultAccept<?php echo $rowoeatend['id'] ?>" checked>
                                                                                            <label class="form-check-label" for="flexRadioDefaultAccept<?php echo $rowoeatend['id'] ?>">
                                                                                                Accept
                                                                                            </label>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="number" value="<?php echo $rowoeatend['id'] ?>" hidden name="Id[<?php echo $rowoeatend['id']?>]" id="">
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input" value="Reject" type="radio" name="Status[<?php echo $rowoeatend['id'] ?>]" id="flexRadioDefaultReject<?php echo $rowoeatend['id'] ?>">
                                                                                            <label class="form-check-label" for="flexRadioDefaultReject<?php echo $rowoeatend['id'] ?>">
                                                                                                Reject
                                                                                            </label>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td><?php echo $rowoeatend['ManagerStatus'] ?></td>
                                                                                </tr>
                                                                            <?php } ?>
                                                                            <!-- End of data loop -->
    
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    $Employee_Manager =  $rowomang['EmployeeNo'];
                                                    $Employee_Superviser = $rowoemp['EmployeeNo'];
                                                    $selectEmp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `Status`='ON-DUTY' && `Employee_Manager`=$Employee_Manager && `Attendance_Supervisor`=$Employee_Superviser");
                                                    $f = 1;
                                                    while ($rowoempsup = mysqli_fetch_array($selectEmp)) {
                                                        echo "employee";
                                                    ?>
                                                        <div class="accordion-item">
                                                            <!-- Adjust the fields accordingly based on your database structure -->
                                                            <h2 class="accordion-header" id="headingEmp<?php echo $m . $f . $e . $a ?>">
                                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEmp<?php echo $m . $f . $e . $a ?>" aria-expanded="true" aria-controls="collapseEmp<?php echo $m . $f . $e . $a ?>">
                                                                    Employee # <?php echo $rowoempsup['EmployeeNo'] ?> | Name : <?php echo $rowoempsup['fName'] ?> <?php echo $rowoempsup['mName'] ?> <?php echo $rowoempsup['lName'] ?> | Type: <?php echo $rowoempsup['Job_Tiltle'] ?> | Employeement Group: <?php echo $rowoempsup['Employement_Group'] ?> | Employee Class: <?php echo $rowoempsup['Employee_Class'] ?> <br> Attendees :  <?php 
                                                                    $employeesup_nocount= $rowoempsup['EmployeeNo'];
                                                                    $fromdatetoattsup=$rowofTP['FromDate'];
                                                                    $todatetoattsup=$rowofTP['ToDate'];
                                                                    $resultatdcontsup = mysqli_query($conn, "SELECT COUNT(*) AS TotalAttendancesup FROM atandece WHERE TRIM(`Employeeid`) = '$employeesup_nocount' AND `Date` >= ' $fromdatetoattsup' AND `Date` <= ' $todatetoattsup'; ");
                                                                        while ($rownubatdsup = mysqli_fetch_assoc($resultatdcontsup)) {
                                                                            echo "Attendees: " . $rowofTP['WrokingDays'] . " / " . $rownubatdsup["TotalAttendancesup"] . "<br>";
                                                                        }
                                                                    
                                                                    ?> 
                                                                </button>
                                                            </h2>
                                                            <div id="collapseEmp<?php echo $m . $f . $e . $a ?>" class="accordion-collapse collapse show" aria-labelledby="headingEmp<?php echo $m . $f . $e . $a ?>" data-bs-parent="#employeeAccordion<?php echo $e ?>">
                                                                <div class="accordion-body">
                                                                    <!-- Populate table data based on your requirements -->
                                                                    <table class="table">
                                                                        <thead style="background-color: darkblue;">
                                                                            <tr>
                                                                                <th scope="col" class="text-white">#</th>
                                                                                <th scope="col" class="text-white">Employee No</th>
                                                                                <th scope="col" class="text-white">Employee Name</th>
                                                                                <th scope="col" class="text-white">Designation</th>
                                                                                <th scope="col" class="text-white">Employee Class</th>
                                                                                <th scope="col" class="text-white">Date</th>
                                                                                <th scope="col" class="text-white">Shift</th>
                                                                                <th scope="col" class="text-white">Tehsil</th>
                                                                                <th scope="col" class="text-white">Status</th>
                                                                                <th scope="col" class="text-white">DDorOT</th>
                                                                                <th scope="col" class="text-white">Accept</th>
                                                                                <th scope="col" class="text-white">Reject</th>
                                                                                <th scope="col" class="text-white">Accept Status</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="table-data">
                                                                            <!-- Populate this with actual data from your database -->
                                                                            <?php
                                                                            $empnumber = $rowoempsup['EmployeeNo'];
                                                                            $fromdate = $rowofTP['FromDate'];
                                                                            $todate = $rowofTP['ToDate'];
                                                                            $workingdate = $rowofTP['WrokingDays'];
                                                                            $selectat = mysqli_query($conn, "SELECT * FROM `atandece` WHERE `ManagerStatus`='ACCEPT' &&  `Employeeid`='$empnumber' && `Date`>='$fromdate' && `Date`<='$todate' ");
                                                                            while ($rowoeatendemp = mysqli_fetch_array($selectat)) {
                                                                            ?>
                                                                                <tr>
                                                                                    <td scope="col">#</td>
                                                                                    <td scope="col"><?php echo $rowoempsup['EmployeeNo'] ?></td>
                                                                                    <td scope="col"><?php echo $rowoempsup['fName'] ?> <?php echo $rowoempsup['mName'] ?> <?php echo $rowoempsup['lName'] ?></td>
                                                                                    <td scope="col"><?php echo $rowoempsup['Job_Tiltle'] ?></td>
                                                                                    <td scope="col"> <?php echo $rowoempsup['Employee_Class'] ?></td>
                                                                                    <td scope="col"><?php echo $rowoeatendemp['Date'] ?></td>
                                                                                    <td scope="col"><?php echo $rowoeatendemp['Shift'] ?></td>
                                                                                    <td scope="col"><?php echo $rowoeatendemp['Tehsil'] ?></td>
                                                                                    <td scope="col"><?php echo $rowoeatendemp['status'] ?></td>
                                                                                    <td scope="col"><?php echo $rowoeatendemp['DDorOT'] ?></td>
                                                                                    <td>
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input" value="ACCEPT" type="radio" name="Status[<?php echo $rowoeatendemp['id'] ?>]" id="flexRadioDefaultAccept<?php echo $rowoeatendemp['id'] ?>" checked>
                                                                                            <label class="form-check-label" for="flexRadioDefaultAccept<?php echo $rowoeatendemp['id'] ?>">
                                                                                                Accept
                                                                                            </label>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="number" value="<?php echo $rowoeatendemp['id'] ?>" hidden name="Id[<?php echo $rowoeatendemp['id']?>]" id="">
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input" value="Reject" type="radio" name="Status[<?php echo $rowoeatendemp['id'] ?>]" id="flexRadioDefaultReject<?php echo $rowoeatendemp['id'] ?>">
                                                                                            <label class="form-check-label" for="flexRadioDefaultReject<?php echo $rowoeatendemp['id'] ?>">
                                                                                                Reject
                                                                                            </label>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td><?php echo $rowoeatendemp['ManagerStatus'] ?></td>
                                                                                </tr>
                                                                            <?php } ?>
                                                                            <!-- End of data loop -->
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                        $f++;
                                                    }?>
                                                    <hr>
                                                    <hr>
                                                    <?php
                                                        $e++;
                                                    }
                                                $m++; }
                                                    echo"<hr>";
                                                    ?>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            <?php
                                $a++;
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include('link/desigene/script.php') ?>
    </body>
    
    </html>
    
    <?php } ?>
