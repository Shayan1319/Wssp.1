<?php
include('../link/desigene/db.php');
           
$sql = "SELECT tr.*, e.* FROM `training` AS tr 
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
                                <td><?php echo $row['Training_Serial_Number'] ?></td>
                                <td><?php echo $row['Training_Name'] ?></td>
                                <td><?php echo $row['Institute'] ?></td>
                                <td><?php echo $row['City'] ?></td>
                                <td><?php echo $row['Institute_Address'] ?></td>
                                <td><?php echo $row[' Oblige_Sponsor '] ?></td>
                                <td><?php echo $row['From'] ?></td>
                                <td><?php echo $row['To'] ?></td>
                                <td><?php echo $row['Duration'] ?></td>
                                <td><input  type="submit" data-acpt="<?php echo $row['Id'] ?>" class="btn btn-success text-white float-right shadow" value="Accept" id="Accept" name="Accept"></td>
                                <td><input type="submit" data-rejc="<?php echo $row['Id'] ?>" class="btn bg-danger text-white float-right shadow" value="Reject" id="Reject" name="Reject"></td>
                            </tr>
                        <?php
                    $a++;} }
                            ?>