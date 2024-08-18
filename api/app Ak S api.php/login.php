<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // Fixed typo
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

// Decode the JSON input
$data = json_decode(file_get_contents("php://input"), true);

// Check if decoding was successful and if required fields are present
if (json_last_error() === JSON_ERROR_NONE && isset($data['Password']) && isset($data['Email']) ) {
    include("link/db.php");

    $Email = $data['Email'];
    $Password= $data['Password'];
    $email_search = mysqli_query($conn,"SELECT * FROM `login` WHERE `Email`='$Email' && `Password`='$Password'");
    if(mysqli_num_rows($Email_search) > 0) {
    $row = mysqli_fetch_array($email_search);
    $Email = $row["email"];
    $Password = $row["Password"];
    $Designation = $row["Designation"];
    $EmployeeNumber = $row["EmployeeNumber"];
    $FullName = $row["FullName"];
    echo json_encode(array('message' => 'Login Successful', 'status' => true, 'Designation' => $Designation, 'EmployeeNumber' => $EmployeeNumber, 'FullName' => $FullName));
    }
    else{
        echo json_encode(array('message' => 'Invalid Email or Password', 'status' => false));
    }

} else {
    // Return an error if JSON decoding fails or required fields are missing
    echo json_encode(array('message' => 'Invalid input', 'status' => false));
}
?>
