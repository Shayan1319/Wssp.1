<?php
session_start();
error_reporting(0);
// Links to the database
include('link/desigene/db.php');
if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber'])) {
    ?>   <script>
        location.replace('../logout.php')
    </script><?php
  } else{
    if (isset($_POST['submit'])) {
        // Retrieve user input and sanitize it (use mysqli_real_escape_string or prepared statements)
        $emil = mysqli_real_escape_string($conn, $_POST['empid']);
        $JobDescription = mysqli_real_escape_string($conn, $_POST['JobDescription']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        // Perform the database insertion
        $insertQuery = "INSERT INTO `employee_exit`(`Employee_id`, `Reason_of_Leaving`, `Leaving_Date`) VALUES ('$emil', '$JobDescription', '$Q1')";
        $insertResult = mysqli_query($conn, $insertQuery);

        if ($insertResult) {
            ?>
            <script>
                alert("Data inserted successfully");
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("Data not inserted");
            </script>
            <?php
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <?php include('link/links.php')?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    </head>
    <body>
    <div id="">
        <?php include('link/desigene/navbar.php') ?>
        
        <div class="container-fluid py-5">
            <div class="row">
                <form action="" method="post">
                    <div class="col-lg-12">
                        <div class="card card2 text-center bg-light">
                            <div style="background-color: darkblue;" class="card-header ">
                                <div class="card-title text-white">Exit clearance form</div>
                            </div>
                            <div class="container">
                                <!-- Your form fields here with appropriate name attributes -->
                                <div class="row">
                                    <div class="col-md-4 my-2">
                                        <label for="empid">Employee Id</label>
                                        <select name="empid" id="empid" class="form-control select2">
                                            <?php
                                            $Employee_Manager = $_SESSION['EmployeeNumber'];
                                            $selectempdata = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `Status`='ON-DUTY' AND `Attendance_Supervisor`=$Employee_Manager");
                                            if (mysqli_num_rows($selectempdata) > 0) {
                                                echo '<option value="#employee_noid" class="employee-option" selected>Search</option>';
                                                while ($rowempdata = mysqli_fetch_assoc($selectempdata)) {
                                                    echo '<option value="#emp' . $rowempdata['EmployeeNo'] . '" class="employee-option">' . $rowempdata['EmployeeNo'] . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4 my-2">
                                        <label for="empid">Leaving date</label>
                                        <input type="date" class="form-control" value="<?php echo date('Y-m-d') ?>" placeholder="Employee Id" name="date" id="empid">
                                    </div>
                                    
                                    <!-- Other form fields... -->
                                </div>
                            </div>
                        </div>
                        <div class="card card2 bg-light my-5">
                            <div class="container">
                                <h4>Reason of leaving </h4>
                                <textarea name="JobDescription" id="JobDescription"></textarea>
                                <script>
                                    CKEDITOR.replace('JobDescription');
                                </script>
                            </div>
                        </div>
                        <div class="col-md-12 text-end mt-2">
                            <input style="background-color: darkblue;" type="submit"
                                   class="btn text-white float-right shadow" value="Submit" name="submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </body>
    </html>

    <?php
}
?>
