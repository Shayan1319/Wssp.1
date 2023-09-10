<?php
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-type, Access-Control-Allow-Methods, Authorization, X-requested-with');
$data = json_decode(file_get_contents("php://input"), true);
$cnic = $data['CNIC'];
$number = $data['Mobile'];
$landline = $data['LandLine'];
$Costype = $data['ConsumerType'];
$zone = $data['Zone'];
$UC = $data['UC'];
$Area = $data['Area'];
$Mohalla = $data['Mohalla'];
$House = $data['House'];
$PloatHouse = $data['PloatHouse'];
$Ploatsize = $data['Ploatsize'];
$Street = $data['Street'];
$Main_Road = $data['Main_Road'];
$Phase = $data['Phase'];
$Email = $data['Email'];

// Generate a unique filename for the uploaded file
$Filename = uniqid();

// Define the path where you want to save the file
$filePath = 'file/' . $Filename;

// Decode the base64 file data and save it to the specified path
$FileData = base64_decode($data['File']);
file_put_contents($filePath, $FileData);

$Status = $data['Status'];
include "config.php";
$sql = "INSERT INTO `complane`(`CNIC`, `Mobile`, `LandLine`, `Consumer Type`, `Zone`, `UC`, `Area`, `Mohalla`, `House`, `Ploat/House`, `Ploat Size`, `Street`, `Main Road`, `Phase`, `Email`, `File`, `Status`) VALUES ('$cnic','$number','$landline','$Costype','$zone','$UC','$Area','$Mohalla','$House','$PloatHouse','$Ploatsize','$Street','$Main_Road','$Phase','$Email','$Filename','$Status')";
if (mysqli_query($conn, $sql)) {
    echo json_encode(array('message' => 'inserted', 'status' => true));
} else {
    echo json_encode(array('message' => 'Not inserted', 'status' => false));
}
?>
