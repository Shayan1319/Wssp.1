<?php
// link to data base
include ('../link/desigene/db.php');
// var for php insert
$Status_TMA= strtoupper($_POST['Status_TMA']);
// Insert query
$insert= mysqli_query($conn,"INSERT INTO `master`(`drop`, `name`) VALUES ('$Status_TMA','Status_TMA')");
if($insert){
 echo 1;
}else{
    echo 0;
}




?>