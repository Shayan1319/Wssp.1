<?php
session_start();
error_reporting(0);
// links to database

if ($_SESSION['loginid'] == 0) {
?>   
    <script>
        location.replace('../logout.php')
    </script>
<?php
}
?><?php
include('../link/desigene/db.php');

if(isset($_POST['submit']))
{
$CNIC = $_GET['updat'];
$Transfer_Order_Number= $_POST['Transfer_Order_Number'];
$Designation= $_POST['Designation'];
$BPS= $_POST['BPS'];
$From_Department= $_POST['From_Department'];
$To_Project= $_POST['To_Project'];
$From_Station= $_POST['From_Station'];
$To_Station= $_POST['To_Station'];
$Worked_From= $_POST['Worked_From'];
$Transfer_Date= $_POST['Worked_From'];
$insertquery = "INSERT INTO `$CNIC d`( `Transfer_Order_Number`, `Designation`, `BPS`, `From_Department`, `To_Project`, `From_Station`, `To_Station`, `Worked_From`, `Transfer_Date`) VALUES ('$Transfer_Order_Number','$Designation','$BPS','$From_Department','$To_Project','$From_Station','$To_Station','$Worked_From','$Transfer_Date')";
$query= mysqli_query($conn,$insertquery);
if ($query)
{echo '<script>alert( "Data Insertaed");</script>';
    }

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
        <?php
      $CNIC = $_GET['updat'];
      $select = mysqli_query($conn,"SELECT * FROM `employeeinfo` WHERE `CNIC` ='$CNIC' ");
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
                      <h4>Employement Information</h4>
                  </div>
                </nav>
                <div class="row">
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Employement Group</label>
                                    <h5><?php echo $see ['Employement_Group'] ?><?php echo $see ['EmpGrupTma'] ?></h5>
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Employee Class</label>
                                    <h5><?php echo $see ['Employee_Class_tma'] ?><?php echo $see ['Employee_Class_tma'] ?></h5>
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Employee Sub Group</label>
                                    <h5><?php echo $see ['Employee_Group'] ?><?php echo $see ['Employee_Group_tma'] ?></h5>
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Employee Sub Group</label>
                                    <h5><?php echo $see ['Employee_Sub_Group'] ?><?php echo $see ['Employee_Sub_Group_tma'] ?></h5>
                                  
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Employee Quota</label>
                                    <h5><?php echo $see ['Employee_Quota'] ?><?php echo $see ['Employee_Quota_tma'] ?></h5>
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Grade</label>
                                    <h5><?php echo $see ['Grade_tma'] ?><?php echo $see ['Grande_tma'] ?></h5>
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Department</label>
                                    <h5><?php echo $see ['Department'] ?><?php echo $see ['Department_name'] ?></h5>
                                </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Job Tiltle</label>
                                    <h5><?php echo $see ['Job_Tiltle'] ?><?php echo $see ['Job_Tiltle_tma'] ?></h5>
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Salary Mode</label>
                                    <h5><?php echo $see ['Salary_Mode'] ?><?php echo $see ['Salary_Mode_tma'] ?></h5>
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Status</label>
                                    <h5><?php echo $see ['Employee_Status'] ?><?php echo $see ['Status_tma'] ?></h5>
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Employee NO</label>
                                    <h5><?php echo $see ['EmployeeNowssp'] ?><?php echo $see ['EmployeeNo_tma'] ?></h5>
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Employee Manager</label>
                                    <h5><?php echo $see ['Employee_Manager'] ?><?php echo $see ['Employee_Manager_tma'] ?></h5>
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Joining Date</label>
                                    <h5><?php echo $see ['Joining_Date'] ?><?php echo $see ['Joining_Date_tma'] ?></h5>
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Contract Expiry Date</label>
                                    <h5><?php echo $see ['Contract_Expiry_Date'] ?><?php echo $see ['Contract_Expiry_Date_tma'] ?></h5>
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Last Working Date</label>
                                    <h5><?php echo $see ['Last_Working_Date'] ?><?php echo $see ['Last_Working_Day'] ?></h5>
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Attendance Supervisor</label>
                                    <h5><?php echo $see ['Attendance_Supervisor'] ?><?php echo $see ['Attendance_Supervisor_tma'] ?></h5>
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Duty Location</label>
                                    <h5><?php echo $see ['Duty_Location'] ?><?php echo $see ['Duty_Location_tma'] ?></h5>
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Duty Point</label>
                                    <h5><?php echo $see ['Duty_Point'] ?><?php echo $see ['Duty_Point_tma'] ?></h5>
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
                        <th scope="col">CV</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php   $CNIC = $_GET['updat'];
                      $select = mysqli_query($conn,"SELECT * FROM `$CNIC a`");
                      while($see=mysqli_fetch_array($select))
                      {
                      ?>
                      <tr>
                        <th scope="row">1</th>
                        <td><?php echo $see ['Qualification'] ?></td>
                        <td><?php echo $see ['GradeDivision'] ?></td>
                        <td><?php echo $see ['Passing_Year_of_Degree'] ?></td>
                        <td><?php echo $see ['Last_Institute'] ?></td>
                        <td><?php echo $see ['PEC_Registration'] ?></td>
                        <td><?php echo $see ['Institute_AddressCV'] ?></td>
                        <td><?php echo $see ['Major_Subject'] ?></td>
                        <td><a href="../CV/<?php echo $see ['CV'] ?>"></a></td>
                        <td><a href=""><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td><a href=""><i class="fa-solid fa-trash"></i></a></td>
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
                                </tr></thead>
                                
                                <tbody>
                                <?php   $CNIC = $_GET['updat'];
                                  $select = mysqli_query($conn,"SELECT * FROM `$CNIC b`");
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
                                    <td><?php echo $see ['From_Date'] ?></td>
                                    <td><?php echo $see ['To_Date'] ?></td>
                                    <td><?php echo $see ['Duration'] ?></td>
                                    <td><a href=""><i class="fa-solid fa-pen-to-square"></i></a></td>
                                    <td><a href=""><i class="fa-solid fa-trash"></i></a></td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    
              </div>
               <div class="col-12 bg-white mt-5 px-2">
                <nav class="navbar bg-white">
                  <div class="container-fluid">
                      <h4>Promotions Info</h4>
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
                                    <th scope="col">To BPS</th>
                                    <th scope="col">Promotion Date</th>
                                    <th scope="col">Promotion Number</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Acting</th>
                                    <th scope="col">Remarks</th>
                                    <th scope="col">Update</th>
                                    <th scope="col">Delete</th>
                                </tr></thead>
                                
                                <tbody>
                                <?php   $CNIC = $_GET['updat'];
                                  $select = mysqli_query($conn,"SELECT * FROM `$CNIC c`");
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
                                    <td><?php echo $see ['Acting'] ?>"</td>
                                    <td><?php echo $see ['Remarks'] ?></td>
                                    <td><a href=""><i class="fa-solid fa-pen-to-square"></i></a></td>
                                    <td><a href=""><i class="fa-solid fa-trash"></i></a></td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
              </div>
             <!--  <div class="col-12 bg-white mt-5 px-2">
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
            <div class="col-12 bg-white mt-5 px-2">
                  <nav class="navbar bg-white">
                  <div class="container-fluid">
                      <h4>Family Info</h4>
                  </div>
                  </nav>
                  <div class="row">
                    
                  </div>
              </div>
            -->

            </div>

          </div>
          <?php }?>
        <div class="container-fluid py-5">
             <form action="" method="post">
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
                              <label>Transfer Order Number </label>
                              <input type="text" name="Transfer_Order_Number" placeholder="Transfer Order Number" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>  
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>Designation</label>
                              <input type="text" name="Designation" placeholder="Designation" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>BPS</label>
                              <input type="text" name="BPS" placeholder="From BPS" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>From Department</label>
                              <input type="text" name="From_Department" placeholder="From Deparment" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label> To Project</label>
                              <input type="text" name="To_Project" placeholder="To Project" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>From Station</label>
                              <input type="text" name="From_Station" placeholder="From  Station" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>To Station</label>
                              <input type="text" name="To_Station" placeholder="To Station" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>Worked From</label>
                              <input type="text" name="Worked_From" placeholder="Worked From" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>Transfer Date</label>
                              <input type="Date" name="Transfer_Date" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="col-md-12 text-end mt-2">
                          <button style="background-color: darkblue;" name="submit" type="submit" class="btn text-white shadow float-right"><i class="fa-solid fa-plus"></i></button>
                            <input style="background-color: darkblue;" type="button" onclick="backToSection2()" class="btn text-white shadow float-right" value="Skip">
                            <input type="button"  onclick="backToSection2()"  style="background-color: darkblue;" class="btn text-white shadow float-right" value="Submit" name="" id="">
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
                                  $select = mysqli_query($conn,"SELECT * FROM `$CNIC d`");
                                  while($see=mysqli_fetch_array($select))
                                  { 
                                  ?>
                                    <tr>
                                    <th scope="row"><?php echo $see ['Id'] ?></th>
                                    <td><?php echo $see ['Transfer_Order_Number'] ?></td>
                                    <td><?php echo $see ['Designation'] ?></td>
                                    <td><?php echo $see ['BPS'] ?></td>
                                    <td><?php echo $see ['From_Department'] ?></td>
                                    <td><?php echo $see ['To_Project'] ?></td>
                                    <td><?php echo $see ['From_Station'] ?></td>
                                    <td><?php echo $see ['To_Station'] ?></td>
                                    <td><?php echo $see ['Worked_From'] ?>"</td>
                                    <td><?php echo $see ['Transfer_Date'] ?></td>
                                    <td><a href=""><i class="fa-solid fa-pen-to-square"></i></a></td>
                                    <td><a href=""><i class="fa-solid fa-trash"></i></a></td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                  </div>
               
                </div>
              </div>
             </form>
              <!-- /.card -->

        </div>
    </div>
    <script>
      function backToSection2() {
        <?php $CNIC = $_GET['updat'];?>
        location.replace('famly.php?updat=<?php echo $CNIC?>');
            }
</script>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

<?php include('link/desigene/script.php')?>
</body>
</html>