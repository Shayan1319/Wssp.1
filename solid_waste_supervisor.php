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
          <div class="col-lg-3 col-xs-12">
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
              <div class="small-box bg-blue">
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
              <div class="small-box bg-purple">
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
          <div class="col-lg-3 col-xs-12">
              <!-- small box -->
              <div class="small-box bg-orange">
                <div class="inner">
                  <h3>7</h3>
                  <h4>TOTAL LEAVE REQUEST</h4>
                </div>
                <div class="icon">
                  <i class="fa fa-bar-chart"></i>
                </div>
              </div>
            </div><!-- ./col -->
          <div class="col-lg-3 col-xs-6">
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
          <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-blue">
                <div class="inner">
                  <h3>3</h3>
                  <h4>PENDING</h4>
                </div>
                <div class="icon">
                  <i class="fa fa-clock-o"></i>
                </div>
              </div>
            </div><!-- ./col -->
          <div class="col-lg-3 col-xs-6">
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
        <div class="row">
            <div class="col-sm-12 col-lg-6 col-md-6">
                    <div class="p-4"><iframe class="chartjs-hidden-iframe" style="display: block; overflow: hidden; border: 0px none; margin: 0px; inset: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;" tabindex="-1"></iframe>
                        <canvas id="myChart" style="width: 520px; max-width: 600px; display: block; height: 259px;" width="780" height="388"></canvas>
                        <script>
                            var xValues = ["Item1", "Item2", "Item3", "Item4", "Item5"];
                            var yValues = [55, 49, 44, 24, 20];
                            var barColors = ["red", "green", "blue", "orange", "brown"];

                            new Chart("myChart", {
                                type: "bar",
                                data: {
                                    labels: xValues,
                                    datasets: [{
                                        backgroundColor: barColors,
                                        data: yValues
                                    }]
                                },
                                options: {
                                    legend: {
                                        display: false
                                    },
                                    title: {
                                        display: true,
                                        text: ""
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6 col-md-6">
                    <div class="p-4"><iframe class="chartjs-hidden-iframe" style="display: block; overflow: hidden; border: 0px none; margin: 0px; inset: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;" tabindex="-1"></iframe>

                        <canvas id="myChart1" style="width: 400px; max-width: 400px; display: block; height: 400px;" width="600" height="600"></canvas>

                        <script>
                            var xValues = ["type1", "type2", "type3", "type4", "type5"];
                            var yValues = [55, 49, 44, 24, 15];
                            var barColors = [
                                "#b91d47",
                                "#00aba9",
                                "#2b5797",
                                "#e8c3b9",
                                "#1e7145"
                            ];

                            new Chart("myChart1", {
                                type: "pie",
                                data: {
                                    labels: xValues,
                                    datasets: [{
                                        backgroundColor: barColors,
                                        data: yValues
                                    }]
                                },
                                options: {
                                    title: {
                                        display: true,
                                        text: ""
                                    }
                                }
                            });
                        </script>

                    </div>
                </div>
            </div>
</div>
<?php include('link/desigene/script.php')?>
</body>
</html>