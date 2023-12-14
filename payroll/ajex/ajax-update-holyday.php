<?php
// link to data base
include ('../link/desigene/db.php');
// var for php insert
$date = $_POST['dateUpdate'];
$Id = $_POST['idUpdate'];
$type = $_POST['typeUpdate'];
$day = date('l', strtotime($date)); // Get the day from the date
$datesub = date('Y-m-d');
$insert= mysqli_query($conn,"UPDATE `holidays` SET `DateOfSub`='$datesub',`Date`='$date',`Day`='$day',`Type`='$type' WHERE `ID`=$Id");
if($insert){
 echo 1;
}else{
    echo 0;
}
?>