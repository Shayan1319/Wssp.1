<?php
// link to data base
include ('../link/desigene/db.php');
// var for php insert
$Employee_Pay_Classification= strtoupper($_POST['Employee_Pay_Classification']);
// Insert query
$insert= mysqli_query($conn,"INSERT INTO `master`(`drop`, `name`) VALUES ('$Employee_Pay_Classification','Employee_Pay_Classification')");
if($insert){

}else{
    echo "Not Inserted";
}
?>