<?php
include('../link/desigene/db.php');

// Ensure all necessary fields are present in $_POST
if (isset($_POST['id_update'], $_POST['BillNo'], $_POST['BillDate'])) {
    $id_update = $_POST['id_update'];
    $BillNo = $_POST['BillNo'];
    $BillDate = $_POST['BillDate'];
    $TravelAllowance = $_POST['TravelAllowance'];
    $DailyAllowance = $_POST['DailyAllowance'];
    $NightAllowance = $_POST['NightAllowance'];
    $BillStatus = $_POST['BillStatus'];
    $dateapply = date('D : d-M-Y');

    $select = mysqli_query($conn, "SELECT * FROM `tabill` WHERE `TAid`='$id_update' AND `Statusofmanger`='ACCPET' || `StatusofGm`='ACCPET' || `Statusofmanger`='REJECTED' || `StatusofGm`='REJECTED'");
    if (mysqli_num_rows($select) > 0) {
        echo "Data is Accepted by GM or Manager";
    } else {
    // Perform database insertion
    $insert = mysqli_query($conn, "UPDATE `tabill` SET `BillNo`='$BillNo',`BillDate`='$BillDate',`TravelAllowance`='$TravelAllowance',`DailyAllowance`='$DailyAllowance',`NightAllowance`='$NightAllowance',`BillStatus`='$BillStatus',`Statusofmanger`='PENDING',`StatusofGm`='PENDING',`DateofApply`='$dateapply',`DateOfAccepManager`='',`DateOfAccepGm`='' WHERE`TAid`='$id_update' AND `Statusofmanger`='PENDING' AND `StatusofGm`='PENDING',");

    if ($insert) {
        // Insertion was successful
        echo "success";
    } else {
        // Insertion failed
        echo "error";
    }}
} else {
    echo "Incomplete form data"; // Debug: show if form data is incomplete
}
?>
