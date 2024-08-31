<?php
// link to data base
include ('../link/desigene/db.php');
// var for php insert
$Status= strtoupper($_POST['Status']);
// Insert query
$insert= mysqli_query($conn,"INSERT INTO `master`(`Perant`,`drop`, `name`) VALUES (1,'$Status','Status')");
if($insert){
 echo 1;
}else{
    echo 0;
}




?>