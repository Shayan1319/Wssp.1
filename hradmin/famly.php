<?php
session_start();
error_reporting(0);
// links to database
include('../link/desigene/db.php');
if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber']) || $_SESSION['Designation'] != 'HR manager') {
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
<style>
label span{
  color: #ff0505;
}
</style>
<body>
    <?php include ('link/desigene/sidebar.php')?>
    <div id="main">
    <?php include('link/desigene/navbar.php')?>
        <div class="container-fluid py-5">
        <?php
      $CNIC = $_GET['updat'];
      $select = mysqli_query($conn,"SELECT * FROM `employeedata` WHERE `EmployeeNo` ='$CNIC' ");
      while($see=mysqli_fetch_array($select)){
      ?>
      <div class="container-fluid m-auto p-5 bg-light">
        <div class="row">
          <div class="col-md-6 col-sm-12 col-lg-6">
            <div class="row">
              <div class="col-4">
                <img src="../image/<?php echo $see ['image'] ?>" alt="" width="150px">
              </div>
              <div class="col-8">
                <h4 class="fw-bold"><?php echo $see ['fName'];?> <?php echo $see ['mName'];?> <?php echo $see ['lName']?></h4>
                <h5><?php echo $see ['ContactPerson']?></h5>
                <h5 class="text-primary"><?php echo $see ['email']?></h5>
                <h5><?php echo $see ['ofphNumber']?></h5>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-12 col-lg-6">
            <div class="float-end bg-white">
              <div class="card" style="width: 18rem;">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Action</li>
                </ul>
                <div class="card-footer">
                  <a href="#" class="btn btn-primary">Edit</a>
                </div>
              </div>
            </div>
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
                  <h5><?php echo $see ['fName'] ?></h5>
                  </div>
                  </div>
                  <div class="col-md-4 my-2">
                  <div class="form-group">
                  <label>Middle Name</label>
                  <h5><?php echo $see ['mName'] ?></h5>
                  </div>
                  </div>
                  <div class="col-md-4 my-2">
                  <div class="form-group">
                  <label>Last Name</label>
                  <h5><?php echo $see ['lName'] ?></h5>
                  </div>
                  </div> 
                  <div class="col-md-4 my-2">
                  <div class="form-group">
                  <label>Father Name</label>
                  <h5><?php echo $see ['father_Name'] ?></h5>
                  </div>
                  </div> 
                  <div class="col-md-4 my-2">
                  <div class="form-group">
                  <label>CNIC</label>
                  <h5><?php echo $see ['CNIC'] ?></h5>
                  </div>
                  </div>
                  <div class="col-md-4 my-2">
                  <div class="form-group">
                  <label>Email address</label>
                  <h5><?php echo $see ['email'] ?></h5>
                  </div>
                  </div>
                  <div class="col-md-4 my-2">
                  <div class="form-group">
                  <label>Permenent Address</label>
                  <h5><?php echo $see ['pAddress'] ?></h5>
                  </div>
                  </div>
                  <div class="col-md-4 my-2">
                  <div class="form-group">
                  <label>Current Address</label>
                  <h5><?php echo $see ['cAddress'] ?></h5>
                  </div>
                  </div>
                  <div class="col-md-4 my-2">
                  <div class="form-group">
                  <label>City</label>
                  <h5><?php echo $see ['city'] ?></h5>
                  </div>
                  </div>
                  <div class="col-md-4 my-2">
                  <div class="form-group">
                  <label>Postal Address</label>
                  <h5><?php echo $see ['postAddress'] ?></h5>
                  </div>
                  </div>
                  <div class="col-md-4 my-2">
                  <div class="form-group">
                  <label>Mobile Number</label>
                  <h5><?php echo $see ['mNumber'] ?></h5>
                  </div>
                  </div>
                  <div class="col-md-4 my-2">
                  <div class="form-group">
                  <label>Office Phone Number</label>
                  <h5><?php echo $see ['ofphNumber'] ?></h5>
                  </div>
                  </div>
                  <div class="col-md-4 my-2">
                  <div class="form-group">
                  <label>Alternate Number</label>
                  <h5><?php echo $see ['Alternate_Number'] ?></h5>
                  </div>
                  </div>
                  <div class="col-md-4 my-2">
                  <div class="form-group">
                  <label>Date of Birth</label>
                  <h5><?php echo $see ['DofB'] ?></h5>
                  </div>
                  </div>
                  <div class="col-md-4 my-2">
                  <div class="form-group">
                  <label>Religion</label>
                  <h5><?php echo $see ['religion'] ?></h5>
                  </div>
                  </div>
                  <div class="col-md-4 my-2">
                  <div class="form-group">
                  <label>Gender</label>
                  <h5><?php echo $see ['gender'] ?></h5>
                  </div>
                  </div>
                  <div class="col-md-4 my-2">
                  <div class="form-group">
                  <label>Blood Group</label>
                  <h5><?php echo $see ['BlGroup'] ?></h5>
                  </div>
                  </div>
                  <div class="col-md-4 my-2">
                  <div class="form-group">
                  <label>Domicile</label>
                  <h5><?php echo $see ['Domicile'] ?></h5>
                  </div>
                  </div>
                  <div class="col-md-4 my-2">
                  <div class="form-group">
                  <label>Marital Status </label>
                  <h5><?php echo $see ['MaritalStatus'] ?></h5>
                  </div>
                  </div>
                  <div class="col-md-4 my-2">
                  <div class="form-group">
                  <label>Next of Kin</label>
                  <h5><?php echo $see ['NextofKin'] ?></h5>
                  </div>
                  </div>
                  <div class="col-md-4 my-2">
                  <div class="form-group">
                  <label>Next of Kin Cell Number</label>
                  <h5><?php echo $see ['NextofKinCellNumber'] ?></h5>
                  </div>
                  </div>                   
                  <div class="col-md-4 my-2">
                  <div class="form-group">
                  <label>Contact Person</label>
                  <h5><?php echo $see ['ContactPerson'] ?></h5>
                  </div>
                  </div>                    
                  <div class="col-md-4 my-2">
                  <div class="form-group">
                  <label>Contact Person Cell Number</label>
                  <h5><?php echo $see ['CPCN'] ?></h5>
                  </div>
                  </div>
                  </div>
              </div>
              <div class="col-12 bg-white mt-5 px-2">
                <nav class="navbar bg-white">
                <div class="container-fluid">
                <h4>Employment Information</h4>
                </div>
                </nav>
                <div class="row">
                  <div class="col-md-4 my-2">
                  <div class="form-group">
                  <label>Employment Group</label>
                  <h5><?php echo $see ['Employement_Group'] ?></h5>
                  </div>
                  </div>
                  <div class="col-md-4 my-2">
                  <div class="form-group">
                  <label>Employee Class</label>
                  <h5><?php echo $see ['Employee_Class'] ?></h5>
                  </div>
                  </div>
                  <div class="col-md-4 my-2">
                  <div class="form-group">
                  <label>Employee Sub Group</label>
                  <h5><?php echo $see ['Employee_Group'] ?></h5>
                  </div>
                  </div>
                  <div class="col-md-4 my-2">
                  <div class="form-group">
                  <label>Employee Sub Group</label>
                  <h5><?php echo $see ['Employee_Sub_Group'] ?></h5>
                  </div>
                  </div>
                  <div class="col-md-4 my-2">
                  <div class="form-group">
                  <label>Employee Quota</label>
                  <h5><?php echo $see ['Employee_Quota'] ?></h5>
                  </div>
                  </div>
                  <div class="col-md-4 my-2">
                  <div class="form-group">
                  <label>Grade</label>
                  <h5><?php echo $see ['Grade'] ?></h5>
                  </div>
                  </div>
                  <div class="col-md-4 my-2">
                  <div class="form-group">
                  <label>Department</label>
                  <h5><?php echo $see ['Department'] ?></h5>
                  </div>
                  </div>
                  <div class="col-md-4 my-2">
                  <div class="form-group">
                  <label>Job Title</label>
                  <h5><?php echo $see ['Job_Tiltle'] ?></h5>
                  </div>
                  </div>
                  <div class="col-md-4 my-2">
                  <div class="form-group">
                  <label>Salary Mode</label>
                  <h5><?php echo $see ['Salary_Mode'] ?></h5>
                  </div>
                  </div>
                  <div class="col-md-4 my-2">
                  <div class="form-group">
                  <label>Status</label>
                  <h5><?php echo $see ['Status'] ?></h5>
                  </div>
                  </div>
                  <div class="col-md-4 my-2">
                  <div class="form-group">
                  <label>Employee NO</label>
                  <h5><?php echo $see ['EmployeeNo'] ?></h5>
                  </div>
                  </div>
                  <div class="col-md-4 my-2">
                  <div class="form-group">
                  <label>Employee Manager</label>
                  <h5><?php echo $see ['Employee_Manager'] ?></h5>
                  </div>
                  </div>
                  <div class="col-md-4 my-2">
                  <div class="form-group">
                  <label>Joining Date</label>
                  <h5><?php echo $see ['Joining_Date'] ?></h5>
                  </div>
                  </div>
                  <div class="col-md-4 my-2">
                  <div class="form-group">
                  <label>Contract Expiry Date</label>
                  <h5><?php echo $see ['Contract_Expiry_Date'] ?></h5>
                  </div>
                  </div>
                  <div class="col-md-4 my-2">
                  <div class="form-group">
                  <label>Last Working Date</label>
                  <h5><?php echo $see ['Last_Working_Date'] ?></h5>
                  </div>
                  </div>
                  <div class="col-md-4 my-2">
                  <div class="form-group">
                  <label>Attendance Supervisor</label>
                  <h5><?php echo $see ['Attendance_Supervisor'] ?></h5>
                  </div>
                  </div>
                  <div class="col-md-4 my-2">
                  <div class="form-group">
                  <label>Duty Location</label>
                  <h5><?php echo $see ['Duty_Location'] ?></h5>
                  </div>
                  </div>
                  <div class="col-md-4 my-2">
                  <div class="form-group">
                  <label>Duty Point</label>
                  <h5><?php echo $see ['Duty_Point'] ?></h5>
                  </div>
                  </div>
                </div>
              </div>
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
                      while($see=mysqli_fetch_array($select))
                      {
                      ?>
                      <tr>
                        <th scope="row">1</th>
                        <td><?php echo $see ['Qualification'] ?></td>
                        <td><?php echo $see ['Grade/Division'] ?></td>
                        <td><?php echo $see ['Passing Year of Degree'] ?></td>
                        <td><?php echo $see ['Last Institute'] ?></td>
                        <td><?php echo $see ['PEC Registration'] ?></td>
                        <td><?php echo $see ['Institute Address'] ?></td>
                        <td><?php echo $see ['Major Subject'] ?></td>
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
                  while($see=mysqli_fetch_array($select))
                  { 
                  ?>
                  <tr>
                  <th scope="row"><?php echo $see ['Id'] ?></th>
                  <td><?php echo $see ['Training_Serial_Number'] ?></td>
                  <td><?php echo $see ['Training_Name'] ?></td>
                  <td><?php echo $see ['Institute'] ?></td>
                  <td><?php echo $see ['City'] ?></td>
                  <td><?php echo $see ['Institute_Address'] ?></td>
                  <td><?php echo $see ['Oblige_Sponsor'] ?></td>
                  <td><?php echo $see ['From'] ?></td>
                  <td><?php echo $see ['To'] ?></td>
                  <td><?php echo $see ['Duration'] ?></td>
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
                 while($see=mysqli_fetch_array($select))
                 { 
                 ?>
                 <tr>
                 <th scope="row"><?php echo $see ['Id'] ?></th>
                 <td><?php echo $see ['From_Designation'] ?></td>
                 <td><?php echo $see ['To_Designation'] ?></td>
                 <td><?php echo $see ['From_BPS'] ?></td>
                 <td><?php echo $see ['ToBps'] ?></td>
                 <td><?php echo $see ['Promotion_Date'] ?></td>
                 <td><?php echo $see ['Promotion_Number'] ?></td>
                 <td><?php echo $see ['Department1'] ?></td>
                 <td><?php echo $see ['Acting'] ?></td>
                 <td><?php echo $see ['Remarks'] ?></td>
                 <td><a href="../CV/<?php echo $see ['file'] ?>">Download</a></td>
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
                <th scope="col">file</th>
                </tr></thead>
                
                <tbody>
                <?php   $CNIC = $_GET['updat'];
                $select = mysqli_query($conn,"SELECT * FROM `transfer` WHERE `employee_id`=$CNIC");
                while($see=mysqli_fetch_array($select))
                { 
                ?>
                <tr>
                  <th scope="row"><?php echo $see ['id'] ?></th>
                  <td><?php echo $see ['Transfer_Order_Number'] ?></td>
                  <td><?php echo $see ['Designation'] ?></td>
                  <td><?php echo $see ['BPS'] ?></td>
                  <td><?php echo $see ['From_Department'] ?></td>
                  <td><?php echo $see ['To_Project'] ?></td>
                  <td><?php echo $see ['From_Station'] ?></td>
                  <td><?php echo $see ['To_Station'] ?></td>
                  <td><?php echo $see ['Worked_From'] ?></td>
                  <td><?php echo $see ['Transfer_Date'] ?></td>
                  <td><a href="../CV/<?php echo $see ['file']?>">Download</a></td>
                </tr>
                <?php }?>
                </tbody>
                </table>
                </div>
                </div>
              </div> 
            </div>
          </div>
          <?php }?>
        <div  class="container-fluid py-5">
             <form id="formdata" action="" method="post">
                <div id="section7">
                    <div class="row my-4">
                      <!-- left column -->
                      <div class="col-md-12">
                        <div class="card card-success">
                          <div style="background-color: darkblue;" class="card-header  text-white fw-bold">
                            <div class="card-title">Dependents</div>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body bg-light">
                            <div class="row">
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Name<span>*</span></label>
                                  <input type="text" name="Spouse_Name" id="Spouse_Name" placeholder="Name" class="form-control" autocomplete="off" required="">
                                </div>
                              </div>  
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>NIC/B-form No <span style="font-size: x-small; font-weight: initial;" >(without dash -)</span> </label>
                              <input id="cNo" type="number" name="CNIC" placeholder="NIC/B-form No" class="form-control" autocomplete="off" oninput="validateCNIC(this)">
                                </div>
                                <script>
                          function validateCNIC(input) {
                              // Get the entered CNIC number
                              var cnicNumber = input.value;

                              // Check if the length is less than 14
                              if (cnicNumber.length < 13) {
                                  // Set the border color to red
                                  input.style.borderColor = 'red';
                              } else {
                                  // Reset the border color
                                  input.style.borderColor = ''; // Empty string resets to the default
                              }

                              // If you want to limit the input to 14 characters
                              if (cnicNumber.length > 13) {
                                  // Trim the input to 14 characters
                                  input.value = cnicNumber.slice(0, 14);
                              }
                          }
                          </script>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Date of birth<span>*</span></label>
                                  <input type="text" name="Date_of_B" id="Date_of_B" placeholder="dd mm yyyy" class="form-control datepicker" autocomplete="off" required="">
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Father Name<span>*</span></label>
                                  <input type="text" name="Father_name" id="Father_name" placeholder="Father Name" class="form-control" autocomplete="off" required="">
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Relation<span>*</span></label>
                                  <select name="" id="type" class="form-select"></select>
                                </div>
                              </div>

                              <div class=" text-end">
                                <input type="button" name=""style="background-color: darkblue;" type="button" id="save" class="btn text-white shadow float-right" value="Add" >
                                <input type="button" name=""style="background-color: red;" type="button" id="save" class="btn text-white shadow float-right" value="Back" onclick="back()">
                                <input style="background-color: darkblue;" type="button" onclick="backToSection2()" class="btn text-white shadow float-right" value="Next">
                              </div>
                            </div>
                          </div>
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                      </div>
                      <!-- Col-12 -->
                      <div class="col-12">
                        <div class="card card-success">
                          <div style="background-color: darkblue;" class="card-header  text-white fw-bold">
                            <div class="card-title">Dependents Details</div>
                          </div>
                        </div>
                          <div>
                                <table class="table bg-light">
                                  <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">NIC/B-form No</th>
                                        <th scope="col">Date of birth.</th>
                                        <th scope="col">Father Name</th>
                                        <th scope="col">Relation</th>
                                        <th scope="col">Update</th>
                                        <th scope="col">Delete</th>
                                      </tr>
                                  </thead>
                                    
                                    <tbody id="table-data">
                                  
                                  </tbody>
                                </table>
                            </div>
                      </div>
                    </div>
                  </div>
             </form>
              <!-- /.card -->

        </div>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Employee Transfer Update</h1>
                        <button type="button" class="btn-close btn btn-dange" style="background-color: #ff0505 !important; color: #fff !important;" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                      <form id="formdata" action="#" method="post">
                        <input type="text" class="form-control" hidden id="id_update" name="">
                        <div class="my-2">
                            <div class="form-group">
                              <label>Dependents Name<span>*</span></label>
                              <input type="text" name="Spouse_Name" id="Spouse_Name_update" placeholder="Name" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="my-2">
                            <div class="form-group">
                              <label>NIC/B-form No<span>*</span></label>
                              <input type="text" name="CNIC" id="CNIC_update" placeholder="NIC/B-form No" class="form-control" autocomplete="off" autocomplete="off" oninput="validateCNIC(this)" required="">
                            </div>
                          </div>
                          <div class="my-2">
                            <div class="form-group">
                              <label>Date of birth<span>*</span></label>
                              <input type="text" name="Date_of_B" id="Date_of_B_update" placeholder="dd mm yyyy" class="form-control datepicker" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="my-2">
                            <div class="form-group">
                              <label>Father name<span>*</span></label>
                              <input type="text" name="Father_name_update" id="Father_name_Update" placeholder="Father Name" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="my-2">
                            <div class="form-group">
                              <label>Relation<span>*</span></label>
                              <select name="type" id="type_update" class="form-select"></select>
                            </div>
                          </div>
                          
                          </form>
                        </div>
                      
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="updatenow">Update</button>
                      </div>
                    </div>
                  </div>
                </div>
    </div>
    </div>
    <script>
      $(document).ready(function() {
            // Initialize the datepicker with your desired format
            $(".datepicker").datepicker({
                dateFormat: 'dd mm yy'
            });
        });
     function backToSection2() {
        <?php $CNIC = $_GET['updat'];?>
        location.replace('profile.php?updat=<?php echo $CNIC?>#section8');
            }
            function back() {
        <?php $CNIC = $_GET['updat'];?>
        location.replace('Transfer.php?updat=<?php echo $CNIC?>#section6');
            }
            $(document).ready(function($) {  
           
              function type(){ // renamed the function here
        $.ajax({
            url : "ajex/dependertype - Copy.php",
            type:"POST",
            success : function(data){
                $("#type").html(data);
            }
        });
    }
      type();
      function type_update(){ // renamed the function here
        $.ajax({
            url : "ajex/dependertype - Copy.php",
            type:"POST",
            success : function(data){
                $("#type_update").html(data);
            }
        });
    }
      type_update();     
    function loadTable() {
        var see = "<?php echo $_GET['updat'];?>";
        $.ajax({
            url: "ajex/see-emp-Famely-ajex.php",
            type: "POST",
            data: { id: see },
            success: function(data) {
                $("#table-data").html(data);
            }
        });
    }
    loadTable();
 
    $("#save").on("click", function(e) {
    e.preventDefault();
    var employee_id = "<?php echo $_GET['updat']?>";
    var Spouse_Name = $("#Spouse_Name").val();
    var CNIC = $("#cNo").val(); // Corrected variable name
    var Date_of_B = $("#Date_of_B").val();
    var Father_name = $("#Father_name").val();
    var type = $("#type").val();
    
    if (type.trim() !== "" || Father_name.trim() !== "" || Date_of_B.trim() !== "" || CNIC.trim() !== "" || Spouse_Name.trim() !== "") {
        $.ajax({
            url: "ajex/Famelyinsert.php",
            type: "POST",
            data: { employee_id:employee_id, Spouse_Name:Spouse_Name, CNIC:CNIC, Date_of_B:Date_of_B, Father_name:Father_name, type:type },
            success: function(data) {
                alert(data)
                loadTable();
                $("#formdata").trigger("reset");
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log("AJAX Error:", textStatus, errorThrown);
            }
        });
    }
});

    $(document).on("click", "#delete",function(){
        var delet = $(this).data("did");
        $.ajax({
          url : "ajex/delete_famly_emp_ajax.php",
          type:"POST",
          data : {id : delet},
          success : function(data){
            if(data == 1){
            loadTable();
            }
            else{
              alert ("Can't Save Record");
            }
          }
        });
      });
      $(document).on("click", "#update", function() {
    var update = $(this).data("eid");

    $.ajax({
        url: "ajex/get_Famely_single_ajax.php",
        type: "POST",
        data: { id: update },
        success: function(data) {
            var famly = JSON.parse(data);
            $("#id_update").val(famly.id);
            $("#Spouse_Name_update").val(famly.Spouse_Name);
            $("#CNIC_update").val(famly.CNIC);
            $("#Date_of_B_update").val(famly.Date_of_B);
            $("#Father_name_Update").val(famly.Father_name);
            $("#type_update").val(famly.type); // Set selected value for the dropdown
        }
    });
});


      $("#updatenow").on("click",function(e){
        e.preventDefault();
        var id_update = $("#id_update").val();
        var Spouse_Name_update = $("#Spouse_Name_update").val();
        var CNIC_update = $("#CNIC_update").val();
        var Date_of_B_update = $("#Date_of_B_update").val();
        var Father_name_Update = $("#Father_name_Update").val();
        var type_update = $("#type_update").val();
        // alert(id_update);
        $.ajax({
          url:"ajex/ajax-update-employee-famly-allowance.php",
          type:"POST", 
          data:{id:id_update,Spouse_Name_update:Spouse_Name_update,CNIC_update:CNIC_update,Date_of_B_update:Date_of_B_update, Father_name_Update:Father_name_Update, type_update:type_update},
          success:function(data){
            if(data == 1){
            loadTable();
            }
            else{
              alert ("Can't Save Record");
            }
          } });
        });
});

</script>
</body>
</html>
<?php  }?>