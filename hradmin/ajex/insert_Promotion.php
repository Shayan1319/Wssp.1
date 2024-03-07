<?php
include('../link/desigene/db.php');

$employee_id = $_POST['employee_id'];
$From_Designation = strtoupper($_POST['From_Designation']);
$To_Designation = strtoupper($_POST['To_Designation']);
$From_BPS = strtoupper($_POST['From_BPS']);
$ToBps = strtoupper($_POST['ToBps']);

$Promotion_Date = strtoupper($_POST['Promotion_Date']);
$Promotion_Number = strtoupper($_POST['Promotion_Number']);
$Department1 = strtoupper($_POST['Department1']);
$Acting = strtoupper($_POST['Acting']);
$Remarks = strtoupper($_POST['Remarks']);


$targetDirectory = "../../CV/";
$targetFile = $targetDirectory . basename($_FILES["file"]["name"]);
$fileName = basename($_FILES["file"]["name"]);

if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
    // File uploaded successfully, proceed to insert into the database
    $insert = mysqli_query($conn, "INSERT INTO `promotion`(`From_Designation`, `To_Designation`, `From_BPS`, `ToBps`, `Promotion_Date`, `Promotion_Number`, `Department1`, `Acting`, `Remarks`, `file`, `employee_id`) VALUES ('$From_Designation','$To_Designation','$From_BPS','$ToBps','$Promotion_Date', '$Promotion_Number','$Department1','$Acting','$Remarks','$fileName','$employee_id')");

    if ($insert) {
    echo"Data upload successfully";
    } else {
        echo "Check there is error";
    }
}else {
    echo"There is an error to upload file";
}
 
?>
