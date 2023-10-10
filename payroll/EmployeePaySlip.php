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
                      <select name="empnumber" id="employee_no" class="form-control select2">
                      </select>
                    </div>
                  </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label>From Month </label>
                        <input type="date" name="frommonth" placeholder="From Month" class="form-control" autocomplete="off" required="">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label>To Month</label>
                        <input type="date" name="tomunth" placeholder="To Month" class="form-control" autocomplete="off" required="">
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