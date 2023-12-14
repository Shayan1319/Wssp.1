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
        <div id="content" class="container">
            <?php
            while ($data = mysqli_fetch_array($query)) {
                $timeid=$data['ID'];
                
                $selectemp=mysqli_query($conn,"SELECT * FROM `employeedata`");
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
                <div class="my-5">
                    <h6>Employee Details:</h6>
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
                    <div class="col-6 py-5">
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
                    <div class="col-6 py-5">
                        <h6>Deductiont</h6>
                        <table class="table table-striped  table-bordered border-dark table-responsive" >
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
                    <div class="col-6 px-4 my-5">
                        <h6>Year todate Summary</h6>
                        <table class="table table-striped  table-bordered border-dark table-responsive " >
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
                    <div class="col-6 px-4 my-5  text-center">
                        <h6>Net Pay</h6>
                        <h1> PKR: <?php echo $rowsallery['net_pay']?></h1>
                    </div>
                </div>
                    <?php
                        
                    }
                }
            }
            ?>


<hr>
                <div class="text-center">
                    <b>Human Resource Department WSSC Swat.</b>
                </div>
                <p style="font-size: 8px;" >Softwere by Kurtlar Developer www.kurtlardeveloper.com</p>

            <hr>
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
?>
