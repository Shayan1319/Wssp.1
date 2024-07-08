<?php
include('../link/desigene/db.php');

$employeeNo = isset($_POST['EmployeeNo']) ? $_POST['EmployeeNo'] : '';

if ($employeeNo != '') {
    $sql = "SELECT * FROM `employeedata` WHERE `EmployeeNo` = '$employeeNo'";
} else {
    $sql = "SELECT * FROM `employeedata`";
}

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $a = 1;
    while ($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <th scope="row"><?php echo $a; ?></th>
            <td><?php echo $row['EmployeeNo']; ?></td>
            <td><h5><?php echo $row['fName']; ?> <?php echo $row['lName']; ?></h5></td>
            <td><?php echo $row['Job_Tiltle']; ?></td>
            <td><?php echo $row['CNIC']; ?></td>
            <td><?php echo $row['father_Name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['Employement_Group']; ?></td>
            <td><?php echo $row['Grade']; ?></td>
            <td><?php echo $row['Department']; ?></td>
            <td><?php echo $row['Status']; ?></td>
            <td><?php echo $row['Joining_Date']; ?></td>
            <td><?php echo $row['Contract_Expiry_Date']; ?></td>
            <td><a class="btn btn-success text-white float-right shadow" href="update_singil_data copy.php?id=<?php echo $row['Id']; ?>">See</a></td>
        </tr>
        <?php
        $a++;
    }
}
?>
