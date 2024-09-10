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
    
<link rel="stylesheet" href="../dist/select2/select2.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../dist/select2/select2.min.js"></script>
  </head>
  <body>
    <div id="main">
      <?php include('link/desigene/navbar.php')?>
            <div class="container-fluid m-auto py-5">
              <form action="Encashment.php"  method="post">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label>Employee No</label>
                      <select name="employee_no" id="employee_no" class="form-control select2">
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12 text-end mt-2">
                    <input style="background-color: darkblue;" type="submit" name="Gratuity" id="Gratuity" class="btn text-white float-right shadow" value="Gratuity">
                  </div>
                </div>
              </form>
              <form action="Encashment.php"  method="post">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label>Employee No</label>
                      <select name="employee_no" id="employee_No" class="form-control select2">
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6 my-4">
                      <label>From Year</label>
                      <div class="form-group">
                      <?php
$startYear = 1900;
$endYear = date('Y'); // Current year

echo '<select class="form-select" name="from">';
for ($year = $endYear; $year >= $startYear; $year--) {
    echo "<option value=\"$year\">1-jul-$year</option>";
}
echo '</select>';
?>


                      </div>
                  </div>
                  <div class="col-md-6 my-4">
                      <div class="form-group">
                        <label>To year</label>
                        <div class="form-group">
                        <?php
$startYear = 1900;
$endYear = date('Y'); // Current year

echo '<select class="form-select" name="to">';
for ($year = $endYear; $year >= $startYear; $year--) {
    echo "<option value=\"$year\">30-jun-$year</option>";
}
echo '</select>';
?>


                        </div>
                      </div>
                  </div> 
                  <div class="col-md-12 text-end mt-2">
                    <input style="background-color: darkblue;" type="submit" name="Encashment" id="Encashment" class="btn text-white float-right shadow" value=" Leave Encasement">
                  </div>
                </div>
              </form>
            </div>
          </div>
      <?php include('link/desigene/script.php')?>
      <script>
    var addSerial = 0;
    $(function() {
      $(".select2").select2();
    });
$(document) .ready(function(){
  function load_Gra(){
    $.ajax({
      url : "ajex/empidpay.php",
      type : "POST",
    success : function(data){
    $("#employee_no") .html(data) ;
    }});
    }
    load_Gra();
    function load_Enc(){
    $.ajax({
      url : "ajex/empidpay.php",
      type : "POST",
    success : function(data){
    $("#employee_No") .html(data) ;
    }});
    }
    load_Enc();
});

</script>
  </body>
</html><?php }?>