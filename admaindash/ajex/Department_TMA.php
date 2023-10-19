<?php
// link to data base
include ('../link/desigene/db.php');
// var for php insert
$Department_TMA= strtoupper($_POST['Department_TMA']);
// Insert query
$insert= mysqli_query($conn,"INSERT INTO `master`(`drop`, `name`) VALUES ('$Department_TMA','Department_TMA')");
if($insert){
 echo 1;
}else{
    echo 0;
}




?>