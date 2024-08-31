<?php
include('../link/desigene/db.php');

// Check if Salary_Bank is set
if (isset($_POST['Salary_Bank'])) {
    $dropdown = $_POST['Salary_Bank'];

    // Prepare and execute the query to get the ID from the 'master' table
    $dropQuery = $conn->prepare("SELECT `id` FROM `master` WHERE `drop` = ? AND `name` = 'SalaryBank'");
    $dropQuery->bind_param('s', $dropdown);
    $dropQuery->execute();
    $dropResult = $dropQuery->get_result();

    // Fetch the ID and use it to get SalaryBankBranch
    if ($dropResult->num_rows > 0) {
        while ($rowdrop = $dropResult->fetch_assoc()) {
            $salaryBankId = $rowdrop['id']; // Use the fetched ID

            // Prepare and execute the query to get SalaryBankBranch based on the Perant (Salary_Bank)
            $stmt = $conn->prepare("SELECT * FROM `master` WHERE `Perant` = ? AND `name` = 'SalaryBankBranch'");
            $stmt->bind_param('s', $salaryBankId);
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
