<?php
session_start();
error_reporting(0);
// Links to the database
include('link/desigene/db.php');
if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber'])) {
    ?>   <script>
        location.replace('../logout.php')
    </script><?php
  } else{
    if (isset($_POST['submit'])) {
        // Retrieve user input and sanitize it (use mysqli_real_escape_string or prepared statements)
        $empid = $_GET['id'];
        $Q1=$_POST['Q1'];
        $Q2=$_POST['Q2'];
        $Q3=$_POST['Q3'];
        $Q4=$_POST['Q4'];
        $Q5=$_POST['Q5'];
        $Q6=$_POST['Q6'];
        $Q7=$_POST['Q7'];
        $Q8=$_POST['Q8'];
        $Q9=$_POST['Q9'];
        $Q10=$_POST['Q10'];
        $Q11=$_POST['Q11'];
        // Perform the database insertion
        $insertQuery = "UPDATE `employee_performance` SET `Intelligence`='$Q1',`ConfidenceAndWillPower`='$Q2',`AcceptanceOfResponsibility`='$Q3',`ReliabilityUnderPressure`='$Q4',`FinancialResponsibility`='$Q5',`RelationsWithSuperiors`='$Q6',`RelationsWithColleagues`='$Q7',`RelationsWithSubordinates`='$Q8',`BehaviorWithPublic`='$Q9',`AblityToDecideRoutineMatters`='$Q10',`KnowledgeOfRelavantLawsETC`='$Q11' WHERE `Id`=$empid";
        $insertResult = mysqli_query($conn, $insertQuery);

        if ($insertResult) {
            ?>
            <script>
                alert("Data inserted successfully");
            location.replace("index.php")

            </script>
            <?php
        } else {
            ?>
            <script>
                alert("Data not inserted");
            </script>
            <?php
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <?php include('link/links.php')?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    </head>
    <body>
    <div id="">
        <?php include('link/desigene/navbar.php') ?>
        
        <div class="container-fluid py-5">
            <div class="row">
                <form action="" method="post">
                    <?php $empid = $_SESSION['EmployeeNumber'];
                                // Query to get the sum of rate column for the current month
                                $query = mysqli_query($conn,"SELECT * FROM employee_performance AS t
                                INNER JOIN employeedata AS e ON e.EmployeeNo = t.EmployeeID
                                WHERE e.DY_Supervisor = $empid");
                                $num = 1;
                                while($row = mysqli_fetch_array($query)){?>
                    <div class="col-lg-12">
                        <div class="card card2 text-center bg-light">
                            <div style="background-color: darkblue;" class="card-header ">
                                <div class="card-title text-white">Appraisal</div>
                            </div>
                            <div class="container">
                                <!-- Your form fields here with appropriate name attributes -->
                                <div class="row">
                                    <div class="col-md-4 my-2">
                                        <label for="empid">Employee Id</label>
                                        <input type="text" disabled class="form-control" value="<?php echo $row['EmployeeID'] ?>" placeholder="Employee Id"
                                               name="empid" id="empid">
                                    </div>
                                    <!-- Other form fields... -->
                                </div>
                            </div>
                        </div>
                        <div class="card card2 bg-light my-5">
                            <div class="container">
                                <h4>Job description</h4>
                                <?php echo $row['JobDescription'] ?>
                                <br><br>
                                <h5>Brief account of performance on the job during the period supported by statistical data...</h5>
                                <?php echo $row['Q1'] ?>
                            </div>
                        </div>
                        <div class="card card2 bg-light my-5">
                        <div class="table-responsive">
                            <table class="table teble-bordered align-middle">
                            <thead class="text-white" style="background-color: darkblue;" >
                                <tr class="align-bottom">
                                    <th></th>
                                    <th></th>
                                    <th>A</th>
                                    <th>B</th>
                                    <th>C</th>
                                    <th>D</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <b>Confidence and will power</b>
                                        <p>Exceptionally confident and resolute</p>
                                    </td>
                                    <td><input class="form-check-input" type="radio" name="Q1" id="Q1" value="Excellent"></td>
                                    <td><input class="form-check-input" type="radio" name="Q1" id="Q1" value="Good"></td>
                                    <td><input class="form-check-input" type="radio" name="Q1" id="Q1" value="Average"></td>
                                    <td><input class="form-check-input" type="radio" name="Q1" id="Q1" value="Below Average"></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>
                                        <b>Acceptance of responsibility</b>
                                        <p>Always prepared to take on responsibility even in difficult cases.</p>
                                    </td>
                                     <td><input class="form-check-input" type="radio" name="Q2" id="Q2" value="Excellent"></td>
                                    <td><input class="form-check-input" type="radio" name="Q2" id="Q2" value="Good"></td>
                                    <td><input class="form-check-input" type="radio" name="Q2" id="Q2" value="Average"></td>
                                    <td><input class="form-check-input" type="radio" name="Q2" id="Q2" value="Below Average"></td>
                                </tr><tr>
                                    <td>3</td>
                                    <td>
                                        <b>Acceptance of responsibility</b>
                                        <p>Always prepared to take on responsibility even in difficult cases.</p>
                                    </td>
                                     <td><input class="form-check-input" type="radio" name="Q3" id="Q3" value="Excellent"></td>
                                    <td><input class="form-check-input" type="radio" name="Q3" id="Q3" value="Good"></td>
                                    <td><input class="form-check-input" type="radio" name="Q3" id="Q3" value="Average"></td>
                                    <td><input class="form-check-input" type="radio" name="Q3" id="Q3" value="Below Average"></td>
                                </tr><tr>
                                    <td>4</td>
                                    <td>
                                        <b>Reliability under pressure</b>
                                        <p>Exceptionally bright; excellent comprehension</p>
                                    </td>
                                     <td><input class="form-check-input" type="radio" name="Q4" id="Q4" value="Excellent"></td>
                                    <td><input class="form-check-input" type="radio" name="Q4" id="Q4" value="Good"></td>
                                    <td><input class="form-check-input" type="radio" name="Q4" id="Q4" value="Average"></td>
                                    <td><input class="form-check-input" type="radio" name="Q4" id="Q4" value="Below Average"></td>
                                </tr><tr>
                                    <td>5</td>
                                    <td>
                                        <b>Financial responsibility</b>
                                        <p>Exercises due care and discipline</p>
                                    </td>
                                     <td><input class="form-check-input" type="radio" name="Q5" id="Q5" value="Excellent"></td>
                                    <td><input class="form-check-input" type="radio" name="Q5" id="Q5" value="Good"></td>
                                    <td><input class="form-check-input" type="radio" name="Q5" id="Q5" value="Average"></td>
                                    <td><input class="form-check-input" type="radio" name="Q5" id="Q5" value="Below Average"></td>
                                </tr><tr>
                                    <td>6</td>
                                    <td>
                                    <b>Relations with</b>
                                        <p>(i)     Superiors
                                        Cooperative and trusted
                                        </p>
                                    </td>
                                     <td><input class="form-check-input" type="radio" name="Q6" id="Q6" value="Excellent"></td>
                                    <td><input class="form-check-input" type="radio" name="Q6" id="Q6" value="Good"></td>
                                    <td><input class="form-check-input" type="radio" name="Q6" id="Q6" value="Average"></td>
                                    <td><input class="form-check-input" type="radio" name="Q6" id="Q6" value="Below Average"></td>
                                </tr><tr>
                                    <td>7</td>
                                    <td>
                                        
                                        <p>(ii)      Colleagues
                                        Works well in a team
                                        </p>
                                    </td>
                                     <td><input class="form-check-input" type="radio" name="Q7" id="Q7" value="Excellent"></td>
                                    <td><input class="form-check-input" type="radio" name="Q7" id="Q7" value="Good"></td>
                                    <td><input class="form-check-input" type="radio" name="Q7" id="Q7" value="Average"></td>
                                    <td><input class="form-check-input" type="radio" name="Q7" id="Q7" value="Below Average"></td>
                                </tr><tr>
                                    <td>8</td>
                                    <td>
                                        <p>(iii)     Subordinates
                                        Courteous and effective.
                                        Encouraging
                                        </p>
                                        </td>
                                     <td><input class="form-check-input" type="radio" name="Q8" id="Q8" value="Excellent"></td>
                                    <td><input class="form-check-input" type="radio" name="Q8" id="Q8" value="Good"></td>
                                    <td><input class="form-check-input" type="radio" name="Q8" id="Q8" value="Average"></td>
                                    <td><input class="form-check-input" type="radio" name="Q8" id="Q8" value="Below Average"></td>
                                </tr><tr>
                                    <td>9</td>
                                    <td>
                                        <b>Behavior with public</b>
                                        <p>Courteous and helpful</p>
                                    </td>
                                     <td><input class="form-check-input" type="radio" name="Q9" id="Q9" value="Excellent"></td>
                                    <td><input class="form-check-input" type="radio" name="Q9" id="Q9" value="Good"></td>
                                    <td><input class="form-check-input" type="radio" name="Q9" id="Q9" value="Average"></td>
                                    <td><input class="form-check-input" type="radio" name="Q9" id="Q9" value="Below Average"></td>
                                </tr><tr>
                                    <td>10</td>
                                    <td>
                                        <b>Ability to decide routine matters</b>
                                        <p>Logical and decisive</p>
                                    </td>
                                     <td><input class="form-check-input" type="radio" name="Q10" id="Q10" value="Excellent"></td>
                                    <td><input class="form-check-input" type="radio" name="Q10" id="Q10" value="Good"></td>
                                    <td><input class="form-check-input" type="radio" name="Q10" id="Q10" value="Average"></td>
                                    <td><input class="form-check-input" type="radio" name="Q10" id="Q10" value="Below Average"></td>
                                </tr><tr>
                                    <td>11</td>
                                    <td>
                                        <b>Knowledge of relevant laws, rules, regulations, instructions, and procedures.</b>
                                        <p>Exceptionally well informed,
                                        keeps abreast of latest developments.
                                        </p>
                                    </td>
                                     <td><input class="form-check-input" type="radio" name="Q11" id="Q11" value="Excellent"></td>
                                    <td><input class="form-check-input" type="radio" name="Q11" id="Q11" value="Good"></td>
                                    <td><input class="form-check-input" type="radio" name="Q11" id="Q11" value="Average"></td>
                                    <td><input class="form-check-input" type="radio" name="Q11" id="Q11" value="Below Average"></td>
                                </tr>
                                
                            </tbody>
                            </table>
                        </div>
                        </div>
                        <div class="col-md-12 text-end mt-2">
                            <input style="background-color: darkblue;" type="submit"
                                   class="btn text-white float-right shadow" value="Submit" name="submit">
                        </div>
                    </div>
                    <?php }?>
                </form>
            </div>
        </div>
    </div>

    <!-- Include your JavaScript libraries -->
    </body>
    </html>

    <?php
}
?>
