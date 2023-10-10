<?php
session_start();
error_reporting(0);
// links to database
include('../link/desigene/db.php');
if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber']) || $_SESSION['Designation'] != 'Payroll manager') {
  // Log the unauthorized access attempt for auditing purposes
  error_log("Unauthorized access attempt. User: {$_SESSION['loginid']}");
  
  // Redirect to the logout page
  header("Location: ../logout.php");
  exit; // Ensure that the script stops execution after the header redirection
} else{
if (isset($_POST['submit'])) {
  $employee_no=$_POST['employee_no'];
  $EmployeeNo=$_POST['EmployeeNo'];
  $empname=$_POST['empname'];
  $father_name=$_POST['father_name'];
  $type=$_POST['type'];
  $job_title=$_POST['job_title'];
  $CNIC=$_POST['CNIC'];
  $Joining_Date=$_POST['Joining_Date'];
  $Grade=$_POST['Grade'];
  $Department=$_POST['Department'];
  $Employee_Group=$_POST['Employee_Group'];
  $Employee_Class=$_POST['Employee_Class'];
  $Employee_Sub_Group=$_POST['Employee_Sub_Group'];
  $Pay_Type=$_POST['Pay_Type'];
  $Account_No=$_POST['Account_No'];
  $fundInput = $_POST['fundInput'];
  $grossPay = $_POST['grossPayInput'];
  $deductionInput = $_POST['deductionInput'];
  $netPayInput = $_POST['netPayInput'];
  $date= date("Y-m-d");
  $allowances_id=$_POST['allowances_id'];
  $allowance=$_POST['allowance'];
  $fin_classification=$_POST['fin_classification'];
  $rate_calc_mode=$_POST['rate_calc_mode'];
  $earning_deduction_fund=$_POST['earning_deduction_fund'];
  $rate=$_POST['rate'];
  $price=$_POST['price'];
  $total=$_POST['total'];
  $allowanceIds=$_POST['allowanceIds'];

//   try {
//     $con->beginTransaction();

    $Insert = "INSERT INTO `salary`( `employee_id`, `fund`, `gross_pay`, `deduction`, `net_pay`, `date`, `EmpName`, `EmpFatherName`, `EmpCNIC`, `JoiningDate`, `JobTitle`, `Grade`, `EmploymentType`, `Department`, `ClassGroup`, `SubGroup`, `PaymentMode`, `BankAccountNo`) VALUES ('$EmployeeNo','$fundInput','$grossPay','$deductionInput','$netPayInput','$date','$empname','$father_name','$CNIC','$Joining_Date','$job_title','$Grade','$type','$Department','$Employee_Class','$Employee_Sub_Group','$Pay_Type','$Account_No')";
//     $stmt = $con->prepare($query);
//     $stmt->execute();

    if (isset($allowanceIds) && is_array($allowanceIds) && count($allowanceIds) > 0) {
      $size = sizeof($allowanceIds);
      for ($i = 0; $i < $size; $i++) {
        $currentAllowanceId = $allowances_id[$i];
        $currentrateId = $rate[$i];
        $allowancearray=$allowance[$i];
        $fin_classificationarray=$fin_classification[$i];
        $rate_calc_modearray=$rate_calc_mode[$i];
        $earning_deduction_fundarray=$earning_deduction_fund[$i];
        $pricearray=$price[$i];
        $totalarray=$total[$i];
        $rateinsert = mysqli_query($conn,"INSERT INTO `payrole`( `EmpNo`,`AllowancesName`, `AllowancesId`, `fin_classification`, `rate_calc_mode`, `earning_deduction_fund`, `Rate`, `price`, `total`, `Date`) VALUES ('$employee_no','$allowancearray','$currentAllowanceId','$fin_classificationarray','$rate_calc_modearray','$earning_deduction_fundarray','$currentrateId','$pricearray','$totalarray','$date')") ;
      }
    }
      $query=mysqli_query($conn,$Insert);
      if($query){
        echo '<script>alert( "Data inserted success fully");</script>';
        ?>
        <script>
          location.replace('payrollgen.php');
        </script>
        <?php 
        
        
      }
//     $con->commit();
//     $message = 'Payroll has been saved successfully.';
//   } catch (PDOException $ex) {
//     $con->rollback();
//     echo $ex->getMessage();
//     echo $ex->getTraceAsString();
//     exit;
//   }
//   $goto = "payroll.php";
//   header("location:congratulation.php?go_to=" . $goto . "&success_message=" . $message);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include('link/links.php');
  ?>


  <style>
    #fullDiv ul {
      margin: 0;
      padding: 0;
    }

    #fullDiv li {
      float: left;
      display: block;
      width: 14.2857%;
      text-align: center;
      list-style-type: none;
    }

    #fullDiv li:nth-child(n+1):nth-child(-n+7) {
      font-weight: 900;
      color: #e67e22;
    }

    #fullDiv li:nth-child(n+39),
    #fullDiv li:nth-child(n+8):nth-child(-n+16) {
      font-weight: 900;
      color: rgba(0, 0, 0, .3);
    }

    #fullDiv li:hover:nth-child(n+8):nth-child(-n+38),
    #fullDiv li:nth-child(17) {
      border-radius: 5px;
      background-color: #1abc9c;
      color: #ecf0f1;
    }

    .form-group label {
      font-weight: bold;
    }

    /* width */
    ::-webkit-scrollbar {
      width: 20px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
      box-shadow: inset 0 0 5px grey;
      border-radius: 10px;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
      background: red;
      border-radius: 10px;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
      background: #b30000;
    }

    .form-group,
    .form-check {
      margin-top: 10px;
    }

    #payroll_print {
      font-size: 24px;
    }

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
</head>


<body>
  <div id="main">
    <?php include('link/desigene/navbar.php'); ?>
    <div class="clearfix">&nbsp;</div>
    <div class="container-fluid">
      <form method="post">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-success border border-2 border-dark bg-light">
              <div style="background-color: darkblue;" class="card-header text-white fw-bold">
                <div class="card-title text-white">Employee Details</div>
              </div>
              <br>
              <div class="card-body">
                <div class="row">
                  <!-- Employee No -->
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Employee No</label>
                      <select name="employee_no" id="employee_no" class="form-control select2">
                      </select>
                    </div>
                  </div>
                  <!-- Name -->
                  <div class="col-4">
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" name="empname" id="empname" readonly placeholder="Name" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <!-- Father Name -->
                  <div class="col-4">
                    <div class="form-group">
                      <label>Father Name</label>
                      <input type="text" name="father_name" id="father_name" placeholder="Father Name" class="form-control" readonly autocomplete="off" required="">
                    </div>
                  </div>
                  <!-- Type -->
                  <div class="col-4">
                    <div class="form-group">
                      <label>Type</label>
                      <input type="text" name="type" id="type" placeholder="Type" class="form-control" readonly autocomplete="off" required="">
                    </div>
                  </div>
                  
                  <!-- Job Title -->
                  <div class="col-4">
                    <div class="form-group">
                      <label>Job Title</label>
                      <input type="text" name="job_title" id="job_title" placeholder="Job Title" class="form-control" readonly autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4 d-none">
                    <div class="form-group">
                      <label>EmployeeNo</label>
                      <input type="text" name="EmployeeNo" id="EmployeeNo" placeholder="EmployeeNo" class="form-control" readonly autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>CNIC</label>
                      <input type="number" name="CNIC" id="CNIC" placeholder="CNIC" class="form-control" readonly autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Joining_Date</label>
                      <input type="date" name="Joining_Date" id="Joining_Date" placeholder="Joining_Date" class="form-control" readonly autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Grade</label>
                      <input type="text" name="Grade" id="Grade" placeholder="Grade" class="form-control" readonly autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Department</label>
                      <input type="text" name="Department" id="Department" placeholder="Department" class="form-control" readonly autocomplete="off" required="">
                    </div>
                  </div>

                  <div class="col-4">
                    <div class="form-group">
                      <label>Employee_Group</label>
                      <input type="text" name="Employee_Group" id="Employee_Group" placeholder="Employee_Group" class="form-control" readonly autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Employee_Class</label>
                      <input type="text" name="Employee_Class" id="Employee_Class" placeholder="Employee_Class" class="form-control" readonly autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Employee_Sub_Group</label>
                      <input type="text" name="Employee_Sub_Group" id="Employee_Sub_Group" placeholder="Employee_Sub_Group" class="form-control" readonly autocomplete="off" required="">
                    </div>
                  </div>

                  <div class="col-4">
                    <div class="form-group">
                      <label>Pay_Type</label>
                      <input type="text" name="Pay_Type" id="Pay_Type" placeholder="Pay_Type" class="form-control" readonly autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Account_No</label>
                      <input type="text" name="Account_No" id="Account_No" placeholder="Account_No" class="form-control" readonly autocomplete="off" required="">
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
                        <input type="text" class="form-control" id="fundInput" name="fundInput" readonly="">
                      </div>
                    </div>
                    <!-- Gross Pay -->
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Gross Pay</label>
                        <input type="text" class="form-control" id="grossPayInput" name="grossPayInput" readonly="">
                      </div>
                    </div>
                    <!-- Deduction -->
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Deduction</label>
                        <input type="text" class="form-control" id="deductionInput" name="deductionInput" readonly="">
                      </div>
                    </div>
                    <!-- Net Pay -->
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Net Pay</label>
                        <input type="text" class="form-control" id="netPayInput" name="netPayInput" readonly="">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Third Card: Earning/Deduction/Fund -->
            <div class="clearfix">&nbsp;</div>
            <div class="card card-success">
              <div class="card card-success border border-2 border-dark bg-light">
                <div style="background-color: darkblue;" class="card-header  text-white fw-bold">
                  <div class="card-title">Earning/Deduction/Fund</div>
                </div>
                <div class="card-body bg-light">
                  
                  <!-- Table for displaying added items -->
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
                    <table id="employee_pay" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>S.No</th>
                          <th>Description</th>
                          <th>Fin Classification</th>
                          <th>Allowance Calc. Mode</th>
                          <th>Earning/Deduction/Fund</th>
                          <th>Rupees</th>
                          <th>Rate</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody id="allownces">
  
                      </tbody>
                    </table>
                    <div class="form-group text-end">
                        <div class="clearfix">&nbsp;</div>
                        <button id="add" name="add" type="button" style="background-color: darkblue;" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                      </div>
                  </div>
                  <div class="col-md-1">
                    <div class="form-group">
                      <div class="clearfix">&nbsp;</div>
                      <button type="submit" id="submit" name="submit" style="background-color: darkblue;" class="btn btn-primary">Save</button>
                    </div>
                  </div>
                </div>
      </form>
    </div>
  </div>
  </div>
  </div>
  </div>
  <?php include('link/desigene/script.php'); ?>
  <?php include('link/desigene/footer.php'); ?>
  </div>
  <div class="clearfix">&nbsp;</div>
  <div class="clearfix">&nbsp;</div>
  
<script>
    var addSerial = 0;
    $(function() {
      $(".select2").select2();
    });
$(document) .ready(function(){
  function loadTable(){
    $.ajax({
      url : "ajex/empid.php",
      type : "POST",
    success : function(data){
    $("#employee_no") .html(data) ;
    }});
    }
    loadTable(); 
});
$(document) .ready(function(){
  function loadAllowances(){
  $.ajax({
      url : "ajex/allowances_ajax.php",
      type : "POST",
      success : function(data){
        $("#description") .html(data) ;
      }
    });
      }
      loadAllowances(); 
});
$(document).ready(function() {
$("#employee_no").change(function() {
      var employeeId = $(this).val();
      // alert(employeeId);
      $.ajax({
        url: "ajex/get_employee_ajax.php",
        type: "GET",
        data: {"id": employeeId},
        // cache: false,
        // async: false,
        success: function(data) {
          var employeeData = JSON.parse(data);
          $("#empname").val(employeeData.fName);
          $("#father_name").val(employeeData.father_Name)
          $("#job_title").val(employeeData.Job_Tiltle);
          $("#type").val(employeeData.type);
          $("#EmployeeNo").val(employeeData.EmployeeNo);
          $("#CNIC").val(employeeData.CNIC);
          $("#Joining_Date").val(employeeData.Joining_Date);
          $("#Grade").val(employeeData.Grade);
          $("#Department").val(employeeData.Department);
          $("#Employee_Group").val(employeeData.Employee_Group);
          $("#Employee_Class").val(employeeData.Employee_Class);
          $("#Employee_Sub_Group").val(employeeData.Employee_Sub_Group);
          $("#Pay_Type").val(employeeData.Pay_Type);
          $("#Account_No").val(employeeData.Account_No);
        }
      });
    });
  });
  $(document).ready(function() {
$("#employee_no").change(function() {
      var employeeId = $(this).val();
      // alert(employeeId);
      $.ajax({
        url: "ajex/get_alownce_ajax.php",
        type: "POST",
        data: {"id": employeeId},
        // cache: false,
        // async: false,
        success: function(data) {
          $("#allownces") .html(data) ;
        }
      });
    });
  });
  $(document).ready(function() {
    function calculateNetPay() {
        var grossPay = parseFloat($("#grossPayInput").val()) || 0;
        var deduction = parseFloat($("#deductionInput").val()) || 0;
        var fund = parseFloat($("#fundInput").val()) || 0;
        var netPay = grossPay - deduction - fund;
        $("#netPayInput").val(netPay.toFixed(2));
    }

    $("#add").click(function() {
        // Initialize totalSum
        var totalSum = 0;

        // Loop through each row in the table
        $("#employee_pay tbody tr").each(function(index) {
            // Get the rate, price, and rate_calc_mode for the current row
            var rate = parseFloat($(this).find("input[name='rate[]']").val()) || 0;
            var price = parseFloat($(this).find("input[name='price[]']").val()) || 0;
            var rate_calc_mode = $(this).find("input[name='rate_calc_mode[]']").val().trim();
            var earning_deduction_fund = $(this).find("input[name='earning_deduction_fund[]']").val().trim();

            // Calculate the total for the current row based on rate_calc_mode
            var total = 0;
            if (rate_calc_mode === 'OFF PAY') {
                total = -(rate * price);
                $('#deductionInput').val((-total).toFixed(2));
            } else if (rate_calc_mode === 'PRESENT RATE' && earning_deduction_fund === 'FUND') {
                total = -(rate * price);
                $('#fundInput').val((-total).toFixed(2));
            } else {
                total = rate * price;
            }

            // Update the #total input for the current row
            $(this).find("input[name='total[]']").val(total);

            // Update the displayed total in the table cell
            $(this).find("#total").text(total.toFixed(2)); // Display the total with 2 decimal places

            // Add the total to the sum
            totalSum += total;
        });

        // Update the grossPayInput with the totalSum
        $("#grossPayInput").val(totalSum.toFixed(2));

        // Calculate net pay
        calculateNetPay();
    });

    // Call calculateNetPay initially or whenever grossPay, deduction, or fund changes
    $("#grossPayInput, #deductionInput, #fundInput").on("input", calculateNetPay);
});



</script>

</body>

</html>
<?php }?>