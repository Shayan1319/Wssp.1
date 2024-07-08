<?php
session_start();
error_reporting(0);
include('link/desigene/db.php');

if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber']) || $_SESSION['Designation'] != 'CEO') {
  error_log("Unauthorized access attempt. User: {$_SESSION['loginid']}");
  header("Location: ../logout.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <?php include ('link/links.php') ?>
</head>
<style>
    .select2-selection__rendered {
      line-height: 31px !important;
    }
    .select2-container .select2-selection--single {
      height: 35px !important;
      border: 1px solid #ced4da;
      border-radius: 0px;
      width: 300px !important;
    }
    .select2-selection__arrow {
      height: 34px !important;
    }
</style>
<body>
    <div id="main">
      <?php include('link/desigene/navbar.php') ?> 
        <div class="container-fluid">
          <div class="row my-4">
            <div id="table-data" class="w-25 my-5"></div>
            <div class="" id="emp-data"></div>
          </div>
        </div>
    </div>
    <script>
$(document).ready(function() {
  function loaddateForDate() {
    $.ajax({
      url: "ajex/dateempupdate.php",
      type: "POST",
      data: {id: <?php echo $_GET['id']?>},
      success: function(data) {
        $("#table-data").html(data);
      }
    });
  }
  function loaddateForEmpData(date) {
        $.ajax({
          url: "ajex/empdata.php",
          type: "POST",
          data: { date: date, id: <?php echo $_GET['id']?>},
          success: function(data) {
            $("#emp-data").html(data);
          }
        });
      }

      // Load all employees initially
      loaddateForEmpData('');

      $(document).on('change', '#date', function() {
    var date = $(this).val();
    loaddateForEmpData(date);
  });
      loaddateForEmpData('');
      loaddateForDate();
});
</script>
  <?php include('link/desigene/script.php') ?>
</body>
</html>
