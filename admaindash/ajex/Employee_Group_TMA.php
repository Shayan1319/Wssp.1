<?php
// link to data base
include ('../link/desigene/db.php');
// var for php insert
$Employee_Group_TMA= strtoupper($_POST['Employee_Group_TMA']);
// Insert query
$insert= mysqli_query($conn,"INSERT INTO `master`(`drop`, `name`) VALUES ('$Employee_Group_TMA','Employee_Group_TMA')");
if($insert){
 echo 1;
}else{
    echo 0;
}




?>