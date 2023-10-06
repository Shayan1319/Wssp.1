<?php
session_start();
error_reporting(0);
// links to database
include('../link/desigene/db.php');
if($_POST['employee_no']>0 && isset($_POST['frommonth']) && isset($_POST['tomunth'])) {
    $employee_no = $_POST['employee_no'];
    $frommonth = $_POST['frommonth'];
    $tomunth = $_POST['tomunth'];
    echo 1;
    // Prepare the SQL statement with a parameterized query
    $stmt = $conn->prepare("SELECT * FROM salary AS s INNER JOIN employeedata AS e ON s.employee_id = e.EmployeeNo WHERE s.date <= ? AND s.date >= ? AND s.employee_id = ?");
    $stmt->bind_param("sss", $tomunth, $frommonth, $employee_no);

// Execute the query and handle errors
$result = $stmt->execute();
if (!$result) {
    die("Error executing the query: " . $stmt->error);
}

// Get the result set
$result = $stmt->get_result();

// Output the data in a table
$num = 1;
while ($fetch = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<th>{$num}</th>";
    echo "<th>{$fetch['employee_id']}</th>";
    echo "<th>{$fetch['EmpName']}</th>";
    echo "<th>{$fetch['EmpFatherName']}</th>";
    echo "<th>{$fetch['EmpCNIC']}</th>";
    echo "<th>{$fetch['JoiningDate']}</th>";
    echo "<th>{$fetch['JobTitle']}</th>";
    echo "<th>{$fetch['Grade']}</th>";
    echo "<th>{$fetch['EmploymentType']}</th>";
    echo "<th>{$fetch['Department']}</th>";
    echo "<th>{$fetch['ClassGroup']}</th>";
    echo "<th>{$fetch['ClassGroup']}</th>";
    echo "<th>{$fetch['SubGroup']}</th>";
    echo "<th>{$fetch['PaymentMode']}</th>";
    echo "<th>{$fetch['BankAccountNo']}</th>";
    echo "<th>{$fetch['net_pay']}</th>";
    $empid = $fetch['Id'];
    // Fetch allowances data from the database

        $selectp = mysqli_query($conn, "SELECT * FROM `payrole` WHERE EmpNo='$empid'");
    // Loop through allowances and calculate total
    while ($row = mysqli_fetch_array($selectp)) {
     
    // $select = mysqli_query($conn, "SELECT * FROM`allowances` WHERE allowance_status = 'ACTIVE'");
    //    while($fe=mysqli_fetch_array($select)){
        $pallowonce = $fe['AllowancesName'];
        $sallowonce = $row['allowance'];
        if ($pallowonce == $sallowonce) {
            // Add allowance amount to total
            echo"<th>".$row['AllowancesName']."<hr>";
             echo $row['Rate']."</th>";
        }
        else{
            echo "<th>NULL</th>";
        }
    //    }
    }

    echo "</tr>";

    $num++;
}
}

else if($_POST['employee_no']=="" &&isset($_POST['frommonth']) && isset($_POST['tomunth'])) {
    $frommonth = $_POST['frommonth'];
    $tomunth = $_POST['tomunth'];
    echo 0;
    // Prepare the SQL statement with a parameterized query
    $stmt = $conn->prepare("SELECT * FROM salary AS s INNER JOIN employeedata AS e ON s.employee_id = e.EmployeeNo WHERE s.date <= ? AND s.date >= ?");
    $stmt->bind_param("ss", $tomunth, $frommonth);

// Execute the query and handle errors
$result = $stmt->execute();
if (!$result) {
    die("Error executing the query: " . $stmt->error);
}

// Get the result set
$result = $stmt->get_result();

// Output the data in a table
$num = 1;
while ($fetch = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<th>{$num}</th>";
    echo "<th>{$fetch['employee_id']}</th>";
    echo "<th>{$fetch['EmpName']}</th>";
    echo "<th>{$fetch['EmpFatherName']}</th>";
    echo "<th>{$fetch['EmpCNIC']}</th>";
    echo "<th>{$fetch['JoiningDate']}</th>";
    echo "<th>{$fetch['JobTitle']}</th>";
    echo "<th>{$fetch['Grade']}</th>";
    echo "<th>{$fetch['EmploymentType']}</th>";
    echo "<th>{$fetch['Department']}</th>";
    echo "<th>{$fetch['ClassGroup']}</th>";
    echo "<th>{$fetch['ClassGroup']}</th>";
    echo "<th>{$fetch['SubGroup']}</th>";
    echo "<th>{$fetch['PaymentMode']}</th>";
    echo "<th>{$fetch['BankAccountNo']}</th>";
    echo "<th>{$fetch['net_pay']}</th>";
    $empid = $fetch['Id'];
    // Fetch allowances data from the database

        $selectp = mysqli_query($conn, "SELECT * FROM `payrole` WHERE EmpNo='$empid'");
    // Loop through allowances and calculate total
    while ($row = mysqli_fetch_array($selectp)) {
     
    // $select = mysqli_query($conn, "SELECT * FROM`allowances` WHERE allowance_status = 'ACTIVE'");
    //    while($fe=mysqli_fetch_array($select)){
        $pallowonce = $fe['AllowancesName'];
        $sallowonce = $row['allowance'];
        if ($pallowonce == $sallowonce) {
            // Add allowance amount to total
            echo"<th>".$row['AllowancesName']."<hr>";
             echo $row['Rate']."</th>";
        }
        else{
            echo "<th>NULL</th>";
        }
    //    }
    }

    echo "</tr>";

    $num++;
}
}
// Close the statement and connection
$stmt->close();
$conn->close();
?>
