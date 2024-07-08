<?php 
session_start();
error_reporting(0);
// links to database
include('link/desigene/db.php');
if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber']) || $_SESSION['Designation'] != 'Payroll manager') {
  error_log("Unauthorized access attempt. User: {$_SESSION['loginid']}");
  header("Location: ../logout.php");
  exit;
}else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <?php include ('link/links.php')?>
   <style>
    h4, h3 {
      text-align: center;
    }
    .select2-selection__rendered {
      line-height: 31px !important;

    }

    .select2-container .select2-selection--single {
      height: 35px !important;
      border: 1px solid #ced4da;
      border-radius: 0px;
      width: 300px !important;
    }

    .select2-selection__arrow {
      height: 34px !important;
    }
   </style>
</head>
<body>
  <div id="main">
    <?php include('link/desigene/navbar.php')?>
        <div class="container-fluid m-auto p-5">
          <div class="row my-3">
            <div class="col-md-4 my-2">
              <div class="form-group">
                <label>EmployeeNo</label>
                <select name="" id="DY_Supervisor" class="form-control select2">
                  <?php include ('../link/desigene/db.php');
                    $select = mysqli_query($conn,"SELECT * FROM `employeedata` ");
                    if(mysqli_num_rows($select)>0){
                  ?>
                  <option value="">select</option><?php
                    while($row=mysqli_fetch_assoc($select)){
                  ?>
                    <option value="<?php echo $row['Id']?>"><?php echo $row['EmployeeNo']?></option>
                  <?php   
                  }}
                  ?>
                </select>
              </div>
            </div>
            <div class="col-md-8 my-2 text-end">
              <form action="../allpayroll.php" method="POST" target="_blank">
              <button type="submit" name="submitall" class="btn btn-warning">Print all payrolls</button>
              </form>
              <form action="../printpaysllipdata.php" method="POST" target="_blank">
              <button type="submit" name="submit" class="btn btn-success">Print payrolls summary</button>
              </form>
            </div>
            <div class="col-12 table-responsive">
                <table class="table">
                  <thead class="text-white" style="background-color: darkblue;">
                      <tr class="text-white">
                          <th  style="color: white !important;" scope="col">#</th>
                          <th  style="color: white !important;" scope="col">EmployeeNo</th>
                          <th  style="color: white !important;" scope="col">fName</th>
                          <th  style="color: white !important;" scope="col">CNIC</th>
                          <th  style="color: white !important;" scope="col">mNumber</th>
                          <th  style="color: white !important;" scope="col">Job_Tiltle</th>
                          <th  style="color: white !important;" scope="col">father_Name</th>
                          <th  style="color: white !important;" scope="col">Employement_Group</th>
                          <th  style="color: white !important;" scope="col">Employee_Class</th>
                          <th  style="color: white !important;" scope="col">Employee_Group</th>
                          <th  style="color: white !important;" scope="col">Employee_Sub_Group</th>
                          <th  style="color: white !important;" scope="col">Salary_Bank</th>
                          <th  style="color: white !important;" scope="col">Account_No</th>
                          <th  style="color: white !important;" scope="col">Grade</th>
                          <th  style="color: white !important;" scope="col">Department</th>
                          <th  style="color: white !important;" scope="col">Status</th>
                          <?php 
                                  $selected=mysqli_query($conn,"SELECT * FROM `allowances` WHERE `allowance_status`='ACTIVE'");
                                  while($rowallownce=mysqli_fetch_array($selected)){
                                    echo '<th  style="color: white !important;" >'.$rowallownce['allowance'].'</th>';
                                  }
                          ?>
                          <th  style="color: white !important;" scope="col">fund</th>
                          <th  style="color: white !important;" scope="col">gross_pay</th>
                          <th  style="color: white !important;" scope="col">deduction</th>
                          <th  style="color: white !important;" scope="col">net_pay</th>
                      </tr>
                  </thead>
                  <tbody id="table-data">
                    <!-- Table rows will be populated here -->
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
<?php include('link/desigene/script.php')?>
<?php include('../link/desigene/script.php') ?>
  <!-- jQuery  -->
  <script>
   $(document).ready(function() {
      function loadTable(employeeNo) {
        $.ajax({
          url: "ajex/new_employeeupdate copy.php",
          type: "POST",
          data: { EmployeeNo: employeeNo },
          success: function(data) {
            $("#table-data").html(data);
          }
        });
      }

      // Load all employees initially
      loadTable('');

      // Handle change event for the select dropdown
      $("#DY_Supervisor").change(function() {
        var selectedEmployeeNo = $(this).val();
        loadTable(selectedEmployeeNo);
      });
    });
  </script>
</body>
</html>
<?php }?>
