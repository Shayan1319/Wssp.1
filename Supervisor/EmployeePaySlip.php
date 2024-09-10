<?php
session_start();
error_reporting(0);
// links to database
include('../link/desigene/db.php');
if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber'])) {
  error_log("Unauthorized access attempt. User: {$_SESSION['loginid']}");
  header("Location: ../logout.php");
  exit;
} else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include ('link/links.php')?>
    <link rel="stylesheet" href="../dist/select2/select2.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../dist/select2/select2.min.js"></script>
</head>
<body>
    <div id="main">
        <?php include('link/desigene/navbar.php')?>
        <div class="container-fluid m-auto py-5">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12"> 
                    <div class="card card-success">
                        <div style="background-color: darkblue;" class="card-header text-white fw-bold">
                            <div class="card-title">Employee Pay Slip</div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body bg-light">
                            <!-- form start -->
                            <form method="post" target="_blank" action="../printpayroll.php" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Employee No</label>
                                            <div class="col-md-4 my-2">
                                                <label for="empnumber">Employee Id</label>
                                                <select name="empnumber" id="empnumber" class="form-control select2">
                                                    <?php
                                                    $Employee_Manager = $_SESSION['EmployeeNumber'];
                                                    $selectempdata = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `Status`='ON-DUTY' AND `Attendance_Supervisor`=$Employee_Manager");
                                                    if (mysqli_num_rows($selectempdata) > 0) {
                                                        echo '<option value="">Select</option>';
                                                        while ($rowempdata = mysqli_fetch_assoc($selectempdata)) {
                                                            echo '<option value="' . htmlspecialchars($rowempdata['EmployeeNo'], ENT_QUOTES) . '">' . htmlspecialchars($rowempdata['EmployeeNo'], ENT_QUOTES) . '</option>';
                                                        }
                                                    } else {
                                                        echo '<option value="">No employees found</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 my-4">
                                        <div class="form-group">
                                            <label>From Month </label>
                                            <select name="frommonth" required id="timeperiod" class="form-control select2">
                                                <?php
                                                $select = mysqli_query($conn, "SELECT * FROM `timeperiod` WHERE `HRStatus`='ACCEPT' ORDER BY `ID` DESC");
                                                if (mysqli_num_rows($select) > 0) {
                                                    echo '<option value="">Select</option>';
                                                    while ($row = mysqli_fetch_assoc($select)) {
                                                        $formattedDate = date('d-M-Y', strtotime($row['FromDate']));
                                                        echo '<option value="' . htmlspecialchars($row['FromDate'], ENT_QUOTES) . '">' . htmlspecialchars($formattedDate, ENT_QUOTES) . '</option>';
                                                    }
                                                } else {
                                                    echo '<option value="">No time periods found</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 my-4">
                                        <div class="form-group">
                                            <label>To Month </label>
                                            <select name="tomunth" required id="totimeperiod" class="form-control select2">
                                                <?php
                                                $select = mysqli_query($conn, "SELECT * FROM `timeperiod` WHERE `HRStatus`='ACCEPT' ORDER BY `ID` DESC");
                                                if (mysqli_num_rows($select) > 0) {
                                                    echo '<option value="">Select</option>';
                                                    while ($row = mysqli_fetch_assoc($select)) {
                                                        $formattedDate = date('d-M-Y', strtotime($row['FromDate']));
                                                        echo '<option value="' . htmlspecialchars($row['FromDate'], ENT_QUOTES) . '">' . htmlspecialchars($formattedDate, ENT_QUOTES) . '</option>';
                                                    }
                                                } else {
                                                    echo '<option value="">No time periods found</option>';
                                                }
                                                ?>
                                            </select>
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
    <div class="clearfix">&nbsp;</div>
    <div class="clearfix">&nbsp;</div>
    <script>
        $(document).ready(function() {
            console.log("Document ready");
            $(".select2").select2();
            
            function loadTable() {
                console.log("Loading table...");
                $.ajax({
                    url: "ajex/empidpay.php",
                    type: "POST",
                    success: function(data) {
                        console.log("AJAX Success:", data);
                        $("#empnumber").html(data);
                        $("#empnumber").select2(); // Reinitialize select2
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error:", status, error);
                    }
                });
            }
            loadTable();
        });
    </script>
</body>
</html>

<?php }?>