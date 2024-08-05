<?php
// Link to database
include ('../link/desigene/db.php');

// Variables for PHP insert
$fromdateincript = $_POST['fromdate'];
$todateincript = $_POST['todate'];

// Convert from 'dd mm yyyy' to 'yyyy-mm-dd'
$fromDate = DateTime::createFromFormat('d m Y', $fromdateincript)->format('Y-m-d');
$toDate = DateTime::createFromFormat('d m Y', $todateincript)->format('Y-m-d');

echo "From Date (original): " . $fromdateincript . "<br>";
echo "To Date (original): " . $todateincript . "<br>";
echo "From Date (converted): " . $fromDate . "<br>";
echo "To Date (converted): " . $toDate . "<br>";

$workingdate = $_POST['workingdate'];
$date = date('Y-m-d');

// Insert query for the timeperiod table
$insertTimePeriod = mysqli_query($conn, "INSERT INTO `timeperiod`(`DateOfSub`, `FromDate`, `ToDate`, `WrokingDays`) VALUES ('$date', '$fromDate', '$toDate', '$workingdate')");

if (!$insertTimePeriod) {
    echo "Error inserting time period: " . mysqli_error($conn);
    exit; // Exit the script if there's an error
} else {
    echo "Time period inserted successfully.<br>";

    // Variables for holiday insertion
    $currentDate = $fromDate; // Use the format 'Y-m-d' for 'Date' column
    $endDate = $toDate; // Use the format 'Y-m-d' for 'Date' column
    $success = true;
    echo "Start Date: $currentDate<br>";
    echo "End Date: $endDate<br>";
    while (strtotime($currentDate) <= strtotime($endDate)) {
        // echo "Checking date: $currentDate - " . date('l', strtotime($currentDate)) . "<br>";
        // Check if the current date is a Sunday
        if (date('l', strtotime($currentDate)) === 'Sunday') {
            // Insert query for Sunday
            $insertHoliday = mysqli_query($conn, "INSERT INTO `holidays`(`DateOfSub`, `Date`, `Day`, `Type`) VALUES ('$date', '$currentDate', 'Sunday', 'Weekly Holiday')");
            
            // Check for errors in holiday insertion
            if (!$insertHoliday) {
                $success = false;
                echo "Error inserting holiday for $currentDate: " . mysqli_error($conn) ;
                break; // Exit the loop if an error occurs
            }
        }

        // Move to the next day
        $currentDate = date('Y-m-d', strtotime($currentDate . ' +1 day'));
    }
    if ($success) {
        echo "All holidays inserted successfully.";
    } else {
        echo "There was an error inserting holidays.";
    }
}
?>
