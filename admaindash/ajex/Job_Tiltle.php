<?php
// link to data base
include ('../link/desigene/db.php');
// var for php insert
$Job_Tiltle= strtoupper($_POST['Job_Tiltle']);
$insert= mysqli_query($conn,"INSERT INTO `master`(`drop`, `name`) VALUES ('$Job_Tiltle','Job_Tiltle')");
if($insert){
 echo "data inserted";
}else{
    echo "data not inserted";
}
?>