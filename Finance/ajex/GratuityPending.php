<?php
include('../link/desigene/db.php');

$employeeId = $_POST['employeeId'];

if ($employeeId != "") {
    // If an employee is selected, filter by employee ID
    $query = "SELECT * FROM `gratuity` WHERE `empNo` = '$employeeId'";
} else {
    // If no employee is selected, show all records with pending CEO status first
    $query = "SELECT * FROM `gratuity` WHERE `CEO_Status`='accept'
              ORDER BY CASE WHEN `Finance_Status` = 'pending' THEN 0 ELSE 1 END, `EmployeeNo`";
}

$result = mysqli_query($conn, $query);

// Output table rows
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['Finance_Status'] == 'accept') {
            $colorReject = "btn-danger";
            $colorAccept = "btn-success";
        } else if ($row['Finance_Status'] == 'reject') {
            $colorReject = "btn-success";
            $colorAccept = "btn-danger";
        } else {
            $colorReject = "btn-info";
            $colorAccept = "btn-info";
        }
        echo "<tr>";
        echo "<td>{$row['EmployeeNo']}</td>";
        echo "<td>{$row['EmpName']}</td>";
        echo "<td>{$row['EmpDesignation']}</td>";
        echo "<td>{$row['ContrExpDate']}</td>";
        echo "<td>{$row['TotalServiceY']}</td>";
        echo "<td>{$row['TotalServiceM']}</td>";
        echo "<td>{$row['TotalServiceD']}</td>";
        echo "<td>{$row['PeriodServiceY']}</td>";
        echo "<td>{$row['PeriodServiceM']}</td>";
        echo "<td>{$row['PeriodServiceD']}</td>";
        echo "<td>{$row['GratuityRateY']}</td>";
        echo "<td>{$row['GratuityRateM']}</td>";
        echo "<td>{$row['GratuityRateD']}</td>";
        echo "<td>{$row['ServiceGratuityBreakupY']}</td>";
        echo "<td>{$row['ServiceGratuityBreakupM']}</td>";
        echo "<td>{$row['ServiceGratuityBreakupD']}</td>";
        echo "<td>{$row['PeriodGratuityBreakupY']}</td>";
        echo "<td>{$row['PeriodGratuityBreakupM']}</td>";
        echo "<td>{$row['PeriodGratuityBreakupD']}</td>";
        echo "<td>{$row['TotalPeriodGratuity']}</td>";
        echo "<td>{$row['TotalServiceGratuity']}</td>";
        echo "<td><button type='button' id='Accept' data-accept='{$row['EmployeeNo']}' class='btn $colorAccept'>Accept</button></td>";
        echo "<td><button type='button' id='Reject' data-reject='{$row['EmployeeNo']}' class='btn $colorReject'>Reject</button></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='22'>No records found.</td></tr>";
}
?>
