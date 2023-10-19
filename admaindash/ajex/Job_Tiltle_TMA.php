<?php
// link to data base
include ('../link/desigene/db.php');
// var for php insert
$Job_Tiltle_TMA= strtoupper($_POST['Job_Tiltle_TMA']);
// Insert query
$insert= mysqli_query($conn,"INSERT INTO `master`(`drop`, `name`) VALUES ('$Job_Tiltle_TMA','Job_Tiltle_TMA')");
if($insert){
 echo 1;
}else{
    echo 0;
}




?>