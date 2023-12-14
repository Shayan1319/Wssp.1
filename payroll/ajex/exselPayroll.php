<?php
session_start();
error_reporting(0);
// links to database
include('../link/desigene/db.php');
if(isset($_POST['submit'])){ 
$employee_no = $_POST['employee_no'];
$frommonth = $_POST['frommonth'];
$tomunth = $_POST['tomunth'];
if($employee_no>0) {
    $html.= '
    <table  class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>S.No</th>
            <th>Emp. No	</th>
            <th>Emp. Name</th>
            <th>Emp. Father Name</th>
            <th>Emp. CNIC</th>
            <th>Joining Date</th>
            <th>Job Title</th>
            <th>Grade</th>
            <th>Employment Type</th>
            <th>Department</th>
            <th>Class</th>
            <th>Group</th>
            <th>Sub-Group</th>
            <th>Payment Mode</th>
            <th>Bank Account No.</th>
            ';
            $selected=mysqli_query($conn,"SELECT * FROM `allowances` WHERE `allowance_status`='ACTIVE'");
            while($rowallownce=mysqli_fetch_array($selected)){
                $html.= '<th>'.$rowallownce['allowance'].'</th>';
            }
            $html.= '<th>Total</th>
        </tr>
    </thead>
    <tbody>
    ';
    $selecttime = mysqli_query($conn, "SELECT * FROM `timeperiod` WHERE `FromDate` >= '$frommonth' AND `FromDate` <= '$tomunth' ORDER BY `ID` DESC ") or die(mysqli_error($conn));
    // Loop through the time periods
    while ($rowtime = mysqli_fetch_array($selecttime)) {
        $Timeid = $rowtime['ID'];
        // Fetch data for the given employee and time period
        $selectemp=mysqli_query($conn,"SELECT * FROM `employeedata` WHERE `EmployeeNo`='$employee_no'");
        while($empdata=mysqli_fetch_array($selectemp)){
            $empid=$empdata['Id'];
            $EmployeeNo=$empdata['EmployeeNo'];
        $stmt = mysqli_query($conn, "SELECT * FROM salary WHERE `timeperiod`= '$Timeid' AND `employee_id` = '$EmployeeNo'  && `HrReview`='ACCEPT' && `finace`='ACCEPT' && `ceo`='ACCEPT'") or die(mysqli_error($conn));
        // Check if any data is fetched
        if (mysqli_num_rows($stmt) > 0) {
            $num = 1;
            // Loop through the fetched data
            while ($fetch = mysqli_fetch_array($stmt)) {
    $html.= "<tr>
                <td>{$num}</td>
                <td>{$fetch['employee_id']}</td>
                <td>{$fetch['EmpName']}</td>
                <td>{$fetch['EmpFatderName']}</td>
                <td>{$fetch['EmpCNIC']}</td>
                <td>{$fetch['JoiningDate']}</td>
                <td>{$fetch['JobTitle']}</td>
                <td>{$fetch['Grade']}</td>
                <td>{$fetch['EmploymentType']}</td>
                <td>{$fetch['Department']}</td>
                <td>{$fetch['ClassGroup']}</td>
                <td>{$fetch['ClassGroup']}</td>
                <td>{$fetch['SubGroup']}</td>
                <td>{$fetch['PaymentMode']}</td>
                <td>{$fetch['BankAccountNo']}</td>";
                $selected = mysqli_query($conn, "SELECT * FROM `allowances` WHERE `allowance_status`='ACTIVE'");
                while ($rowallowance = mysqli_fetch_array($selected)) {
                    $allowanceId=$rowallowance['id'];
                    $seletpayroll=mysqli_query($conn,"SELECT * FROM `payrole` WHERE `EmpNo`='$empid' AND `AllowancesId`='$allowanceId' AND `timeperiod`='$Timeid'");
                    if(mysqli_num_rows($seletpayroll)==0){
                        $html.= '<td></td>';
                    }else{
                        while($rowpayroll=mysqli_fetch_array($seletpayroll)){
                            $html.= '<td>'.$rowpayroll['total'].'</td>';
                        }
                    }
                }
                $html.= "
                <td>{$fetch['net_pay']}</td>";
    // Fetch allowances data from the database
    $html.= "</tr>";
    $num++;
}
$html.=" </tbody>
    </table>";
 header("Content-Type: application/vnd.ms-excel");
 header("Content-Disposition: attachment; filename=Payroll.xls");
echo $html;
}
}
}
   }

else if($employee_no=="") {
   
    $html.= '
    <table  class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>S.No</th>
            <th>Emp. No	</th>
            <th>Emp. Name</th>
            <th>Emp. Father Name</th>
            <th>Emp. CNIC</th>
            <th>Joining Date</th>
            <th>Job Title</th>
            <th>Grade</th>
            <th>Employment Type</th>
            <th>Department</th>
            <th>Class</th>
            <th>Group</th>
            <th>Sub-Group</th>
            <th>Payment Mode</th>
            <th>Bank Account No.</th>
            ';
            $selected=mysqli_query($conn,"SELECT * FROM `allowances` WHERE `allowance_status`='ACTIVE'");
            while($rowallownce=mysqli_fetch_array($selected)){
                $html.= '<th>'.$rowallownce['allowance'].'</th>';
            }
            $html.= '<th>Total</th>
        </tr>
    </thead>
    <tbody>
    ';
    $selecttime = mysqli_query($conn, "SELECT * FROM `timeperiod` WHERE `FromDate` >= '$frommonth' AND `FromDate` <= '$tomunth' ORDER BY `ID` DESC ") or die(mysqli_error($conn));
    // Loop through the time periods
    while ($rowtime = mysqli_fetch_array($selecttime)) {
        $Timeid = $rowtime['ID'];
        // Fetch data for the given employee and time period
        $selectemp=mysqli_query($conn,"SELECT * FROM `employeedata`");
        while($empdata=mysqli_fetch_array($selectemp)){
            $empid=$empdata['Id'];
            $EmployeeNo=$empdata['EmployeeNo'];
        $stmt = mysqli_query($conn, "SELECT * FROM salary WHERE `timeperiod`= '$Timeid' AND `employee_id` = '$EmployeeNo'  && `HrReview`='ACCEPT' && `finace`='ACCEPT' && `ceo`='ACCEPT'") or die(mysqli_error($conn));
        // Check if any data is fetched
        if (mysqli_num_rows($stmt) > 0) {
            $num = 1;
            // Loop through the fetched data
            while ($fetch = mysqli_fetch_array($stmt)) {
    $html.= "<tr>
                <td>{$num}</td>
                <td>{$fetch['employee_id']}</td>
                <td>{$fetch['EmpName']}</td>
                <td>{$fetch['EmpFatderName']}</td>
                <td>{$fetch['EmpCNIC']}</td>
                <td>{$fetch['JoiningDate']}</td>
                <td>{$fetch['JobTitle']}</td>
                <td>{$fetch['Grade']}</td>
                <td>{$fetch['EmploymentType']}</td>
                <td>{$fetch['Department']}</td>
                <td>{$fetch['ClassGroup']}</td>
                <td>{$fetch['ClassGroup']}</td>
                <td>{$fetch['SubGroup']}</td>
                <td>{$fetch['PaymentMode']}</td>
                <td>{$fetch['BankAccountNo']}</td>";
                $selected = mysqli_query($conn, "SELECT * FROM `allowances` WHERE `allowance_status`='ACTIVE'");
                while ($rowallowance = mysqli_fetch_array($selected)) {
                    $allowanceId=$rowallowance['id'];
                    $seletpayroll=mysqli_query($conn,"SELECT * FROM `payrole` WHERE `EmpNo`='$empid' AND `AllowancesId`='$allowanceId' AND `timeperiod`='$Timeid'");
                    if(mysqli_num_rows($seletpayroll)==0){
                        $html.= '<td></td>';
                    }else{
                        while($rowpayroll=mysqli_fetch_array($seletpayroll)){
                            $html.= '<td>'.$rowpayroll['total'].'</td>';
                        }
                    }
                }
                $html.= "
                <td>{$fetch['net_pay']}</td>";
    // Fetch allowances data from the database
    $html.= "</tr>";
    $num++;
}
$html.=" </tbody>
    </table>";
 header("Content-Type: application/vnd.ms-excel");
 header("Content-Disposition: attachment; filename=Payroll.xls");
echo $html;
}
}
}
}}
// Close the statement and connection
$stmt->close();
$conn->close();
?>
