<?php
session_start();
error_reporting(0);
// links to database
include('../link/desigene/db.php');
if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber']) || $_SESSION['Designation'] != 'Internal Auditor') {
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
              <form action="../Encashment.php" target="_blank" method="post">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label>Employee No</label>
                      <select name="employee_no" id="employee_no" class="form-control select2">
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6 my-4">
                      <label>From Month</label>
                      <div class="form-group">
                        <input type="date" class="form-control" name="from" id="">
                      </div>
                  </div>
                  <div class="col-md-6 my-4">
                      <div class="form-group">
                        <label>To Month</label>
                        <div class="form-group">
                        <input type="date" class="form-control" name="to" id="">
                        </div>
                      </div>
                  </div> 
                  <div class="col-md-12 text-end mt-2">
                    <input style="background-color: darkblue;" type="submit" name="Gratuity" id="Gratuity" class="btn text-white float-right shadow" value="Gratuity">
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