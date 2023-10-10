<?php
session_start();
error_reporting(0);
// links to database
include('../hrdash/link/desigene/db.php');
if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber']) || $_SESSION['Designation'] != 'GM') {
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
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <label for="">Item</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Item </option>
                        <option value="HRMS Updated">HRMS Updatede</option>
                        <option value="EOBI Guidance ">EOBI Guidance </option>
                        <option value="Last Salary Payment">Last Salary Payment</option>
                        <option value="Leave Encashment">Leave Encashment</option>
                        <option value="Gratuity">Gratuity</option>
                      </select>
                </div>
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <label for="">Select Option</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Select option</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                </div>
                <div class="col-sm-12">
                    <label for="student">Remarks<span>*</span></label>
                    <textarea name="Remarks " id="description"></textarea>
                    <script>
                        CKEDITOR.replace('Remarks ');
                    </script>
                </div>
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <label for="">Verified</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Verified</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                </div>
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <label for="">Date</label>
                    <input class="form-control" type="date" name="" id="" placeholder="Date">
                </div>

                <div class="col-sm-12 col-lg-4 col-md-4">
                </div>

                <div class="col-sm-12 col-lg-4 col-md-4">
                </div>

                <div class="col-sm-12 col-lg-4 col-md-4">
                </div>

                <div class="col-sm-12 col-lg-4 col-md-4 ">
                    <button type="button" class="btn btn-primary align-content-end">Submit</button>
                </div>

            </div>
        </div>
    </div>


    <?php include('link/desigene/script.php')?>
</body>

</html>
<?php
  }
?>