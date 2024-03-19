<?php
include('../link/desigene/db.php');

// Ensure all necessary fields are present in $_POST
if (isset($_POST['employNo'], $_POST['Requestid'], $_POST['BillNo'], $_POST['BillDate'])) {
    $employNo = $_POST['employNo'];
    $RequestNoTravel = $_POST['Requestid'];
    $BillNo = $_POST['BillNo'];
    $BillDate = $_POST['BillDate'];
    $TravelAllowance = $_POST['TravelAllowance'];
    $DailyAllowance = $_POST['DailyAllowance'];
    $NightAllowance = $_POST['NightAllowance'];
    $BillStatus = $_POST['BillStatus'];
    $dateapply = date('D : d-M-Y');

    // Perform database insertion
    $insert = mysqli_query($conn, "INSERT INTO `tabill`(`EmployeeNo`, `RequestNoTravel`, `BillNo`, `BillDate`, `TravelAllowance`, `DailyAllowance`, `NightAllowance`, `BillStatus`, `DateofApply`) VALUES ('$employNo', '$RequestNoTravel','$BillNo','$BillDate','$TravelAllowance','$DailyAllowance','$NightAllowance','$BillStatus','$dateapply')");

    if ($insert) {
        // Insertion was successful
        echo "success";
    } else {
        // Insertion failed
        echo "error";
    }
} else {
    echo "Incomplete form data"; // Debug: show if form data is incomplete
}
?>
