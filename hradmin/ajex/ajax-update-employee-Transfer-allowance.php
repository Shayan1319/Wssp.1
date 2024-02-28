<?php
include('../link/desigene/db.php');

$id = $_POST['id'];
$Transfer_Order_Number_update = strtoupper($_POST['Transfer_Order_Number_update']);
$Designation_update = strtoupper($_POST['Designation_update']);
$BPS_update = strtoupper($_POST['BPS_update']);
$From_Department_update = strtoupper($_POST['From_Department_update']);
$To_Project_update = strtoupper($_POST['To_Project_update']);
$From_Station_update = strtoupper($_POST['From_Station_update']);
$To_Station_update = strtoupper($_POST['To_Station_update']);
$To_Grade_update = strtoupper($_POST['To_Grade_update']);
$To_Department_update = strtoupper($_POST['To_Department_update']);
$Worked_From_update = strtoupper($_POST['Worked_From_update']);
$Transfer_Date_update = strtoupper($_POST['Transfer_Date_update']);

// File upload handling
$targetDirectory = "../../CV/";
$fileName = basename($_FILES["file_update"]["name"]);
$targetFile = $targetDirectory . $fileName;

if (move_uploaded_file($_FILES["file_update"]["tmp_name"], $targetFile)) {
} else {
    echo 0.1;
}
$insert = mysqli_query($conn, "UPDATE `transfer` SET`Transfer_Order_Number`='$Transfer_Order_Number_update',`Designation`='$Designation_update',`BPS`='$BPS_update',`From_Department`='$From_Department_update',`To_Project`='$To_Project_update',`From_Station`='$From_Station_update',`To_Station`='$To_Station_update',`Worked_From`='$Worked_From_update',`Transfer_Date`='$Transfer_Date_update',`file`='$fileName',`ToGrade`='$To_Grade_update',`ToDepartment`='$To_Department_update' WHERE  `id`='$id'");

if ($insert) {
    echo 1;
} else {
    echo 0;
}
?>
