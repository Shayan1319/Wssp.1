<?php
                    include('../link/desigene/db.php');
                    $sql = "SELECT * FROM `employeedataupdate`";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $a=1;
                          while($row=mysqli_fetch_array($result)){
                            ?>
                          <form method="post" enctype="multipart/form-data">
                            <tr>
                                <th scope="row"><?php echo $a?></th>
                                <td>
                                    <?php echo $row['EmployeeNoUpdate'] ?>
                                </td>
                                <td>
                                    <h5><?php echo $row['fNameUpdate']?> <?php echo $row['lNameUpdate']?></h5>
                                </td>
                                <td><?php echo $row['Job_TiltleUpdate'] ?></td>
                                <td><?php echo $row['CNICUpdate'] ?></td>
                                <td><?php echo $row['father_NameUpdate'] ?></td>
                                <td><?php echo $row['emailUpdate'] ?></td>
                                <td><?php echo $row['Employement_GroupUpdate'] ?></td>
                                <td><?php echo $row['GradeUpdate'] ?></td>
                                <td><?php echo $row['DepartmentUpdate'] ?></td>
                                <td><?php echo $row['Job_TiltleUpdate'] ?></td>
                                <td><?php echo $row['StatusUpdate'] ?></td>
                                <td><?php echo $row['Joining_DateUpdate'] ?></td>
                                <td><?php echo $row['Contract_Expiry_DateUpdate'] ?></td>
                                <td><a class="btn btn-success text-white float-right shadow" href="update_singil_data.php?id=<?php echo $row['Id']?>" >See</a></td>
                                <td>
                                  <input  type="submit" data-acpt="<?php echo $row['Id'] ?>" class="btn btn-success text-white float-right shadow" value="Accept" id="Accept">
                                </td>
                                <td>
                                  <input type="submit" data-rejc="<?php echo $row['Id'] ?>" class="btn bg-danger text-white float-right shadow" value="Reject" id="Reject"><input type="number" readonly hidden name="deletid" value="<?php echo $row['Id']?>" id="">
                                </td>
                            </tr>

                          </form>
                        <?php
                    $a++;} }
                            ?>