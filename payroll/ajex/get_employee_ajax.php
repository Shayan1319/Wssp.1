<?php
include '../link/desigene/db.php';

    $empid = $_GET['id'];
    $query = mysqli_query($conn,"SELECT * FROM `employeedata` WHERE `Id` = $empid");

    // $stmt = $conn->prepare($query);
    // $stmt->bindParam(':description_id', $description_id, PDO::PARAM_INT);
    // $stmt->execute();
    // $count = $stmt->rowCount();
    
    if (mysqli_num_rows($query)) {
     while($row=mysqli_fetch_assoc($query)){
        $data = array(
            'EmployeeNo' => $row['EmployeeNo'],
            'fName' => $row['fName'],
            'father_Name' => $row['father_Name'],
            'CNIC' => $row['CNIC'],
            'Joining_Date' => $row['Joining_Date'],
            'Job_Tiltle' => $row['Job_Tiltle'],
            'Grade' => $row['Grade'],
            'type' => $row['type'],
            'Department' => $row['Department'],
            'Employee_Group' => $row['Employee_Group'],
            'Employee_Class' => $row['Employee_Class'],
            'Employee_Sub_Group' => $row['Employee_Sub_Group'],
            'Pay_Type' => $row['Pay_Type'],
            'Account_No' => $row['Account_No']
        );
        
        $json = json_encode($data);
        echo $json;
        exit;
    }
}

?>
