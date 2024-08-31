<?php
include('../../link/desigene/db.php');

// Check if Department_Type is set
if (isset($_POST['Department_Type'])) {
    $Job_Title = isset($_POST['Job_Title']) ? $_POST['Job_Title'] : '';
    $dropdown = $_POST['Department_Type'];

    $dropQuery = $conn->prepare("SELECT `id` FROM `master` WHERE `drop` = ? AND `name` = 'EmpType'");
    if ($dropQuery === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }
    $dropQuery->bind_param('s', $dropdown);
    $dropQuery->execute();
    $dropResult = $dropQuery->get_result();

    if ($dropResult->num_rows > 0) {
        $rowdrop = $dropResult->fetch_assoc();
        $dropId = $rowdrop['id'];

        $stmt = $conn->prepare("SELECT * FROM `master` WHERE `Perant` = ? AND `name` = 'Job_Tiltle'");
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }
        $stmt->bind_param('i', $dropId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo '<option value="">Select</option>';
            while ($row = $result->fetch_assoc()) {
                $selected = ($Job_Title == $row['drop']) ? 'selected' : '';
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
