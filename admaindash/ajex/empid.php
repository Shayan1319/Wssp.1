<?php
include('../link/desigene/db.php');

$select = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `Status`='ON-DUTY'");

if (mysqli_num_rows($select) > 0) {
    echo '<option value="">Select</option>';
    while ($row = mysqli_fetch_assoc($select)) {
        echo '<option value="' . $row['EmployeeNo'] . '">' . $row['EmployeeNo'] . '</option>';
    }
} else {
    echo '<option value="">No employees found</option>';
}
?>
