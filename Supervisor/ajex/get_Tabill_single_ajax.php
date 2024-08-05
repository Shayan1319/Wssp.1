<?php
include '../link/desigene/db.php';

$description_id = $_POST['id'];
$query = mysqli_query($conn, "SELECT * FROM `tabill` WHERE `TAid` = $description_id");

if (mysqli_num_rows($query)) {
    $row = mysqli_fetch_assoc($query);

    $data = array(
        'id' => $row['TAid'],
        'BillNo'=>$row['BillNo'],
        'BillDate'=>$row['BillDate'],
        'TravelAllowance'=>$row['TravelAllowance'],
        'DailyAllowance'=>$row['DailyAllowance'],
        'NightAllowance'=>$row['NightAllowance'],
        'BillStatus'=>$row['BillStatus'],
    );

    // Encode the data as JSON
    echo json_encode($data);
} else {
    echo json_encode(array()); // Return an empty JSON object if no data found
}
?>
