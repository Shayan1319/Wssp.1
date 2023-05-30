<?php
session_start();
include 'link/desigene/db.php';
if(isset($_POST['submit'])){
    $Email=$_POST['Email'];
    $Password=$_POST['Password'];
    $query=mysqli_query($conn,"SELECT * FROM `login` WHERE `Email`='$Email' && `Password`='$Password'");
    $row=mysqli_fetch_array($query);
    if($row["Designation"]=="Admin"){
        $_SESSION['loginid']=$row['id'];
            ?>
            <script>
                location.replace('admaindash/index.php')
            </script>
            <?php
    }elseif($row["Designation"]=="HR manager"){
        $_SESSION['loginid']=$row['id'];
        ?>
        <script>
            location.replace('hrdash/index.php')
        </script>
        <?php
    }elseif($row["Designation"]=="Payroll manager"){
        $_SESSION['loginid']=$row['id'];
        ?>
        <script>
            location.replace('payrol.php')
        </script>
        <?php
    }elseif($row["Designation"]=="CEO"){
        $_SESSION['loginid']=$row['id'];
        ?>
        <script>
            location.replace('ceodash/index.php')
        </script>
        <?php
    }elseif($row["Designation"]=="Employee"){
        $_SESSION['loginid']=$row['id'];
        ?>
        <script>
            location.replace('Employe.php')
        </script>
        <?php
    }else{
        ?>
        <script>
             alert("Sorry sir email or password are wrong");
             
        </script>
         <script>
            location.replace('index.php')
        </script>
        <?php
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
            <div class="row justify-content-center mb-5">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section bg-indigo text-light">Login </h2>
                </div>
            </div>
            <div class="row justify-content-center">
                    <form action="" method="Post">
                    <div class="login-wrap p-4 w-50 m-auto p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <img src="image/1662096718940.jpg" class="rounded-circle border border-primary" width="100px" alt="">
                        </div>
                        <h3 class="text-center mb-4">Sign In</h3>
                        <form action="#" class="login-form">
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
                    </form>
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