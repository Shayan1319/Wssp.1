<?php 
session_start();
error_reporting(0);
// links to database
include('link/desigene/db.php');
if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber']) || $_SESSION['Designation'] != 'CEO') {
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
                    <option value="<?php echo $row['EmployeeNo']?>"><?php echo $row['EmployeeNo']?></option>
                  <?php   
                  }}
                  ?>
                </select>
              </div>
            </div>
            <div class="col-12 table-responsive">
                <table class="table">
                  <thead class="text-white" style="background-color: darkblue;">
                      <tr class="text-white">
                          <th scope="col">#</th>
                          <th scope="col">EmployeeNo</th>
                          <th scope="col">First Name</th>
                          <th scope="col">Job Title</th>
                          <th scope="col">CNIC</th>
                          <th scope="col">Father Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Employment Group</th>
                          <th scope="col">Grade</th>
                          <th scope="col">Department</th>
                          <th scope="col">Status</th>
                          <th scope="col">Joining Date</th>
                          <th scope="col">Contract Expiry Date</th>
                          <th scope="col">See all Changes</th>
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
