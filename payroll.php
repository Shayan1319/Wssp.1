<?php
include('link/desigene/db.php');
include('common_function/common_function.php');

if (isset($_POST['submit'])) {
  $employeeId = $_POST['employee_no'];
  $allowanceIds = $_POST['description_id'];
  $fundInput = $_POST['fundInput'];
  $grossPay = $_POST['grossPayInput'];
  $deductionInput = $_POST['deductionInput'];
  $netPayInput = $_POST['netPayInput'];
  $rateInput = $_POST['rates'];
  $message = '';

  try {
    $con->beginTransaction();

    $query = "INSERT INTO `earning_deduction_fund`(`employee_id`, `fund`, `gross_pay`, `deduction`, `net_pay`)
                VALUES ('$employeeId', '$fundInput', '$grossPay', '$deductionInput', '$netPayInput');";
    $stmt = $con->prepare($query);
    $stmt->execute();

    if (isset($allowanceIds) && is_array($allowanceIds) && count($allowanceIds) > 0) {
      $size = sizeof($allowanceIds);
      for ($i = 0; $i < $size; $i++) {
        $currentAllowanceId = $allowanceIds[$i];
        $currentrateId = $rateInput[$i];
        $query = "INSERT INTO `rate` (`rate`, `employee_id`, `allowances_id`)
              VALUES('$currentrateId', '$employeeId', '$currentAllowanceId');";
        $stmt = $con->prepare($query);
        $stmt->execute();
      }
    }

    $con->commit();
    $message = 'Payroll has been saved successfully.';
  } catch (PDOException $ex) {
    $con->rollback();
    echo $ex->getMessage();
    echo $ex->getTraceAsString();
    exit;
  }
  $goto = "payroll.php";
  header("location:congratulation.php?go_to=" . $goto . "&success_message=" . $message);
}

$allEmployee = getEmployee($con);
$allAllowance = getAllowances($con);
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
    <?php include('payroll/link/desigene/navbar.php'); ?>
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
                        <?php echo $allEmployee; ?>
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
                          <?php echo $allAllowance; ?>
                        </select>
                      </div>
                    </div>
                    <!-- Allowance Calculation Mode -->
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
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Rate</label>
                        <input type="text" class="form-control integeronly" id="rate_input" name="rate_input">
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
                          <th>Allowance Calc. Mode</th>
                          <th>Earning/Deduction/Fund</th>
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
  </div>
  </div>
  </div>
  <?php include('link/desigene/script.php'); ?>
  <?php include('link/desigene/footer.php'); ?>
  </div>
  <div class="clearfix">&nbsp;</div>
  <div class="clearfix">&nbsp;</div>
  <script>
    let addSerial = 0;
    $(function() {
      $(".select2").select2();
    });

    $(document).ready(function() {
      $("#description").change(function() {
        let descriptionId = $(this).val();
        $.ajax({
          url: "get_allowances_ajax.php",
          type: "GET",
          data: {
            "id": descriptionId
          },
          cache: false,
          async: false,
          success: function(data) {
            let allowanceData = JSON.parse(data);
            $("#allowance_calc_mode").val(allowanceData.rate_calc_mode);
            $("#earning_deduction_fund").val(allowanceData.earning_deduction_fund);
            let allowanceCalcMode = allowanceData.rate_calc_mode;
            let rateInput = $("#rate_input");
            if (allowanceCalcMode === "RUNTIME VALUE") {
              rateInput.prop('disabled', true).val('0');
            } else {
              rateInput.prop('disabled', false);
            }
          },
          error: function(xhr, status, error) {
            console.error("Error in AJAX request:", error);
          }
        });
      });
    });

    $("#employee_no").change(function() {
      let employeeId = $(this).val();
      $.ajax({
        url: "get_employee_ajax.php",
        type: "GET",
        data: {
          "id": employeeId
        },
        cache: false,
        async: false,
        success: function(data) {
          let employeeData = JSON.parse(data);

          $("#empname").val(employeeData.firstName);
          $("#father_name").val(employeeData.fatherName)
          $("#job_title").val(employeeData.jobTitle);
          $("#type").val(employeeData.type);
        }
      });
    });

    $("#add").click(function() {
      let description = $("#description :selected").text();
      let allowanceCalcMode = $('#allowance_calc_mode').val();
      let earningDeductionFund = $("#earning_deduction_fund").val();
      let descriptionId = $("#description").val();
      let rate = parseFloat($("#rate_input").val());
      addSerial++;

      let descriptionIdInput = "<input type='hidden' name='description_id[]' value='" + descriptionId + "' />";
      let rateInput = "<input type='hidden' name='rates[]' value='" + rate + "' />";
      let newData = '<tr>';
      newData += '<td>' + addSerial + '</td>';
      newData += '<td>' + description + descriptionIdInput + rateInput + '</td>';
      newData += '<td>' + allowanceCalcMode + '</td>';
      newData += '<td>' + earningDeductionFund + '</td>';
      newData += '<td>' + rate + '</td>';
      let btnDel = "<button onclick='deleteRow(this)' type='button' class='btn btn-danger'><i class='fa fa-times'></i></button>";

      newData += '<td>' + btnDel + '</td>';
      newData += '</tr>';
      let oldData = $("#add_list").html();
      newData = oldData + newData;
      $("#add_list").html(newData);
      $('#description').val('');
      $('#allowance_calc_mode').val('');
      $('#earning_deduction_fund').val('');
      $('#rate_input').val('');
      $(".select2").select2();

      if (earningDeductionFund === "EARNING" && allowanceCalcMode === "PRESET RATE") {
        let grossPay = parseFloat($('#grossPayInput').val()) || 0;
        $('#grossPayInput').val((grossPay + rate).toFixed(2));
      } else if (earningDeductionFund === "DEDUCTION" && allowanceCalcMode === "PRESET RATE") {
        let deduction = parseFloat($('#deductionInput').val()) || 0;
        $('#deductionInput').val((deduction + rate).toFixed(2));
      } else if (earningDeductionFund === "FUND" && allowanceCalcMode === "PRESET RATE") {
        let fund = parseFloat($('#fundInput').val()) || 0;
        $('#fundInput').val((fund + rate).toFixed(2));
      }
      if (allowanceCalcMode === "RUNTIME VALUE") {
        $('#rate_input').prop('disabled', true).val(null);
      } else {
        $('#rate_input').prop('disabled', false);
      }
      calculateNetPay();
    });

    function deleteRow(btn) {
      let row = $(btn).closest('tr');
      let tableId = row.closest('table').attr('id');
      let index = row[0].rowIndex;


      let earningDeductionFund = row.find('td:nth-child(4)').text();
      let allowanceCalcMode = row.find('td:nth-child(3)').text();
      let rate = parseFloat(row.find('td:nth-child(5)').text());

      row.remove();
      reArrangeSerials(tableId);

      if (tableId === "employee_pay") {
        if (earningDeductionFund === "EARNING" && allowanceCalcMode === "PRESET RATE") {
          let grossPay = parseFloat($('#grossPayInput').val()) || 0;
          if (!isNaN(grossPay)) {
            $('#grossPayInput').val((grossPay - rate).toFixed(2));
          }
        } else if (earningDeductionFund === "DEDUCTION" && allowanceCalcMode === "PRESET RATE") {
          let deduction = parseFloat($('#deductionInput').val()) || 0;
          if (!isNaN(deduction)) {
            $('#deductionInput').val((deduction - rate).toFixed(2));
          }
        } else if (earningDeductionFund === "FUND" && allowanceCalcMode === "PRESET RATE") {
          let fund = parseFloat($('#fundInput').val()) || 0;
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
      let grossPay = parseFloat($("#grossPayInput").val()) || 0;
      let deduction = parseFloat($("#deductionInput").val()) || 0;
      let fund = parseFloat($("#fundInput").val()) || 0;

      let netPay = grossPay - deduction;

      $("#netPayInput").val(netPay.toFixed(2));

    }

    function reArrangeSerials(tableId) {
      let rows = $('#' + tableId + ' tbody tr');
      rows.each(function(index) {
        $(this).find('td:first').text(index + 1);
      });

      if (tableId === "employee_pay") {
        addSerial = rows.length;
      }
    }

    let grossPayInput = document.getElementById('grossPayInput');
    let deductionInput = document.getElementById('deductionInput');
    let fundInput = document.getElementById('fundInput');

    grossPayInput.addEventListener('input', calculateNetPay);
    deductionInput.addEventListener('input', calculateNetPay);
    fundInput.addEventListener('input', calculateNetPay);
  </script>

</body>

</html>