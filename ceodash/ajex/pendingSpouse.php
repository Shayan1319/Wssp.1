<?php
include('../link/desigene/db.php');
           
$sql = "SELECT tr.*, e.* FROM `spouse` AS tr 
INNER JOIN `employeedata` AS e ON tr.employee_id = e.EmployeeNo 
WHERE tr.Status = 'PENDING'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
$a = 1;
while($row = mysqli_fetch_array($result)) {
?>
                           <tr>
          <th scope="row"><?php echo $a?></th>
          <td><?php echo $row ['Spouse_Name'] ?></td>
          <td><?php echo $row ['CNIC'] ?></td>
          <td><?php echo date('d-m-Y', strtotime($see['Date_of_B'])); ?></td>
          
      <td><?php echo $row ['Father_name'] ?></td>
      <td><?php echo $row ['type'] ?></td>
          </tr>
                        <?php
                    $a++;} }
                            ?>