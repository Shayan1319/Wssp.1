<?php
include('../link/desigene/db.php');
$id=$_POST['id'];
$date=date('D : d-M-Y');
$update=mysqli_query($conn,"UPDATE `travelrequest` SET `StatusofGm`='ACCPET', `DateOfAccepGm`='$date' WHERE  `id`=$id");
if($update){
    echo 1;
}
else{
    echo 0;
}
?>