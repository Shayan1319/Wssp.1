<?php
// Link to database
include ('../link/desigene/db.php');

// Variables for PHP insert
$Employee_Group = strtoupper($_POST['Employee_Group']);
$Employee_Group_Parent = strtoupper($_POST['Employee_Group_Parent']);

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO `master` (`Perant`, `drop`, `name`) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $Employee_Group_Parent, $Employee_Group, $name);

// Set parameters and execute
$name = 'Employee_Group';
if ($stmt->execute()) {
    echo "success Inserted";
} else {
    echo "error" . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
