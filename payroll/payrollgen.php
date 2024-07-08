<?php
session_start();
error_reporting(0);
include('../link/desigene/db.php');

if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber']) || $_SESSION['Designation'] != 'Payroll manager') {
    error_log("Unauthorized access attempt. User: {$_SESSION['loginid']}");
    header("Location: ../logout.php");
    exit;
} else {
    if (isset($_POST['submit'])) {
        $EmployeeNo = $_POST['EmployeeNo'];
        $timeperiod = $_POST['timeperiod'];
        $empname = $_POST['empname'];
        $father_name = $_POST['father_name'];
        $type = $_POST['type'];
        $job_title = $_POST['job_title'];
        $CNIC = $_POST['CNIC'];
        $Joining_Date = $_POST['Joining_Date'];
        $Grade = $_POST['Grade'];
        $Department = $_POST['Department'];
        $Employee_Group = $_POST['Employee_Group'];
        $Employee_Class = $_POST['Employee_Class'];
        $Employee_Sub_Group = $_POST['Employee_Sub_Group'];
        $Pay_Type = $_POST['Pay_Type'];
        $Salary_Branch= $_POST['Salary_Branch'];
        $Account_No = $_POST['Account_No'];
        $fundInput = $_POST['fundInput'];
        $grossPayInput = $_POST['grossPayInput'];
        $deductionInput = $_POST['deductionInput'];
        $netPayInput = $_POST['netPayInput'];
        $date = date("Y-m-d");
        $employee_nos = $_POST["employee_no"];
        $allowancesIds = $_POST['allowances_id'];
        $allowances = $_POST['allowance'];
        $finClassification = $_POST['fin_classification'];
        $rateCalcMode = $_POST['rate_calc_mode'];
        $earningDeductionFund = $_POST['earning_deduction_fund'];
        $rates = $_POST['rate'];
        $prices = $_POST['price'];

        for ($e = 0; $e < count($empname); $e++) {
          $seletquery=mysqli_query($conn,"SELECT * FROM `salary` WHERE `employee_id`='{$EmployeeNo[$e]}' AND `timeperiod`='$timeperiod'");
          if(mysqli_num_rows($seletquery)){
            echo '<script>alert( "Data Already Exist");</script>';
          }else{
            // Insert into salary table
            $salarySql = "INSERT INTO `salary`(`employee_id`, `fund`, `gross_pay`, `deduction`, `net_pay`, `date`, `EmpName`, `EmpFatherName`, `EmpCNIC`, `JoiningDate`, `JobTitle`, `Grade`, `EmploymentType`, `Department`, `ClassGroup`, `SubGroup`, `PaymentMode`, `Bank`, `BankAccountNo`,`timeperiod`) 
                    VALUES ('{$EmployeeNo[$e]}','{$fundInput[$e]}','{$grossPayInput[$e]}','{$deductionInput[$e]}','{$netPayInput[$e]}','$date','{$empname[$e]}','{$father_name[$e]}','{$CNIC[$e]}','{$Joining_Date[$e]}','{$job_title[$e]}','{$Grade[$e]}','{$type[$e]}','{$Department[$e]}','{$Employee_Group[$e]} {$Employee_Class[$e]}','{$Employee_Sub_Group[$e]}','{$Pay_Type[$e]}',{$Salary_Branch[$e]},'{$Account_No[$e]}','$timeperiod')";
          }
            if ($conn->query($salarySql) === TRUE) {
            } else {
              echo '<script>alert( "Data not inserted success fully");</script>';
                echo "Error inserting salary: " . $conn->error;
            }
        }
        for ($i = 0; $i < count($allowancesIds); $i++) {
            $employee_no = $employee_nos[$i];
            $allowanceId = $allowancesIds[$i];
            $allowance = $allowances[$i];
            $finClassificationValue = $finClassification[$i];
            $rateCalcModeValue = $rateCalcMode[$i];
            $earningDeductionFundValue = $earningDeductionFund[$i];
            $rateValue = $rates[$i];
            $priceValue = $prices[$i];
            $total = $priceValue * $rateValue;
            $seletqueryallawnce=mysqli_query($conn,"SELECT * FROM `payrole` WHERE `EmpNo`='$employee_no' AND `timeperiod`='$timeperiod' AND `AllowancesId` ='$allowanceId'");
            if(mysqli_num_rows($seletqueryallawnce)){
              echo '<script>alert( "Allawnce Already Exist");</script>';
            }else{
            $payrollSql = "INSERT INTO `payrole`(`EmpNo`, `AllowancesName`, `AllowancesId`, `fin_classification`, `rate_calc_mode`, `earning_deduction_fund`, `Rate`, `price`, `total`, `Date`, `timeperiod`) VALUES ('$employee_no','$allowance','$allowanceId','$finClassificationValue','$rateCalcModeValue',' $earningDeductionFundValue','$rateValue','$priceValue','$total','$date','$timeperiod')";
            if ($conn->query($payrollSql) === TRUE) {
              // Get the ID of the inserted salary record
             echo "Pay inserteedd";
             ?>
        <script>
          location.replace('index.php');
        </script>
        <?php 
          } else {
              echo "Error inserting salary: " . $conn->error;
          }}
        }
        
      }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  include('link/links.php');
  ?>
  <link rel="stylesheet" href="path/to/select2.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="path/to/select2.min.js"></script>
</head>
<body>
  <div id="main">
    <?php include('link/desigene/navbar.php'); ?>
    <div class="clearfix">&nbsp;</div>
    <div style="width: fit-content; position: fixed; right: 10px; bottom:30pv; z-index: 999; bottom:30px;" class="form-group text-end mt-4">
        <a href="#header" style="background-color: darkblue;" class="btn btn-primary rounded-circle"><i class="fa-regular fa-circle-up"></i></a>
    </div>
    <div class="container-fluid">
      <form method="POST">
        <div class="row">
            <div class="col-md-12">
              <div class="form-group text-end mt-4">
                <button type="submit" id="submit" name="submit" style="background-color: darkblue;" class="btn btn-primary">Save</button>
              </div> 
            </div>
           <div class="col-md-6 my-4">
                <div class="form-group">
                    <label>Time Period</label>
                    <select name="timeperiod" required id="time_period" class="form-control select2">
                    </select>
                </div>
            </div>
           
            <div class="col-md-4 my-4">
                <div class="form-group">
                    <label>Employee No</label>
                    <select name="employee_noid" id="employee_noid" class="form-control select2">
                        <?php
                        $selectempdata = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `Status` = 'ON-DUTY'");
                        if (mysqli_num_rows($selectempdata) > 0) {
                            echo '<option value="#employee_noid" class="employee-option" selected>Search</option>';
                            while ($rowempdata = mysqli_fetch_assoc($selectempdata)) {
                                echo '<option value="#emp' . $rowempdata['EmployeeNo'] . '" class="employee-option">' . $rowempdata['EmployeeNo'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
                        
              <div id="time_employee_ajax" class="col-12">
              
              </div>
        </div>
      </form>
    </div>
  </div>
<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  $("#employee_noid").change(function() {
            var selectedEmployee = $(this).val();
            if (selectedEmployee) {
                // Scroll to the selected employee
                $('html, body').animate({
                    scrollTop: $(selectedEmployee).offset().top
                }, 1000);
            }
        });
$("#time_period").change(function() {
      var time_period = $(this).val();
      // alert(time_period);
      $.ajax({
        url: "ajex/time_employee_ajax.php",
        type: "GET",
        data: {"id": time_period},
        success: function(data) {
          $("#time_employee_ajax") .html(data) ;
        }
      });
    });
    function loadTabletime(){
    $.ajax({
      url : "ajex/timeperiod.php",
      type : "POST",
    success : function(data){
    $("#time_period") .html(data) ;
    }});
    }
    loadTabletime(); 
  });

</script>
</body>
</html>
<?php } ?>