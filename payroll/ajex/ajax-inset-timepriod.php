<?php
// link to database
include ('../link/desigene/db.php');

// Variables for PHP insert
$fromdate = $_POST['fromdate'];
$todate = $_POST['todate'];
$workingdate = $_POST['workingdate'];
$date = date('Y-m-d');

// Insert query for the timeperiod table
$insertTimePeriod = mysqli_query($conn, "INSERT INTO `timeperiod`(`DateOfSub`, `FromDate`, `ToDate`, `WrokingDays`) VALUES ('$date', '$fromdate', '$todate', '$workingdate')");

// Insert query for Sundays into the holidays table
$currentDate = date('Y-m-d', strtotime($fromdate));
$endDate = date('Y-m-d', strtotime($todate));

while (strtotime($currentDate) <= strtotime($endDate)) {
    // Check if the current date is a Sunday
    if (date('l', strtotime($currentDate)) === 'Sunday') {
        // Insert query for Sunday
        $insertHoliday = mysqli_query($conn, "INSERT INTO `holidays`(`DateOfSub`, `Date`, `Day`, `Type`) VALUES ('$date', '$currentDate', 'Sunday', 'Weekly Holiday')");
    }

    // Move to the next day
    $currentDate = date('Y-m-d', strtotime($currentDate . ' +1 day'));
}

if ($insertTimePeriod) {
    echo 1;
} else {
    echo 0;
}
?>
