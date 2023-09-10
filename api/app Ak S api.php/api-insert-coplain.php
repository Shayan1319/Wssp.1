<?php
header('Content-type: application/json');
header('Acces-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-type, Access-Control-Allow-Methods, Authoization, X-requested-with');
$data = json_decode(file_get_contents("php://input"), true);

$Address=$data['Address'];
$Detale=$data['Detale'];
$Type=$data['Type'];
// Generate a unique filename for the uploaded file
$Filename = uniqid();

// Define the path where you want to save the file
$filePath = 'Img/' . $Filename;

// Decode the base64 file data and save it to the specified path
$FileData = base64_decode($data['Image']);
file_put_contents($filePath, $FileData);


include "config.php";
$sql= "INSERT INTO `clintcomp`( `Image`, `Address`, `Detale`, `Type`) VALUES ('$Filename','$Address','$Detale','$Type')";

if (mysqli_query($conn, $sql)) {
    echo json_encode(array('message' => 'inserted', 'status' => true));
} else {
    echo json_encode(array('message' => 'Not inserted', 'status' => false));
}
?>
