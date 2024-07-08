<?php session_start();
error_reporting(0);
// links to database
include('../link/desigene/db.php');

// Check if valid data is received
$employee_no = $_POST['employee_no'];
$frommonth = $_POST['frommonth'];
$tomunth = $_POST['tomunth'];
$Employee_Sub_Group_drop = $_POST['Employee_Sub_Group_drop'];
$Salary_Branch = $_POST['Salary_Branch'];
$Department=$_POST['Department'];

$selecttime = mysqli_query($conn, "SELECT * FROM `timeperiod` WHERE `FromDate` >= '$frommonth' AND `FromDate` <= '$tomunth' ORDER BY `ID` DESC ") or die(mysqli_error($conn));

// Initialize the serial number
$num = 1;

// Loop through the time periods
while ($rowtime = mysqli_fetch_array($selecttime)) {
    $Timeid = $rowtime['ID'];
    if ($employee_no != "" && $Employee_Sub_Group_drop == "" && $Salary_Branch == "" && $Department == "") {
        $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `EmployeeNo`='$employee_no'");
    } else if ($employee_no != "" && $Employee_Sub_Group_drop != "" && $Salary_Branch == "" && $Department == "") {
        $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `EmployeeNo`='$employee_no' AND `Employee_Sub_Group`='$Employee_Sub_Group_drop'");
    } else if ($employee_no == "" && $Employee_Sub_Group_drop != "" && $Salary_Branch == "" && $Department == "") {
        $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `Employee_Sub_Group`='$Employee_Sub_Group_drop'");
    } else if ($employee_no != "" && $Employee_Sub_Group_drop == "" && $Salary_Branch != "" && $Department == "") {
        $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `EmployeeNo`='$employee_no' AND `Salary_Branch`='$Salary_Branch'");
    } else if ($employee_no != "" && $Employee_Sub_Group_drop != "" && $Salary_Branch != "" && $Department == "") {
        $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `EmployeeNo`='$employee_no' AND `Employee_Sub_Group`='$Employee_Sub_Group_drop' AND `Salary_Branch`='$Salary_Branch'");
    } else if ($employee_no == "" && $Employee_Sub_Group_drop != "" && $Salary_Branch != "" && $Department == "") {
        $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `Employee_Sub_Group`='$Employee_Sub_Group_drop' AND `Salary_Branch`='$Salary_Branch'");
    } else if ($employee_no == "" && $Employee_Sub_Group_drop == "" && $Salary_Branch != "" && $Department == "") {
        $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `Salary_Branch`='$Salary_Branch'");
    } else if ($employee_no != "" && $Employee_Sub_Group_drop == "" && $Salary_Branch == "" && $Department != "") {
        $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `EmployeeNo`='$employee_no' AND `Department`='$Department'");
    } else if ($employee_no != "" && $Employee_Sub_Group_drop != "" && $Salary_Branch == "" && $Department != "") {
        $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `EmployeeNo`='$employee_no' AND `Employee_Sub_Group`='$Employee_Sub_Group_drop' AND `Department`='$Department'");
    } else if ($employee_no == "" && $Employee_Sub_Group_drop != "" && $Salary_Branch == "" && $Department != "") {
        $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `Employee_Sub_Group`='$Employee_Sub_Group_drop' AND `Department`='$Department'");
    } else if ($employee_no != "" && $Employee_Sub_Group_drop == "" && $Salary_Branch != "" && $Department != "") {
        $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `EmployeeNo`='$employee_no' AND `Salary_Branch`='$Salary_Branch' AND `Department`='$Department'");
    } else if ($employee_no != "" && $Employee_Sub_Group_drop != "" && $Salary_Branch != "" && $Department != "") {
        $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `EmployeeNo`='$employee_no' AND `Employee_Sub_Group`='$Employee_Sub_Group_drop' AND `Salary_Branch`='$Salary_Branch' AND `Department`='$Department'");
    } else if ($employee_no == "" && $Employee_Sub_Group_drop != "" && $Salary_Branch != "" && $Department != "") {
        $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `Employee_Sub_Group`='$Employee_Sub_Group_drop' AND `Salary_Branch`='$Salary_Branch' AND `Department`='$Department'");
    } else if ($employee_no == "" && $Employee_Sub_Group_drop == "" && $Salary_Branch != "" && $Department != "") {
        $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `Salary_Branch`='$Salary_Branch' AND `Department`='$Department'");
    } else if ($employee_no == "" && $Employee_Sub_Group_drop == "" && $Salary_Branch == "" && $Department != "") {
        $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `Department`='$Department'");
    } else {
        $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata`");
    }
    
    

    while ($empdata = mysqli_fetch_array($selectemp)) {
        $empid = $empdata['Id'];
        $EmployeeNo = $empdata['EmployeeNo'];
        $stmt = mysqli_query($conn, "SELECT * FROM salary AS sal
        LEFT JOIN employeedata AS emp ON emp.EmployeeNo=sal.employee_id
        WHERE sal.timeperiod= '$Timeid' AND sal.employee_id = '$EmployeeNo'") or die(mysqli_error($conn));

        if (mysqli_num_rows($stmt) > 0) {
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
                echo "<th>{$fetch['SubGroup']}</th>";
                echo "<th>{$fetch['PaymentMode']}</th>";
                echo "<th>{$fetch['BankAccountNo']}</th>";

                $selected = mysqli_query($conn, "SELECT * FROM `allowances` WHERE `allowance_status`='ACTIVE'");
                while ($rowallowance = mysqli_fetch_array($selected)) {
                    $allowanceId = $rowallowance['id'];
                    $seletpayroll = mysqli_query($conn, "SELECT * FROM `payrole` WHERE `EmpNo`='$empid' AND `AllowancesId`='$allowanceId' AND `timeperiod`='$Timeid'");
                    if (mysqli_num_rows($seletpayroll) == 0) {
                        echo '<th></th>';
                    } else {
                        while ($rowpayroll = mysqli_fetch_array($seletpayroll)) {
                            echo '<th>' . $rowpayroll['total'] . '</th>';
                        }
                    }
                }

                echo "<th>{$fetch['net_pay']}</th>";
                echo "</tr>";

                // Increment the serial number
                $num++;
            }
        } else {
            echo "<tr><td colspan='18'>No data found for the given criteria.</td></tr>";
        }
    }
}
$stmt->close();
$conn->close();
?>
