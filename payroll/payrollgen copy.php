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
        $$idsalery= $_POST['salaryid'];
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
            // Insert into salary table
            $salarySql = "UPDATE `salary` SET `fund`='{$fundInput[$e]}',`gross_pay`='{$grossPayInput[$e]}',`deduction`='{$deductionInput[$e]}',`net_pay`='{$netPayInput[$e]}',`date`='$date',`HrReview`='PENDING', `finace` = 'PENDING',`ceo`='PENDING' WHERE `id`='$idsalery'";
          
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
            $payrollSql = "UPDATE `payrole` SET `Rate`='$rateValue',`price`='$priceValue',`total`='$total',`Date`='$date' WHERE `Allownceid`='$allowanceId' && `EmpNo`='$employee_no'";
            if ($conn->query($payrollSql) === TRUE) {
              // Get the ID of the inserted salary record
             echo "Pay Update";
             ?>
        <script>
          location.replace('index.php');
        </script>
        <?php 
          } else {
              echo "Error Update salary: " . $conn->error;
          }
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
<style>
   

    .select2-selection__rendered {
      line-height: 31px !important;

    }

    .select2-container .select2-selection--single {
      height: 35px !important;
      border: 1px solid #ced4da;
      border-radius: 0px;
    }

    .select2-selection__arrow {
      height: 34px !important;

    }
  </style>
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
  function loadTable(){
    $.ajax({
      url : "ajex/time_employee_ajax copy.php",
      type : "POST",
    success : function(data){
    $("#time_employee_ajax") .html(data) ;
    }});
    }
    loadTable(); 
  $("#employee_noid").change(function() {
            var selectedEmployee = $(this).val();
            if (selectedEmployee) {
                // Scroll to the selected employee
                $('html, body').animate({
                    scrollTop: $(selectedEmployee).offset().top
                }, 1000);
            }
        });

  });

</script>
</body>
</html>

<?php } ?>