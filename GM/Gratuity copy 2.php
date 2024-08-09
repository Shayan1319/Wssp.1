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

              <form action="../Encashment.php" target="_blank" method="post">
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
        <select name="from" class="form-control">
            <?php
            // Query to select all unique periods
            $query = "SELECT DISTINCT Period FROM encasement ORDER BY Period DESC";
            $result = $conn->query($query);

            // Check if there are results
            if ($result->num_rows > 0) {
                // Loop through the results and create an option for each period
                echo '<option value="">Select</option>';

                while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . htmlspecialchars($row['Period']) . '">' . htmlspecialchars($row['Period']) . '</option>';
                }
            } else {
                // If no periods are found, display a message
                echo '<option value="">No periods found</option>';
            }

            // Close the database connection
            $conn->close();
            ?>
        </select>
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