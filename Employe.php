<?php
session_start();
error_reporting(0);
// links to database

if ($_SESSION['loginid'] == 0) {
?>   
    <script>
        location.replace('../logout.php')
    </script>
<?php
}
?><!DOCTYPE html>
<html lang="en">
<head>
   <?php include ('link/links.php')?>
</head>
<body>
<div id="main">
<?php include('link/desigene/navbar.php')?>
<div class="container-fluid m-auto p-5">
            <div class="row">
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
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-4 col-md-4 my-4  p-2">
                   <div id='fullDiv'class="bg-light" >
                        <ul>
                            <li>SUN</li>
                            <li>MON</li>
                            <li>TUE</li>
                            <li>WED</li>
                            <li>THUR</li>
                            <li>FRI</li>
                            <li>SAT</li>
                            <li>1</li>
                            <li>2</li>
                            <li>3</li>
                            <li>4</li>
                            <li>5</li>
                            <li>6</li>
                            <li>7</li>
                            <li>8</li>
                            <li>9</li>
                            <li>10</li>
                            <li>11</li>
                            <li>12</li>
                            <li>13</li>
                            <li>14</li>
                            <li>15</li>
                            <li>16</li>
                            <li>17</li>
                            <li>18</li>
                            <li>19</li>
                            <li>20</li>
                            <li>21</li>
                            <li>22</li>
                            <li>23</li>
                            <li>24</li>
                            <li>25</li>
                            <li>26</li>
                            <li>27</li>
                            <li>28</li>
                            <li>29</li>
                            <li>30</li>
                            <li>31</li>
                            <li>1</li>
                            <li>2</li>
                            <li>3</li>
                            <li>4</li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3 col-md-3 my-4 p-2">
                    <div class="bg-light h-100">
                        <div class="my-1 row"> 
                            <div class="col-12">
                                <label class="fs-6 fw-bolder" for="">Up Coming Events</label>
                            </div>
                            <div class="col-12" style="overflow: scroll;height: 170px;">
                                <div class="card text-bg-primary mb-3" style="max-width: 18rem;">
                                    <div class="card-header">Header</div>
                                </div>
                                <div class="card text-bg-secondary mb-3" style="max-width: 18rem;">
                                    <div class="card-header">Header</div>
                                </div>
                                <div class="card text-bg-success mb-3" style="max-width: 18rem;">
                                    <div class="card-header">Header</div>
                                </div>
                                <div class="card text-bg-danger mb-3" style="max-width: 18rem;">
                                    <div class="card-header">Header</div>
                                </div>
                                <div class="card text-bg-warning mb-3" style="max-width: 18rem;">
                                    <div class="card-header">Header</div>
                                </div>
                                <div class="card text-bg-info mb-3" style="max-width: 18rem;">
                                    <div class="card-header">Header</div>
                                </div>
                                <div class="card text-bg-light mb-3" style="max-width: 18rem;">
                                    <div class="card-header">Header</div>
                                </div>
                                <div class="card text-bg-dark mb-3" style="max-width: 18rem;">
                                    <div class="card-header">Header</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-4 col-md-4  bg-light ">
                    <h5 style="color: rgb(60, 59, 59);"><b>Basic Information</b></h5>
                    <div class="row">
                       <div class="col-4">
                            <h6 class="fs-5" style="color:rgb(4, 111, 218);">Hire date</h6>
                            <h6 class="fs-5" style="color:rgb(255, 254, 253); background-color:rgb(11, 102, 171) ;">1/2023</h6>
                        </div>
                         <div class="col-4">
                            <h6 class="fs-5" style="color:rgb(4, 111, 218);">Work for</h6>
                            <h6 class="fs-5" style="color:rgb(255, 254, 253); background-color:rgb(11, 102, 171) ;">TMA/WSSC</h6>
                        </div>
                        
                        <div class="col-4">
                            <h6 class="fs-5" style="color:rgb(4, 111, 218);">Day of Retirement</h6>
                            <h6 class="fs-5" style="color:rgb(255, 254, 253); background-color:rgb(11, 102, 171) ;">1/2024</h6>
                        </div>
                        <br>
                    </div>
                    <br>
                    <hr>
                    <h5 style="color: rgb(60, 59, 59);"><b>Personal Information</b></h5>
                    <div class="row">
                        <div class="col-6">
                            <h6 class="fs-5" style="color:rgb(4, 111, 218);">Birth date</h6>
                            <h6 class="fs-5" style="color:#000;">8/1999</h6>
                        </div>
                        <div class="col-6">
                            <h6 class="fs-5" style="color:rgb(4, 111, 218);">Address</h6>
                            <h6 class="fs-5" style="color:#000;">Address</h6>
                        </div>
                        <br>
                    </div>
                    <br>
                    <hr>
                    <h5 style="color: rgb(60, 59, 59);"><b>Occupation information</b></h5>
                    <div class="row">
                        <div class="col-4 p-1">
                            <i class="fa-solid fa-clock"></i>
                            <h6 class="fs-5" style="color:rgb(4, 111, 218);">Full time</h6>
                        </div>
                        <div class="col-4 p-1">
                        <i style='font-size:24px' class='fas'>&#xf7d9;</i>
                            <h6 class="fs-5" style="color:rgb(4, 111, 218);">Designation</h6>
                        </div>
                        <div class="col-4 p-1">
                        <i style='font-size:24px' class='fas'>&#xf3c5;</i>
                            <h6 class="fs-5" style="color:rgb(4, 111, 218);">Location</h6>
                        </div>
                        <br>
                    </div>
                    <br>
                    <hr>
                </div>
                <div class="col-sm-12 col-lg-7 col-md-7 m-4 bg-light ">
                    <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                    <script>
                        var xValues =  ["Sun", "Mon", "Tue", "Wed", "Thur", "Fri", "Sat"];
                        var yValues = [55, 55, 55, 55, 55, 55, 55];
                        var barColors = ["red", "green", "blue", "orange", "brown", "black", "yellow"];

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
        </div>
    
</div>


<?php include('link/desigene/script.php')?>
</body>
</html>