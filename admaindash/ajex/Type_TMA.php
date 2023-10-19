<?php
// link to data base
include ('../link/desigene/db.php');
// var for php insert
$Type_TMA= strtoupper($_POST['Type_TMA']);
// Insert query
$insert= mysqli_query($conn,"INSERT INTO `master`(`drop`, `name`) VALUES ('$Type_TMA','Type_TMA')");
if($insert){
 echo 1;
}else{
    echo 0;
}




?>