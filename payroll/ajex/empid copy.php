<?php
include('../link/desigene/db.php');
$select = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `Status` = 'ON-DUTY'");
if (mysqli_num_rows($select) > 0) {
    echo '<option selected>Select</option>';
    while ($row = mysqli_fetch_assoc($select)) {
        echo '<option value="' . $row['Id'] . '">' . $row['EmployeeNo'] . '</option>';
    }
}
?>
