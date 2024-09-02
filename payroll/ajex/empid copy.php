<?php
include('../link/desigene/db.php');
$select = mysqli_query($conn, "SELECT e.*
FROM `employeedata` e
LEFT JOIN `earning_deduction_fund` edf ON e.`Id` = edf.`employee_id`
WHERE edf.`employee_id` IS NULL AND e.`Status` = 'ON-DUTY'");
if (mysqli_num_rows($select) > 0) {
    echo '<option selected>Select</option>';
    while ($row = mysqli_fetch_assoc($select)) {
        echo '<option value="' . $row['Id'] . '">' . $row['EmployeeNo'] . '</option>';
    }
}
?>
