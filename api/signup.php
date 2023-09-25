<?php
include('../api/app Ak S api.php/config.php');
session_start();
error_reporting(0);
if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber'])) {
    ?>   <script>
        location.replace('../logout.php')
    </script><?php
  } else{
if(isset($_POST['submit']))
{
    $FullName = $_POST['FullName'];
    $Gander = $_POST['Gander'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $Employeenumber = $_POST['Employeenumber'];
    $Designation = $_POST['Designation'];
    $query = mysqli_query($conn, "INSERT INTO `login`(`FullName`, `Gender`, `Email`, `Password`, `EmployeeNumber`, `Designation`) VALUES ('$FullName','$Gander','$Email','$Password','$Employeenumber','$Designation')");
if ($query) {
    // Insertion was successful
    ?>
    <script>
        alert("Data inserted successfully");
        location.replace("signup.php");
    </script>
    <?php
} else {
    // Insertion failed
    echo '<script>alert("Sorry, data was not inserted: ' . mysqli_error($conn) . '");</script>';
}


}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <?php include ('link/links.php')?>
    </head>
    <style>
         .select2-selection__rendered {
      line-height: 31px !important;

    }

    .select2-container .select2-selection--single {
      height: 40px !important;
      border: 1px solid #ced4da;
      border-radius: 0px;
      width: 100% !important;
    }

    .select2-selection__arrow {
      height: 30px !important;
      

    }
    </style>
    <body>
        <?php include ('link/desigene/sidebar.php')?>
        <div id="main">
        <?php include('link/desigene/navbar.php')?>
            <div class="container-fluid m-auto p-5">
                <section class="vh-100 gradient-custom">
                    <div class="container py-5 h-100">
                        <div class="row justify-content-center align-items-center h-100">
                            <div class="">
                                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                                    <div class="card-body p-4 p-md-5">
                                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registrations</h3>
                                    </div>
                                    <div class="my-5">
                                    <table class="table">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>FullName</th>
                                                <th>Number</th>
                                                <th>Email</th>
                                                <th>Password</th>
                                                <th>Address</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $select = mysqli_query($conn,"SELECT * FROM `singin`");
                                            while($see=mysqli_fetch_array($select)){
                                            ?>
                                            <tr>
                                                <td> <?php echo $see ['name']?></td>
                                                <td> <?php echo $see ['number']?></td>
                                                <td> <?php echo $see ['email']?></td>
                                                <td> <?php echo $see ['password']?></td>
                                                <td> <?php echo $see ['address']?></td>
                                                <td> <?php echo $see ['status']?></td>
                                            </tr>
                                            <?php 
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>  
            </div>
        </div>
    <?php include('link/desigene/script.php')?>
   
    </body>
</html>
<?php }?>