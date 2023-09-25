<?php
// session_start();
session_start();
error_reporting(0);
// links to database
include('link/desigene/db.php');

if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber'])) {
    ?>   <script>
        location.replace('../logout.php')
    </script><?php
  } else{

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <?php include ('link/links.php')?>
</head>
<body>
    <?php include ('link/desigene/sidebar.php')?>
<div id="main">
<?php include('link/desigene/navbar.php')?>
<div class="container-fluid m-auto p-5">
    <div class="row">
    <div class="col-lg-4 col-xs-12">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                <h3>#</h3>
                  <h4>Employee Clearance Form</h4>
                </div>
                <div class="icon">
                <i class="fa-solid fa-person-walking-dashed-line-arrow-right"></i>
                </div>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-12">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                <h3>#</h3>
                  <h4>Employee Clearance Form</h4>
                </div>
                <div class="icon">
                <i class="fa-solid fa-person-walking-dashed-line-arrow-right"></i>
                </div>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-12">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                <h3>#</h3>
                  <h4>Employee Clearance Form</h4>
                </div>
                <div class="icon">
                <i class="fa-solid fa-person-walking-dashed-line-arrow-right"></i>
                </div>
              </div>
            </div><!-- ./col -->
    </div>
</div>


<?php include('link/desigene/script.php')?>
</body>
</html>
<?php 
}
?>