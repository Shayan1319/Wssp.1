<?php
session_start();
error_reporting(0);

include 'link/desigene/db.php';

if(isset($_POST['Amendments'])){
    $fromdate=$_POST['from'];
    $todate=$_POST['to'];
        
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
                </div>
                <p> Employee Amendments Since - <?php echo date('Y', strtotime($fromdate))."-".date('M Y', strtotime($todate));?></p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <td>Employee No</td>
                                                <td>Name</td>
                                                <td>Father Name</td>
                                                <td>Change Date</td>
                                                <td>CNIC No</td>
                                                <td>JoiningDate</td>
                                                <td>Employee Status</td>
                                                <td>Date of Birth</td>
                                                <td>Contr. Exp. Date</td>
                                                <td>Change By</td>
                                                <td>Aurt. By</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $sql = "SELECT * FROM `employeedataupdate` WHERE `date`>='$fromdate' AND `date`<='$todate'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $a = 1;
    while ($row = mysqli_fetch_array($result)) {
        $empid = $row['Id'];
        ?>
        <tr>
            <td><?php echo $row['EmployeeNoUpdate']; ?></td>
            <td><h5><?php echo $row['fNameUpdate']; ?> <?php echo $row['lNameUpdate']; ?></h5></td>

            <td><?php echo $row['father_NameUpdate']; ?></td>
            <td><?php echo $row['date'];?></td>
            <td><?php echo $row['CNICUpdate']; ?></td>
            <td><?php echo $row['Joining_DateUpdate']; ?></td>
            <td><?php echo $row['StatusUpdate']; ?></td>
            <td><?php echo $row['DofBUpdate']; ?></td>
            <td><?php echo $row['Contract_Expiry_DateUpdate']; ?></td>
            <td><?php echo $row['Change By']; ?></td>
            <td><?php echo $row['AuthBy']; ?></td>
            <?php 
            $selected = mysqli_query($conn, "SELECT * FROM `allowances` WHERE `allowance_status`='ACTIVE'");
            while ($rowallowance = mysqli_fetch_array($selected)) {
                $allowanceId = $rowallowance['id'];
                
                $seletpayroll = mysqli_query($conn, "SELECT * FROM `rate` WHERE `employee_id`='$empid' AND `allowances_id`='$allowanceId'");
                if (mysqli_num_rows($seletpayroll) == 0) {
                    echo '<th></th>';
                } else {
                    while ($rowpayroll = mysqli_fetch_array($seletpayroll)) {
                        echo '<th>' . $rowpayroll['rate'] . '</th>';
                    }
                }
            }
            ?>
            <td><?php echo $row['net_pay']; ?></td>
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
                <p style="font-size: 8px;" >Software by Kurtlar Developer www.kurtlardeveloper.com</p>
                
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
