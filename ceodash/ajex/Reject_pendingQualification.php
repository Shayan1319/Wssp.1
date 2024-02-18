<?php
include('../link/desigene/db.php');
$id=$_POST['id'];
$date=date('Y-M-D');
$update=mysqli_query($conn,"UPDATE `qualification` SET `Status`='REJECT' WHERE `id`=$id");
if($update){
    echo "Record reject successfully";
}
else{
    echo "Record not approved";
}
?>