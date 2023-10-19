<?php
// link to data base
include ('../link/desigene/db.php');
// var for php insert
$Employee_Quota= strtoupper($_POST['Employee_Quota']);
// Insert query
$insert= mysqli_query($conn,"INSERT INTO `master`(`drop`, `name`) VALUES ('$Employee_Quota','Employee_Quota')");
if($insert){
 echo 1;
}else{
    echo 0;
}




?>