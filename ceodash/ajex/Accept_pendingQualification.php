<?php

include('../link/desigene/db.php');

    $id = $_POST['id'];
    $update = mysqli_query($conn,"UPDATE `qualification` SET `Status`='ACCEPT' WHERE `Id`=$id");
    if($update){
        echo "Record accepted:";
    }else{
        echo"Could not save the record";
    }


?>
