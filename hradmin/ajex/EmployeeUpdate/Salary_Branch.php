<?php
include('../../link/desigene/db.php');

// Check if Salary_Bank is set
if (isset($_POST['Salary_Bank'])) {
    // Get the selected Salary_Bank and Salary_Bank_Branch
    $SalaryBankBranch = isset($_POST['Salary_Bank_Branch']) ? $_POST['Salary_Bank_Branch'] : '';
    $dropdown = $_POST['Salary_Bank'];

    // Prepare and execute the query to get the ID from the 'master' table
    $dropQuery = $conn->prepare("SELECT `id` FROM `master` WHERE `drop` = ? AND `name` = 'SalaryBank'");
    if ($dropQuery === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }
    $dropQuery->bind_param('s', $dropdown); // Assuming 'drop' is a string, use 's'
    $dropQuery->execute();
    $dropResult = $dropQuery->get_result();

    if ($dropResult->num_rows > 0) {
        // Fetch the ID
        $rowdrop = $dropResult->fetch_assoc();
        $dropId = $rowdrop['id'];

        // Prepare and execute the query to get SalaryBankBranch based on the fetched ID
        $stmt = $conn->prepare("SELECT * FROM `master` WHERE `Perant` = ? AND `name` = 'SalaryBankBranch'");
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }
        $stmt->bind_param('i', $dropId); // Assuming `id` is an integer, use 'i' for integer binding
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo '<option value="">Select</option>';
            while ($row = $result->fetch_assoc()) {
                $selected = ($SalaryBankBranch == $row['drop']) ? 'selected' : '';
                echo '<option value="' . htmlspecialchars($row['drop']) . '" ' . $selected . '>' . htmlspecialchars($row['drop']) . '</option>';
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
