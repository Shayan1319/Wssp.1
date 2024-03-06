<?php
include('../link/desigene/db.php');
           
$sql = "SELECT tr.*, e.* FROM `qualification` AS tr 
INNER JOIN `employeedata` AS e ON tr.employee_id = e.EmployeeNo 
WHERE tr.Status = 'PENDING'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
$a = 1;
while($row = mysqli_fetch_array($result)) {
?>
                            <tr>
                                <th scope="row"><?php echo $a?></th>
                                <td><?php echo $row['EmployeeNo'] ?></td>
                                <td><h5><?php echo $row['fName']?> <?php echo $row['lName']?></h5></td>
                                <td><?php echo $row['Qualification'] ?></td>
                                <td><?php echo $row['Grade/Division'] ?></td>
                                <td><?php echo $row['Passing Year of Degree'] ?></td>
                                <td><?php echo $row['Last Institute'] ?></td>
                                <td><?php echo $row['PEC Registration'] ?></td>
                                <td><?php echo $row['Institute Address'] ?></td>
                                <td><?php echo $row['Major Subject'] ?></td>
                                <td><?php echo $row['Remarks'] ?></td>
                                <td><input  type="submit" data-acpt="<?php echo $row['Id'] ?>" class="btn btn-success text-white float-right shadow" value="Accept" id="Accept" name="Accept"></td>
                                <td><input type="submit" data-rejc="<?php echo $row['Id'] ?>" class="btn bg-danger text-white float-right shadow" value="Reject" id="Reject" name="Reject"></td>
                            </tr>
                        <?php
                    $a++;} }
                            ?>