<?php
include('../link/desigene/db.php');

$employeeNo = isset($_POST['EmployeeNo']) ? $_POST['EmployeeNo'] : '';

if ($employeeNo != '') {
    $sql = "SELECT * FROM `employeedata` AS ed INNER JOIN earning_deduction_fund as edf ON edf.employee_id = ed.Id WHERE `employee_id` = '$employeeNo'";
} else {
    $sql = "SELECT * FROM `employeedata` AS ed INNER JOIN earning_deduction_fund as edf ON edf.employee_id = ed.Id";
}

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $a = 1;
    while ($row = mysqli_fetch_array($result)) {
        $empid = $row['Id'];
        ?>
        <tr>
            <th scope="row"><?php echo $a; ?></th>
            <td><?php echo $row['EmployeeNo']; ?></td>
            <td><h5><?php echo $row['fName']; ?> <?php echo $row['lName']; ?></h5></td>
            <td><?php echo $row['CNIC']; ?></td>
            <td><?php echo $row['mNumber']; ?></td>
            <td><?php echo $row['Job_Tiltle']; ?></td>
            <td><?php echo $row['father_Name']; ?></td>
            <td><?php echo $row['Employement_Group'];?></td>
            <td><?php echo $row['Employee_Class'];?></td>
            <td><?php echo $row['Employee_Group'];?></td>
            <td><?php echo $row['Employee_Sub_Group'];?></td>
            <td><?php echo $row['Salary_Bank'];?></td>
            <td><?php echo $row['Account_No'];?></td>
            <td><?php echo $row['Grade']; ?></td>
            <td><?php echo $row['Department'];?></td>
            <td><?php echo $row['Status'];?></td>
            <?php 
            $selected = mysqli_query($conn, "SELECT * FROM `allowances` WHERE `allowance_status`='ACTIVE'");
            while ($rowallowance = mysqli_fetch_array($selected)) {
                $allowanceId = $rowallowance['id'];
                
                $seletpayroll = mysqli_query($conn, "SELECT * FROM `rate` WHERE `employee_id`='$empid' AND `allowances_id`='$allowanceId'");
                if (mysqli_num_rows($seletpayroll) == 0) {
                    echo '<th></th>';
                } else {
                    while ($rowpayroll = mysqli_fetch_array($seletpayroll)) {
                        echo '<th>' . $rowpayroll['rate'] . '</th>';
                    }
                }
            }
            ?>
            <td><h5><?php echo $row['fund'];?></h5></td>
            <td><?php echo $row['gross_pay']; ?></td>
            <td><?php echo $row['deduction']; ?></td>
            <td><?php echo $row['net_pay']; ?></td>
            <td>
                <form action="../printpaysllip.php" method="POST" target="_blank">
                    <input type="hidden" value="<?php echo $row['Id']; ?>" name="empnumber" id="empnumber">
                    <button type="submit" name="submit" class="btn btn-success">PDF</button>
                </form>
            </td>
        </tr>
        <?php
        $a++;
    }
} else {
    echo "Data not exist";
}
?>
