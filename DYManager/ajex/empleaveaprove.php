<?php
session_start();
error_reporting(0);
$currentDate = date('Y-m-d');
$emil = $_SESSION['EmployeeNumber'];
include('../link/desigene/db.php');
            $sql = "SELECT * FROM employeedata AS e INNER JOIN leavereq AS l ON e.EmployeeNo = l.EmployeeNo WHERE l.Statusofmanger = 'ACCEPT' AND l.LeaveFrom >= '$currentDate' AND e.DY_Supervisor = $emil";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row=mysqli_fetch_array($result)){
                    $a=1;
                    ?>
                            <tr>
                                <th scope="row"><?php echo $a?></th>
                                <td><?php echo $row['EmployeeNo'] ?></td>
                                <td><h5><?php echo $row['fName']?> <?php echo $row['lName']?></h5></td>
                                <td><?php echo $row['Job_Tiltle'] ?></td>
                                <td><?php echo $row['Employee_Class'] ?></td>
                                <td><?php echo $row['PhoneNumberOnLeave'] ?></td>
                                <td><?php echo $row['LeaveType'] ?></td>
                                <td><?php echo $row['LeaveFrom'] ?></td>
                                <td><?php echo $row['LeaveTo'] ?></td>
                                <td><?php echo $row['TotalDays'] ?></td>
                                <td><?php echo $row['LeaveAvailed'] ?></td>
                                <td><input type="submit" data-rejc="<?php echo $row['Id'] ?>" class="btn bg-danger text-white float-right shadow" value="Reject" id="Reject" name="Reject"></td>
                            </tr>
                        <?php
                    $a++;} }
                            ?>