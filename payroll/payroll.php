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
    $employeeId = $_POST['employee_no'];
    $allowanceIds = $_POST['description_id'];
    $fundInput = $_POST['fundInput'];
    $grossPay = $_POST['grossPayInput'];
    $deductionInput = $_POST['deductionInput'];
    $netPayInput = $_POST['netPayInput'];
    $rateInput = $_POST['rates'];
    $date= date("Y-m-d");
    $type=strtoupper($_POST['type']);
    $select=mysqli_query($conn,"SELECT * FROM `earning_deduction_fund` WHERE `employee_id`=$employeeId");
    if(mysqli_num_rows($select)){echo '<script>alert( "Payroll already exist");</script>';}else{
    $Insert = "INSERT INTO `earning_deduction_fund`(`employee_id`, `fund`, `gross_pay`, `deduction`, `net_pay`)VALUES ('$employeeId', '$fundInput', '$grossPay', '$deductionInput', '$netPayInput');";
    if (isset($allowanceIds) && is_array($allowanceIds) && count($allowanceIds) > 0) {
      $size = sizeof($allowanceIds);
      for ($i = 0; $i < $size; $i++) {
        $currentAllowanceId = $allowanceIds[$i];
        $currentrateId = $rateInput[$i];
        $rateinsert = mysqli_query($conn,"INSERT INTO `rate` (`rate`, `employee_id`, `allowances_id`, `EmployementType`, `Date`)VALUES('$currentrateId', '$employeeId', '$currentAllowanceId','$type', '$date')") ;
      }
    }
      $query=mysqli_query($conn,$Insert);
      if($query){
        echo '<script>alert( "Data inserted success fully");</script>';
        ?>
        <script>
          location.replace('payroll.php');
        </script>
        <?php 
        
        
      }}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include('link/links.php');
  ?>


  <style>
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
                      <span id="cnicStatus" style="font-size: smaller;"></span>
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
                </div>
              </div>
            </div>
            <!-- Second Card: Employee Pay -->
            <div class="clearfix">&nbsp;</div>
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
                        <input type="text" class="form-control" id="fundInput" name="fundInput" readonly>
                      </div>
                    </div>
                    <!-- Gross Pay -->
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Gross Pay</label>
                        <input type="text" class="form-control" id="grossPayInput" name="grossPayInput" readonly>
                      </div>
                    </div>
                    <!-- Deduction -->
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Deduction</label>
                        <input type="text" class="form-control" id="deductionInput" name="deductionInput" readonly>
                      </div>
                    </div>
                    <!-- Net Pay -->
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Net Pay</label>
                        <input type="text" class="form-control" id="netPayInput" name="netPayInput" readonly>
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
                  <div class="row">
                    <!-- Description -->
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Description</label>
                        <select name="description" id="description" class="form-control select2">
                          <!-- <?php // echo $allAllowance; ?> -->
                        </select>
                      </div>
                    </div>
                    <!-- Allowance Calculation Mode -->
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Fin Classification</label>
                        <input type="text" class="form-control" name="Fin_Classification" id="Fin_Classification" readonly>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Allowance Calc. Mode</label>
                        <input type="text" class="form-control" name="allowance_calc_mode" id="allowance_calc_mode" readonly>
                      </div>
                    </div>
                    <!-- Earning/Deduction/Fund -->
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Earning/Deduction/Fund</label>
                        <input type="text" class="form-control" name="earning_deduction_fund" id="earning_deduction_fund" readonly>
                      </div>
                    </div>
                    <!-- Rate -->
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="row">
                          <div class="col-5" id="mutiplier"  ><label>Rupees</label>
                        <input type="text" class="form-control integeronly" id="rupees" name="rupees" readonly> </div>
                        <div class="col-2" id="mutiplier"  > <br> x </div>
                          <div class="col-5"><label>Rate</label>
                        <input type="text" class="form-control integeronly" id="rate_input" name="rate_input"></div>
                        </div>
                        
                        
                      </div>
                    </div>
                    <!-- Add Button -->
                    <div class="col-md-1">
                      <div class="form-group">
                        <div class="clearfix">&nbsp;</div>
                        <button id="add" name="add" type="button" style="background-color: darkblue;" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                      </div>
                    </div>
                  </div>
                  <div class="clearfix">&nbsp;</div>
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
                      <tbody id="add_list">

                      </tbody>
                    </table>
                  </div>
                  <div class="col-md-1">
                    <div class="form-group">
                      <div class="clearfix">&nbsp;</div>
                      <button type="submit" id="submit" name="submit" style="background-color: darkblue;" class="btn btn-primary">Save</button>
                    </div>
                  </div>
      </form>
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
      url : "ajex/empid copy.php",
      type : "POST",
    success : function(data){
    $("#employee_no") .html(data) ;
    }});
    }
    loadTable(); 

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
    $("#employee_no").change(function() {
        var empid = $(this).val();
        $.ajax({
            url: "ajex/get_employee_ajax.php",
            type: "POST",
            data: { "id": empid },
            dataType: 'json',
            success: function(data) {
                $("#empname").val(data.fName);
                $("#father_name").val(data.father_Name);
                $("#type").val(data.type);
                $("#job_title").val(data.Job_Tiltle);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});

$(document).ready(function() {
      $("#description").change(function() {
        var descriptionId = $(this).val();
        $.ajax({
          url: "ajex/get_allowances_ajax.php",
          type: "POST",
          data: { "id": descriptionId},
          success: function(data) {
            var allowanceData = JSON.parse(data);
            $("#allowance_calc_mode").val(allowanceData.rate_calc_mode);
            $("#earning_deduction_fund").val(allowanceData.earning_deduction_fund);
            $("#Fin_Classification").val(allowanceData.Fin_classification);
            $("#rupees").val(allowanceData.rupes);
            var allowanceCalcMode = allowanceData.rate_calc_mode;
            var rateInput = $("#rate_input");
            if (allowanceCalcMode == "RUNTIME VALUE" || allowanceCalcMode == "OVERTIME" || allowanceCalcMode == "DOUBLE DUTY"|| allowanceCalcMode == "OFF PAY") {
              rateInput.prop('disabled', true).val('0');
            } else {
              rateInput.prop('disabled', false);
            }
          },
        });
      });
    });
    var addedDescriptionIds = [];

    $("#add").click(function() {
      var description = $("#description :selected").text();
      var allowanceCalcMode = $('#allowance_calc_mode').val();
      var earningDeductionFund = $("#earning_deduction_fund").val();
      var descriptionId = $("#description").val();
      var Fin_Classification = $("#Fin_Classification").val();
      var rate = parseFloat($("#rate_input").val());
      var rupees = parseFloat($("#rupees").val());

      // Check if the description ID has already been added
      
  if (addedDescriptionIds.includes(descriptionId)) {
    alert("This description has already been added.");
    return; // Do not add it again
  }
  addedDescriptionIds.push(descriptionId); 
  // Add the description ID to the list

      addSerial++;
      var descriptionIdInput = "<input type='hidden' name='description_id[]' value='" + descriptionId + "' />";
      var rateInput = "<input type='hidden' name='rates[]' value='" + rate + "' />";
      var newData = '<tr>';
      newData += '<td>' + addSerial + '</td>';
      newData += '<td>' + description + descriptionIdInput + rateInput + '</td>';
      newData += '<td>' + Fin_Classification + '</td>';
      newData += '<td>' + allowanceCalcMode + '</td>';
      newData += '<td>' + earningDeductionFund + '</td>';
      newData += '<td>' + rupees + '</td>';
      newData += '<td>' + rate + '</td>';
      var btnDel = "<button onclick='deleteRow(this)' type='button' class='btn btn-danger'><i class='fa fa-times'></i></button>";
      newData += '<td>' + btnDel + '</td>';
      newData += '</tr>';
      var oldData = $("#add_list").html();
      newData = oldData + newData;
      $("#add_list").html(newData);
      if (earningDeductionFund === "EARNING" && allowanceCalcMode === "PRESENT RATE") {
        var grossPay = parseFloat($('#grossPayInput').val()) || 0;
        $('#grossPayInput').val((grossPay + rate).toFixed(2));
      } else if (earningDeductionFund === "DEDUCTION" && allowanceCalcMode === "PRESENT RATE") {
        var deduction = parseFloat($('#deductionInput').val()) || 0;
        $('#deductionInput').val((deduction + rate).toFixed(2));
      }else if (earningDeductionFund === "FUND" && Fin_Classification === "EOBI-ER") {
          // Add the rate to the fund input
          var currentFund = parseFloat($("#fundInput").val()) || 0;
          var newFund = currentFund + rate;
          $("#fundInput").val(newFund.toFixed(2));
          // Subtract the rate from the gross pay input
          var grossPay = parseFloat($("#grossPayInput").val()) || 0;
          var newGrossPay = grossPay - rate;
          $("#grossPayInput").val(newGrossPay.toFixed(2));
        }
       else if (earningDeductionFund === "FUND" && allowanceCalcMode === "PRESENT RATE") {
        var fund = parseFloat($('#fundInput').val()) || 0;
        $('#fundInput').val((fund + rate).toFixed(2));
      }
      else if(allowanceCalcMode === "PREVAILING RATE" && earningDeductionFund === "EARNING"){
        var grossPay = parseFloat($("#grossPayInput").val()) || 0;
        var mulrate = rupees * rate;
        var newGrossPay = grossPay + mulrate;
        $("#grossPayInput").val(newGrossPay.toFixed(2));
      }else if(allowanceCalcMode === "OFF PAY" && earningDeductionFund ==="DEDUCTION"){
        var grossPay = parseFloat($("#grossPayInput").val()) || 0;
        var mulrate = rupees * rate;
        var newGrossPay = grossPay - mulrate;
        $("#grossPayInput").val(newGrossPay.toFixed(2));
      }
      else if (allowanceCalcMode === "RUNTIME VALUE" || allowanceCalcMode === "OVERTIME" || allowanceCalcMode == "DOUBLE DUTY"|| allowanceCalcMode == "OFF PAY") {
        $('#rate_input').prop('disabled', true).val(null);
      } else {
        $('#rate_input').prop('disabled', false);
      }
      calculateNetPay();
      $('#description').val('');
      $('#allowance_calc_mode').val('');
      $('#earning_deduction_fund').val('');
      $('#Fin_Classification').val('');
      $('#rate_input').val('');
      $('#rupees').val('');
      $(".select2").select2();
    });
    // function for delete row
    function deleteRow(btn) {
      var row = $(btn).closest('tr');
      var tableId = row.closest('table').attr('id');
      var index = row[0].rowIndex;
      var Fin_Classification = row.find('td:nth-child(3)').text();
      var allowanceCalcMode = row.find('td:nth-child(4)').text();
      var earningDeductionFund = row.find('td:nth-child(5)').text();
      var rupees = row.find('td:nth-child(6)').text();
      var rate = parseFloat(row.find('td:nth-child(7)').text());
      row.remove();
      reArrangeSerials(tableId);
      if (tableId == "employee_pay") {
        if (earningDeductionFund == "EARNING" && allowanceCalcMode == "PRESENT RATE") {
          var grossPay = parseFloat($('#grossPayInput').val()) || 0;
          if (!isNaN(grossPay)) {
            $('#grossPayInput').val((grossPay - rate).toFixed(2));
          }
        } else if (earningDeductionFund == "DEDUCTION" && allowanceCalcMode == "PRESENT RATE") {
          var deduction = parseFloat($('#deductionInput').val()) || 0;
          if (!isNaN(deduction)) {
            $('#deductionInput').val((deduction - rate).toFixed(2));
          }
        }else if(earningDeductionFund === "FUND" && Fin_Classification === "EOBI-ER"){
          var fund = parseFloat($("#fundInput").val()) || 0;
          var grossPay = parseFloat($("#grossPayInput").val()) || 0;
          
          if (!isNaN(grossPay)) {
            $('#grossPayInput').val((grossPay + rate).toFixed(2));
          }
          if (!isNaN(fund)) {
            $('#fundInput').val((fund - rate).toFixed(2));
          }
        }
        else if((allowanceCalcMode=="PREVAILING RATE" && earningDeductionFund=="EARNING") || (allowanceCalcMode=="OVERTIME" && earningDeductionFund=="EARNING") ||(allowanceCalcMode=="DOUBLE DUTY" && earningDeductionFund=="EARNING")){
        var grossPay = parseFloat($("#grossPayInput").val()) || 0;
        if(!isNaN(grossPay)){
        var mulrate = rupees * rate;
        var newGrossPay = grossPay - mulrate;
        $("#grossPayInput").val(newGrossPay.toFixed(2));
        }        
      }
      else if(allowanceCalcMode=="OFF PAY" && earningDeductionFund=="DEDUCTION"){
        var grossPay = parseFloat($("#grossPayInput").val()) || 0;
        if(!isNaN(grossPay)){
        var mulrate = rupees * rate;
        var newGrossPay = grossPay + mulrate;
        $("#grossPayInput").val(newGrossPay.toFixed(2));
        }        
      }
        else if (earningDeductionFund == "FUND" && allowanceCalcMode == "PRESENT RATE") {
          var fund = parseFloat($('#fundInput').val()) || 0;
          if (!isNaN(fund)) {
            $('#fundInput').val((fund - rate).toFixed(2));
          }
          
        }
      }
      row.find('.description').val('');
      row.find('.allowanceCalcMode').val('');
      row.find('.earningDeductionFund').val('');
      row.find('.rate').val('');
      calculateNetPay();
    }
    function calculateNetPay() {
      var grossPay = parseFloat($("#grossPayInput").val()) || 0;
      var deduction = parseFloat($("#deductionInput").val()) || 0;
      var fund = parseFloat($("#fundInput").val()) || 0;
      var netPay = grossPay - deduction;
      $("#netPayInput").val(netPay.toFixed(2));
    }
    function reArrangeSerials(tableId) {
      var rows = $('#' + tableId + ' tbody tr');
      rows.each(function(index) {
        $(this).find('td:first').text(index + 1);
      });
      if (tableId == "employee_pay") {
        addSerial = rows.length;
      }
    }
    var grossPayInput = document.getElementById('grossPayInput');
    var deductionInput = document.getElementById('deductionInput');
    var fundInput = document.getElementById('fundInput');
    grossPayInput.addEventListener('input', calculateNetPay);
    deductionInput.addEventListener('input', calculateNetPay);
    fundInput.addEventListener('input', calculateNetPay);
</script>

</body>

</html>
<?php }?>