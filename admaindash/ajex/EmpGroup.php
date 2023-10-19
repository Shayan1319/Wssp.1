<?php
// link to data base
include ('../link/desigene/db.php');
// var for php insert
$EmpGroup= strtoupper($_POST['EmpGroup']);
// Insert query
$insert= mysqli_query($conn,"INSERT INTO `master`(`drop`, `name`) VALUES ('$EmpGroup','EmpGroup')");
if($insert){
 echo 1;
}else{
    echo 0;
}




?>