<?php
// link to data base
include ('../link/desigene/db.php');
// var for php insert
$Department= strtoupper($_POST['Department']);
$Department_Parent= strtoupper($_POST['Department_Parent']);
// Insert query
$insert= mysqli_query($conn,"INSERT INTO `master`(`Perant`, `drop`, `name`) VALUES ('$Department_Parent','$Department','Department')");
if($insert){
 echo 1;
}else{
    echo 0;
} ?>