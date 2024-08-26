<?php
include('../../link/desigene/db.php');

// Check if Employee_Class is set
if (isset($_POST['Employee_Class'])) {
    $Employee_Class = $_POST['Employee_Class'];
    $empGroup = isset($_POST['emp_Group']) ? $_POST['emp_Group'] : '';

    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT * FROM `master` WHERE `Perant` = ? AND `name` = 'Employee_Group'");
    $stmt->bind_param('s', $Employee_Class);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo '<option value="">Select</option>';
        while ($row = $result->fetch_assoc()) {
            $selected = ($empGroup == $row['drop']) ? 'selected' : '';
            echo "<option value=\"{$row['drop']}\" $selected>{$row['drop']}</option>";
        }
    } else {
        echo '<option value="">No options available</option>';
    }

    $stmt->close();
} else {
    echo '<option value="">No options available</option>';
}

$conn->close();
?>
