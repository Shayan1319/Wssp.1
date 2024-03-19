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
                    <thead class="text-white" style="background-color: darkblue;">
                    <tr>
                        <th scope="col">#</th>
                        <th>EmployeeNo</th>
                        <th>fName</th>
                        <th>Qualification</th>
                        <th>Grade</th>
                        <th>Passing</th>
                        <th>Last</th>
                        <th>PEC</th>
                        <th>Institute</th>
                        <th>Major</th>
                        <th>Remarks</th>
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
          url : "ajex/pendingQualification.php",
          type:"POST",
          success : function(data){
            $("#table-data").html(data);
          }
        });
      }
      loadTable();
      
      $(document).on("click", "#Accept", function () {
    var acceptId = $(this).data("acpt");
    // alert(acceptId);
    $.ajax({
        url: "ajex/Accept_pendingQualification.php",
        type: "POST",
        data: { id: acceptId },
        success: function (data) {
            alert(data); // Show the data in an alert
            loadTable();
        },
    });
});


$(document).on("click", "#Reject", function () {
    var rejectId = $(this).data("rejc");

    $.ajax({
        url: "ajex/Reject_pendingQualification.php",
        type: "POST",
        data: { id: rejectId },
        success: function (data) {
            alert(data); // Show the data in an alert
        },
        error: function (xhr, status, error) {
            console.error("AJAX error:", status, error);
            alert("Error in AJAX request");
        }
    });
});
    });
    
    </script>
</body>
</html>
<?php }?>