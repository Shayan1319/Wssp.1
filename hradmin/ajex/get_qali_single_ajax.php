<?php
include '../link/desigene/db.php';

    $description_id = $_POST['id'];
    $query = mysqli_query($conn,"SELECT * FROM `qualification` WHERE `Id` = $description_id");
    
    if (mysqli_num_rows($query)) {
     while($row=mysqli_fetch_assoc($query)){
        $data = array(
            'id' => $row['Id'],
            'Qualification_update' => $row['Qualification'],
            'GradeDivision_update' => $row['Grade/Division'],
            'Passing_Year_of_Degree_update' => $row['Passing Year of Degree'],
            'Last Institute' => $row['Qualification'],
            'PEC_Registration_update' => $row['PEC Registration'],
            'Institute_Address_update' => $row['Institute Address'],
            'Major_Subject_update' => $row['Major Subject'],
            'Remarks_update' => $row['Remarks']
        );
        $json = json_encode($data);
        echo $json;
        exit;
    }
}

?>
