<?php
include('../link/desigene/db.php');
$id=$_POST['id'];
$date=date('D : d-M-Y');
$update=mysqli_query($conn,"UPDATE `travelrequest` SET `Statusofmanger`='ACCEPT', `DateOfAccepManager`='$date' WHERE  `id`=$id");
if($update){
    echo 1;
}
else{
    echo 0;
}
?>