<?php
session_start();
error_reporting(0);
// links to database
include('../link/desigene/db.php');

// Check if valid data is received
if ($_POST['employee_no'] > 0 && isset($_POST['frommonth']) && isset($_POST['tomunth'])) {
    $employee_no = $_POST['employee_no'];
    $frommonth = $_POST['frommonth'];
    $tomunth = $_POST['tomunth'];
    // Prepare the SQL statement with a parameterized query
    $selecttime = mysqli_query($conn, "SELECT * FROM `timeperiod` WHERE `FromDate` >= '$frommonth' AND `FromDate` <= '$tomunth' ORDER BY `ID` DESC ") or die(mysqli_error($conn));
    // Loop through the time periods
    while ($rowtime = mysqli_fetch_array($selecttime)) {
        $Timeid = $rowtime['ID'];
        // Fetch data for the given employee and time period
        $selectemp=mysqli_query($conn,"SELECT * FROM `employeedata` WHERE `EmployeeNo`='$employee_no'");
        while($empdata=mysqli_fetch_array($selectemp)){
            $empid=$empdata['Id'];
            $EmployeeNo=$empdata['EmployeeNo'];
        $stmt = mysqli_query($conn, "SELECT * FROM salary WHERE `timeperiod`= '$Timeid' AND `employee_id` = '$EmployeeNo'") or die(mysqli_error($conn));
        // Check if any data is fetched
        if (mysqli_num_rows($stmt) > 0) {
            $num = 1;
            // Loop through the fetched data
            while ($fetch = mysqli_fetch_array($stmt)) {
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
                // Fetch and display allowances dynamically
                $selected = mysqli_query($conn, "SELECT * FROM `allowances` WHERE `allowance_status`='ACTIVE'");
                while ($rowallowance = mysqli_fetch_array($selected)) {
                    $allowanceId=$rowallowance['id'];
                    $seletpayroll=mysqli_query($conn,"SELECT * FROM `payrole` WHERE `EmpNo`='$empid' AND `AllowancesId`='$allowanceId' AND `timeperiod`='$Timeid'");
                    if(mysqli_num_rows($seletpayroll)==0){
                        echo '<th></th>';
                    }else{
                        while($rowpayroll=mysqli_fetch_array($seletpayroll)){
                        echo '<th>'.$rowpayroll['total'].'</th>';
                        }
                    }

                }
                echo "<th>{$fetch['net_pay']}</th>";
                echo "</tr>";

                $num++;
            }
        } else {
            echo "<tr><td colspan='18'>No data found for the given criteria.</td></tr>";
        }
    }
} 
}

else if($_POST['employee_no']=="" &&isset($_POST['frommonth']) && isset($_POST['tomunth'])) {
    $frommonth = $_POST['frommonth'];
    $tomunth = $_POST['tomunth'];
     // Prepare the SQL statement with a parameterized query
     $selecttime = mysqli_query($conn, "SELECT * FROM `timeperiod` WHERE `FromDate` >= '$frommonth' AND `FromDate` <= '$tomunth' ORDER BY `ID` DESC ") or die(mysqli_error($conn));

     // Loop through the time periods
     while ($rowtime = mysqli_fetch_array($selecttime)) {
        $Timeid = $rowtime['ID'];
        // Fetch data for the given employee and time period
        $selectemp=mysqli_query($conn,"SELECT * FROM `employeedata`");
        while($empdata=mysqli_fetch_array($selectemp)){
            $empid=$empdata['Id'];
            $EmployeeNo=$empdata['EmployeeNo'];
        $stmt = mysqli_query($conn, "SELECT * FROM salary WHERE `timeperiod`= '$Timeid' AND `employee_id` = '$EmployeeNo'") or die(mysqli_error($conn));
        // Check if any data is fetched

            $num = 1;
            // Loop through the fetched data
            while ($fetch = mysqli_fetch_array($stmt)) {
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
                // Fetch and display allowances dynamically
                $selected = mysqli_query($conn, "SELECT * FROM `allowances` WHERE `allowance_status`='ACTIVE'");
                while ($rowallowance = mysqli_fetch_array($selected)) {
                    $allowanceId=$rowallowance['id'];
                    $seletpayroll=mysqli_query($conn,"SELECT * FROM `payrole` WHERE `EmpNo`='$empid' AND `AllowancesId`='$allowanceId' AND `timeperiod`='$Timeid'");
                    if(mysqli_num_rows($seletpayroll)==0){
                        echo '<th></th>';
                    }else{
                        while($rowpayroll=mysqli_fetch_array($seletpayroll)){
                        echo '<th>'.$rowpayroll['total'].'</th>';
                        }
                    }
                }
                echo "<th>{$fetch['net_pay']}</th>";
                echo "</tr>";
                $num++;
            }
    }
} 
}
// Close the statement and connection
$stmt->close();
$conn->close();
 ?>
