<?php
// link to data base
include ('../link/desigene/db.php');
// var for php insert
$Employement_Group_TMA= strtoupper($_POST['Employement_Group_TMA']);
// Insert query
$insert= mysqli_query($conn,"INSERT INTO `master`(`drop`, `name`) VALUES ('$Employement_Group_TMA','Employement_Group_TMA')");
if($insert){
 echo 1;
}else{
    echo 0;
}




?>