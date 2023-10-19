<?php
// link to data base
include ('../link/desigene/db.php');
// var for php insert
$Employee_Quota_TMA= strtoupper($_POST['Employee_Quota_TMA']);
// Insert query
$insert= mysqli_query($conn,"INSERT INTO `master`(`drop`, `name`) VALUES ('$Employee_Quota_TMA','Employee_Quota_TMA')");
if($insert){
 echo 1;
}else{
    echo 0;
}




?>