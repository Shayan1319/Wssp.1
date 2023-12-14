<?php
// link to data base
include ('../link/desigene/db.php');
// var for php insert
$fromdateUpdate=$_POST['fromdateUpdate'];
$idUpdate=$_POST['idUpdate'];
$todateUpdate=$_POST['todateUpdate'];
$workingdateUpdate=$_POST['workingdateUpdate'];
$date=date('Y-m-d');
$insert= mysqli_query($conn,"UPDATE `timeperiod` SET `DateOfSub`='$date', `FromDate`='$fromdateUpdate',`ToDate`='$todateUpdate',`WrokingDays`='$workingdateUpdate' WHERE WHERE `ID` = $idUpdate && `HRStatus`='PENDING' && `ChiefFinanceStaus`='PENDING' && `GMStatus`='PENDING' && `CEOStatus`='PENDING'");
if($insert){
 echo 1;
}else{
    echo 0;
}
?>