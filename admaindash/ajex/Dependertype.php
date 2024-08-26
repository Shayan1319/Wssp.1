<?php
// Link to database
include('../link/desigene/db.php');

// Variables for PHP insert
$Status = strtoupper($_POST['Dependertype']);
$Department_Parent = strtoupper($_POST['Department_Parent']);
$query="INSERT INTO `master` (`Perant`, `drop`, `name`) VALUES ('$Department_Parent', '$Status', 'dependertype')";
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
