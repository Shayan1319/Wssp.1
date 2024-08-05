<?php
include '../link/desigene/db.php';

$emil = $_POST['id'];  // Change from $_GET to $_POST
$query = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `Id` = $emil");

if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
    $data = array(
        'EmployeeNo' => $row['EmployeeNo'],
        'fName' => $row['fName'],
        'father_Name' => $row['father_Name'],
        'Job_Tiltle' => $row['Job_Tiltle'],
        'type' => $row['type']
        );
    $json = json_encode($data);
    echo $json;
    exit;
}
?>
