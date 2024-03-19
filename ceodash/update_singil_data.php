<?php
session_start();
error_reporting(0);
// links to database
include('link/desigene/db.php');
if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber']) || $_SESSION['Designation'] != 'CEO') {
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
  $IdUpdate=$_POST['Id'];
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
$Employee_Status = $_POST ["Status"];
$emptype = $_POST ["DepartmentType"];
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
if($Image_error==0)
{
    $Image_save='../image/'.$Image_name;
    // echo $Image_save;
    move_uploaded_file($Image_path, $Image_save);  
}else{
    echo '<script>alert("Picture is not uploaded Kindli update");</script>';
}
// SQL query for insertion
$insertquery = "INSERT INTO `employeedataupdate`( `IdUpdate`, `imageUpdate`, `fNameUpdate`, `mNameUpdate`, `lNameUpdate`, `father_NameUpdate`, `CNICUpdate`, `emailUpdate`, `pAddressUpdate`, `cAddressUpdate`, `cityUpdate`, `postAddressUpdate`, `mNumberUpdate`, `ofphNumberUpdate`, `Alternate_NumberUpdate`, `DofBUpdate`, `religionUpdate`, `genderUpdate`, `BlGroupUpdate`, `DomicileUpdate`, `MaritalStatusUpdate`, `NextofKinUpdate`, `NextofKinCellNumberUpdate`, `ContactPersonUpdate`, `CPCNUpdate`, `Employement_GroupUpdate`, `Employee_ClassUpdate`, `Employee_GroupUpdate`, `Employee_Sub_GroupUpdate`, `Employee_QuotaUpdate`, `Salary_BankUpdate`, `Salary_BranchUpdate`, `Account_NoUpdate`, `Pay_TypeUpdate`, `EOBI_NoUpdate`, `Bill_Walved_OffUpdate`, `Weekly_Working_DaysUpdate`, `Bill_Waived_OffUpdate`, `Employee_Pay_ClassificationUpdate`, `GradeUpdate`, `DepartmentUpdate`, `Job_TiltleUpdate`, `Salary_ModeUpdate`, `StatusUpdate`, `EmployeeNoUpdate`, `Employee_ManagerUpdate`, `Joining_DateUpdate`, `Contract_Expiry_DateUpdate`, `Last_Working_DateUpdate`, `Attendance_SupervisorUpdate`, `Duty_LocationUpdate`, `Duty_PointUpdate`, `Emptype`, `typeUpdate`, `DY_SupervisorUpdate`, `leaveAlreadyAvailedUpdate`) VALUES ( '$IdUpdate', '$Image_name', '$fName', '$mName', '$lName', '$father_Name', '$CNIC', '$email', '$pAddress', '$cAddress', '$city', '$postAddress', '$mNumber', '$ofphNumber', '$Alternate_Number', '$DofB', '$religion', '$gender', '$BlGroup', '$Domicile', '$MaritalStatus', '$NextofKin', '$NextofKinCellNumber', '$ContactPerson', '$CPCN', '$Employement_Group', '$Employee_Class', '$Employee_Group', '$Employee_Sub_Group', '$Employee_Quota', '$Salary_Bank', '$Salary_Branch', '$Account_No', '$Pay_Type', '$EOBI_No', '$Bill_Walved_Off', '$Weekly_Working_Days', '$Bill_Waived_Off', '$Employee_Pay_Classification', '$Grade_tma', '$Department', '$Job_Tiltle', '$Salary_Mode', '$Employee_Status', '$EmployeeNowssp', '$Employee_Manager', '$Joining_Date', '$Contract_Expiry_Date', '$Last_Working_Date', '$Attendance_Supervisor', '$Duty_Location', '$Duty_Point', 'NEW', '$Type', '$DY_Supervisor', '34')";
$query = mysqli_query($conn, $insertquery);
if ($query) {
    echo '<script>alert("Data is inserted");</script>';
    header("Location: new_employeeupdate.php");
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
  </style>
<body>
    <div id="main">
      <?php include('link/desigene/navbar.php')?> 
      <form id="myForm" method="post" enctype="multipart/form-data">
        <div class="container-fluid">
          <div class="row my-4">
            <div class="col-md-12 ">
              <?php 
                $id = $_GET['id'];
                $select = mysqli_query($conn,"SELECT * FROM `employeedata` WHERE `Id` = $id");
                while($fetchdata=mysqli_fetch_array($select)){
                ?>
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
                          <input value="<?php echo $fetchdata['lName']?>" id="lName" type="text" name="lName" placeholder="Last Name" class="form-control" autocomplete="off" >
                        </div>
                      </div> 
                      <div class="col-md-4 my-2">
                        <div class="form-group">
                          <label>Father Name</label>
                          <input value="<?php echo $fetchdata['father_Name']?>" id="FatherName" type="text" name="father_Name" placeholder="Father Name" class="form-control" autocomplete="off" >
                        </div>
                      </div> 
                      <div class="col-md-4 my-2">
                        <div class="form-group">
                          <label>CNIC</label>
                          <input value="<?php echo $fetchdata['CNIC']?>" id="cNo" type="text" name="CNIC" placeholder="CNIC" class="form-control" autocomplete="off" >
                        </div>
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
                          <input value="<?php echo $fetchdata['pAddress']?>" id="PAddress" type="text" name="pAddress" placeholder="Permenent Address" class="form-control" autocomplete="off" >
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
                                <option value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
                                <option <?php echo ($fetchdata['religion'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
                                <?php   
                                }
                            }
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
                              <option <?php echo ($fetchdata['gender'] =='Female') ? 'selected' : ''; ?> value="Female">Female</option>
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
                          <input value="<?php echo $fetchdata['Domicile']?>" id="Domicile" type="text" name="Domicile" placeholder="Domicile" class="form-control" autocomplete="off" >
                        </div>
                      </div>
                      <div class="col-md-4 my-2">
                        <div class="form-group">
                          <label>Marital Status </label>
                          <select name="MaritalStatus" id="MaritalStatus" class="form-control ">
                              <option <?php echo ($fetchdata['MaritalStatus'] == '') ? 'selected' : ''; ?> value="">Choose</option>
                              <option <?php echo ($fetchdata['MaritalStatus'] == 'Married') ? 'selected' : ''; ?> value=" Married"> Married</option>
                              <option <?php echo ($fetchdata['MaritalStatus'] == 'Unmarried') ? 'selected' : ''; ?> value=" Unmarried"> Unmarried</option>
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
                          <input value="<?php echo $fetchdata['NextofKinCellNumber']?>" id="NextofKinCellNumber" type="text" name="NextofKinCellNumber" placeholder="Next of Kin Cell Number " class="form-control" autocomplete="off" >
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
                          <input value="<?php echo $fetchdata['CPCN']?>" id="CPCN" type="text" name="CPCN" placeholder="Contact Person Cell Number " class="form-control" autocomplete="off" >
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
                                  <label>Employement Group</label>
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
                                  <label>Employee Class</label>
                                  <select name="Employee_Class" id="Employee_Class_drop" class="form-control ">
                                <?php
                                    include ('../link/desigene/db.php');
                                    $select = mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='Employee_Class'");
                                    if(mysqli_num_rows($select)>0){
                                    ?>
                                        <option value="" <?php echo ($fetchdata['Employee_Class'] == '') ? 'selected' : ''; ?>>Select</option>
                                    <?php
                                        while($row=mysqli_fetch_assoc($select)){
                                        ?>
                                        <option <?php echo ($fetchdata['Employee_Class'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
                                        <?php   
                                        }
                                    }
                                    ?>  
                                </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Group</label>
                                   <select name="Employee_Group" id="Employee_Group_drop" class="form-control ">
                                <?php
                                    include ('../link/desigene/db.php');
                                    $select = mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='Employee_Group'");
                                    if(mysqli_num_rows($select)>0){
                                    ?>
                                        <option value="" <?php echo ($fetchdata['Employee_Group'] == '') ? 'selected' : ''; ?>>Select</option>
                                    <?php
                                        while($row=mysqli_fetch_assoc($select)){
                                        ?>
                                        <option <?php echo ($fetchdata['Employee_Group'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
                                        <?php   
                                        }
                                    }
                                    ?>   
                                </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Sub Group</label>
                                  <select name="Employee_Sub_Group" id="Employee_Sub_Group_drop" class="form-control " >
                                <?php
                                    include ('../link/desigene/db.php');
                                    $select = mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='Employee_Sub_Group'");
                                    if(mysqli_num_rows($select)>0){
                                    ?>
                                        <option value="" <?php echo ($fetchdata['Employee_Sub_Group'] == '') ? 'selected' : ''; ?>>Select</option>
                                    <?php
                                        while($row=mysqli_fetch_assoc($select)){
                                        ?>
                                        <option <?php echo ($fetchdata['Employee_Sub_Group'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
                                        <?php   
                                        }
                                    }
                                    ?>  
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
                                <?php
                                    include ('../link/desigene/db.php');
                                    $select = mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='SalaryBankBranch'");
                                    if(mysqli_num_rows($select)>0){
                                    ?>
                                        <option value="" <?php echo ($fetchdata['Salary_Branch'] == '') ? 'selected' : ''; ?>>Select</option>
                                    <?php
                                        while($row=mysqli_fetch_assoc($select)){
                                        ?>
                                        <option <?php echo ($fetchdata['Salary_Branch'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
                                        <?php   
                                        }
                                    }
                                    ?>  
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
                                  <select name="Grade" id="Grade_drop" class="form-control ">
                                <?php
                                    include ('../link/desigene/db.php');
                                    $select = mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='Grade'");
                                    if(mysqli_num_rows($select)>0){
                                    ?>
                                        <option value="" <?php echo ($fetchdata['Grade'] == '') ? 'selected' : ''; ?>>Select</option>
                                    <?php
                                        while($row=mysqli_fetch_assoc($select)){
                                        ?>
                                        <option <?php echo ($fetchdata['Grade'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
                                        <?php   
                                        }
                                    }
                                    ?>  
                                </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Department</label>
                                  <select name="Department" id="Department_drop" class="form-control ">
                                <?php
                                    include ('../link/desigene/db.php');
                                    $select = mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='Department'");
                                    if(mysqli_num_rows($select)>0){
                                    ?>
                                        <option value="" <?php echo ($fetchdata['Department'] == '') ? 'selected' : ''; ?>>Select</option>
                                    <?php
                                        while($row=mysqli_fetch_assoc($select)){
                                        ?>
                                        <option <?php echo ($fetchdata['Department'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
                                        <?php   
                                        }
                                    }
                                    ?>  
                                </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Job Tiltle</label>
                                  <select name="Job_Tiltle" id="Job_Tiltle_drop" class="form-control ">
                                <?php
                                    include ('../link/desigene/db.php');
                                    $select = mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='Job_Tiltle'");
                                    if(mysqli_num_rows($select)>0){
                                    ?>
                                        <option value="" <?php echo ($fetchdata['Job_Tiltle'] == '') ? 'selected' : ''; ?>>Select</option>
                                    <?php
                                        while($row=mysqli_fetch_assoc($select)){
                                        ?>
                                        <option <?php echo ($fetchdata['Job_Tiltle'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
                                        <?php   
                                        }
                                    }
                                    ?>   
                                </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Type Accordingly login</label>
                                  <select name="Type" id="Type_drop" class="form-control ">
                                <?php
                                    include ('../link/desigene/db.php');
                                    $select = mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='type'");
                                    if(mysqli_num_rows($select)>0){
                                    ?>
                                        <option value="" <?php echo ($fetchdata['type'] == '') ? 'selected' : ''; ?>>Select</option>
                                    <?php
                                        while($row=mysqli_fetch_assoc($select)){
                                        ?>
                                        <option <?php echo ($fetchdata['type'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
                                        <?php   
                                        }
                                    }
                                    ?>  
                                </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Department Type<span>*</span></label>
                                  <select name="DepartmentType" required id="" class="form-control select2">
                                    <option <?php echo ($fetchdata['TypeEmp'] == 'WSSC') ? 'selected' : ''; ?> value="WSSC">WSSC</option>
                                    <option <?php echo ($fetchdata['TypeEmp'] == 'TMA') ? 'selected' : ''; ?> value="TMA">TMA</option>
                                  </select>
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
                                    include ('../link/desigene/db.php');
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
                      <?php } ?>
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
            // Initialize the datepicker with your desired format
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
   

//     function loadEmpGroup(){ // renamed the function here
//         $.ajax({
//             url : "ajex/EmpGroup - Copy.php",
//             type:"POST",
//             success : function(data){
//                 $("#Employement_Group_drop").html(data);
//             }
//         });
//     }
//       loadEmpGroup();
      
//       function loadEmployee_Class(){
//         $.ajax({
//           url : "ajex/Employee_Class - Copy.php",
//           type:"POST",
//           success : function(data){
//             $("#Employee_Class_drop").html(data);
//           }
//         });
//       }
//       loadEmployee_Class();

//       function loadEmployee_Group(){
//         $.ajax({
//           url : "ajex/Employee_Group - Copy.php",
//           type:"POST",
//           success : function(data){
//             $("#Employee_Group_drop").html(data);
//           }
//         });
//       }
//       loadEmployee_Group();

      
//       function loadEmployee_Sub_Group(){
//         $.ajax({
//           url : "ajex/Employee_Sub_Group - Copy.php",
//           type:"POST",
//           success : function(data){
//             $("#Employee_Sub_Group_drop").html(data);
//           }
//         });
//       }
//       loadEmployee_Sub_Group();

//       function loadEmployee_Quota(){
//         $.ajax({
//           url : "ajex/Employee_Quota - Copy.php",
//           type:"POST",
//           success : function(data){
//             $("#Employee_Quota_drop").html(data);
//           }
//         });
//       }
//       loadEmployee_Quota();

//       function loadGrade(){
//         $.ajax({
//           url : "ajex/Grade - Copy.php",
//           type:"POST",
//           success : function(data){
//             $("#Grade_drop").html(data);
//           }
//         });
//       }
//       loadGrade();
//       function loadDepartment(){
//         $.ajax({
//           url : "ajex/Department - Copy.php",
//           type:"POST",
//           success : function(data){
//             $("#Department_drop").html(data);
//           }
//         });
//       }
//       loadDepartment();
//       function loadJob_Tiltle(){
//      $.ajax({
//        url : "ajex/Job_Tiltle - Copy.php",
//        type:"POST",
//        success : function(data){
//          console.log(data); // Log the response to the console
//          $("#Job_Tiltle_drop").html(data);
//        }
//      });
//    }
//    loadJob_Tiltle();

//       function loadType(){
//         $.ajax({
//           url : "ajex/Type - Copy.php",
//           type:"POST",
//           success : function(data){
//             $("#Type_drop").html(data);
//           }
//         });
//       }
//       loadType();
//       function loadSalary_Mode(){
//         $.ajax({
//           url : "ajex/Salary_Mode - Copy.php",
//           type:"POST",
//           success : function(data){
//             $("#Salary_Mode_drop").html(data);
//           }
//         });
//       }
//       loadSalary_Mode();
//       function loadStatus(){
//         $.ajax({
//           url : "ajex/Status - Copy.php",
//           type:"POST",
//           success : function(data){
//             $("#Status_drop").html(data);
//           }
//         });
//       }
//       loadStatus();
//       function loadEmployement_Group_TMA(){
//         $.ajax({
//           url : "ajex/Employement_Group_TMA - Copy.php",
//           type:"POST",
//           success : function(data){
//             $("#Employement_Group_TMA_drop").html(data);
//           }
//         });
//       }
//       loadEmployement_Group_TMA();
//       function loadEmployee_Class_TMA(){
//         $.ajax({
//           url : "ajex/Employee_Class_TMA - Copy.php",
//           type:"POST",
//           success : function(data){
//             $("#Employee_Class_TMA_drop").html(data);
//           }
//         });
//       }
//       loadEmployee_Class_TMA();
//       function loadEmployee_Group_TMA(){
//         $.ajax({
//           url : "ajex/Employee_Group_TMA - Copy.php",
//           type:"POST",
//           success : function(data){
//             $("#Employee_Group_TMA_drop").html(data);
//           }
//         });
//       }
//       loadEmployee_Group_TMA();
//       function loadEmployee_Sub_Group_TMA(){
//         $.ajax({
//           url : "ajex/Employee_Sub_Group_TMA - Copy.php",
//           type:"POST",
//           success : function(data){
//             $("#Employee_Sub_Group_TMA_drop").html(data);
//           }
//         });
//       }
//       loadEmployee_Sub_Group_TMA();
//       function loadEmployee_Quota_TMA(){
//         $.ajax({
//           url : "ajex/Employee_Quota_TMA - Copy.php",
//           type:"POST",
//           success : function(data){
//             $("#Employee_Quota_TMA_drop").html(data);
//           }
//         });
//       }
//       loadEmployee_Quota_TMA();
//        function loadGrade_TMA(){
//         $.ajax({
//           url : "ajex/Grade_TMA - Copy.php",
//           type:"POST",
//           success : function(data){
//             $("#Grade_TMA_drop").html(data);
//           }
//         });
//       }
//       loadGrade_TMA();
//       function loadDepartment_TMA(){
//         $.ajax({
//           url : "ajex/Department_TMA - Copy.php",
//           type:"POST",
//           success : function(data){
//             $("#Department_TMA_drop").html(data);
//           }
//         });
//       }
//       loadDepartment_TMA();
//       function loadJob_Tiltle_TMA(){
//         $.ajax({
//           url : "ajex/Job_Tiltle_TMA - Copy.php",
//           type:"POST",
//           success : function(data){
//             $("#Job_Tiltle_TMA_drop").html(data);
//           }
//         });
//       }
//       loadJob_Tiltle_TMA();
//       function loadType_TMA(){
//         $.ajax({
//           url : "ajex/Type_TMA - Copy.php",
//           type:"POST",
//           success : function(data){
//             $("#Type_TMA_drop").html(data);
//           }
//         });
//       }
//       loadType_TMA();
//       function loadSalary_Mode_TMA(){
//         $.ajax({
//           url : "ajex/Salary_Mode_TMA - Copy.php",
//           type:"POST",
//           success : function(data){
//             $("#Salary_Mode_TMA_drop").html(data);
//           }
//         });
//       }
//       loadSalary_Mode_TMA();
//       function loadStatus_TMA(){
//         $.ajax({
//           url : "ajex/Status_TMA - Copy.php",
//           type:"POST",
//           success : function(data){
//             $("#Status_TMA_drop").html(data);
//           }
//         });
//       }
//       loadStatus_TMA();

    
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