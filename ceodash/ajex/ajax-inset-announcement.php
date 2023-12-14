<?php
include('../link/desigene/db.php');
$Subject = $_POST['Subject'];
$Q1 = $_POST['Q1'];
$datesub = date('Y-m-d');
$insert = mysqli_query($conn,"INSERT INTO `announcement`(`Subject`, `Q1`, `ceodata`) VALUES ('$Subject','$Q1','$datesub')");
if($insert){
    echo 1;
}else{
    echo 0;
}

?>