<?php
session_start();
error_reporting(0);
// links to database
include('../hrdash/link/desigene/db.php');

if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber']) || $_SESSION['Designation'] != 'CEO') {
    // Log the unauthorized access attempt for auditing purposes
    error_log("Unauthorized access attempt. User: {$_SESSION['loginid']}");
    
    // Redirect to the logout page
    header("Location: ../logout.php");
    exit; // Ensure that the script stops execution after the header redirection
  } else{

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <?php include ('link/links.php')?>
</head>
<body>
    <div id="main">
        <?php include('link/desigene/navbar.php')?>
        <div class="container-fluid py-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card2 text-center bg-light">
                        <div style="background-color: darkblue;" class="card-header ">
                            <div class="card-title text-white">Exitclearance Form</div>
                        </div>
                        <div class="container">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">CNIC</th>
                                    <th scope="col">Employee NO</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Employment Starting Date</th>
                                    <th scope="col">Fill the Form</th>
                                </thead>
                                <tbody>
                                <?php
                                include ('link/desigene/db.php');
                                $empid = $_SESSION['EmployeeNumber'];
                                // Query to get the sum of rate column for the current month
                                $query = mysqli_query($conn,"SELECT * FROM employee_performance AS t
                                INNER JOIN employeedata AS e ON e.EmployeeNo = t.EmployeeID
                                WHERE
                                t.RemarksOfSecondCountersigningOfficer IS NULL
                                AND t.NameOfSecondCountersigningOfficer IS NULL
                                AND t.DesignationOfSecondCountersigningOfficer IS NULL
                                AND t.DateOfSecondCountersigningOfficer IS NULL
                                    ");
                                $num = 1;
                                while($row = mysqli_fetch_array($query)){
                                 // Use $query instead of $result
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $num?></th>
                                        <td><h4><?php echo $row ['fName']?> <?php echo $row ['mName']?> <?php echo $row ['lName']?></h4></td>
                                        <td><?php echo $row ['CNIC']?></td>
                                        <td><?php echo $row ['EmployeeNo']?></td>
                                        <td><?php echo $row ['Employee_Group']?></td>
                                        <td><?php echo $row ['Joining_Date']?></td>
                                        <td><a href="Appraisaladd.php?id=<?php echo $row ['Id']?>"><i class="fa-solid fa-check"></i><i class="fa-solid fa-person-walking-arrow-right"></i></a></td>
                                    </tr>
                                <?php
                                $num++; }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('link/desigene/script.php')?>
</body>
</html>
<?php }?>