<?php
session_start();
error_reporting(0);

include 'link/desigene/db.php';

if(isset($_POST['submit'])){
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

<?php
$a = 1;
if(isset($_POST['empnumber'])){
    $empnumberselect = $_POST['empnumber'];
    $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `Id`= $empnumberselect");
} else {
    $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata`");
}

while($rowemp = mysqli_fetch_array($selectemp)){
    $employeeid = $rowemp['Id'];   
    $selectsallery = mysqli_query($conn, "SELECT * FROM `earning_deduction_fund` WHERE `employee_id`='$employeeid'");
    while($rowsallery = mysqli_fetch_array($selectsallery)){
?>
<style>
@media print {
    .content-section<?php echo $a; ?> {
        page-break-before: always;
    }
}
</style>
<div id="content<?php echo $a; ?>" class="content-section<?php echo $a; ?>">
    <div class="row text-center mt-5">
        <div class="col-4 text-center mt-5">
            <img src="image/1662096718940.jpg" class="w-50 img-fluid " alt="">
        </div>
        <div class="col-8 text-center mt-5">
            <h3>Water & Sanitation Services Company</h3>
            <h6>Mingora Swat</h6>
        </div>
        <p>Payslip - <?php echo date("d-M-Y")?></p>
        <div>
            <h6>Employee Details:</h6>
            <div class="container-fluid border border-dark">
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
            <table class="table table-striped  table-bordered border-dark table-responsive" >
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
                $payrol = mysqli_query($conn, "SELECT al.*
                            FROM `allowances` AS al
                            INNER JOIN `rate` AS ra ON al.id = ra.allowances_id
                            WHERE ra.employee_id = $employeeid
                            AND al.earning_deduction_fund = 'EARNING'");
                while($payrolerow = mysqli_fetch_array($payrol)){
                ?>
                    <tr>
                        <td><?php echo $payrolerow["allowance"] ?></td>
                        <td><?php echo $payrolerow["rate"]?></td>
                        <td><?php echo $payrolerow["price"]?></td>
                        <td><?php echo $payrolerow["rate"] * $payrolerow["price"]?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="col-6">
            <h6>Deductions</h6>
            <table class="table table-striped  table-bordered border-dark table-responsive" >
                <thead class="table-light" >
                    <tr>
                        <th>Deductions</th>
                        <th>Monthly</th>
                        <th>Arrears</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $deductions = mysqli_query($conn, "SELECT al.*
                            FROM `allowances` AS al
                            INNER JOIN `rate` AS ra ON al.id = ra.allowances_id
                            WHERE ra.employee_id = $employeeid
                            AND al.earning_deduction_fund = 'DEDUCTION'");
                while($deductionrow = mysqli_fetch_array($deductions)){
                ?>
                    <tr>
                        <td><?php echo $deductionrow["allowance"] ?></td>
                        <td><?php echo $deductionrow["rate"]?></td>
                        <td><?php echo $deductionrow["price"]?></td>
                        <td><?php echo $deductionrow["rate"] * $deductionrow["price"]?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="col-6">
            <h6>Year-to-Date Summary</h6>
            <table class="table table-striped  table-bordered border-dark table-responsive " >
                <tbody>
                    <tr>
                        <td>Gross Pay</td>
                        <td class="text-end"><?php echo $rowsallery['gross_pay']?></td>
                    </tr>
                    
                    <tr>
                        <td>Net Pay</td>
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
            <h6>Net Pay</h6>
            <h5>PKR: <?php echo $rowsallery['net_pay']?></h5>
        </div>
        <h6>Human Resource Department WSSC Swat.</h6>
    <p>Software by Kurtlar Developer www.kurtlardeveloper.com</p>
    </div>
</div>

<?php 
$a++;
}
}
?>
<script>
document.getElementById('print').addEventListener('click', function() {
    window.print();
});
</script>
</body>
</html>
<?php } ?>
