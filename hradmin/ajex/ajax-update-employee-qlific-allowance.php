<?php
// link to data base
include ('../link/desigene/db.php');
// var for php insert
$id = $_POST['id'];
$Qualification = strtoupper($_POST['Qualification']);
$GradeDivision = strtoupper($_POST['GradeDivision']);
$Passing_Year_of_Degree = strtoupper($_POST['Passing_Year_of_Degree']);
$Last_Institute = strtoupper($_POST['Last_Institute']);
$PEC_Registration = strtoupper($_POST['PEC_Registration']);
$Institute_Address = strtoupper($_POST['Institute_Address']);
$Major_Subject = strtoupper($_POST['Major_Subject']);
$Remarks = strtoupper($_POST['Remarks']);
$insert = mysqli_query($conn, "UPDATE `qualification` SET `Qualification`='$Qualification',`Grade/Division`='$GradeDivision',`Passing Year of Degree`='$Passing_Year_of_Degree',`Last Institute`='$Last_Institute',`PEC Registration`='$PEC_Registration', `Institute Address`='$Institute_Address',`Major Subject`='$Major_Subject',`Remarks`='$Remarks' WHERE `Id`= $id");
if ($insert) {
    echo 1;
} else {
    echo 0;
}
?>