<?php
include ('../link/desigene/db.php');
$employee_id=$_POST['employee_id'];
$Spouse_Name=strtoupper($_POST['Spouse_Name']);
$CNIC=strtoupper($_POST['CNIC']);
$Date_of_B=strtoupper($_POST['Date_of_B']);
$insert = mysqli_query($conn,"INSERT INTO `spouse`( `employee_id`, `Spouse_Name`, `CNIC`, `Date_of_B`) VALUES ('$employee_id','$Spouse_Name','$CNIC','$Date_of_B')");
if ($insert) {
    echo 1;
} else {
    echo 0;
}
?>