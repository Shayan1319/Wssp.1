<?php
// link to data base
include ('../link/desigene/db.php');
// var for php insert
$Grade= strtoupper($_POST['Grade']);
$Grade_Parent= strtoupper($_POST['Grade_Parent']);
// Insert query
$insert= mysqli_query($conn,"INSERT INTO `master`(`Perant`, `drop`, `name`) VALUES ('$Grade_Parent', '$Grade','Grade')");
if($insert){
 echo 1;
}else{
    echo 0;
}




?>