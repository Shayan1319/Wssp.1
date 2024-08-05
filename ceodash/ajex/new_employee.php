<?php
session_start();
error_reporting(0);
$currentDate = date('Y-m-d');
$emil = $_SESSION['EmployeeNumber'];
include('../link/desigene/db.php');
            $sql = "SELECT * FROM `employeedata` WHERE `Status` = 'NEW'";
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
                                <td><?php echo $row['CNIC'] ?></td>
                                <td><?php echo $row['father_Name'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['Employement_Group'] ?></td>
                                <td><?php echo $row['Grade'] ?></td>
                                <td><?php echo $row['Department'] ?></td>
                                <td><?php echo $row['Job_Tiltle'] ?></td>
                                <td><?php echo $row['Status'] ?></td>
                                <td><?php echo $row['Joining_Date'] ?></td>
                                <td><?php echo $row['Contract_Expiry_Date'] ?></td>
                                <td><a href="profile.php?updat=<?php echo $row ['EmployeeNo']?>"><i class="fa-solid fa-eye"></i></a></td>
                                <td><input  type="submit" data-acpt="<?php echo $row['Id'] ?>" class="btn btn-success text-white float-right shadow" value="Accept" id="Accept" name="Accept"></td>
                                <td><input type="submit" data-rejc="<?php echo $row['Id'] ?>" class="btn bg-danger text-white float-right shadow" value="Reject" id="Reject" name="Reject"></td>
                            </tr>
                        <?php
                    $a++;} }
                            ?>