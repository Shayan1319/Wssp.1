<?php
session_start();
error_reporting(0);
// links to database
include('../hrdash/link/desigene/db.php');
if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber']) || $_SESSION['Designation'] != 'HR manager') {
  // Log the unauthorized access attempt for auditing purposes
  error_log("Unauthorized access attempt. User: {$_SESSION['loginid']}");
  
  // Redirect to the logout page
  header("Location: ../logout.php");
  exit; // Ensure that the script stops execution after the header redirection
} else{

?><!DOCTYPE html>
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
              <div class="card-title text-white">Appraisal</div>
            </div>
            <div class="container">
            <table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">CNIC</th>
            <th scope="col">Employee NO</th>
            <th scope="col">Employee Group</th>
            <th scope="col">Number of Leaves</th>
            <th scope="col">Number of Travel</th>
            <th scope="col">See Profile</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $select = mysqli_query($conn, "SELECT e.EmployeeNo, e.fName, e.mName, e.lName, e.CNIC, e.EmployeeNo, e.Employee_Group, COUNT(DISTINCT l.Id) AS NumberOfLeaves, SUM(CASE WHEN l.Statusofmanger = 'ACCEPT' AND l.StatusofGm = 'ACCEPT' THEN 1 ELSE 0 END) AS LeavesAccepted, COUNT(DISTINCT t.RequestNo) AS NumberOfTravelRequests FROM employeedata e LEFT JOIN leavereq l ON e.EmployeeNo = l.EmployeeNo AND YEAR(l.DateofApply) = YEAR(CURRENT_DATE()) LEFT JOIN travelrequest t ON e.EmployeeNo = t.EmployeeNo AND YEAR(t.DepartureOn) = YEAR(CURRENT_DATE()) GROUP BY e.EmployeeNo, e.fName; ");
        
        $counter = 1;
        
        while ($row = mysqli_fetch_array($select)) {
        ?>
        <tr>
            <th scope="row"><?php echo $counter; ?></th>
            <td><?php echo $row['fName'];?> <?php echo $row['mName'];?> <?php echo $row['lName'];?></td>
            <td><?php echo $row['CNIC']; ?></td>
            <td><?php echo $row['EmployeeNo']; ?></td>
            <td><?php echo $row['Employee_Group']; ?></td>
            <td><?php echo $row['LeavesAccepted']; ?></td>
            <td><?php echo $row['NumberOfTravelRequests']; ?></td>
            <td><a href="profile.php?id=<?php echo $row['EmployeeNo']; ?>"><i class="fa-solid fa-eye"></i></a></td>
        </tr>
        <?php
        $counter++;
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