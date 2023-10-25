<?php
include('../link/desigene/db.php');
           
$sql = "SELECT tr.*, e.* FROM `transfer` AS tr 
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
                                <td><?php echo $row['Transfer_Order_Number'] ?></td>
                                <td><?php echo $row['Designation'] ?></td>
                                <td><?php echo $row['BPS'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['From_Department'] ?></td>
                                <td><?php echo $row['To_Project'] ?></td>
                                <td><?php echo $row['To_Station'] ?></td>
                                <td><?php echo $row['Worked_From'] ?></td>
                                <td><?php echo $row['Transfer_Date'] ?></td>
                                <td><a href="../CV/<?php echo $row['file']?>">Donload</a></td>
                                <td><input  type="submit" data-acpt="<?php echo $row['id'] ?>" class="btn btn-success text-white float-right shadow" value="Accept" id="Accept" name="Accept"></td>
                                <td><input type="submit" data-rejc="<?php echo $row['id'] ?>" class="btn bg-danger text-white float-right shadow" value="Reject" id="Reject" name="Reject"></td>
                            </tr>
                        <?php
                    $a++;} }
                            ?>