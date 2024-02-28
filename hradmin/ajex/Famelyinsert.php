<?php
include ('../link/desigene/db.php');
$employee_id=$_POST['employee_id'];
$Spouse_Name=strtoupper($_POST['Spouse_Name']);
$CNIC=strtoupper($_POST['CNIC']);
$Date_of_B=strtoupper($_POST['Date_of_B']);
$Father_name=strtoupper($_POST['Father_name']);
$type=strtoupper($_POST['type']);
$insert = mysqli_query($conn,"INSERT INTO `spouse`( `employee_id`, `Spouse_Name`, `CNIC`, `Date_of_B`, `Father_name`,`type`) VALUES ('$employee_id','$Spouse_Name','$CNIC','$Date_of_B', '$Father_name', '$type')");
if ($insert) {
    echo "Data uploaded";
    
} else {
    echo "Data not uploaded please check Error!";
}
?>