<?php
include('../link/desigene/db.php');
           
$sql = "SELECT tr.*, e.* FROM `child` AS tr 
        INNER JOIN `spouse` AS e ON tr.MouterCNIC = e.CNIC 
        LEFT JOIN `employeedata` AS emp ON e.employee_id = emp.CNIC
        WHERE tr.Status = 'PENDING'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
$a = 1;
while($row = mysqli_fetch_array($result)) {
?>
                            <tr>
                                <th scope="row"><?php echo $a?></th>
                                <td><?php echo $row['Name'] ?></td>
                                <td><?php echo $row['CNIC'] ?></td>
                                <td><?php echo $row['Date_of_B'] ?></td>
                                <td><?php echo $row['MouterCNIC'] ?></td>
                                <td><?php echo $row['Spouse_Name'] ?></td>
                                <td><?php echo $row['Gender'] ?></td>
                                <td><input  type="submit" data-acpt="<?php echo $row['id'] ?>" class="btn btn-success text-white float-right shadow" value="Accept" id="Accept" name="Accept"></td>
                                <td><input type="submit" data-rejc="<?php echo $row['id'] ?>" class="btn bg-danger text-white float-right shadow" value="Reject" id="Reject" name="Reject"></td>
                            </tr>
                        <?php
                    $a++;} }
                            ?>