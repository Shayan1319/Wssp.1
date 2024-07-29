<?php
include('../link/desigene/db.php');
$id=$_POST['id'];
$update=mysqli_query($conn,"UPDATE `promotion` SET `Status`='ACCEPT' WHERE `Id`=$id");
if($update){
    echo "Promotion Accepted";
}
else{
    echo "Promotion Not Accepted";
}
?>