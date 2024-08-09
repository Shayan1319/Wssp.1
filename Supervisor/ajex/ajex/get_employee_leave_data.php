<?php
include('../link/desigene/db.php');

if (isset($_POST['empid'])) {
    $empid = $_POST['empid'];
    $empleave = 15; // Initial leave allocation
    $fromdate = date('Y-01-01'); // Start of the year
    $todate = date('Y-12-31'); // End of the year
    
    $sql = "SELECT SUM(`TotalDays`) AS empleave FROM `leavereq` WHERE `EmployeeNo`='$empid' AND `Statusofmanger`='ACCEPT' AND `StatusofGm`='ACCEPT' AND `LeaveTo` >= '$fromdate' AND `LeaveTo` <= '$todate'";
    $result = $conn->query($sql);
    
    if ($result) {
        $rowleave = $result->fetch_assoc();
        $leave = $rowleave['empleave'];
        $totalDaysAfterSubtraction = $empleave - $leave;
    } else {
        $totalDaysAfterSubtraction = $empleave;
    }
    
    echo $totalDaysAfterSubtraction;
}
?>
