<?php
include('../link/desigene/db.php');

if (isset($_POST['empid'])) {
    $empid = $_POST['empid'];

    $query = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `EmployeeNo` = '$empid'");

    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
        echo json_encode($row);
    } else {
        echo json_encode([]);
    }
}
?>
