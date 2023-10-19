<?php
// link to data base
include ('../link/desigene/db.php');
// var for php insert
$Department= strtoupper($_POST['Department']);
// Insert query
$insert= mysqli_query($conn,"INSERT INTO `master`(`drop`, `name`) VALUES ('$Department','Department')");
if($insert){
 echo 1;
}else{
    echo 0;
}




?>