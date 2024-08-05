<?php
include '../link/desigene/db.php';

    $emil = $_GET['id'];
    $query = mysqli_query($conn,"SELECT * FROM `employeedata` WHERE `Id` = $emil");

    // $stmt = $conn->prepare($query);
    // $stmt->bindParam(':description_id', $description_id, PDO::PARAM_INT);
    // $stmt->execute();
    // $count = $stmt->rowCount();
    
    if (mysqli_num_rows($query)) {
     while($row=mysqli_fetch_assoc($query)){
        // Assuming $data is an array containing the employee data
$data = array(
    'id' => $row['Id'],
    'fName' => $row['fName'],
    'lName' => $row['lName'],
    'emailAddress' => $row['email'],
    'Gender' => $row['gender']
);

// Encode the data as JSON and send it as the response
header('Content-Type: application/json');
echo json_encode($data);
exit;

    }
}

?>
