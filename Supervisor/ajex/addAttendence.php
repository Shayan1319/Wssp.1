<?php 
include("../link/desigene/db.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if (isset($_POST['submit'])) {
        echo "<script>alert('Attendance added successfully.')</script>";
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
            
            // if already exists so skip this date
            if (mysqli_num_rows($Attendance) == 0) {
                $sql = "INSERT INTO `atandece` (Employeeid, Shift, Tehsil, Area, Date, DDorOT, status, timeperiodId) VALUES ('$employeeid', '$shift', '$tehsil', '$area', '$date', '$ddorot', '$status', '$timeperiodId')";
            
                if (mysqli_query($conn, $sql)) {
                    // Success
                } else {
                    error_log("Insert failed: " . mysqli_error($conn));
                    echo "Error: " . mysqli_error($conn);
                }
            } else {
                echo "Attendees already inserted<br>";
            }
        }
    }
}
?>