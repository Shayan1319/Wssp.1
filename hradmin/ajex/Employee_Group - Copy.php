<?php
include('../link/desigene/db.php');

// Check if Employee_Class is set
if (isset($_POST['Employee_Class'])) {
    $dropdown = $_POST['Employee_Class'];

    // Prepare and execute the query to get the ID from the 'master' table
    $dropQuery = $conn->prepare("SELECT `id` FROM `master` WHERE `drop` = ? AND `name` = 'Employee_Class'");
    $dropQuery->bind_param('s', $dropdown);
    $dropQuery->execute();
    $dropResult = $dropQuery->get_result();

    // Fetch the ID and use it to get employee groups
    if ($dropResult->num_rows > 0) {
        while ($rowdrop = $dropResult->fetch_assoc()) {
            $employeeClassId = $rowdrop['id'];

            // Prepare and execute the query to get employee groups based on the Perant (Employee_Class)
            $stmt = $conn->prepare("SELECT * FROM `master` WHERE `Perant` = ? AND `name` = 'Employee_Group'");
            $stmt->bind_param('s', $employeeClassId);
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
