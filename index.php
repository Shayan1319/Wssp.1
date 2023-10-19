<?php
session_start();
error_reporting(0);
// Include the database connection file
include 'link/desigene/db.php';

if (isset($_POST['submit'])) {
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $loginas = $_POST['loginas'];
    
    $email_search = mysqli_query($conn,"SELECT * FROM `login` WHERE `Email`='$Email' && `Password`='$Password'");
    $row = mysqli_fetch_array($email_search);
    
    if ($row["Designation"] == "Admin" && $loginas == "Admin") {
        $_SESSION['loginid'] = $row['Id'];
        $_SESSION['EmployeeNumber'] = $row['EmployeeNumber'];
        $_SESSION['Designation'] = $row['Designation'];
        $_SESSION['name']=$row['FullName'];
        $_SESSION['Email'] = $row['Email'];
        
        header("Location: admaindash/index.php");
        exit();
    }
    elseif ($row["Designation"] == "HR manager" && $loginas == "Admin") {
        $_SESSION['loginid'] = $row['Id'];
        $_SESSION['EmployeeNumber'] = $row['EmployeeNumber'];
        $_SESSION['Designation'] = $row['Designation'];
        $_SESSION['name']=$row['FullName'];
        $_SESSION['Email'] = $row['Email'];
        
        header("Location: hradmin/index.php");
        exit();
    }
    elseif ($row["Designation"] == "Payroll manager" && $loginas == "Admin") {
        $_SESSION['loginid'] = $row['Id'];
        $_SESSION['EmployeeNumber'] = $row['EmployeeNumber'];
        $_SESSION['Designation'] = $row['Designation'];
        $_SESSION['name']=$row['FullName'];
        $_SESSION['Email'] = $row['Email'];
        
        header("Location: payroll/payroll.php");
        exit();
    }
    elseif ($row["Designation"] == "CEO" && $loginas == "Admin") {
        $_SESSION['loginid'] = $row['Id'];
        $_SESSION['EmployeeNumber'] = $row['EmployeeNumber'];
        $_SESSION['Designation'] = $row['Designation'];
        $_SESSION['name']=$row['FullName'];
        $_SESSION['Email'] = $row['Email'];
        
        header("Location: ceodash/index.php");
        exit();
    }
    elseif ($row["Designation"] == "AppAdmin" && $loginas == "Admin") {
        $_SESSION['loginid'] = $row['Id'];
        $_SESSION['EmployeeNumber'] = $row['EmployeeNumber'];
        $_SESSION['Designation'] = $row['Designation'];
        $_SESSION['name']=$row['FullName'];
        $_SESSION['Email'] = $row['Email'];
        
        header("Location: api/index.php");
        exit();
    }
    elseif ($row["Designation"] == "FinanceAdmin" && $loginas == "Admin") {
        $_SESSION['loginid'] = $row['Id'];
        $_SESSION['EmployeeNumber'] = $row['EmployeeNumber'];
        $_SESSION['Designation'] = $row['Designation'];
        $_SESSION['name']=$row['FullName'];
        $_SESSION['Email'] = $row['Email'];
        
        header("Location: Finance/index.php");
        exit();
    }
    elseif ($row["Designation"] == "Manager" && $loginas == "Admin") {
        $_SESSION['loginid'] = $row['Id'];
        $_SESSION['EmployeeNumber'] = $row['EmployeeNumber'];
        $_SESSION['Designation'] = $row['Designation'];
        $_SESSION['name']=$row['FullName'];
        $_SESSION['Email'] = $row['Email'];
        
        header("Location: Manager/index.php");
        exit();
    }
    elseif ($row["Designation"] == "DYManager" && $loginas == "Admin") {
        $_SESSION['loginid'] = $row['Id'];
        $_SESSION['EmployeeNumber'] = $row['EmployeeNumber'];
        $_SESSION['Designation'] = $row['Designation'];
        $_SESSION['name']=$row['FullName'];
        $_SESSION['Email'] = $row['Email'];
        
        header("Location: DYManager/index.php");
        exit();
    }
    elseif ($row["Designation"] == "GM" && $loginas == "Admin") {
        $_SESSION['loginid'] = $row['Id'];
        $_SESSION['EmployeeNumber'] = $row['EmployeeNumber'];
        $_SESSION['Designation'] = $row['Designation'];
        $_SESSION['name']=$row['FullName'];
        $_SESSION['Email'] = $row['Email'];
        
        header("Location: GM/index.php");
        exit();
    }
    elseif ($loginas == "Employee") {
        $_SESSION['loginid'] = $row['Id'];
        $_SESSION['EmployeeNumber'] = $row['EmployeeNumber'];
        $_SESSION['Designation'] = $row['Designation'];
        $_SESSION['name']=$row['FullName'];
        header("Location: Employee/index.php");
        exit();
    }
    else {
        // Handle the case where the login is not successful
        echo '<script>alert("Sorry, the email or password is incorrect.");</script>';
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
                        <h3 class="text-center mb-4">Sign In</h3>
                        <form action="#" class="login-form" method="POST" >
                            <div class="form-group">
                                <select class="form-control mt-2 rounded-left" name="loginas" id="">
                                  <option value="">Login As</option>
                                  <option value="Employee">Employee</option>
                                  <option value="Admin">Admin</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="email" name="Email" class="form-control mt-2 rounded-left" placeholder="Username" required>
                            </div>
                            <div class="form-group d-flex">
                                <input type="password" name="Password" class="form-control mt-2 rounded-left" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="form-control mt-2 btn btn-primary rounded submit px-3">Login</button>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50 text-md-right">
                                    <a href="forgit.php">Forgot Password</a>
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