<?php
// link to data base
include ('../link/desigene/db.php');
// var for php insert
$id = $_POST['id'];
$From_Designation_update = strtoupper($_POST['From_Designation_update']);
$To_Designation_update = strtoupper($_POST['To_Designation_update']);
$From_BPS_update = strtoupper($_POST['From_BPS_update']);
$ToBps_update = strtoupper($_POST['ToBps_update']);
$Promotion_Date_update = strtoupper($_POST['Promotion_Date_update']);
$Promotion_Number_update = strtoupper($_POST['Promotion_Number_update']);
$Department1_update = strtoupper($_POST['Department1_update']);
$Acting_update = strtoupper($_POST['Acting_update']);
$Remarks_update = strtoupper($_POST['Remarks_update']);
$insert = mysqli_query($conn, "UPDATE `promotion` SET `From_Designation`='$From_Designation_update',`To_Designation`='$To_Designation_update',`From_BPS`='$From_BPS_update',`ToBps`='$ToBps_update',`Promotion_Date`='$Promotion_Date_update',`Promotion_Number`='$Promotion_Number_update',`Department1`='$Department1_update',`Acting`='$Acting_update',`Remarks`='$Remarks_update' WHERE `Id`='$id'");
if ($insert) {
    echo 1;
} else {
    echo 0;
}
?>