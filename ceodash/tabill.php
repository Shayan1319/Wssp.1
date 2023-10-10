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
} else {
   
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
            <div class="col-12">
                <table class="table">
                    <thead class="text-white" style="background-color: darkblue;">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Employee No</th>
                        <th scope="col">Employee Name</th>
                        <th scope="col">Designation</th>
                        <th scope="col">Employee Class</th>
                        <th scope="col">Travel request number</th>
                        <th scope="col">Travel Allowance</th>
                        <th scope="col">Daily Allowance</th>
                        <th scope="col">Night Allowance</th>
                        <th scope="col">Bill Status</th>
                        <th scope="col">Date of Apply</th>
                        <th scope="col">Accept</th>
                        <th scope="col">Reject</th>
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
          url : "ajex/emptabillpen.php",
          type:"POST",
          success : function(data){
            $("#table-data").html(data);
          }
        });
      }
      loadTable();
      $(document).on("click", "#Accept",function(){
        var accept = $(this).data("acpt");
    //   alert(accept);
        $.ajax({
          url : "ajex/Accept_tabill_ajax.php",
          type:"POST",
          data : {id : accept},
          success : function(data){
            if(data == 1){
            loadTable();
            }
            else{
              alert ("Can't Save Record");
            }
          }

        });
      });
      $(document).on("click", "#Reject",function(){
        var Reject = $(this).data("rejc");
    //   alert(Reject);
        $.ajax({
          url : "ajex/Reject_tabill_ajax.php",
          type:"POST",
          data : {id : Reject},
          success : function(data){
            if(data == 1){
            loadTable();
            }
            else{
              alert ("Can't Save Record");
            }
          }

        });
      });
    });
    
    </script>
</body>
</html>
<?php }?>