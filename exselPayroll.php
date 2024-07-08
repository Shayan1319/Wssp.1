<?php
session_start();
error_reporting(0);
// links to database
include('link/desigene/db.php');
if(isset($_POST['submit'])){ 
    $employee_no = $_POST['employee_no'];
    $frommonth = $_POST['frommonth'];
    $tomunth = $_POST['tomunth'];
    $Employee_Sub_Group_drop=$_POST['Employee_Sub_Group'];
    $Salary_Branch=$_POST['Salary_Branch'];
    $Department=$_POST['Department'];
    
        $html.= '
        <table  class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>S.No</th>
                <th>Emp. No	</th>
                <th>Emp. Name</th>
                <th>Emp. Father Name</th>
                <th>Emp. CNIC</th>
                <th>Joining Date</th>
                <th>Job Title</th>
                <th>Grade</th>
                <th>Employment Type</th>
                <th>Department</th>
                <th>Class</th>
                <th>Group</th>
                <th>Sub-Group</th>
                <th>Payment Mode</th>
                <th>Bank Account No.</th>
                ';
                $selected=mysqli_query($conn,"SELECT * FROM `allowances` WHERE `allowance_status`='ACTIVE'");
                while($rowallownce=mysqli_fetch_array($selected)){
                    $html.= '<th>'.$rowallownce['allowance'].'</th>';
                }
                $html.= '<th>Total</th>
            </tr>
        </thead>
        <tbody>
        ';
        $selecttime = mysqli_query($conn, "SELECT * FROM `timeperiod` WHERE `FromDate` >= '$frommonth' AND `FromDate` <= '$tomunth' ORDER BY `ID` DESC ") or die(mysqli_error($conn));
        // Loop through the time periods
        $num = 1;
        while ($rowtime = mysqli_fetch_array($selecttime)) {
            $Timeid = $rowtime['ID'];
            // Fetch data for the given employee and time period
           
            if ($employee_no != "" && $Employee_Sub_Group_drop == "" && $Salary_Branch == "" && $Department == "") {
                $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `EmployeeNo`='$employee_no'");
            } else if ($employee_no != "" && $Employee_Sub_Group_drop != "" && $Salary_Branch == "" && $Department == "") {
                $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `EmployeeNo`='$employee_no' AND `Employee_Sub_Group`='$Employee_Sub_Group_drop'");
            } else if ($employee_no == "" && $Employee_Sub_Group_drop != "" && $Salary_Branch == "" && $Department == "") {
                $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `Employee_Sub_Group`='$Employee_Sub_Group_drop'");
            } else if ($employee_no != "" && $Employee_Sub_Group_drop == "" && $Salary_Branch != "" && $Department == "") {
                $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `EmployeeNo`='$employee_no' AND `Salary_Branch`='$Salary_Branch'");
            } else if ($employee_no != "" && $Employee_Sub_Group_drop != "" && $Salary_Branch != "" && $Department == "") {
                $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `EmployeeNo`='$employee_no' AND `Employee_Sub_Group`='$Employee_Sub_Group_drop' AND `Salary_Branch`='$Salary_Branch'");
            } else if ($employee_no == "" && $Employee_Sub_Group_drop != "" && $Salary_Branch != "" && $Department == "") {
                $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `Employee_Sub_Group`='$Employee_Sub_Group_drop' AND `Salary_Branch`='$Salary_Branch'");
            } else if ($employee_no == "" && $Employee_Sub_Group_drop == "" && $Salary_Branch != "" && $Department == "") {
                $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `Salary_Branch`='$Salary_Branch'");
            } else if ($employee_no != "" && $Employee_Sub_Group_drop == "" && $Salary_Branch == "" && $Department != "") {
                $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `EmployeeNo`='$employee_no' AND `Department`='$Department'");
            } else if ($employee_no != "" && $Employee_Sub_Group_drop != "" && $Salary_Branch == "" && $Department != "") {
                $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `EmployeeNo`='$employee_no' AND `Employee_Sub_Group`='$Employee_Sub_Group_drop' AND `Department`='$Department'");
            } else if ($employee_no == "" && $Employee_Sub_Group_drop != "" && $Salary_Branch == "" && $Department != "") {
                $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `Employee_Sub_Group`='$Employee_Sub_Group_drop' AND `Department`='$Department'");
            } else if ($employee_no != "" && $Employee_Sub_Group_drop == "" && $Salary_Branch != "" && $Department != "") {
                $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `EmployeeNo`='$employee_no' AND `Salary_Branch`='$Salary_Branch' AND `Department`='$Department'");
            } else if ($employee_no != "" && $Employee_Sub_Group_drop != "" && $Salary_Branch != "" && $Department != "") {
                $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `EmployeeNo`='$employee_no' AND `Employee_Sub_Group`='$Employee_Sub_Group_drop' AND `Salary_Branch`='$Salary_Branch' AND `Department`='$Department'");
            } else if ($employee_no == "" && $Employee_Sub_Group_drop != "" && $Salary_Branch != "" && $Department != "") {
                $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `Employee_Sub_Group`='$Employee_Sub_Group_drop' AND `Salary_Branch`='$Salary_Branch' AND `Department`='$Department'");
            } else if ($employee_no == "" && $Employee_Sub_Group_drop == "" && $Salary_Branch != "" && $Department != "") {
                $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `Salary_Branch`='$Salary_Branch' AND `Department`='$Department'");
            } else if ($employee_no == "" && $Employee_Sub_Group_drop == "" && $Salary_Branch == "" && $Department != "") {
                $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `Department`='$Department'");
            } else {
                $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata`");
            }
            
        
        
            
            $num = 1;
            while($empdata=mysqli_fetch_array($selectemp)){
                $empid=$empdata['Id'];
                $EmployeeNo=$empdata['EmployeeNo'];
            $stmt = mysqli_query($conn, "SELECT * FROM salary AS sal
            LEFT JOIN employeedata AS emp ON emp.EmployeeNo=sal.employee_id
            WHERE sal.timeperiod= '$Timeid' AND sal.employee_id = '$EmployeeNo'  && sal.HrReview='ACCEPT' && sal.finace ='ACCEPT' && sal.ceo='ACCEPT'") or die(mysqli_error($conn));
            // Check if any data is fetched
            if (mysqli_num_rows($stmt) > 0) {
                // Loop through the fetched data
                while ($fetch = mysqli_fetch_array($stmt)) {
        $html.= "<tr>
                    <td>{$num}</td>
                    <td>{$fetch['employee_id']}</td>
                    <td>{$fetch['EmpName']}</td>
                    <td>{$fetch['EmpFatderName']}</td>
                    <td>{$fetch['EmpCNIC']}</td>
                    <td>{$fetch['JoiningDate']}</td>
                    <td>{$fetch['JobTitle']}</td>
                    <td>{$fetch['Grade']}</td>
                    <td>{$fetch['EmploymentType']}</td>
                    <td>{$fetch['Department']}</td>
                    <td>{$fetch['ClassGroup']}</td>
                    <td>{$fetch['ClassGroup']}</td>
                    <td>{$fetch['SubGroup']}</td>
                    <td>{$fetch['PaymentMode']}</td>
                    <td>{$fetch['BankAccountNo']}</td>";
                    $selected = mysqli_query($conn, "SELECT * FROM `allowances` WHERE `allowance_status`='ACTIVE'");
                    while ($rowallowance = mysqli_fetch_array($selected)) {
                        $allowanceId=$rowallowance['id'];
                        $seletpayroll=mysqli_query($conn,"SELECT * FROM `payrole` WHERE `EmpNo`='$empid' AND `AllowancesId`='$allowanceId' AND `timeperiod`='$Timeid'");
                        if(mysqli_num_rows($seletpayroll)==0){
                            $html.= '<td></td>';
                        }else{
                            while($rowpayroll=mysqli_fetch_array($seletpayroll)){
                                $html.= '<td>'.$rowpayroll['total'].'</td>';
                            }
                        }
                    }
                    $html.= "
                    <td>{$fetch['net_pay']}</td>";
        // Fetch allowances data from the database
        $html.= "</tr>";
    }
    }
    $num++;
    }
    }
    $html.=" </tbody>
        </table>";
     header("Content-Type: application/vnd.ms-excel");
     header("Content-Disposition: attachment; filename=Payroll.xls");
    echo $html;
    
    
    }
    
        else if(isset($_POST['submitall'])){
            $frommonth = $_POST['frommonth'];
            $tomunth = $_POST['tomunth'];
                
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
                            <h6>Payroll Details</h6>
                        </div>
                        <p>Patslip - <?php echo date("d-M-Y")?></p>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                        <table class="table">
                                    <thead>
                                        <?php 
                                        
                                        $selecttime = mysqli_query($conn, "SELECT * FROM `timeperiod` WHERE `FromDate` >= '$frommonth' AND `FromDate` <= '$tomunth' ORDER BY `ID` DESC ") or die(mysqli_error($conn));
                                    $num = 1;
    
                                    // Loop through the time periods
                                    while ($rowtime = mysqli_fetch_array($selecttime)) {
                                        $timeId=$rowtime['ID'];
    
                                        echo "<tr><th>Period Id:".$rowtime['ID']."</th>"."<th>Month:".date('F Y', strtotime($rowtime['ToDate']))."</th>"."<th>From Date:".$rowtime['FromDate']."</th>"."<th>To Date:".$rowtime['ToDate']."</th></tr>";
                                        ?>
                                        <tr>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <td>Employee</td>
                                                        <?php 
                                                                $selected=mysqli_query($conn,"SELECT * FROM `allowances` WHERE `allowance_status`='ACTIVE'");
                                                                while($rowallownce=mysqli_fetch_array($selected)){
                                                                    echo '<th>'.$rowallownce['allowance'].'</th>';
                                                                }
                                                        ?>
                                                        <td>total</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                $sql = "SELECT * FROM `salary`WHERE `timeperiod`='$timeId'";
                                                $result = $conn->query($sql);
                                                if ($result->num_rows > 0) {
                                                    $a = 1;
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $row['employee_id']; ?><h5><?php echo $row['EmpName']; ?></h5><?php echo $row['JobTitle']; ?></td>
                                                            <?php
                                                            $empid = $row['employee_id'];
                                                            $selected = mysqli_query($conn, "SELECT * FROM `allowances` WHERE `allowance_status`='ACTIVE'");
                                                            while ($rowallowance = mysqli_fetch_array($selected)) {
                                                                $allowanceId = $rowallowance['id'];
                                                                
                                                                $seletpayroll = mysqli_query($conn, "SELECT * FROM `payrole` AS pay 
                                                                LEFT JOIN `employeedata` AS emp ON emp.Id=pay.EmpNo 
                                                                WHERE emp.EmployeeNo =$empid AND pay.AllowancesId=$allowanceId ");
                                                                if (mysqli_num_rows($seletpayroll) == 0) {
                                                                    echo '<th>Nill</th>';
                                                                } else {
                                                                    while ($rowpayroll = mysqli_fetch_array($seletpayroll)) {
                                                                        echo '<th>' . $rowpayroll['Rate'] . '</th>';
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
                                            </tr>
                                            <?php }?>
                                            </thead>
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
          else if(isset($_POST['Sub-Group'])){
    $frommonth = $_POST['frommonth'];
    $tomunth = $_POST['tomunth'];
    $Employee_Sub_Group_drop=$_POST['Employee_Sub_Group'];
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
                        <div class="row text-center mt-5 mx-3">
                           <div class="col-4 text-center mt-5">
                                <img src="image/1662096718940.jpg" class="w-50 img-fluid " alt="">
                            </div>
                            <div class="col-8 text-center mt-5">
                                <h3>Water & Sanitation Services Company</h3>
                                <h6>Mingora Swat</h6>
                                <h6>Pay Sub-Grouping</h6>
                            </div>
                            <p>Patslip - <?php echo date("d-M-Y")?></p>
                                <table class="">
                                    <thead>
                                        <?php 
                                        
                                        $selecttime = mysqli_query($conn, "SELECT * FROM `timeperiod` WHERE `FromDate` >= '$frommonth' AND `FromDate` <= '$tomunth' ORDER BY `ID` DESC ") or die(mysqli_error($conn));
                                    $num = 1;
    
                                    // Loop through the time periods
                                    while ($rowtime = mysqli_fetch_array($selecttime)) {
                                        $timeId=$rowtime['ID'];
    
                                        echo "<th>Period Id:".$rowtime['ID']."</th>"."<th>Month:".date('F Y', strtotime($rowtime['ToDate']))."</th>"."<th>From Date:".$rowtime['FromDate']."</th>"."<th>To Date:".$rowtime['ToDate']."</th>";
                                        ?>
                                        <table class="table table-bordered border-dark border-5">
                                            <?php 
                                            $selectsubgroup=mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='Employee_Sub_Group'");
                                            while($rowgroup=mysqli_fetch_array($selectsubgroup)){
                                                $subgroup= $rowgroup['drop'];
                                            ?>
                                            <tr>
                                                <td class="text-start" >Pay Sub-Group:<?php echo $rowgroup['drop']?></td>
                                            </tr>
                                            <tr>
                                                <table class="table table-bordered border-black">
                                                    <thead style="background-color: gray;" class="table-bordered border-black" >
                                                        <tr>
                                                            <th>Emp. No.</th>
                                                            <th>Emp. Name</th>
                                                            <th>Emp. Father Name</th>
                                                            <th>Emp. CNIC No.</th>
                                                            <th>Pay Amnount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class=" table-bordered border-black" >
                                                        <?php $selectsallery=mysqli_query($conn,"SELECT * FROM `salary` WHERE `SubGroup`='$subgroup' && `timeperiod`='$timeId'");
                                                        while($rowsallery=mysqli_fetch_array($selectsallery)){
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $rowsallery['employee_id'] ?></td>
                                                                <td><?php echo $rowsallery['EmpName'] ?></td>
                                                                <td><?php echo $rowsallery['EmpFatherName'] ?></td>
                                                                <td><?php echo $rowsallery['EmpCNIC'] ?></td>
                                                                <td><?php echo $rowsallery['net_pay'] ?></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                        <tr class="border border-black">
                                                            <td>Emp. Count:</td>
                                                        <td>
                                                            <?php
                                                            $countquery = mysqli_query($conn, "SELECT COUNT(*) AS employee FROM `salary` WHERE `SubGroup`='$subgroup' && `timeperiod`='$timeId'");
                                                            $countdata = mysqli_fetch_assoc($countquery);
                                                            echo $countdata['employee']; ?>
                                                        </td>
                                                        <td></td>
                                                        <td>Total:</td>
                                                        <td>
                                                                <?php 
                                                                $countquery = mysqli_query($conn, "SELECT SUM(net_pay) AS total_net_pay
                                                                                                FROM `salary` WHERE `SubGroup`='$subgroup' && `timeperiod`='$timeId'");
                                                                $countdata = mysqli_fetch_assoc($countquery);
                                                                echo $countdata['total_net_pay'];?>
                                                        </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </tr>
                                            <tr>
    
                                            </tr>
                                            <?php }?>
                                        </table>
                                        <?php
                                    }?>
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
    else if(isset($_POST['Bank'])){
        $frommonth = $_POST['frommonth'];
        $tomunth = $_POST['tomunth'];
        $Salary_Branch=$_POST['Salary_Branch'];
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
                <div class="row text-center mt-5 mx-3">
                    <div class="col-4 text-center mt-5">
                        <img src="image/1662096718940.jpg" class="w-50 img-fluid " alt="">
                    </div>
                    <div class="col-8 text-center mt-5">
                        <h3>Water & Sanitation Services Company</h3>
                        <h6>Mingora Swat</h6>
                    </div>
    
                        <?php 
                                
                                $selecttime = mysqli_query($conn, "SELECT * FROM `timeperiod` WHERE `FromDate` >= '$frommonth' AND `FromDate` <= '$tomunth' ORDER BY `ID` DESC ") or die(mysqli_error($conn));
                            $num = 1;
    
                            // Loop through the time periods
                            while ($rowtime = mysqli_fetch_array($selecttime)) {
                                $timeId=$rowtime['ID'];
                                ?>
                                <h6>Payroll (Bank Credit Advice) - <?php echo date('F Y', strtotime($rowtime['ToDate']));?> </h6>
                                <p>Date :- <?php echo date("d-M-Y")?></p>
                                <table class="table table-bordered border-dark border-5">
                                    <?php 
                                    if($Salary_Branch == ""){
                                        $selectSalaryBankBranch=mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='SalaryBankBranch'");
                                    }
                                    else if($Salary_Branch !=""){
                                        $selectSalaryBankBranch=mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='SalaryBankBranch' && `drop`='$Salary_Branch' ");
                                    }
                                    while($rowgroup=mysqli_fetch_array($selectSalaryBankBranch)){
                                        $SalaryBankBranch= $rowgroup['drop'];
                                        
                                    ?>
                                        <table>
                                            <tr>
                                                <th class="text-start" >
                                                    Bank: <?php echo $SalaryBankBranch;?>
                                                </th>
                                            </tr>
                                            <tr>
                                                <table class="table table-bordered border-black">
                                                    <thead style="background-color: gray;" class="table-bordered border-black" >
                                                        <tr>
                                                            <th>Emp. No.</th>
                                                            <th>Emp. Name</th>
                                                            <th>Emp. Father Name</th>
                                                            <th>Acount Number</th>
                                                            <th>Pay Amnount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class=" table-bordered border-black" >
                                                        <?php $selectsallery=mysqli_query($conn,"SELECT * FROM `salary` WHERE `Bank`='$SalaryBankBranch' && `timeperiod`='$timeId'");
                                                        while($rowsallery=mysqli_fetch_array($selectsallery)){
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $rowsallery['employee_id'] ?></td>
                                                                <td><?php echo $rowsallery['EmpName'] ?></td>
                                                                <td><?php echo $rowsallery['EmpFatherName'] ?></td>
                                                                <td><?php echo $rowsallery['BankAccountNo'] ?></td>
                                                                <td><?php echo $rowsallery['net_pay'] ?></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                        <tr class="border border-black">
                                                            <td>Emp. Count:</td>
                                                        <td>
                                                            <?php
                                                            $countquery = mysqli_query($conn, "SELECT COUNT(*) AS employee FROM `salary` WHERE `Bank`='$SalaryBankBranch' && `timeperiod`='$timeId'");
                                                            $countdata = mysqli_fetch_assoc($countquery);
                                                            echo $countdata['employee']; ?>
                                                        </td>
                                                        <td></td>
                                                        <td>Total:</td>
                                                        <td>
                                                                <?php 
                                                                $countquery = mysqli_query($conn, "SELECT SUM(net_pay) AS total_net_pay
                                                                FROM `salary` WHERE `Bank`='$SalaryBankBranch' && `timeperiod`='$timeId'");
                                                                $countdata = mysqli_fetch_assoc($countquery);
                                                                echo $countdata['total_net_pay'];?>
                                                        </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </tr>
                                        </table>
                                    <?php }?>
                                </table>
                                <?php
                                
                            }?>
    
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
    else if(isset($_POST['Cheque'])){
    $frommonth = $_POST['frommonth'];
    $tomunth = $_POST['tomunth'];
    $Salary_Branch=$_POST['Salary_Branch'];
    
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
                        <div class="row text-center mt-5 mx-3">
                            <div class="col-4 text-center mt-5">
                                <img src="image/1662096718940.jpg" class="w-50 img-fluid " alt="">
                            </div>
                            <div class="col-8 text-center mt-5">
                                <h3>Water & Sanitation Services Company</h3>
                                <h6>Mingora Swat</h6>
                            </div>
    
                                <?php 
                                        
                                        $selecttime = mysqli_query($conn, "SELECT * FROM `timeperiod` WHERE `FromDate` >= '$frommonth' AND `FromDate` <= '$tomunth' ORDER BY `ID` DESC ") or die(mysqli_error($conn));
                                    $num = 1;
    
                                    // Loop through the time periods
                                    while ($rowtime = mysqli_fetch_array($selecttime)) {
                                        $timeId=$rowtime['ID'];
                                        ?>
                                        <h6>Payroll (Cheque Payment) - <?php echo date('F Y', strtotime($rowtime['ToDate']));?> </h6>
                                        <p>Date :- <?php echo date("d-M-Y")?></p>
                                        <table class="table table-bordered border-dark border-5">
                                        
                                        <tr>
                                            <table class="table table-bordered border-black">
                                                <thead style="background-color: gray;" class="table-bordered border-black" >
                                                    <tr>
                                                        <th>Emp. No.</th>
                                                        <th>Emp. Name</th>
                                                        <th>Emp. Father Name</th>
                                                        <th>CNIC No</th>
                                                        <th>Pay Amnount</th>
                                                    </tr>
                                                </thead>
                                                <tbody class=" table-bordered border-black" >
                                                    <?php $selectsallery=mysqli_query($conn,"SELECT * FROM salary AS sal
                                                    LEFT JOIN employeedata AS emp ON sal.employee_id = emp.EmployeeNo
                                                    WHERE emp.Salary_Mode='CHEQUE' AND sal.timeperiod='$timeId' ");
                                                    while($rowsallery=mysqli_fetch_array($selectsallery)){
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $rowsallery['employee_id'] ?></td>
                                                            <td><?php echo $rowsallery['EmpName'] ?></td>
                                                            <td><?php echo $rowsallery['EmpFatherName'] ?></td>
                                                            <td><?php echo $rowsallery['EmpCNIC'] ?></td>
                                                            <td><?php echo $rowsallery['net_pay'] ?></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <tr class="border border-black">
                                                        <td>Emp. Count:</td>
                                                    <td>
                                                        <?php
                                                        $countquery = mysqli_query($conn, "SELECT COUNT(*) AS employee FROM `salary`AS sal
                                                    LEFT JOIN employeedata AS emp ON sal.employee_id = emp.EmployeeNo
                                                    WHERE emp.Salary_Mode='CHEQUE' AND sal.timeperiod='$timeId' ");
                                                        $countdata = mysqli_fetch_assoc($countquery);
                                                        echo $countdata['employee']; ?>
                                                    </td>
                                                    <td></td>
                                                    <td>Total:</td>
                                                    <td>
                                                            <?php 
                                                            $countquery = mysqli_query($conn, "SELECT SUM(net_pay) AS total_net_pay
                                                            FROM salary AS sal
                                                            LEFT JOIN employeedata AS emp ON sal.employee_id = emp.EmployeeNo
                                                            WHERE emp.Salary_Mode='CHEQUE' AND sal.timeperiod='$timeId' ");
                                                            $countdata = mysqli_fetch_assoc($countquery);
                                                            echo $countdata['total_net_pay'];?>
                                                    </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </tr>
                                        </table>
                                        <?php
                                        
                                    }?>
    
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
                
                if(isset($_POST['submit'])){ 
                    $employee_no = $_POST['employee_no'];
                    $frommonth = $_POST['frommonth'];
                    $tomunth = $_POST['tomunth'];
                    $Employee_Sub_Group_drop=$_POST['Employee_Sub_Group'];
                    $Salary_Branch=$_POST['Salary_Branch'];
                    $Department=$_POST['Department'];
                    
                        $html.= '
                        <table  class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Emp. No	</th>
                                <th>Emp. Name</th>
                                <th>Emp. Father Name</th>
                                <th>Emp. CNIC</th>
                                <th>Joining Date</th>
                                <th>Job Title</th>
                                <th>Grade</th>
                                <th>Employment Type</th>
                                <th>Department</th>
                                <th>Class</th>
                                <th>Group</th>
                                <th>Sub-Group</th>
                                <th>Payment Mode</th>
                                <th>Bank Account No.</th>
                                ';
                                $selected=mysqli_query($conn,"SELECT * FROM `allowances` WHERE `allowance_status`='ACTIVE'");
                                while($rowallownce=mysqli_fetch_array($selected)){
                                    $html.= '<th>'.$rowallownce['allowance'].'</th>';
                                }
                                $html.= '<th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        ';
                        $selecttime = mysqli_query($conn, "SELECT * FROM `timeperiod` WHERE `FromDate` >= '$frommonth' AND `FromDate` <= '$tomunth' ORDER BY `ID` DESC ") or die(mysqli_error($conn));
                        // Loop through the time periods
                        $num = 1;
                        while ($rowtime = mysqli_fetch_array($selecttime)) {
                            $Timeid = $rowtime['ID'];
                            // Fetch data for the given employee and time period
                           
                            if ($employee_no != "" && $Employee_Sub_Group_drop == "" && $Salary_Branch == "" && $Department == "") {
                                $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `EmployeeNo`='$employee_no'");
                            } else if ($employee_no != "" && $Employee_Sub_Group_drop != "" && $Salary_Branch == "" && $Department == "") {
                                $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `EmployeeNo`='$employee_no' AND `Employee_Sub_Group`='$Employee_Sub_Group_drop'");
                            } else if ($employee_no == "" && $Employee_Sub_Group_drop != "" && $Salary_Branch == "" && $Department == "") {
                                $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `Employee_Sub_Group`='$Employee_Sub_Group_drop'");
                            } else if ($employee_no != "" && $Employee_Sub_Group_drop == "" && $Salary_Branch != "" && $Department == "") {
                                $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `EmployeeNo`='$employee_no' AND `Salary_Branch`='$Salary_Branch'");
                            } else if ($employee_no != "" && $Employee_Sub_Group_drop != "" && $Salary_Branch != "" && $Department == "") {
                                $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `EmployeeNo`='$employee_no' AND `Employee_Sub_Group`='$Employee_Sub_Group_drop' AND `Salary_Branch`='$Salary_Branch'");
                            } else if ($employee_no == "" && $Employee_Sub_Group_drop != "" && $Salary_Branch != "" && $Department == "") {
                                $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `Employee_Sub_Group`='$Employee_Sub_Group_drop' AND `Salary_Branch`='$Salary_Branch'");
                            } else if ($employee_no == "" && $Employee_Sub_Group_drop == "" && $Salary_Branch != "" && $Department == "") {
                                $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `Salary_Branch`='$Salary_Branch'");
                            } else if ($employee_no != "" && $Employee_Sub_Group_drop == "" && $Salary_Branch == "" && $Department != "") {
                                $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `EmployeeNo`='$employee_no' AND `Department`='$Department'");
                            } else if ($employee_no != "" && $Employee_Sub_Group_drop != "" && $Salary_Branch == "" && $Department != "") {
                                $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `EmployeeNo`='$employee_no' AND `Employee_Sub_Group`='$Employee_Sub_Group_drop' AND `Department`='$Department'");
                            } else if ($employee_no == "" && $Employee_Sub_Group_drop != "" && $Salary_Branch == "" && $Department != "") {
                                $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `Employee_Sub_Group`='$Employee_Sub_Group_drop' AND `Department`='$Department'");
                            } else if ($employee_no != "" && $Employee_Sub_Group_drop == "" && $Salary_Branch != "" && $Department != "") {
                                $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `EmployeeNo`='$employee_no' AND `Salary_Branch`='$Salary_Branch' AND `Department`='$Department'");
                            } else if ($employee_no != "" && $Employee_Sub_Group_drop != "" && $Salary_Branch != "" && $Department != "") {
                                $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `EmployeeNo`='$employee_no' AND `Employee_Sub_Group`='$Employee_Sub_Group_drop' AND `Salary_Branch`='$Salary_Branch' AND `Department`='$Department'");
                            } else if ($employee_no == "" && $Employee_Sub_Group_drop != "" && $Salary_Branch != "" && $Department != "") {
                                $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `Employee_Sub_Group`='$Employee_Sub_Group_drop' AND `Salary_Branch`='$Salary_Branch' AND `Department`='$Department'");
                            } else if ($employee_no == "" && $Employee_Sub_Group_drop == "" && $Salary_Branch != "" && $Department != "") {
                                $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `Salary_Branch`='$Salary_Branch' AND `Department`='$Department'");
                            } else if ($employee_no == "" && $Employee_Sub_Group_drop == "" && $Salary_Branch == "" && $Department != "") {
                                $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `Department`='$Department'");
                            } else {
                                $selectemp = mysqli_query($conn, "SELECT * FROM `employeedata`");
                            }
                            
                        
                        
                            
                            $num = 1;
                            while($empdata=mysqli_fetch_array($selectemp)){
                                $empid=$empdata['Id'];
                                $EmployeeNo=$empdata['EmployeeNo'];
                            $stmt = mysqli_query($conn, "SELECT * FROM salary AS sal
                            LEFT JOIN employeedata AS emp ON emp.EmployeeNo=sal.employee_id
                            WHERE sal.timeperiod= '$Timeid' AND sal.employee_id = '$EmployeeNo'  && sal.HrReview='ACCEPT' && sal.finace ='ACCEPT' && sal.ceo='ACCEPT'") or die(mysqli_error($conn));
                            // Check if any data is fetched
                            if (mysqli_num_rows($stmt) > 0) {
                                // Loop through the fetched data
                                while ($fetch = mysqli_fetch_array($stmt)) {
                        $html.= "<tr>
                                    <td>{$num}</td>
                                    <td>{$fetch['employee_id']}</td>
                                    <td>{$fetch['EmpName']}</td>
                                    <td>{$fetch['EmpFatderName']}</td>
                                    <td>{$fetch['EmpCNIC']}</td>
                                    <td>{$fetch['JoiningDate']}</td>
                                    <td>{$fetch['JobTitle']}</td>
                                    <td>{$fetch['Grade']}</td>
                                    <td>{$fetch['EmploymentType']}</td>
                                    <td>{$fetch['Department']}</td>
                                    <td>{$fetch['ClassGroup']}</td>
                                    <td>{$fetch['ClassGroup']}</td>
                                    <td>{$fetch['SubGroup']}</td>
                                    <td>{$fetch['PaymentMode']}</td>
                                    <td>{$fetch['BankAccountNo']}</td>";
                                    $selected = mysqli_query($conn, "SELECT * FROM `allowances` WHERE `allowance_status`='ACTIVE'");
                                    while ($rowallowance = mysqli_fetch_array($selected)) {
                                        $allowanceId=$rowallowance['id'];
                                        $seletpayroll=mysqli_query($conn,"SELECT * FROM `payrole` WHERE `EmpNo`='$empid' AND `AllowancesId`='$allowanceId' AND `timeperiod`='$Timeid'");
                                        if(mysqli_num_rows($seletpayroll)==0){
                                            $html.= '<td></td>';
                                        }else{
                                            while($rowpayroll=mysqli_fetch_array($seletpayroll)){
                                                $html.= '<td>'.$rowpayroll['total'].'</td>';
                                            }
                                        }
                                    }
                                    $html.= "
                                    <td>{$fetch['net_pay']}</td>";
                        // Fetch allowances data from the database
                        $html.= "</tr>";
                    }
                    }
                    $num++;
                    }
                    }
                    $html.=" </tbody>
                        </table>";
                     header("Content-Type: application/vnd.ms-excel");
                     header("Content-Disposition: attachment; filename=Payroll.xls");
                    echo $html;
                    
                    
                    }
                    
                        else if(isset($_POST['submitall'])){
                            $frommonth = $_POST['frommonth'];
                            $tomunth = $_POST['tomunth'];
                                
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
                                            <h6>Payroll Details</h6>
                                        </div>
                                        <p>Patslip - <?php echo date("d-M-Y")?></p>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                        <table class="table">
                                                    <thead>
                                                        <?php 
                                                        
                                                        $selecttime = mysqli_query($conn, "SELECT * FROM `timeperiod` WHERE `FromDate` >= '$frommonth' AND `FromDate` <= '$tomunth' ORDER BY `ID` DESC ") or die(mysqli_error($conn));
                                                    $num = 1;
                    
                                                    // Loop through the time periods
                                                    while ($rowtime = mysqli_fetch_array($selecttime)) {
                                                        $timeId=$rowtime['ID'];
                    
                                                        echo "<tr><th>Period Id:".$rowtime['ID']."</th>"."<th>Month:".date('F Y', strtotime($rowtime['ToDate']))."</th>"."<th>From Date:".$rowtime['FromDate']."</th>"."<th>To Date:".$rowtime['ToDate']."</th></tr>";
                                                        ?>
                                                        <tr>
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <td>Employee</td>
                                                                        <?php 
                                                                                $selected=mysqli_query($conn,"SELECT * FROM `allowances` WHERE `allowance_status`='ACTIVE'");
                                                                                while($rowallownce=mysqli_fetch_array($selected)){
                                                                                    echo '<th>'.$rowallownce['allowance'].'</th>';
                                                                                }
                                                                        ?>
                                                                        <td>total</td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                $sql = "SELECT * FROM `salary`WHERE `timeperiod`='$timeId'";
                                                                $result = $conn->query($sql);
                                                                if ($result->num_rows > 0) {
                                                                    $a = 1;
                                                                    while ($row = mysqli_fetch_array($result)) {
                                                                        ?>
                                                                        <tr>
                                                                            <td><?php echo $row['employee_id']; ?><h5><?php echo $row['EmpName']; ?></h5><?php echo $row['JobTitle']; ?></td>
                                                                            <?php
                                                                            $empid = $row['employee_id'];
                                                                            $selected = mysqli_query($conn, "SELECT * FROM `allowances` WHERE `allowance_status`='ACTIVE'");
                                                                            while ($rowallowance = mysqli_fetch_array($selected)) {
                                                                                $allowanceId = $rowallowance['id'];
                                                                                
                                                                                $seletpayroll = mysqli_query($conn, "SELECT * FROM `payrole` AS pay 
                                                                                LEFT JOIN `employeedata` AS emp ON emp.Id=pay.EmpNo 
                                                                                WHERE emp.EmployeeNo =$empid AND pay.AllowancesId=$allowanceId ");
                                                                                if (mysqli_num_rows($seletpayroll) == 0) {
                                                                                    echo '<th>Nill</th>';
                                                                                } else {
                                                                                    while ($rowpayroll = mysqli_fetch_array($seletpayroll)) {
                                                                                        echo '<th>' . $rowpayroll['Rate'] . '</th>';
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
                                                            </tr>
                                                            <?php }?>
                                                            </thead>
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
                          else if(isset($_POST['Sub-Group'])){
                    $frommonth = $_POST['frommonth'];
                    $tomunth = $_POST['tomunth'];
                    $Employee_Sub_Group_drop=$_POST['Employee_Sub_Group'];
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
                                        <div class="row text-center mt-5 mx-3">
                                           <div class="col-4 text-center mt-5">
                                                <img src="image/1662096718940.jpg" class="w-50 img-fluid " alt="">
                                            </div>
                                            <div class="col-8 text-center mt-5">
                                                <h3>Water & Sanitation Services Company</h3>
                                                <h6>Mingora Swat</h6>
                                                <h6>Pay Sub-Grouping</h6>
                                            </div>
                                            <p>Patslip - <?php echo date("d-M-Y")?></p>
                                                <table class="">
                                                    <thead>
                                                        <?php 
                                                        
                                                        $selecttime = mysqli_query($conn, "SELECT * FROM `timeperiod` WHERE `FromDate` >= '$frommonth' AND `FromDate` <= '$tomunth' ORDER BY `ID` DESC ") or die(mysqli_error($conn));
                                                    $num = 1;
                    
                                                    // Loop through the time periods
                                                    while ($rowtime = mysqli_fetch_array($selecttime)) {
                                                        $timeId=$rowtime['ID'];
                    
                                                        echo "<th>Period Id:".$rowtime['ID']."</th>"."<th>Month:".date('F Y', strtotime($rowtime['ToDate']))."</th>"."<th>From Date:".$rowtime['FromDate']."</th>"."<th>To Date:".$rowtime['ToDate']."</th>";
                                                        ?>
                                                        <table class="table table-bordered border-dark border-5">
                                                            <?php 
                                                            $selectsubgroup=mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='Employee_Sub_Group'");
                                                            while($rowgroup=mysqli_fetch_array($selectsubgroup)){
                                                                $subgroup= $rowgroup['drop'];
                                                            ?>
                                                            <tr>
                                                                <td class="text-start" >Pay Sub-Group:<?php echo $rowgroup['drop']?></td>
                                                            </tr>
                                                            <tr>
                                                                <table class="table table-bordered border-black">
                                                                    <thead style="background-color: gray;" class="table-bordered border-black" >
                                                                        <tr>
                                                                            <th>Emp. No.</th>
                                                                            <th>Emp. Name</th>
                                                                            <th>Emp. Father Name</th>
                                                                            <th>Emp. CNIC No.</th>
                                                                            <th>Pay Amnount</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody class=" table-bordered border-black" >
                                                                        <?php $selectsallery=mysqli_query($conn,"SELECT * FROM `salary` WHERE `SubGroup`='$subgroup' && `timeperiod`='$timeId'");
                                                                        while($rowsallery=mysqli_fetch_array($selectsallery)){
                                                                            ?>
                                                                            <tr>
                                                                                <td><?php echo $rowsallery['employee_id'] ?></td>
                                                                                <td><?php echo $rowsallery['EmpName'] ?></td>
                                                                                <td><?php echo $rowsallery['EmpFatherName'] ?></td>
                                                                                <td><?php echo $rowsallery['EmpCNIC'] ?></td>
                                                                                <td><?php echo $rowsallery['net_pay'] ?></td>
                                                                            </tr>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                        <tr class="border border-black">
                                                                            <td>Emp. Count:</td>
                                                                        <td>
                                                                            <?php
                                                                            $countquery = mysqli_query($conn, "SELECT COUNT(*) AS employee FROM `salary` WHERE `SubGroup`='$subgroup' && `timeperiod`='$timeId'");
                                                                            $countdata = mysqli_fetch_assoc($countquery);
                                                                            echo $countdata['employee']; ?>
                                                                        </td>
                                                                        <td></td>
                                                                        <td>Total:</td>
                                                                        <td>
                                                                                <?php 
                                                                                $countquery = mysqli_query($conn, "SELECT SUM(net_pay) AS total_net_pay
                                                                                                                FROM `salary` WHERE `SubGroup`='$subgroup' && `timeperiod`='$timeId'");
                                                                                $countdata = mysqli_fetch_assoc($countquery);
                                                                                echo $countdata['total_net_pay'];?>
                                                                        </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </tr>
                                                            <tr>
                    
                                                            </tr>
                                                            <?php }?>
                                                        </table>
                                                        <?php
                                                    }?>
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
                    else if(isset($_POST['Bank'])){
                        $frommonth = $_POST['frommonth'];
                        $tomunth = $_POST['tomunth'];
                        $Salary_Branch=$_POST['Salary_Branch'];
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
                                <div class="row text-center mt-5 mx-3">
                                    <div class="col-4 text-center mt-5">
                                        <img src="image/1662096718940.jpg" class="w-50 img-fluid " alt="">
                                    </div>
                                    <div class="col-8 text-center mt-5">
                                        <h3>Water & Sanitation Services Company</h3>
                                        <h6>Mingora Swat</h6>
                                    </div>
                    
                                        <?php 
                                                
                                                $selecttime = mysqli_query($conn, "SELECT * FROM `timeperiod` WHERE `FromDate` >= '$frommonth' AND `FromDate` <= '$tomunth' ORDER BY `ID` DESC ") or die(mysqli_error($conn));
                                            $num = 1;
                    
                                            // Loop through the time periods
                                            while ($rowtime = mysqli_fetch_array($selecttime)) {
                                                $timeId=$rowtime['ID'];
                                                ?>
                                                <h6>Payroll (Bank Credit Advice) - <?php echo date('F Y', strtotime($rowtime['ToDate']));?> </h6>
                                                <p>Date :- <?php echo date("d-M-Y")?></p>
                                                <table class="table table-bordered border-dark border-5">
                                                    <?php 
                                                    if($Salary_Branch == ""){
                                                        $selectSalaryBankBranch=mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='SalaryBankBranch'");
                                                    }
                                                    else if($Salary_Branch !=""){
                                                        $selectSalaryBankBranch=mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='SalaryBankBranch' && `drop`='$Salary_Branch' ");
                                                    }
                                                    while($rowgroup=mysqli_fetch_array($selectSalaryBankBranch)){
                                                        $SalaryBankBranch= $rowgroup['drop'];
                                                        
                                                    ?>
                                                        <table>
                                                            <tr>
                                                                <th class="text-start" >
                                                                    Bank: <?php echo $SalaryBankBranch;?>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <table class="table table-bordered border-black">
                                                                    <thead style="background-color: gray;" class="table-bordered border-black" >
                                                                        <tr>
                                                                            <th>Emp. No.</th>
                                                                            <th>Emp. Name</th>
                                                                            <th>Emp. Father Name</th>
                                                                            <th>Acount Number</th>
                                                                            <th>Pay Amnount</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody class=" table-bordered border-black" >
                                                                        <?php $selectsallery=mysqli_query($conn,"SELECT * FROM `salary` WHERE `Bank`='$SalaryBankBranch' && `timeperiod`='$timeId'");
                                                                        while($rowsallery=mysqli_fetch_array($selectsallery)){
                                                                            ?>
                                                                            <tr>
                                                                                <td><?php echo $rowsallery['employee_id'] ?></td>
                                                                                <td><?php echo $rowsallery['EmpName'] ?></td>
                                                                                <td><?php echo $rowsallery['EmpFatherName'] ?></td>
                                                                                <td><?php echo $rowsallery['BankAccountNo'] ?></td>
                                                                                <td><?php echo $rowsallery['net_pay'] ?></td>
                                                                            </tr>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                        <tr class="border border-black">
                                                                            <td>Emp. Count:</td>
                                                                        <td>
                                                                            <?php
                                                                            $countquery = mysqli_query($conn, "SELECT COUNT(*) AS employee FROM `salary` WHERE `Bank`='$SalaryBankBranch' && `timeperiod`='$timeId'");
                                                                            $countdata = mysqli_fetch_assoc($countquery);
                                                                            echo $countdata['employee']; ?>
                                                                        </td>
                                                                        <td></td>
                                                                        <td>Total:</td>
                                                                        <td>
                                                                                <?php 
                                                                                $countquery = mysqli_query($conn, "SELECT SUM(net_pay) AS total_net_pay
                                                                                FROM `salary` WHERE `Bank`='$SalaryBankBranch' && `timeperiod`='$timeId'");
                                                                                $countdata = mysqli_fetch_assoc($countquery);
                                                                                echo $countdata['total_net_pay'];?>
                                                                        </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </tr>
                                                        </table>
                                                    <?php }?>
                                                </table>
                                                <?php
                                                
                                            }?>
                    
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
                    else if(isset($_POST['Cheque'])){
                    $frommonth = $_POST['frommonth'];
                    $tomunth = $_POST['tomunth'];
                    $Salary_Branch=$_POST['Salary_Branch'];
                    
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
                                        <div class="row text-center mt-5 mx-3">
                                            <div class="col-4 text-center mt-5">
                                                <img src="image/1662096718940.jpg" class="w-50 img-fluid " alt="">
                                            </div>
                                            <div class="col-8 text-center mt-5">
                                                <h3>Water & Sanitation Services Company</h3>
                                                <h6>Mingora Swat</h6>
                                            </div>
                    
                                                <?php 
                                                        
                                                        $selecttime = mysqli_query($conn, "SELECT * FROM `timeperiod` WHERE `FromDate` >= '$frommonth' AND `FromDate` <= '$tomunth' ORDER BY `ID` DESC ") or die(mysqli_error($conn));
                                                    $num = 1;
                    
                                                    // Loop through the time periods
                                                    while ($rowtime = mysqli_fetch_array($selecttime)) {
                                                        $timeId=$rowtime['ID'];
                                                        ?>
                                                        <h6>Payroll (Cheque Payment) - <?php echo date('F Y', strtotime($rowtime['ToDate']));?> </h6>
                                                        <p>Date :- <?php echo date("d-M-Y")?></p>
                                                        <table class="table table-bordered border-dark border-5">
                                                        
                                                        <tr>
                                                            <table class="table table-bordered border-black">
                                                                <thead style="background-color: gray;" class="table-bordered border-black" >
                                                                    <tr>
                                                                        <th>Emp. No.</th>
                                                                        <th>Emp. Name</th>
                                                                        <th>Emp. Father Name</th>
                                                                        <th>CNIC No</th>
                                                                        <th>Pay Amnount</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class=" table-bordered border-black" >
                                                                    <?php $selectsallery=mysqli_query($conn,"SELECT * FROM salary AS sal
                                                                    LEFT JOIN employeedata AS emp ON sal.employee_id = emp.EmployeeNo
                                                                    WHERE emp.Salary_Mode='CHEQUE' AND sal.timeperiod='$timeId' ");
                                                                    while($rowsallery=mysqli_fetch_array($selectsallery)){
                                                                        ?>
                                                                        <tr>
                                                                            <td><?php echo $rowsallery['employee_id'] ?></td>
                                                                            <td><?php echo $rowsallery['EmpName'] ?></td>
                                                                            <td><?php echo $rowsallery['EmpFatherName'] ?></td>
                                                                            <td><?php echo $rowsallery['EmpCNIC'] ?></td>
                                                                            <td><?php echo $rowsallery['net_pay'] ?></td>
                                                                        </tr>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                    <tr class="border border-black">
                                                                        <td>Emp. Count:</td>
                                                                    <td>
                                                                        <?php
                                                                        $countquery = mysqli_query($conn, "SELECT COUNT(*) AS employee FROM `salary`AS sal
                                                                    LEFT JOIN employeedata AS emp ON sal.employee_id = emp.EmployeeNo
                                                                    WHERE emp.Salary_Mode='CHEQUE' AND sal.timeperiod='$timeId' ");
                                                                        $countdata = mysqli_fetch_assoc($countquery);
                                                                        echo $countdata['employee']; ?>
                                                                    </td>
                                                                    <td></td>
                                                                    <td>Total:</td>
                                                                    <td>
                                                                            <?php 
                                                                            $countquery = mysqli_query($conn, "SELECT SUM(net_pay) AS total_net_pay
                                                                            FROM salary AS sal
                                                                            LEFT JOIN employeedata AS emp ON sal.employee_id = emp.EmployeeNo
                                                                            WHERE emp.Salary_Mode='CHEQUE' AND sal.timeperiod='$timeId' ");
                                                                            $countdata = mysqli_fetch_assoc($countquery);
                                                                            echo $countdata['total_net_pay'];?>
                                                                    </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </tr>
                                                        </table>
                                                        <?php
                                                        
                                                    }?>
                    
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
                    
    else if(isset($_POST['EOBI'])){
    $frommonth = $_POST['frommonth'];
    $tomunth = $_POST['tomunth'];
    $Department=$_POST['Department'];
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
            <div class="row text-center mt-5 mx-3">
                <div class="col-4 text-center mt-5">
                    <img src="image/1662096718940.jpg" class="w-50 img-fluid " alt="">
                </div>
                <div class="col-8 text-center mt-5">
                    <h3>Water & Sanitation Services Company</h3>
                    <h6>Mingora Swat</h6>
                </div>

                    <?php 
                            
                            $selecttime = mysqli_query($conn, "SELECT * FROM `timeperiod` WHERE `FromDate` >= '$frommonth' AND `FromDate` <= '$tomunth' ORDER BY `ID` DESC ") or die(mysqli_error($conn));
                        $num = 1;

                        // Loop through the time periods
                        while ($rowtime = mysqli_fetch_array($selecttime)) {
                            $timeId=$rowtime['ID'];
                            ?>
                            <h6>EOBI-Loan - <?php echo date('F Y', strtotime($rowtime['ToDate']));?> </h6>
                            <p>Date :- <?php echo date("d-M-Y")?></p>
                            <table class="table table-bordered border-dark border-5">
                                <?php 
                                if($Salary_Branch == ""){
                                    $selectSalaryBankBranch=mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='Department'");
                                }
                                else if($Salary_Branch !=""){
                                    $selectSalaryBankBranch=mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='Department' && `drop`='$Department'");
                                }
                                while($rowgroup=mysqli_fetch_array($selectSalaryBankBranch)){
                                    $SalaryBankBranch= $rowgroup['drop'];
                                    
                                ?>
                                    <table>
                                        <tr>
                                            <th class="text-start" >
                                                Bank: <?php echo $SalaryBankBranch;?>
                                            </th>
                                        </tr>
                                        <tr>
                                            <table class="table table-bordered border-black">
                                                <thead style="background-color: gray;" class="table-bordered border-black" >
                                                    <tr>
                                                    <th>Emp. No.</th>
                                                    <th>Emp. Name</th>
                                                    <th>Gross Pay</th>
                                                    <th>EOBI-EMP</th>
                                                    <th>Loan-EMP</th>
                                                    <th>Other Dedcution</th>
                                                    <th>EOBI Employer</th>
                                                    <th>Net Pay</th>
                                                    </tr>
                                                </thead>
                                                <tbody class=" table-bordered border-black" >
                                                    <?php $selectsallery=mysqli_query($conn,"SELECT * FROM `employeedata` WHERE `Department`='$SalaryBankBranch'");
                                                    while($rowsallery=mysqli_fetch_array($selectsallery)){
                                                        $empNo=$rowsallery['EmployeeNo'];
                                                        $empId=$rowsallery['Id'];
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $rowsallery['EmployeeNo']?></td>
      
                                                            <th style=" border: solid 1px black; " ><?php echo $rowsallery['fName']." ".$rowsallery['lName']?> S/O <?php echo $rowsallery['father_Name']?></td>

                                                            <td><?php $countquery = mysqli_query($conn, "SELECT gross_pay AS total_gross_pay FROM `salary` WHERE `employee_id`='$empNo' && `timeperiod`='$timeId'"); $countdata = mysqli_fetch_assoc($countquery); echo $countdata['total_gross_pay'];?></td>
                                                            <td><?php $countquery = mysqli_query($conn, "SELECT SUM(total) AS total_EOBI_EMP FROM `payrole` WHERE `EmpNo`='$empId' && `fin_classification`='EOBI-EE' &&`timeperiod`='$timeId'"); $countdata = mysqli_fetch_assoc($countquery); echo $countdata['total_EOBI_EMP'];?></td>

                                                            <td><?php $countquery = mysqli_query($conn, "SELECT SUM(total) AS total_Loan_EMP FROM `payrole` WHERE `EmpNo`='$empId' && `fin_classification`='LOAN-EE' &&`timeperiod`='$timeId'"); $countdata = mysqli_fetch_assoc($countquery); echo $countdata['total_Loan_EMP'];?></td>
                                                            <td><?php $countquery = mysqli_query($conn, "SELECT SUM(total) AS total_Other FROM `payrole` WHERE `EmpNo`='$empId' && `fin_classification`='OTH-DED' &&`timeperiod`='$timeId'"); $countdata = mysqli_fetch_assoc($countquery); echo $countdata['total_Other'];?></td>

                                                            <td><?php $countquery = mysqli_query($conn, "SELECT SUM(total) AS total_EOBI_Employer FROM `payrole` WHERE `EmpNo`='$empId' && `fin_classification`='EOBI-ER' &&`timeperiod`='$timeId'"); $countdata = mysqli_fetch_assoc($countquery); echo $countdata['total_EOBI_Employer'];?></td>
                                                            

                                                        <td><?php 
                                                            $countquery = mysqli_query($conn, "SELECT SUM(net_pay) AS total_net_pay
                                                            FROM `salary` WHERE `employee_id`='$empNo' && `timeperiod`='$timeId'");
                                                            $countdata = mysqli_fetch_assoc($countquery);
                                                            echo $countdata['total_net_pay'];?></td>
                                                        </tr>
                                                        
                                                        <?php
                                                    }
                                                    ?>
                                                    <tr class="border border-black">
                                                        <td></td>
                                                        <td></td>
                                                        <td><?php $countquery = mysqli_query($conn, "SELECT gross_pay AS total_gross_pay FROM `salary` WHERE `Department`='$SalaryBankBranch' && `timeperiod`='$timeId'"); $countdata = mysqli_fetch_assoc($countquery); echo $countdata['total_gross_pay'];?></td>
                                                   
                                                        <td><?php $countquery = mysqli_query($conn, "SELECT SUM(total) AS total_EOBI_EMP FROM `payrole` AS pay
                                                        LEFT JOIN `employeedata` AS emp ON pay.EmpNo=emp.Id
                                                        WHERE emp.Department='$SalaryBankBranch' && pay.fin_classification='EOBI-EE' &&pay.timeperiod='$timeId'"); $countdata = mysqli_fetch_assoc($countquery); echo $countdata['total_EOBI_EMP'];?></td>

                                                        <td><?php $countquery = mysqli_query($conn, "SELECT SUM(total) AS total_Loan_EMP FROM `payrole` AS pay
                                                        LEFT JOIN `employeedata` AS emp ON pay.EmpNo=emp.Id
                                                        WHERE emp.Department='$SalaryBankBranch' && pay.fin_classification='LOAN-EE' &&pay.timeperiod='$timeId'"); $countdata = mysqli_fetch_assoc($countquery); echo $countdata['total_Loan_EMP'];?></td>
                                                        <td><?php $countquery = mysqli_query($conn, "SELECT SUM(total) AS total_Other FROM `payrole` AS pay
                                                        LEFT JOIN `employeedata` AS emp ON pay.EmpNo=emp.Id
                                                        WHERE emp.Department='$SalaryBankBranch' && pay.fin_classification='OTH-DED' &&pay.timeperiod='$timeId'"); $countdata = mysqli_fetch_assoc($countquery); echo $countdata['total_Other'];?></td>

                                                        <td><?php $countquery = mysqli_query($conn, "SELECT SUM(total) AS total_EOBI_Employer FROM `payrole` AS pay
                                                        LEFT JOIN `employeedata` AS emp ON pay.EmpNo=emp.Id
                                                        WHERE emp.Department='$SalaryBankBranch' && pay.fin_classification='EOBI-ER' &&pay.timeperiod='$timeId'"); $countdata = mysqli_fetch_assoc($countquery); echo $countdata['total_EOBI_Employer'];?></td>
                                                    <td>
                                                            <?php 
                                                            $countquery = mysqli_query($conn, "SELECT SUM(net_pay) AS total_net_pay
                                                            FROM `salary` WHERE `Department`='$SalaryBankBranch' && `timeperiod`='$timeId'");
                                                            $countdata = mysqli_fetch_assoc($countquery);
                                                            echo $countdata['total_net_pay'];?>
                                                    </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <hr>
                                        </tr>
                                    </table>
                                <?php }?>
                            </table>
                            <?php
                            
                        }?>

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
else if(isset($_POST['Department'])){
    $frommonth = $_POST['frommonth'];
    $tomunth = $_POST['tomunth'];
    $Department=$_POST['Department'];
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
            <div class="row text-center mt-5 mx-3">
                <div class="col-4 text-center mt-5">
                    <img src="image/1662096718940.jpg" class="w-50 img-fluid " alt="">
                </div>
                <div class="col-8 text-center mt-5">
                    <h3>Water & Sanitation Services Company</h3>
                    <h6>Mingora Swat</h6>
                </div>

                    <?php 
                            
                            $selecttime = mysqli_query($conn, "SELECT * FROM `timeperiod` WHERE `FromDate` >= '$frommonth' AND `FromDate` <= '$tomunth' ORDER BY `ID` DESC ") or die(mysqli_error($conn));
                        $num = 1;

                        // Loop through the time periods
                        while ($rowtime = mysqli_fetch_array($selecttime)) {
                            $timeId=$rowtime['ID'];
                            ?>
                            <h6>Payroll (Bank Credit Advice) - <?php echo date('F Y', strtotime($rowtime['ToDate']));?> </h6>
                            <p>Date :- <?php echo date("d-M-Y")?></p>
                            <table class="table table-bordered border-dark border-5">
                                <?php 
                                if($Salary_Branch == ""){
                                    $selectSalaryBankBranch=mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='Department'");
                                }
                                else if($Salary_Branch !=""){
                                    $selectSalaryBankBranch=mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='Department' && `drop`='$Department' ");
                                }
                                while($rowgroup=mysqli_fetch_array($selectSalaryBankBranch)){
                                    $SalaryBankBranch= $rowgroup['drop'];
                                    
                                ?>
                                    <table>
                                        <tr>
                                            <th class="text-start" >
                                                Bank: <?php echo $SalaryBankBranch;?>
                                            </th>
                                        </tr>
                                        <tr>
                                            <table class="table table-bordered border-black">
                                                <thead style="background-color: gray;" class="table-bordered border-black" >
                                                    <tr>
                                                        <th>Personal Details</th>
                                                        <th>Employment Detail</th>
                                                        <th>Bank Detail</th>
                                                        <?php 
                                                                $selected=mysqli_query($conn,"SELECT * FROM `allowances` WHERE `allowance_status`='ACTIVE'");
                                                                while($rowallownce=mysqli_fetch_array($selected)){
                                                                    echo '<th>'.$rowallownce['allowance'].'</th>';
                                                                }
                                                        ?>
                                                        <th>Pay Amnount</th>
                                                    </tr>
                                                </thead>
                                                <tbody class=" table-bordered border-black" >
                                                    <?php $selectsallery=mysqli_query($conn,"SELECT * FROM `employeedata` WHERE `Department`='$SalaryBankBranch'");
                                                    while($rowsallery=mysqli_fetch_array($selectsallery)){
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <table class="table">
                                                                    <tr>
                                                                        <td style=" border: solid 1px black; " ><?php echo $rowsallery['EmployeeNo']?></td>
                                                                        <th style=" border: solid 1px black; " ><?php echo $rowsallery['fName']." ".$rowsallery['lName']?></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style=" border: solid 1px black; " ><?php echo $rowsallery['father_Name']?></td>
                                                                        <td style=" border: solid 1px black; " ><?php echo $rowsallery['CNIC']?></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td>
                                                                <table class="table">
                                                                    <tr>
                                                                        <td style=" border: solid 1px black; " ><?php echo $rowsallery['Department']?></td>
                                                                        <th colspan="2" style=" border: solid 1px black; " ><?php echo date('d-m-Y', strtotime($rowsallery['Joining_Date'])); ?></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style=" border: solid 1px black; " ><?php echo $rowsallery['Employee_Group']?></td>
                                                                        <td style=" border: solid 1px black; " ><?php echo $rowsallery['Grade']?></td>
                                                                        <td style=" border: solid 1px black; " ><?php echo date('d-m-Y', strtotime($rowsallery['Contract_Expiry_Date'])); ?></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td>
                                                                <table class="table">
                                                                    <tr>
                                                                        <td style=" border: solid 1px black; " ><?php echo $rowsallery['Salary_Mode']?></td>
                                                                        <th style=" border: solid 1px black; " ><?php echo date('d-m-Y', strtotime($rowsallery['Account_No'])); ?></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2"  style=" border: solid 1px black; " ><?php echo $rowsallery['Salary_Bank']?>|<?php echo $rowsallery['Salary_Branch']?> </td>
                                                                       
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <?php
                                                        $empid = $rowsallery['Id'];
                                                        $empNo=$rowsallery['EmployeeNo'];
                                                        $selected = mysqli_query($conn, "SELECT * FROM `allowances` WHERE `allowance_status`='ACTIVE'");
                                                        while ($rowallowance = mysqli_fetch_array($selected)) {
                                                            $allowanceId = $rowallowance['id'];
                                                            
                                                            $seletpayroll = mysqli_query($conn, "SELECT * FROM `payrole` AS pay 
                                                            LEFT JOIN `employeedata` AS emp ON emp.Id=pay.EmpNo 
                                                            WHERE pay.EmpNo =$empid AND pay.AllowancesId=$allowanceId ");
                                                            if (mysqli_num_rows($seletpayroll) == 0) {
                                                                echo '<th>Nill</th>';
                                                            } else {
                                                                while ($rowpayroll = mysqli_fetch_array($seletpayroll)) {
                                                                    echo '<th>' . $rowpayroll['Rate'] . '</th>';
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                        <td><?php 
                                                            $countquery = mysqli_query($conn, "SELECT SUM(net_pay) AS total_net_pay
                                                            FROM `salary` WHERE `employee_id`='$empNo' && `timeperiod`='$timeId'");
                                                            $countdata = mysqli_fetch_assoc($countquery);
                                                            echo $countdata['total_net_pay'];?></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <tr class="border border-black">
                                                        <td>Emp. Count:</td>
                                                    <td>
                                                        <?php
                                                        $countquery = mysqli_query($conn, "SELECT COUNT(*) AS employee FROM `salary` WHERE `Department`='$SalaryBankBranch' && `timeperiod`='$timeId'");
                                                        $countdata = mysqli_fetch_assoc($countquery);
                                                        echo $countdata['employee']; ?>
                                                    </td>
                                                    <td></td>
                                                    <td>Total:</td>
                                                    <td>
                                                            <?php 
                                                            $countquery = mysqli_query($conn, "SELECT SUM(net_pay) AS total_net_pay
                                                            FROM `salary` WHERE `Department`='$SalaryBankBranch' && `timeperiod`='$timeId'");
                                                            $countdata = mysqli_fetch_assoc($countquery);
                                                            echo $countdata['total_net_pay'];?>
                                                    </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <hr>
                                        </tr>
                                    </table>
                                <?php }?>
                            </table>
                            <?php
                            
                        }?>

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
    