<?php
// link to data base
include ('../link/desigene/db.php');
// var for php insert
$Grade= strtoupper($_POST['Grade']);
// Insert query
$insert= mysqli_query($conn,"INSERT INTO `master`(`drop`, `name`) VALUES ('$Grade','Grade')");
if($insert){
 echo 1;
}else{
    echo 0;
}




?>