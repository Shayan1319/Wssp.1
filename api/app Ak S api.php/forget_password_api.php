<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // Fixed typo
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

// Decode the JSON input
$data = json_decode(file_get_contents("php://input"), true);

// Check if decoding was successful and if required fields are present
if (json_last_error() === JSON_ERROR_NONE && isset($data['employeeNO']) && isset($data['Email']) && isset($data['MobileNumber']) && isset($data['name'])) {
    include("link/db.php");

    $employeeNO = $data['employeeNO'];
    $Email = $data['Email'];
    $MobileNumber = $data['MobileNumber'];
    $name = $data['name'];

    // Check for existing request
    $checkQuery = "SELECT * FROM forgetpassword WHERE employeeNO = '$employeeNO' AND Status = 'Pending'";
    $checkResult = mysqli_query($conn, $checkQuery);
    
    if (!$checkResult) {
        // Error executing query
        echo json_encode(array('message' => 'Error executing query', 'status' => false));
        exit();
    }

    if (mysqli_num_rows($checkResult) > 0) {
        echo json_encode(array('message' => 'Request already submitted', 'status' => false));
    } else {
        // Insert new request
        $insertQuery = "INSERT INTO forgetpassword (employeeNO, Email, MobileNumber, Name, Status) VALUES ('$employeeNO', '$Email', '$MobileNumber', '$name', 'Pending')";
        $insertResult = mysqli_query($conn, $insertQuery);

        if ($insertResult) {
            echo json_encode(array('message' => 'Inserted', 'status' => true));
        } else {
            echo json_encode(array('message' => 'Not inserted', 'status' => false));
        }
    }

} else {
    // Return an error if JSON decoding fails or required fields are missing
    echo json_encode(array('message' => 'Invalid input', 'status' => false));
}
?>
