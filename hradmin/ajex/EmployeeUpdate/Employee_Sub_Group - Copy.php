<?php
include('../../link/desigene/db.php');

// Check if Employee_Group is set
if (isset($_POST['Employee_Group'])) {
    $Employee_Group = $_POST['Employee_Group'];

    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT * FROM `master` WHERE `Perant` = ? AND `name` = 'Employee_Sub_Group'");
    $stmt->bind_param('s', $Employee_Group);
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

$conn->close();
?>