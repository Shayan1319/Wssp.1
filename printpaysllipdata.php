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
                <table class="table">
                     <tr>
                        <th>
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <td>Class</td>
                                        <td>Group</td>
                                        <td>Sub-Group</td>
                                        <td>Emp.Count</td>
                                        <td>Amount</td>
                                    </tr>
                                </thead>
                    <tbody class="text-center">
                        <?php
                        // SQL query to select distinct Employee_Class from employeedata
                        $sql = "SELECT DISTINCT `Employee_Class` FROM `employeedata`";
                        $result = $conn->query($sql);
                        
                        // Check if there are any results
                        if ($result->num_rows > 0) {
                            $a = 1;
                            
                            // Loop through each distinct Employee_Class
                            while ($row = mysqli_fetch_assoc($result)) {
                                $employee_class = $row['Employee_Class'];
                                ?>
                                <tr>
                                    <td><?php echo $employee_class; ?></td>
                                    <td class="text-center">
                                        <table class="text-center table">
                                            <?php
                                            // SQL query to select distinct Employement_Group for each Employee_Class
                                            $selectgroup = mysqli_query($conn, "SELECT DISTINCT `Employement_Group` FROM `employeedata` WHERE `Employee_Class`='$employee_class'");
                                            
                                            // Loop through each Employement_Group for the current Employee_Class
                                            while ($datagrop = mysqli_fetch_assoc($selectgroup)) {
                                                $group = $datagrop['Employement_Group'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $group;?></td>
                                                    
                                                </tr>
                                                </table>
                                            </td>
                                            <td colspan="3" class="text-center">
                                                        <table class="text-center table">
                                                            <?php
                                                            // SQL query to select distinct Employee_Sub_Group for each Employement_Group and Employee_Class
                                                            $selectsubgroup = mysqli_query($conn, "SELECT DISTINCT `Employee_Sub_Group` FROM `employeedata` WHERE `Employee_Class`='$employee_class' AND `Employement_Group`='$group'");
                                                            
                                                            // Loop through each Employee_Sub_Group for the current Employee_Class and Employement_Group
                                                            while ($datasub = mysqli_fetch_assoc($selectsubgroup)) {
                                                                $subgroup = $datasub['Employee_Sub_Group'];
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $subgroup; ?></td>
                                                                    <td class="text-center">
                                                                            <?php
                                                                            // SQL query to count employees for each Employee_Sub_Group, Employement_Group, and Employee_Class
                                                                            $countquery = mysqli_query($conn, "SELECT COUNT(*) AS employee FROM `employeedata` WHERE `Employee_Class`='$employee_class' AND `Employement_Group`='$group' AND `Employee_Sub_Group`='$subgroup'");
                                                                            $countdata = mysqli_fetch_assoc($countquery);
                                                                             echo $countdata['employee']; ?>
                                                                    </td>
                                                                    <td class="text-center">

                                                                            <?php
                                                                            // SQL query to count employees for each Employee_Sub_Group, Employement_Group, and Employee_Class
                                                                            $countquery = mysqli_query($conn, "SELECT SUM(edf.net_pay) AS total_net_pay
                                                                                FROM `employeedata` AS ed
                                                                                INNER JOIN `earning_deduction_fund` AS edf ON edf.employee_id = ed.Id
                                                                                WHERE ed.Employee_Class = '$employee_class'
                                                                                AND ed.Employement_Group = '$group'
                                                                                AND ed.Employee_Sub_Group = '$subgroup';
                                                                                ");$countdata = mysqli_fetch_assoc($countquery);
                                                                                if($countdata['total_net_pay']>0){
                                                                             echo $countdata['total_net_pay']; } else{
                                                                                echo 0 ;
                                                                            }?>

                                                                    </td>
                                                                </tr>
                                    </td>
                                                                <?php
                                                            }
                                                            ?>
                                                    </tr>
                                                    </tbody>    
                                                    </table>
                                                    </td>
                                                    
                                                <?php
                                            }
                                            ?>
                                </tr>
                                <?php
                                $a++;
                            }
                        } else {
                            echo "<tr><td colspan='5'>Data not exist</td></tr>";
                        }
                        ?>
                        <tr>
                            <td class="text-end" colspan="4">Total</td>
                            <td>
                            <?php
                            $countquery = mysqli_query($conn, "SELECT SUM(edf.net_pay) AS total_net_pay
                            FROM `employeedata` AS ed
                            INNER JOIN `earning_deduction_fund` AS edf ON edf.employee_id = ed.Id
                           ");$countdata = mysqli_fetch_assoc($countquery);echo $countdata['total_net_pay'];?>
                            </td>
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
        $sql = "SELECT DISTINCT Salary_Branch FROM employeedata";
        $result = $conn->query($sql);
        
        // Check if there are any results
        if ($result->num_rows > 0) {
            // Loop through each result
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row['Salary_Branch']; 
                    $salary=$row['Salary_Branch'];
                    ?></td>
                    <td><?php
                    $countquery = mysqli_query($conn, "SELECT COUNT(*) AS employee FROM `employeedata` WHERE `Salary_Branch`='$salary'");
                    $countdata = mysqli_fetch_assoc($countquery);
                    echo $countdata['employee']; ?></td>
                   <td>
                   <?php 
                    $countquery = mysqli_query($conn, "SELECT SUM(edf.net_pay) AS total_net_pay
                            FROM `employeedata` AS ed
                            INNER JOIN `earning_deduction_fund` AS edf ON edf.employee_id = ed.Id
                            WHERE  ed.Salary_Branch ='$salary'
                           ");
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
