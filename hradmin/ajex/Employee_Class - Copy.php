<?php
include('../link/desigene/db.php');

// Check if Department_Type is set
if (isset($_POST['Department_Type'])) {
    $Department_Type = $_POST['Department_Type'];

    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT * FROM `master` WHERE `Perant` = ? AND `name` = 'Employee_Class'");
    $stmt->bind_param('s', $Department_Type);
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
} else {
  // Prepare and execute the query
  $stmt = mysqli_query($conn,"SELECT * FROM `master` WHERE  `name` = 'Employee_Class'");

  if (mysqli_num_rows($stmt) > 0) {
      echo '<option value="">Select</option>';
      while ($row = $result->fetch_assoc()) {
          echo '<option value="' . htmlspecialchars($row['drop']) . '">' . htmlspecialchars($row['drop']) . '</option>';
      }
  } else {
      echo '<option value="">No options available</option>';
  }
}

$conn->close();
?>
