<?php
// link to data base
include ('../link/desigene/db.php');
// var for php insert
$id = $_POST['id'];
$date = date('D : d-M-Y');
$insert= mysqli_query($conn,"UPDATE `timeperiod` SET `CEOStatus`='REJECT',`DateOfCEOStatus`='$date' WHERE `ID`=$id ");
if($insert){
 echo 1;
}else{
    echo 0;
}
?>