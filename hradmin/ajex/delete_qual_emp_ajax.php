<?php
// link to data base
include ('../link/desigene/db.php');
// var for php insert
$id = $_POST['id'];

$insert= mysqli_query($conn,"DELETE FROM `qualification` WHERE `Id`='$id'");
if($insert){
 echo 1;
}else{
    echo 0;
}
?>