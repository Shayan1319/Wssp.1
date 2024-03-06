<?php
include ('../link/desigene/db.php');


if (isset($_GET['employeeNo'])) {
    $employeeNo = $_GET['employeeNo'];
    $query = "SELECT COUNT(*) AS count FROM employeedata WHERE EmployeeNo = '$employeeNo'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $count = $row['count'];

        if ($count > 0) {
            echo 'Employee Number Already Exists';
        } else {
            echo '';
        }
    } else {
        echo 'Error in Database Query';
    }
} else {
    echo 'Invalid Request';
}
?>
