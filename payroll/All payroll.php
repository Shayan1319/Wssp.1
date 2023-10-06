<?php
session_start();
error_reporting(0);
// links to database
include('../hrdash/link/desigene/db.php');
if (strlen($_SESSION['loginid']==0)) {
?>   <script>
location.replace('../logout.php')
</script><?php
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
        <form action="ajex/exselPayroll.php" method="post">

          <div class="row">
            <!-- left column -->
            <div class="col-md-12"> 
              <div class="card card-success">
                <div style="background-color: darkblue;" class="card-header  text-white fw-bold">
                  <div class="card-title">Employee Pay Slip</div>
              </div>
              <!-- /.card-header -->
              <div class="card-body bg-light">
                  <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label>Employee No</label>
                      <select name="employee_no" id="employee_no"  class="form-control select2">
                      </select>
                    </div>
                  </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label>From Month </label>
                        <input type="date" id="frommonth" name="frommonth" placeholder="From Month" class="form-control" autocomplete="off" required="">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label>To Month</label>
                        <input type="date" id="tomunth" name="tomunth" placeholder="To Month" class="form-control" autocomplete="off" required="">
                      </div>
                    </div>
                    <div class="col-md-12 text-end mt-2">
                      <input style="background-color: darkblue;" id="See" class="btn text-white float-right shadow" value="Search">
                    </div>
                    </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- Col-12 -->
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
                         
                          <th>Total</th>
                      </tr>
                  </thead>
                  <tbody id="employee_pay" >

                  </tbody>
                    </table>
                  </div>
                  <div class="col-md-1">
                    <div class="form-group">
                      <div class="clearfix">&nbsp;</div>
                      <button type="submit" id="submit" name="submit" style="background-color: darkblue;" class="btn btn-primary">Save</button>
                    </div>
                  </div>
                </div>
      
    </div>
  </div>
          </div>
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
    $("#See").on("click",function(e){
        e.preventDefault();
        var employee_no = $("#employee_no").val();
        var frommonth = $("#frommonth").val();
        var tomunth = $("#tomunth").val();
        $.ajax({
          url:"ajex/ajax-get-payroll.php",
          type:"Post", 
          data:{employee_no:employee_no,frommonth:frommonth,tomunth:tomunth},
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