<?php
session_start();
error_reporting(0);
// Include the database connection file
include 'link/desigene/db.php';

if (isset($_POST['submit'])) {
    $employeeNO = $_POST['employeeNO'];
    $Email = $_POST['Email'];
    $MobileNumber = $_POST['MobileNumber'];
    $name = $_POST['name'];

    // Check if there is already a pending request for this employee number
    $checkQuery = "SELECT * FROM forgetpassword WHERE employeeNO = '$employeeNO' AND Status = 'Pending'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        echo "There is already a pending request for this employee number.";
    } else {
        // Insert the new request
        $insertQuery = "INSERT INTO forgetpassword (`employeeNO`, `Email`, `MobileNumber`, `Name`, `Status`) VALUES ('$employeeNO', '$Email', '$MobileNumber', '$name', 'Pending')";
        if (mysqli_query($conn, $insertQuery)) {
            echo "Request submitted successfully.";
            header("Location: admaindash/index.php");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
<?php include ('link/links.php')?>
</head>
<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                    <div class="login-wrap p-4 w-50 m-auto p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <img src="image/1662096718940.jpg" class="rounded-circle" width="300px" alt="">
                        </div>
                        <h3 class="text-center mb-4">Forget Password</h3>
                        <form action="#" class="login-form" method="POST" >
                            <div class="form-group">
                                <label for="employeeNO">Employee Number</label>
                                <input type="number"class="form-control mt-2 rounded-left" name="employeeNO" id="employeeNO" placeholder="Employee Number" required value="">
                            </div>
                            <div class="form-group">
                                <label for="email">Gmail</label>
                                <input type="email" name="Email" class="form-control mt-2 rounded-left" placeholder="Gmail">
                            </div>
                            <div class="form-group">
                                <label for="MobileNumber">Number</label>
                                <input type="number" id="MobileNumber" name="MobileNumber" class="form-control mt-2 rounded-left" placeholder="MobileNumber" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="Text" name="name" class="form-control mt-2 rounded-left" placeholder="Name" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" name="submit" class="form-control mt-2 btn btn-primary rounded submit px-3">Request for new email and password</button>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50 text-md-right">
                                    <a href="index.php">Login</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container-fluid my-5">

<section class="">
    <!-- Footer -->
    <!-- Copyright -->
    <div class="text-center text-white p-3" style="background-color: rgb(0 0 0 / 70%);">
        © 2020 Copyright:
        <a class="text-white" href="index.php">Kurtlar Developer</a> || Created by @Kurtlar Developer
    </div>
    <!-- Copyright -->
<!-- Footer -->
</section>
</div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
