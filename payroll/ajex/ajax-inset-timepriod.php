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

if (!$insertTimePeriod) {
    echo "Error inserting time period: " . mysqli_error($conn);
    exit; // Exit the script if there's an error
}

// Variables for holiday insertion
$currentDate = date('Y-m-d', strtotime($fromdate)); // Use the format 'Y-m-d' for 'Date' column
$endDate = date('Y-m-d', strtotime($todate)); // Use the format 'Y-m-d' for 'Date' column
$success = true;
echo $currentDate.$endDate.$success;

while (strtotime($currentDate) <= strtotime($endDate)) {
    // Check if the current date is a Sunday
    if (date('l', strtotime($currentDate)) === 'Sunday') {
        // Insert query for Sunday
        $insertHoliday = mysqli_query($conn, "INSERT INTO `holidays`(`DateOfSub`, `Date`, `Day`, `Type`) VALUES ('$date', '$currentDate', 'Sunday', 'Weekly Holiday')");
        
        // Check for errors in holiday insertion
        if (!$insertHoliday) {
            $success = false;
            echo "Error inserting holiday: " . mysqli_error($conn);
            break; // Exit the loop if an error occurs
        }
    }

    // Move to the next day
    $currentDate = date('Y-m-d', strtotime($currentDate . ' +1 day'));
}

if ($success) {
    echo 1; // Success
} else {
    echo 0; // Failure
}
?>
