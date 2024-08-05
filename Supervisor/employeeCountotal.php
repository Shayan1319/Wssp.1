<?php
session_start();
error_reporting(0);

include('link/desigene/db.php');

if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber']) || $_SESSION['Designation'] != 'Supervisor') {
    error_log("Unauthorized access attempt. User: {$_SESSION['loginid']}");
    header("Location: ../logout.php");
    exit;
} else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('link/links.php') ?>
    <style>
        h4, h3 { text-align: center; }
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
                        $select = mysqli_query($conn, 'SELECT * FROM `timeperiod` ORDER BY `timeperiod`.`ID` DESC');
                        $a = 1;

                        while ($rowofTP = mysqli_fetch_array($select)) {
                            if (isset($_POST["submit" . $a])) {
                                $timeperiodId = $_POST['timeperiodId'];
    $employeeIds = $_POST['Employeeid'];
    $shifts = $_POST['Shift'];
    $tehsils = $_POST['Tehsil'];
    $areas = $_POST['Area'];
    $dates = $_POST['Date'];
    $ddorots = $_POST['DDorOT'];
    $statuses = $_POST['status'];

    $values = [];

    foreach ($employeeIds as $index => $employeeid) {
        $shift = $shifts[$index];
        $tehsil = $tehsils[$index];
        $area = $areas[$index];
        $date = $dates[$index];
        $ddorot = $ddorots[$index];
        $status = $statuses[$index];

        // Sanitize inputs to prevent SQL injection
        $employeeid = mysqli_real_escape_string($conn, $employeeid);
        $shift = mysqli_real_escape_string($conn, $shift);
        $tehsil = mysqli_real_escape_string($conn, $tehsil);
        $area = mysqli_real_escape_string($conn, $area);
        $date = mysqli_real_escape_string($conn, $date);
        $ddorot = mysqli_real_escape_string($conn, $ddorot);
        $status = mysqli_real_escape_string($conn, $status);

        $values[] = "('$employeeid', '$shift', '$tehsil', '$area', '$date', '$ddorot', '$status', '$timeperiodId')";
    }

    $valuesString = implode(', ', $values);

    $sql = "INSERT INTO `atandece` (Employeeid, Shift, Tehsil, Area, Date, DDorOT, status, timeperiodId) VALUES $valuesString";

    if (mysqli_query($conn, $sql)) {
        echo "Records have been successfully submitted.";
    } else {
        error_log("Insert failed: " . mysqli_error($conn));
        echo "Error: " . mysqli_error($conn);
    }
                            }
                        ?>
                        <form action="" method="post">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading<?php echo $a ?>">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $a ?>" aria-expanded="true" aria-controls="collapse<?php echo $a ?>">
                                        Time Period # <?php echo $rowofTP['ID'] ?> <input type="number" hidden name="timeId" value="<?php echo $rowofTP['ID'] ?>"> | From: <?php echo date('d-m-Y', strtotime($rowofTP['ToDate']))?> | To: <?php echo date('d-m-Y', strtotime($rowofTP['ToDate'])); ?> | Working day: <?php echo $rowofTP['WrokingDays'] ?>
                                        <button type="submit" name="submit<?php echo $a ?>" class="btn btn-primary">Submit Records <?php echo date('M-y', strtotime($rowofTP['ToDate']))?></button>
                                    </button>
                                </h2>
                                <div id="collapse<?php echo $a ?>" class="accordion-collapse collapse show" aria-labelledby="heading<?php echo $a ?>" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="accordion" id="employeeAccordion<?php echo $a ?>">
                                            <div class="accordion-body">
                                                <table class="table">
                                                    <thead style="background-color: darkblue;">
                                                        <tr>
                                                            <th scope="col" class="text-white">#</th>
                                                            <th scope="col" class="text-white">Employee No</th>
                                                            <th scope="col" class="text-white">Employee Name</th>
                                                            <th scope="col" class="text-white">Designation</th>
                                                            <th scope="col" class="text-white">Employee Class</th>
                                                            <th scope="col" class="text-white">Date</th>
                                                            <th scope="col" class="text-white">Tehsil</th>
                                                            <th scope="col" class="text-white">Shift</th>
                                                            <th scope="col" class="text-white">DDorOT</th>
                                                            <th scope="col" class="text-white">Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="table-data">
                                                    <?php
                                                        $Employee_Manager = $_SESSION['EmployeeNumber'];
                                                        $selectEmp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `Status`='ON-DUTY' && `Attendance_Supervisor`=$Employee_Manager");
                                                        $e = 1;
                                                        while ($rowoemp = mysqli_fetch_array($selectEmp)) {
                                                            $fromdate = $rowofTP['FromDate'];
                                                            $todate = $rowofTP['ToDate'];
                                                            $working_day = $rowofTP['WrokingDays'];
                                                            $startDate = new DateTime($fromdate);
                                                            $endDate = new DateTime($todate);
                                                            $i=1;
                                                            while ($startDate < $endDate) {
                                                                $date = $startDate->format('Y-m-d');
                                                                $holidays_query = mysqli_query($conn, "SELECT `Date`, `Day` FROM `holidays` WHERE `Date`='$date'");
                                                                if(mysqli_num_rows($holidays_query)){
                                                                    $startDate->modify('+1 day');
                                                                }
                                                        ?>
                                                        <tr>
                                                            <td scope="col"><?php echo $i?></td>
                                                            <td scope="col"><?php echo $rowoemp['EmployeeNo'] ?>
                                                            <input hidden type="number" name="Employeeid[]" value="<?php echo $rowoemp['EmployeeNo'] ?>">
                                                            <input hidden type="number" name="timeperiodId[]" value="<?php echo $rowofTP['ID'] ?>">
                                                            </td>
                                                            <td scope="col"><?php echo $rowoemp['fName'] ?> <?php echo $rowoemp['lName'] ?></td>
                                                            <td scope="col"><?php echo $rowoemp['Job_Tiltle'] ?></td>
                                                            <td scope="col"> <?php echo $rowoemp['Employee_Class'] ?></td>
                                                            <td scope="col"><?php echo $startDate->format('d-m-Y');?>
                                                                <input hidden type="text" name="Date[]" value="<?php echo $startDate->format('d-m-Y');?>">
                                                            </td>
                                                            <td scope="col"><?php echo $rowoemp['Duty_Point'] ?> 
                                                                <input hidden type="text" name="Tehsil[]" value="<?php echo $rowoemp['Duty_Point'] ?>">
                                                                <input hidden type="text" name="Area[]" value="<?php echo $rowoemp['Duty_Location'] ?>">
                                                            </td>
                                                            <td scope="col">
                                                                <div class="form-group">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" value="Morning" type="radio" name="Shift[<?php echo $rowoemp['Id'].$i;?>]" id="morning<?php echo $rowoemp['Id'].$i; ?>" checked>
                                                                        <label class="form-check-label" for="morning<?php echo $rowoemp['Id'].$i; ?>">
                                                                            Morning
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" value="Evening" type="radio" name="Shift[<?php echo $rowoemp['Id'].$i; ?>]" id="evening<?php echo $rowoemp['Id'].$i; ?>">
                                                                        <label class="form-check-label" for="evening<?php echo $rowoemp['Id'].$i; ?>">
                                                                            Evening
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td scope="col">
                                                                <div class="form-group">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" value="Double duty" type="radio" name="DDorOT[<?php echo $rowoemp['Id'].$i; ?>]" id="DoubleDuty<?php echo $rowoemp['Id'].$i; ?>">
                                                                        <label class="form-check-label" for="DoubleDuty<?php echo $rowoemp['Id'].$i; ?>">
                                                                            Double duty
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" value="Over Time" type="radio" name="DDorOT[<?php echo $rowoemp['Id'].$i; ?>]" id="OverTime<?php echo $rowoemp['Id'].$i; ?>">
                                                                        <label class="form-check-label" for="OverTime<?php echo $rowoemp['Id'].$i; ?>">
                                                                            Over Time
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" value="PRESENT" type="radio" name="status[<?php echo $rowoemp['Id'].$i ?>]" id="flexRadioDefaultAccept<?php echo $rowoemp['Id'].$i ?>" checked>
                                                                    <label class="form-check-label" for="flexRadioDefaultAccept<?php echo $rowoemp['Id'].$i ?>">
                                                                        Present
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" value="ABSENT" type="radio" name="status[<?php echo $rowoemp['Id'].$i ?>]" id="flexRadioDefaultReject<?php echo $rowoemp['Id'].$i ?>">
                                                                    <label class="form-check-label" for="flexRadioDefaultReject<?php echo $rowoemp['Id'].$i ?>">
                                                                        Absent
                                                                    </label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                            $startDate->modify('+1 day');
                                                            $i++;
                                                            }
                                                            $e++;
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
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
