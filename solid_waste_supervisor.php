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
    <?php include ('link/desigene/sidebar.php')?>
<div class="container-fluid m-auto p-5">
    <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
        <h1 style="color: darkblue;">WELCOME USER NAME</h1>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
        <h2>TODAY'S ATTENDANCE</h2>
    </div>
    </div>
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
          
          </div>
          <div class="row">
          <div class="col-lg-12 col-xs-12">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>100/150</h3>
                  <h4>TOTAL ATTENDANCE</h4>
                </div>
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
              </div>
            </div><!-- ./col -->
          <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>100</h3>
                  <h4>PRESENT</h4>
                </div>
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
              </div>
            </div><!-- ./col -->
          <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>50</h3>
                  <h4>ABSENT</h4>
                </div>
                <div class="icon">
                  <i class="fa fa-ban"></i>
                </div>
              </div>
            </div><!-- ./col -->
          <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>3</h3>
                  <h4>LEAVE</h4>
                </div>
                <div class="icon">
                  <i class="fa fa-running"></i>
                </div>
              </div>
            </div><!-- ./col -->
          <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>1</h3>
                  <h4>OVER TIME</h4>
                </div>
                <div class="icon">
                  <i class="fa fa-clock"></i>
                </div>
              </div>
            </div><!-- ./col -->
          <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>0</h3>
                  <h4>DOUBLE DUTY</h4>
                </div>
                <div class="icon">
                  <i class="fa fa-gear"></i>
                </div>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
        </section>
    <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
        <h2>LEAVE REQUESTS</h2>
    </div>
    </div>
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
          </div>
          <div class="row">
          <div class="col-lg-12 col-xs-12">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>7</h3>
                  <h4>TOTAL LEAVE REQUEST</h4>
                </div>
                <div class="icon">
                  <i class="fa fa-bar-chart"></i>
                </div>
              </div>
            </div><!-- ./col -->
          <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>3</h3>
                  <h4>APROVE</h4>
                </div>
                <div class="icon">
                  <i class="fa fa-check"></i>
                </div>
              </div>
            </div><!-- ./col -->
          <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>3</h3>
                  <h4>PENDING</h4>
                </div>
                <div class="icon">
                  <i class="fa fa-clock-o"></i>
                </div>
              </div>
            </div><!-- ./col -->
          <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>1</h3>
                  <h4>REJECTED</h4>
                </div>
                <div class="icon">
                  <i class="fa fa-ban"></i>
                </div>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
        </section>
</div>


<?php include('link/desigene/script.php')?>
</body>
</html>