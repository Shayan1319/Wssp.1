<?php
include('../hrdash/link/desigene/db.php');
session_start();
error_reporting(0);
if (strlen($_SESSION['loginid']==0)) {
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
    $insertquery = "INSERT INTO `login`( `FullName`, `Gender`, `Email`, `Password`, `EmployeeNumber`, `Designation`) VALUES ('$FullName','$Gander','$Email','$Password','$Employeenumber','$Designation')";
    $query= mysqli_query($conn,$insertquery);
    if($query)
    {
        echo '<script>alert( "Data insertedsuccessfully");</script>';
    }
    else {
        echo '<script>alert("Sorry Data is not inserted");</script>'; 
      }

}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <?php include ('link/links.php')?>
    </head>
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
                                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                                        <form action="#" method="post">
                                            <div class="row">
                                                <div class="col-md-6 mb-4">
                                                    <div class="form-outline">
                                                        <input type="text" id="firstName" name="FullName" class="form-control form-control-lg" />
                                                        <label class="form-label" for="firstName">Full Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-4">
                                                    <h6 class="mb-2 pb-1">Gender: </h6>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="Gander" id="femaleGender"
                                                        value="Female" checked />
                                                        <label class="form-check-label" for="femaleGender">Female</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="Gander" id="maleGender"
                                                        value="Male" >
                                                        <label class="form-check-label" for="maleGender">Male</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="Gander" id="otherGender"
                                                        value="Other" />
                                                        <label class="form-check-label" for="otherGender">Other</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-4 pb-2">
                                                    <div class="form-outline">
                                                        <input type="email" name="Email" id="emailAddress" class="form-control form-control-lg" required />
                                                        <label class="form-label" for="emailAddress">Email</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-4 pb-2">
                                                    <div class="form-outline">
                                                        <input type="password" id="password" name="Password" class="form-control form-control-lg" value="Wssc@123" required />
                                                        <label class="form-label" for="emailAddress">Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-4 pb-2">
                                                    <div class="form-outline">
                                                        <input type="tel" id="Employeenumber" name="Employeenumber" class="form-control form-control-lg" required />
                                                        <label class="form-label" for="Employeenumber">Employee Number</label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <select class="select form-control" name="Designation" required>
                                                        <option  disabled>Designation.</option>
                                                        <option value="HR manager">Humans Resource manager.</option>
                                                        <option value="Payroll manager">Payroll manager.</option>
                                                        <option value="CEO">CEO</option>
                                                        <option value="Employee">Employee</option>
                                                    </select>
                                                    <label class="form-label select-label">Designation</label>
                                                </div>
                                            </div>
                                            <div class="mt-4 pt-2">
                                                <input class="btn btn-primary btn-lg" name="submit" type="submit" value="Submit" />
                                            </div>

                                        </form>
                                    </div>
                                    <div class="my-5">
                                    <table class="table">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>FullName</th>
                                                <th>Gander</th>
                                                <th>Email</th>
                                                <th>Password</th>
                                                <th>Employeenumber</th>
                                                <th>Designation</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $select = mysqli_query($conn,"SELECT * FROM `login`");
                                            while($see=mysqli_fetch_array($select)){
                                            ?>
                                            <tr>
                                                <td> <?php echo $see ['FullName']?></td>
                                                <td> <?php echo $see ['Gender']?></td>
                                                <td> <?php echo $see ['Email']?></td>
                                                <td> <?php echo $see ['Password']?></td>
                                                <td> <?php echo $see ['EmployeeNumber']?></td>
                                                <td> <?php echo $see ['Designation']?></td>
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