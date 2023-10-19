<?php
// link to data base
include ('../link/desigene/db.php');
// var for php insert
$Salary_Mode_TMA= strtoupper($_POST['Salary_Mode_TMA']);
// Insert query
$insert= mysqli_query($conn,"INSERT INTO `master`(`drop`, `name`) VALUES ('$Salary_Mode_TMA','Salary_Mode_TMA')");
if($insert){
 echo 1;
}else{
    echo 0;
}




?>