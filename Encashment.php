<?php
session_start();
error_reporting(0);

include 'link/desigene/db.php';

if(isset($_POST['Encashment'])){
    $employee=$_POST['employee_no'];
    $fromdate=$_POST['from'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- (head content as before) -->
     
<meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>Employee Gratuity</title>
        <meta content="" name="description">
        <meta content="" name="keywords">
         <!-- Google Fonts -->
         <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Dosis:300,400,500,,600,700,700i|Lato:300,300i,400,400i,700,700i" rel="stylesheet">
         <!-- font-awesome -->
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
            <h6>Leave Encasement</h6>
            <h6><?php echo date('d-M-Y', strtotime($fromdate))." To ".date('d-M-Y', strtotime($todate))?></h6>
        </div>
        <p>Date : <?php echo date("d-M-Y")?></p>
        <table class="table">
            <thead>
                <tr>
                    <th>Employee</th>
                    <th>Ann. Leave Entitlement</th>
                    <th>Ann. Leave Availed</th>
                    <th>Ann. Leave Balance</th>
                    <th>Ann. Leave Payable</th>
                    <th>Gross Pay (Monthly)</th>
                    <th>Gross Pay (Yearly)</th>
                    <th>Gross Pay (Daily)</th>
                    <th>Amount Payable</th>
                    <th>Bank Branch</th>
                    <th>Account No</th>
                </tr>
            </thead>
            <tbody>
                <?php               
                if($employee!='' && $fromdate==''){
                $sql = "SELECT * FROM `encasement`WHERE `CEO_Status`='accept'AND `Finance_Status`='accept' AND `Employee`='$employee'";
                }
                else if($employee=='' && $fromdate!=''){
                // Fetch data from encasement table based on the specified conditions
                $sql = "SELECT * FROM `encasement`WHERE `CEO_Status`='accept'AND `Finance_Status`='accept' AND `Period`='$fromdate'";
                }
                else{
                // Fetch data from encasement table based on the specified conditions
                $sql = "SELECT * FROM `encasement`WHERE `CEO_Status`='accept'AND `Finance_Status`='accept' AND `Period`='$fromdate' AND `Employee`='$employee'";
                }
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['Employee']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Ann_Leave_Entitlement']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Ann_Leave_Availed']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Ann_Leave_Balance']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Ann_Leave_Payable']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Gross_Pay_Monthly']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Gross_Pay_Yearly']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Gross_Pay_Daily']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Amount_Payable']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Bank_Branch']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Account_No']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='11'>No records found.</td></tr>";
                }

                // Close the database connection
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <hr>
    <div class="text-center">
        <b>Human Resource Department WSSC Swat.</b>
    </div>
    <p style="font-size: 8px;">Software by Kurtlar Developer www.kurtlardeveloper.com</p>
    <hr>
</div>
<style>
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
    <script>
        $(document).ready(function () {
            $('#print').click(function () {
                window.print();
            });
        });
    </script>
<!-- Additional scripts as before -->
</body>
</html>
<?php
}
else if (isset($_POST['Gratuity'])) {
    $employee = $_POST['employee_no'];
    $fromdate = $_POST['from'];
    $todate = $_POST['to'];

    // Query to fetch gratuity data
    if($employee != ""){
        $query = "SELECT * FROM `gratuity` WHERE `Date` >= '$fromdate' AND `Date` <= '$todate' AND `empNo` = '$employee' AND `CEO_Status`='accept' AND `Finance_Status`='accept'";
    }
    else{
        $query = "SELECT * FROM `gratuity` WHERE `Date` >= '$fromdate' AND `Date` <= '$todate' AND `CEO_Status`='accept' AND `Finance_Status`='accept'";
    }
        $result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>Employee Gratuity</title>
        <meta content="" name="description">
        <meta content="" name="keywords">
         <!-- Google Fonts -->
         <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Dosis:300,400,500,,600,700,700i|Lato:300,300i,400,400i,700,700i" rel="stylesheet">
         <!-- font-awesome -->
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
                <img src="image/1662096718940.jpg" class="w-50 img-fluid" alt="">
            </div>
            <div class="col-8 text-center mt-5">
                <h3>Water & Sanitation Services Company</h3>
                <h6>Mingora Swat</h6>
                <h6>Gratuity Statement as on: <?php echo date("d-M-Y") ?></h6>
                <h6><?php echo date('d-M-Y', strtotime($fromdate)) . " To " . date('M-Y', strtotime($todate)) ?></h6>
            </div>
            <table class="table ">
                <thead>
                    <tr>
                        <th>Employee No</th>
                        <th>Emp. Name</th>
                        <th>Emp. Designation</th>
                        <th>Grade</th>
                        <th>Joining Date</th>
                        <th>Contr. Exp.Date</th>
                        <th colspan="3">Total Service <br> Y &nbsp; M &nbsp; D</th>
                        <th colspan="3">Period Service <br> Y &nbsp; M &nbsp; D</th>
                        <th colspan="3">Gratuity Rate<br> Y &nbsp; M &nbsp; D</th>
                        <th colspan="3">Service Gratuity Breakup<br> Y &nbsp; M &nbsp; D</th>
                        <th colspan="3">Period Gratuity Breakup<br> Y &nbsp; M &nbsp; D</th>
                        <th>Total Period Gratuity</th>
                        <th>Total Service Gratuity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Loop through the results and display each row
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>{$row['empNo']}</td>";
                            echo "<td>{$row['EmpName']}</td>";
                            echo "<td>{$row['EmpDesignation']}</td>";
                            echo "<td>{$row['Grade']}</td>";
                            echo "<td>{$row['JoiningDate']}</td>";
                            echo "<td>{$row['ContrExpDate']}</td>";
                            echo "<td>{$row['TotalServiceY']}</td>";
                            echo "<td>{$row['TotalServiceM']}</td>";
                            echo "<td>{$row['TotalServiceD']}</td>";
                            echo "<td>{$row['PeriodServiceY']}</td>";
                            echo "<td>{$row['PeriodServiceM']}</td>";
                            echo "<td>{$row['PeriodServiceD']}</td>";
                            echo "<td>{$row['GratuityRateY']}</td>";
                            echo "<td>{$row['GratuityRateM']}</td>";
                            echo "<td>{$row['GratuityRateD']}</td>";
                            echo "<td>{$row['ServiceGratuityBreakupY']}</td>";
                            echo "<td>{$row['ServiceGratuityBreakupM']}</td>";
                            echo "<td>{$row['ServiceGratuityBreakupD']}</td>";
                            echo "<td>{$row['PeriodGratuityBreakupY']}</td>";
                            echo "<td>{$row['PeriodGratuityBreakupM']}</td>";
                            echo "<td>{$row['PeriodGratuityBreakupD']}</td>";
                            echo "<td>{$row['TotalPeriodGratuity']}</td>";
                            echo "<td>{$row['TotalServiceGratuity']}</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='22'>No records found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <hr>
        <div class="text-center">
            <b>Human Resource Department WSSC Swat.</b>
        </div>
        <p style="font-size: 8px;">Software by Kurtlar Developer www.kurtlardeveloper.com</p>
        <hr>
    </div>
    <style>
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
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
}
?>
