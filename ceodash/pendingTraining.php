<?php 
session_start();
error_reporting(0);
// links to database
include('link/desigene/db.php');
if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber']) || $_SESSION['Designation'] != 'CEO') {
  // Log the unauthorized access attempt for auditing purposes
  error_log("Unauthorized access attempt. User: {$_SESSION['loginid']}");
  
  // Redirect to the logout page
  header("Location: ../logout.php");
  exit; // Ensure that the script stops execution after the header redirection
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

   </style>
</head>
<body>
  <div id="main">
    <?php include('link/desigene/navbar.php')?>
    <div class="container-fluid m-auto p-5">
        <div class="row my-3">
            <div class="col-12 table-responsive">
                <table class="table">
                    <thead class="text-white" style="background-color: darkblue; color:white !important;">
                    <tr>
                        <th class="text-white" scope="col">#</th>
                        <th class="text-white">EmployeeNo</th>
                        <th class="text-white">Name</th>
                        <th class="text-white">Training Serial Number</th>
                        <th class="text-white">Training Name</th>
                        <th class="text-white">Institute</th>
                        <th class="text-white">City</th>
                        <th class="text-white">Institute Address</th>
                        <th class="text-white"> Oblige Sponsor</th>
                        <th class="text-white">From</th>
                        <th class="text-white">To</th>
                        <th class="text-white">Duration</th>
                        <th class="text-white" scope="col">Accept</th>
                        <th class="text-white" scope="col">Reject</th>
                    </tr>
                </thead>
                <tbody id="table-data" >

                </tbody>
                </table>
        </div>
    </div>
    </div>
  </div>
<?php include('link/desigene/script.php')?>
<?php include('../link/desigene/script.php') ?>
  <!-- jequery  -->
  <script>
    $(document).ready(function(){
      function loadTable(){
        $.ajax({
          url : "ajex/pendingTraining.php",
          type:"POST",
          success : function(data){
            $("#table-data").html(data);
          }
        });
      }
      loadTable();
      $(document).on("click", "#Accept",function(){
        var accept = $(this).data("acpt");
        $.ajax({
          url : "ajex/Accept_pendingTraining.php",
          type:"POST",
          data : {id : accept},
          success : function(data){
            alert(data);
            loadTable();
          }

        });
      });
      $(document).on("click", "#Reject",function(){
        var Reject = $(this).data("rejc");
    //   alert(Reject);
        $.ajax({
          url : "ajex/Reject_pendingTraining.php",
          type:"POST",
          data : {id : Reject},
          success : function(data){
            alert(data)
            loadTable();
          }

        });
      });
    });
    
    </script>
</body>
</html>
<?php }?>