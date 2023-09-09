<?php
session_start();
error_reporting(0);
// links to database
include('link/desigene/db.php');
if (strlen($_SESSION['loginid']==0)) {
?>   <script>
location.replace('../logout.php')
</script><?php
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
                        <th scope="col">See</th>
                        <th scope="col">Delete</th>
                    </thead>
                    <tbody>
                    <?php 
                    include ('../link/desigene/db.php');
                    $select = mysqli_query($conn,"SELECT * FROM `employeedata`");
                    while($see=mysqli_fetch_array($select)){
                    ?>
                        <tr>
                        <th scope="row"><?php echo $see ['Id'] ?></th>
                        <td><?php echo $see ['fName'];?> <?php echo $see ['mName'];?> <?php echo $see ['lName']?></td>
                        <td><?php echo $see ['CNIC'] ?></td>
                        <td><?php echo $see ['EmployeeNo_tma'] ?><?php echo $see ['EmployeeNowssp'] ?></td>
                        <td><?php echo $see ['Employee_Manager'] ?><?php echo $see ['Employee_Manager_tma'] ?></td>
                        <td><a href="profile.php?updat=<?php echo $see['CNIC']?>" ><i class="fa-solid fa-eye"></i></a></td>
                        <td><a href="EmployementData.php?id=<?php echo $see['CNIC']?>&delf=delete" onClick="return confirm('Are you sure you want to delete?')" ><i class="fa-solid fa-trash"></i></a></td>
                        </tr>
                        <?php
                        $aid=$aid+1;
                    }if ($_GET['delf']) {
                        $did = $_GET['id'];
                        
                        // It's not clear how the `$see` variable is defined. Make sure it contains the correct data.
                        // The following line executes a DELETE query on the `employeedata` table to delete a record with the given ID.
                        // However, we should use prepared statements to prevent SQL injection attacks.
                        if (mysqli_query($conn, "DELETE FROM employeedata WHERE CNIC ='$did'")) {
                            echo "<script>alert('Data Deleted');</script>";
                            // The following line attempts to drop multiple tables named `$cnic A`, `$cnic B`, etc.
                            // The table name format seems unconventional. Ensure that it's intentional and relevant to your database design.
                            // As mentioned before, concatenating user input directly into the SQL query is dangerous and can lead to SQL injection.
                            // Instead of using this approach, consider a different database design and handle table creation and deletion more securely.
                            $sqlA="DROP TABLE `$did a`, `$did b`, `$did c`, `$did d`, `$did e`";
                            $tableA = $conn->query($sqlA);
                            if ($tableA) {
                                echo "<script>alert('Table Deleted');</script>";
                                echo "<script>location.replace('EmployementData.php')</script>";
                            }
                        }
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