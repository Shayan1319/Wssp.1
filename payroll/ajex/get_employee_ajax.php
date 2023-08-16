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
            'id' => $row['Id'],
            'fName' => $row['fName'],
            'father_Name' => $row['father_Name'],
            'type' => $row['type'],
            'Job_Tiltle' => $row['Job_Tiltle'],
            'Department' => $row['Department']
        );
        
        $json = json_encode($data);
        echo $json;
        exit;
    }
}

?>
