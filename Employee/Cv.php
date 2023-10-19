<?php
session_start();
error_reporting(0);
// links to database
include('../hrdash/link/desigene/db.php');
if (strlen($_SESSION['loginid']==0)) {
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
<div class="container-fluid m-auto p-5 bg-light">
<div class="row">
    <div class="col-md-6 col-sm-12 col-lg-6">
        <div class="row">
            <div class="col-4"><img width="150px" src="image/download.jfif" alt=""></div>
            <div class="col-8"><h4 class="fw-bold">Name</h4><h5>Designer</h5><h5 class="text-primary">gmail@email.com</h5><h5>1111 111111</h5></div>
        </div>
    </div>
    <br>
    <hr>
    <div class="col-12 bg-white mt-5 px-2">
    <nav class="navbar bg-white">
     <div class="container-fluid">
        <h4>Basic Info</h4>
     </div>
    </nav>
        <div class="row w-100">
           <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Full Name</h5></div>
           <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Fater name</h5></div>
           <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>CNIC</h5></div>
           <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Email address</h5></div>
           <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Permenent Address</h5></div>
           <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Current Address</h5></div>
           <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>City</h5></div>
           <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Postal Address</h5></div>
           <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Mobile Number</h5></div>
           <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Office Phone Number</h5></div>
           <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Alternate Number</h5></div>
           <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Date of Birth</h5></div>
           <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Religion</h5></div>
           <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Gender</h5></div>
           <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Blood Group</h5></div>
           <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Domicile</h5></div>
           <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Marital Status </h5></div>
           <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Next of Kin</h5></div>
           <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Next of Kin Cell</h5></div>
           <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Contact Person</h5></div>
           <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Contact Person Cell Number</h5></div>
        </div>
    </div>
    <div class="col-12 bg-white mt-5 px-2">
    <nav class="navbar bg-white">
     <div class="container-fluid">
        <h4>Employement Info</h4>
     </div>
    </nav>
        <div class="row">           
            <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Employement Group</h5></div>
            <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Employee Class</h5></div>
            <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Employee Group</h5></div>
            <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Employee Sub Group</h5></div>
            <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Employee Quota</h5></div>
            <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Salary Bank</h5></div>
            <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Salary Branch</h5></div>
            <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Account No</h5></div>
            <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Pay Type</h5></div>
            <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>EOBI No</h5></div>
            <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Bill Walved Off</h5></div>
            <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Weekly Working Days</h5></div>
            <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Bill Waived Off</h5></div>
            <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Employee Pay Classification</h5></div>
            <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Grade</h5></div>
            <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Department</h5></div>
            <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Job Tiltle</h5></div>
            <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Salary Mode</h5></div>
            <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Status</h5></div>
            <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Employee NO</h5></div>
            <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Employee Manager</h5></div>
            <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Joining Date</h5></div>
            <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Contract Expiry Date</h5></div>
            <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Last Working Date</h5></div>
            <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Attendance Supervisor</h5></div>
            <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Duty Location</h5></div>
            <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Duty Point</h5></div>
        </div>
    </div>
    <div class="col-12 bg-white mt-5 px-2">
    <nav class="navbar bg-white">
     <div class="container-fluid">
        <h4>Qualification Info</h4>
     </div>
    </nav>
        <div class="row">
        <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Qualification</h5></div>
        <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Grade/Division</h5></div>
        <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Passing Year of Degree</h5></div>
        <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Last Institute</h5></div>
        <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>PEC Registration</h5></div>
        <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>CV Attachment(Optional)</h5></div>
        <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Institute Address</h5></div>
        <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Major Subject</h5></div>
        <div class="col-md-6 col-lg-6 col-sm-12 my-3"><h5>Remarks</h5></div>
        
        </div>
    </div>
    <div class="col-12 bg-white mt-5 px-2">
    <nav class="navbar bg-white">
     <div class="container-fluid">
        <h4>Family Info</h4>
     </div>
    </nav>
        <div class="row">
           <div class="col-md-6 col-lg-6 col-sm-12"></div>
           <div class="col-md-6 col-lg-6 col-sm-12"></div>
        </div>
    </div>
    <div class="col-12 bg-white mt-5 px-2">
    <nav class="navbar bg-white">
     <div class="container-fluid">
        <h4>Training Info</h4>
     </div>
    </nav>
        <div class="row">
           <div class="col-md-6 col-lg-6 col-sm-12"></div>
           <div class="col-md-6 col-lg-6 col-sm-12"></div>
        </div>
    </div>
    <div class="col-12 bg-white mt-5 px-2">
    <nav class="navbar bg-white">
     <div class="container-fluid">
        <h4>Promotions Info</h4>
     </div>
    </nav>
        <div class="row">
           <div class="col-md-6 col-lg-6 col-sm-12"></div>
           <div class="col-md-6 col-lg-6 col-sm-12"></div>
        </div>
    </div>
    <div class="col-12 bg-white mt-5 px-2">
    <nav class="navbar bg-white">
     <div class="container-fluid">
        <h4>Transfer Info</h4>
     </div>
    </nav>
        <div class="row">
           <div class="col-md-6 col-lg-6 col-sm-12"></div>
           <div class="col-md-6 col-lg-6 col-sm-12"></div>
        </div>
    </div>
</div>

</div>
    
</div>


<?php include('link/desigene/script.php')?>
</body>
</html>
<?php }?>