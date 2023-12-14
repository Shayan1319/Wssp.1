<?php
// Link to database
include('../link/desigene/db.php');

// Variables for PHP insert
$type = $_POST['type'];
$date = $_POST['date'];
$day = date('l', strtotime($date)); // Get the day from the date
$datesub = date('Y-m-d');

// Insert query

    // Insert query for other days
    $insert = mysqli_query($conn, "INSERT INTO `holidays`(`DateOfSub`, `Date`, `Day`, `Type`) VALUES ('$datesub', '$date', '$day', '$type')");


// Check if the insert was successful
if ($insert) {
    echo 1;
} else {
    echo 0;
}
?>
