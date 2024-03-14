<?php
include ('../link/desigene/db.php');
$employee_id = $_POST['employee_id'];
$Transfer_Order_Number = strtoupper($_POST['Transfer_Order_Number']);
$Designation = strtoupper($_POST['Designation']);
$BPS = strtoupper($_POST['BPS']);
$From_Department = strtoupper($_POST['From_Department']);
$To_Project = strtoupper($_POST['To_Project']);
$From_Station = strtoupper($_POST['From_Station']);
$To_Station = strtoupper($_POST['To_Station']);
$Worked_From = strtoupper($_POST['Worked_From']);
$Transfer_Date = strtoupper($_POST['Transfer_Date']);
$ToGrade = strtoupper($_POST['To_Grade']);
$To_Department = strtoupper($_POST['To_Department']);
$targetDirectory = "../../CV/";
$targetFile = $targetDirectory . basename($_FILES["file"]["name"]);
$fileName = basename($_FILES["file"]["name"]);
if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
    // File uploaded successfully, now insert data into the database
} else {
    echo "Error to upload the file";
}
 $insert = mysqli_query($conn, "INSERT INTO `transfer`(`Transfer_Order_Number`, `Designation`, `BPS`, `From_Department`, `To_Project`, `From_Station`, `To_Station`, `Worked_From`, `Transfer_Date`,  `file`, `employee_id`, `ToGrade`, `ToDepartment`) VALUES ('$Transfer_Order_Number','$Designation','$BPS','$From_Department','$To_Project', '$From_Station','$To_Station','$Worked_From','$Transfer_Date','$fileName','$employee_id', '$ToGrade', '$To_Department')");

    if ($insert) {
        echo "Data saves successfully";
    } else {
        echo "Error to upload data";
    }
?>
