<?php
include('../link/desigene/db.php');

$response = array('success' => false, 'message' => '');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullName =  $_POST['FullName'];
    $gender =  $_POST['Gender'];
    $email =  $_POST['Email'];
    $password = $_POST['Password'];
    $employeeNo =  $_POST['Employeenumber'];
    $designation =  $_POST['Designation'];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if employee number exists to decide if it's an update or insert
    $checkQuery = "SELECT `Id` FROM `login` WHERE `EmployeeNumber` = '$employeeNo'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // Update existing record
        $updateQuery = "UPDATE `login` SET `FullName` = '$fullName', `Gender` = '$gender', `Email` = '$email', `Password` = '$hashedPassword', `Designation` = '$designation' WHERE `EmployeeNumber` = '$employeeNo'";
        if (mysqli_query($conn, $updateQuery)) {
            $response['success'] = true;
            $response['message'] = 'Data updated successfully.';
        } else {
            $response['message'] = 'Error updating data: ' . mysqli_error($conn);
        }
    } else {
        // Insert new record
        $insertQuery = "INSERT INTO `login` (`FullName`, `Gender`, `Email`, `Password`, `EmployeeNumber`, `Designation`) VALUES ('$fullName', '$gender', '$email', '$hashedPassword', '$employeeNo', '$designation')";
        if (mysqli_query($conn, $insertQuery)) {
            $response['success'] = true;
            $response['message'] = 'Data inserted successfully.';
        } else {
            $response['message'] = 'Error inserting data: ' . mysqli_error($conn);
        }
    }
}

echo json_encode($response);
?>
