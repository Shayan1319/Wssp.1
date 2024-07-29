<?php
include('../link/desigene/db.php');
$id=$_POST['id'];
$date=date('Y-M-D');
$update=mysqli_query($conn,"UPDATE `training` SET `Status`='REJECT' WHERE `Id`=$id");
if($update){
    echo "Training reject successfully";
}
else{
    echo "Training not reject";
}
?>