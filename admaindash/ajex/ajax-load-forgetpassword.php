<?php
include("../link/desigene/db.php");

$query = "SELECT * FROM `forgetpassword` WHERE `Status`='Pending'";
$result = mysqli_query($conn, $query);

$output = '';
$sno = 1;
while ($row = mysqli_fetch_assoc($result)) {
    $output .= "<tr>";
    $output .= "<td>" . $sno++ . "</td>";
    $output .= "<td>" . $row['employeeNO'] . "</td>";
    $output .= "<td>" . $row['Name'] . "<input type='email' name='IdUpdate' value=".$row['Id']." id='IdUpdate' class='hidden' hidden></td>";
    $output .= "<td>" . $row['Email'] . "<input type='email' name='Gmail' value=".$row['Email']." id='Gmail' class='hidden' hidden> </td>";
    $output .= "<td>" . $row['MobileNumber'] . "</td>";
    $output .= "<td><button type='button' id='update' style='background-color: #00a65a !important;' data-eid='" . $row['employeeNO'] . "' class='btn delete-btn text-white' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>" . $row['Status'] . "</button></td>";
    $output .= "</tr>";
}

echo $output;
?>
