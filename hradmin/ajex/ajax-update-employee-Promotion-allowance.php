<?php
include('../link/desigene/db.php');

$id = $_POST['id_update'];
$From_Designation_update = strtoupper($_POST['From_Designation_update']);
$To_Designation_update = strtoupper($_POST['To_Designation_update']);
$From_BPS_update = strtoupper($_POST['From_BPS_update']);
$ToBps_update = strtoupper($_POST['ToBps_update']);
$Promotion_Date_update = strtoupper($_POST['Promotion_Date_update']);
$Promotion_Number_update = strtoupper($_POST['Promotion_Number_update']);
$Department1_update = strtoupper($_POST['Department1_update']);
$Acting_update = strtoupper($_POST['Acting_update']);
$Remarks_update = strtoupper($_POST['Remarks_update']);

// File upload handling
$targetDirectory = "../../CV";
$targetFile = $targetDirectory . basename($_FILES["file"]["name"]);
$fileName = basename($_FILES["file"]["name"]);

if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
    // File uploaded successfully, proceed to insert into the database
  
} else {
    echo 0.1;
}  
$insert = mysqli_query($conn, "UPDATE `promotion` SET `From_Designation`='$From_Designation_update',`To_Designation`='$To_Designation_update',`From_BPS`='$From_BPS_update',`ToBps`='$ToBps_update',`Promotion_Date`='$Promotion_Date_update',`Promotion_Number`='$Promotion_Number_update',`Department1`='$Department1_update',`Acting`='$Acting_update',`Remarks`='$Remarks_update',`file`='$fileName' WHERE `Id`='$id'");

if ($insert) {
    echo 1;
} else {
    echo 0;
}
?>
