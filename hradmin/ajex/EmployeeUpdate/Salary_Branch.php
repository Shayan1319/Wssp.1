<?php
include('../../link/desigene/db.php');

// Check if Salary_Bank is set
if (isset($_POST['Salary_Bank'])) {
    $Salary_Bank = $_POST['Salary_Bank'];

    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT * FROM `master` WHERE `Perant` = ? AND `name` = 'SalaryBranch'");
    $stmt->bind_param('s', $Salary_Bank);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo '<option value="">Select</option>';
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
