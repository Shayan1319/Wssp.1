<?php
// link to data base
include ('../link/desigene/db.php');
// var for php insert
$Religion= strtoupper($_POST['Religion']);
// Insert query
$insert= mysqli_query($conn,"INSERT INTO `master`(`drop`, `name`) VALUES ('$Religion','Religion')");
if($insert){
 echo 1;
}else{
    echo 0;
}




?>