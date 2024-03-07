<?php
include ('../link/desigene/db.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_GET['trainingSerialNumber'])) {
    $trainingSerialNumber = $_GET['trainingSerialNumber'];
    $query = "SELECT COUNT(*) AS count FROM training WHERE Training_Serial_Number = '$trainingSerialNumber'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $count = $row['count'];

        if ($count > 0) {
            echo 'Training Serial Number Already Exists';
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
