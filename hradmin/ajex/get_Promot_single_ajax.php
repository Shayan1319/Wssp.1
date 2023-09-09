<?php
include '../link/desigene/db.php';

$description_id = $_POST['id'];
$query = mysqli_query($conn, "SELECT * FROM `promotion` WHERE `Id` = $description_id");

if (mysqli_num_rows($query)) {
    $row = mysqli_fetch_assoc($query);

    $data = array(
        'id' => $row['Id'],
        'From_Designation' => $row['From_Designation'],
        'To_Designation' => $row['To_Designation'],
        'From_BPS' => $row['From_BPS'],
        'ToBps' => $row['ToBps'],
        'Promotion_Date' => $row['Promotion_Date'],
        'Promotion_Number' => $row['Promotion_Number'],
        'Department1' => $row['Department1'],
        'Acting' => $row['Acting'],
        'Remarks' => $row['Remarks'],
    );

    // Encode the data as JSON
    echo json_encode($data);
} else {
    echo json_encode(array()); // Return an empty JSON object if no data found
}
?>
