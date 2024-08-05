<?php
session_start();
error_reporting(0);
$currentDate = date('Y-m-d');
$emil = $_SESSION['EmployeeNumber'];
include('../link/desigene/db.php');
            $sql = "SELECT * FROM employeedata AS e  INNER JOIN travelrequest AS t ON e.EmployeeNo = t.EmployeeNo WHERE t.Statusofmanger = 'ACCEPT' AND t.StatusofGM = 'PENDING'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $a=1;
                while($row=mysqli_fetch_array($result)){
                    
                    ?>
                            <tr>
                                <th scope="row"><?php echo $a?></th>
                                <td><?php echo $row['EmployeeNo'] ?></td>
                                <td><h5><?php echo $row['fName']?> <?php echo $row['lName']?></h5></td>
                                <td><?php echo $row['Job_Tiltle'] ?></td>
                                <td><?php echo $row['Employee_Class'] ?></td>
                                <td><?php echo $row['RequestDate'] ?></td>
                                <td><?php echo $row['FromCity'] ?></td>
                                <td><?php echo $row['ToCity'] ?></td>
                                <td><?php echo $row['DepartureOn'] ?></td>
                                <td><?php echo $row['ReturnDate'] ?></td>
                                <td><?php echo $row['Justification'] ?></td>
                                <td><input  type="submit" data-acpt="<?php echo $row['id'] ?>" class="btn btn-success text-white float-right shadow" value="Accept" id="Accept" name="Accept"></td>
                                <td><input type="submit" data-rejc="<?php echo $row['id'] ?>" class="btn bg-danger text-white float-right shadow" value="Reject" id="Reject" name="Reject"></td>
                            </tr>
                        <?php
                    $a=$a+1; } }
                            ?>