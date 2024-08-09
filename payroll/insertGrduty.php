<?php
session_start();
error_reporting(0);
// links to database
include('../link/desigene/db.php');
if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber']) || $_SESSION['Designation'] != 'Payroll manager') {
    // Log the unauthorized access attempt for auditing purposes
    error_log("Unauthorized access attempt. User: {$_SESSION['loginid']}");
    
    // Redirect to the logout page
    header("Location: ../logout.php");
    exit; // Ensure that the script stops execution after the header redirection
} else {
    if (isset($_POST['submit'])) {
         // Retrieve and sanitize input hidden data
         $employeeNos = $_POST['EmployeeNo'];
         $fNames = $_POST['fName'];
         $jobTitles = $_POST['Job_Tiltle'];
         $grades = $_POST['Grade'];
         $joiningDates = $_POST['Joining_Date'];
         $contractExpiryDates = $_POST['Contract_Expiry_Date'];
         $totalServiceYs = $_POST['TotalServiceY'];
         $totalServiceMs = $_POST['TotalServiceM'];
         $totalServiceDs = $_POST['TotalServiceD'];
         $periodServiceYs = $_POST['PeriodServiceY'];
         $periodServiceMs = $_POST['PeriodServiceM'];
         $periodServiceDs = $_POST['PeriodServiceD'];
         $gratuityRateYs = $_POST['GratuityRateY'];
         $gratuityRateMs = $_POST['GratuityRateM'];
         $gratuityRateDs = $_POST['GratuityRateD'];
         $serviceGratuityBreakupYs = $_POST['ServiceGratuityBreakupY'];
         $serviceGratuityBreakupMs = $_POST['ServiceGratuityBreakupM'];
         $serviceGratuityBreakupDs = $_POST['ServiceGratuityBreakupD'];
         $periodGratuityBreakupYs = $_POST['PeriodGratuityBreakupY'];
         $periodGratuityBreakupMs = $_POST['PeriodGratuityBreakupM'];
         $periodGratuityBreakupDs = $_POST['PeriodGratuityBreakupD'];
         $totalPeriodGratuities = $_POST['TotalPeriodGratuity'];
         $totalGratuities = $_POST['TotalGratuity'];
         $date=date('Y-m-d');
         
         foreach ($employeeNos as $index => $employeeNo) {
             $fName = mysqli_real_escape_string($conn, $fNames[$index]);
             $jobTitle = mysqli_real_escape_string($conn, $jobTitles[$index]);
             $grade = mysqli_real_escape_string($conn, $grades[$index]);
             $joiningDate = mysqli_real_escape_string($conn, $joiningDates[$index]);
             $contractExpiryDate = mysqli_real_escape_string($conn, $contractExpiryDates[$index]);
             $totalServiceY = mysqli_real_escape_string($conn, $totalServiceYs[$index]);
             $totalServiceM = mysqli_real_escape_string($conn, $totalServiceMs[$index]);
             $totalServiceD = mysqli_real_escape_string($conn, $totalServiceDs[$index]);
             $periodServiceY = mysqli_real_escape_string($conn, $periodServiceYs[$index]);
             $periodServiceM = mysqli_real_escape_string($conn, $periodServiceMs[$index]);
             $periodServiceD = mysqli_real_escape_string($conn, $periodServiceDs[$index]);
             $gratuityRateY = mysqli_real_escape_string($conn, $gratuityRateYs[$index]);
             $gratuityRateM = mysqli_real_escape_string($conn, $gratuityRateMs[$index]);
             $gratuityRateD = mysqli_real_escape_string($conn, $gratuityRateDs[$index]);
             $serviceGratuityBreakupY = mysqli_real_escape_string($conn, $serviceGratuityBreakupYs[$index]);
             $serviceGratuityBreakupM = mysqli_real_escape_string($conn, $serviceGratuityBreakupMs[$index]);
             $serviceGratuityBreakupD = mysqli_real_escape_string($conn, $serviceGratuityBreakupDs[$index]);
             $periodGratuityBreakupY = mysqli_real_escape_string($conn, $periodGratuityBreakupYs[$index]);
             $periodGratuityBreakupM = mysqli_real_escape_string($conn, $periodGratuityBreakupMs[$index]);
             $periodGratuityBreakupD = mysqli_real_escape_string($conn, $periodGratuityBreakupDs[$index]);
             $totalPeriodGratuityValue = mysqli_real_escape_string($conn, $totalPeriodGratuities[$index]);
             $totalGratuityValue = mysqli_real_escape_string($conn, $totalGratuities[$index]);
 
             // Check if record already exists
             $checkQuery = "SELECT COUNT(*) as count FROM `gratuity` WHERE empNo = '$employeeNo'";
             $result = mysqli_query($conn, $checkQuery);
             $row = mysqli_fetch_assoc($result);
 
             if ($row['count'] > 0) {
                 // Record exists
                 echo "<script>alert('Record for EmployeeNo $employeeNo already exists');</script>";
             } else {
                 // Prepare and execute the insert query
                 $query = "INSERT INTO `gratuity` (
                     `empNo`, `EmpName`, `EmpDesignation`, `Grade`, `JoiningDate`, `ContrExpDate`, 
                     `TotalServiceD`, `TotalServiceM`, `TotalServiceY`, `PeriodServiceD`, 
                     `PeriodServiceM`, `PeriodServiceY`, `GratuityRateD`, `GratuityRateM`, 
                     `GratuityRateY`, `ServiceGratuityBreakupD`, `ServiceGratuityBreakupM`, 
                     `ServiceGratuityBreakupY`, `PeriodGratuityBreakupD`, `PeriodGratuityBreakupM`, 
                     `PeriodGratuityBreakupY`, `TotalPeriodGratuity`, `TotalServiceGratuity`, `Date`
                 ) VALUES (
                     '$employeeNo', '$fName', '$jobTitle', '$grade', '$joiningDate', 
                     '$contractExpiryDate', '$totalServiceD', '$totalServiceM', '$totalServiceY', 
                     '$periodServiceD', '$periodServiceM', '$periodServiceY', '$gratuityRateD', 
                     '$gratuityRateM', '$gratuityRateY', '$serviceGratuityBreakupD', 
                     '$serviceGratuityBreakupM', '$serviceGratuityBreakupY', 
                     '$periodGratuityBreakupD', '$periodGratuityBreakupM', '$periodGratuityBreakupY', 
                     '$totalPeriodGratuityValue', '$totalGratuityValue', '$date'
                 )";
                 if (mysqli_query($conn, $query)) {
                     echo "<script>alert('Data inserted successfully');location.replace('Gratuity.php');</script>";
                 } else {
                     echo "Error: " . mysqli_error($conn) . "<br>";
                 }
             }
         }
 
         // Close the connection
         $conn->close();
     }
     else if (isset($_POST['submit_encasement'])) {
         // Retrieve form data
         $EmployeeNos = $_POST['EmployeeNo'];
         $Ann_Leave_Entitlements = $_POST['Ann_Leave_Entitlement'];
         $Ann_Leave_Availeds = $_POST['Ann_Leave_Availed'];
         $Ann_Leave_Balances = $_POST['Ann_Leave_Balance'];
         $Ann_Leave_Payables = $_POST['Ann_Leave_Payable'];
         $Gross_Pay_Monthlys = $_POST['Gross_Pay_Monthly'];
         $Gross_Pay_Yearlys = $_POST['Gross_Pay_Yearly'];
         $Gross_Pay_Dailys = $_POST['Gross_Pay_Daily'];
         $Amount_Payables = $_POST['Amount_Payable'];
         $Bank_Branchs = $_POST['Bank_Branch'];
         $Account_Nos = $_POST['Account_No'];
         $Period = $_POST['Period'];
     
         // Loop through each employee and insert data
         for ($i = 0; $i < count($EmployeeNos); $i++) {
             $EmployeeNo = $EmployeeNos[$i];
             $Ann_Leave_Entitlement = $Ann_Leave_Entitlements[$i];
             $Ann_Leave_Availed = $Ann_Leave_Availeds[$i];
             $Ann_Leave_Balance = $Ann_Leave_Balances[$i];
             $Ann_Leave_Payable = $Ann_Leave_Payables[$i];
             $Gross_Pay_Monthly = $Gross_Pay_Monthlys[$i];
             $Gross_Pay_Yearly = $Gross_Pay_Yearlys[$i];
             $Gross_Pay_Daily = $Gross_Pay_Dailys[$i];
             $Amount_Payable = $Amount_Payables[$i];
             $Bank_Branch = $Bank_Branchs[$i];
             $Account_No = $Account_Nos[$i];
     
             // Prepare SQL query to insert data
             $sql = "INSERT INTO encasement 
                     (Employee, Ann_Leave_Entitlement, Ann_Leave_Availed, Ann_Leave_Balance, 
                      Ann_Leave_Payable, Gross_Pay_Monthly, Gross_Pay_Yearly, Gross_Pay_Daily, 
                      Amount_Payable, Bank_Branch, Account_No, Period)
                     VALUES 
                     ('$EmployeeNo', '$Ann_Leave_Entitlement', '$Ann_Leave_Availed', '$Ann_Leave_Balance', 
                      '$Ann_Leave_Payable', '$Gross_Pay_Monthly', '$Gross_Pay_Yearly', '$Gross_Pay_Daily', 
                      '$Amount_Payable', '$Bank_Branch', '$Account_No', '$Period')";
     
             // Execute the query
             if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Data inserted successfully');location.replace('Gratuity.php');</script>";

             } else {
                 echo "Error: " . $sql . "<br>" . $conn->error;
             }
         }
     }
     
     
}
?>
