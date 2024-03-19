<?php
include('../link/desigene/db.php');
$id=$_POST['id'];
$update=mysqli_query($conn,"UPDATE `promotion` SET `Status`='ACCPET' WHERE `Id`=$id");
if($update){
    echo "Promotion Accepeted";
}
else{
    echo "Promotion Not Accepeted";
}
?>