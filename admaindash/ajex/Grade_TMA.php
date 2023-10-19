<?php
// link to data base
include ('../link/desigene/db.php');
// var for php insert
$Grade_TMA= strtoupper($_POST['Grade_TMA']);
// Insert query
$insert= mysqli_query($conn,"INSERT INTO `master`(`drop`, `name`) VALUES ('$Grade_TMA','Grade_TMA')");
if($insert){
 echo 1;
}else{
    echo 0;
}




?>