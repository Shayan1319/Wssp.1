<?php
session_start();
error_reporting(0);

include 'link/desigene/db.php';

if(isset($_POST['leaveFY'])){
    $employee=$_POST['employee'];
    $todate = date('Y-m-d');

    // Create a DateTime object for July 1st of the current year
    $julyFirst = new DateTime(date('Y') . '-07-01');

    // Check if today's date is before July 1st
    if (new DateTime($todate) < $julyFirst) {
        // If it is, set $fromdate to July 1st of the previous year
        $fromdate = (date('Y') - 1) . '-07-01';
    } else {
        // Otherwise, set $fromdate to July 1st of the current year
        $fromdate = date('Y') . '-07-01';
    }
        
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>Leave FY</title>
        <meta content="" name="description">
        <meta content="" name="keywords">
         <!-- Google Fonts -->
         <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Dosis:300,400,500,,600,700,700i|Lato:300,300i,400,400i,700,700i" rel="stylesheet">
         <!-- fontawesome -->
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
         <!-- Vendor CSS Files -->
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="dist/select2/select2.min.css">
        <link rel="stylesheet" href="dist/sweat-alerts/sweetalert.css">
        <link rel="stylesheet" href="css/style.css">
        <!-- Custom JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
        <script src="dist/select2/select2.min.js"></script>
        <script src="dist/js/validations.js"></script>
        <script src="dist/sweat-alerts/sweetalert.js"></script>
        <!-- CKEditor -->
        <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script> 
        </head>
        <body>
        <button type="button" id="print" style="position: fixed;" class="btn btn-success no-print">Generate PDF</button>

            
            
        <div id="content">
            <div class="row text-center mt-5">
               <div class="col-4 text-center mt-5">
                    <img src="image/1662096718940.jpg" class="w-50 img-fluid " alt="">
                </div>
                <div class="col-8 text-center mt-5">
                    <h3>Water & Sanitation Services Company</h3>
                    <h6>Mingora Swat</h6>
                    <h6>Leave Details - FY <?php echo date('Y', strtotime($fromdate))."-".date('Y', strtotime($todate))?></h6>
                </div>
                <p><?php echo date("M-Y")?></p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Employee</th>
                                               <?php $selectleave=mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='leave'");
                                               while($rowleave=mysqli_fetch_array($selectleave)){
                                                echo '<th>'.$rowleave['drop'].'</th>';
                                               }
                                               ?>
                                                <th>TOTAL LEAVE</th>
                                                <th>Leaves Calc.</th>
                                                <th>Absents Yearly</th>
                                                <th>Leaves Enti-ment</th>
                                                <th>Leaves Bal.</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if($employee!=""){
                                            $sql = "SELECT * FROM `employeedata` WHERE `EmployeeNo`=$employee";
                                            }
                                            else{
                                            $sql = "SELECT * FROM `employeedata`";
                                            }
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            $a = 1;
                                            while ($row = mysqli_fetch_array($result)) {
                                                $empid = $row['Id'];
                                                $empNo = $row['EmployeeNo'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['EmployeeNo']; ?><h5><?php echo $row['fName']; ?> <?php echo $row['lName']; ?></h5><?php echo $row['Job_Tiltle']; ?></td>
                                                    
                                                    <?php $selectleave=mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='leave'");
                                                    while($rowleave=mysqli_fetch_array($selectleave)){
                                                        $leavetype=$rowleave['drop'];
                                                        ?><td><?php
                                                        $contleave=mysqli_query($conn,"SELECT SUM(TotalDays) AS empleave FROM `leavereq` WHERE `EmployeeNo`='$empNo' && `LeaveType`='$leavetype' && `Statusofmanger`='ACCEPT' && `StatusofGm`='ACCEPT' && `LeaveTo`>='$fromdate' && `LeaveTo`<='$todate';");
                                                        $countdata = mysqli_fetch_assoc($contleave);
                                                        echo $countdata['empleave'];
                                                        ?>
                                                          </td>
                                                        <?php
                                                    }?>
                                                    <td><?php $contleave=mysqli_query($conn,"SELECT SUM(TotalDays) AS empleave FROM `leavereq` WHERE `EmployeeNo`='$empNo' && `Statusofmanger`='ACCEPT' && `StatusofGm`='ACCEPT' && `LeaveTo`>='$fromdate' && `LeaveTo`<='$todate';");$countdata = mysqli_fetch_assoc($contleave); echo $countdata['empleave'];?></td>

                                                    <td><?php $contleave=mysqli_query($conn,"SELECT SUM(TotalDays) AS empleave FROM `leavereq` WHERE `EmployeeNo`='$empNo' && `Statusofmanger`='ACCEPT' && `StatusofGm`='ACCEPT' && `LeaveTo`>='$fromdate' && `LeaveTo`<='$todate';");
                                                    $countdata = mysqli_fetch_assoc($contleave);
                                                     echo $countdata['empleave'];?></td>

                                                    <td><?php $contleave=mysqli_query($conn,"SELECT COUNT(*) AS empabsent FROM `atandece` WHERE `Employeeid`='$empNo' 
                                                    && `ManagerStatus`='ACCEPT'
                                                    && `GMStatus`='ACCEPT' 
                                                    && `PayrollStatus`='ACCEPT' 
                                                    && `status`='ABSENT'
                                                    && `Date`>='$fromdate' && `Date`<='$todate';");$countdata = mysqli_fetch_assoc($contleave); echo $countdata['empabsent'];?></td>
                                                    <td>15</td>
                                                    <td><?php
                                                        $contleave = mysqli_query($conn, "SELECT 30-SUM(TotalDays) AS empleave FROM `leavereq` WHERE `EmployeeNo`='$empNo' && `Statusofmanger`='ACCEPT' && `StatusofGm`='ACCEPT' && `LeaveTo`>='$fromdate' && `LeaveTo`<='$todate'");

                                                        // Check if the query executed correctly
                                                        if (!$contleave) {
                                                            die('Query Error: ' . mysqli_error($conn));
                                                        }

                                                        // Fetch the data
                                                        $countdata = mysqli_fetch_assoc($contleave);

                                                        // Check if data is fetched and if 'empleave' is NULL
                                                        if ($countdata && !is_null($countdata['empleave'])) {
                                                            echo $countdata['empleave'];
                                                        } else {
                                                            echo 15;
                                                        }
                                                        ?>
                                                        </td>
                                                </tr>
                                                <?php
                                                $a++;
                                            }
                                        } else {
                                            echo "Data not exist";
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
               
                <hr>
                <div class="text-center">
                    <b>Human Resource Department WSSC Swat.</b>
                </div>
                <p style="font-size: 8px;" >Softwere by Kurtlar Developer www.kurtlardeveloper.com</p>
                
                <hr>
</div>
            
    <style>@media print {
    .no-print {
        display: none;
    }
}
</style>
    
    

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function () {
                    $('#print').click(function(l) {
                        window.print();
                    });
                });
            </script>
        </body>

        </html>
<?php
    }
else if(isset($_POST['leaveD'])){
        $employee=$_POST['employee'];
        $timid=$_POST['Month'];
            
    ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
            <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1.0" name="viewport">
            <title>Leave Details Periods</title>
            <meta content="" name="description">
            <meta content="" name="keywords">
             <!-- Google Fonts -->
             <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Dosis:300,400,500,,600,700,700i|Lato:300,300i,400,400i,700,700i" rel="stylesheet">
             <!-- fontawesome -->
             <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
             <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
             <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
             <!-- Vendor CSS Files -->
             <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
            <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
            <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
            <link rel="stylesheet" href="dist/select2/select2.min.css">
            <link rel="stylesheet" href="dist/sweat-alerts/sweetalert.css">
            <link rel="stylesheet" href="css/style.css">
            <!-- Custom JavaScript -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
            <script src="dist/select2/select2.min.js"></script>
            <script src="dist/js/validations.js"></script>
            <script src="dist/sweat-alerts/sweetalert.js"></script>
            <!-- CKEditor -->
            <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script> 
            </head>
            <body>
            <button type="button" id="print" style="position: fixed;" class="btn btn-success no-print">Generate PDF</button>
    
                
                
            <div id="content">
                <div class="row text-center mt-5">
                   <div class="col-4 text-center mt-5">
                        <img src="image/1662096718940.jpg" class="w-50 img-fluid " alt="">
                    </div>
                    <div class="col-8 text-center mt-5">
                        <h3>Water & Sanitation Services Company</h3>
                        <h6>Mingora Swat</h6>
                    
                    </div>
                    <?php 
                        $query = mysqli_query($conn, "SELECT * FROM `timeperiod` WHERE `ID`='$timid' ORDER BY `ID` DESC ");
                        while($row=mysqli_fetch_array($query)){
                            $fromdate=$row['FromDate'];
                            $todate=$row['ToDate'];
                            $todate_year = date('Y', strtotime($todate));

                    ?>
                    <h6> Leave Balances <?php echo date('F Y', strtotime($row['ToDate']))?></h6>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Employee</th>
                                                   <?php $selectleave=mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='leave'");
                                                   while($rowleave=mysqli_fetch_array($selectleave)){
                                                    echo '<th>'.$rowleave['drop'].'</th>';
                                                   }
                                                   ?>
                                                    <th>TOTAL LEAVE Monthly</th>
                                                    <th>Leaves Calc.</th>
                                                    
                                                    <th>Absents Yearly</th>
                                                    <th>Leaves Enti-ment</th>
                                                    <th>Leaves Bal.</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if($employee!=""){
                                                $sql = "SELECT * FROM `employeedata` WHERE `EmployeeNo`=$employee";
                                                }
                                                else{
                                                $sql = "SELECT * FROM `employeedata`";
                                                }
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                $a = 1;
                                                while ($row = mysqli_fetch_array($result)) {
                                                    $empid = $row['Id'];
                                                    $empNo = $row['EmployeeNo'];
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $row['EmployeeNo']; ?><h5><?php echo $row['fName']; ?> <?php echo $row['lName']; ?></h5><?php echo $row['Job_Tiltle']; ?></td>
                                                        
                                                        <?php $selectleave=mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='leave'");
                                                        while($rowleave=mysqli_fetch_array($selectleave)){
                                                            $leavetype=$rowleave['drop'];
                                                            ?><td><?php
                                                            $contleave=mysqli_query($conn,"SELECT SUM(TotalDays) AS empleave FROM `leavereq` WHERE `EmployeeNo`='$empNo' && `LeaveType`='$leavetype' && `Statusofmanger`='ACCEPT' && `StatusofGm`='ACCEPT' && `LeaveTo`>='$fromdate' && `LeaveTo`<='$todate';");
                                                            $countdata = mysqli_fetch_assoc($contleave);
                                                            echo $countdata['empleave'];
                                                            ?>
                                                              </td>
                                                            <?php
                                                        }?>
                                                        <td><?php $contleave=mysqli_query($conn,"SELECT SUM(TotalDays) AS empleave FROM `leavereq` WHERE `EmployeeNo`='$empNo' && `Statusofmanger`='ACCEPT' && `StatusofGm`='ACCEPT' && `LeaveTo`>='$fromdate' && `LeaveTo`<='$todate';");$countdata = mysqli_fetch_assoc($contleave); echo $countdata['empleave'];?></td>
                                                        <td><?php $contleave=mysqli_query($conn,"SELECT SUM(TotalDays) AS empleave FROM `leavereq` WHERE `EmployeeNo`='$empNo' && `Statusofmanger`='ACCEPT' && `StatusofGm`='ACCEPT' && `LeaveTo`>='$fromdate' && `LeaveTo`<='$todate';");$countdata = mysqli_fetch_assoc($contleave); echo $countdata['empleave'];?></td>
                                                        <td><?php $contleave=mysqli_query($conn,"SELECT COUNT(*) AS empabsent FROM `atandece` WHERE `Employeeid`='$empNo' 
                                                        && `ManagerStatus`='ACCEPT'
                                                        && `GMStatus`='ACCEPT' 
                                                        && `PayrollStatus`='ACCEPT' 
                                                        && `status`='ABSENT'
                                                        && `Date`>='$fromdate' && `Date`<='$todate';");$countdata = mysqli_fetch_assoc($contleave); echo $countdata['empabsent'];?></td>
                                                        <td>15</td>
                                                        <td><?php
                                                            $contleave = mysqli_query($conn, "SELECT 15-SUM(TotalDays) AS empleave FROM `leavereq` WHERE `EmployeeNo`='$empNo' && `Statusofmanger`='ACCEPT' && `StatusofGm`='ACCEPT' && `LeaveTo`>='$fromdate' && `LeaveTo`<='$todate'");
    
                                                            // Check if the query executed correctly
                                                            if (!$contleave) {
                                                                die('Query Error: ' . mysqli_error($conn));
                                                            }
    
                                                            // Fetch the data
                                                            $countdata = mysqli_fetch_assoc($contleave);
    
                                                            // Check if data is fetched and if 'empleave' is NULL
                                                            if ($countdata && !is_null($countdata['empleave'])) {
                                                                echo $countdata['empleave'];
                                                            } else {
                                                                echo 15;
                                                            }
                                                            ?>
                                                            </td>
                                                    </tr>
                                                    <?php
                                                    $a++;
                                                }
                                            } else {
                                                echo "Data not exist";
                                            }
                                            ?>
                                            <tr>
                                                <td>Department Total:</td>
                                                <?php $selectleave=mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='leave'");
                                                        while($rowleave=mysqli_fetch_array($selectleave)){
                                                            $leavetype=$rowleave['drop'];
                                                            ?><th><?php
                                                            $contleave=mysqli_query($conn,"SELECT SUM(TotalDays) AS empleave FROM `leavereq` WHERE  `LeaveType`='$leavetype' && `Statusofmanger`='ACCEPT' && `StatusofGm`='ACCEPT' && `LeaveTo`>='$fromdate' && `LeaveTo`<='$todate';");
                                                            $countdata = mysqli_fetch_assoc($contleave);
                                                            echo $countdata['empleave'];
                                                            ?>
                                                              </th>
                                                            <?php
                                                        }?>
                                                        
                                                        <th><?php $contleave=mysqli_query($conn,"SELECT SUM(TotalDays) AS empleave FROM `leavereq` WHERE `Statusofmanger`='ACCEPT' && `StatusofGm`='ACCEPT' && `LeaveTo`>='$fromdate' && `LeaveTo`<='$todate';");$countdata = mysqli_fetch_assoc($contleave); echo $countdata['empleave'];?></th>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </th>
                                </tr>
                            </thead>
                        </table>
                        <?php }?>
                    </div>
                   
                    <hr>
                    <div class="text-center">
                        <b>Human Resource Department WSSC Swat.</b>
                    </div>
                    <p style="font-size: 8px;" >Softwere by Kurtlar Developer www.kurtlardeveloper.com</p>
                    
                    <hr>
    </div>
                
        <style>@media print {
        .no-print {
            display: none;
        }
    }
    </style>
        
        
    
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function () {
                        $('#print').click(function(l) {
                            window.print();
                        });
                    });
                </script>
            </body>
    
            </html>
    <?php
        }
   else if(isset($_POST['leaveM'])){
        $employee=$_POST['employee'];
        $timid=$_POST['Month'];
            
    ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
            <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1.0" name="viewport">
            <title>Leave</title>
            <meta content="" name="description">
            <meta content="" name="keywords">
             <!-- Google Fonts -->
             <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Dosis:300,400,500,,600,700,700i|Lato:300,300i,400,400i,700,700i" rel="stylesheet">
             <!-- fontawesome -->
             <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
             <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
             <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
             <!-- Vendor CSS Files -->
             <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
            <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
            <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
            <link rel="stylesheet" href="dist/select2/select2.min.css">
            <link rel="stylesheet" href="dist/sweat-alerts/sweetalert.css">
            <link rel="stylesheet" href="css/style.css">
            <!-- Custom JavaScript -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
            <script src="dist/select2/select2.min.js"></script>
            <script src="dist/js/validations.js"></script>
            <script src="dist/sweat-alerts/sweetalert.js"></script>
            <!-- CKEditor -->
            <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script> 
            </head>
            <body>
            <button type="button" id="print" style="position: fixed;" class="btn btn-success no-print">Generate PDF</button>
    
                
                
            <div id="content">
                <div class="row text-center mt-5">
                   <div class="col-4 text-center mt-5">
                        <img src="image/1662096718940.jpg" class="w-50 img-fluid " alt="">
                    </div>
                    <div class="col-8 text-center mt-5">
                        <h3>Water & Sanitation Services Company</h3>
                        <h6>Mingora Swat</h6>
                    </div>
                    <?php 
                        $query = mysqli_query($conn, "SELECT * FROM `timeperiod` WHERE `ID`='$timid' ORDER BY `ID` DESC ");
                        while($row=mysqli_fetch_array($query)){
                            $fromdate=$row['FromDate'];
                            $todate=$row['ToDate'];
                            $todate_year = date('Y', strtotime($todate));

                    ?>
                    <h6> Leave Balances <?php echo date('F Y', strtotime($row['ToDate']))?></h6>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Employee</th>
                                                    <th>Leaves this Month</th>
                                                    <th>Leaves Calc.</th>
                                                    <th>Absents this Month</th>
                                                    <th>Leaves Entitlement</th>
                                                    <th>Leaves Bal.</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if($employee!=""){
                                                $sql = "SELECT * FROM `employeedata` WHERE `EmployeeNo`=$employee";
                                                }
                                                else{
                                                $sql = "SELECT * FROM `employeedata`";
                                                }
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                $a = 1;
                                                while ($row = mysqli_fetch_array($result)) {
                                                    $empid = $row['Id'];
                                                    $empNo = $row['EmployeeNo'];
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $row['EmployeeNo']; ?><h5><?php echo $row['fName']; ?> <?php echo $row['lName']; ?></h5><?php echo $row['Job_Tiltle']; ?></td>

                                                        <td><?php $contleave=mysqli_query($conn,"SELECT SUM(TotalDays) AS empleave FROM `leavereq` WHERE `EmployeeNo`='$empNo' && `Statusofmanger`='ACCEPT' && `StatusofGm`='ACCEPT' && `LeaveTo`>='$fromdate' && `LeaveTo`<='$todate';");$countdata = mysqli_fetch_assoc($contleave); echo $countdata['empleave'];?></td>

                                                        <td><?php $contleave=mysqli_query($conn,"SELECT SUM(TotalDays) AS empleave FROM `leavereq` WHERE `EmployeeNo`='$empNo' && `Statusofmanger`='ACCEPT' && `StatusofGm`='ACCEPT' && YEAR(`LeaveTo`)='$todate_year';");$countdata = mysqli_fetch_assoc($contleave); echo $countdata['empleave'];?></td>

                                                        <td><?php $contleave=mysqli_query($conn,"SELECT COUNT(*) AS empabsent FROM `atandece` WHERE `Employeeid`='$empNo' 
                                                        && `ManagerStatus`='ACCEPT'
                                                        && `GMStatus`='ACCEPT' 
                                                        && `PayrollStatus`='ACCEPT' 
                                                        && `status`='ABSENT'
                                                        && `Date`>='$fromdate' && `Date`<='$todate';");$countdata = mysqli_fetch_assoc($contleave); echo $countdata['empabsent'];?></td>
                                                        <td>15</td>
                                                        <td><?php
                                                        $todate_year = date('Y', strtotime($todate));
                                                            $contleave = mysqli_query($conn, "SELECT 15-SUM(TotalDays) AS empleave FROM `leavereq` WHERE `EmployeeNo`='$empNo' && `Statusofmanger`='ACCEPT' && `StatusofGm`='ACCEPT' 
                                                            &&  YEAR(`LeaveTo`)='$todate_year' ");
    
                                                            // Check if the query executed correctly
                                                            if (!$contleave) {
                                                                die('Query Error: ' . mysqli_error($conn));
                                                            }
    
                                                            // Fetch the data
                                                            $countdata = mysqli_fetch_assoc($contleave);
    
                                                            // Check if data is fetched and if 'empleave' is NULL
                                                            if ($countdata && !is_null($countdata['empleave'])) {
                                                                echo $countdata['empleave'];
                                                            } else {
                                                                echo 15;
                                                            }
                                                            ?>
                                                            </td>
                                                    </tr>
                                                    <?php
                                                    $a++;
                                                }
                                            } else {
                                                echo "Data not exist";
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </th>
                                </tr>
                            </thead>
                        </table>
                        <?php }?>
                    </div>
                   
                    <hr>
                    <div class="text-center">
                        <b>Human Resource Department WSSC Swat.</b>
                    </div>
                    <p style="font-size: 8px;" >Softwere by Kurtlar Developer www.kurtlardeveloper.com</p>
                    
                    <hr>
    </div>
                
        <style>@media print {
        .no-print {
            display: none;
        }
    }
    </style>
        
        
    
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function () {
                        $('#print').click(function(l) {
                            window.print();
                        });
                    });
                </script>
            </body>
    
            </html>
    <?php
        }
        
   else if(isset($_POST['overtime'])){
    $employee=$_POST['employee'];
    $timid=$_POST['Month'];
        
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title> Overtime/Duble Duty</title>
        <meta content="" name="description">
        <meta content="" name="keywords">
         <!-- Google Fonts -->
         <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Dosis:300,400,500,,600,700,700i|Lato:300,300i,400,400i,700,700i" rel="stylesheet">
         <!-- fontawesome -->
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
         <!-- Vendor CSS Files -->
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="dist/select2/select2.min.css">
        <link rel="stylesheet" href="dist/sweat-alerts/sweetalert.css">
        <link rel="stylesheet" href="css/style.css">
        <!-- Custom JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
        <script src="dist/select2/select2.min.js"></script>
        <script src="dist/js/validations.js"></script>
        <script src="dist/sweat-alerts/sweetalert.js"></script>
        <!-- CKEditor -->
        <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script> 
        </head>
        <body>
        <button type="button" id="print" style="position: fixed;" class="btn btn-success no-print">Generate PDF</button>

            
            
        <div id="content">
            <div class="row text-center mt-5">
               <div class="col-4 text-center mt-5">
                    <img src="image/1662096718940.jpg" class="w-50 img-fluid " alt="">
                </div>
                <div class="col-8 text-center mt-5">
                    <h3>Water & Sanitation Services Company</h3>
                    <h6>Mingora Swat</h6>
                </div>
                <?php 
                    $query = mysqli_query($conn, "SELECT * FROM `timeperiod` WHERE `ID`='$timid' ORDER BY `ID` DESC ");
                    while($row=mysqli_fetch_array($query)){
                        $fromdate=$row['FromDate'];
                        $Id=$row['ID'];
                        $todate=$row['ToDate'];
                        $todate_year = date('Y', strtotime($todate));

                ?>
                <h6> Leave Balances <?php echo date('F Y', strtotime($row['ToDate']))?></h6>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Employee</th>
                                                <th> Overtime Count</th>
                                                <th>Overtime Amount</th>
                                                <th>Double Duty Count</th>
                                                <th>Double Duty Amount</th>
                                                <th>Double Duty + Overtime</th>
                                                <th>Remarks</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($employee != "") {
                                                $sql = "SELECT * FROM `employeedata` AS emp
                                                        INNER JOIN `salary` AS sal ON emp.EmployeeNo=sal.employee_id
                                                        WHERE emp.EmployeeNo='$employee' && sal.timeperiod='$Id'
                                                        ";
                                            } else {
                                                $sql = "SELECT * FROM `employeedata` AS emp
                                                        INNER JOIN `salary` AS sal ON emp.EmployeeNo=sal.employee_id WHERE sal.timeperiod='$Id'";
                                            }
                                            
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            $a = 1;
                                            while ($row = mysqli_fetch_array($result)) {
                                                $empid = $row['Id'];
                                                $empNo = $row['EmployeeNo'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['EmployeeNo']; ?><h5><?php echo $row['fName']; ?> <?php echo $row['lName']; ?></h5><?php echo $row['Job_Tiltle']; ?></td>


                                                    <td><?php
                                                    $contleave=mysqli_query($conn,"SELECT SUM(`Rate`) AS empabsent FROM `payrole` WHERE `EmpNo`='$empid'  
                                                    && `rate_calc_mode`='OVERTIME'
                                                    && `timeperiod`='$Id';
                                                    ");
                                                    $countdata = mysqli_fetch_assoc($contleave); echo $countdata['empabsent'];?></td>
                                                     <td><?php
                                                    $contleave=mysqli_query($conn,"SELECT SUM(`total`) AS empabsent FROM `payrole` WHERE `EmpNo`='$empid'  
                                                    && `rate_calc_mode`='OVERTIME'
                                                    && `timeperiod`='$Id';
                                                    ");
                                                    $countdata = mysqli_fetch_assoc($contleave); echo $countdata['empabsent'];?></td>
                                                    <td><?php
                                                    $contleave=mysqli_query($conn,"SELECT SUM(`Rate`) AS empabsent FROM `payrole` WHERE `EmpNo`='$empid'  
                                                    && `rate_calc_mode`='DOUBLE DUTY'
                                                    && `timeperiod`='$Id';
                                                    ");
                                                    $countdata = mysqli_fetch_assoc($contleave); echo $countdata['empabsent'];?></td>
                                                    <td><?php
                                                    $contleave=mysqli_query($conn,"SELECT SUM(`total`) AS empabsent FROM `payrole` WHERE `EmpNo`='$empid'  
                                                    && `rate_calc_mode`='DOUBLE DUTY'
                                                    && `timeperiod`='$Id';
                                                    ");
                                                    $countdata = mysqli_fetch_assoc($contleave); echo $countdata['empabsent'];?></td>
                                                    <td><?php
                                                        $contleave = mysqli_query($conn, "SELECT SUM(`total`) AS empabsent FROM `payrole` WHERE `EmpNo`='$empid'  
                                                                                        AND `rate_calc_mode` IN ('DOUBLE DUTY', 'OVERTIME')
                                                                                        AND `timeperiod`='$Id'");
                                                        if ($contleave) {
                                                            $countdata = mysqli_fetch_assoc($contleave);
                                                            echo $countdata['empabsent'];
                                                        } else {
                                                            echo 'Query Error: ' . mysqli_error($conn);
                                                        }
                                                    ?></td>
                                                    <td></td>
                                                    
                                                    
                                                </tr>
                                                <?php
                                                $a++;
                                            }
                                        } else {
                                            echo "Data not exist";
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </th>
                            </tr>
                        </thead>
                    </table>
                    <?php }?>
                </div>
               
                <hr>
                <div class="text-center">
                    <b>Human Resource Department WSSC Swat.</b>
                </div>
                <p style="font-size: 8px;" >Softwere by Kurtlar Developer www.kurtlardeveloper.com</p>
                
                <hr>
</div>
            
    <style>@media print {
    .no-print {
        display: none;
    }
}
</style>
    
    

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function () {
                    $('#print').click(function(l) {
                        window.print();
                    });
                });
            </script>
        </body>

        </html>
<?php
    }
?>
