<?php
include ('../link/desigene/db.php');
$employee_id=$_POST['employee_id'];
$From_Designation=strtoupper($_POST['From_Designation']);
$To_Designation=strtoupper($_POST['To_Designation']);
$From_BPS=strtoupper($_POST['From_BPS']);
$ToBps=strtoupper($_POST['ToBps']);
$Promotion_Date=strtoupper($_POST['Promotion_Date']);
$Promotion_Number=strtoupper($_POST['Promotion_Number']);
$Department1=strtoupper($_POST['Department1']);
$Acting=strtoupper($_POST['Acting']);
$Remarks=strtoupper($_POST['Remarks']);

$insert = mysqli_query($conn,"INSERT INTO `promotion`(`From_Designation`, `To_Designation`, `From_BPS`, `ToBps`, `Promotion_Date`, `Promotion_Number`, `Department1`, `Acting`, `Remarks`, `employee_id`) VALUES ('$From_Designation','$To_Designation','$From_BPS','$ToBps','$Promotion_Date', '$Promotion_Number','$Department1','$Acting','$Remarks','$employee_id')");
if ($insert) {
    echo 1;
} else {
    echo 0;
}
?>