<?php
session_start();
error_reporting(0);
// links to database
include('../hrdash/link/desigene/db.php');
if (strlen($_SESSION['loginid']==0)) {
?>   <script>
location.replace('../logout.php')
</script><?php
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
        <div class="row">
          <!-- left column -->
          <div class="col-md-12"> 
            <div class="card card-success">
              <div style="background-color: darkblue;" class="card-header  text-white fw-bold">
                <div class="card-title">Employee Pay Slip</div>
              </div>
              <!-- /.card-header -->
              <div class="card-body bg-light">
                <!-- form start -->
                <form method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label>From Month </label>
                        <input type="date" name="" placeholder="From Month" class="form-control" autocomplete="off" required="">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label>To Month</label>
                        <input type="date" name="" placeholder="To Month" class="form-control" autocomplete="off" required="">
                      </div>
                    </div>
                    <div class="col-md-12 text-end mt-2">
                      <input style="background-color: darkblue;" type="submit" class="btn text-white float-right shadow" value="Submit" name="saveUser1">
                    </div>
                    </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- Col-12 -->
        </div>
      </div>
    </div>
      <?php include('link/desigene/script.php')?>
  </body>
</html><?php }?>