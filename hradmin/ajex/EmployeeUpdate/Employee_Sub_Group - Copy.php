<?php
include('../../link/desigene/db.php');

// Check if Employee_Group is set
if (isset($_POST['Employee_Group'])) {
    $empSubGroup = isset($_POST['emp_Sub_Group']) ? $_POST['emp_Sub_Group'] : '';
    $employeeGroup = $_POST['Employee_Group'];

    // Prepare and execute the query to get the ID from the 'master' table
    $dropQuery = $conn->prepare("SELECT `id` FROM `master` WHERE `drop` = ? AND `name` = 'Employee_Group'");
    if ($dropQuery === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }
    $dropQuery->bind_param('s', $employeeGroup);
    $dropQuery->execute();
    $dropResult = $dropQuery->get_result();

    if ($dropResult->num_rows > 0) {
        // Fetch the ID
        $rowdrop = $dropResult->fetch_assoc();
        $dropId = $rowdrop['id'];

        // Prepare and execute the query to get the 'Employee_Sub_Group'
        $stmt = $conn->prepare("SELECT * FROM `master` WHERE `Perant` = ? AND `name` = 'Employee_Sub_Group'");
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }
        $stmt->bind_param('s', $dropId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo '<option value="">Select</option>';
            while ($row = $result->fetch_assoc()) {
                $selected = ($empSubGroup == $row['drop']) ? 'selected' : '';
                echo "<option value=\"{$row['drop']}\" $selected>{$row['drop']}</option>";
            }
        } else {
            echo '<option value="">No options available</option>';
        }

        $stmt->close();
    } else {
        echo '<option value="">No options available</option>';
    }

    $dropQuery->close();
} else {
    echo '<option value="">No options available</option>';
}

$conn->close();
?>
