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
                      <tr class="text-white">
                          <th scope="col">#</th>
                          <th scope="col">EmployeeNo No</th>
                          <th scope="col">fName Name</th>
                          <th scope="col">Job Tiltle</th>
                          <th scope="col">CNIC Class</th>
                          <th scope="col">Father Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Employement Group City</th>
                          <th scope="col">Grade</th>
                          <th scope="col">Department</th>
                          <th scope="col">Job Tiltle</th>
                          <th scope="col">Status</th>
                          <th scope="col">Joining Date</th>
                          <th scope="col">Contract Expiry Date</th>
                          <th scope="col">See/Change</th>
                          <th scope="col">Accept</th>
                          <th scope="col">Reject</th>
                      </tr>
                  </thead>
                  <tbody id="table-data">
                    <!-- Table rows will be populated here -->
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
   $(document).ready(function() {
  function loadTable() {
    $.ajax({
      url: "ajex/new_employeeupdate.php",
      type: "POST",
      success: function(data) {
        $("#table-data").html(data);
      }
    });
  } 

  loadTable();

  $(document).on("click", "#Accept", function() {
    var accept = $(this).data("acpt");
    $.ajax({
      url: "ajex/NEW_EMPUpdate_Accept_ajax.php",
      type: "POST",
      data: { id: accept },
      success: function(data) {
        alert(data);
          loadTable();
      }
    });
  });

  $(document).on("click", "#Reject", function() {
    var reject = $(this).data("rejc");
    var EmployeeNumber =<?php echo $_SESSION['EmployeeNumber']?>
    $.ajax({
      url: "ajex/NEW_EMPupdate_Reject_ajax.php",
      type: "POST",
      data: { id: reject,EmployeeNumber:EmployeeNumber },
      success: function(data) {
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