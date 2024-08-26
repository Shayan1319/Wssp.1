<?php
include('../../link/desigene/db.php');

// Check if Department_Type is set
if (isset($_POST['Department_Type'])) {
    $Department_Type = $_POST['Department_Type'];

    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT * FROM `master` WHERE `Perant` = ? AND `name` = 'Department'");
    $stmt->bind_param('s', $Department_Type);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<option value=\"{$row['drop']}\">{$row['drop']}</option>";
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