<?php
include('../link/desigene/db.php');

if(isset($_POST['did'])) {
    $did = $_POST['did'];

    // Delete query
    $delete = mysqli_query($conn, "DELETE FROM `master` WHERE `id` = '$did'");

    if($delete) {
        echo 1; // Successfully deleted
    } else {
        echo 0; // Failed to delete
    }
} else {
    echo 0; // Invalid request
}
?>
