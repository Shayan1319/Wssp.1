<?php
// link to database
include ('../link/desigene/db.php');

// Verify if the id is passed correctly
$id = $_POST['id'];
echo "ID: " . $id ; // Check if the ID is received correctly

// Select data based on conditions
$select = mysqli_query($conn, "SELECT * FROM `tabill` WHERE `TAid`='$id' AND `Statusofmanger`='ACCPET' || `StatusofGm`='ACCPET' || `Statusofmanger`='REJECTED' || `StatusofGm`='REJECTED'");
if (mysqli_num_rows($select) > 0) {
    echo "Data is Accepted by GM or Manager";
} else {
    // Delete data if not accepted
    $insert = mysqli_query($conn, "DELETE FROM `tabill` WHERE `TAid`='$id' AND `Statusofmanger`='PENDING' AND `StatusofGm`='PENDING'");
    if ($insert) {
        echo "Data deleted";
    } else {
        echo "Error: " . mysqli_error($conn) ; // Display MySQL error, if any
        echo "Data is not deleted";
    }
}
?>
