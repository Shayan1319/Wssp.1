<?php
// link to data base
include ('../link/desigene/db.php');
// var for php insert
$WeeklyWorkingDays= strtoupper($_POST['WeeklyWorkingDays']);
// Insert query
$insert= mysqli_query($conn,"INSERT INTO `master`(`Perant`,`drop`, `name`) VALUES (1,'$WeeklyWorkingDays','WeeklyWorkingDays')");
if($insert){
 echo 1;
}else{
    echo 0;
}




?>