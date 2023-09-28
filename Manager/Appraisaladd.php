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
        $Q12=$_POST['Q12'];
        $Integrity=$_POST['Integrity'];
        $Q13=$_POST['Q13'];
        $Special_aptitude=$_POST['Special_aptitude'];
        $Recommendedforfuturetraining=$_POST['Recommendedforfuturetraining'];
        $Q14=$_POST['Q14'];
        $Q15=$_POST['Q15'];
        $Q16=$_POST['Q16'];
        $Q17=$_POST['Q17'];
        $name=$_POST['name'];
        $Designation=$_POST['Designation'];
        $data=date("Y-M-D");
        // Perform the database insertion
        $insertQuery = "UPDATE `employee_performance` SET `Intelligence`='$Q1',`ConfidenceAndWillPower`='$Q2',`AcceptanceOfResponsibility`='$Q3',`ReliabilityUnderPressure`='$Q4',`FinancialResponsibility`='$Q5',`RelationsWithSuperiors`='$Q6',`RelationsWithColleagues`='$Q7',`RelationsWithSubordinates`='$Q8',`BehaviorWithPublic`='$Q9',`AblityToDecideRoutineMatters`='$Q10',`KnowledgeOfRelavantLawsETC`='$Q11',`Q2`='$Q12',`Integrity`='$Integrity',`Q3`='$Q13',`SpecialAptitude`='$Special_aptitude',`RecommendedForFutureTraining`='$Recommendedforfuturetraining',`OverallGradingByReportingOfficer`='$Q14',`OverallGradingByCountersigningOfficer`='$Q15',`FitnessForPromotionByReportingOfficer`='$Q16',`FitnessForPromotionByCountersigningOfficer`='$Q17',`NameOfReportingOfficer`='$name',`DesignationOfReportingOfficer`='$Designation', `DateOfReportingOfficer`='$data' WHERE `Id`=$empid";
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
                    <?php
                                $empid = $_GET['id'];
                                // Query to get the sum of rate column for the current month
                                $query = mysqli_query($conn,"SELECT * FROM employee_performance WHERE Id = $empid");
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
                                    <b>Intelligence</b>
                                    <p>Exceptionally bright; Excellent comprehension</p>
                                    </td>
                                    <td><input class="form-check-input" type="radio" name="Q1" id="Q1" value="Excellent"<?php echo ($row['Intelligence'] == 'Excellent') ? 'checked' : ''; ?>></td>
                                    <td><input class="form-check-input" type="radio" name="Q1" id="Q1" value="Good"<?php echo ($row['Intelligence'] == 'Good') ? 'checked' : ''; ?>></td>
                                    <td><input class="form-check-input" type="radio" name="Q1" id="Q1" value="Average" <?php echo ($row['Intelligence'] == 'Average') ? 'checked' : ''; ?>></td>
                                    <td><input class="form-check-input" type="radio" name="Q1" id="Q1" value="Below Average" <?php echo ($row['Intelligence'] == 'Below Average') ? 'checked' : ''; ?>></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>
                                    <b>Confidence and will power</b>
                                        <p>Exceptionally confident and resolute</p>
                                    </td>
                                     <td><input class="form-check-input" type="radio" name="Q2" id="Q2" value="Excellent" <?php echo ($row['ConfidenceAndWillPower'] == 'Excellent') ? 'checked' : ''; ?>></td>
                                    <td><input class="form-check-input" type="radio" name="Q2" id="Q2" value="Good" <?php echo ($row['ConfidenceAndWillPower'] == 'Good') ? 'checked' : ''; ?>></td>
                                    <td><input class="form-check-input" type="radio" name="Q2" id="Q2" value="Average" <?php echo ($row['ConfidenceAndWillPower'] == 'Average') ? 'checked' : ''; ?>></td>
                                    <td><input class="form-check-input" type="radio" name="Q2" id="Q2" value="Below Average"<?php echo ($row['ConfidenceAndWillPower'] == 'Below Average') ? 'checked' : ''; ?>></td>
                                </tr><tr>
                                    <td>3</td>
                                    <td>
                                        <b>Acceptance of responsibility</b>
                                        <p>Always prepared to take on responsibility even in difficult cases.</p>
                                    </td>
                                     <td><input class="form-check-input" type="radio" name="Q3" id="Q3" value="Excellent"<?php echo ($row['AcceptanceOfResponsibility'] == 'Excellent') ? 'checked' : ''; ?>></td>
                                    <td><input class="form-check-input" type="radio" name="Q3" id="Q3" value="Good"<?php echo ($row['AcceptanceOfResponsibility'] == 'Good') ? 'checked' : ''; ?>></td>
                                    <td><input class="form-check-input" type="radio" name="Q3" id="Q3" value="Average" <?php echo ($row['AcceptanceOfResponsibility'] == 'Average') ? 'checked' : ''; ?>></td>
                                    <td><input class="form-check-input" type="radio" name="Q3" id="Q3" value="Below Average"<?php echo ($row['AcceptanceOfResponsibility'] == 'Below Average') ? 'checked' : ''; ?>></td>
                                </tr><tr>
                                    <td>4</td>
                                    <td>
                                        <b>Reliability under pressure</b>
                                        <p>Exceptionally bright; Excellent comprehension</p>
                                    </td>
                                     <td><input class="form-check-input" type="radio" name="Q4" id="Q4" value="Excellent"<?php echo ($row['ReliabilityUnderPressure'] == 'Excellent') ? 'checked' : ''; ?>></td>
                                    <td><input class="form-check-input" type="radio" name="Q4" id="Q4" value="Good"<?php echo ($row['ReliabilityUnderPressure'] == 'Good') ? 'checked' : ''; ?>></td>
                                    <td><input class="form-check-input" type="radio" name="Q4" id="Q4" value="Average" <?php echo ($row['ReliabilityUnderPressure'] == 'Average') ? 'checked' : ''; ?>></td>
                                    <td><input class="form-check-input" type="radio" name="Q4" id="Q4" value="Below Average"<?php echo ($row['ReliabilityUnderPressure'] == 'Below Average') ? 'checked' : ''; ?>></td>
                                </tr><tr>
                                    <td>5</td>
                                    <td>
                                        <b>Financial responsibility</b>
                                        <p>Exercises due care and discipline</p>
                                    </td>
                                     <td><input class="form-check-input" type="radio" name="Q5" id="Q5" value="Excellent"<?php echo ($row['FinancialResponsibility'] == 'Excellent') ? 'checked' : ''; ?>></td>
                                    <td><input class="form-check-input" type="radio" name="Q5" id="Q5" value="Good"<?php echo ($row['FinancialResponsibility'] == 'Good') ? 'checked' : ''; ?>></td>
                                    <td><input class="form-check-input" type="radio" name="Q5" id="Q5" value="Average" <?php echo ($row['FinancialResponsibility'] == 'Average') ? 'checked' : ''; ?>></td>
                                    <td><input class="form-check-input" type="radio" name="Q5" id="Q5" value="Below Average"<?php echo ($row['FinancialResponsibility'] == 'Below Average') ? 'checked' : ''; ?>></td>
                                </tr><tr>
                                    <td>6</td>
                                    <td>
                                    <b>Relations with</b>
                                        <p>(i)     Superiors
                                        Cooperative and trusted
                                        </p>
                                    </td>
                                     <td><input class="form-check-input" type="radio" name="Q6" id="Q6" value="Excellent"<?php echo ($row['RelationsWithSuperiors'] == 'Excellent') ? 'checked' : ''; ?>></td>
                                    <td><input class="form-check-input" type="radio" name="Q6" id="Q6" value="Good"<?php echo ($row['RelationsWithSuperiors'] == 'Good') ? 'checked' : ''; ?>></td>
                                    <td><input class="form-check-input" type="radio" name="Q6" id="Q6" value="Average" <?php echo ($row['RelationsWithSuperiors'] == 'Average') ? 'checked' : ''; ?>></td>
                                    <td><input class="form-check-input" type="radio" name="Q6" id="Q6" value="Below Average"<?php echo ($row['RelationsWithSuperiors'] == 'Below Average') ? 'checked' : ''; ?>></td>
                                </tr><tr>
                                    <td>7</td>
                                    <td>
                                        
                                        <p>(ii)      Colleagues
                                        Works well in a team
                                        </p>
                                    </td>
                                     <td><input class="form-check-input" type="radio" name="Q7" id="Q7" value="Excellent"<?php echo ($row['RelationsWithColleagues'] == 'Excellent') ? 'checked' : ''; ?>></td>
                                    <td><input class="form-check-input" type="radio" name="Q7" id="Q7" value="Good"<?php echo ($row['RelationsWithColleagues'] == 'Good') ? 'checked' : ''; ?>></td>
                                    <td><input class="form-check-input" type="radio" name="Q7" id="Q7" value="Average" <?php echo ($row['RelationsWithColleagues'] == 'Average') ? 'checked' : ''; ?>></td>
                                    <td><input class="form-check-input" type="radio" name="Q7" id="Q7" value="Below Average"<?php echo ($row['RelationsWithColleagues'] == 'Below Average') ? 'checked' : ''; ?>></td>
                                </tr><tr>
                                    <td>8</td>
                                    <td>
                                        <p>(iii)     Subordinates
                                        Courteous and effective.
                                        Encouraging
                                        </p>
                                        </td>
                                     <td><input class="form-check-input" type="radio" name="Q8" id="Q8" value="Excellent"<?php echo ($row['RelationsWithSubordinates'] == 'Excellent') ? 'checked' : ''; ?>></td>
                                    <td><input class="form-check-input" type="radio" name="Q8" id="Q8" value="Good"<?php echo ($row['RelationsWithSubordinates'] == 'Good') ? 'checked' : ''; ?>></td>
                                    <td><input class="form-check-input" type="radio" name="Q8" id="Q8" value="Average" <?php echo ($row['RelationsWithSubordinates'] == 'Average') ? 'checked' : ''; ?>></td>
                                    <td><input class="form-check-input" type="radio" name="Q8" id="Q8" value="Below Average"<?php echo ($row['RelationsWithSubordinates'] == 'Below Average') ? 'checked' : ''; ?>></td>
                                </tr><tr>
                                    <td>9</td>
                                    <td>
                                        <b>Behavior with public</b>
                                        <p>Courteous and helpful</p>
                                    </td>
                                     <td><input class="form-check-input" type="radio" name="Q9" id="Q9" value="Excellent"<?php echo ($row['BehaviorWithPublic'] == 'Excellent') ? 'checked' : ''; ?>></td>
                                    <td><input class="form-check-input" type="radio" name="Q9" id="Q9" value="Good"<?php echo ($row['BehaviorWithPublic'] == 'Good') ? 'checked' : ''; ?>></td>
                                    <td><input class="form-check-input" type="radio" name="Q9" id="Q9" value="Average" <?php echo ($row['BehaviorWithPublic'] == 'Average') ? 'checked' : ''; ?>></td>
                                    <td><input class="form-check-input" type="radio" name="Q9" id="Q9" value="Below Average"<?php echo ($row['BehaviorWithPublic'] == 'Below Average') ? 'checked' : ''; ?>></td>
                                </tr><tr>
                                    <td>10</td>
                                    <td>
                                        <b>Ability to decide routine matters</b>
                                        <p>Logical and decisive</p>
                                    </td>
                                     <td><input class="form-check-input" type="radio" name="Q10" id="Q10" value="Excellent"<?php echo ($row['AblityToDecideRoutineMatters'] == 'Excellent') ? 'checked' : ''; ?>></td>
                                    <td><input class="form-check-input" type="radio" name="Q10" id="Q10" value="Good"<?php echo ($row['AblityToDecideRoutineMatters'] == 'Good') ? 'checked' : ''; ?>></td>
                                    <td><input class="form-check-input" type="radio" name="Q10" id="Q10" value="Average" <?php echo ($row['AblityToDecideRoutineMatters'] == 'Average') ? 'checked' : ''; ?>></td>
                                    <td><input class="form-check-input" type="radio" name="Q10" id="Q10" value="Below Average"<?php echo ($row['AblityToDecideRoutineMatters'] == 'Below Average') ? 'checked' : ''; ?>></td>
                                </tr><tr>
                                    <td>11</td>
                                    <td>
                                        <b>Knowledge of relevant laws, rules, regulations, instructions, and procedures.</b>
                                        <p>Exceptionally well informed,
                                        keeps abreast of latest developments.
                                        </p>
                                    </td>
                                     <td><input class="form-check-input" type="radio" name="Q11" id="Q11" value="Excellent"<?php echo ($row['KnowledgeOfRelavantLawsETC'] == 'Excellent') ? 'checked' : ''; ?>></td>
                                    <td><input class="form-check-input" type="radio" name="Q11" id="Q11" value="Good"<?php echo ($row['KnowledgeOfRelavantLawsETC'] == 'Good') ? 'checked' : ''; ?>></td>
                                    <td><input class="form-check-input" type="radio" name="Q11" id="Q11" value="Average" <?php echo ($row['KnowledgeOfRelavantLawsETC'] == 'Average') ? 'checked' : ''; ?>></td>
                                    <td><input class="form-check-input" type="radio" name="Q11" id="Q11" value="Below Average"<?php echo ($row['KnowledgeOfRelavantLawsETC'] == 'Below Average') ? 'checked' : ''; ?>></td>
                                </tr>
                                
                            </tbody>
                            </table>
                        </div>
                        </div>
                        <div class="card bg-light my-5 p-5">
                            <div class="my-5">
                            <p class="fw-bold">
                            Please comment on the officer's performance on the job as given in Part II(2) 
with special reference to knowledge of work, quality, and quantity of output. 
             How far was the officer able to achieve targets? Do you agree with what has
	 been stated in Part II (2)?</p>
                            <textarea name="Q12" id="Q12"><?php echo $row['Q2']?></textarea>
                                <script>
                                    CKEDITOR.replace('Q12');
                                </script>
                            </div>
                            <div class="my-5">
                            <p class="fw-bold">Integrity (Morality, uprightness, and honesty)</p>
                            <textarea name="Integrity" id="Integrity"><?php echo $row['Integrity'] ?></textarea>
                                <script>
                                    CKEDITOR.replace('Integrity');
                                </script>
                            </div>
                            <div class="my-5">
                            <p class="fw-bold">
                            Pen picture with focus on the officer's strengths and weaknesses not 
                            covered in Part III(Weakness will not be considered as adverse entries unless 
                            intended to be treated as adverse).
                            </p>
                            <textarea name="Q13" id="Q13"><?php echo $row['Q3'] ?></textarea>
                                <script>
                                    CKEDITOR.replace('Q13');
                                </script>
                            </div>
                            <div class="my-5">
                            <p class="fw-bold">Special aptitude</p>
                            <textarea name="Special_aptitude" id="Special_aptitude"><?php echo $row['SpecialAptitude'] ?></textarea>
                                <script>
                                    CKEDITOR.replace('Special_aptitude');
                                </script>
                            </div>
                            <div class="my-5">
                            <p class="fw-bold">Recommended for future training </p>
                            <textarea name="Recommendedforfuturetraining" id="Recommendedforfuturetraining"><?php echo $row['RecommendedForFutureTraining'] ?></textarea>
                                <script>
                                    CKEDITOR.replace('Recommendedforfuturetraining');
                                </script>
                            </div>
                            </div>
                        </div>
                        <div class="my-5">
                            <p class="fw-bold">Overall grading </p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="text-white" style="background-color:darkblue;" >
                                        <tr>
                                            <th>Sno</th>
                                            <th>Grade</th>
                                            <th>Reporting officer</th>
                                            <th>Countersigning officer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <td>1</td>
                                        <td>Excellent</td>
                                        <td><input class="form-check-input" type="radio" name="Q14" id="Q14" value="Excellent"<?php echo ($row['OverallGradingByReportingOfficer'] == 'Excellent') ? 'checked' : ''; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="Q15" id="Q15" value="Excellent"<?php echo ($row['OverallGradingByCountersigningOfficer'] == 'Excellent') ? 'checked' : ''; ?>></td>
                                        </tr>
                                        <tr>
                                        <td>2</td>
                                        <td>Very Good</td>
                                        <td><input class="form-check-input" type="radio" name="Q14" id="Q14" value="Very Good"<?php echo ($row['OverallGradingByReportingOfficer'] == 'Very Good') ? 'checked' : ''; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="Q15" id="Q15" value="Very Good"<?php echo ($row['OverallGradingByCountersigningOfficer'] == 'Very Good') ? 'checked' : ''; ?>></td>
                                        </tr>
                                        <tr>
                                        <td>3</td>
                                        <td>Good</td>
                                        <td><input class="form-check-input" type="radio" name="Q14" id="Q14" value="Good"<?php echo ($row['OverallGradingByReportingOfficer'] == 'Good') ? 'checked' : ''; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="Q15" id="Q15" value="Good"<?php echo ($row['OverallGradingByCountersigningOfficer'] == 'Good') ? 'checked' : ''; ?>></td>
                                        </tr>
                                        <tr>
                                        <td>4</td>
                                        <td>Average</td>
                                        <td><input class="form-check-input" type="radio" name="Q14" id="Q14" value="Average"<?php echo ($row['OverallGradingByReportingOfficer'] == 'Average') ? 'checked' : ''; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="Q15" id="Q15" value="Average"<?php echo ($row['OverallGradingByCountersigningOfficer'] == 'Average') ? 'checked' : ''; ?>></td>
                                        </tr>
                                        <tr>
                                        <td>5</td>
                                        <td>Below Average</td>
                                        <td><input class="form-check-input" type="radio" name="Q14" id="Q14" value="Below Average"<?php echo ($row['OverallGradingByReportingOfficer'] == 'Below Average') ? 'checked' : ''; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="Q15" id="Q15" value="Below Average"<?php echo ($row['OverallGradingByCountersigningOfficer'] == 'Below Average') ? 'checked' : ''; ?>></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="my-5">
                            <p class="fw-bold">Fitness for promotion </p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="text-white" style="background-color:darkblue;" >
                                        <tr>
                                            <th>Sno</th>
                                            <th>Grade</th>
                                            <th>Reporting officer</th>
                                            <th>Countersigning officer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <td>1</td>
                                        <td>Fit for promotion</td>
                                        <td><input class="form-check-input" type="radio" name="Q16" id="Q16" value="Fit for promotion"<?php echo ($row['FitnessForPromotionByReportingOfficer'] == 'Fit for promotion') ? 'checked' : ''; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="Q17" id="Q17" value="Fit for promotion"<?php echo ($row['FitnessForPromotionByCountersigningOfficer'] == 'Fit for promotion') ? 'checked' : ''; ?>></td>
                                        </tr>
                                        <tr>
                                        <td>2</td>
                                        <td>Recently promoted/appointed.Assessment premature</td>
                                        <td><input class="form-check-input" type="radio" name="Q16" id="Q16" value="Recently promoted/appointed.Assessment premature"<?php echo ($row['FitnessForPromotionByReportingOfficer'] == 'Recently promoted/appointed.Assessment premature') ? 'checked' : ''; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="Q17" id="Q17" value="Recently promoted/appointed.Assessment premature"<?php echo ($row['FitnessForPromotionByCountersigningOfficer'] == 'Recently promoted/appointed.Assessment premature') ? 'checked' : ''; ?>></td>
                                        </tr>
                                        <tr>
                                        <td>3</td>
                                        <td>Not yet fit for promotion</td>
                                        <td><input class="form-check-input" type="radio" name="Q16" id="Q16" value="Not yet fit for promotion"<?php echo ($row['FitnessForPromotionByReportingOfficer'] == 'Not yet fit for promotion') ? 'checked' : ''; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="Q17" id="Q17" value="Not yet fit for promotion"<?php echo ($row['FitnessForPromotionByCountersigningOfficer'] == 'Not yet fit for promotion') ? 'checked' : ''; ?>></td>
                                        </tr>
                                        <tr>
                                        <td>4</td>
                                        <td>Unlikely to progress further</td>
                                        <td><input class="form-check-input" type="radio" name="Q16" id="Q16" value="Unlikely to progress further"<?php echo ($row['FitnessForPromotionByReportingOfficer'] == 'Unlikely to progress further') ? 'checked' : ''; ?>></td>
                                        <td><input class="form-check-input" type="radio" name="Q17" id="Q17" value="Unlikely to progress further"<?php echo ($row['FitnessForPromotionByCountersigningOfficer'] == 'Unlikely to progress further') ? 'checked' : ''; ?>></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            
                        <div class="my-5 col-6 p-5">
                            <label for="">Name of the reporting officer.</label>
                            <input type="text" value="<?php echo $_SESSION['name']?>" name="name" id="" class="form-control">
                        </div>
                        <div class="my-5 col-6 p-5">
                            <label for="">Designation</label>
                            <input type="text" value="<?php echo $_SESSION['Designation']?>" name="Designation" id="" class="form-control">
                        </div>
                        </div>
                    </div>
                        </div>

                        <div class="col-md-12 text-end my-2 ">
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
