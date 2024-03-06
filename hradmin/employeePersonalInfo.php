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
} else
  {

?>
<?php 
if(isset($_POST['submit']))
{
?>
<script>
  alert("Are you sure to save record?");
</script>
<?php
$image = $_FILES ["image"];
$fName = $_POST ["fName"];
$mName = $_POST ["mName"];
$lName = $_POST ["lName"];
$father_Name = $_POST ["father_Name"];
$CNIC = $_POST ["CNIC"];
$email = $_POST ["email"];
$pAddress = $_POST ["pAddress"];
$cAddress = $_POST ["cAddress"];
$city = $_POST ["city"];
$postAddress = $_POST ["postAddress"];
$mNumber = $_POST ["mNumber"];
$ofphNumber = $_POST ["ofphNumber"];
$Alternate_Number = $_POST ["Alternate_Number"];
$DofB = $_POST ["DofB"];
$religion = $_POST ["religion"];
$gender = $_POST ["gender"];
$BlGroup = $_POST ["BlGroup"];
$Domicile = $_POST ["Domicile"];
$MaritalStatus = $_POST ["MaritalStatus"];
$NextofKin = $_POST ["NextofKin"];
$NextofKinCellNumber = $_POST ["NextofKinCellNumber"];
$ContactPerson = $_POST ["ContactPerson"];
$CPCN = $_POST ["CPCN"];
$Employement_Group = $_POST ["Employement_Group"];
$Employee_Class = $_POST["Employee_Class"];
$Employee_Group = $_POST ["Employee_Group"];
$Employee_Sub_Group = $_POST ["Employee_Sub_Group"];
$Employee_Quota = $_POST ["Employee_Quota"];
$Grade_tma = $_POST ["Grade"]; 
$Department = $_POST ["Department"];
$Job_Tiltle = $_POST ["Job_Tiltle"];
$Salary_Mode = $_POST ["Salary_Mode"];
$DepartmentType = $_POST ["DepartmentType"];
$EmployeeNowssp = $_POST ["EmployeeNo"];
$Employee_Manager = $_POST ["Employee_Manager"];
$Joining_Date = $_POST ["Joining_Date"];
$Contract_Expiry_Date = $_POST ["Contract_Expiry_Date"];
$Last_Working_Date = $_POST ["Last_Working_Date"];
$Attendance_Supervisor = $_POST ["Attendance_Supervisor"];
$Duty_Location = $_POST ["Duty_Location"];
$Duty_Point = $_POST ["Duty_Point"];
$Salary_Bank = $_POST['Salary_Bank'];
$Salary_Branch = $_POST['Salary_Branch'];
$Account_No = $_POST['Account_No'];
$Pay_Type = $_POST['Pay_Type'];
$EOBI_No = $_POST['EOBI_No'];
$Bill_Walved_Off = $_POST['Bill_Walved_Off'];
$Weekly_Working_Days = $_POST['Weekly_Working_Days'];
$Bill_Waived_Off = $_POST['Bill_Waived_Off'];
$Employee_Pay_Classification = $_POST['Employee_Pay_Classification'];
$Type=$_POST['Type'];
$DY_Supervisor=$_POST['DY_Supervisor'];
$Image_name =$image['name'];
$Image_path = $image['tmp_name'];
$Image_error = $image['error'];
$selected = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `CNIC`='$CNIC' AND `Status`='NEW' OR `EmployeeNo`='$EmployeeNowssp'");

if (mysqli_num_rows($selected) > 0) {
  echo '<script>alert("Sorry CNIC already exists");</script>';
} else {
if($Image_error==0)
{
    $Image_save='../image/'.$Image_name;
    // echo $Image_save;
    move_uploaded_file($Image_path, $Image_save);  
}else{
    echo '<script>alert("Picture is not uploaded Kindli update");</script>';
}
$insertquery = "INSERT INTO `employeedata`(`image`, `fName`, `mName`, `lName`, `father_Name`, `CNIC`, `email`, `pAddress`, `cAddress`, `city`, `postAddress`, `mNumber`, `ofphNumber`, `Alternate_Number`, `DofB`, `religion`, `gender`, `BlGroup`, `Domicile`, `MaritalStatus`, `NextofKin`, `NextofKinCellNumber`, `ContactPerson`, `CPCN`, `Employement_Group`, `Employee_Class`, `Employee_Group`, `Employee_Sub_Group`, `Employee_Quota`, `Salary_Bank`, `Salary_Branch`, `Account_No`, `Pay_Type`, `EOBI_No`, `Bill_Walved_Off`, `Weekly_Working_Days`, `Bill_Waived_Off`, `Employee_Pay_Classification`, `Grade`, `Department`, `Job_Tiltle`, `Salary_Mode`, `Status`, `EmployeeNo`, `Employee_Manager`, `Joining_Date`, `Contract_Expiry_Date`, `Last_Working_Date`, `Attendance_Supervisor`, `Duty_Location`, `Duty_Point`,`type`, `DY_Supervisor`, `TypeEmp`) VALUES ('$Image_name','$fName','$mName','$lName','$father_Name','$CNIC','$email','$pAddress','$cAddress','$city','$postAddress','$mNumber','$ofphNumber','$Alternate_Number','$DofB','$religion','$gender','$BlGroup','$Domicile','$MaritalStatus','$NextofKin','$NextofKinCellNumber','$ContactPerson','$CPCN','$Employement_Group','$Employee_Class','$Employee_Group','$Employee_Sub_Group','$Employee_Quota','$Salary_Bank','$Salary_Branch','$Account_No','$Pay_Type','$EOBI_No','$Bill_Walved_Off','$Weekly_Working_Days','$Bill_Waived_Off','$Employee_Pay_Classification','$Grade_tma','$Department','$Job_Tiltle','$Salary_Mode','NEW','$EmployeeNowssp','$Employee_Manager','$Joining_Date','$Contract_Expiry_Date','$Last_Working_Date','$Attendance_Supervisor','$Duty_Location','$Duty_Point','$Type', '$DY_Supervisor','$DepartmentType')";
$query= mysqli_query($conn,$insertquery);
if($query)
{
    echo '<script>alert("Data is inserted");</script>';
     ?>
            <script>
                location.replace('Qualification.php?updat=<?php echo $EmployeeNowssp?>#section3');
            </script>
     <?php
}
else{
echo '<script>alert("Sorry Data is not inserted");</script>'; 
}
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <?php include ('link/links.php')?>
</head>
<style>
    .select2-selection__rendered {
      line-height: 31px !important;

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
    label span{
      color: red;
    }
    
    </style>
<body>
    <?php include ('link/desigene/sidebar.php')?>
    <div id="main">
      <?php include('link/desigene/navbar.php')?>
      <!-- form start -->
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
                            <input id="file1" name="image" onchange="document.getElementById('log1').src = window.URL.createObjectURL(this.files[0])" type="file" accept="image/*" class="form-control" style="overflow: hidden;" placeholder="Insert Your Image">
                        </div>
                      </div>
                      <div class="col-md-4 my-2"></div>
                      <div class="col-md-4 my-2 ">
                        <div class="form-group mr-3 mt-0">
                          <img id="log1" class="shadow" style="border: 1px blue solid; border-radius: 10%; margin-top: -4%" src="images/file_icon.png" width="120px;" height="130px">
                        </div>
                      </div>
                      <div class="col-md-4 my-2">
                        <div class="form-group">
                          <label>First Name<span>*</span></label>
                          <input id="fName" required type="text" name="fName" placeholder="First Name" class="form-control" autocomplete="off" >
                        </div>
                      </div>
                      <div class="col-md-4 my-2">
                        <div class="form-group">
                          <label>Middle Name</label>
                          <input id="mName" type="text" name="mName" placeholder="Middle Name" class="form-control" autocomplete="off">
                        </div>
                      </div>
                      <div class="col-md-4 my-2">
                        <div class="form-group">
                          <label>Last Name</label>
                          <input id="lName" type="text" name="lName" placeholder="Last Name" class="form-control" autocomplete="off" >
                        </div>
                      </div> 
                      <div class="col-md-4 my-2">
                        <div class="form-group">
                          <label>Father Name<span>*</span></label>
                          <input id="FatherName" required type="text" name="father_Name" placeholder="Father Name" class="form-control" autocomplete="off" >
                        </div>
                      </div> 
                      <div class="col-md-4 my-2">
                      <div class="form-group">
                          <label>CNIC <span style="font-size: x-small; font-weight: initial;" >(witout dash -)</span> </label>
                          <input id="cNo" type="number" name="CNIC" placeholder="CNIC" class="form-control" autocomplete="off" oninput="validateCNIC(this)">
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
                          <label>Email address<span>*</span></label>
                          <input id="email" required type="Email" name="email" placeholder="Email" class="form-control" autocomplete="off" >
                        </div>
                      </div>
                      <div class="col-md-4 my-2">
                        <div class="form-group">
                          <label>Permanent Address</label>
                          <input id="PAddress" type="text" name="pAddress" placeholder="Permenent Address" class="form-control" autocomplete="off" >
                        </div>
                      </div>
                      <div class="col-md-4 my-2">
                        <div class="form-group">
                          <label>Current Address</label>
                          <input id="CAddress" type="text" name="cAddress" placeholder="Current Address" class="form-control" autocomplete="off" >
                        </div>
                      </div>
                      <div class="col-md-4 my-2">
                        <div class="form-group">
                          <label>City</label>
                          <input id="city" type="text" name="city" placeholder="City" class="form-control" autocomplete="off" >
                        </div>
                      </div>
                      <div class="col-md-4 my-2">
                        <div class="form-group">
                          <label>Postal Address</label>
                          <input id="PAddress" type="text" name="postAddress" placeholder="Postal Address" class="form-control" autocomplete="off" >
                        </div>
                      </div>
                      <div class="col-md-4 my-2">
                        <div class="form-group">
                          <label>Mobile Number</label>
                          <input id="moNum" type="number" name="mNumber" placeholder="Mobile Number" class="form-control" autocomplete="off" >
                        </div>
                      </div>
                      <div class="col-md-4 my-2">
                        <div class="form-group">
                          <label>Office Phone Number</label>
                          <input id="OfPNum" type="number" name="ofphNumber" placeholder="Office Number" class="form-control" autocomplete="off" >
                        </div>
                      </div>
                      <div class="col-md-4 my-2">
                        <div class="form-group">
                          <label>Alternate Number</label>
                          <input id="ANum" type="number" name="Alternate_Number" placeholder="Alternate Number" class="form-control" autocomplete="off" >
                        </div>
                      </div>
                      <div class="col-md-4 my-2">
                        <div class="form-group">
                          <label>Date of Birth<span>*</span></label>
                          <input id="DofB" required type="Date" name="DofB" class="form-control" autocomplete="off" >
                        </div>
                      </div>
                      <div class="col-md-4 my-2">
                        <div class="form-group">
                          <label>Religion</label>
                          <input id="Religion" type="text" name="religion" placeholder="Religion" class="form-control" autocomplete="off" >
                        </div>
                      </div>
                      <div class="col-md-4 my-2">
                        <div class="form-group">
                          <label>Gender<span>*</span></label>
                          <select name="gender" required id="" class="form-control select2">
                              <option value="">Choose</option>
                              <option value="Mail">Male</option>
                              <option value="Female">Female</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4 my-2">
                        <div class="form-group">
                          <label>Blood Group</label>
                          <input id="BlGroup" type="text" name="BlGroup" placeholder="Blood Group" class="form-control" autocomplete="off" >
                        </div>
                      </div>
                      <div class="col-md-4 my-2">
                        <div class="form-group">
                          <label>Domicile</label>
                          <input id="Domicile" type="text" name="Domicile" placeholder="Domicile" class="form-control" autocomplete="off" >
                        </div>
                      </div>
                      <div class="col-md-4 my-2">
                        <div class="form-group">
                          <label>Marital Status </label>
                          <select name="MaritalStatus" id="MaritalStatus" class="form-control select2">
                              <option value="">Choose</option>
                              <option value=" Married"> Married</option>
                              <option value=" Unmarried"> Unmarried</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4 my-2">
                        <div class="form-group">
                          <label>Next of Kin</label>
                          <input id="NextofKin" type="text" name="NextofKin" placeholder="Next of Kin" class="form-control" autocomplete="off" >
                        </div>
                      </div>
                      <div class="col-md-4 my-2">
                        <div class="form-group">
                          <label>Next of Kin Cell Number</label>
                          <input id="NextofKinCellNumber" type="number" name="NextofKinCellNumber" placeholder="Next of Kin Cell Number " class="form-control" autocomplete="off" >
                        </div>
                      </div>                   
                      <div class="col-md-4 my-2">
                        <div class="form-group">
                          <label>Name of Contact Person</label>
                          <input id="ContactPerson" type="text" name="ContactPerson" placeholder="Contact Person " class="form-control" autocomplete="off" >
                        </div>
                      </div>                    
                      <div class="col-md-4 my-2">
                        <div class="form-group">
                          <label>Contact Person Cell Number</label>
                          <input id="CPCN" type="number" name="CPCN" placeholder="Contact Person Cell Number " class="form-control" autocomplete="off" >
                        </div>
                      </div>
                  </div>     
                  <div class=" text-end">
                      <button style="background-color: darkblue;" class="btn text-white shadow float-right" type="button" onclick="validateSection1()">Next</button>
                  </div>
                </div>
              </div>
              <div id="section2" style="display: none;">
                    <div class="row my-4">
                      <div class="col-md-12 ">
                        <div class="card card-success border border-2 border-dark bg-light">
                          <div style="background-color: darkblue;" class="card-header text-white fw-bold">
                            <div class="row">
                              <div class="col-sm-12 col-lg-5">
                                <div class="card-title text-white" style="width:fit-content;">Employement Information
                                </div>
                              </div>
                              <div class="col-sm-12 col-lg-7">
                                <h3 class="bg-primary p-2 rounded" style="width:fit-content;">WSSC</h3>
                              </div>
                            </div>  
                          </div>
                          <br>
                          <div class="card-body ">
                            <div class="row">
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employement Group<span>*</span></label>
                                  <select name="Employement_Group" required id="Employement_Group_drop" class="form-control select2">
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Class<span>*</span></label>
                                  <select name="Employee_Class" required id="Employee_Class_drop" class="form-control select2">
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Group<span>*</span></label>
                                   <select name="Employee_Group" required id="Employee_Group_drop" class="form-control select2">
                                   </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Sub Group<span>*</span></label>
                                  <select name="Employee_Sub_Group" required id="Employee_Sub_Group_drop" class="form-control select2" >
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Quota</label>
                                  <select name="Employee_Quota" id="Employee_Quota_drop" class="form-control select2">
                                  </select>
                                </div>
                              </div>
                              
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Salary Bank</label>
                                  <select name="Salary_Bank" id="SalaryBank_drop" class="form-control select2">
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Salary Bank Branch</label>
                                  <select name="Salary_Branch" id="SalaryBankBranch_drop" class="form-control select2">
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Account No</label>
                                  <input type="text" class="form-control" name="Account_No" placeholder="Account No" >
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Pay Type</label>
                                  <select name="Pay_Type" id="PayType_drop" class="form-control select2">
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>EOBI No</label>
                                  <input type="text" class="form-control" name="EOBI_No" placeholder="EOBI No" >
                                </div>
                              </div>
                              
                              <div class="col-md-4 my-2">
                                  <div class="form-group">
                                      <label>Bill Waived Off</label>
                                      <select name="Bill_Waived_Off" id="Bill_Waived_Off" class="form-control select2" onchange="toggleVisibility()">
                                          <option value="NO" selected>NO</option>
                                          <option value="YES">YES</option>
                                      </select>
                                  </div>
                              </div>

                              <div class="col-md-4 my-2" id="billWiaivedoff">
                                  <div class="form-group">
                                      <label>Bill Waived Off</label>
                                      <input type="text" class="form-control" name="Bill_Walved_Off" placeholder="Bill Waived Off">
                                  </div>
                              </div>

                              <script>
                                  // Function to toggle visibility based on the selected value
                                  function toggleVisibility() {
                                      // Get the selected value
                                      var selectedValue = document.getElementById('Bill_Waived_Off').value;

                                      // Get the element with id "billWiaivedoff"
                                      var billWiaivedoffElement = document.getElementById('billWiaivedoff');

                                      // Toggle visibility based on the selected value
                                      billWiaivedoffElement.style.display = selectedValue === 'YES' ? 'block' : 'none';
                                  }

                                  // Call toggleVisibility after the DOM has fully loaded
                                  document.addEventListener('DOMContentLoaded', function() {
                                      toggleVisibility();
                                  });
                              </script>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Weekly Working Days<span>*</span></label>
                                  <select name="Weekly_Working_Days" required id="WeeklyWorkingDays_drop" class="form-control select2">
                                  </select>
                                </div>
                              </div>
                              
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Pay Classification<span>*</span></label>
                                  <input type="text" required class="form-control" name="Employee_Pay_Classification" placeholder="Employee Pay Classification" >
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Grade<span>*</span></label>
                                  <select name="Grade" required id="Grade_drop" class="form-control select2">
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Department<span>*</span></label>
                                  <select name="Department" required id="Department_drop" class="form-control select2">
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Job Tiltle<span>*</span></label>
                                  <select name="Job_Tiltle" required id="Job_Tiltle_drop" class="form-control select2">
                                   </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Type Accordingly login<span>*</span></label>
                                  <select name="Type" required id="Type_drop" class="form-control select2">
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Department Type<span>*</span></label>
                                  <select name="DepartmentType" required id="" class="form-control select2">
                                    <option value="WSSC">WSSC</option>
                                    <option value="TMA">TMA</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Salary Mode</label>
                                  <select name="Salary_Mode" id="Salary_Mode_drop" class="form-control select2">
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Status</label>
                                    <select name="Status" disabled id="Status_drop" class="form-control select2">
                                      </select>
                                    </div>
                                  </div>
                                <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee NO<span>*</span></label>
                                  <input type="text" id="EmployeeNowssp" name="EmployeeNo" placeholder="Employee NO" class="form-control" autocomplete="off" required >
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label class="form-label" >Manager ID No<span>*</span></label>
                                  <div>
                                    <select name="Employee_Manager" required id="employee_no" class="form-control select2">
                                      </select>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label> Attendance Supervisor<span>*</span></label>
                                    <select name="Attendance_Supervisor" required id="superviser" class="form-control select2">
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>DY.Manager </label>
                                    <select name="DY_Supervisor" id="DY_Supervisor" class="form-control select2">
                                    </select>
                                  </div>
                                </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Joining Date<span>*</span></label>
                                  <input type="date" name="Joining_Date" require id="Joining_Date" placeholder="Joining Date" class="form-control" autocomplete="off" >
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Contract Expiry Date<span>*</span></label>
                                  <input type="date" required name="Contract_Expiry_Date" placeholder="" class="form-control" autocomplete="off" >
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Last Working Date<span>*</span></label>
                                  <input type="date" required name="Last_Working_Date" placeholder="" class="form-control" autocomplete="off" >
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Duty Location</label>
                                  <input type="text" name="Duty_Location" id="Duty_Location" placeholder="Duty Location" class="form-control" autocomplete="off" >
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Duty Point</label>
                                  <input type="text" name="Duty_Point" id="Duty_Point" placeholder="Duty Point" class="form-control" autocomplete="off" >
                                </div>
                              </div>
                              <div class="col-md-12 text-end mt-2">
                                <input style="background-color: darkblue;" onclick="backToSection1()" type="button" class="btn text-white  float-right shadow" value="Back">
                                <input style="background-color: darkblue;" name="submit" type="submit" class="btn text-white  float-right shadow" value="Submit">
                                
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
   

    function loadEmpGroup(){ // renamed the function here
        $.ajax({
            url : "ajex/EmpGroup - Copy.php",
            type:"POST",
            success : function(data){
                $("#Employement_Group_drop").html(data);
            }
        });
    }
      loadEmpGroup();

      function loadEmployee_Class(){
        $.ajax({
          url : "ajex/Employee_Class - Copy.php",
          type:"POST",
          success : function(data){
            $("#Employee_Class_drop").html(data);
          }
        });
      }
      loadEmployee_Class();

      function loadEmployee_Group(){
        $.ajax({
          url : "ajex/Employee_Group - Copy.php",
          type:"POST",
          success : function(data){
            $("#Employee_Group_drop").html(data);
          }
        });
      }
      loadEmployee_Group();

      
      function loadEmployee_Sub_Group(){
        $.ajax({
          url : "ajex/Employee_Sub_Group - Copy.php",
          type:"POST",
          success : function(data){
            $("#Employee_Sub_Group_drop").html(data);
          }
        });
      }
      loadEmployee_Sub_Group();

      function loadEmployee_Quota(){
        $.ajax({
          url : "ajex/Employee_Quota - Copy.php",
          type:"POST",
          success : function(data){
            $("#Employee_Quota_drop").html(data);
          }
        });
      }
      loadEmployee_Quota();

      function loadSalaryBank(){
        $.ajax({
          url : "ajex/SalaryBank - Copy.php",
          type:"POST",
          success : function(data){
            $("#SalaryBank_drop").html(data);
          }
        });
      }
      loadSalaryBank();
      function loadSalaryBankBranch(){
        $.ajax({
          url : "ajex/SalaryBankBranch - Copy.php",
          type:"POST",
          success : function(data){
            $("#SalaryBankBranch_drop").html(data);
          }
        });
      }
      loadSalaryBankBranch();
      function loadPayType(){
        $.ajax({
          url : "ajex/PayType - Copy.php",
          type:"POST",
          success : function(data){
            $("#PayType_drop").html(data);
          }
        });
      }
      loadPayType();
      function loadWeeklyWorkingDays(){
        $.ajax({
          url : "ajex/WeeklyWorkingDays - Copy.php",
          type:"POST",
          success : function(data){
            $("#WeeklyWorkingDays_drop").html(data);
          }
        });
      }
      loadWeeklyWorkingDays();

      function loadGrade(){
        $.ajax({
          url : "ajex/Grade - Copy.php",
          type:"POST",
          success : function(data){
            $("#Grade_drop").html(data);
          }
        });
      }
      loadGrade();
      function loadDepartment(){
        $.ajax({
          url : "ajex/Department - Copy.php",
          type:"POST",
          success : function(data){
            $("#Department_drop").html(data);
          }
        });
      }
      loadDepartment();
      function loadJob_Tiltle(){
     $.ajax({
       url : "ajex/Job_Tiltle - Copy.php",
       type:"POST",
       success : function(data){
         console.log(data); // Log the response to the console
         $("#Job_Tiltle_drop").html(data);
       }
     });
   }
   loadJob_Tiltle();

      function loadType(){
        $.ajax({
          url : "ajex/Type - Copy.php",
          type:"POST",
          success : function(data){
            $("#Type_drop").html(data);
          }
        });
      }
      loadType();
      function loadSalary_Mode(){
        $.ajax({
          url : "ajex/Salary_Mode - Copy.php",
          type:"POST",
          success : function(data){
            $("#Salary_Mode_drop").html(data);
          }
        });
      }
      loadSalary_Mode();
      function loadStatus(){
        $.ajax({
          url : "ajex/Status - Copy.php",
          type:"POST",
          success : function(data){
            $("#Status_drop").html(data);
          }
        });
      }
      loadStatus();

    
});

function validateSection1() {
  // Get the entered CNIC number

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