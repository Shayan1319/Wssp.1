<?php
include ('../link/desigene/db.php');

$Employee_Sub_Group = strtoupper(trim($_POST['Employee_Sub_Group']));
$Employee_Sub_Group_Parent = strtoupper(trim($_POST['Employee_Sub_Group_Parent']));

// Ensure column names match the database schema
$insert = mysqli_query($conn, "INSERT INTO master (`Perant`, `drop`, name) VALUES ('$Employee_Sub_Group_Parent', '$Employee_Sub_Group', 'Employee_Sub_Group')");

if ($insert) {
    echo "Data Uploaded";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
