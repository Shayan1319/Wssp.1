<?php
include('../link/desigene/db.php');
$id=$_POST['id'];
$date=date('Y-M-D');
$update=mysqli_query($conn,"UPDATE `tabill` SET `StatusofGM`='ACCEPT', `DateOfAccepGM`='$date' WHERE `TAid`=$id");
if($update){
    echo 1;
}
else{
    echo 0;
}
?>