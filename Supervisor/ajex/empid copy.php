<?php
include('../link/desigene/db.php');

$timeperiodId = $_POST['TimePeriodId'] ?? '';
$Employee_Manager = $_POST['SupervisorNo'] ?? '';
$working_day = $_POST['working_day'] ?? '';

if ($timeperiodId && $working_day) {
    // Query to get employees with attendance count based on the time period and working days
    $select = mysqli_query($conn, "SELECT e.*
    FROM employeedata e
    LEFT JOIN (
        SELECT Employeeid, COUNT(*) AS attendance_count
        FROM atandece
        WHERE timeperiodId = '$timeperiodId'
        GROUP BY Employeeid
    ) a ON e.EmployeeNo = a.Employeeid
    WHERE e.Status = 'ON-DUTY'
    AND e.Attendance_Supervisor = '$Employee_Manager' 
    AND (a.attendance_count IS NULL OR a.attendance_count < '$working_day')");   
    
    if (!$select) {
        echo 'Error in SQL query: ' . mysqli_error($conn); // Display SQL error if query fails
        exit;
    }
} else {
    // Query to get all employees under the supervisor if time period or working days are not provided
    $select = mysqli_query($conn, "SELECT e.*
    FROM employeedata e
    LEFT JOIN (
        SELECT Employeeid, COUNT(*) AS attendance_count
        FROM atandece
        GROUP BY Employeeid
    ) a ON e.EmployeeNo = a.Employeeid
    WHERE e.Status = 'ON-DUTY'
    AND e.Attendance_Supervisor = '$Employee_Manager'");   

    if (!$select) {
        echo 'Error in SQL query: ' . mysqli_error($conn); // Display SQL error if query fails
        exit;
    }
}

if (mysqli_num_rows($select) > 0) {
    echo '<option value="">Select</option>';
    while ($row = mysqli_fetch_assoc($select)) {
        echo '<option value="' . $row['EmployeeNo'] . '">' . $row['fName'] . ' ' . $row['mName'] . ' ' . $row['lName'] . ' (' . $row['EmployeeNo'] . ')</option>';
    }
} else {
    echo '<option value="">No employees found</option>'; // This will now work properly if no results are returned
}
?>
