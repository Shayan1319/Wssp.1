<?php
// link to data base
include ('../link/desigene/db.php');
// var for php insert
$discription= strtoupper($_POST['discrip']);
$fin_classification=strtoupper($_POST['fin']);
$rate_calc_mode=strtoupper($_POST['rate']);
$earning_deduction_fund=strtoupper($_POST['earning']);
$allowance_status=strtoupper($_POST['allowance']);
// Insert query
$insert= mysqli_query($conn,"INSERT INTO `allowances`(  `allowance`, `fin_classification`, `rate_calc_mode`, `earning_deduction_fund`, `allowance_status`) VALUES ('$discription','$fin_classification','$rate_calc_mode','$earning_deduction_fund','$allowance_status')");
if($insert){
 echo 1;
}else{
    echo 0;
}




?>