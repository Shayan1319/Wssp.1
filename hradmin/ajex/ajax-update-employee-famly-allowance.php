<?php
// link to data base
include ('../link/desigene/db.php');
// var for php insert
$id = $_POST['id'];
$Spouse_Name_update= strtoupper($_POST['Spouse_Name_update']);
$CNIC_update=strtoupper($_POST['CNIC_update']);
$Date_of_B_update=strtoupper($_POST['Date_of_B_update']);
$insert= mysqli_query($conn,"UPDATE `spouse` SET `Spouse_Name`='$Spouse_Name_update',`CNIC`='$CNIC_update',`Date_of_B`='$Date_of_B_update' WHERE `id`='$id'");
if($insert){
 echo 1;
}else{
    echo 0;
}
?>