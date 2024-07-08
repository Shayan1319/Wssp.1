<?php
include ('../link/desigene/db.php');
if (isset($_GET['cnic'])) {
    $cnic = $_GET['cnic'];
    $query = "SELECT * FROM earning_deduction_fund WHERE employee_id = '$cnic'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result)>0) {

            echo 'Payroll Already Exists';
       
    } else {
        echo '';
    }
} else {
    echo 'Invalid Request';
}
?>
