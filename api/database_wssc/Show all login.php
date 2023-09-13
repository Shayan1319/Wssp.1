<?php
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
$data = json_decode(file_get_contents("php://input"), true);

include "../../link/desigene/db.php";
$sql = "SELECT * FROM login";
$result = mysqli_query($conn, $sql) or die("SQL query failed");

if (mysqli_num_rows($result) > 0) {
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);
} else {
    echo json_encode(array('message' => 'No Record Found', 'status' => false));
}
?>