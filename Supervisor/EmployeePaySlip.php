<?php
session_start();
error_reporting(0);
// links to database
include('../link/desigene/db.php');
if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber'])) {
  error_log("Unauthorized access attempt. User: {$_SESSION['loginid']}");
  header("Location: ../logout.php");
  exit;
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
        <div class="row">
          <!-- left column -->
          <div class="col-md-12"> 
            <div class="card card-success">
              <div style="background-color: darkblue;" class="card-header  text-white fw-bold">
                <div class="card-title">Employee Pay Slip</div>
              </div>
              <!-- /.card-header -->
              <div class="card-body bg-light">
                <!-- form start -->
                <form method="post" action="../printpayroll.php" enctype="multipart/form-data">
                  <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label>Employee No</label>
                      <div class="col-md-4 my-2">
                                        <label for="empnumber">Employee Id</label>
                                        <select name="empnumber" id="empnumber" class="form-control select2">
                                            <?php
                                            $Employee_Manager = $_SESSION['EmployeeNumber'];
                                            $selectempdata = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `Status`='ON-DUTY' AND `Attendance_Supervisor`=$Employee_Manager");
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
                  </div>
                  <div class="col-md-6 my-4">
                      <div class="form-group">
                        <label>From Month </label>
                        <select name="frommonth" required id="timeperiod" class="form-control select2">
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
                        <select name="tomunth" required id="totimeperiod" class="form-control select2">
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
                      <input style="background-color: darkblue;" type="submit" class="btn text-white float-right shadow" value="Submit" name="submit">
                    </div>
                    </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- Col-12 -->
        </div>
      </div>
    </div>
      <?php include('link/desigene/script.php')?>
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
      url : "ajex/empidpay.php",
      type : "POST",
    success : function(data){
    $("#employee_no") .html(data) ;
    }});
    }
    loadTable(); 
});
</script>
  
</script>
  </body>
</html><?php }?>