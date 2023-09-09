<?php
include '../link/desigene/db.php';

    $description_id = $_POST['id'];
    $query = mysqli_query($conn,"SELECT * FROM `training` WHERE `Id` = $description_id");
    
    if (mysqli_num_rows($query)) {
     while($row=mysqli_fetch_assoc($query)){
        $data = array(
            'id' => $row['Id'],
            'Training_Serial_Number' => $row['Training_Serial_Number'],
            'Training_Name' => $row['Training_Name'],
            'Institute' => $row['Institute'],
            'City' => $row['City'],
            'Institute_Address' => $row['Institute_Address'],
            'Oblige_Sponsor' => $row['Oblige_Sponsor'],
            'From' => $row['From'],
            'To' => $row['To'],
            'Duration' => $row['Duration'],
            
        );
        $json = json_encode($data);
        echo $json;
        exit;
    }
}

?>
