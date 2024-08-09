<?php
session_start();
error_reporting(0);
// links to database
include('link/desigene/db.php');
if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber']) || $_SESSION['Designation'] != 'FinanceAdmin') {
    // Log the unauthorized access attempt for auditing purposes
    error_log("Unauthorized access attempt. User: {$_SESSION['loginid']}");
    
    // Redirect to the logout page
    header("Location: ../logout.php");
    exit; // Ensure that the script stops execution after the header redirection
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include ('link/links.php')?>
</head>
<style>
    .red-dot {
    height: 10px;
    width: 10px;
    background-color: red;
    border-radius: 50%;
    display: inline-block;
    margin-left: 5px;
}
    .select2-selection__rendered {
        line-height: 31px !important;
    }

    .select2-container .select2-selection--single {
        height: 35px !important;
        border: 1px solid #ced4da;
        border-radius: 0px;
        width: 300px !important;
    }

    .select2-selection__arrow {
        height: 34px !important;
    }
    label span {
        color: red;
    }
</style>
<body>
    <?php include('link/desigene/sidebar.php')?>
    <div id="main">
        <?php include('link/desigene/navbar.php')?>
        <div class="container-fluid py-5">
            <div class="row">
                <div class="col-md-4 my-2">
                    <div class="form-group">
                        <label class="form-label">Employee ID No<span>*</span></label>
                        <div>
                            <select name="employeeId" required id="employee_no" class="form-control select2">
                            <?php
                            $select = mysqli_query($conn, "SELECT * FROM `employeedata`");
                            if (mysqli_num_rows($select) > 0) {
                                echo '<option value="">Select</option>';
                                while ($row = mysqli_fetch_assoc($select)) {
                                    echo '<option value="' . $row['EmployeeNo'] . '">' . $row['EmployeeNo'] . '</option>';
                                }
                            }
                            ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card card2 text-center bg-light">
                        <div style="background-color: darkblue;" class="card-header">
                            <div class="card-title text-white">Employee Gratuity</div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Employee No</th>
                                        <th>Emp. Name</th>
                                        <th>Emp. Designation</th>
                                        <th>Contr. Exp.Date</th>
                                        <th colspan="3">Total Service <br> Y &nbsp; M &nbsp; D</th>
                                        <th colspan="3">Period Service <br> Y &nbsp; M &nbsp; D</th>
                                        <th colspan="3">Gratuity Rate<br> Y &nbsp; M &nbsp; D</th>
                                        <th colspan="3">Service Gratuity Breakup<br> Y &nbsp; M &nbsp; D</th>
                                        <th colspan="3">Period Gratuity Breakup<br> Y &nbsp; M &nbsp; D</th>
                                        <th>Total Period Gratuity</th>
                                        <th>Total Service Gratuity</th>
                                        <th>Accept</th>
                                        <th>Reject</th>
                                    </tr>
                                </thead>
                                <tbody id="table-data">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('link/desigene/script.php')?>
    <script>
        $(function() {
            $(".select2").select2();
        });

        $(document).ready(function(){
            function loadTable(employeeId = '') {
                $.ajax({
                    url: "ajex/GratuityPending.php",
                    type: "POST",
                    data: { employeeId: employeeId },
                    success: function(data) {
                        $("#table-data").html(data);
                    }
                });
            }

            // Initial load
            loadTable();

            // Reload table on employee ID change
            $('#employee_no').change(function() {
                var employeeId = $(this).val();
                loadTable(employeeId);
            });

            // Handle accept button click
            $(document).on('click', '#Accept', function() {
                var id = $(this).data('accept');
                $.ajax({
                    url: 'ajex/GratuityPendingStatus.php',
                    type: 'POST',
                    data: { id: id, status: 'ACCEPT' },
                    success: function(response) {
                        loadTable($('#employee_no').val());
            // Refresh the mySidenav content
            $("#mySidenav").load(location.href + " #mySidenav>*", "");
                    }
                });
            });

            // Handle reject button click
            $(document).on('click', '#Reject', function() {
                var id = $(this).data('reject');
                $.ajax({
                    url: 'ajex/GratuityPendingStatus.php',
                    type: 'POST',
                    data: { id: id, status: 'REJECT' },
                    success: function(response) {
                        loadTable($('#employee_no').val());
                        
            // Refresh the mySidenav content
            $("#mySidenav").load(location.href + " #mySidenav>*", "");
                    }
                });
            });
        });
    </script>
</body>
</html>
<?php }?>