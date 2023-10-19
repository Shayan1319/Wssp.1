<?php
// link to data base
include ('../link/desigene/db.php');
// var for php insert
$Employee_Group= strtoupper($_POST['Employee_Group']);
// Insert query
$insert= mysqli_query($conn,"INSERT INTO `master`(`drop`, `name`) VALUES ('$Employee_Group','Employee_Group')");
if($insert){
 echo 1;
}else{
    echo 0;
}




?>