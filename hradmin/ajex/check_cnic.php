<?php
include ('../link/desigene/db.php');
if (isset($_GET['cnic'])) {
    $cnic = $_GET['cnic'];
    $query = "SELECT COUNT(*) AS count FROM employeedata WHERE CNIC = '$cnic' && `Status`='NEW'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $count = $row['count'];

        if ($count > 0) {
            echo 'CNIC Already Exists';
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
