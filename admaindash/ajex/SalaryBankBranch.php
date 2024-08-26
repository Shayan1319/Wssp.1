<?php
// link to data base
include ('../link/desigene/db.php');
// var for php insert
$SalaryBankBranch= strtoupper($_POST['SalaryBankBranch']);
$SalaryBankBranch_Parent= strtoupper($_POST['SalaryBankBranch_Parent']);
// Insert query
$insert= mysqli_query($conn,"INSERT INTO `master`(`Perant`, `drop`, `name`) VALUES ('$SalaryBankBranch_Parent', '$SalaryBankBranch','SalaryBankBranch')");
if($insert){
 echo 1;
}else{
    echo 0;
}
?>