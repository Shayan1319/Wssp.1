<?php
session_start();
error_reporting(0);
// links to database
include('../link/desigene/db.php');
if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber']) || $_SESSION['Designation'] != 'HR manager') {
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
      <?php include ('link/desigene/sidebar.php')?>
      <div class="container-fluid py-5">
      <div class="row">
        <div class="col-lg-12">
          <div class="card card2 text-center bg-light">
            <div style="background-color: darkblue;" class="card-header ">
              <div class="card-title text-white fw-bolder">Employee Number of Leave</div>
            </div>
            <div class="container">
              <form action="../leave FY.php"  target="_blank" method="post">
                <div class="row">
                  <div class="col-md-12 my-2">
                    <div class="form-group">
                      <label> Employee</label>
                      <select name="employee" id="" class="form-control ">
                        <?php
                  include ('../link/desigene/db.php');
                  $select = mysqli_query($conn,"SELECT * FROM `employeedata`");
                  if(mysqli_num_rows($select)>0){
                      ?><option value="">select</option><?php
                      while($row=mysqli_fetch_array($select)){
                      ?>
                  <option value="<?php echo $row['EmployeeNo']?>"> <?php echo $row['EmployeeNo']?> </option>
                      <?php   
                      }
                  }
                  ?> 
              </select>
              </div>
            </div>
            
            <div class="col-12  text-end">
              <button type="submit" style="background-color: darkblue;" class="btn btn-primary" name="leaveFY" id="leaveFy">leave FY</button>
            </div>
          </div>
        </form>
        <form action="../leave FY.php"  target="_blank" method="post">
                <div class="row">
                  <div class="col-md-6 my-2">
                    <div class="form-group">
                      <label> Employee</label>
                      <select name="employee" id="" class="form-control ">
                        <?php
                  include ('../link/desigene/db.php');
                  $select = mysqli_query($conn,"SELECT * FROM `employeedata`");
                  if(mysqli_num_rows($select)>0){
                      ?><option value="">select</option><?php
                      while($row=mysqli_fetch_array($select)){
                      ?>
                  <option value="<?php echo $row['EmployeeNo']?>"> <?php echo $row['EmployeeNo']?> </option>
                      <?php   
                      }
                  }
                  ?> 
              </select>
              </div>
            </div>
            <div class="col-md-6 my-2">
              <div class="form-group">
                <label>Month</label>
                <select name="Month" required id="Month" class="form-control select2">
                <?php
                $select = mysqli_query($conn, "SELECT * FROM `timeperiod` WHERE `HRStatus`='ACCEPT' ORDER BY `ID` DESC");

                if (mysqli_num_rows($select) > 0) {
                    ?>
                    <option value="">Select</option>
                    <?php
                    while ($row = mysqli_fetch_assoc($select)) {
                        // Format the date using date() function with the month in English
                        $formattedDate = date('d-M-Y', strtotime($row['FromDate']));
                        
                        echo '<option value="' . $row['ID'] . '">' . $formattedDate . '</option>';
                    }
                } else {
                    echo '<option value="">No time periods found</option>';
                }
                ?>

                </select>
              </div>
          </div>
            <div class="col-12  text-end">
              <button type="submit" style="background-color: darkblue;" class="btn btn-primary" name="leaveM" id="leaveM">leave Month</button>
              <button type="submit" style="background-color: darkblue;" class="btn btn-primary" name="leaveD" id="leaveD">leave Details</button>
              <button type="submit" style="background-color: darkblue;" class="btn btn-primary" name="overtime" id="overtime"> Overtime/Double Duty</button>
            </div>
          </div>
        </form>

            </div>
        </div>
        </div>
      </div>
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