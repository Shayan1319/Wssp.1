<?php
include('../link/desigene/db.php');

$employee_id = $_POST['employee_id'];
$Training_Serial_Number = strtoupper($_POST['Training_Serial_Number']);
$Training_Name = strtoupper($_POST['Training_Name']);
$Institute = strtoupper($_POST['Institute']);
$City = strtoupper($_POST['City']);
$Institute_Address = strtoupper($_POST['Institute_Address']);
$Oblige_Sponsor = strtoupper($_POST['Oblige_Sponsor']);
$From = strtoupper($_POST['From']);
$To = strtoupper($_POST['To']);
$Duration = strtoupper($_POST['Duration']);


$insert = mysqli_query($conn, "INSERT INTO `training`(`Training_Serial_Number`, `Training_Name`, `Institute`, `City`, `Institute_Address`, `Oblige_Sponsor`, `From`, `To`, `Duration`, `employee_id`) VALUES ('$Training_Serial_Number','$Training_Name','$Institute','$City','$Institute_Address','$Oblige_Sponsor','$From','$To','$Duration','$employee_id')");

if ($insert) {
    echo 1;
} else {
    echo 0;
}
?>
