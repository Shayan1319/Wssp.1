<?php
// link to data base
include ('../link/desigene/db.php');
// var for php insert
$id = $_POST['id'];
$select=mysqli_query($conn,"SELECT * FROM `rate` WHERE `allowances_id`='$id'");
if(mysqli_num_rows($select)){
    echo 0;
}else{
$insert= mysqli_query($conn,"DELETE FROM `allowances` WHERE `id`='$id'");
if($insert){
 echo 1;
}else{
    echo 0;
}}
?>