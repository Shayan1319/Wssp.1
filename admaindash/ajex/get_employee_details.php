<?php
include('../link/desigene/db.php');

$response = array('success' => false, 'data' => '');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if 'Id' is set
    if (isset($_POST['Id'])) {
        $id = $_POST['Id'];

        $query = "SELECT * FROM `login` WHERE `Id` = '$id'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result);
            $response['success'] = true;
            $response['data'] = array(
                'FullName' => $data['FullName'],
                'Gender' => $data['Gender'],
                'Email' => $data['Email'],
                'EmployeeNumber' => $data['EmployeeNumber'],
                'Designation' => $data['Designation']
            );
        } else {
            $response['message'] = 'Employee not found';
        }
    } elseif (isset($_POST['EmployeeNumber'])) { // Check if 'EmployeeNumber' is set
        $employeeNumber = $_POST['EmployeeNumber'];

        $query = "SELECT `fName`, `lName`, `gender`, `email` FROM `employeedata` WHERE `EmployeeNo` = '$employeeNumber'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result);
            $response['success'] = true;
            $response['data'] = array(
                'FullName' => $data['fName'] . ' ' . $data['lName'],
                'Gender' => $data['gender'],
                'Email' => $data['email']
            );
        } else {
            $response['message'] = 'Employee not found';
        }
    } else {
        $response['message'] = 'No ID or EmployeeNumber provided';
    }
}

echo json_encode($response);
?>