<?php
session_start();
error_reporting(0);
// // links to database
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
<body>
    <?php include ('link/desigene/sidebar.php')?>
      <div id="main">
    <?php include('link/desigene/navbar.php')?>
        <div class="container-fluid py-5">
        <?php
      $CNIC = $_GET['updat'];
      $select = mysqli_query($conn,"SELECT * FROM `employeedata` WHERE `CNIC` ='$CNIC' ");
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
                      <h4>Employement Information</h4>
                  </div>
                </nav>
                <div class="row">
                   <div class="col-md-4 my-2">
                     <div class="form-group">
                       <label>Employement Group</label>
                       <h5><?php echo $see ['Employement_Group'];
                       $empclass = $see ['Employement_Group'];
                       ?></h5>
                     </div>
                   </div>
                   <div class="col-md-4 my-2">
                     <div class="form-group">
                       <label>Employee Class</label>
                       <h5><?php echo $see ['Employee_Class'];?></h5>
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
                       <label>Job Tiltle</label>
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
                          <th scope="col">Update</th>
                          <th scope="col">Delete</th>
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
            </div>
          </div>
          <?php 
          echo $empclass;
          if($empclass == 'WSSC CONTRACTUAL' || $empclass == 'WSSC CONTINGENT'){
            $wssc = 'block';
            $tma='none';
          } else if($empclass == 'TMA PERMANENT' || $empclass == 'TMA DAILY WAGES'){
            $tma = 'block';
            $wssc='none';
          }
        }?>
          <form id="formdata" action="#" method="post">
            <div id="section5" >
             <div class="row my-4">
               <!-- left column -->
               <div class="col-12" >
                 <div class="card card-success">
                   <div style="background-color: darkblue;" class="card-header  text-white fw-bold">
                     <div class="card-title">Employee Promotions</div>
                   </div>
                   <!-- /.card-header -->
                   <div class="card-body bg-light">
                     <!-- form start -->
                     <div class="row">
                       <div class="col-md-4 my-2" style="display:<?php echo $wssc?>;"> 
                         <div class="form-group">
                           <label>From Designation</label>
                           <select id="From_Designation" name="From_Designation" class="form-control select2">
                             <option value="">Select</option>
                             <option value="CONTINGENT" >CONTINGENT</option>
                             <option value="COVID-19" >COVID-19</option>
                             <option value="DAILY WAGE" >DAILY WAGE</option>
                             <option value="INTERNSHIP" >INTERNSHIP</option>
                             <option value="M–1" >M–1</option>
                             <option value="M–3" >M–3</option>
                             <option value="M–4" >M–4</option>
                             <option value="M–5" >M–5</option>
                             <option value="M–6" >M–6</option>
                             <option value="M–7" >M–7</option>
                             <option value="S–1" >S–1</option>
                             <option value="S–2" >S–2</option>
                             <option value="S–3" >S–3</option>
                             <option value="S–4" >S–4</option>
                             <option value="STREAM" >STREAM</option>
                           </select>
                         </div>
                       </div>
                       <div class="col-md-4 my-2" style="display:<?php echo $wssc?>;">
                         <div class="form-group">
                           <label>To Designation</label>
                           <select id="To_Designation" name="To_Designation" class="form-control select2">
                            <option value="">Select</option>
                            <option value="CONTINGENT" >CONTINGENT</option>
                            <option value="COVID-19" >COVID-19</option>
                            <option value="DAILY WAGE" >DAILY WAGE</option>
                            <option value="INTERNSHIP" >INTERNSHIP</option>
                            <option value="M–1" >M–1</option>
                            <option value="M–3" >M–3</option>
                            <option value="M–4" >M–4</option>
                            <option value="M–5" >M–5</option>
                            <option value="M–6" >M–6</option>
                            <option value="M–7" >M–7</option>
                            <option value="S–1" >S–1</option>
                            <option value="S–2" >S–2</option>
                            <option value="S–3" >S–3</option>
                            <option value="S–4" >S–4</option>
                            <option value="STREAM" >STREAM</option>
                          </select>
                         </div>
                       </div>
                       <div class="col-md-4 my-2" style="display:<?php echo $tma?>">
                         <div class="form-group">
                           <label>From BPS</label>
                           <select name="From_BPS" id="From_BPS" class="form-control select2">
                             <option value="">Select</option>
                             <option value="BPS-2" >BPS-2</option>
                             <option value="BPS-3" >BPS-3</option>
                             <option value="BPS-4" >BPS-4</option>
                             <option value="BPS-5" >BPS-5</option>
                             <option value="BPS-6" >BPS-6</option>
                             <option value="BPS-7" >BPS-7</option>
                             <option value="BPS-9" >BPS-9</option>
                             <option value="BPS-11" >BPS-11</option>
                             <option value="BPS-14" >BPS-14</option>
                             <option value="BPS-16" >BPS-16</option>
                             <option value="BPS-17" >BPS-17</option>
                           </select>
                         </div>
                       </div>
                       <div class="col-md-4 my-2" style="display:<?php echo $tma?>">
                         <div class="form-group">
                           <label>To BPS</label>
                           <select name="From_BPS" id="From_BPS" class="form-control select2">
                             <option value="">Select</option>
                             <option value="BPS-2" >BPS-2</option>
                             <option value="BPS-3" >BPS-3</option>
                             <option value="BPS-4" >BPS-4</option>
                             <option value="BPS-5" >BPS-5</option>
                             <option value="BPS-6" >BPS-6</option>
                             <option value="BPS-7" >BPS-7</option>
                             <option value="BPS-9" >BPS-9</option>
                             <option value="BPS-11" >BPS-11</option>
                             <option value="BPS-14" >BPS-14</option>
                             <option value="BPS-16" >BPS-16</option>
                             <option value="BPS-17" >BPS-17</option>
                           </select>
                         </div>
                       </div>
                       <div class="col-md-4 my-2">
                         <div class="form-group">
                           <label>Promotion Date</label>
                           <input type="Date" name="Promotion_Date" id="Promotion_Date" class="form-control" autocomplete="off">
                         </div>
                       </div>
                       <div class="col-md-4 my-2">
                         <div class="form-group">
                           <label>Promotion Number</label>
                           <input type="text" name="Promotion_Number" id="Promotion_Number" placeholder="Promotion Number" class="form-control" autocomplete="off">
                         </div>
                       </div>
                       <div class="col-md-4 my-2">
                         <div class="form-group">
                           <label>Department</label>
                           <input type="text" name="Department1" id="Department1" placeholder="Department" class="form-control" autocomplete="off">
                         </div>
                       </div>
                       <div class="col-md-4 my-2">
                         <div class="form-group">
                           <label>Acting</label>
                           <select name="Acting" id="Acting" class="form-control">
                             <option>Choose</option>
                             <option>Regular</option>
                             <option>OPS</option>
                           </select>
                         </div>
                       </div>
                       <div class="col-md-4 my-2">
                         <div class="form-group">
                           <label>Remarks</label>
                           <input type="text" name="Remarks" id="Remarks" placeholder="Remarks" class="form-control" autocomplete="off">
                         </div>
                       </div>
                       <div class="col-md-4 my-2">
                         <div class="form-group">
                           <label>File</label>
                           <input type="file" name="file" id="file" placeholder="file" class="form-control" autocomplete="off">
                         </div>
                       </div>
                       <div class=" text-end">
                         <input type="button" name=""style="background-color: darkblue;" type="button" id="save" class="btn text-white shadow float-right" value="Add" >
                         <input style="background-color: darkblue;" type="button" onclick="backToSection2()" class="btn text-white shadow float-right" value="Next">
                       </div>                    </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
          </form>
          <!-- /.card-body -->
          <div class="col-12 bg-white mt-5 px-2"> 
           <nav class="navbar bg-white">
             <div class="container-fluid">
               <h4>Training Information</h4>
             </div>
           </nav>
            <div class="table-responsive" >
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
                   <th scope="col">Update</th>
                   <th scope="col">Delete</th>
                 </tr>
               </thead>
               <tbody id="table-data">
               </tbody>
              </table>
            </div>
          </div> 
          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Promotion Update</h1>
                  <button type="button" class="btn-close btn btn-dange" style="background-color: #ff0505 !important; color: #fff !important;" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form id="formdata" action="#" method="post">
                    <div class="row">
                       <div class="my-2" style="display:<?php echo $wssc?>;"> 
                         <div class="form-group">
                           <label>From Designation</label>
                           <select id="From_Designation_update" name="From_Designation_update" class="form-control select2">
                             <option value="">Select</option>
                             <option value="M–1" >M–1</option>
                             <option value="M–3" >M–3</option>
                             <option value="M–4" >M–4</option>
                             <option value="M–5" >M–5</option>
                             <option value="M–6" >M–6</option>
                             <option value="M–7" >M–7</option>
                             <option value="S–1" >S–1</option>
                             <option value="S–2" >S–2</option>
                             <option value="S–3" >S–3</option>
                             <option value="S–4" >S–4</option>
                             <option value="STREAM" >STREAM</option>
                           </select>
                         </div>
                       </div>
                       <div class="my-2" style="display:<?php echo $wssc?>;">
                         <div class="form-group">
                           <label>To Designation</label>
                           <select id="To_Designation_update" name="To_Designation_update" class="form-control select2">
                            <option value="">Select</option>
                            <option value="M–1" >M–1</option>
                            <option value="M–3" >M–3</option>
                            <option value="M–4" >M–4</option>
                            <option value="M–5" >M–5</option>
                            <option value="M–6" >M–6</option>
                            <option value="M–7" >M–7</option>
                            <option value="S–1" >S–1</option>
                            <option value="S–2" >S–2</option>
                            <option value="S–3" >S–3</option>
                            <option value="S–4" >S–4</option>
                            <option value="STREAM" >STREAM</option>
                          </select>
                         </div>
                       </div>
                       <div class="my-2" style="display:<?php echo $tma?>">
                         <div class="form-group">
                           <label>From BPS</label>
                           <select name="From_BPS_update" id="From_BPS_update" class="form-control select2">
                             <option value="">Select</option>
                             <option value="BPS-2" >BPS-2</option>
                             <option value="BPS-3" >BPS-3</option>
                             <option value="BPS-4" >BPS-4</option>
                             <option value="BPS-5" >BPS-5</option>
                             <option value="BPS-6" >BPS-6</option>
                             <option value="BPS-7" >BPS-7</option>
                             <option value="BPS-9" >BPS-9</option>
                             <option value="BPS-11" >BPS-11</option>
                             <option value="BPS-14" >BPS-14</option>
                             <option value="BPS-16" >BPS-16</option>
                             <option value="BPS-17" >BPS-17</option>
                           </select>
                         </div>
                       </div>
                       <div class="my-2" style="display:<?php echo $tma?>">
                         <div class="form-group">
                           <label>To BPS</label>
                           <select name="ToBps_update" id="ToBps_update" class="form-control select2">
                             <option value="">Select</option>
                             <option value="BPS-2" >BPS-2</option>
                             <option value="BPS-3" >BPS-3</option>
                             <option value="BPS-4" >BPS-4</option>
                             <option value="BPS-5" >BPS-5</option>
                             <option value="BPS-6" >BPS-6</option>
                             <option value="BPS-7" >BPS-7</option>
                             <option value="BPS-9" >BPS-9</option>
                             <option value="BPS-11" >BPS-11</option>
                             <option value="BPS-14" >BPS-14</option>
                             <option value="BPS-16" >BPS-16</option>
                             <option value="BPS-17" >BPS-17</option>
                           </select>
                         </div>
                       </div>
                      <div class=" my-2">
                        <div class="form-group">
                          <label>Promotion Date</label>
                          <input type="Date" name="Promotion_Date" id="Promotion_Date_update" class="form-control" autocomplete="off">
                        </div>
                      </div>
                      <div class=" my-2">
                        <div class="form-group">
                          <label>Promotion Number</label>
                          <input type="text" name="Promotion_Number" id="Promotion_Number_update" placeholder="Promotion Number" class="form-control" autocomplete="off">
                        </div>
                      </div>
                      <div class=" my-2">
                        <div class="form-group">
                          <label>Department</label>
                          <input type="text" name="Department1" id="Department1_update" placeholder="Department" class="form-control" autocomplete="off">
                        </div>
                      </div>
                      <div class=" my-2">
                        <div class="form-group">
                          <label>Acting</label>
                          <select name="Acting" id="Acting_update" class="form-control">
                            <option value="CHOOSE" >Choose</option>
                            <option value="REGULAR" >Regular</option>
                            <option value="OPS" >OPS</option>
                          </select>
                        </div>
                      </div>
                      <div class=" my-2">
                        <div class="form-group">
                          <label>Remarks</label>
                          <input type="text" name="Remarks" id="Remarks_update" placeholder="Remarks" class="form-control" autocomplete="off">
                        </div>
                      </div>
                      <div class="my-2">
                         <div class="form-group">
                           <label>File</label>
                           <input type="file" name="file" id="file" placeholder="file" class="form-control" autocomplete="off">
                         </div>
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
        <?php include('../link/desigene/script.php') ?>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(function() {
      $(".select2").select2();
    });
      function backToSection2() {
        <?php $CNIC = $_GET['updat'];?>
        location.replace('Transfer.php?updat=<?php echo $CNIC?>#section6');
            }
      $(document).ready(function($) {       
    function loadTable() {
        var see = "<?php echo $_GET['updat'];?>";
        $.ajax({
            url: "ajex/see-emp-Promot-ajex.php",
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
    var employee_id = "<?php echo $_GET['updat']; ?>";
    var From_Designation = $("#From_Designation").val();
    var To_Designation = $("#To_Designation").val();
    var From_BPS = $("#From_BPS").val();
    var ToBps = $("#ToBps").val();
    var Promotion_Date = $("#Promotion_Date").val();
    var Promotion_Number = $("#Promotion_Number").val();
    var Department1 = $("#Department1").val();
    var Acting = $("#Acting").val();
    var Remarks = $("#Remarks").val();
    
    // Create a FormData object
    var formData = new FormData();
    formData.append('employee_id', employee_id);
    formData.append('From_Designation', From_Designation);
    formData.append('To_Designation', To_Designation);
    formData.append('From_BPS', From_BPS);
    formData.append('ToBps', ToBps);
    formData.append('Promotion_Date', Promotion_Date);
    formData.append('Promotion_Number', Promotion_Number);
    formData.append('Department1', Department1);
    formData.append('Acting', Acting);
    formData.append('Remarks', Remarks);
    
    // Append the file to the FormData object
    formData.append('file', $('#file')[0].files[0]);

    $.ajax({
        url: "ajex/insert_Promotion.php",
        type: "POST",
        data: formData,
        processData: false, // Don't process the data (needed for FormData)
        contentType: false, // Don't set contentType
        success: function(data) {
             if(data == 0.1){
              alert("Can't Save Image");
            }
            if (data == 1) {
                loadTable();
                $("#formdata").trigger("reset");
            }
             else {
                alert("Can't Save Record");
            }
           
            
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log("AJAX Error:", textStatus, errorThrown);
        }
    });
});

    $(document).on("click", "#delete",function(){
        var delet = $(this).data("did");
      // alert(update);
        $.ajax({
          url : "ajex/delete_promot_emp_ajax.php",
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
        url: "ajex/get_Promot_single_ajax.php",
        type: "POST",
        data: { id: update },
        success: function(data) {
            var Promotion = JSON.parse(data);
            $("#id_update").val(Promotion.id);
            $("#From_Designation_update").val(Promotion.From_Designation);
            $("#To_Designation_update").val(Promotion.To_Designation);
            $("#From_BPS_update").val(Promotion.From_BPS);
            $("#ToBps_update").val(Promotion.ToBps);
            $("#Promotion_Date_update").val(Promotion.Promotion_Date);
            $("#Promotion_Number_update").val(Promotion.Promotion_Number);
            $("#Department1_update").val(Promotion.Department1);

            // Set selected value for Acting dropdown
            $("#Acting_update").val(Promotion.Acting);

            // Update the Remarks textarea
            $("#Remarks_update").val(Promotion.Remarks);
        }
    });
});
$("#updatenow").on("click", function(e) {
    e.preventDefault();

    // Get form data
    var formData = new FormData($("#formdata")[0]);
    // Additional form fields
    formData.append("From_Designation_update", $("#From_Designation_update").val());
    formData.append("To_Designation_update", $("#To_Designation_update").val());
    formData.append("From_BPS_update", $("#From_BPS_update").val());
    formData.append("ToBps_update", $("#ToBps_update").val());
    formData.append("Promotion_Date_update", $("#Promotion_Date_update").val());
    formData.append("Promotion_Number_update", $("#Promotion_Number_update").val());
    formData.append("Department1_update", $("#Department1_update").val());
    formData.append("Acting_update", $("#Acting_update").val());
    formData.append("Remarks_update", $("#Remarks_update").val());
    formData.append("id_update", $("#id_update").val());

    $.ajax({
        url: "ajex/ajax-update-employee-Promotion-allowance.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
          if(data == 0.1){
              alert("Can't Save Image");
            }
            if (data == 1) {
                loadTable();
                $("#formdata").trigger("reset");
            }
             else {
                alert("Can't Save Record");
            }
        }
    });
});

});

  </script>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

<?php include('link/desigene/script.php')?>
</body>
</html>
<?php }?>