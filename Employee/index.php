<?php
session_start();
error_reporting(0);
include('link/desigene/db.php');
if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber'])) {
    ?>   <script>
        location.replace('../logout.php')
    </script><?php
  } else{
    include '../Calendar.php';
    $date= date("Y/m/d") ;
$calendar = new Calendar($date);
// $calendar->add_event('^', $date, 1, 'green');
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <?php include ('link/links.php')?>
</head>
<style>
    .calendar {
    display: flex;
    flex-flow: column;
}
.calendar .header .month-year {
    font-size: 20px;
    font-weight: bold;
    color: #636e73;
    padding: 10px;
}
.calendar .days {
    display: flex;
    flex-flow: wrap;
}
.calendar .days .day_name {
    width: calc(100% / 7);
    border-right: 1px solid #2c7aca;
    padding: 8px;
    text-transform: uppercase;
    font-size: 12px;
    font-weight: bold;
    color: #818589;
    color: #fff;
    background-color: #448cd6;
}
.calendar .days .day_name:nth-child(7) {
    border: none;
}
.calendar .days .day_num {
    display: flex;
    flex-flow: column;
    width: calc(100% / 7);
    border-right: 1px solid #e6e9ea;
    border-bottom: 1px solid #e6e9ea;
    padding: 15px;
    font-weight: bold;
    color: #7c878d;
    cursor: pointer;
    min-height: fit-content;
}
.calendar .days .day_num span {
    display: inline-flex;
    width: 30px;
    font-size: 14px;
}
.calendar .days .day_num .event {
    margin-top: 10px;
    font-weight: 500;
    font-size: 14px;
    padding: 3px 6px;
    border-radius: 4px;
    background-color: #f7c30d;
    color: #fff;
    word-wrap: break-word;
}
.calendar .days .day_num .event.green {
    background-color: #51ce57;
}
.calendar .days .day_num .event.blue {
    background-color: #518fce;
}
.calendar .days .day_num .event.red {
    background-color: #ce5151;
}
.calendar .days .day_num:nth-child(7n+1) {
    border-left: 1px solid #e6e9ea;
}
.calendar .days .day_num:hover {
    background-color: #fdfdfd;
}
.calendar .days .day_num.ignore {
    background-color: #fdfdfd;
    color: #ced2d4;
    cursor: inherit;
}
.calendar .days .day_num.selected {
    background-color: #0d6efd;
  cursor: inherit;
  color: #fff;
}
</style>
<body>
<div id="main">
<?php include('link/desigene/navbar.php')?>
        <div class="container-fluid m-auto p-5">
            <div class="row">
                <?php 
                $Empod = $_SESSION['EmployeeNumber'];
                $select = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `EmployeeNo` = $Empod");
            
                if (mysqli_num_rows($select) > 0) {
                    while ($row = mysqli_fetch_array($select)) {
                        
                
                ?>
                <div class="col-sm-12 col-lg-5 col-md-5 my-4 p-3">
                    <div class="row bg-light">
                        <div class="col-4">
                            <img class="w-100" src="image/download.jfif" alt="">
                        </div>
                        <div class="col-8">
                            <h3>Employee Details</h3>
                            <p class="fs-5">Name</p>
                            <p class="fs-5">Email</p>
                            <p class="fs-5">Phone</p>
                            <h3>Manger Details</h3>
                            <p class="fs-5">Name : <?php echo $row['fName']?> <?php echo $row['mName']?> <?php echo $row['lName']?></p>
                            <p class="fs-5">Email : <?php echo $row['email']?></p>
                            <p class="fs-5">Phone : <?php echo $row['mNumber']?></p>
                            <p class="fs-5">Address : <?php echo $row['pAddress']?></p>
                            <p class="fs-5">Religion : <?php echo $row['religion']?></p>
                            <p class="fs-5">Blood group : <?php echo $row['BlGroup']?></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-4 col-md-4 my-4  p-2">
                   
                <div class="content home">
                    <?php echo $calendar?>
                </div>  
                </div>
                <div class="col-sm-12 col-lg-3 col-md-3 my-4  p-2">
                    <div class="bg-light h-100">
                            <div class="col-12">
                                <label class="fs-6 fw-bolder" for="">Up Coming Events</label>
                            </div>
                            <div class="col-12" style="overflow: scroll;height: 90%;">
                                <div class="card text-bg-primary mb-3">
                                    <div class="card-header">Header</div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3 col-md-3 h-50  my-4  p-2 bg-light ">
                    <h5 style="color: rgb(60, 59, 59);"><b>Basic Information</b></h5>
                    <div class="row">
                        <div class="col-4">
                            <h6 style="color:rgb(4, 111, 218);">Hire date</h6>
                            <h6 style="color:rgb(255, 254, 253); background-color:rgb(11, 102, 171) ;"><?php echo $row['Joining_Date']?></h6>
                        </div>
                        <div class="col-4">
                            <h6 style="color:rgb(4, 111, 218);">Contract expiry date</h6>
                            <h6 style="color:rgb(255, 254, 253); background-color:rgb(11, 102, 171) ;"><?php echo $row['Contract_Expiry_Date']?></h6>
                        </div>
                        <div class="col-4">
                            <h6 style="color:rgb(4, 111, 218);">Last Working Date</h6>
                            <h6 style="color:rgb(255, 254, 253); background-color:rgb(11, 102, 171) ;"><?php echo $row['Last_Working_Date']?></h6>
                        </div>
                        <br>
                    </div>
                    <br>
                    <hr>
                    <h5 style="color: rgb(60, 59, 59);"><b>Basic Information</b></h5>
                    <div class="row">
                        <div class="col-6">
                            <h6 style="color:rgb(4, 111, 218);">Addree</h6>
                            <h6 style="color:rgb(4, 111, 218);"><?php echo $row['pAddress']?></h6>
                        </div>
                        <div class="col-6">
                            <h6 style="color:rgb(4, 111, 218);">Date of birth</h6>
                            <h6 style="color:rgb(4, 111, 218);"><?php echo $row['DofBc']?></h6>
                        </div>
                        <br>
                    </div>
                    <br>
                    <hr>
                    <h5 style="color: rgb(60, 59, 59);"><b>Occupation information</b></h5>
                    <div class="row">
                        <div class="">
                            <i class="fa-solid fa-clock"></i>
                            <h6 style="color:rgb(4, 111, 218);"><?php echo $row['Weekly_Working_Days']?></h6>
                        </div>
                        <br>
                    </div>
                    <br>
                    <hr>
                </div>
                <div class="col-sm-12 col-lg-8 col-md-8 m-4 bg-light "><iframe class="chartjs-hidden-iframe" style="display: block; overflow: hidden; border: 0px; margin: 0px; inset: 0px; width: 100%; position: absolute; pointer-events: none; z-index: -1;" tabindex="-1"></iframe>
                    <canvas id="myChart" class="w-100 " style=" display: block;"></canvas>
                    <script>
                        var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
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
                <?php }}else{ echo "data don't exet";}?>
            </div>
        </div>
</div>

<?php include('link/desigene/script.php')?>
<?php include('../link/desigene/script.php')?>
</body>
</html>
<?php }?>
