<?php 
include ('../link/desigene/db.php');
$Name=strtoupper($_POST['Name']);
$CNIC=strtoupper($_POST['CNIC']);
$Date_of_B=strtoupper($_POST['Date_of_B']);
$MouterCNIC=strtoupper($_POST['MouterCNIC']);
$Gender=strtoupper($_POST['Gender']);
$insert = mysqli_query($conn,"INSERT INTO `child`( `Name`, `CNIC`, `Date_of_B`, `MouterCNIC`, `Gender`) VALUES ('$Name','$CNIC','$Date_of_B','$MouterCNIC','$Gender')");
if ($insert) {
    echo 1;
} else {
    echo 0;
}
?>