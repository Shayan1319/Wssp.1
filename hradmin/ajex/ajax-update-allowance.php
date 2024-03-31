<?php
// link to data base
include ('../link/desigene/db.php');
// var for php insert
$id = $_POST['id'];
$discription= strtoupper($_POST['discrip']);
$fin_classification=strtoupper($_POST['fin']);
$rate_calc_mode=strtoupper($_POST['rate']);
$earning_deduction_fund=strtoupper($_POST['earning']);
$allowance_status=strtoupper($_POST['allowance']);
$price=$_POST['price'];
$insert= mysqli_query($conn,"UPDATE `allowances` SET `allowance`='$discription',`fin_classification`='$fin_classification',`rate_calc_mode`='$rate_calc_mode',`earning_deduction_fund`='$earning_deduction_fund',`allowance_status`='$allowance_status',`price`='$price' WHERE `id`='$id'");
if($insert){
 echo "Data Updated";
}else{
    echo "Data Not Updated";
}




?>