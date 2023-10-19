<?php
// link to data base
include ('../link/desigene/db.php');
// var for php insert
$Salary_Mode= strtoupper($_POST['Salary_Mode']);
// Insert query
$insert= mysqli_query($conn,"INSERT INTO `master`(`drop`, `name`) VALUES ('$Salary_Mode','Salary_Mode')");
if($insert){
 echo 1;
}else{
    echo 0;
}




?>