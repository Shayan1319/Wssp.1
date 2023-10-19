<?php
// link to data base
include ('../link/desigene/db.php');
// var for php insert
$Type= strtoupper($_POST['Type']);
// Insert query
$insert= mysqli_query($conn,"INSERT INTO `master`(`drop`, `name`) VALUES ('$Type','Type')");
if($insert){
 echo 1;
}else{
    echo 0;
}




?>