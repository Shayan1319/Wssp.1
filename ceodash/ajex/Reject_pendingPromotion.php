<?php
include('../link/desigene/db.php');
$id=$_POST['id'];

$update=mysqli_query($conn,"UPDATE `promotion` SET `Status`='REJECT' WHERE `Id`=$id");
if($update){
    echo "Promotion rejected";
}
else{
    echo "Promotion rejected";
}
?>