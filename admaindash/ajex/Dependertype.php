<?php
// Link to database
include('../link/desigene/db.php');

// Variables for PHP insert
$Status = strtoupper($_POST['Dependertype']);
$query="INSERT INTO `master` (`Perant`, `drop`, `name`) VALUES ( 1,'$Status', 'dependertype')";
// Insert query
// echo $query;
$insert = mysqli_query($conn, $query);
// // Check for success
if ($insert) {
    echo 1;
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
