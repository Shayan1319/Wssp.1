<?php
include('../link/desigene/db.php');
$id=$_POST['id'];
$date=date('D : d-M-Y');
$update=mysqli_query($conn,"UPDATE `tabill` SET `StatusofGM`='ACCPET', `DateOfAccepGM`='$date' WHERE `TAid`=$id");
if($update){
    echo 1;
}
else{
    echo 0;
}
?>