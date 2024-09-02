<?php
session_start();
error_reporting(0);
include('link/desigene/db.php');
if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber']) || $_SESSION['Designation'] != 'HR manager') {
  error_log("Unauthorized access attempt. User: {$_SESSION['loginid']}");
  header("Location: ../logout.php");
  exit; 
} else
{
  $date = date('Y-m-d');
  if (isset($_POST['submit'])) {
      $ChangeBy = $_SESSION['EmployeeNumber'];
      $IdUpdate = $_POST['Id'];
      $image = $_FILES["image"];
      $fName = strtoupper($_POST["fName"]);
      $mName = strtoupper($_POST["mName"]);
      $lName = strtoupper($_POST["lName"]);
      $father_Name = strtoupper($_POST["father_Name"]);
      $CNIC = $_POST["CNIC"];
      $email = $_POST["email"];
      $pAddress = strtoupper($_POST["pAddress"]);
      $cAddress = strtoupper($_POST["cAddress"]);
      $city = strtoupper($_POST["city"]);
      $postAddress = strtoupper($_POST["postAddress"]);
      $mNumber = $_POST["mNumber"];
      $ofphNumber = $_POST["ofphNumber"];
      $Alternate_Number = $_POST["Alternate_Number"];
      $DofB = $_POST["DofB"];
      $religion = strtoupper($_POST["religion"]);
      $gender = strtoupper($_POST["gender"]);
      $BlGroup = strtoupper($_POST["BlGroup"]);
      $Domicile = strtoupper($_POST["Domicile"]);
      $MaritalStatus = strtoupper($_POST["MaritalStatus"]);
      $NextofKin = strtoupper($_POST["NextofKin"]);
      $NextofKinCellNumber = $_POST["NextofKinCellNumber"];
      $ContactPerson = $_POST["ContactPerson"];
      $CPCN = $_POST["CPCN"];
      $Employement_Group = strtoupper($_POST["Employement_Group"]);
      $Employee_Class = strtoupper($_POST["Employee_Class"]);
      $Employee_Group = strtoupper($_POST["Employee_Group"]);
      $Employee_Sub_Group = strtoupper($_POST["Employee_Sub_Group"]);
      $Employee_Quota = strtoupper($_POST["Employee_Quota"]);
      $Grade_tma = strtoupper($_POST["Grade"]);
      $Department = strtoupper($_POST["Department"]);
      $Job_Tiltle = strtoupper($_POST["Job_Tiltle"]);
      $Salary_Mode = strtoupper($_POST["Salary_Mode"]);
      $Employee_Status = strtoupper($_POST["Status"]);
      $emptype = strtoupper($_POST["DepartmentType"]);
      $EmployeeNowssp = $_POST["EmployeeNo"];
      $Employee_Manager = $_POST["Employee_Manager"];
      $Joining_Date = strtoupper($_POST["Joining_Date"]);
      $Contract_Expiry_Date = strtoupper($_POST["Contract_Expiry_Date"]);
      $Last_Working_Date = strtoupper($_POST["Last_Working_Date"]);
      $Attendance_Supervisor = strtoupper($_POST["Attendance_Supervisor"]);
      $Duty_Location = strtoupper($_POST["Duty_Location"]);
      $Duty_Point = strtoupper($_POST["Duty_Point"]);
      $Salary_Bank = strtoupper($_POST['Salary_Bank']);
      $Salary_Branch = strtoupper($_POST['Salary_Branch']);
      $Account_No = strtoupper($_POST['Account_No']);
      $Pay_Type = strtoupper($_POST['Pay_Type']);
      $EOBI_No = strtoupper($_POST['EOBI_No']);
      $Bill_Walved_Off = strtoupper($_POST['Bill_Walved_Off']);
      $Weekly_Working_Days = strtoupper($_POST['Weekly_Working_Days']);
      $Bill_Waived_Off = strtoupper($_POST['Bill_Waived_Off']);
      $Employee_Pay_Classification = strtoupper($_POST['Employee_Pay_Classification']);
      $Type = strtoupper($_POST['Type']);
      $DY_Supervisor = strtoupper($_POST['DY_Supervisor']);
      $Image_name = $image['name'];
      $Image_path = $image['tmp_name'];
      $Image_error = $image['error'];
      if ($Image_error == 0) {
          $Image_save = '../image/' . $Image_name;
          move_uploaded_file($Image_path, $Image_save);
      } else {
          echo '<script>alert("Picture is not uploaded. Kindly update.");</script>';
      }
      $query = "INSERT INTO `employeedataupdate`(
          `IdUpdate`, `imageUpdate`, `fNameUpdate`, `mNameUpdate`, `lNameUpdate`, `father_NameUpdate`, 
          `CNICUpdate`, `emailUpdate`, `pAddressUpdate`, `cAddressUpdate`, `cityUpdate`, `postAddressUpdate`, 
          `mNumberUpdate`, `ofphNumberUpdate`, `Alternate_NumberUpdate`, `DofBUpdate`, `religionUpdate`, 
          `genderUpdate`, `BlGroupUpdate`, `DomicileUpdate`, `MaritalStatusUpdate`, `NextofKinUpdate`, 
          `NextofKinCellNumberUpdate`, `ContactPersonUpdate`, `CPCNUpdate`, `Employement_GroupUpdate`, 
          `Employee_ClassUpdate`, `Employee_GroupUpdate`, `Employee_Sub_GroupUpdate`, `Employee_QuotaUpdate`, 
          `Salary_BankUpdate`, `Salary_BranchUpdate`, `Account_NoUpdate`, `Pay_TypeUpdate`, `EOBI_NoUpdate`, 
          `Bill_Walved_OffUpdate`, `Weekly_Working_DaysUpdate`, `Bill_Waived_OffUpdate`, `Employee_Pay_ClassificationUpdate`, 
          `GradeUpdate`, `DepartmentUpdate`, `Job_TiltleUpdate`, `Salary_ModeUpdate`, `StatusUpdate`, `EmployeeNoUpdate`, 
          `Employee_ManagerUpdate`, `Joining_DateUpdate`, `Contract_Expiry_DateUpdate`, `Last_Working_DateUpdate`, 
          `Attendance_SupervisorUpdate`, `Duty_LocationUpdate`, `Duty_PointUpdate`, `Emptype`, `typeUpdate`, 
          `DY_SupervisorUpdate`, `status`, `Change By`, `date`
      ) VALUES (
         '$IdUpdate', '$Image_name', '$fName', '$mName', '$lName', '$father_Name', '$CNIC', '$email', '$pAddress', 
         '$cAddress', '$city', '$postAddress', '$mNumber', '$ofphNumber', '$Alternate_Number', '$DofB', '$religion',
         '$gender', '$BlGroup', '$Domicile', '$MaritalStatus', '$NextofKin', '$NextofKinCellNumber', '$ContactPerson', 
         '$CPCN', '$Employement_Group', '$Employee_Class', '$Employee_Group', '$Employee_Sub_Group', '$Employee_Quota', 
         '$Salary_Bank', '$Salary_Branch', '$Account_No', '$Pay_Type', '$EOBI_No', '$Bill_Walved_Off', '$Weekly_Working_Days', 
         '$Bill_Waived_Off', '$Employee_Pay_Classification', '$Grade_tma', '$Department', '$Job_Tiltle', '$Salary_Mode',
         '$Employee_Status', '$EmployeeNowssp', '$Employee_Manager', '$Joining_Date', '$Contract_Expiry_Date', 
         '$Last_Working_Date', '$Attendance_Supervisor', '$Duty_Location', '$Duty_Point', '$emptype', 
         '$Type', '$DY_Supervisor', 'IN PROCESS', '$ChangeBy', '$date'
      )";
      // echo $query;
      $result = mysqli_query($conn, $query);
      if ($result) {
          echo '<script>alert("Data is Updated");</script>';
          header("Location: Qualification.php?updat=" . urlencode($EmployeeNowssp) . "#section3");
          exit();
      } else {
          echo "Error: " . mysqli_error($conn);
      }
  }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <?php include ('link/links.php')?>
   
<link rel="stylesheet" href="../dist/select2/select2.min.css">
<script src="../dist/select2/select2.min.js"></script>
</head>
<style>
    .select2-selection__rendered {
      line-height: 31px !important;
    }
    label span{
      color: red;
    }
    .select2-container .select2-selection--single {
      height: 35px !important;
      border: 1px solid #ced4da;
      border-radius: 0px;
      width: 300px !important;
    }
    .select2-selection__arrow {
      height: 34px !important;
    }
  </style>
<body>
              <?php 
                $id = $_GET['id'];
                $select = mysqli_query($conn,"SELECT * FROM `employeedata` WHERE `Id` = $id");
                while($fetchdata=mysqli_fetch_array($select)){
                  $selectedEmployeeClass = htmlspecialchars($fetchdata['Employee_Class']); // Get the selected value
                  $selectedEmployeeGroup = htmlspecialchars($fetchdata['Employee_Group']);  // Get the selected value
                  $selectedEmployeeSubGroup = htmlspecialchars($fetchdata['Employee_Sub_Group']); // Get the selected value
                  $selectedGrade = htmlspecialchars($fetchdata['Grade']); // Get the selected value
                  $selectedDepartment = htmlspecialchars($fetchdata['Department']); // Get the selected value
                  $selectedJobTitle = htmlspecialchars($fetchdata['Job_Tiltle']); // Get the selected value
                  $selectedSalaryBranch = htmlspecialchars($fetchdata['Salary_Branch']); // Get the selected value
                ?>
    <?php include ('link/desigene/sidebar.php')?>
    <div id="main">
      <?php include('link/desigene/navbar.php')?>
      <form id="myForm" method="post" enctype="multipart/form-data">
        <div class="container-fluid">
          <div class="row my-4">
            <div class="col-md-12 ">
                <div id="section1">
                  <div class="card card-success border border-2 border-dark bg-light">
                    <div style="background-color: darkblue;" class="card-header text-white fw-bold">
                      <div class="card-title text-white">Employee Personal Information</div>
                    </div>
                      <br>
                    <div class="row mt-5 p-3">
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                              <label>Upload Image</label>
                              <input value="<?php echo $fetchdata['Image']?>" id="file1" name="image" onchange="document.getElementById('log1').src = window.URL.createObjectURL(this.files[0])" type="file" accept="image/*" class="form-control" style="overflow: hidden;" placeholder="Insert Your Image">
                          </div>
                        </div>
                        <div class="col-md-4 my-2"></div>
                        <div class="col-md-4 my-2 ">
                          <div class="form-group mr-3 mt-0">
                            <img id="log1" class="shadow" style="border: 1px blue solid; border-radius: 10%; margin-top: -4%" src="../image/<?php echo $fetchdata['image']?>" width="120px;" height="130px">
                          </div>
                        </div>
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                            <label>First Name</label>
                            <input value="<?php echo $fetchdata['fName']?>" id="fName" type="text" name="fName" placeholder="First Name" class="form-control" autocomplete="off" >
                            <input type="number"  name="Id" readonly hidden value="<?php  echo $fetchdata['Id'];?>">
                          </div>
                        </div>
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                            <label>Middle Name</label>
                            <input value="<?php echo $fetchdata['mName']?>" id="mName" type="text" name="mName" placeholder="Middle Name" class="form-control" autocomplete="off">
                          </div>
                        </div>
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                            <label>Last Name</label>
                            <input value="<?php echo $fetchdata['lName']?>" id="lName" type="text" name="lName" placeholder="Last Name" class="form-control" autocomplete="off">
                          </div>
                        </div> 
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                            <label>Father Name</label>
                            <input value="<?php echo $fetchdata['father_Name']?>" id="FatherName" type="text" name="father_Name" placeholder="Father Name" class="form-control" autocomplete="off">
                          </div>
                        </div> 
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                            <label>CNIC <span style="font-size: x-small; font-weight: initial;">(without dash -)</span> 
                            <input value="<?php echo $fetchdata['CNIC']?>" id="cNo" type="text" name="CNIC" placeholder="CNIC" class="form-control" autocomplete="off" oninput="validateCNIC(this)">
                            <span id="cnicStatus" style="font-size: smaller;"></span>
                          </div>
                          <script>
                            function validateCNIC(input) {
                                var cnicNumber = input.value;
                                if (cnicNumber.length < 13) {
                                    input.style.borderColor = 'red';
                                    document.getElementById('cnicStatus').innerText = ''; 
                                } else {
                                    input.style.borderColor = '';
                                    checkCNICExistence(cnicNumber);
                                }
                                if (cnicNumber.length > 13) {
                                    input.value = cnicNumber.slice(0, 14);
                                }
                            }
                            function checkCNICExistence(cnicNumber) {
                            var xhr = new XMLHttpRequest();
                            xhr.onreadystatechange = function () {
                                if (xhr.readyState == 4 && xhr.status == 200) {
                                    var response = xhr.responseText;
                                    document.getElementById('cnicStatus').innerText = response;
                                }
                            };
                        }
                            </script>
                        </div>
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                            <label>Email address</label>
                            <input value="<?php echo $fetchdata['email']?>" id="email" type="Email" name="email" placeholder="Email" class="form-control" autocomplete="off" >
                          </div>
                        </div>
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                            <label>Permanent Address</label>
                            <input value="<?php echo $fetchdata['pAddress']?>" id="PAddress" type="text" name="pAddress" placeholder="Permanent Address" class="form-control" autocomplete="off" >
                          </div>
                        </div>
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                            <label>Current Address</label>
                            <input value="<?php echo $fetchdata['cAddress']?>" id="CAddress" type="text" name="cAddress" placeholder="Current Address" class="form-control" autocomplete="off" >
                          </div>
                        </div>
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                            <label>City</label>
                            <input value="<?php echo $fetchdata['city']?>" id="city" type="text" name="city" placeholder="City" class="form-control" autocomplete="off" >
                          </div>
                        </div>
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                            <label>Postal Address</label>
                            <input value="<?php echo $fetchdata['postAddress']?>" id="PAddress" type="text" name="postAddress" placeholder="Postal Address" class="form-control" autocomplete="off" >
                          </div>
                        </div>
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                            <label>Mobile Number</label>
                            <input value="<?php echo $fetchdata['mNumber']?>" id="moNum" type="text" name="mNumber" placeholder="Mobile Number" class="form-control" autocomplete="off" >
                          </div>
                        </div>
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                            <label>Office Phone Number</label>
                            <input value="<?php echo $fetchdata['ofphNumber']?>" id="OfPNum" type="text" name="ofphNumber" placeholder="Office Number" class="form-control" autocomplete="off" >
                          </div>
                        </div>
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                            <label>Alternate Number</label>
                            <input value="<?php echo $fetchdata['Alternate_Number']?>" id="ANum" type="text" name="Alternate_Number" placeholder="Alternate Number" class="form-control" autocomplete="off" >
                          </div>
                        </div>
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                            <label>Date of Birth</label>
                            <input value="<?php echo $fetchdata['DofB']?>" id="DofB" type="text" name="DofB" class="form-control datepicker" autocomplete="off" >
                          </div>
                        </div>
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                            <label>Religion</label>
                            <select name="religion" id="" class="form-control select2">
                            <?php
                              $select = mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='Religion'");
                              if(mysqli_num_rows($select)>0){
                                ?>
                                  <option value="">Select</option>
                                <?php
                                  while($row=mysqli_fetch_assoc($select)){
                                  ?>
                                  <option <?php echo ($fetchdata['religion'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
                                  <?php   
                                  }}
                              ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" id="" class="form-control ">
                                <option <?php echo ($fetchdata['gender'] =='') ? 'selected' : ''; ?> value="">Choose</option>
                                <option <?php echo ($fetchdata['gender'] =='Male') ? 'selected' : ''; ?> value="Male">Male</option>
                                <option <?php echo ($fetchdata['gender'] =='Female') ? 'selected':'';?> value="Female">Female</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                            <label>Blood Group</label>
                            <input value="<?php echo $fetchdata['BlGroup']?>" id="BlGroup" type="text" name="BlGroup" placeholder="Blood Group" class="form-control" autocomplete="off" >
                          </div>
                        </div>
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                            <label>Domicile</label>
                            <input value="<?php echo $fetchdata['Domicile']?>" id="Domicile" type="text" name="Domicile" placeholder="Domicile" class="form-control" autocomplete="off">
                          </div>
                        </div>
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                            <label>Marital Status </label>
                            <select name="MaritalStatus" id="MaritalStatus" class="form-control ">
                                <option <?php echo ($fetchdata['MaritalStatus'] == '') ? 'selected' : ''; ?> value="">Choose</option>
                                <option <?php echo ($fetchdata['MaritalStatus'] == 'Married') ? 'selected' : '';?> value="Married"> Married</option>
                                <option <?php echo ($fetchdata['MaritalStatus'] == 'Unmarried') ? 'selected' : '';?> value="Unmarried"> Unmarried</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                            <label>Next of Kin</label>
                            <input value="<?php echo $fetchdata['NextofKin']?>" id="NextofKin" type="text" name="NextofKin" placeholder="Next of Kin" class="form-control" autocomplete="off" >
                          </div>
                        </div>
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                            <label>Next of Kin Cell Number</label>
                            <input value="<?php echo $fetchdata['NextofKinCellNumber']?>" id="NextofKinCellNumber" type="text" name="NextofKinCellNumber" placeholder="Next of Kin Cell Number " class="form-control" autocomplete="off">
                          </div>
                        </div>                   
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                            <label>Name of Contact Person</label>
                            <input value="<?php echo $fetchdata['ContactPerson']?>" id="ContactPerson" type="text" name="ContactPerson" placeholder="Contact Person " class="form-control" autocomplete="off" >
                          </div>
                        </div>                    
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                            <label>Contact Person Cell Number</label>
                            <input value="<?php echo $fetchdata['CPCN']?>" id="CPCN" type="text" name="CPCN" placeholder="Contact Person Cell Number " class="form-control" autocomplete="off">
                          </div>
                        </div>
                    </div>     
                    <div class=" text-end">
                        <button style="background-color: darkblue;" class="btn text-white shadow float-right" type="button" onclick="validateSection1()">Next</button>
                    </div>
                  </div>
                </div>
                <div id="section2" style="display: none;">
                  <div class="tab-content" id="myTabContent">
                      <div class="row my-4">
                        <div class="col-md-12 ">
                          <div class="card card-success border border-2 border-dark bg-light">
                            <div style="background-color: darkblue;" class="card-header text-white fw-bold">
                              <div class="row">
                                <div class="col-sm-12 col-lg-5">
                                  <div class="card-title text-white" style="width:fit-content;">Employment Information
                                  </div>
                                </div>
                                <div class="col-sm-12 col-lg-7">
                                  <h3 class="bg-primary p-2 rounded" style="width:fit-content;">WSSC</h3>
                                </div>
                              </div>  
                            </div>
                            <br>
                            <div class="card-body">
                              <div class="row">
                              <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Department Type<span>*</span></label>
                                    <select name="DepartmentType" required id="DepartmentType" class="form-control select2">
                                      <option <?php echo ($fetchdata['TypeEmp'] == 'WSSC') ? 'selected' : ''; ?> value="WSSC">WSSC</option>
                                      <option <?php echo ($fetchdata['TypeEmp'] == 'TMA') ? 'selected' : ''; ?> value="TMA">TMA</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Employment Group<span>*</span></label>
                                    <select name="Employement_Group" id="" class="form-control ">
                                    <?php
                                      include ('../link/desigene/db.php');
                                      $select = mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='EmpGroup'");
                                      if(mysqli_num_rows($select)>0){
                                      ?>
                                          <option value="" <?php echo ($fetchdata['Employement_Group'] == '') ? 'selected' : ''; ?>>Select</option>
                                      <?php
                                          while($row=mysqli_fetch_assoc($select)){
                                          ?>
                                          <option <?php echo ($fetchdata['Employement_Group'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
                                          <?php   
                                          }
                                      }
                                      ?>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                    <div class="form-group">
                                        <label>Employee Class<span>*</span></label>
                                        <select name="Employee_Class" id="Employee_Class_drop" class="form-control" data-selected="<?php echo $selectedEmployeeClass; ?>">
                                            <!-- Options will be populated via AJAX -->
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 my-2">
                                    <div class="form-group">
                                        <label>Employee Group</label>
                                        <select name="Employee_Group" id="Employee_Group_drop" class="form-control" data-selected="<?php echo $selectedEmployeeGroup; ?>">
                                            <!-- Options will be populated via AJAX -->
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 my-2">
                                    <div class="form-group">
                                        <label>Employee Sub Group</label>
                                        <select name="Employee_Sub_Group" id="Employee_Sub_Group_drop" class="form-control" data-selected="<?php echo $selectedEmployeeSubGroup; ?>">
                                            <!-- Options will be populated via AJAX -->
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Employee Quota</label>
                                    <select name="Employee_Quota" id="Employee_Quota_drop" class="form-control ">
                                  <?php
                                      include ('../link/desigene/db.php');
                                      $select = mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='Employee_Quota'");
                                      if(mysqli_num_rows($select)>0){
                                      ?>
                                          <option value="" <?php echo ($fetchdata['Employee_Quota'] == '') ? 'selected' : ''; ?>>Select</option>
                                      <?php
                                          while($row=mysqli_fetch_assoc($select)){
                                          ?>
                                          <option <?php echo ($fetchdata['Employee_Quota'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
                                          <?php   
                                          }
                                      }
                                      ?>  
                                  </select>
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Salary Bank</label>
                                    <select name="Salary_Bank" id="SalaryBank_drop" class="form-control ">
                                  <?php
                                      include ('../link/desigene/db.php');
                                      $select = mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='SalaryBank'");
                                      if(mysqli_num_rows($select)>0){
                                      ?>
                                          <option value="" <?php echo ($fetchdata['Salary_Bank'] == '') ? 'selected' : ''; ?>>Select</option>
                                      <?php
                                          while($row=mysqli_fetch_assoc($select)){
                                          ?>
                                          <option <?php echo ($fetchdata['Salary_Bank'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
                                          <?php   
                                          }
                                      }
                                      ?>  
                                  </select>
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Salary Bank Branch</label>
                                    <select name="Salary_Branch" id="SalaryBankBranch_drop" class="form-control ">
                                  </select>
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Account No</label>
                                    <input value="<?php echo $fetchdata['Account_No']?>" type="text" class="form-control" name="Account_No" placeholder="Account No" >
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Pay Type</label>
                                    <select name="Pay_Type" id="PayType_drop" class="form-control ">
                                  <?php
                                      include ('../link/desigene/db.php');
                                      $select = mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='PayType'");
                                      if(mysqli_num_rows($select)>0){
                                      ?>
                                          <option value="" <?php echo ($fetchdata['Pay_Type'] == '') ? 'selected' : ''; ?>>Select</option>
                                      <?php
                                          while($row=mysqli_fetch_assoc($select)){
                                          ?>
                                          <option <?php echo ($fetchdata['Pay_Type'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
                                          <?php   
                                          }
                                      }
                                      ?>  
                                  </select>
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>EOBI No</label>
                                    <input value="<?php echo $fetchdata['EOBI_No']?>" type="text" class="form-control" name="EOBI_No" placeholder="EOBI No" >
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                    <div class="form-group">
                                        <label>Bill Waived Off</label>
                                        <select name="Bill_Waived_Off" id="Bill_Waived_Off" class="form-control select2" onchange="toggleVisibility()">
                                            <option value="NO" <?php echo ($fetchdata['Bill_Waived_Off'] == 'NO') ? 'selected' : ''; ?>>NO</option>
                                            <option value="YES" <?php echo ($fetchdata['Bill_Waived_Off'] == 'YES') ? 'selected' : ''; ?>>YES</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 my-2" id="billWiaivedoff">
                                    <div class="form-group">
                                        <label>Bill Waived Off</label>
                                        <input type="text" class="form-control" value="<?php echo $fetchdata['Bill_Walved_Off']?>" name="Bill_Walved_Off" placeholder="Bill Waived Off">
                                    </div>
                                </div>
                                <script>
                                    function toggleVisibility() {
                                        var selectedValue = document.getElementById('Bill_Waived_Off').value;
                                        var billWiaivedoffElement = document.getElementById('billWiaivedoff');
                                        billWiaivedoffElement.style.display = selectedValue === 'YES' ? 'block' : 'none';
                                    }
                                    document.addEventListener('DOMContentLoaded', function() {
                                        toggleVisibility();
                                    });
                                </script>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Weekly Working Days</label>
                                    <input value="<?php echo $fetchdata['Weekly_Working_Days']?>" type="text" class="form-control" name="Weekly_Working_Days" placeholder="Weekly Working Days" >
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Employee Pay Classification</label>
                                    <select name="Employee_Pay_Classification" required id="" class="form-control select2">
                                    <?php
                                      $select = mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='Employee_Pay_Classification'");
                                      if(mysqli_num_rows($select)>0){
                                        ?>
                                          <option value="">Select</option>
                                        <?php
                                          while($row=mysqli_fetch_assoc($select)){
                                          ?>
                                          <option <?php echo ($fetchdata['Employee_Pay_Classification'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
                                          <?php   
                                          }
                                      }
                                      ?>
                                  </select>
                                  </div>
                                </div>
                               
                                <div class="col-md-4 my-2">
                                    <div class="form-group">
                                        <label>Grade</label>
                                        <select name="Grade" id="Grade_drop" class="form-control" data-selected-value="<?php echo $selectedGrade; ?>"></select>
                                    </div>
                                </div>

                                <div class="col-md-4 my-2">
                                    <div class="form-group">
                                        <label>Department</label>
                                        <select name="Department" id="Department_drop" class="form-control" data-selected-value="<?php echo $selectedDepartment; ?>"></select>
                                    </div>
                                </div>

                                <div class="col-md-4 my-2">
                                    <div class="form-group">
                                        <label>Job Title</label>
                                        <select name="Job_Tiltle" id="Job_Tiltle_drop" class="form-control" data-selected-value="<?php echo $selectedJobTitle; ?>"></select>
                                    </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Salary Mode</label>
                                    <select name="Salary_Mode" id="Salary_Mode_drop" class="form-control ">
                                  <?php
                                      include ('../link/desigene/db.php');
                                      $select = mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='Salary_Mode'");
                                      if(mysqli_num_rows($select)>0){
                                      ?>
                                          <option value="" <?php echo ($fetchdata['Salary_Mode'] == '') ? 'selected' : ''; ?>>Select</option>
                                      <?php
                                          while($row=mysqli_fetch_assoc($select)){
                                          ?>
                                          <option <?php echo ($fetchdata['Salary_Mode'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
                                          <?php   
                                          }
                                      }
                                      ?>    
                                  </select>
                                    </div>
                                </div>
                                  <div class="col-md-4 my-2">
                                    <div class="form-group">
                                      <label>Status</label>
                                      <?php
                                      if($fetchdata['Status']=="NEW"){
                                        $desable='disabled';
                                      }else{
                                        $desable='';
                                      }
                                      ?>
                                      <select name="Status" <?php echo $desable;?>  id="Status_drop" class="form-control ">
                                  <?php
                                      include ('../link/desigene/db.php');
                                      $select = mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='Status'");
                                      if(mysqli_num_rows($select)>0){
                                      ?>
                                          <option value="" <?php echo ($fetchdata['Status'] == '') ? 'selected' : ''; ?>>Select</option>
                                      <?php
                                          while($row=mysqli_fetch_assoc($select)){
                                          ?>
                                          <option <?php echo ($fetchdata['Status'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
                                          <?php   
                                          }
                                      }
                                      ?>      
                                  </select>
                                      </div>
                                    </div>
                                  <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Employee NO</label>
                                    <input value="<?php echo $fetchdata['EmployeeNo']?>" type="text" id="EmployeeNowssp" name="EmployeeNo" placeholder="Employee NO" class="form-control" autocomplete="off" required >
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label class="form-label" >Manager ID No</label>
                                    <div>
                                      <select name="Employee_Manager" id="" class="form-control ">
                                      <?php
                                      $select = mysqli_query($conn,"SELECT * FROM `employeedata` ");
                                      if(mysqli_num_rows($select)>0){
                                          ?><option value="">select</option><?php
                                          while($row=mysqli_fetch_assoc($select)){
                                          ?>
                                      <option <?php echo ($fetchdata['Employee_Manager'] ==  $row['EmployeeNo'] ) ? 'selected' : ''; ?> value="<?php echo $row['EmployeeNo']?>"><?php echo $row['EmployeeNo']?></option>
                                          
                                          <?php   
                                          }
                                      }
                                      ?>
                                  </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-4 my-2">
                                    <div class="form-group">
                                      <label> Attendance Supervisor</label>
                                      <select name="Attendance_Supervisor" id="" class="form-control ">
                                      <?php
                                    include ('../link/desigene/db.php');
                                    $select = mysqli_query($conn,"SELECT * FROM `employeedata`");
                                    if(mysqli_num_rows($select)>0){
                                        ?><option value="">select</option><?php
                                        while($row=mysqli_fetch_array($select)){
                                        ?>
                                    <option <?php echo ($fetchdata['Attendance_Supervisor'] ==  $row['EmployeeNo'] ) ? 'selected' : ''; ?> value="<?php echo $row['EmployeeNo']?>"> <?php echo $row['EmployeeNo']?> </option>
                                        <?php   
                                        }
                                    }
                                    ?> 
                                  </select>
                                    </div>
                                  </div>
                                  <div class="col-md-4 my-2">
                                    <div class="form-group">
                                      <label>DY.Manager </label>
                                      <select name="DY_Supervisor" id="" class="form-control ">
                                    <?php include ('../link/desigene/db.php');
                                      $select = mysqli_query($conn,"SELECT * FROM `employeedata` ");
                                      if(mysqli_num_rows($select)>0){
                                          ?><option value="">select</option><?php
                                          while($row=mysqli_fetch_assoc($select)){
                                          ?>
                                      <option <?php echo ($fetchdata['DY_Supervisor'] ==  $row['EmployeeNo'] ) ? 'selected' : ''; ?> 
                                      value="<?php echo $row['EmployeeNo']?>"><?php echo $row['EmployeeNo']?></option>
                                          <?php   
                                          }
                                      }
                                      ?>  
                                  </select>
                                    </div>
                                  </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Joining Date</label>
                                    <input value="<?php echo $fetchdata['Joining_Date']?>" type="text" name="Joining_Date" id="Joining_Date" placeholder="Joining Date" class="form-control datepicker" autocomplete="off" >
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Contract Expiry Date</label>
                                    <input value="<?php echo $fetchdata['Contract_Expiry_Date']?>" type="text" name="Contract_Expiry_Date" placeholder="" class="form-control datepicker" autocomplete="off" >
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Last Working Date</label>
                                    <input value="<?php echo $fetchdata['Last_Working_Date']?>" type="text" name="Last_Working_Date" placeholder="" class="form-control datepicker" autocomplete="off" >
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Duty Location</label>
                                    <input value="<?php echo $fetchdata['Duty_Location']?>" type="text" name="Duty_Location" id="Duty_Location" placeholder="Duty Location" class="form-control" autocomplete="off" >
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Duty Point</label>
                                    <input value="<?php echo $fetchdata['Duty_Point']?>" type="text" name="Duty_Point" id="Duty_Point" placeholder="Duty Point" class="form-control" autocomplete="off" >
                                  </div>
                                </div>
                                <div class="col-md-12 text-end mt-2">
                                  <input value="Back" style="background-color: darkblue;" onclick="backToSection1()" type="button" class="btn text-white  float-right shadow" value="Back">
                                  <input value="Next" style="background-color: darkblue;" name="submit" type="submit" class="btn text-white  float-right shadow" value="Submit">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </form> 
    </div>
<script>
  $(document).ready(function() {
    function loadEmployee_Class() {
        var Department_Type = $('#DepartmentType').val();
        $.ajax({
            url: "ajex/EmployeeUpdate/Employee_Class - Copy.php",
            type: "POST",
            data: { Department_Type: Department_Type },
            success: function(data) {
              
                $("#Employee_Class_drop").html(data);
                var initialSelectedClass = $('#Employee_Class_drop').data('selected');
                $('#Employee_Class_drop').val(initialSelectedClass).change();
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error: " + status + error);
                $("#Employee_Class_drop").html('<option value="">Error loading options</option>');
            }
        });
    }

    function loadEmployee_Group() {
        var Employee_Class = $('#Employee_Class_drop').val();
        $.ajax({
            url: "ajex/EmployeeUpdate/Employee_Group - Copy.php",
            type: "POST",
            data: { Employee_Class: Employee_Class },
            success: function(data) {
                $("#Employee_Group_drop").html(data);
                var initialSelectedGroup = $('#Employee_Group_drop').data('selected');
                $('#Employee_Group_drop').val(initialSelectedGroup).change();
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error: " + status + error);
                $("#Employee_Group_drop").html('<option value="">Error loading options</option>');
            }
        });
    }

    function loadEmployee_Sub_Group() {
        var Employee_Group = $('#Employee_Group_drop').val();
        $.ajax({
            url: "ajex/EmployeeUpdate/Employee_Sub_Group - Copy.php",
            type: "POST",
            data: { Employee_Group: Employee_Group },
            success: function(data) {
                $("#Employee_Sub_Group_drop").html(data);
                var initialSelectedSubGroup = $('#Employee_Sub_Group_drop').data('selected');
                $('#Employee_Sub_Group_drop').val(initialSelectedSubGroup);
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error: " + status + error);
                $("#Employee_Sub_Group_drop").html('<option value="">Error loading options</option>');
            }
        });
    }
    function loadOptions(selectId, url) {
        var Department_Type = $('#DepartmentType').val();
        $.ajax({
            url: url,
            type: "POST",
            data: { Department_Type: Department_Type },
            success: function(data) {
                // Add "Other" option
                var options = '<option value="">Select</option>' + data + '<option value="Other">Other</option>';
                $(selectId).html(options);
                // Set the selected value after loading options
                var selectedValue = $(selectId).data('selected-value');
                $(selectId).val(selectedValue);
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error: " + status + error);
                $(selectId).html('<option value="">Error loading options</option>');
            }
        });
    }

    function loadGradeOptions() {
        loadOptions('#Grade_drop', 'ajex/EmployeeUpdate/Grade - Copy.php');
    }

    function loadDepartmentOptions() {
        loadOptions('#Department_drop', 'ajex/EmployeeUpdate/Department - Copy.php');
    }

    function loadJobTitleOptions() {
        loadOptions('#Job_Tiltle_drop', 'ajex/EmployeeUpdate/Job_Title - Copy.php');
    }

    // Load options for dropdowns when the Department Type changes
    $('#DepartmentType').change(function() {
        loadGradeOptions();
        loadDepartmentOptions();
        loadJobTitleOptions();
    });

    // On page load, initialize dropdowns based on existing values
    loadGradeOptions();
    loadDepartmentOptions();
    loadJobTitleOptions();

    // Handle change event for dropdowns to detect "Other" selection
    $('select').change(function() {
        if ($(this).val() === 'Other') {
            var customValue = prompt("Please enter the custom value:");
            if (customValue) {
                $(this).append(new Option(customValue, customValue, true, true));
            }
        }
    });
    // Load employee class options on page load
    loadEmployee_Class();

    // Load employee group options when the employee class changes
    $('#Employee_Class_drop').change(function() {
        loadEmployee_Group();
    });

    // Load employee sub-group options when the employee group changes
    $('#Employee_Group_drop').change(function() {
        loadEmployee_Sub_Group();
    });

    // Reload employee class options when the department type changes
    $('#DepartmentType').change(function() {
        loadEmployee_Class();
    });
    $(document).ready(function() {
    function loadSalaryBankBranches(selectedValue, selectedBranch) {
        $.ajax({
            url: "ajex/EmployeeUpdate/Salary_Branch.php",
            type: "POST",
            data: { Salary_Bank: selectedValue, Salary_Bank_Branch: selectedBranch },
            success: function(data) {
                $("#SalaryBankBranch_drop").html(data);
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error: " + status + " " + error);
                $("#SalaryBankBranch_drop").html('<option value="">Error loading options</option>');
            }
        });
    }

    // On page load, get the initial selected value and load the options
    var initialSelectedValue = $('#SalaryBank_drop').val();
    var initialSelectedBranch = "<?php echo $selectedSalaryBranch; ?>";
    loadSalaryBankBranches(initialSelectedValue, initialSelectedBranch);

    // When the Salary Bank changes, load the corresponding branches
    $('#SalaryBank_drop').change(function() {
        loadSalaryBankBranches($(this).val(), '');
    });
});

  });
</script>
<?php } ?>
   <script>
    
    $(document).ready(function() {
            $(".datepicker").datepicker({
                dateFormat: 'dd mm yy'
            });
        });
      $(function() {
          $(".select2").select2();
             });
    $(document) .ready(function(){
      function loadTable(){
              $.ajax({
                url : "ajex/empid.php",
                type : "POST",
              success : function(data){
              $("#employee_no") .html(data) ;
              }});
              }
              loadTable(); 
          });
$(document) .ready(function(){
  function loadTable(){
    $.ajax({
      url : "ajex/empidTMA.php",
      type : "POST",
    success : function(data){
    $("#employee_noTMA") .html(data) ;
    }});
    }
    loadTable(); 
   
});
$(document) .ready(function(){
  function loadTable(){
    $.ajax({
      url : "ajex/empidsuperwviser.php",
      type : "POST",
    success : function(data){
    $("#superviser") .html(data) ;
    }});
    }
    loadTable(); 
});

$(document) .ready(function(){
  function loadTable(){
    $.ajax({
      url : "ajex/DY_Supervisor.php",
      type : "POST",
    success : function(data){
    $("#DY_Supervisor") .html(data) ;
    }});
    }
    loadTable(); 
   });
$(document) .ready(function(){
  function loadTable(){
    $.ajax({
      url : "ajex/empidsuperwviserTMA.php",
      type : "POST",
    success : function(data){
    $("#superviserTMA") .html(data) ;
    }});
    }
    loadTable();     
});
function validateSection1() {
 var cNo = document.getElementById("cNo").value;
 if (cNo) {
 document.getElementById("section1").style.display = "none";
 document.getElementById("section2").style.display="block";
} else {
 alert("Please fill in the required fields");
 }
}
function backToSection1() {
document.getElementById("section2").style.display = "none";
document.getElementById("section1").style.display = "block";
}
   </script>
  <?php include('link/desigene/script.php')?>
</body>
</html>
<?php }?>