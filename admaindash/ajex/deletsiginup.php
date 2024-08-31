<?php
include('../link/desigene/db.php');

$response = array('success' => false, 'message' => '');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $did = $_POST['did'];

    // Validate the ID
    if (empty($did)) {
        $response['message'] = 'No ID provided.';
    } else {
        $query = "DELETE FROM `login` WHERE `Id` = '$did'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $response['success'] = true;
            $response['message'] = 'Data deleted successfully.';
        } else {
            $response['message'] = 'Error deleting data: ' . mysqli_error($conn);
        }
    }
}

echo json_encode($response);
