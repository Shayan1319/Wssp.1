<?php
use Mpdf\Mpdf;
session_start();
error_reporting(0);

include 'link/desigene/db.php';

if (isset($_POST['submit'])) {
    $empnumber = $_POST['empnumber'];
    $frommonth = $_POST['frommonth'];
    $tomunth = $_POST['tomunth'];
    
    // Perform SQL query to fetch data from the database based on user input
    $query = mysqli_query($conn, "SELECT p.*, s.*, e.* FROM employeedata AS e JOIN salary AS s ON e.EmployeeNo = s.employee_id JOIN payrole AS p ON p.EmpNo = e.Id WHERE s.employee_id='$empnumber' AND p.Date<='$tomunth' AND p.Date>='$frommonth' AND s.date<='$tomunth' AND s.date>='$frommonth'");

    // Check if data is fetched
    if ($row = mysqli_fetch_assoc($query)) {
        // HTML Template with placeholders replaced by actual database column names
        $html = '
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
    <div class="container">
    <div class="row text-center">
    <div class="col-4 p-5">
    <img src="image/1662096718940.jpg" class="w-100" alt="">
    </div>
    <div class="col-8 text-center p-5 mt-5">
    <h3>Water & Sanitation Services Company</h3>
    <h5>Mingora Swat</h5>
    </div>
    <p>Patslip - '. date("D-M-Y").'</p>
    <div class="mt-5">
    <h5>Employee Details:</h5>
    <div class="container p-5 border border-dark">
    <div class="row">
    <div class="col-6 text-center">
    <h5>Employee No: ' . $row['EmployeeNo'] . '</h5>
    <h5>Employee Name: ' . $row['fName'] .' ' . $row['mName'] .' ' . $row['lName'] .'</h5>
    <h5>Father Name:  ' . $row['father_Name'] .'</h5>
    <h5>Employee CNIC:  ' . $row['CNIC'] .'</h5>
    </div>
    <div class="col-6">
                                <h5>Grade: ' . $row['Grade'] .' </h5>
                                <h5>Job Title:  ' . $row['JobTitle'] .'</h5>
                                <h5>Department: ' . $row['Department'] .' </h5>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-6 px-4">
                                <h5>Earnings</h5>
                                <table class="table table-striped  table-bordered border-dark table-responsive" >
                                <thead class="table-light" >
                                <tr>
                                    <th>Earnings</th>
                                    <th>Monthly</th>
                                    <th>Arrears</th>
                                    <th>Amount</th>
                                </tr>
                                </thead>
                            <tbody>.';
                            $EmpNo = $row['Id'];
                            $select = mysqli_query($conn, "SELECT * FROM `payrole` WHERE `EmpNo` = '$EmpNo' AND earning_deduction_fund ='EARNING'");
                            while ($fetch = mysqli_fetch_array($select)) {
                                $html .= '<tr>
                                <td>'.  $fetch["AllowancesName"] . '</td>
                                <td>'. $fetch["Rate"].'</td>
                                <td>'. $fetch["price"].'</td>
                                <td>'. $fetch["total"].'</td>
                            </tr>';
                        }
                        $html .= '<tr>
                                    <td class="text-end"  colspan="4" >Total: '.$row['gross_pay'].'</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-6 px-4">
                        <h5>Deduction</h5>
                        <table class="table table-striped  table-bordered border-dark table-responsive " >
                                <thead class="table-light" >
                                    <tr>
                                        <th>Deduction</th>
                                        <th>Monthly</th>
                                        <th>Arrears</th>
                                        <th>Amount</th>
                                        </tr>
                                </thead>
                                <tbody>
                                .';
                                $EmpNo = $row['Id'];
                                $select = mysqli_query($conn, "SELECT * FROM `payrole` WHERE `EmpNo` = '$EmpNo' AND earning_deduction_fund ='DEDUCTION'");
                                while ($fetch = mysqli_fetch_array($select)) {
                                    $html .= '<tr>
                                    <td>'.  $fetch["AllowancesName"] . '</td>
                                    <td>'. $fetch["Rate"].'</td>
                                    <td>'. $fetch["price"].'</td>
                                    <td>'. $fetch["total"].'</td>
                                    </tr>';
                                    }
                                    $html .= '<tr>
                                    <td class="text-end"  colspan="4" >Total: '.$row['deduction'].'</td>
                                    </tr>
                                    </tbody>
                                    </table>
                    </div>
                    <div class="col-6 px-4 my-3">
                    <h5>Year todate Summary</h5>
                    <table class="table table-striped  table-bordered border-dark table-responsive " >
                            <tbody>
                                <tr>
                                    <td>Gross Pay</td>
                                    <td class="text-end">'.$row['gross_pay'].'</td>
                                </tr>
                                
                                <tr>
                                    <td>Net pay</td>
                                    <td class="text-end">'.$row['net_pay'].'</td>
                                </tr>
                                
                                <tr>
                                    <td>Fund</td>
                                    <td class="text-end">'.$row['fund'].'</td>
                                </tr>
                                <tr>
                                <td>Deduction</td>
                                    <td class="text-end">'.$row['deduction'].'</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-6 px-4 text-center">
                    <h5>Net Pay</h5>
                    <h1> PKR. '.$row['net_pay'].'</h1>
                    </div>
                    </div>
                    <hr>
                    <div class="text-center">
                    <b>Human Resource Department WSSC Swat.</b>
                    </div>
                    <p style="font-size: 8px;" >Softwere by Kurtlar Developer www.kurtlardeveloper.com</p>
                    </div>
                    </div>
                    </body>
                    </html>';
                    
                    include('vendor/autoload.php');
                    $mpdf=new Mpdf\Mpdf(['format'=>'A4']);

            $mpdf->WriteHTML($htm1) ;

            $file="report.pdf";

            $mpdf->Output ($file, 'I');
            echo $htm1;

    } else {
        // Handle case where no data is found
        echo "No data found for the given criteria.";
    }
}
?>
