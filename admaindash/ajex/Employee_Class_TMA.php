<?php
// link to data base
include ('../link/desigene/db.php');
// var for php insert
$Employee_Class_TMA= strtoupper($_POST['Employee_Class_TMA']);
// Insert query
$insert= mysqli_query($conn,"INSERT INTO `master`(`drop`, `name`) VALUES ('$Employee_Class_TMA','Employee_Class_TMA')");
if($insert){
 echo 1;
}else{
    echo 0;
}




?>