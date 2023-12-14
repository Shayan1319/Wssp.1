<?php
session_start();
error_reporting(0);
// links to database
include ('link/desigene/db.php');
if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber']) || $_SESSION['Designation'] != 'Internal Auditor') {
  // Log the unauthorized access attempt for auditing purposes
  error_log("Unauthorized access attempt. User: {$_SESSION['loginid']}");
  
  // Redirect to the logout page
  header("Location: ../logout.php");
  exit; // Ensure that the script stops execution after the header redirection
}else{
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
    <?php
      $CNIC = $_GET['updat'];
      $select = mysqli_query($conn,"SELECT * FROM `employeedata` WHERE `CNIC` ='$CNIC' ");
      while($see1=mysqli_fetch_all($select)){
      ?>
      <div class="container-fluid m-auto p-5 bg-light">
        <div class="row">
          <div class="col-md-6 col-sm-12 col-lg-6">
            <div class="row">
              <div class="col-4">
                <img src="../image/<?php echo $see1 ['image'] ?>" alt="" width="150px">
              </div>
              <div class="col-8">
                <h4 class="fw-bold"><?php echo $see1 ['fName'];?> <?php echo $see1 ['mName'];?> <?php echo $see1 ['lName']?></h4>
                <h5><?php echo $see1 ['ContactPerson']?></h5>
                <h5 class="text-primary"><?php echo $see1 ['email']?></h5>
                <h5><?php echo $see1 ['ofphNumber']?></h5>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-12 col-lg-6">
          </div>
          <br>
          <hr>
          <div class="col-12 bg-white mt-5 px-2">
          <nav class="navbar bg-white">
          <div class="container-fluid">
          <h4>Basic Information</h4>
          </div>
          </nav>
          <div class="row mt-5 p-3">
          <div class="col-md-4 my-2">
          <div class="form-group">
          <label>First Name</label>
          <h5><?php echo $see1 ['fName'] ?></h5>
          </div>
          </div>
          <div class="col-md-4 my-2">
          <div class="form-group">
          <label>Middle Name</label>
          <h5><?php echo $see1 ['mName'] ?></h5>
          </div>
          </div>
          <div class="col-md-4 my-2">
          <div class="form-group">
          <label>Last Name</label>
          <h5><?php echo $see1 ['lName'] ?></h5>
          </div>
          </div> 
          <div class="col-md-4 my-2">
          <div class="form-group">
          <label>Father Name</label>
          <h5><?php echo $see1 ['father_Name'] ?></h5>
          </div>
          </div> 
          <div class="col-md-4 my-2">
          <div class="form-group">
          <label>CNIC</label>
          <h5><?php echo $see1 ['CNIC'] ?></h5>
          </div>
          </div>
          <div class="col-md-4 my-2">
          <div class="form-group">
          <label>Email address</label>
          <h5><?php echo $see1 ['email'] ?></h5>
          </div>
          </div>
          <div class="col-md-4 my-2">
          <div class="form-group">
          <label>Permenent Address</label>
          <h5><?php echo $see1 ['pAddress'] ?></h5>
          </div>
          </div>
          <div class="col-md-4 my-2">
          <div class="form-group">
          <label>Current Address</label>
          <h5><?php echo $see1 ['cAddress'] ?></h5>
          </div>
          </div>
          <div class="col-md-4 my-2">
          <div class="form-group">
          <label>City</label>
          <h5><?php echo $see1 ['city'] ?></h5>
          </div>
          </div>
          <div class="col-md-4 my-2">
          <div class="form-group">
          <label>Postal Address</label>
          <h5><?php echo $see1 ['postAddress'] ?></h5>
          </div>
          </div>
          <div class="col-md-4 my-2">
          <div class="form-group">
          <label>Mobile Number</label>
          <h5><?php echo $see1 ['mNumber'] ?></h5>
          </div>
          </div>
          <div class="col-md-4 my-2">
          <div class="form-group">
          <label>Office Phone Number</label>
          <h5><?php echo $see1 ['ofphNumber'] ?></h5>
          </div>
          </div>
          <div class="col-md-4 my-2">
          <div class="form-group">
          <label>Alternate Number</label>
          <h5><?php echo $see1 ['Alternate_Number'] ?></h5>
          </div>
          </div>
          <div class="col-md-4 my-2">
          <div class="form-group">
          <label>Date of Birth</label>
          <h5><?php echo $see1 ['DofB'] ?></h5>
          </div>
          </div>
          <div class="col-md-4 my-2">
          <div class="form-group">
          <label>Religion</label>
          <h5><?php echo $see1 ['religion'] ?></h5>
          </div>
          </div>
          <div class="col-md-4 my-2">
          <div class="form-group">
          <label>Gender</label>
          <h5><?php echo $see1 ['gender'] ?></h5>
          </div>
          </div>
          <div class="col-md-4 my-2">
          <div class="form-group">
          <label>Blood Group</label>
          <h5><?php echo $see1 ['BlGroup'] ?></h5>
          </div>
          </div>
          <div class="col-md-4 my-2">
          <div class="form-group">
          <label>Domicile</label>
          <h5><?php echo $see1 ['Domicile'] ?></h5>
          </div>
          </div>
          <div class="col-md-4 my-2">
          <div class="form-group">
          <label>Marital Status </label>
          <h5><?php echo $see1 ['MaritalStatus'] ?></h5>
          </div>
          </div>
          <div class="col-md-4 my-2">
          <div class="form-group">
          <label>Next of Kin</label>
          <h5><?php echo $see1 ['NextofKin'] ?></h5>
          </div>
          </div>
          <div class="col-md-4 my-2">
          <div class="form-group">
          <label>Next of Kin Cell Number</label>
          <h5><?php echo $see1 ['NextofKinCellNumber'] ?></h5>
          </div>
          </div>                   
          <div class="col-md-4 my-2">
          <div class="form-group">
          <label>Contact Person</label>
          <h5><?php echo $see1 ['ContactPerson'] ?></h5>
          </div>
          </div>                    
          <div class="col-md-4 my-2">
          <div class="form-group">
          <label>Contact Person Cell Number</label>
          <h5><?php echo $see1 ['CPCN'] ?></h5>
          </div>
          </div>
          </div>
          </div>
          <div class="col-12 bg-white mt-5 px-2">
          <nav class="navbar bg-white">
          <div class="container-fluid">
          <h4>Employement Information</h4>
          </div>
          </nav>
          <div class="row">
          <div class="col-md-4 my-2">
          <div class="form-group">
          <label>Employement Group</label>
          <h5><?php echo $see1 ['Employement_Group'] ?></h5>
          </div>
          </div>
          <div class="col-md-4 my-2">
          <div class="form-group">
          <label>Employee Class</label>
          <h5><?php echo $see1 ['Employee_Class'] ?></h5>
          </div>
          </div>
          <div class="col-md-4 my-2">
          <div class="form-group">
          <label>Employee Sub Group</label>
          <h5><?php echo $see1 ['Employee_Group'] ?></h5>
          </div>
          </div>
          <div class="col-md-4 my-2">
          <div class="form-group">
          <label>Employee Sub Group</label>
          <h5><?php echo $see1 ['Employee_Sub_Group'] ?></h5>
          </div>
          </div>
          <div class="col-md-4 my-2">
          <div class="form-group">
          <label>Employee Quota</label>
          <h5><?php echo $see1 ['Employee_Quota'] ?></h5>
          </div>
          </div>
          <div class="col-md-4 my-2">
          <div class="form-group">
          <label>Grade</label>
          <h5><?php echo $see1 ['Grade']?></h5>
          </div>
          </div>
          <div class="col-md-4 my-2">
          <div class="form-group">
          <label>Department</label>
          <h5><?php echo $see1 ['Department'] ?></h5>
          </div>
          </div>
          <div class="col-md-4 my-2">
          <div class="form-group">
          <label>Job Tiltle</label>
          <h5><?php echo $see1 ['Job_Tiltle'] ?></h5>
          </div>
          </div>
          <div class="col-md-4 my-2">
          <div class="form-group">
          <label>Salary Mode</label>
          <h5><?php echo $see1 ['Salary_Mode'] ?></h5>
          </div>
          </div>
          <div class="col-md-4 my-2">
          <div class="form-group">
          <label>Status</label>
          <h5><?php echo $see1 ['Status'] ?></h5>
          </div>
          </div>
          <div class="col-md-4 my-2">
          <div class="form-group">
          <label>Employee NO</label>
          <h5><?php echo $see1 ['EmployeeNo'] ?></h5>
          </div>
          </div>
          <div class="col-md-4 my-2">
          <div class="form-group">
          <label>Employee Manager</label>
          <h5><?php echo $see1 ['Employee_Manager'] ?></h5>
          </div>
          </div>
          <div class="col-md-4 my-2">
          <div class="form-group">
          <label>Joining Date</label>
          <h5><?php echo $see1 ['Joining_Date'] ?></h5>
          </div>
          </div>
          <div class="col-md-4 my-2">
          <div class="form-group">
          <label>Contract Expiry Date</label>
          <h5><?php echo $see1 ['Contract_Expiry_Date'] ?></h5>
          </div>
          </div>
          <div class="col-md-4 my-2">
          <div class="form-group">
          <label>Last Working Date</label>
          <h5><?php echo $see1 ['Last_Working_Date'] ?></h5>
          </div>
          </div>
          <div class="col-md-4 my-2">
          <div class="form-group">
          <label>Attendance Supervisor</label>
          <h5><?php echo $see1 ['Attendance_Supervisor'] ?></h5>
          </div>
          </div>
          <div class="col-md-4 my-2">
          <div class="form-group">
          <label>Duty Location</label>
          <h5><?php echo $see1 ['Duty_Location'] ?></h5>
          </div>
          </div>
          <div class="col-md-4 my-2">
          <div class="form-group">
          <label>Duty Point</label>
          <h5><?php echo $see1 ['Duty_Point'] ?></h5>
          </div>
          </div>
          </div>
          </div>
          <?php }?>
          <div class="col-12 bg-white mt-5 px-2">
          <nav class="navbar bg-white">
          <div class="container-fluid">
          <h4>Qualification Information</h4>
          </div>
          </nav>
          <div>
          <table class="table bg-light">
          <thead>
          <tr>
          <th scope="col">#</th>
          <th scope="col">Qualification</th>
          <th scope="col">Grade/Division</th>
          <th scope="col">Passing Year of Degree</th>
          <th scope="col">Last Institute</th>
          <th scope="col">PEC Registration</th>
          <th scope="col">Institute Address</th>
          <th scope="col">Major Subject</th>
          </tr>
          </thead>
          <tbody>
          <?php   $CNIC = $_GET['updat'];
          $select = mysqli_query($conn,"SELECT * FROM `qualification` WHERE `Employee_id`=$CNIC");
          while($see2=mysqli_fetch_array($select))
          {
          ?>
          <tr>
          <th scope="row">1</th>
          <td><?php echo $see2 ['Qualification'] ?></td>
          <td><?php echo $see2 ['Grade/Division'] ?></td>
          <td><?php echo $see2 ['Passing Year of Degree'] ?></td>
          <td><?php echo $see2 ['Last Institute'] ?></td>
          <td><?php echo $see2 ['PEC Registration'] ?></td>
          <td><?php echo $see2 ['Institute Address'] ?></td>
          <td><?php echo $see2 ['Major Subject'] ?></td>
          </tr>
          <?php }?>
          </tbody>
          </table>
          </div>
          </div>   
          <div class="col-12 bg-white mt-5 px-2">
          <nav class="navbar bg-white">
          <div class="container-fluid">
          <h4>Training Information</h4>
          </div>
          </nav>
          <div>
          <table class="table bg-light">
          <thead>
          <tr>
          <th scope="col">#</th>
          <th scope="col">Training Serial Number</th>
          <th scope="col">Training Name</th>
          <th scope="col">Institute</th>
          <th scope="col">City</th>
          <th scope="col">Institute Address</th>
          <th scope="col">Oblige Sponsor</th>
          <th scope="col">From</th>
          <th scope="col">To</th>
          <th scope="col">Duration</th>
          </tr>
          </thead>
          <tbody>
          <?php   $CNIC = $_GET['updat'];
          $select = mysqli_query($conn,"SELECT * FROM `training` WHERE `Employee_id`=$CNIC");
          while($see3=mysqli_fetch_array($select))
          { 
          ?>
          <tr>
          <th scope="row"><?php echo $see3 ['Id'] ?></th>
          <td><?php echo $see3 ['Training_Serial_Number'] ?></td>
          <td><?php echo $see3 ['Training_Name'] ?></td>
          <td><?php echo $see3 ['Institute'] ?></td>
          <td><?php echo $see3 ['City'] ?></td>
          <td><?php echo $see3 ['Institute_Address'] ?></td>
          <td><?php echo $see3 ['Oblige_Sponsor'] ?></td>
          <td><?php echo $see3 ['From'] ?></td>
          <td><?php echo $see3 ['To'] ?></td>
          <td><?php echo $see3 ['Duration'] ?></td>
          </tr>
          <?php }?>
          </tbody>
          </table>
          </div>
          </div>
          <div class="col-12 bg-white mt-5 px-2">
          <nav class="navbar bg-white">
          <div class="container-fluid">
          <h4>Promotion Information</h4>
          </div>
          </nav>
          <div>
          <table class="table bg-light">
          <thead>
          <tr>
          <th scope="col">#</th>
          <th scope="col">From Designation</th>
          <th scope="col">To Designation</th>
          <th scope="col">From BPS</th>
          <th scope="col">ToBps</th>
          <th scope="col">Promotion Date</th>
          <th scope="col">Promotion Number</th>
          <th scope="col">Department</th>
          <th scope="col">Acting</th>
          <th scope="col">Remarks</th>
          </tr>
          </thead>
          <tbody>
          <?php   $CNIC = $_GET['updat'];
          $select = mysqli_query($conn,"SELECT * FROM `promotion` WHERE `Employee_id`=$CNIC");
          while($see4=mysqli_fetch_array($select))
          { 
          ?>
          <tr>
          <th scope="row"><?php echo $see4 ['Id'] ?></th>
          <td><?php echo $see4 ['From_Designation'] ?></td>
          <td><?php echo $see4 ['To_Designation'] ?></td>
          <td><?php echo $see4 ['From_BPS'] ?></td>
          <td><?php echo $see4 ['ToBps'] ?></td>
          <td><?php echo $see4 ['Promotion_Date'] ?></td>
          <td><?php echo $see4 ['Promotion_Number'] ?></td>
          <td><?php echo $see4 ['Department1'] ?></td>
          <td><?php echo $see4 ['Acting'] ?></td>
          <td><?php echo $see4 ['Remarks'] ?></td>
          </tr>
          <?php }?>
          </tbody>
          </table>
          </div>
          </div>
          <div class="col-12 bg-white mt-5 px-2">
          <nav class="navbar bg-white">
          <div class="container-fluid">
          <h4>Transfer Info</h4>
          </div>
          </nav>
          <div class="row">
          <div>
          <table class="table bg-light">
          <thead>
          <tr>
          <th scope="col">#</th>
          <th scope="col">Transfer Order Number</th>
          <th scope="col">Designation</th>
          <th scope="col">BPS</th>
          <th scope="col">From Department</th>
          <th scope="col">To Project</th>
          <th scope="col">From Station</th>
          <th scope="col">To Station</th>
          <th scope="col">Worked From</th>
          <th scope="col">Transfer Date</th>
          <th scope="col">Update</th>
          <th scope="col">Delete</th>
          </tr></thead>
          
          <tbody>
          <?php   $CNIC = $_GET['updat'];
          $select = mysqli_query($conn,"SELECT * FROM `transfer` WHERE `employee_id`=$CNIC");
          while($see5=mysqli_fetch_array($select))
          { 
          ?>
          <tr>
          <th scope="row"><?php echo $see5 ['id'] ?></th>
          <td><?php echo $see5 ['Transfer_Order_Number'] ?></td>
          <td><?php echo $see5 ['Designation'] ?></td>
          <td><?php echo $see5 ['BPS'] ?></td>
          <td><?php echo $see5 ['From_Department'] ?></td>
          <td><?php echo $see5 ['To_Project'] ?></td>
          <td><?php echo $see5 ['From_Station'] ?></td>
          <td><?php echo $see5 ['To_Station'] ?></td>
          <td><?php echo $see5 ['Worked_From'] ?></td>
          <td><?php echo $see5 ['Transfer_Date'] ?></td>
          </tr>
          <?php }?>
          </tbody>
          </table>
          </div>
          </div>
          </div> 
          <div class="col-12 bg-white mt-5 px-2">
          <nav class="navbar bg-white">
          <div class="container-fluid">
          <h4>Spouse Info</h4>
          </div>
          </nav>
          <div class="row">
          <div>
          <?php $CNIC = $_GET['updat'];
          $selectM = mysqli_query($conn,"SELECT * FROM `spouse` WHERE `employee_id`=$CNIC");
          $row=mysqli_num_rows($selectM);
          for($i=1;$i<=$row;$i++)
          { $see6=mysqli_fetch_array($selectM);
           
          ?>
          <table class="table bg-light">
          <thead>
          <tr>
          <th scope="col">#</th>
          <th scope="col">Spouse_Name</th>
          <th scope="col">CNIC</th>
          <th scope="col">Date of Birth</th>
          </tr>
          </thead>
          
          <tbody>
          
          <tr>
          <th scope="row"><?php echo $i?></th>
          <td><?php echo $see6 ['Spouse_Name'] ?></td>
          <td><?php echo $see6 ['CNIC'] ?></td>
          <td><?php echo $see6 ['Date_of_B'] ?></td>
          </tr>
          <table class="table bg-light">
           <thead>
           <tr>
           <th scope="col">#</th>
           <th scope="col"> Childeren Name</th>
           <th scope="col">CNIC</th>
           <th scope="col">Date of birth.</th>
           <th scope="col">Gender</th>
           <th scope="col">Mother Name</th>
           </tr>
           </thead>
           
           <tbody id="table-data">
           <?php   
                $MCNIC = $see6 ['CNIC'];
                $select = mysqli_query($conn,"SELECT * FROM `child` WHERE `MouterCNIC`= '$MCNIC'");
                while($featch=mysqli_fetch_array($select))
                {
                ?>
                <tr>
                    <th scope="row"><?php echo $featch ['id'] ?></th>
                    <td><?php echo $featch ['Name'] ?></td>
                    <td><?php echo $featch ['CNIC'] ?></td>
                    <td><?php echo $featch ['Date_of_B'] ?></td>
                    <td><?php echo $featch ['Gender'] ?></td>
                    <td><?php echo $see6 ['Spouse_Name'] ?></td>
                    <?php   
                    }

                ?>
           </tbody>
        </table>
          
          </tbody>
          </table>
         <?php }?>
        
          </div>
          </div>
          <div class=" text-end">
          <input style="background-color: darkblue;" type="button" onclick="backToSection2()" class="btn text-white shadow float-right" value="Next">
          </div>
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
</html><?php }?>