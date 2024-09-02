<?php
session_start();
error_reporting(0);

include('link/desigene/db.php');

if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber']) || $_SESSION['Designation'] != 'Supervisor') {
    error_log("Unauthorized access attempt. User: {$_SESSION['loginid']}");
    header("Location: ../logout.php");
    exit;
} else {
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('link/links.php') ?>
    <style>
        h4, h3 { text-align: center; }
    </style>
    <link rel="stylesheet" href="../dist/select2/select2.min.css">
</head>
<body>
    <div id="main">
        <?php include('link/desigene/navbar.php') ?>
        <div class="container-fluid m-auto p-5">
            <div class="row my-2">
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label>Time Period</label>
                        <select name="" id="time_periodselect" class="form-control select2"></select>
                        <input type="number" name="" hidden class="d-none" id="workingdays" >
                    </div>
                </div>
                <div class="col-md-4 my-2">
                    <div class="form-group">
                        <label for="employee_no">Employee Id</label>
                        <select name="" id="employee_no" class="form-control select2"></select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="accordion" id="accordionExample">
                        <div class="card" id="time_period">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../dist/select2/select2.min.js"></script>

    <script>
$(document).ready(function () {
    $(".select2").select2();

    // Load time periods
    function loadTimePeriods() {
        console.log('Loading time periods...'); // Debugging log
        $.ajax({
            url: "ajex/timeperiod.php",
            type: "POST",
            success: function (data) {
                $("#time_periodselect").html(data).trigger('change');
                
                // Load working days when the time period is selected
                $("#time_periodselect").change(function () {
                    loadTimeData(); // Load working days data
                });

                // Call loadEmployeeData when time period is loaded
                loadEmployeeData();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error('Error loading time periods:', textStatus, errorThrown); // Debugging log
            }
        });
    }

    // Load employee data
    function loadEmployeeData() {
        var timePeriodId = $("#time_periodselect").val() || '';
        var SupervisorNo = '<?php echo $_SESSION['EmployeeNumber']; ?>';
        var working_day = $("#workingdays").val() || '';

        $.ajax({
            url: "ajex/empid copy.php",
            type: "POST",
            data: {
                SupervisorNo: SupervisorNo,
                TimePeriodId: timePeriodId,
                working_day: working_day
            },
            success: function (data) {
                console.log('Employee data loaded:', data); // Debugging log
                $("#employee_no").html(data).trigger('change');
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error('Error loading employee data:', textStatus, errorThrown);
            }
        });
    }

    // Function to load working days data
    function loadTimeData() {
        var timePeriodId = $("#time_periodselect").val() || '';
        $.ajax({
            url: "ajex/datatime.php",
            type: "POST",
            data: {
                TimePeriodId: timePeriodId
            },
            success: function (data) {
                console.log('Working days loaded:', data); // Debugging log
                $("#workingdays").val(data);  // Update input value with data
                loadEmployeeData(); // Call to load employees after working days are loaded
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error('Error loading working days:', textStatus, errorThrown);
            }
        });
    }

            // Function to load filtered data based on employee and time period
            function loadFilteredData() {
                var employeeId = $("#employee_no").val() || '';
                var timePeriodId = $("#time_periodselect").val() || '';
                var SupervisorNo = '<?php echo $_SESSION['EmployeeNumber']; ?>';

                $.ajax({
                    url: 'ajex/loadTimeperiod.php',
                    type: 'POST',
                    data: {
                        SupervisorNo: SupervisorNo,
                        EmployeeNo: employeeId,
                        TimePeriodId: timePeriodId
                    },
                    success: function(data) {
                        $('#time_period').html(data);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('Error loading time periods:', textStatus, errorThrown);
                    }
                });
            }

            // Load filtered data when the employee or time period changes
            $("#employee_no, #time_periodselect").on('change', function() {
                loadFilteredData();
            });

            // Initial load of data based on selected filters (if any)
            loadFilteredData();
    // Initial load of time periods and employee data
    loadTimePeriods();
    loadEmployeeData(); // Ensure it runs on page load

});
</script>

</body>
</html>

<?php } ?>
