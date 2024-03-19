<?php
include('../link/desigene/db.php');
$id=$_POST['id'];
$update=mysqli_query($conn,"UPDATE `transfer` SET `Status`='REJECT' WHERE `id`=$id");
if($update){
    echo 1;
}
else{
    echo 0;
}
?>