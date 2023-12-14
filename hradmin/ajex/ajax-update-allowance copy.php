<?php
// link to data base
include ('../link/desigene/db.php');
// var for php insert
$id=$_POST['id'];
$discription=$_POST['discrip'];
$timepertod=$_POST['timepertod'];
$price=$_POST['price'];
$insert= mysqli_query($conn,"UPDATE `allowances` SET `allowance`='$discription',`price`='$price' WHERE `id`='$id'");
if($insert){
$datainsert=mysqli_query($conn,"INSERT INTO `allowancesrateupdate`( `timeperiod`, `discription`, `price`, `allownce_id`) VALUES ('$timepertod','$discription','$price','$id')");
if($datainsert){
    echo 1;
}
else{
    echo 0;
}
}




?>