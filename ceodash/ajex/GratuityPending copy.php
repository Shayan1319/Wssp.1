<?php
include('../link/desigene/db.php');

$employeeId = $_POST['employeeId'];

if ($employeeId != "") {
    // If an employee is selected, filter by employee ID
    $query = "SELECT * FROM `encasement` WHERE `Employee` = '$employeeId'";
} else {
    // If no employee is selected, show all records with pending CEO status first
    $query = "SELECT * FROM `encasement` 
              ORDER BY CASE WHEN `CEO_Status` = 'pending' THEN 0 ELSE 1 END, `id`";
}

$result = mysqli_query($conn, $query);

// Output table rows
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['CEO_Status'] == 'accept') {
            $colorReject = "btn-danger";
            $colorAccept = "btn-success";
        } else if ($row['CEO_Status'] == 'reject') {
            $colorReject = "btn-success";
            $colorAccept = "btn-danger";
        } else {
            $colorReject = "btn-info";
            $colorAccept = "btn-info";
        }
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['Employee']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Ann_Leave_Entitlement']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Ann_Leave_Availed']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Ann_Leave_Balance']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Ann_Leave_Payable']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Gross_Pay_Monthly']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Gross_Pay_Yearly']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Gross_Pay_Daily']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Amount_Payable']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Bank_Branch']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Account_No']) . "</td>";
        echo "<td><button type='button' id='Accept' data-accept='{$row['id']}' class='btn $colorAccept'>Accept</button></td>";
        echo "<td><button type='button' id='Reject' data-reject='{$row['id']}' class='btn $colorReject'>Reject</button></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='22'>No records found.</td></tr>";
}
?>
