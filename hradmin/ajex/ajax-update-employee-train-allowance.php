<?php
// link to data base
include ('../link/desigene/db.php');
// var for php insert
$id = $_POST['id'];
$Training_Serial_Number=strtoupper($_POST['Training_Serial_Number']);
$Training_Name=strtoupper($_POST['Training_Name']);
$Institute=strtoupper($_POST['Institute']);
$City=strtoupper($_POST['City']);
$Institute_Address=strtoupper($_POST['Institute_Address']);
$Oblige_Sponsor=strtoupper($_POST['Oblige_Sponsor']);
$From=strtoupper($_POST['From']);
$To=strtoupper($_POST['To']);
$Duration=strtoupper($_POST['Duration']);

$insert = mysqli_query($conn,"UPDATE `training` SET `Training_Serial_Number`='$Training_Serial_Number',`Training_Name`='$Training_Name',`Institute`='$Institute',`City`='$City',`Institute_Address`='$Institute_Address',`Oblige_Sponsor`='$Oblige_Sponsor',`From`='$From',`To`='$To',`Duration`='$Duration' WHERE `Id`='$id'");
if ($insert) {
    echo 1;
} else {
    echo 0;
}
?>