<?php
include('../link/desigene/db.php');
$id=$_POST['id'];
$date=date('Y-M-D');
$update=mysqli_query($conn,"UPDATE `employeedata` SET `Online Status`='REJECTED' WHERE  `Id`=$id");
if($update){
    echo 1;
}
else{
    echo 0;
}
?>