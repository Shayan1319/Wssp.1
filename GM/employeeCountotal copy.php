<?php
session_start();
error_reporting(0);

include('link/desigene/db.php');
if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber']) || $_SESSION['Designation'] != 'GM') {
    // Log the unauthorized access attempt for auditing purposes
    error_log("Unauthorized access attempt. User: {$_SESSION['loginid']}");
    
    // Redirect to the logout page
    header("Location: ../logout.php");
    exit; // Ensure that the script stops execution after the header redirection
  } else{
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('link/links.php') ?>
    <style>
        h4,
        h3 {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container-fluid m-auto p-0">
    <div id="main">
        <?php include('link/desigene/navbar.php') ?>
            <div class="row m-3">
                <div class="col-12">
                    <div class="accordion" id="accordionExample">
                        <?php
                        $select = mysqli_query($conn, 'SELECT * FROM `timeperiod` ORDER BY `timeperiod`.`ID` DESC ');
                        $a = 1;

                        while ($rowofTP = mysqli_fetch_array($select)) {
                            if (isset($_POST["submit" . $a])) {
                                $Status = $_POST['Status'];
                                $Ids = $_POST['Id'];
                                $Date = date('Y-m-d');  // Change 'Y-M-D' to 'Y-m-d'

                                foreach ($Ids as $key => $Id) {
                                    $salarySql = mysqli_query($conn, "UPDATE `salary` SET `ceo`='{$Status[$key]}', `ceodata`='$Date' WHERE `id`='$Id'");
                            
                                    if ($salarySql) {
                                        echo '<script>alert( "Data updated successfully");</script>';
                                        ?>
                                        <script>
                                          location.replace('employeeCountotal copy.php');
                                        </script>
                                        <?php 
                                    } else {
                                        echo '<script>alert( "Error updating data: ' . mysqli_error($conn) . '");</script>';
                                    }
                                }
                            }                            
                        ?>
                            <form action="" method="post">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading<?php echo $a ?>">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $a ?>" aria-expanded="true" aria-controls="collapse<?php echo $a ?>">
                                            Time Period # <?php echo $rowofTP['ID'] ?> | From: <?php echo $rowofTP['FromDate'] ?> | To: <?php echo $rowofTP['ToDate'] ?> | Working day: <?php echo $rowofTP['WrokingDays'] ?>

                                            <button type="submit" name="submit<?php echo $a ?>" class="btn btn-primary">Update Records</button>
                                        </button>
                                        
                                    </h2>
                                    <div id="collapse<?php echo $a ?>" class="accordion-collapse collapse show" aria-labelledby="heading<?php echo $a ?>" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="accordion table-responsive" id="employeeAccordion<?php echo $a ?>">
                                            <?php
                                                $Timeid = $rowofTP['ID'];
                                                $selectemp=mysqli_query($conn,"SELECT * FROM `employeedata`");
                                                while($rowemp=mysqli_fetch_array($selectemp)){
                                                    $employee= $rowemp['EmployeeNo'];
                                                    $employeeid= $rowemp['Id'];
                                                $selectmang = mysqli_query($conn, "SELECT * FROM `salary` WHERE `employee_id`='$employee' && `timeperiod`='$Timeid' && `HrReview`='ACCEPT' && `finace`='ACCEPT' && `InternalAuditor`='ACCEPT' && `ceo`='PENDING'");
                                                if(mysqli_num_rows($selectmang)>0){
                                                    ?>
                                                     <table class="table">
                                                        <thead style="background-color: darkblue;">
                                                            <tr>
                                                                <th scope="col" class="text-white">#</th>
                                                                <th scope="col" class="text-white">Employee No</th>
                                                                <th scope="col" class="text-white">Fund</th>
                                                                <th scope="col" class="text-white">Gross Pay</th>
                                                                <th scope="col" class="text-white">Deduction</th>
                                                                <th scope="col" class="text-white">Netpay</th>
                                                                <th scope="col" class="text-white">Jate</th>
                                                                <th scope="col" class="text-white">Joining Date</th>
                                                                <th scope="col" class="text-white">Job Title</th>
                                                                <th scope="col" class="text-white">Grade</th>
                                                                <th scope="col" class="text-white">Department</th>
                                                                <th scope="col" class="text-white">Class Group</th>
                                                                <th scope="col" class="text-white">Sub Group</th>
                                                                <th scope="col" class="text-white">Accept</th>
                                                                <th scope="col" class="text-white">Reject</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="table-data">
                                                        <!-- Populate this with actual data from your database -->
                                                    <?php
                                                    $m = 1;
                                                while ($rowomang = mysqli_fetch_array($selectmang)) {
                                                    ?>
                                                    <tr>
                                                      <td scope="col"><?php echo $m?></td>
                                                      <td scope="col"><?php echo $rowomang['employee_id'] ?></td>
                                                      <td scope="col"><?php echo $rowomang['fund'] ?></td>
                                                      <td scope="col"><?php echo $rowomang['gross_pay'] ?></td>
                                                      <td scope="col"><?php echo $rowomang['deduction'] ?></td>
                                                      <td scope="col"><?php echo $rowomang['net_pay'] ?></td>
                                                      <td scope="col"><?php echo $rowomang['date'] ?></td>
                                                      <td scope="col"><?php echo $rowomang['JoiningDate'] ?></td>
                                                      <td scope="col"><?php echo $rowomang['JobTitle'] ?></td>
                                                      <td scope="col"><?php echo $rowomang['Grade'] ?></td>
                                                      <td scope="col"><?php echo $rowomang['Department'] ?></td>
                                                      <td scope="col"><?php echo $rowomang['ClassGroup'] ?></td>
                                                      <td scope="col"><?php echo $rowomang['SubGroup'] ?></td>
                                                      <td>
                                                          <div class="form-check">
                                                              <input class="form-check-input" value="ACCEPT" type="radio" name="Status[<?php echo $rowomang['id'] ?>]" id="flexRadioDefaultAccept<?php echo $rowomang['id'] ?>" checked>
                                                              <label class="form-check-label" for="flexRadioDefaultAccept<?php echo $rowomang['id'] ?>">
                                                                  Accept
                                                              </label>
                                                          </div>
                                                      </td>
                                                      <td>
                                                          <input type="number" value="<?php echo $rowomang['id'] ?>" hidden name="Id[<?php echo $rowomang['id']?>]" id="">
                                                          <div class="form-check">
                                                              <input class="form-check-input" value="Reject" type="radio" name="Status[<?php echo $rowomang['id'] ?>]" id="flexRadioDefaultReject<?php echo $rowomang['id'] ?>">
                                                              <label class="form-check-label" for="flexRadioDefaultReject<?php echo $rowomang['id'] ?>">
                                                                  Reject
                                                              </label>
                                                          </div>
                                                      </td>
                                                          <div class="">
                                                              <table class="table table-striped  table-bordered border-dark table-responsive" >
                                                                  <thead class="table-light" >
                                                                      <tr>
                                                                          <th>Earnings</th>
                                                                          <th>Monthly</th>
                                                                          <th>Arrears</th>
                                                                          <th>Amount</th>
                                                                      </tr>
                                                                  </thead>
                                                                  <tbody>
                                                          <?php
                                                          $employee= $rowemp['EmployeeNo'];
                                                          $employeeid= $rowemp['Id'];
                                                          $payrol= mysqli_query($conn,"SELECT * FROM `payrole` WHERE `EmpNo`='$employeeid' && `timeperiod`='$Timeid'  AND `earning_deduction_fund` =' EARNING' ");
                                                          while($payrolerow=mysqli_fetch_array($payrol)){
                                                              ?>
                                                              <tr>
                                                                  <td><?php echo  $payrolerow["AllowancesName"] ?></td>
                                                                  <td><?php echo  $payrolerow["Rate"]?></td>
                                                                  <td><?php echo  $payrolerow["price"]?></td>
                                                                  <td><?php echo  $payrolerow["total"]?></td>
                                                              </tr>
                                                              <?php }?>
                                                                  </tbody>
                                                              </table>
                                                              <table class="table table-striped  table-bordered border-dark table-responsive" >
                                                                  <thead class="table-light" >
                                                                      <tr>
                                                                          <th>Deductiont</th>
                                                                          <th>Monthly</th>
                                                                          <th>Arrears</th>
                                                                          <th>Amount</th>
                                                                      </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                      <?php
                                                                  
                                                                      $payrolded= mysqli_query($conn,"SELECT * FROM `payrole` WHERE `EmpNo`='$employeeid' && `timeperiod`='$Timeid'  AND `earning_deduction_fund` =' DEDUCTION' ");
                                                                      while($payrolerowded=mysqli_fetch_array($payrolded)){
                                                                          ?>
                                                                          <tr>
                                                                              <td><?php echo  $payrolerowded["AllowancesName"] ?></td>
                                                                              <td><?php echo  $payrolerowded["Rate"]?></td>
                                                                              <td><?php echo  $payrolerowded["price"]?></td>
                                                                              <td><?php echo  $payrolerowded["total"]?></td>
                                                                          </tr>
                                                                          <?php }?>
                                                                  </tbody>
                                                              </table>
                                                          </div>
                                                    </tr>
                                                    <?php
                                                   $m++;
                                                
                                                
                                                }
                                                echo" </tbody>
                                                </table>";
                                            }}
                                                echo"<hr>";
                                                ?>
                                                       
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        <?php
                            $a++;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('link/desigene/script.php') ?>
</body>

</html>

<?php } ?>
