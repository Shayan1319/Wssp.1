<?php
include('../link/desigene/db.php');

// Check if Department_Type is set
if (isset($_POST['Department_Type'])) {
    $dropdown = $_POST['Department_Type'];

    // Prepare and execute the query to get the ID from the 'master' table
    $dropQuery = $conn->prepare("SELECT `id` FROM `master` WHERE `drop` = ? AND `name` = 'EmpType'");
    $dropQuery->bind_param('s', $dropdown);
    $dropQuery->execute();
    $dropResult = $dropQuery->get_result();

    // Fetch the ID and use it to get grades
    if ($dropResult->num_rows > 0) {
        while ($rowdrop = $dropResult->fetch_assoc()) {
            $perantId = $rowdrop['id']; // Use the fetched ID

            // Prepare and execute the query to get grades based on the Perant ID
            $stmt = $conn->prepare("SELECT * FROM `master` WHERE `Perant` = ? AND `name` = 'Grade'");
            $stmt->bind_param('s', $perantId);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo '<option value="">Select</option>';
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . htmlspecialchars($row['drop']) . '">' . htmlspecialchars($row['drop']) . '</option>';
                }
            } else {
                echo '<option value="">No options available</option>';
            }
            $stmt->close();
        }
    } else {
        echo '<option value="">No options available</option>';
    }
    
    $dropQuery->close();
} else {
    echo '<option value="">No options available</option>';
}

$conn->close();
?>
