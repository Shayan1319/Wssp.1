<?php
include('../link/desigene/db.php');

// Check if Employee_Group is set
if (isset($_POST['Employee_Group'])) {
    $dropdown = $_POST['Employee_Group'];

    // Prepare and execute the query to get the ID from the 'master' table
    $dropQuery = $conn->prepare("SELECT `id` FROM `master` WHERE `drop` = ? AND `name` = 'Employee_Group'");
    $dropQuery->bind_param('s', $dropdown);
    $dropQuery->execute();
    $dropResult = $dropQuery->get_result();

    // Fetch the ID and use it to get employee sub-groups
    if ($dropResult->num_rows > 0) {
        while ($rowdrop = $dropResult->fetch_assoc()) {
            $employeeGroupId = $rowdrop['id']; // Use the fetched ID

            // Prepare and execute the query to get employee sub-groups based on the Perant (Employee_Group)
            $stmt = $conn->prepare("SELECT * FROM `master` WHERE `Perant` = ? AND `name` = 'Employee_Sub_Group'");
            $stmt->bind_param('s', $employeeGroupId);
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
