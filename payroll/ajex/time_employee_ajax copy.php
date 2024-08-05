<?php
include '../link/desigene/db.php';
$selecttime = mysqli_query($conn, "SELECT * FROM `timeperiod` ");
while ($rowtime = mysqli_fetch_array($selecttime)) {
    $fromdate = $rowtime['FromDate'];
    $todate = $rowtime['ToDate'];
    $workingdays = $rowtime['WrokingDays'];
    $timeid = $rowtime['ID'];

  $selery=mysqli_query($conn,"SELECT * FROM `salary` WHERE `timeperiod`='$timeid' AND (`HrReview`='PENDING' || `finace` = 'PENDING' || `ceo`='PENDING' || `InternalAuditor`='PENDING') ");
  $e = 1;

    while($rowsallery=mysqli_fetch_array($selery)){
      $emil=$rowsallery['employee_id'];

    $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `Status`='ON-DUTY' && `EmployeeNo`='$emil'");
    
    if (mysqli_num_rows($selectemp)) {
        while ($rowemp = mysqli_fetch_array($selectemp)) {
            $employee_id = $rowemp['EmployeeNo'];
            $employee_no = $rowemp['Id'];
                ?>
          <div id="emp<?php echo $rowemp['EmployeeNo']?>" style="display: block;" class="col-md-12">
            <div class="card card-success border border-2 border-dark bg-light">
              <div style="background-color: darkblue;" class="card-header text-white fw-bold">
                <div class="card-title text-white">Employee Details</div>
              </div>
              <br>
              
              <div class="card-body">
                  <br>
                <div class="row">
                  <!-- Name -->
                  <div class="col-4">
                    <div class="form-group">
                      <label>Name</label>
                      <input value="<?php echo $rowemp['fName']?> <?php echo $rowemp['mName']?> <?php echo $rowemp['lName']?>" type="text" name="empname[]" id="empname" readonly placeholder="Name" class="form-control" autocomplete="off" required="">
                      
                      <input type="number" value="<?php echo $e?>" name="empid[]" hidden id="">
                      <input type="number" value="<?php echo $rowsallery['id']?>" name="salaryid[]" hidden id="">
                    </div>
                  </div>
                  <!-- Father Name -->
                  <div class="col-4">
                    <div class="form-group">
                      <label>Father Name</label>
                      <input value="<?php echo $rowemp['father_Name']?>" type="text" name="father_name[]" id="father_name" placeholder="Father Name" class="form-control" readonly autocomplete="off" required="">
                    </div>
                  </div>
                  <!-- Type -->
                  <div class="col-4">
                    <div class="form-group">
                      <label>Type</label>
                      <input value="<?php echo $rowemp['type']?>" type="text" name="type[]" id="type" placeholder="Type" class="form-control" readonly autocomplete="off" required="">
                    </div>
                  </div>
                  <!-- Job Title -->
                  <div class="col-4">
                    <div class="form-group">
                      <label>Job Title</label>
                      <input value="<?php echo $rowemp['Job_Tiltle']?>" type="text" name="job_title[]" id="job_title" placeholder="Job Title" class="form-control" readonly autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4 d-none">
                    <div class="form-group">
                      <label>EmployeeNo</label>
                      <input value="<?php echo $rowemp['EmployeeNo']?>" type="text" name="EmployeeNo[]" id="EmployeeNo" placeholder="EmployeeNo" class="form-control" readonly autocomplete="off" required="">
                      <input hidden value="<?php echo $rowemp['CNIC']?>" type="number" name="CNIC[]" id="CNIC" placeholder="CNIC" class="form-control" readonly autocomplete="off" required="">
                      <input  hidden value="<?php echo $rowemp['Joining_Date']?>" type="date" name="Joining_Date[]" id="Joining_Date" placeholder="Joining_Date" class="form-control" readonly autocomplete="off" required="">
                      <input hidden value="<?php echo $rowemp['Grade']?>" type="text" name="Grade[]" id="Grade" placeholder="Grade" class="form-control" readonly autocomplete="off" required="">
                      <input hidden value="<?php echo $rowemp['Department']?>" type="text" name="Department[]" id="Department" placeholder="Department" class="form-control" readonly autocomplete="off" required="">
                      <input hidden value="<?php echo $rowemp['Pay_Type']?>" type="text" name="Pay_Type[]" id="Pay_Type" placeholder="Pay_Type" class="form-control" readonly autocomplete="off" required="">
                      <input hidden value="<?php echo $rowemp['Account_No']?>" type="text" name="Account_No[]" id="Account_No" placeholder="Account_No" class="form-control" readonly autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Employee_Group</label>
                      <input value="<?php echo $rowemp['Employee_Group']?>" type="text" name="Employee_Group[]" id="Employee_Group" placeholder="Employee_Group" class="form-control" readonly autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Employee_Class</label>
                      <input value="<?php echo $rowemp['Employee_Class']?>" type="text" name="Employee_Class[]" id="Employee_Class" placeholder="Employee_Class" class="form-control" readonly autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Employee_Sub_Group</label>
                      <input value="<?php echo $rowemp['Employee_Sub_Group']?>" type="text" name="Employee_Sub_Group[]" id="Employee_Sub_Group" placeholder="Employee_Sub_Group" class="form-control" readonly autocomplete="off" required="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Second Card: Employee Pay -->
            <div class="card card-success">
              <div class="card card-success border border-2 border-dark bg-light">
                <div style="background-color: darkblue;" class="card-header  text-white fw-bold">
                  <div class="card-title">Employee Pay</div>
                </div>
                <div class="card-body bg-light">
                  <div class="row">
                    <!-- Fund (Employer + Employee Contribution) -->
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Fund (Employer + Employee Contrib)</label>
                        <input class="form-control" type="text" name="fundInput[]" id="fundInput<?php echo $e?>">
                      </div>
                    </div>
                    <!-- Gross Pay -->
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Gross Pay</label>
                        <input class="form-control" type="text" name="grossPayInput[]" id="grossPayInput<?php echo $e?>">
                      </div>
                    </div>
                    <!-- Deduction -->
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Deduction</label>
                        <input class="form-control" type="text" name="deductionInput[]" id="deductionInput<?php echo $e?>">
                      </div>
                    </div>
                    <!-- Net Pay -->
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Net Pay</label>
                        <input class="form-control" type="text" name="netPayInput[]" id="netPayInput<?php echo $e?>" readonly>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card card-success">
              <div class="card card-success border border-2 border-dark bg-light">
                <div style="background-color: darkblue;" class="card-header  text-white fw-bold">
                  <div class="card-title">Earning/Deduction/Fund</div>
                </div>
                <div class="card-body bg-light">
                  <!-- Table for displaying added items -->
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
                      <table id="employee_pay<?php echo $e?>" class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                  <th>S.No</th>
                                  <th>Description</th>
                                  <th>Fin Classification</th>
                                  <th>Allowance Calc. Mode</th>
                                  <th>Earning/Deduction/Fund</th>
                                  <th>Rupees</th>
                                  <th>Rate</th>
                              </tr>
                          </thead>
                          <tbody id="allownces">
                              <?php
                              $description_id = $rowemp['Id'];
                              $query = mysqli_query($conn,"SELECT p.*, a.*, emp.*,edf.*,
                                  (SELECT COUNT(*) FROM atandece at WHERE at.Employeeid = emp.EmployeeNo AND at.DDorOT = 'DOUBLE DUTY' AND at.Date>= '$fromdate' AND at.Date <= '$todate') AS DoubleDutyCount, 
                                  (SELECT COUNT(*) FROM atandece ot WHERE ot.Employeeid = emp.EmployeeNo AND ot.DDorOT = 'OVERTIME' AND ot.Date>= '$fromdate' AND ot.Date <= '$todate') AS OvertimeCount, 
                                  (SELECT COUNT(*) FROM atandece abs WHERE abs.Employeeid = emp.EmployeeNo AND abs.status = 'ABSENT' AND abs.Date>= '$fromdate' AND abs.Date <= '$todate') AS AbsentCount
                              FROM payrole AS p
                              INNER JOIN allowances AS a ON p.AllowancesId = a.id
                              INNER JOIN employeedata AS emp ON emp.Id = p.EmpNo
                              INNER JOIN earning_deduction_fund AS edf ON emp.Id = edf.employee_id
                              WHERE a.allowance_status = 'ACTIVE' AND p.EmpNo = $description_id;");

                              if (mysqli_num_rows($query)) {
                                  $a = 1; // Initialize $a before the loop starts
                                  while ($fetchdata = mysqli_fetch_assoc($query)) {
                                      if ( $fetchdata['rate_calc_mode'] == 'RUNTIME VALUE') {
                                          $rateInput = 'block';
                                          $rateDis = 'none';
                                      } else if ( $fetchdata['rate_calc_mode'] == 'OFF PAY' && $fetchdata['Weekly_Working_Days']==6) {
                                          $rateInput = 'block';
                                          $rateDis = 'none';
                                          $netPayInput = $fetchdata['net_pay'];
                                            $price = $netPayInput / 26; 
                                          $rateInputvalue = $fetchdata['Rate'];
                                      }
                                      else if ( $fetchdata['rate_calc_mode'] == 'OFF PAY' && $fetchdata['Weekly_Working_Days']==5) {
                                        $rateInput = 'block';
                                        $rateDis = 'none';
                                        $netPayInput = $fetchdata['net_pay'];
                                          $price = $netPayInput / 22; 
                                        $rateInputvalue = $fetchdata['Rate'];
                                    } else if ( $fetchdata['rate_calc_mode'] == 'DOUBLE DUTY') {
                                          $rateInput = 'block';
                                          $rateDis = 'none';
                                          $rateInputvalue = $fetchdata['Rate'];
                                          $price = $fetchdata['price'];
                                      } else if ( $fetchdata['rate_calc_mode'] == 'OVERTIME') {
                                          $rateInput = 'block';
                                          $rateDis = 'none';
                                          $rateInputvalue = $fetchdata['Rate'];
                                          $price = $fetchdata['price'];
                                      } else {
                                          $rateInput = 'none';
                                          $rateDis = 'block';
                                          $rateInputvalue = $fetchdata['Rate'];
                                          $price = $fetchdata['price'];
                                      }
                          ?>
                                      <tr>
                                          <td><?php echo $a?></td>
                                          <td><?php echo $fetchdata['AllowancesName'] ?>
                                              <input style="display: none;" type="text" value="<?php echo $fetchdata['Allownceid']?>" name="allowances_id[]" id="allowances_id<?php echo $e?>">
                                              <input style="display: none;" type="text" value="<?php echo $fetchdata['AllowancesName']?>" name="allowance[]" id="allowance<?php echo $e?>">
                                              <input type="number" value="<?php echo $e?>" style="display: none;" name="allowanceIds" id="">
                                              <input type="number" value="<?php echo $fetchdata['Id']?>" name="employee_no[]" hidden id="">

                                          </td>
                                          <td>
                                              <?php echo $fetchdata['fin_classification'] ?>
                                              <input style="display: none;" type="text" value="<?php echo $fetchdata['fin_classification'] ?>" name="fin_classification[]" id="fin_classification<?php echo $e?>">
                                          </td>
                                          <td>
                                              <?php echo $fetchdata['rate_calc_mode'] ?>
                                              <input style="display: none;" type="text" value="<?php echo $fetchdata['rate_calc_mode'] ?>" name="rate_calc_mode[]" id="rate_calc_mode<?php echo $e?>">
                                          </td>
                                          <td>
                                              <?php echo $fetchdata['earning_deduction_fund'] ?>
                                              <input style="display: none;" type="text" value="<?php echo $fetchdata['earning_deduction_fund']?>" name="earning_deduction_fund[]" id="earning_deduction_fund<?php echo $e?>">
                                          </td>
                                          <td>
                                              <span style="display: <?php  echo $rateDis ?>;" id="rateDis">
                                                  <?php echo $rateInputvalue ?>
                                              </span>
                                              <input  type="text" value="<?php  echo $rateInputvalue ?>" style="display:<?php  echo $rateInput ?>;" name="rate[]" id="rate<?php echo $e?>">
                                          </td>
                                          <td>
                                              <?php echo round($price) ?>
                                              <input style="display: none;" type="text" value="<?php echo round($price) ?>" name="price[]" id="price<?php echo $e?>">
                                          </td>
                                      </tr>
                                    
                                      <?php
                                      $a++;
                                  }
                              }
                              ?>
                          </tbody>
                      </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
          <script>
                $(document).ready(function() {
                    function calculateGrossPay<?php echo $e;?>() {
                        var grossPay = 0;
                        var deductionInput = 0;
                        var fundInput = 0;
                        $('#employee_pay<?php echo $e;?> tbody tr').each(function() {
                            var Fin_Classification = $(this).find('#fin_classification<?php echo $e; ?>').val();
                            var earningDeductionFund = $(this).find('#earning_deduction_fund<?php echo $e; ?>').val();
                            var rateCalcMode = $(this).find('#rate_calc_mode<?php echo $e;?>').val();
                            var rate = parseFloat($(this).find('#rate<?php echo $e; ?>').val());
                            var price = parseFloat($(this).find('#price<?php echo $e; ?>').val());
                            var amount = rate * price;
                            if (rateCalcMode == 'PRESENT RATE' && earningDeductionFund == 'EARNING') {
                                grossPay += amount;
                            } 
                            else if (earningDeductionFund == "DEDUCTION" && rateCalcMode == "PRESENT RATE") {
                              deductionInput += amount;
                            }
                            else if (earningDeductionFund === "FUND" && Fin_Classification === "EOBI-ER") {
                              fundInput += amount;
                              grossPay -= amount;
                            }
                            else if (earningDeductionFund === "FUND" && rateCalcMode == "PRESENT RATE") {
                              fundInput += amount;
                            }else if(rateCalcMode=="OFF PAY" && earningDeductionFund=="DEDUCTION"){
                              grossPay -= amount;
                              deductionInput += amount;
                            }
                            else if(rateCalcMode=="OVERTIME" && earningDeductionFund=="EARNING"){
                              grossPay += amount;
                            }
                            else if(rateCalcMode=="DOUBLE DUTY" && earningDeductionFund=="EARNING"){
                              grossPay += amount;
                            }
                            else if(rateCalcMode=="RUNTIME VALUE"){
                              grossPay += amount;
                            }
                            else{
                              grossPay += amount;
                            }
                        });
                        $('#grossPayInput<?php echo $e;?>').val(grossPay.toFixed(2));
                        $('#deductionInput<?php echo $e;?>').val(deductionInput.toFixed(2));
                        $('#fundInput<?php echo $e;?>').val(fundInput.toFixed(2));
                        var netPay = grossPay - deductionInput + fundInput;
                        $('#netPayInput<?php echo $e;?>').val(netPay.toFixed(2));
                    }
                    calculateGrossPay<?php echo $e; ?>();
                    $('#employee_pay<?php echo $e; ?>').on('input', 'input', function() {
                        calculateGrossPay<?php echo $e; ?>();
                    });
                });
            </script>
          <?php
  }
  $e++; 
    }
  }
}
?>
