<?php
    session_start();
    error_reporting(0);
    $currentDate = date('Y-m-d');
    $emil = $_SESSION['EmployeeNumber'];
    include('../link/desigene/db.php');
            $sql = "SELECT * FROM employeedata AS e  
            INNER JOIN tabill AS t ON e.EmployeeNo = t.EmployeeNo
            INNER JOIN travelrequest AS tr ON t.RequestNoTravel=tr.RequestNo
            WHERE tr.Statusofmanger = 'ACCEPT' AND tr.StatusofGM = 'ACCEPT' AND t.Statusofmanger = 'ACCEPT' AND t.StatusofGM = 'REJECTED' AND t.DateofApply >= '$currentDate'";
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
                                <td><?php echo $row['RequestNoTravel'] ?></td>
                                <td><?php echo $row['TravelAllowance'] ?></td>
                                <td><?php echo $row['DailyAllowance'] ?></td>
                                <td><?php echo $row['NightAllowance'] ?></td>
                                <td><?php echo $row['BillStatus'] ?></td>
                                <td><?php echo $row['DateofApply'] ?></td>
                                <td><input  type="submit" data-acpt="<?php echo $row['TAid'] ?>" class="btn btn-success text-white float-right shadow" value="Accept" id="Accept" name="Accept"></td>
                            </tr>
                        <?php
                    $a=$a+1; } }
                            ?>