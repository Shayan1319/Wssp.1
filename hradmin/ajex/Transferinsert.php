<?php
include ('../link/desigene/db.php');
$employee_id=$_POST['employee_id'];
$Transfer_Order_Number=strtoupper($_POST['Transfer_Order_Number']);
$Designation=strtoupper($_POST['Designation']);
$BPS=strtoupper($_POST['BPS']);
$From_Department=strtoupper($_POST['From_Department']);
$To_Project=strtoupper($_POST['To_Project']);
$From_Station=strtoupper($_POST['From_Station']);
$To_Station=strtoupper($_POST['To_Station']);
$Worked_From=strtoupper($_POST['Worked_From']);
$Transfer_Date=strtoupper($_POST['Transfer_Date']);

$insert = mysqli_query($conn,"INSERT INTO `transfer`(`Transfer_Order_Number`, `Designation`, `BPS`, `From_Department`, `To_Project`, `From_Station`, `To_Station`, `Worked_From`, `Transfer_Date`, `employee_id`) VALUES ('$Transfer_Order_Number','$Designation','$BPS','$From_Department','$To_Project', '$From_Station','$To_Station','$Worked_From','$Transfer_Date','$employee_id')");
if ($insert) {
    echo 1;
} else {
    echo 0;
}
?>