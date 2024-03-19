<?php include('../link/desigene/db.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $deletequery = mysqli_query($conn, "DELETE FROM `employeedataupdate` WHERE `Id`=$id");
    if ($deletequery) {
        echo "Rejected employee data";
    } else {
        echo "NOT Rejected employee data";
    }

}