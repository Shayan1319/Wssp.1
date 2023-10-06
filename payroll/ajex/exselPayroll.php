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
  
    $html= '
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
        
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
';
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
                <td>{$fetch['BankAccountNo']}</td>
                <td>{$fetch['net_pay']}</td>";
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
            $html.="<td>".$row['AllowancesName']." : ".$row['Rate']."</td>";
        }
        else{
            $html.="<td>NULL</td>";
        }
    //    }
    }

    $html.="</tr>";
   

    $num++;
}
$html.=" </tbody>
    </table>";
     header("Content-Type: application/vnd.ms-excel");
     header("Content-Disposition: attachment; filename=Payroll.xls");
echo $html;
}

else if($employee_no=="") {
   
    $html= '
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
        
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
    ';
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
                <td>{$fetch['BankAccountNo']}</td>
                <td>{$fetch['net_pay']}</td>";
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
            $html.= "<td>".$row['AllowancesName']." : ".$row['Rate']."</td>";
        }
        else{
            $html.= "<td>NULL</td>";
        }
    //    }
    }

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
// Close the statement and connection
$stmt->close();
$conn->close();
?>
