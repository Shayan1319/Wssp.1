<?php
session_start();
error_reporting(0);
// links to database
include('link/desigene/db.php');
if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber']) || $_SESSION['Designation'] != 'HR manager') {
  // Log the unauthorized access attempt for auditing purposes
  error_log("Unauthorized access attempt. User: {$_SESSION['loginid']}");
  
  // Redirect to the logout page
  header("Location: ../logout.php");
  exit; // Ensure that the script stops execution after the header redirection
} else
  {
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
    <div class="container-fluid py-5">
      <div class="row">
        <div class="col-lg-12">
          <div class="card card2 text-center bg-light">
            <div style="background-color: darkblue;" class="card-header ">
              <div class="card-title text-white">Employee Family Information</div>
            </div>
            <div class="container">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">CNIC</th>
                        <th scope="col">Employee NO</th>
                        <th scope="col">Employee Manager</th>
                        <th scope="col">Status</th>
                        <th scope="col">See</th>
                        <th scope="col">Update</th>
                    </thead>
                    <tbody>
                    <?php 
                    include ('../link/desigene/db.php');
                    $select = mysqli_query($conn,"SELECT * FROM `employeedata`");
                    while($see=mysqli_fetch_array($select)){
                    if($see['Status']=='NEW'){
                      $NEW='<i class="fa-solid fa-font-awesome"></i>';
                    }
                    ?>
                    
                        <tr>
                        <th scope="row"><?php echo $see ['Id'] ?></th>
                        <td><?php echo $see ['fName'];?> <?php echo $see ['mName'];?> <?php echo $see ['lName']?></td>
                        <td><?php echo $see ['CNIC']?></td>
                        <td><?php echo $see ['EmployeeNo'] ?><?php echo $see ['EmployeeNowssp'] ?></td>
                        <td><?php echo $see ['Employee_Manager'] ?><?php echo $see ['Employee_Manager_tma'] ?></td>
                        <td><?php echo $see ['Status'] ." ".$NEW ?></td>
                        <td><a href="profile.php?updat=<?php echo $see['CNIC']?>" ><i class="fa-solid fa-eye"></i></a></td>
                        <td><a href="updateemp.php?id=<?php echo $see['Id']?>"><i class="fa-solid fa-file-pen"></i></a></td>
                        </tr>
                        <?php
                        $aid=$aid+1;
                    }
                    ?>   
                              
                    
                    </tbody>
                </table>
            </div>
        </div>
        </div>
      </div>
    </div>
  </div>

 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

<?php include('link/desigene/script.php')?>
</body>
</html>
<?php }?>