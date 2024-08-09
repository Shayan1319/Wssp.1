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
                        // Select query for the time period
                        $select = mysqli_query($conn, 'SELECT * FROM `timeperiod` ORDER BY `timeperiod`.`ID` DESC');
                        $a = 1;
                        while ($rowofTP = mysqli_fetch_array($select)) {
                        ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading<?php echo $a ?>">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse<?php echo $a ?>" data-bs-target="#collapse<?php echo $a ?>" aria-expanded="true" aria-controls="collapse<?php echo $a ?>">
                                        Time Period # <?php echo $rowofTP['ID'] ?> | From: <?php echo date('d-m-Y', strtotime($rowofTP['ToDate']))?> | To: <?php echo date('d-m-Y', strtotime($rowofTP['ToDate'])); ?> | Working day: <?php echo $rowofTP['WrokingDays'] ?>
                                    </button>
                                </h2>
                                <div id="collapse<?php echo $a ?>" class="accordion-collapse collapse show" aria-labelledby="heading<?php echo $a ?>" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="accordion" id="employeeAccordion<?php echo $a ?>">
                                            <div class="accordion-body">
                                            <?php
$timeperiodId = $rowofTP['ID'];
$Employee_Manager = $_SESSION['EmployeeNumber'];

// Select query for employees whose supervisor is the logged-in person
$selectEmp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `Status`='ON-DUTY' AND `Attendance_Supervisor`=$Employee_Manager");

$e = 1;
while ($rowoemp = mysqli_fetch_array($selectEmp)) {
    $fromdate = $rowofTP['FromDate'];
    $todate = $rowofTP['ToDate'];
    $working_day = $rowofTP['WrokingDays'];
    $startDate = new DateTime($fromdate);
    $endDate = new DateTime($todate);
    $i = 1;
    ?>
    <?php
if (isset($_POST["submit" . $e])) {
    $timeperiodId = $_POST['timeperiodId'];
    $employeeIds = $_POST['Employeeid'];
    $shifts = $_POST['Shift'];
    $tehsils = $_POST['Tehsil'];
    $areas = $_POST['Area'];
    $dates = $_POST['Date'];
    $ddorots = $_POST['DDorOT'];
    $statuses = $_POST['status'];
    for ($index = 0; $index < count($employeeIds); $index++) {
        $employeeid = $employeeIds[$index];
        $shift = $shifts[$index];
        $tehsil = $tehsils[$index];
        $area = $areas[$index];
        $date = $dates[$index];
        $ddorot = $ddorots[$index];
        $status = $statuses[$index];
        $Attendance = mysqli_query($conn, "SELECT * FROM `atandece` WHERE `timeperiodId`='$timeperiodId' AND `Employeeid`='$employeeid' AND `Date`='$date'");
        // if already exist so skip this date
        if (mysqli_num_rows($Attendance) == 0) {
            $sql = "INSERT INTO `atandece` (Employeeid, Shift, Tehsil, Area, Date, DDorOT, status, timeperiodId) VALUES ('$employeeid', '$shift', '$tehsil', '$area', '$date', '$ddorot', '$status', '$timeperiodId')";
        
            if (mysqli_query($conn, $sql)) {
                ?>
                <script>
                    location.replace('employeeCountotal.php');
                </script>
                <?php
            } else {
                error_log("Insert failed: " . mysqli_error($conn));
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "Attendees already inserted<br>";
        }
    }
}
?>

<div class="accordion-item">
    <h2 class="accordion-header" id="heading<?php echo $e ?>">
        <button class="accordion-button" type="button" data-bs-toggle="collapse<?php echo $e ?>" data-bs-target="#collapse<?php echo $e ?>" aria-expanded="true" aria-controls="collapse<?php echo $e ?>">
            Employee # <?php echo $rowoemp['EmployeeNo']; $employeeNo = $rowoemp['EmployeeNo'] ?>  | Name: <?php echo $rowoemp['fName'] ?> <?php echo $rowoemp['lName'] ?> | Designation: <?php echo $rowoemp['Job_Tiltle'] ?>
        </button>
    </h2>
    <div id="collapse<?php echo $e ?>" class="accordion-collapse collapse show" aria-labelledby="heading<?php echo $e ?>" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <div class="accordion" id="employeeAccordion<?php echo $e ?>">
                <div class="accordion-body">
                    <form action="" method="post">
                        <table class="table">
                            <button type="submit" name="submit<?php echo $e ?>" class="btn btn-primary">Submit Records <?php echo date('M-y', strtotime($rowofTP['ToDate'])) ?></button>
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
                                // for all working days
                                $i = 0;
                                while ($startDate < $endDate) {
                                    $date = $startDate->format('Y-m-d');
                                    // Query for any attendance already exists
                                    $Attendance = mysqli_query($conn, "SELECT * FROM `atandece` WHERE `timeperiodId`='$timeperiodId' AND `Employeeid`='$employeeNo' AND `Date`='$date'");
                                    // if already exist so skip this date
                                    if (mysqli_num_rows($Attendance)) {
                                        $startDate->modify('+1 day');
                                        continue;
                                    }
                                    // Query for holidays if there is any holiday in this month 
                                    $holidays_query = mysqli_query($conn, "SELECT `Date`, `Day` FROM `holidays` WHERE `Date`='$date'");
                                    // if exist so skip this date
                                    if (mysqli_num_rows($holidays_query)) {
                                        $startDate->modify('+1 day');
                                        continue;
                                    }
                                ?>
                                <tr>
                                    <td scope="col"><?php echo $i ?></td>
                                    <td scope="col"><?php echo $rowoemp['EmployeeNo'] ?>
                                        <input hidden type="number" name="Employeeid[]" value="<?php echo $rowoemp['EmployeeNo'] ?>">
                                    </td>
                                    <td scope="col"><?php echo $rowoemp['fName'] ?> <?php echo $rowoemp['lName'] ?></td>
                                    <td scope="col"><?php echo $rowoemp['Job_Tiltle'] ?></td>
                                    <td scope="col"> <?php echo $rowoemp['Employee_Class'] ?></td>
                                    <td scope="col"><?php echo $startDate->format('d-m-Y'); ?>
                                        <input hidden type="text" name="Date[]" value="<?php echo $startDate->format('Y-m-d'); ?>">
                                    </td>
                                    <td scope="col"><?php echo $rowoemp['Duty_Point'] ?>
                                        <input hidden type="text" name="Tehsil[]" value="<?php echo $rowoemp['Duty_Point'] ?>">
                                        <input hidden type="text" name="Area[]" value="<?php echo $rowoemp['Duty_Location'] ?>">
                                    </td>
                                    <td scope="col">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" value="Morning" type="radio" name="Shift[<?php echo $i;?>]" id="morning<?php echo $rowoemp['Id'] . $i; ?>" checked>
                                                <label class="form-check-label" for="morning<?php echo $rowoemp['Id'] . $i; ?>">
                                                    Morning
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" value="Evening" type="radio" name="Shift[<?php echo $i;?>]" id="evening<?php echo $rowoemp['Id'].$i;?>">
                                                <label class="form-check-label" for="evening<?php echo $rowoemp['Id'].$i;?>">
                                                    Evening
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td scope="col">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" value="Double duty" type="radio" name="DDorOT[<?php echo $i; ?>]" id="DoubleDuty<?php echo $rowoemp['Id'].$i;?>">
                                                <label class="form-check-label" for="DoubleDuty<?php echo $rowoemp['Id'].$i;?>">
                                                    Double duty
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" value="Over Time" type="radio" name="DDorOT[<?php echo $i;?>]" id="OverTime<?php echo $rowoemp['Id'] . $i; ?>">
                                                <label class="form-check-label" for="OverTime<?php echo $rowoemp['Id'].$i; ?>">
                                                    Over Time
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td scope="col">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" value="Present" type="radio" name="status[<?php echo $i;?>]" id="Present<?php echo $rowoemp['Id'].$i;?>"checked>
                                                <label class="form-check-label" for="Present<?php echo $rowoemp['Id'] . $i; ?>">
                                                    Present
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" value="Absent" type="radio" name="status[<?php echo $i;?>]" id="Absent<?php echo $rowoemp['Id'] . $i; ?>" >
                                                <label class="form-check-label" for="Absent<?php echo $rowoemp['Id'] . $i; ?>">
                                                    Absent
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                    $startDate->modify('+1 day');
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                        <input type="hidden" name="timeperiodId" value="<?php echo $timeperiodId ?>">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    $e++;
}
?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
