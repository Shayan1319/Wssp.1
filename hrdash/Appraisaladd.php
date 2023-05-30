<?php
session_start();
error_reporting(0);
// links to database
include '../link/desigene/db.php';
if ($_SESSION['loginid'] == 0) {
?>   
    <script>
        location.replace('../logout.php')
    </script>
<?php
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
    <div class="container-fluid py-5">
      <div class="row">
        <div class="col-lg-12">
          <div class="card card2 text-center bg-light">
            <div style="background-color: darkblue;" class="card-header ">
              <div class="card-title text-white">Appraisal</div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 my-2">
                        <label for="">Name (in block letters) </label>
                        <input type="text" class="form-control" placeholder="Name (in block letters)" name="" id="">
                    </div>
                    <div class="col-md-4 my-2">
                        <label for="">Personnel number  </label>
                        <input type="text" class="form-control" placeholder="Personnel number " name="" id="">
                    </div>
                    <div class="col-md-4 my-2">
                        <label for="">Date of birth </label>
                        <input type="text" class="form-control" placeholder="Date of birth" name="" id="">
                    </div>
                    <div class="col-md-4 my-2">
                        <label for="">Date of entry in service </label>
                        <input type="text" class="form-control" placeholder="Date of entry in service" name="" id="">
                    </div>
                    <div class="col-md-4 my-2">
                        <label for="">Post held during the period (with BPS) </label>
                        <input type="text" class="form-control" placeholder="Post held during the period (with BPS)" name="" id="">
                    </div>
                    <div class="col-md-4 my-2">
                        <label for="">Academic qualifications </label>
                        <input type="text" class="form-control" placeholder="Academic qualifications" name="" id="">
                    </div>
                    <div class="col-md-12 my-2">
                        <label for="">Knowledge of languages  </label>
                           <div class="row">
                           <div class="form-check col-md-4">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                English (SRW)
                                </label>
                            </div>
                            <div class="form-check col-md-4">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                URDU (SRW)
                                </label>
                            </div>
                            <div class="form-check col-md-4">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                Pashto (SRW)
                                </label>
                            </div>
                           </div>
                    </div>
                    <div class="col-md-12 my-2">
                        <label for="">Training received during the evaluation period</label>
                        <table class="table">
                        <thead class="text-light" style="background-color:darkblue;">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name of course attended.</th>
                            <th scope="col">Duration with dates</th>
                            <th scope="col">Name of institution and country</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">1</th>
                            <td><textarea rows="4" cols="18"></textarea></td>
                            <td><textarea rows="4" cols="18"></textarea></td>
                            <td><textarea rows="4" cols="18"></textarea></td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                    <div class="col-md-4 my-2">
                        <label for="">In present post </label>
                        <input type="text" class="form-control" placeholder="In present post" name="" id="">
                    </div>
                    <div class="col-md-4 my-2">
                        <label for="">Under the reporting officer </label>
                        <input type="text" class="form-control" placeholder="Under the reporting officer " name="" id="">
                    </div>
                </div>
            </div>
        </div>
        <div class="card card2 bg-light my-5">
            <div class="container">
                <h4>Job description</h4>
                <ul>
                    <li>Responsible to contribute to an employee friendly working atmosphere within the company in respect of HR functions particularly payroll.</li>
                    <li>Checking staff working hours</li>
                    <li>Calculate monthly salary of staff and Prepare payroll </li>
                    <li>Ensure making the monthly salaries/payments on time</li>
                    <li>Working out tax, statutory and insurance deductions</li>
                    <li>Setting up new members of staff</li>
                    <li>Calculating overtime</li>
                    <li>Issuing tax forms </li>
                    <li>Managing special situations like maternity or sickness pay</li>
                    <li>Any other legal responsibility assigned by Chief Executive Officer</li>
                </ul>
                <br>
                <br>
                <h5>Brief account of performance on the job during the period supported by statistical data Where possible. Targets given and actual performance against such targets should be Highlighted. Reasons for shortfall, if any, may also be stated.</h5>
                <li>Ensuring in time payroll is run giving other Departments enough time to review it.</li>
                <li>Calculating employee benefits and deductions, checking staff working hours.</li>
                <li>Preparing payroll reports.</li>
                <li>Ensuring making the monthly salaries/payments on time using internal software & resolve any payroll discrepancies.</li>
                <li>Ensuring all payroll transactions are processed efficiently.</li>
                <li>Responding to employee queries about compensation, benefits, and deductions.</li>
                <li>Running smooth and accurate payroll process by collecting, calculating, and entering data in order to maintain and update payroll.</li>
                <li>Managing special situations like maternity or sickness pay</li>
                <li>Updating& generate payment vouchers of EOBI & Social Security Contribution on monthly basis.</li>
                <li>Assisting AM-HR with day to day operations of the HR functions and duties.</li>
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