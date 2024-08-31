<?php 
session_start();
error_reporting(0);
// links to database
include('../link/desigene/db.php');
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
                          <th class="text-white" scope="col">#</th>
                          <th class="text-white" scope="col">EmployeeNo No</th>
                          <th class="text-white" scope="col">fName Name</th>
                          <th class="text-white" scope="col">Job Title</th>
                          <th class="text-white" scope="col">CNIC Class</th>
                          <th class="text-white" scope="col">Father Name</th>
                          <th class="text-white" scope="col">Email</th>
                          <th class="text-white" scope="col">Employment Group City</th>
                          <th class="text-white" scope="col">Grade</th>
                          <th class="text-white" scope="col">Department</th>
                          <th class="text-white" scope="col">Job Title</th>
                          <th class="text-white" scope="col">Status</th>
                          <th class="text-white" scope="col">Joining Date</th>
                          <th class="text-white" scope="col">Contract Expiry Date</th>
                          <th class="text-white" scope="col">See/Change</th>
                          <th class="text-white" scope="col">Accept</th>
                          <th class="text-white" scope="col">Reject</th>
                      </tr>
                  </thead>
                  <tbody id="table-data">
                  </tbody>

                </table>
        </div>
    </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
  $(document).ready(function() {
    function loadTable() {
        $.ajax({
            url: "ajex/new_employeeupdate.php",
            type: "GET",
            success: function(data) {
                $("#table-data").html(data);
            }
        });
    } 

    loadTable();

    $(document).on("click", ".accept-btn", function() {
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

    $(document).on("click", ".reject-btn", function() {
        var reject = $(this).data("rejc");
        var EmployeeNumber = <?php echo $_SESSION['EmployeeNumber']; ?>;
        $.ajax({
            url: "ajex/NEW_EMPupdate_Reject_ajax.php",
            type: "POST",
            data: { id: reject, EmployeeNumber: EmployeeNumber },
            success: function(data) {
                alert(data);
                loadTable();
            }
        });
    });
});

    </script>
</body>
</html>
<?php }?>