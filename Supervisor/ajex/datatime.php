<?php
include('../link/desigene/db.php');

$TimePeriodId = $_POST['TimePeriodId'];
$select = mysqli_query($conn, "SELECT * FROM `timeperiod` WHERE `HRStatus`='ACCEPT' AND ID = $TimePeriodId");

// Check if the query is successful
if (!$select) {
    echo 'Error in SQL query: ' . mysqli_error($conn);
    exit;
}

if (mysqli_num_rows($select) > 0) {
    $row = mysqli_fetch_assoc($select);
    echo $row['WrokingDays'];  // Return only the working days value
} else {
    echo 'No data found';
}
?>
