<?php
include('../../link/desigene/db.php');

if (isset($_POST['Department_Type'])) {
    $Department_Type = $_POST['Department_Type'];
    $empclass = isset($_POST['emp_Class']) ? $_POST['emp_Class'] : '';

    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT * FROM `master` WHERE `Perant` = ? AND `name` = 'Employee_Class'");
    $stmt->bind_param('s', $Department_Type);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo '<option value="">Select</option>';
        while ($row = $result->fetch_assoc()) {
            $selected = ($empclass == $row['drop']) ? 'selected' : '';
            echo "<option value=\"{$row['drop']}\" $selected>{$row['drop']}</option>";
        }
    } else {
        echo '<option value="">No options available</option>';
    }

    $stmt->close();
} else {
    echo 'Wrong Input';
}

$conn->close();
?>
