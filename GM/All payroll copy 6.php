<?php
session_start();
error_reporting(0);
// links to database
include('../link/desigene/db.php');
if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber']) || $_SESSION['Designation'] != 'GM') {
  // Log the unauthorized access attempt for auditing purposes
  error_log("Unauthorized access attempt. User: {$_SESSION['loginid']}");
  
  // Redirect to the logout page
  header("Location: ../logout.php");
  exit; // Ensure that the script stops execution after the header redirection
} else{
?><!DOCTYPE html>
<html lang="en">
  <head>
    <?php include ('link/links.php')?>
  </head>
  <body>
    
    <div id="main">
      <?php include('link/desigene/navbar.php')?>

            <div class="container-fluid m-auto py-5">
              <form action="../exselPayroll.php" target="_blank" method="post">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label>Employee No</label>
                      <select name="employee_no" id="employee_no" class="form-control select2">
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6 my-4">
                      <div class="form-group">
                        <label>From Month </label>
                        <select name="frommonth" required id="frommonth" class="form-control select2">
                        <?php
                        $select = mysqli_query($conn, "SELECT * FROM `timeperiod` WHERE `HRStatus`='ACCEPT' ORDER BY `ID` DESC");

                        if (mysqli_num_rows($select) > 0) {
                            ?>
                            <option value="">Select</option>
                            <?php
                            while ($row = mysqli_fetch_assoc($select)) {
                                // Format the date using date() function with the month in English
                                $formattedDate = date('d-M-Y', strtotime($row['FromDate']));
                                
                                echo '<option value="' . $row['FromDate'] . '">' . $formattedDate . '</option>';
                            }
                        } else {
                            echo '<option value="">No time periods found</option>';
                        }
                        ?>

                        </select>
                      </div>
                  </div>
                  <div class="col-md-6 my-4">
                      <div class="form-group">
                        <label>To Month </label>
                        <select name="tomunth" required id="tomunth" class="form-control select2">
                        <?php
                        $select = mysqli_query($conn, "SELECT * FROM `timeperiod` WHERE `HRStatus`='ACCEPT' ORDER BY `ID` DESC");

                        if (mysqli_num_rows($select) > 0) {
                            ?>
                            <option value="">Select</option>
                            <?php
                            while ($row = mysqli_fetch_assoc($select)) {
                                // Format the date using date() function with the month in English
                                $formattedDate = date('d-M-Y', strtotime($row['FromDate']));
                                
                                echo '<option value="' . $row['FromDate'] . '">' . $formattedDate . '</option>';
                            }
                        } else {
                            echo '<option value="">No time periods found</option>';
                        }
                        ?>

                        </select>
                      </div>
                  </div>
                  <div class="col-md-12 text-end mt-2">
                    <input style="background-color: darkblue;" type="button" id="See" class="btn text-white float-right shadow" value="Search">
                  </div>
                  
                  <div class="col-12">
                    <div class="card card-success">
                      <div class="card card-success border border-2 border-dark bg-light">
                        <div style="background-color: darkblue;" class="card-header  text-white fw-bold">
                          <div class="card-title">Payroll</div>
                        </div>
                        <div class="card-body bg-light"> 
                          <!-- Table for displaying added items -->
                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
                            <table  class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                  <th>S.No</th>
                                  <th>Emp. No	</th>
                                  <th>Emp. Name</th>
                                  <th>Emp. Father Name</th>
                                  <th>Emp. CNIC</th>
                                  <th>Joining Date</th>
                                  <th>Job Title</th>
                                  <th>Grade</th>
                                  <th>Employment Type</th>
                                  <th>Department</th>
                                  <th>Class</th>
                                  <th>Group</th>
                                  <th>Sub-Group</th>
                                  <th>Payment Mode</th>
                                  <th>Bank Account No.</th>
                                  <?php 
                                  $selected=mysqli_query($conn,"SELECT * FROM `allowances` WHERE `allowance_status`='ACTIVE'");
                                  while($rowallownce=mysqli_fetch_array($selected)){
                                    echo '<th>'.$rowallownce['allowance'].'</th>';
                                  }
                                  ?>
                                  <th>Total</th>
                              </tr>
                          </thead>
                          <tbody id="employee_pay" >
                          </tbody>
                        </table>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <div class="clearfix">&nbsp;</div>
                              <button type="submit" id="EOBI" name="EOBI" style="background-color: darkblue;" class="btn btn-primary">EOBI Loan Payment</button>
                            </div>
                          </div>
                        </div>
                          </div>
                        </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
      <?php include('link/desigene/script.php')?>
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
      url : "ajex/empidpay.php",
      type : "POST",
    success : function(data){
    $("#employee_no") .html(data) ;
    }});
    }
    loadTable(); 
    $("#See").on("click",function(e){
        e.preventDefault();
        var employee_no = $("#employee_no").val();
        var frommonth = $("#frommonth").val();
        var tomunth = $("#tomunth").val();
        var Employee_Sub_Group_drop = $("#Employee_Sub_Group_drop").val();
        var Salary_Branch = $("#Salary_Branch").val();
        var Department = $("#Department").val();
        $.ajax({
          url:"ajex/ajax-get-payroll.php",
          type:"Post", 
          data:{employee_no:employee_no,frommonth:frommonth,tomunth:tomunth, Employee_Sub_Group_drop:Employee_Sub_Group_drop,
            Salary_Branch:Salary_Branch,Department:Department
          },
          success:function(data){
            $("#employee_pay").html(data);
          }
        });
      });
});

</script>
  
</script>
  </body>
</html><?php }?>