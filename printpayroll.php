<?php
session_start();
error_reporting(0);

include 'link/desigene/db.php';

if (isset($_POST['submit'])) {
    $empnumber = $_POST['empnumber'];
    $frommonth = $_POST['frommonth'];
    $tomunth = $_POST['tomunth'];

    // Perform SQL query to fetch data from the database based on user input
    $query = mysqli_query($conn, "SELECT * FROM `timeperiod` WHERE `FromDate` >= '$frommonth' AND `FromDate` <= '$tomunth' ORDER BY `ID` DESC ");

    // Check if the query is successful
    if (!$query) {
        die("Query failed: " . mysqli_error($conn));
    }

    // Check if data is fetched
    if (mysqli_num_rows($query) > 0) {
        // HTML Template with placeholders replaced by actual database column names
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>WSSC</title>
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
        <div id="content">
            <?php
            while ($data = mysqli_fetch_array($query)) {
                $timeid=$data['ID'];
                if( $empnumber==''){
                $selectemp=mysqli_query($conn,"SELECT * FROM `employeedata`");
            }else{
                $selectemp=mysqli_query($conn,"SELECT * FROM `employeedata` WHERE `EmployeeNo`='$empnumber'");
            }
                while($rowemp=mysqli_fetch_array($selectemp)){
                    $employee= $rowemp['EmployeeNo'];
                    $employeeid= $rowemp['Id'];   
                    $selectsallery= mysqli_query($conn,"SELECT * FROM `salary` WHERE `employee_id`='$employee' && `timeperiod`='$timeid' && `HrReview`='ACCEPT' && `finace`='ACCEPT' && `ceo`='ACCEPT'");
                    while($rowsallery=mysqli_fetch_array($selectsallery)){
                    ?>
             <div class="row text-center">
               <div class="col-4 text-center">
                    <img src="image/1662096718940.jpg" class="w-100 img-fluid " alt="">
                </div>
                <div class="col-8 text-center mt-5">
                    <h3>Water & Sanitation Services Company</h3>
                    <h6>Mingora Swat</h6>
                </div>
                <p>Patslip - <?php echo date("D-M-Y")?></p>
                    <h6>Employee Details:</h6>
                    <div class="container-fluid">
                        <div class="container border border-dark">
                            <div class="row">
                                <div class="col-6 text-center">
                                    <h6> Employee No: <?php echo $rowemp['EmployeeNo']?></h6>
                                    <h6>Employee Name: <?php echo $rowemp['fName'] ?> <?php echo $rowemp['mName'] ?> <?php echo $rowemp['lName'] ?></h6>
                                    <h6>Father Name:  <?php echo $rowemp['father_Name'] ?></h6>
                                    <h6>Employee CNIC:  <?php echo $rowemp['CNIC'] ?></h6>
                                </div>
                                <div class="col-6">
                                    <h6>Grade: <?php echo $rowemp['Grade'] ?> </h6>
                                    <h6>Job Title:  <?php echo $rowemp['JobTitle'] ?></h6>
                                    <h6>Department: <?php echo $rowemp['Department'] ?> </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <h6>Earnings</h6>
                        <table style="font-size: small;" class="table table-striped  table-bordered border-dark table-responsive" >
                            <thead class="table-light" >
                                <tr>
                                    <th>Earnings</th>
                                    <th>Monthly</th>
                                    <th>Arrears</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                    <?php
                    $employee= $rowemp['EmployeeNo'];
                    $employeeid= $rowemp['Id'];
                    $payrol= mysqli_query($conn,"SELECT * FROM `payrole` WHERE `EmpNo`='$employeeid' && `timeperiod`='$timeid'  AND `earning_deduction_fund` =' EARNING' ");
                    while($payrolerow=mysqli_fetch_array($payrol)){
                        ?>
                        <tr>
                            <td><?php echo  $payrolerow["AllowancesName"] ?></td>
                            <td><?php echo  $payrolerow["Rate"]?></td>
                            <td><?php echo  $payrolerow["price"]?></td>
                            <td><?php echo  $payrolerow["total"]?></td>
                        </tr>
                        <?php }?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-6">
                        <h6>Deductiont</h6>
                        <table style="font-size: small;" class="table table-striped table-bordered border-dark table-responsive" >
                            <thead class="table-light" >
                                <tr>
                                    <th>Deductiont</th>
                                    <th>Monthly</th>
                                    <th>Arrears</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                               
                                $payrol= mysqli_query($conn,"SELECT * FROM `payrole` WHERE `EmpNo`='$employeeid' && `timeperiod`='$timeid'  AND `earning_deduction_fund` =' DEDUCTION' ");
                                while($payrolerow=mysqli_fetch_array($payrol)){
                                    ?>
                                    <tr>
                                        <td><?php echo  $payrolerow["AllowancesName"] ?></td>
                                        <td><?php echo  $payrolerow["Rate"]?></td>
                                        <td><?php echo  $payrolerow["price"]?></td>
                                        <td><?php echo  $payrolerow["total"]?></td>
                                    </tr>
                                    <?php }?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-6 py-5">
                        <h6>Year todate Summary</h6>
                        <table style="font-size: small;" class="table table-striped table-bordered border-dark table-responsive " >
                            <tbody>
                                <tr>
                                    <td>Gross Pay</td>
                                    <td class="text-end"><?php echo $rowsallery['gross_pay']?></td>
                                </tr>
                                
                                <tr>
                                    <td>Net pay</td>
                                    <td class="text-end"><?php echo $rowsallery['net_pay']?></td>
                                </tr>
                                
                                <tr>
                                    <td>Fund</td>
                                    <td class="text-end"><?php echo $rowsallery['fund']?></td>
                                </tr>
                                <tr>
                                    <td>Deduction</td>
                                    <td class="text-end"><?php echo $rowsallery['deduction']?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-6">
                        <div class=" h-75 my-5 py-5 border border-dark text-center" >
                            <h6>Net Pay</h6>
                            <h1> PKR: <?php echo $rowsallery['net_pay']?></h1>
                        </div>
                    </div>
                </div>
                <hr>
                    <div class="text-center">
                        <b>Human Resource Department WSSC Swat.</b>
                        <p style="font-size: 8px;" >Softwere by Kurtlar Developer www.kurtlardeveloper.com</p>
                    </div>
                <hr>
                    <?php  
                    }
                }
            }
            ?>


                <style>@media print {
                .no-print {
                    display: none;
                }
                }
                </style>
            <button type="button" id="print" class="btn btn-success no-print">Generate PDF</button>
            </div>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function () {
                    $('#print').click(function () {
                        window.print();
                    });
                });
            </script>
        </body>

        </html>
<?php
    } else {
        // Handle case where no data is found
        echo "No data found for the given criteria.";
    }
}
else if(isset($_POST['submitsum'])){

    $frommonth = $_POST['frommonth'];
    $tomunth = $_POST['tomunth'];
    $query = mysqli_query($conn, "SELECT * FROM `timeperiod` WHERE `FromDate` >= '$frommonth' AND `FromDate` <= '$tomunth'");

        
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>WSSC</title>
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
                    <h6>Payroll summary</h6>
                </div>
                </div>

                <p class="text-center" >Patslip - <?php echo date("d-M-Y")?></p>
                <table class="table table-bordered border-black">
                     <tr>
                        <th>
                            <table class="table text-center table-bordered border-black">
                                <thead>
                                    <tr>
                                        <td>Class</td>
                                        <td>Group</td>
                                        <td>Sub-Group</td>
                                        <td>Emp.Count</td>
                                        <td>Amount</td>
                                    </tr>
                                </thead>
                    <tbody class="text-center table-bordered border-black">
                        <?php
                        // SQL query to select distinct Employee_Class from employeedata
                        $sql = "SELECT DISTINCT `Class` FROM `salary`";
                        $result = $conn->query($sql);
                        
                        // Check if there are any results
                        if ($result->num_rows > 0) {
                            $a = 1;
                            
                            // Loop through each distinct Employee_Class
                            while ($row = mysqli_fetch_assoc($result)) {
                                $employee_class = $row['Class'];
                                ?>
                                <tr>
                                    <td><?php echo $employee_class; ?></td>
                                    <td>
                                        <table class="table">
                                        <?php
                                        // SQL query to select distinct Employee_Class from employeedata
                                        $ClassGroup = "SELECT DISTINCT `ClassGroup` FROM `salary` WHERE `Class`='$employee_class'";
                                        $resultClassGroup = $conn->query($ClassGroup);
                                        
                                        // Check if there are any resultClassGroups
                                        if ($resultClassGroup->num_rows > 0) {
                                            // Loop through each distinct Employee_ClassGroup
                                            while ($row = mysqli_fetch_assoc($resultClassGroup)) {
                                                $employee_ClassGroup = $row['ClassGroup'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $employee_ClassGroup; ?></td>
                                                </tr>
                                                
                                            </table>
                                        </td>
                                        <td colspan="4">
                                        <table class="table text-start">
                                        <?php
                                        // SQL query to select distinct Employee_Class from employeedata
                                        $SubGroup = "SELECT DISTINCT `SubGroup` FROM `salary` WHERE `Class`='$employee_class'&& `ClassGroup`='$employee_ClassGroup '";
                                        $resultSubGroup = $conn->query($SubGroup);
                                        
                                        // Check if there are any resultSubGroups
                                        if ($resultSubGroup->num_rows > 0) {
                                            // Loop through each distinct Employee_SubGroup
                                            while ($row = mysqli_fetch_assoc($resultSubGroup)) {
                                                $employee_SubGroup = $row['SubGroup'];
                                                ?>
                                                <tr class="text-start">
                                                    <td class="text-start"><?php echo $employee_SubGroup; ?></td>
                                                    <td class="text-start">
                                                        <?php
                                                        $employee = "SELECT COUNT(*) AS employee FROM `salary`AS sal 
                                                        INNER JOIN timeperiod AS tim ON tim.ID = sal.timeperiod
                                                        WHERE sal.Class='$employee_class'
                                                        && sal.ClassGroup='$employee_ClassGroup' 
                                                        && sal.SubGroup='$employee_SubGroup'
                                                        && tim.FromDate >= '$frommonth'
                                                        && tim.FromDate <= '$tomunth'";
                                                        $resultemployee = $conn->query($employee);
                                                            $count = mysqli_fetch_assoc($resultemployee);
                                                            $employee_employee = $count['employee'];
                                                            echo $employee_employee; ?>
                                                    </td>
                                                    <td class="text-start">
                                                        <?php
                                                        $total_net_pay = "SELECT SUM(sal.net_pay) AS total_net_pay
                                                        FROM `salary` AS sal
                                                        INNER JOIN `timeperiod` AS tim ON sal.timeperiod = tim.ID
                                                        WHERE sal.Class='$employee_class'
                                                        && sal.ClassGroup='$employee_ClassGroup' 
                                                        && sal.SubGroup='$employee_SubGroup'
                                                        && tim.FromDate >= '$frommonth'
                                                        && tim.FromDate <= '$tomunth'";
                                                        $resulttotal_net_pay = $conn->query($total_net_pay);
                                                            $net_pay = mysqli_fetch_assoc($resulttotal_net_pay);
                                                            $employee_total_net_pay = $net_pay['total_net_pay'];
                                                            echo $employee_total_net_pay; ?>
                                                    </td>
                                                </tr>
                                                
                                                <?php } } ?>
                                                <tr>
                                                    <td class="text-center">Total</td>
                                                    <td class="text-start">
                                                        <?php $employee = "SELECT COUNT(*) AS employee FROM `salary`AS sal 
                                                            INNER JOIN timeperiod AS tim ON tim.ID = sal.timeperiod
                                                            WHERE sal.Class='$employee_class'
                                                            && sal.ClassGroup='$employee_ClassGroup' 
                                                            && tim.FromDate >= '$frommonth'
                                                            && tim.FromDate <= '$tomunth'";
                                                            $resultemployee = $conn->query($employee);
                                                            $count = mysqli_fetch_assoc($resultemployee);
                                                            $employee_employee = $count['employee'];
                                                            echo $employee_employee; ?>
                                                    </td>
                                                    <td class="text-start"><?php
                                                        $total_net_pay = "SELECT SUM(sal.net_pay) AS total_net_pay
                                                        FROM `salary` AS sal
                                                        INNER JOIN `timeperiod` AS tim ON sal.timeperiod = tim.ID
                                                        WHERE sal.Class='$employee_class'
                                                        && sal.ClassGroup='$employee_ClassGroup' 
                                                        && tim.FromDate >= '$frommonth'
                                                        && tim.FromDate <= '$tomunth'";
                                                        $resulttotal_net_pay = $conn->query($total_net_pay);
                                                            $net_pay = mysqli_fetch_assoc($resulttotal_net_pay);
                                                            echo $net_pay['total_net_pay'];
                                                            ?></td>
                                                        </tr>
                                                <?php } }?>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-end" colspan="3">Total</td>
                                        <td class="text-end">
                                            <?php
                                            $employee = "SELECT COUNT(*) AS employee FROM `salary`AS sal 
                                            INNER JOIN timeperiod AS tim ON tim.ID = sal.timeperiod
                                            WHERE sal.Class='$employee_class'
                                            && tim.FromDate >= '$frommonth'
                                            && tim.FromDate <= '$tomunth'";
                                            $resultemployee = $conn->query($employee);
                                                $count = mysqli_fetch_assoc($resultemployee);
                                                $employee_employee = $count['employee'];
                                                 echo $employee_employee; ?>
                                        </td>
                                        <td>
                                            <?php
                                            $total_net_pay = "SELECT SUM(sal.net_pay) AS total_net_pay
                                                        FROM `salary` AS sal
                                                        INNER JOIN `timeperiod` AS tim ON sal.timeperiod = tim.ID
                                                        WHERE sal.Class='$employee_class'
                                                        && tim.FromDate >= '$frommonth'
                                                        && tim.FromDate <= '$tomunth'";
                                                        $resulttotal_net_pay = $conn->query($total_net_pay);
                                                            $net_pay = mysqli_fetch_assoc($resulttotal_net_pay);
                                                            echo $net_pay['total_net_pay'];
                                                            ?></td>
                                </tr>
                                <?php $a++; }}?>
                                <tr class="bg-light">
                                        <td class="text-end" colspan="3">Total</td>
                                        <td class="text-end">
                                            <?php
                                            $employee = "SELECT COUNT(*) AS employee FROM `salary`AS sal 
                                            INNER JOIN timeperiod AS tim ON tim.ID = sal.timeperiod
                                            WHERE tim.FromDate >= '$frommonth'
                                            && tim.FromDate <= '$tomunth'";
                                            $resultemployee = $conn->query($employee);
                                                $count = mysqli_fetch_assoc($resultemployee);
                                                $employee_employee = $count['employee'];
                                                 echo $employee_employee; ?>
                                        </td>
                                        <td>
                                            <?php
                                            $total_net_pay = "SELECT SUM(sal.net_pay) AS total_net_pay
                                                        FROM `salary` AS sal
                                                        INNER JOIN `timeperiod` AS tim ON sal.timeperiod = tim.ID
                                                        WHERE tim.FromDate >= '$frommonth'
                                                        && tim.FromDate <= '$tomunth'";
                                                        $resulttotal_net_pay = $conn->query($total_net_pay);
                                                            $net_pay = mysqli_fetch_assoc($resulttotal_net_pay);
                                                            echo $net_pay['total_net_pay'];
                                                            ?></td>
                                </tr>
                    </tbody>
                </table>
<div class="container mt-5">
    
<table class="table text-center mt-5">
    <thead>
        <tr>
            <td>Bank (Salary_Branch)</td>
            <td>Emp. Count</td>
            <td>Total Amount</td>
        </tr>
    </thead>
    <tbody class="text-center">
        <?php
        // Include the database connection file
        include('link/desigene/db.php');

        // SQL query to group by Salary_Branch and calculate employee count and total amount
        $sql = "SELECT DISTINCT Bank FROM salary";
        $result = $conn->query($sql);
        
        // Check if there are any results
        if ($result->num_rows > 0) {
            // Loop through each result
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row['Bank']; 
                    $salary=$row['Bank'];?>
                    </td>
                    <td>
                        <?php
                        $countquery = mysqli_query($conn, "SELECT COUNT(*) AS employee FROM `salary`AS sal INNER JOIN timeperiod AS tim ON tim.ID = sal.timeperiod
                        WHERE tim.FromDate >= '$frommonth'
                        && tim.FromDate <= '$tomunth' 
                        && sal.Bank ='$salary'");
                        $countdata = mysqli_fetch_assoc($countquery);
                        echo $countdata['employee']; ?>
                    </td>
                   <td>
                        <?php 
                        $countquery = mysqli_query($conn, "SELECT SUM(sal.net_pay) AS total_net_pay
                                                        FROM `salary` AS sal
                                                        INNER JOIN `timeperiod` AS tim ON sal.timeperiod = tim.ID
                                                        WHERE tim.FromDate >= '$frommonth'
                                                        && tim.FromDate <= '$tomunth' && sal.Bank ='$salary'");
                        $countdata = mysqli_fetch_assoc($countquery);
                        echo $countdata['total_net_pay'];?>
                   </td>
                </tr>
                
                <?php
            }
        } else {
            echo "<tr><td colspan='3'>Data not exist</td></tr>";
        }
        ?>
        <tr>
        <td>Total</td>
        
        <td>
                        <?php
                        $countquery = mysqli_query($conn, "SELECT COUNT(*) AS employee FROM `salary`AS sal 
                                            INNER JOIN timeperiod AS tim ON tim.ID = sal.timeperiod
                                            WHERE tim.FromDate >= '$frommonth'
                                            && tim.FromDate <= '$tomunth'");
                        $countdata = mysqli_fetch_assoc($countquery);
                        echo $countdata['employee']; ?>
                    </td>
                   <td>
                        <?php 
                        $countquery = mysqli_query($conn, "SELECT SUM(sal.net_pay) AS total_net_pay
                                                        FROM `salary` AS sal
                                                        INNER JOIN `timeperiod` AS tim ON sal.timeperiod = tim.ID
                                                        WHERE tim.FromDate >= '$frommonth'
                                                        && tim.FromDate <= '$tomunth'");
                        $countdata = mysqli_fetch_assoc($countquery);
                        echo $countdata['total_net_pay'];?>
                   </td>
        </tr>
    </tbody>
</table>
</div>

                <hr>
                <div class="text-center">
                    <b>Human Resource Department WSSC Swat.</b>
                    <p style="font-size: 8px;" >Softwere by Kurtlar Developer www.kurtlardeveloper.com</p>
                </div>
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
                    $('#print').click(function() {
                        window.print();
                    });
                });
            </script>
        </body>

        </html>
<?php
    }

?>