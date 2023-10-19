<?php
// link to data base
include ('../link/desigene/db.php');
// var for php insert
$Employee_Class= strtoupper($_POST['Employee_Class']);
// Insert query
$insert= mysqli_query($conn,"INSERT INTO `master`(`drop`, `name`) VALUES ('$Employee_Class','Employee_Class')");
if($insert){
 echo 1;
}else{
    echo 0;
}




?>