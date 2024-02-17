<?php
// link to data base
include ('../link/desigene/db.php');
// var for php insert
$SalaryBankBranch= strtoupper($_POST['SalaryBankBranch']);
// Insert query
$insert= mysqli_query($conn,"INSERT INTO `master`(`drop`, `name`) VALUES ('$SalaryBankBranch','SalaryBankBranch')");
if($insert){
 echo 1;
}else{
    echo 0;
}




?>