<?php
include ('../link/desigene/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $status = $_POST['status'];
    $currentDate = date('Y-m-d');

    if (!empty($id) && !empty($status)) {
        $query = "UPDATE `employee_exit` SET `Approved_CEO` = '$status', `CEO_Approved_Date` = '$currentDate' WHERE `Id` = $id";
        if (mysqli_query($conn, $query)) {
            echo "Success";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>
