<?php include('../link/desigene/db.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $EmployeeNumber = $_POST['EmployeeNumber'];

    $updateid= mysqli_query($conn,"UPDATE `employeedataupdate` SET `status`='Update Rejected', `AuthBy`='$EmployeeNumber' WHERE `Id`=$id");
    if($updateid){
        echo "Rejected employee data";
    } else {
        echo "NOT Rejected employee data";
    }

}