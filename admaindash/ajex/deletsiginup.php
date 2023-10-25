<?php
include('../link/desigene/db.php');

if(isset($_POST['did'])) {
    $did = $_GET['did'];

    // Delete query
    $delete = mysqli_query($conn, "DELETE FROM `login` WHERE `Id` = '$did'");

    if($delete) {
         // Insertion was successful
    ?>
    <script>
        alert("Data delete successfully");
        location.replace("../signup.php");
    </script>
    <?php
    } else {
         // Insertion was successful
    ?>
    <script>
        alert("Data not delete successfully");
        location.replace("signup.php");
    </script>
    <?php // Failed to delete
    }
} else {
    echo 0; // Invalid request
}
?>
