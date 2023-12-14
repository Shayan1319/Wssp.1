<?php
include('link/desigene/db.php');
session_start();
error_reporting(0);
if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber']) || $_SESSION['Designation'] != 'Admin') {
    // Log the unauthorized access attempt for auditing purposes
    error_log("Unauthorized access attempt. User: {$_SESSION['loginid']}");
    
    // Redirect to the logout page
    header("Location: ../logout.php");
    exit; // Ensure that the script stops execution after the header redirection
} else
  {
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
                                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                                        <form method="post">
                                            <div class="row">
                                                <div class="col-md-6 mb-4">
                                                    <div class="form-outline">
                                                        <label class="form-label" id="empname" for="firstName">Full Name</label>
                                                        <input type="text" id="firstName" name="FullName" class="form-control form-control-lg" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-outline">
                                                    
                                                        <label class="form-label" >Gender</label>
                                                    <select id="Gender" name="Gender" class="form-control select2" tabindex="-1" aria-hidden="true">
                                                        <option value="">Choose</option>
                                                        <option value="Mail">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-4 pb-2">
                                                    <div class="form-outline">
                                                        <label class="form-label" for="emailAddress">Email</label>
                                                        <input type="email" name="Email" id="emailAddress" class="form-control form-control-lg" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-4 pb-2">
                                                    <div class="form-outline">
                                                        <label class="form-label" for="emailAddress">Password</label>
                                                        <input type="password" id="password" name="Password" class="form-control form-control-lg" value="Wssc@123" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-4 pb-2">
                                                    <div class="form-outline">
                                                        <label class="form-label" for="Employeenumber">Employee Number</label>
                                                    <select name="Employeenumber" id="employee_no" class="form-control select2">
                                                    </select>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label select-label">Designation</label>
                                                    <select class="select form-control" name="Designation" required>
                                                        <option  disabled>Designation.</option>
                                                        <option value="HR manager">Humans Resource Manager.</option>
                                                        <option value="Payroll manager">Payroll Manager.</option>
                                                        <option value="Manager">Manager</option>
                                                        <option value="DYManager">DYManager</option>
                                                        <option value="CEO">CEO</option>
                                                        <option value="GM">GM</option>
                                                        <option value="AppAdmin">App Admin</option>
                                                        <option value="FinanceAdmin">Finance Admin</option>
                                                        <option value="Employee">Employee</option>
                                                        <option value="Internal Auditor">Internal Auditor</option>
                                                    </select>
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
                                                <th>Delete</th>
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
                                                <td> <a href="ajex/deletsiginup.php?did=<?php echo $see['Id']?>" class="btn btn-dark" ><i class="fa-solid fa-trash"></i></a></td>
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
    <script>
     $(document).ready(function() {
  $(".select2").select2();

  function loadTable() {
    $.ajax({
      url: "ajex/empid.php",
      type: "POST",
      success: function(data) {
        $("#employee_no").html(data);
      },
      error: function(xhr, textStatus, errorThrown) {
        console.error("AJAX error:", errorThrown);
      }
    });
  }
  loadTable();

});

    </script>
    </body>
</html>
<?php }?>