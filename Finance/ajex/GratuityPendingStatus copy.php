<?php
include('../link/desigene/db.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $employeeId = $_POST['id'];  // EmployeeNo from the data attribute in buttons
    $status = $_POST['status'];  // 'ACCEPT' or 'REJECT'
    
    // Validate the inputs
    if (!empty($employeeId) && ($status == 'ACCEPT' || $status == 'REJECT')) {
        // Update the CEO_Status and CEO_Status_Date in the gratuity table
        $currentDate = date('Y-m-d H:i:s');  // Current date and time
        
        $query = "UPDATE `encasement` 
                  SET `Finance_Status` = '$status', 
                      `Finance_Status_Date` = '$currentDate' 
                  WHERE `id` = '$employeeId'";

        if (mysqli_query($conn, $query)) {
            echo "Success";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid input.";
    }
} else {
    echo "Invalid request.";
}
?>
