<?php
include ('../link/desigene/db.php');

$employeeId = $_POST['employeeId'];

if ($employeeId != "") {
    $query = mysqli_query($conn, "SELECT l.CNIC, l.EmployeeNo, l.Employee_Group, l.Joining_Date, l.fName, l.mName, l.lName, e.Leaving_Date, e.Id, e.Reason_of_Leaving, e.Approved_CEO FROM employee_exit AS e INNER JOIN employeedata AS l ON e.Employee_id = l.EmployeeNo WHERE e.Handover_File IS NOT NULL AND e.Handover_File_Remarks IS NOT NULL AND e.Handover_Info IS NOT NULL AND e.Handover_Info_Remarks IS NOT NULL AND e.Capital_Equipment IS NOT NULL AND e.Capital_Remarks IS NOT NULL AND e.HOD_Other IS NOT NULL AND e.HOD_Remarks IS NOT NULL AND e.HOD_Approved_Date IS NOT NULL AND e.Employee_id = '$employeeId'");
} else {
    $query = mysqli_query($conn, "SELECT l.CNIC, l.EmployeeNo, l.Employee_Group, l.Joining_Date, l.fName, l.mName, l.lName, e.Leaving_Date, e.Id, e.Reason_of_Leaving, e.Approved_CEO FROM employee_exit AS e INNER JOIN employeedata AS l ON e.Employee_id = l.EmployeeNo WHERE e.Handover_File IS NOT NULL AND e.Handover_File_Remarks IS NOT NULL AND e.Handover_Info IS NOT NULL AND e.Handover_Info_Remarks IS NOT NULL AND e.Capital_Equipment IS NOT NULL AND e.Capital_Remarks IS NOT NULL AND e.HOD_Other IS NOT NULL AND e.HOD_Remarks IS NOT NULL AND e.HOD_Approved_Date IS NOT NULL");
}

$num = 1;
while ($row = mysqli_fetch_array($query)) {
    if ($row['Approved_CEO'] == 'ACCEPT') {
        $colorReject = "red";
        $colorAccept = "green";
    } else if ($row['Approved_CEO'] == 'REJECT') {
        $colorReject = "green";
        $colorAccept = "red";
    } else {
        $colorReject = "yellow";
        $colorAccept = "yellow";
    }
?>
    <tr>
        <th scope="row"><?php echo $num ?></th>
        <td><h4><?php echo $row['fName'] ?> <?php echo $row['mName'] ?> <?php echo $row['lName'] ?></h4></td>
        <td><?php echo $row['CNIC'] ?></td>
        <td><?php echo $row['EmployeeNo'] ?></td>
        <td><?php echo $row['Employee_Group'] ?></td>
        <td><?php echo $row['Reason_of_Leaving'] ?></td>
        <td><?php echo $row['Joining_Date'] ?></td>
        <td><?php echo $row['Leaving_Date'] ?></td>
        <td><a href="ecitclearance copy.php?id=<?php echo $row['Id'] ?>"><i class="fa-solid fa-check"></i><i class="fa-solid fa-person-walking-arrow-right"></i></a></td>
        <td><button type="button" id="Accept" style="background-color: <?php echo $colorAccept ?> !important;" data-accept="<?php echo $row['Id'] ?>" class="btn text-white">Accept</button></td>
        <td><button type="button" id="Reject" style="background-color: <?php echo $colorReject ?> !important;" data-reject="<?php echo $row['Id'] ?>" class="btn text-white">Reject</button></td>
    </tr>
<?php
    $num++;
}
?>
