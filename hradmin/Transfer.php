<?php
session_start();
error_reporting(0);
// links to database
include('link/desigene/db.php');
if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber']) || $_SESSION['Designation'] != 'HR manager') {
  // Log the unauthorized access attempt for auditing purposes
  error_log("Unauthorized access attempt. User: {$_SESSION['loginid']}");
  
  // Redirect to the logout page
  header("Location: ../logout.php");
  exit; // Ensure that the script stops execution after the header redirection
}else{

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <?php include ('link/links.php')?>
</head>
<style>
label span{
  color:#ff0505;
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
                  <label>Permanent Address</label>
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
                  <h5><</h5>
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
                 <th scope="col">file</th>
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
            </div>
          </div>
        </div>
          <?php }?>
        <div class="container-fluid py-5">
             <form id="formdata" action="" method="post">
             <div id="section6">
                <div class="row my-4">
                  <!-- left column -->
                  <div class="col-md-12">
                    <div class="card card-success">
                      <div style="background-color: darkblue;" class="card-header  text-white fw-bold">
                        <div class="card-title">Employee Transfer</div>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body bg-light">
                        <div class="row">
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>Transfer Order Number<span>*</span></label>
                              <input type="text" name="Transfer_Order_Number" id="Transfer_Order_Number" placeholder="Transfer Order Number" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>Order Date</label>
                              <input type="text" name="Transfer_Date" id="Transfer_Date" class="form-control datepicker" placeholder="dd mm yyyy" autocomplete="off" required="">
                            </div>
                          </div>  
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>From Designation</label>

                              <select name="Designation" id="Designation" class="form-select" >

                              </select>
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>From Grade</label>
                              <select name="BPS" class="form-select" id="BPS"></select>
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>From Department</label>
                              <select name="From_Department" id="From_Department" class="form-select"></select>
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>From Station</label>
                              <input type="text" name="From_Station" id="From_Station" placeholder="From  Station" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label> To Designation</label>
                              <select name="To_Project" id="To_Project" class="form-select"></select>
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label> To Grade</label>
                              <select name="To_Grade" id="To_Grade" class="form-select"></select>
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label> To Department</label>
                              <select name="To_Department" id="To_Department" class="form-select"></select>
                            </div>
                          </div>                          
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>To Station</label>
                              <input type="text" name="To_Station" id="To_Station" placeholder="To Station" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>Arrival Date</label>
                              <input type="text" name="Worked_From" id="Worked_From" placeholder="dd-mm-yyy"  class="form-control datepicker" autocomplete="off" required="">
                            </div>
                          </div>
                         
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>File</label>
                              <input type="file" name="file" id="file" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class=" text-end">
                            <input type="button" name=""style="background-color: darkblue;" type="button" id="save" class="btn text-white shadow float-right" value="Add" >
                            <input style="background-color: red;" type="button" onclick="back()" class="btn text-white shadow float-right" value="Back">
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
                        <div class="card-title">Employee Promotions</div>
                      </div>
                    </div>
                       <div class="table-responsive" >
                            <table class="table bg-light">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Transfer Order Number</th>
                                    <th scope="col">Order Date</th>
                                    <th scope="col">From Designation</th>
                                    <th scope="col">From Grade</th>
                                    <th scope="col">From Department</th>
                                    <th scope="col">From Station</th>
                                    <th scope="col">To Designation</th>
                                    <th scope="col">To Grade</th>
                                    <th scope="col">To Department</th>
                                    <th scope="col">To Station</th>
                                    <th scope="col">Arrival Date</th>
                                    <th scope="col">File</th>
                                    <th scope="col">Update</th>
                                    <th scope="col">Delete</th>
                                </tr></thead>
                                
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
                      <div class="my-2">
                            <div class="form-group">
                              <label>Transfer Order Number </label>
                              <input type="text" name="Transfer_Order_Number" id="Transfer_Order_Number_update" placeholder="Transfer Order Number" class="form-control" autocomplete="off" required="">
                              <input type="text" class="form-control" hidden id="id_update" name="">
                            </div>
                          </div>  
                          <div class="my-2">
                            <div class="form-group">
                              <label>Order Date</label>
                              <input type="text" name="Worked_From" id="Worked_From_update" placeholder="dd mm yyyy" class="form-control datepicker" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="my-2">
                            <div class="form-group">
                              <label>From Designation</label>
                              <select name="Designation_update" id="Designation_update" class="form-select"></select>
                            </div>
                          </div>
                          <div class="my-2">
                            <div class="form-group">
                              <label>From Grade</label>
                              <select name="BPS_update" id="BPS_update" class="form-select"></select>
                            </div>
                          </div>
                          <div class="my-2">
                            <div class="form-group">
                              <label>From Department</label>
                              <select name="From_Department_update" id="From_Department_update" class="form-select"></select>                              
                            </div>
                          </div>
                          <div class="my-2">
                            <div class="form-group">
                              <label>From Station</label>
                              <input type="text" name="From_Station" id="From_Station_update" placeholder="From  Station" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="my-2">
                            <div class="form-group">
                              <label> To Designation</label>
                              <select name="To_Project_update" id="To_Project_update" class="form-select"></select>
                            </div>
                          </div>
                          <div class=" my-2">
                            <div class="form-group">
                              <label> To Grade</label>
                              <select name="To_Grade_update" id="To_Grade_update" class="form-select"></select>
                            </div>
                          </div>                          
                          <div class=" my-2">
                            <div class="form-group">
                              <label>To Department</label>
                              <select name="To_Department_update" id="To_Department_update" class="form-select"></select>
                            </div>
                          </div>
                          <div class="my-2">
                            <div class="form-group">
                              <label>To Station</label>
                              <input type="text" name="To_Station" id="To_Station_update" placeholder="To Station" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          
                          <div class="my-2">
                            <div class="form-group">
                              <label>Arrival Date</label>
                              <input type="text" name="Transfer_Date" id="Transfer_Date_update" class="form-control datepicker" placeholder="dd mm yyyy" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="my-2">
                            <div class="form-group">
                              <label>File</label>
                              <input type="file" name="file_update" id="file_update" class="form-control" autocomplete="off" required="">
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
   
    <script>
      $(document).ready(function() {
            // Initialize the datepicker with your desired format
            $(".datepicker").datepicker({
                dateFormat: 'dd mm yy'
            });
        });
      function backToSection2() {
        <?php $CNIC = $_GET['updat'];?>
        location.replace('famly.php?updat=<?php echo $CNIC?>#section7');
            }
      function back() {<?php $CNIC = $_GET['updat'];?>location.replace('Promotions.php?updat=<?php echo $CNIC?>#section7');}

            $(document).ready(function($) {       
    function loadTable() {
        var see = "<?php echo $_GET['updat'];?>";
        $.ajax({
            url: "ajex/see-emp-Tranfer-ajex.php",
            type: "POST",
            data: { id: see },
            success: function(data) {
                $("#table-data").html(data);
            }
        });
    }
    loadTable();

    function From_Department(){
        $.ajax({
          url : "ajex/Department - Copy.php",
          type:"POST",
          success : function(data){
            $("#From_Department").html(data);
          }
        });
      }
      From_Department();
      function To_Department(){
        $.ajax({
          url : "ajex/Department - Copy.php",
          type:"POST",
          success : function(data){
            $("#To_Department").html(data);
          }
        });
      }
      To_Department();
      function From_Department_update(){
        $.ajax({
          url : "ajex/Department - Copy.php",
          type:"POST",
          success : function(data){
            $("#From_Department_update").html(data);
          }
        });
      }
      From_Department_update();
      function To_Department_update(){
        $.ajax({
          url : "ajex/Department - Copy.php",
          type:"POST",
          success : function(data){
            $("#To_Department_update").html(data);
          }
        });
      }
      To_Department_update();
    function Designation(){
     $.ajax({
       url : "ajex/Job_Tiltle - Copy.php",
       type:"POST",
       success : function(data){
         console.log(data); // Log the response to the console
         $("#Designation").html(data);
       }
     });
   }Designation();

   function To_Project(){
     $.ajax({
       url : "ajex/Job_Tiltle - Copy.php",
       type:"POST",
       success : function(data){
         console.log(data); // Log the response to the console
         $("#To_Project").html(data);
       }
     });
   }To_Project();
   function Designation_update(){
     $.ajax({
       url : "ajex/Job_Tiltle - Copy.php",
       type:"POST",
       success : function(data){
         console.log(data); // Log the response to the console
         $("#Designation_update").html(data);
       }
     });
   }Designation_update();
   function To_Project_update(){
     $.ajax({
       url : "ajex/Job_Tiltle - Copy.php",
       type:"POST",
       success : function(data){
         console.log(data); // Log the response to the console
         $("#To_Project_update").html(data);
       }
     });
   }To_Project_update();
 


   function BPS(){
        $.ajax({
          url : "ajex/Grade - Copy.php",
          type:"POST",
          success : function(data){
            $("#BPS").html(data);
          }
        });
      }
      BPS();
      
      function To_Grade(){
        $.ajax({
          url : "ajex/Grade - Copy.php",
          type:"POST",
          success : function(data){
            $("#To_Grade").html(data);
          }
        });
      }
      To_Grade();
      
      function BPS_update(){
        $.ajax({
          url : "ajex/Grade - Copy.php",
          type:"POST",
          success : function(data){
            $("#BPS_update").html(data);
          }
        });
      }
      BPS_update();
      
      function To_Grade_update(){
        $.ajax({
          url : "ajex/Grade - Copy.php",
          type:"POST",
          success : function(data){
            $("#To_Grade_update").html(data);
          }
        });
      }
      To_Grade_update();




    $("#save").on("click", function(e) {
    e.preventDefault();

    var employee_id = "<?php echo $_GET['updat']; ?>";
    var Transfer_Order_Number = $("#Transfer_Order_Number").val();
    var Transfer_Date = $("#Transfer_Date").val();
    var Designation = $("#Designation").val();
    var BPS = $("#BPS").val();
    var From_Department = $("#From_Department").val();
    var From_Station = $("#From_Station").val();
    var To_Project = $("#To_Project").val();
    var To_Grade = $("#To_Grade").val();
    var To_Department = $("#To_Department").val();
    var To_Station = $("#To_Station").val();
    var Worked_From = $("#Worked_From").val();
    var file = $("#file")[0].files[0]; // Get the selected file

    var formData = new FormData();
    formData.append('employee_id', employee_id);
    formData.append('Transfer_Order_Number', Transfer_Order_Number);
    formData.append('Transfer_Date', Transfer_Date);
    formData.append('Designation', Designation);
    formData.append('BPS', BPS);
    formData.append('From_Department', From_Department);
    formData.append('From_Station', From_Station);
    formData.append('To_Project', To_Project);
    formData.append('To_Grade', To_Grade);
    formData.append('To_Department', To_Department);
    formData.append('To_Station', To_Station);
    formData.append('Worked_From', Worked_From);
    formData.append('file', file); // Append the file to the formData object
    if (Transfer_Order_Number.trim() !== "") {

    $.ajax({
        url: "ajex/Transferinsert.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
         alert(data);
    loadTable();
    $("#formdata").trigger("reset");

        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log("AJAX Error:", textStatus, errorThrown);
        }
    });}
});

    $(document).on("click", "#delete",function(){
        var delet = $(this).data("did");
        $.ajax({
          url : "ajex/delete_Transfer_emp_ajax.php",
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
      });$(document).on("click", "#update", function() {
    var update = $(this).data("eid");

    $.ajax({
        url: "ajex/get_Transfer_single_ajax.php",
        type: "POST",
        data: { id: update },
        success: function(data) {
            var Transfer = JSON.parse(data);

            // Set values for text inputs
            $("#id_update").val(Transfer.id);
            $("#Transfer_Order_Number_update").val(Transfer.Transfer_Order_Number);
            $("#Worked_From_update").val(Transfer.Worked_From);
            $("#From_Station_update").val(Transfer.From_Station);
            $("#To_Station_update").val(Transfer.To_Station);
            $("#Transfer_Date_update").val(Transfer.Transfer_Date);

            // Set values for dropdowns
            $("#Designation_update option[value='" + Transfer.Designation + "']").prop('selected', true);
            $("#BPS_update option[value='" + Transfer.BPS + "']").prop('selected', true);
            $("#From_Department_update option[value='" + Transfer.From_Department + "']").prop('selected', true);
            $("#To_Project_update option[value='" + Transfer.To_Project + "']").prop('selected', true);
            $("#To_Grade_update option[value='" + Transfer.To_Grade + "']").prop('selected', true);
            $("#To_Department_update option[value='" + Transfer.To_Department + "']").prop('selected', true);
            $("#file_update").val(""); // Clear the file input
        }
    });
});

$("#updatenow").on("click", function(e) {
    e.preventDefault();
    var formData = new FormData($("#formdata")[0]);
    formData.append("id", $("#id_update").val());
    formData.append("Transfer_Order_Number_update", $("#Transfer_Order_Number_update").val());
    formData.append("Designation_update", $("#Designation_update").val());
    formData.append("BPS_update", $("#BPS_update").val());
    formData.append("From_Department_update", $("#From_Department_update").val());
    formData.append("To_Project_update", $("#To_Project_update").val());
    formData.append("From_Station_update", $("#From_Station_update").val());
    formData.append("To_Station_update", $("#To_Station_update").val());
    formData.append("To_Grade_update", $("#To_Grade_update").val());
    formData.append("To_Department_update", $("#To_Department_update").val());
    formData.append("Worked_From_update", $("#Worked_From_update").val());
    formData.append("Transfer_Date_update", $("#Transfer_Date_update").val());
    formData.append("file_update", $("#file_update")[0].files[0]); // Get the file object

    $.ajax({
        url: "ajex/ajax-update-employee-Transfer-allowance.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
            if (data == 0.1) {
                alert("Can't Save Image");
            } else if (data == 1) {
                loadTable();
                $("#formdata").trigger("reset");
            } else {
                alert("Can't Save Record");
            }
        }
    });
});

});

</script>

</body>
</html>
<?php }?>