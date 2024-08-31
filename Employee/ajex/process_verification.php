<?php
session_start();
include('../link/desigene/db.php');

$response = array('success' => false, 'message' => '');

if (isset($_POST['currentEmail']) && isset($_POST['currentPassword'])) {
    $loginid = $_SESSION['loginid'];
    $currentEmail = $_POST['currentEmail'];
    $currentPassword = $_POST['currentPassword'];
    
    // Prepare and execute the query
    $sql = "SELECT Email, Password FROM login WHERE Id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $loginid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Fetch user details
    if ($user = $result->fetch_assoc()) {
        // Check if the email matches
        if ($user['Email'] == $currentEmail) {
            // Verify the hashed password
            if (password_verify($currentPassword, $user['Password'])) {
                $response['success'] = true;
                $response['message'] = 'Verification successful. You can now update your profile.';
            } else {
                $response['message'] = 'Current password is incorrect.';
            }
        } else {
            $response['message'] = 'Current email is incorrect.';
        }
    } else {
        $response['message'] = 'User not found.';
    }
    
    // Close the statement
    $stmt->close();
}

// Send JSON response
echo json_encode($response);

// Close the database connection
$conn->close();
?>
