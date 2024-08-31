<?php
// link to data base
include ('../link/desigene/db.php');
// var for php insert
$PayType= strtoupper($_POST['PayType']);
// Insert query
$insert= mysqli_query($conn,"INSERT INTO `master`(`Perant`,`drop`, `name`) VALUES (1,'$PayType','PayType')");
if($insert){
 echo 1;
}else{
    echo 0;
}




?>