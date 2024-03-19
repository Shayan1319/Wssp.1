<?php
include('../link/desigene/db.php');
$id=$_POST['id'];
$update=mysqli_query($conn,"UPDATE `training` SET `Status`='ACCPET' WHERE `Id`=$id");
if($update){
    echo "Training accepts successfully";
}
else{
    echo "Running not acceptable";
}
?>