<?php
// link to data base
include ('../link/desigene/db.php');
// var for php insert
$Employee_Class= strtoupper($_POST['Employee_Class']);
$Employee_Class_Parent= strtoupper($_POST['Employee_Class_Parent']);
// Insert query
$insert= mysqli_query($conn,"INSERT INTO `master`(`Perant`,`drop`, `name`) VALUES ('$Employee_Class_Parent','$Employee_Class','Employee_Class')");
if($insert){
 echo 1;
}else{
    echo 0;
}




?>