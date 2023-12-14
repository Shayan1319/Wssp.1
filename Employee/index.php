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
    $currentMonth = date('m'); // Get the current month
    $currentYear = date('Y'); // Get the current year

$calendar = new Calendar($date);
$empid= $_SESSION['EmployeeNumber'];
// $calendar->add_event('^', $date, 1, 'green');
$selecttime = mysqli_query($conn, "SELECT `ID`, `FromDate`, `ToDate`, `WrokingDays` FROM `timeperiod` WHERE `ID`='1' # ORDER BY `ID` DESC LIMIT 1");

while ($rowtime = mysqli_fetch_array($selecttime)) {
   $fromdate= $rowtime['FromDate'];
   $todate= $rowtime['ToDate'];
   $workingdate= $rowtime['WrokingDays'];
}
$query = "SELECT COUNT(*) as total_attendees FROM atandece # WHERE `Employeeid`='$empid' AND `Date`>='$fromdate' AND `Date`<='$todate' AND `status`='PTESENT'";
$resultatd = mysqli_query($conn, $query);
if($rowatd = mysqli_fetch_assoc($resultatd)){
    $total_attendees = $rowatd['total_attendees'];
} 
else{
    $total_attendees = 0;
}
$sqltrl = "SELECT COUNT(*) AS TravelReq FROM `travelrequest` WHERE `DepartureOn`>='$fromdate' AND `DepartureOn`<='$todate' AND `EmployeeNo`='$empid'";
$resulttrl = $conn->query($sqltrl);
if ($resulttrl->num_rows > 0) {
    $rowtrl = $resulttrl->fetch_assoc();
    $TravelReq = $rowtrl['TravelReq'];
} else {
    $TravelReq = 0;
}
$sqlleave = "SELECT COUNT(*) as totalAcceptLeaves FROM atandece WHERE `Employeeid`='$empid' AND `Date`>='$fromdate' AND `Date`<='$todate'  AND `status`='LEAVE'";
$resultleave = $conn->query($sqlleave);

if ($resultleave->num_rows > 0) {
    $rowleave = $resultleave->fetch_assoc();
    $totalAcceptLeaves = $rowleave['totalAcceptLeaves'];
} else {
    $totalAcceptLeaves = 0;
}

$sql = "SELECT COUNT(*) as employeeCountOVERTIME FROM atandece WHERE `Employeeid`='$empid' AND `Date`>='$fromdate' AND `Date`<='$todate' AND `DDorOT`='OVERTIME'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $employeeCountOVERTIME = $row['employeeCountOVERTIME'];
} else {
    $employeeCountOVERTIME = 0;
}

$sql = "SELECT COUNT(*) as employeeCountDDorOT FROM atandece WHERE `Employeeid`='$empid' AND `Date`>='$fromdate' AND `Date`<='$todate' AND `DDorOT`='DOUBLE DUTY'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $employeeCountDDorOT = $row['employeeCountDDorOT'];
} else {
    $employeeCountDDorOT = 0;
}

?>
<script> 
var total_attendees= <?php echo $total_attendees?>;
var TravelReq= <?php echo  $TravelReq?>;
var totalAcceptLeaves= <?php echo $totalAcceptLeaves?>;
var employeeCountOVERTIME= <?php echo $employeeCountOVERTIME?>;
var employeeCountDDorOT= <?php echo $employeeCountDDorOT?>;
</script>
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
                            <img class="w-100" src="../image/<?php echo $row['image']?>" alt="">
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
                    <?php  
                        $selectanndata = mysqli_query($conn,"SELECT * FROM `announcement` WHERE MONTH(`ceodata`) = MONTH(CURDATE()) AND YEAR(`ceodata`) = YEAR(CURDATE());");
                        while($rowanndata=mysqli_fetch_array($selectanndata)){   
                        }
                         echo $calendar?>
                    </div>  
                </div>
                <div class="col-sm-12 col-lg-3 col-md-3 my-4  p-2">
                    <div class="bg-light h-100">
                            <div class="col-12">
                                <label class="fs-6 fw-bolder" for="">Up Coming Events</label>
                            </div>
                            <div class="col-12" style="overflow: scroll;height: 90%;">
                                <?php  
                                $selectann = mysqli_query($conn,"SELECT * FROM `announcement` WHERE MONTH(`ceodata`) = MONTH(CURDATE()) AND YEAR(`ceodata`) = YEAR(CURDATE());");
                                while($rowann=mysqli_fetch_array($selectann)){
                                ?>
                                <div class="card text-bg-primary mb-3">
                                    <button type="button" id="seeall" class="btn w-100" data-bs-toggle="modal"  data-eid="<?php echo $rowann['id'] ?>" data-bs-target="#exampleModal">
                                        <div class="card-header"><?php echo $rowann['Subject']?></div>
                                    </button>
                                </div>
                                <?php }?>
                            </div>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" id="table-time" >

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                    </div>
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
                            <h6 style="color:rgb(4, 111, 218);"><?php echo $row['Weekly_Working_Days']?> days/week</h6>
                        </div>
                        <br>
                    </div>
                    <br>
                    <hr>
                </div>
                <div class="col-sm-12 col-lg-8 col-md-8 m-4 bg-light "><iframe class="chartjs-hidden-iframe" style="display: block; overflow: hidden; border: 0px; margin: 0px; inset: 0px; width: 100%; position: absolute; pointer-events: none; z-index: -1;" tabindex="-1"></iframe>
                    <canvas id="myChart" class="w-100 " style=" display: block;"></canvas>
                    <script>
                        var xValues = ["Total Attendees", "Travel Request", "Total Accept Leaves", "Employee Count OVERTIME", "Employee Count Double Duty"];
                        var yValues = [total_attendees, TravelReq, totalAcceptLeaves, employeeCountOVERTIME, employeeCountDDorOT];
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
                    $(document).ready(function(){
                        $(document).on("click", "#seeall",function(){
                            var update = $(this).data("eid");
                            $.ajax({
                            url : "ajex/announcement.php",
                            type:"POST",
                            data : {id : update},
                            success : function(data){
                                $("#table-time") .html(data) ;
                            }
                            });
                        });
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
