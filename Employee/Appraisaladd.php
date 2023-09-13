<?php
session_start();
error_reporting(0);
// Links to the database
include('link/desigene/db.php');
if (strlen($_SESSION['loginid'] == 0 && $_SESSION['EmpId'] == 0)) {
    ?>
    <script>
        location.replace('../logout.php')
    </script>
    <?php
} else {
    if (isset($_POST['submit'])) {
        // Retrieve user input and sanitize it (use mysqli_real_escape_string or prepared statements)
        $empid = mysqli_real_escape_string($conn, $_POST['empid']);
        $JobDescription = mysqli_real_escape_string($conn, $_POST['JobDescription']);
        $Q1 = mysqli_real_escape_string($conn, $_POST['Q1']);

        // Perform the database insertion
        $insertQuery = "INSERT INTO `employee_performance` (`EmployeeID`, `JobDescription`, `Q1`) VALUES ('$empid', '$JobDescription', '$Q1')";
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
                                <div class="card-title text-white">Appraisal</div>
                            </div>
                            <div class="container">
                                <!-- Your form fields here with appropriate name attributes -->
                                <div class="row">
                                    <div class="col-md-4 my-2">
                                        <label for="empid">Personnel number</label>
                                        <input type="text" class="form-control" value="<?php echo $_SESSION['EmpId'] ?>" placeholder="Personnel number"
                                               name="empid" id="empid">
                                    </div>
                                    <!-- Other form fields... -->
                                </div>
                            </div>
                        </div>
                        <div class="card card2 bg-light my-5">
                            <div class="container">
                                <h4>Job description</h4>
                                <textarea name="JobDescription" id="JobDescription"></textarea>
                                <!-- CKEditor script... -->
                                <br><br>
                                <h5>Brief account of performance on the job during the period supported by statistical data...</h5>
                                <textarea name="Q1" id="Q1"></textarea>
                                <!-- CKEditor script... -->
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

    <!-- Include your JavaScript libraries -->
    </body>
    </html>

    <?php
}
?>
