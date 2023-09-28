<?php
session_start();
error_reporting(0);
// links to database
include('../hrdash/link/desigene/db.php');

if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber'])) {
    ?>   <script>
        location.replace('../logout.php')
    </script><?php
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
                                    (
                                        t.Intelligence IS NULL
                                        AND t.ConfidenceAndWillPower IS NULL
                                        AND t.AcceptanceOfResponsibility IS NULL
                                        AND t.ReliabilityUnderPressure IS NULL
                                        AND t.FinancialResponsibility IS NULL
                                        AND t.RelationsWithSuperiors IS NULL
                                        AND t.RelationsWithColleagues IS NULL
                                        AND t.RelationsWithSubordinates IS NULL
                                        AND t.BehaviorWithPublic IS NULL
                                        AND t.AblityToDecideRoutineMatters IS NULL
                                        AND t.KnowledgeOfRelavantLawsETC IS NULL
                                    )
                                    OR
                                    (
                                        t.Q2 IS NULL
                                        AND t.Integrity IS NULL
                                        AND t.Q3 IS NULL
                                        AND t.SpecialAptitude IS NULL
                                        AND t.RecommendedForFutureTraining IS NULL
                                        AND t.OverallGradingByReportingOfficer IS NULL
                                        AND t.OverallGradingByCountersigningOfficer IS NULL
                                        AND t.FitnessForPromotionByReportingOfficer IS NULL
                                        AND t.FitnessForPromotionByCountersigningOfficer IS NULL
                                        AND t.NameOfReportingOfficer IS NULL
                                        AND t.DesignationOfReportingOfficer IS NULL
                                        AND t.DateOfReportingOfficer IS NULL
                                    )
                                    AND e.Employee_Manager = $empid");
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