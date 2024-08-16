<?php
session_start();
header('Content-Type: application/json');
error_reporting(0);

// Include the database connection file
include 'link/desigene/db.php';

$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $employeeNO = $_POST['employeeNO'] ?? '';
    $Email = $_POST['Email'] ?? '';
    $MobileNumber = $_POST['MobileNumber'] ?? '';
    $name = $_POST['name'] ?? '';

    if (empty($employeeNO) || empty($Email) || empty($MobileNumber) || empty($name)) {
        $response['status'] = 'error';
        $response['message'] = 'All fields are required.';
        echo json_encode($response);
        exit();
    }

    // Check if there is already a pending request for this employee number
    $checkQuery = "SELECT * FROM forgetpassword WHERE employeeNO = '$employeeNO' AND Status = 'Pending'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $response['status'] = 'error';
        $response['message'] = 'There is already a pending request for this employee number.';
    } else {
        // Insert the new request
        $insertQuery = "INSERT INTO forgetpassword (`employeeNO`, `Email`, `MobileNumber`, `Name`, `Status`) 
                        VALUES ('$employeeNO', '$Email', '$MobileNumber', '$name', 'Pending')";
        if (mysqli_query($conn, $insertQuery)) {
            $response['status'] = 'success';
            $response['message'] = 'Request submitted successfully.';
            $response['redirect'] = 'admaindash/index.php';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Database error: ' . mysqli_error($conn);
        }
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Invalid request method.';
}

echo json_encode($response);
?>
