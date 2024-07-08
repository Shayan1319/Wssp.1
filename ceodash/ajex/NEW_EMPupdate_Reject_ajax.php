<?php include('../link/desigene/db.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $updateid= mysqli_query($conn,"UPDATE `employeedataupdate` SET `status`='Update Rejected' WHERE `Id`=$id");
    if($updateid){
        echo "Rejected employee data";
    } else {
        echo "NOT Rejected employee data";
    }

}