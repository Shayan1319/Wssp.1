<?php
include '../link/desigene/db.php';

if (isset($_POST['employeeNO'])) {
    $employeeNO = $_POST['employeeNO'];
    $Gmail=$_POST['Gmail'];
    $IdUpdate=$_POST['IdUpdate'];
    $query = mysqli_query($conn, "SELECT * FROM `login` WHERE `EmployeeNumber` = $employeeNO");
    
    if ($query && mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
        $data = array(
            "Id" => $row['Id'],
            "FullName" => $row['FullName'],
            "Gender" => $row['Gender'],
            "Email" => $row['Email'],
            "Password" => $row['Password'],
            "EmployeeNumber" => $row['EmployeeNumber'],
            "Designation" => $row['Designation'],
            "Gmail" => $Gmail,
            "IdUpdate"=>$IdUpdate
        );
        echo json_encode($data);
    } else {
        echo json_encode(array("error" => "No data found"));
    }
}
?>