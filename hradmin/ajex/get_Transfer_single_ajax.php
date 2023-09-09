<?php
include '../link/desigene/db.php';

    $description_id = $_POST['id'];
    $query = mysqli_query($conn,"SELECT * FROM `transfer` WHERE `id` = $description_id");
    
    if (mysqli_num_rows($query)) {
     while($row=mysqli_fetch_assoc($query)){
        $data = array(
            'id' => $row['id'],
            'Transfer_Order_Number' => $row['Transfer_Order_Number'],
            'Designation' => $row['Designation'],
            'BPS' => $row['BPS'],
            'From_Department' => $row['From_Department'],
            'To_Project' => $row['To_Project'],
            'From_Station' => $row['From_Station'],
            'To_Station' => $row['To_Station'],
            'Worked_From' => $row['Worked_From'],
            'Transfer_Date' => $row['Transfer_Date'],
            
        );
        $json = json_encode($data);
        echo $json;
        exit;
    }
}

?>
