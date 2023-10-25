<?php
include('../link/desigene/db.php');
           
$sql = "SELECT tr.*, e.* FROM `promotion` AS tr 
INNER JOIN `employeedata` AS e ON tr.employee_id = e.CNIC 
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
                                <td><?php echo $row['From_Designation'] ?></td>
                                <td><?php echo $row['To_Designation'] ?></td>
                                <td><?php echo $row['From_BPS'] ?></td>
                                <td><?php echo $row['ToBps'] ?></td>
                                <td><?php echo $row['Promotion_Date'] ?></td>
                                <td><?php echo $row['Promotion_Number'] ?></td>
                                <td><?php echo $row['Department1'] ?></td>
                                <td><?php echo $row['Acting'] ?></td>
                                <td><?php echo $row['Remarks'] ?></td>
                                <td><a href="../CV/<?php echo $row['file']?>">Donload</a></td>
                                <td><input  type="submit" data-acpt="<?php echo $row['Id'] ?>" class="btn btn-success text-white float-right shadow" value="Accept" id="Accept" name="Accept"></td>
                                <td><input type="submit" data-rejc="<?php echo $row['Id'] ?>" class="btn bg-danger text-white float-right shadow" value="Reject" id="Reject" name="Reject"></td>
                            </tr>
                        <?php
                    $a++;} }
                            ?>