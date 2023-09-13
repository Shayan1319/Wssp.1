<?php
session_start();
error_reporting(0);
// links to database
include('link/desigene/db.php');
if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber'])) {
    // Redirect to the logout page
    header("Location: ../logout.php");
    exit;
} else {
    // Your code for logged-in users goes here
    if(isset($_POST['submit'])){
        ?><script> alart ('Double check the data'); </script><?php
        $employNo = $_SESSION['EmployeeNumber'];
        $RequestNoTravel=$_GET['Rid'];
        $BillNo=$_POST['BillNo'];
        $BillDate=$_POST['BillDate'];
        $TravelAllowance=$_POST['TravelAllowance'];
        $DailyAllowance=$_POST['DailyAllowance'];
        $NightAllowance=$_POST['NightAllowance'];
        $BillStatus=$_POST['BillStatus'];
        $dateapply=date('Y-M-D');
        
        $insert = mysqli_query($conn,"INSERT INTO `tabill`( `EmployeeNo`, `RequestNoTravel`, `BillNo`, `BillDate`, `TravelAllowance`, `DailyAllowance`, `NightAllowance`, `BillStatus`,`DateofApply`) VALUES ('$employNo', '$RequestNoTravel','$BillNo','$BillDate','$TravelAllowance','$DailyAllowance','$NightAllowance','$BillStatus','$dateapply')");
        if ($insert) {
            // Insertion was successful
            ?>
            <script>
                alert("Data inserted successfully");
                location.replace("Travel_Request.php");
            </script>
            <?php
        } else {
            // Insertion failed
            echo '<script>alert("Sorry, data was not inserted: ' . mysqli_error($conn) . '");</script>';
        }  

    }
    
    ?>
<!DOCTYPE html>
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
                <div class="card-title">TA Bill</div>
                </div>
                <!-- /.card-header -->
                <div class="card-body bg-light">
                <!-- form start -->
                <form method="post" enctype="multipart/form-data">
                    <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                        <label>Bill No</label>
                        <input type="text" name="BillNo" placeholder="Bill No" class="form-control" autocomplete="off" required="">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                        <label>Bill Date</label>
                        <input type="date" name="BillDate" placeholder="Bill No" class="form-control" autocomplete="off" required="">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                        <label>Travel Allowance</label>
                        <input type="text" name="TravelAllowance" placeholder="Travel Allowance" class="form-control" autocomplete="off" required="">
                        </div>
                    </div>  
                    <div class="col-4">
                        <div class="form-group">
                        <label>Daily Allowance</label>
                        <input type="text" name="DailyAllowance" placeholder="Daily Allowance" class="form-control" autocomplete="off" required="">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                        <label>Night Allowance</label>
                        <input type="text" name="NightAllowance" placeholder="Night Allowance" class="form-control" autocomplete="off" required="">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                        <label>Bill Status</label>
                        <input type="text" name="BillStatus" placeholder="To City" class="form-control" autocomplete="off" required="">
                        </div>
                    </div>
                    <div class="col-md-12 text-end mt-2">
                        <input style="background-color: darkblue;" type="submit" class="btn text-white float-right shadow" value="Submit" name="submit">
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
</html>
<?php }?>