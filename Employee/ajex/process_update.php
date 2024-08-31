<?php
session_start();
include ('../link/desigene/db.php');

$response = array('success' => false, 'message' => '');

// Check if the request is valid
if (isset($_POST['newEmail']) || isset($_POST['newPassword'])) {
    $loginid = $_SESSION['loginid'];
    $newEmail = $_POST['newEmail'] ?? '';
    $newPassword = $_POST['newPassword'] ?? '';
    $confirmPassword = $_POST['confirmPassword'] ?? '';
    
    // Validate input
    if (empty($newEmail) && empty($newPassword)) {
        $response['message'] = "You must enter a new email or password.";
    } elseif (!empty($newPassword) && $newPassword !== $confirmPassword) {
        $response['message'] = "Passwords do not match.";
    } else {
        // Prepare update query
        $sql = "UPDATE login SET ";
        $params = [];
        $types = '';
        
        if (!empty($newEmail)) {
            $sql .= "Email = ?, ";
            $params[] = $newEmail;
            $types .= 's';
        }
        if (!empty($newPassword)) {
            $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
            $sql .= "Password = ? ";
            $params[] = $hashedPassword;
            $types .= 's';
        }
        $sql .= "WHERE Id = ?";
        $params[] = $loginid;
        $types .= 'i';
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param($types, ...$params);
        
        if ($stmt->execute()) {
            $response['success'] = true;
            $response['message'] = "Profile updated successfully.";
        } else {
            $response['message'] = "Failed to update profile.";
        }
    }
}
echo json_encode($response);