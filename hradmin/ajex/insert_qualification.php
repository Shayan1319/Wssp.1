<?php 
include ('../link/desigene/db.php');

$employee_id = $_POST['employee_id'];
$Qualification = strtoupper($_POST['Qualification']);
$GradeDivision = strtoupper($_POST['GradeDivision']);
$Passing_Year_of_Degree = strtoupper($_POST['Passing_Year_of_Degree']);
$Last_Institute = strtoupper($_POST['Last_Institute']);
$PEC_Registration = strtoupper($_POST['PEC_Registration']);
$Institute_Address = strtoupper($_POST['Institute_Address']);
$Major_Subject = strtoupper($_POST['Major_Subject']);
$Remarks = strtoupper($_POST['Remarks']);
$insert = mysqli_query($conn, "INSERT INTO `qualification`(`Qualification`, `Grade/Division`, `Passing Year of Degree`, `Last Institute`, `PEC Registration`, `Institute Address`, `Major Subject`, `Remarks`, `Employee_id`) VALUES ('$Qualification','$GradeDivision','$Passing_Year_of_Degree','$Last_Institute','$PEC_Registration','$Institute_Address','$Major_Subject','$Remarks','$employee_id')");
if ($insert) {
    echo "Data uploaded successfully";
} else {
    echo "Data not uploaded";
}
?>