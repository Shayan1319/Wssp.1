<?php
include '../link/desigene/db.php';

$description_id = $_POST['id'];
$query = mysqli_query($conn, "SELECT * FROM `spouse` WHERE `id` = $description_id");

if (mysqli_num_rows($query)) {
    $row = mysqli_fetch_assoc($query);

    $data = array(
        'id' => $row['id'],
        'Spouse_Name' => $row['Spouse_Name'],
        'CNIC' => $row['CNIC'],
        'Date_of_B' => $row['Date_of_B']
    );

    // Encode the data as JSON
    echo json_encode($data);
} else {
    echo json_encode(array()); // Return an empty JSON object if no data found
}
?>
