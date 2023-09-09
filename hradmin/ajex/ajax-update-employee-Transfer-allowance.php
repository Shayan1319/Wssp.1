<?php
// link to data base
include ('../link/desigene/db.php');
// var for php insert
$id = $_POST['id'];
$Transfer_Order_Number_update = strtoupper($_POST['Transfer_Order_Number_update']);
$Designation_update = strtoupper($_POST['Designation_update']);
$BPS_update = strtoupper($_POST['BPS_update']);
$From_Department_update = strtoupper($_POST['From_Department_update']);
$To_Project_update = strtoupper($_POST['To_Project_update']);
$From_Station_update = strtoupper($_POST['From_Station_update']);
$To_Station_update = strtoupper($_POST['To_Station_update']);
$Worked_From_update = strtoupper($_POST['Worked_From_update']);
$Transfer_Date_update = strtoupper($_POST['Transfer_Date_update']);
$insert = mysqli_query($conn, "UPDATE `transfer` SET `Transfer_Order_Number`='$Transfer_Order_Number_update',`Designation`='$Designation_update',`BPS`='$BPS_update',`From_Department`='$From_Department_update',`To_Project`='$To_Project_update',`From_Station`='$From_Station_update',`To_Station`='$To_Station_update',`Worked_From`='$Worked_From_update',`Transfer_Date`='$Transfer_Date_update' WHERE `id`=$id");
if ($insert) {
    echo 1;
} else {
    echo 0;
}
?>