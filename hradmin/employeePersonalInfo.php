<?php
session_start();
error_reporting(0);
// links to database
include('link/desigene/db.php');
if (strlen($_SESSION['loginid']==0)) {
?>   <script>
location.replace('../logout.php')
</script><?php
  } else
  {

?>
<?php 

if(isset($_POST['submit']))
{
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
$insertquery = "INSERT INTO `employeedata`(`image`, `fName`, `mName`, `lName`, `father_Name`, `CNIC`, `email`, `pAddress`, `cAddress`, `city`, `postAddress`, `mNumber`, `ofphNumber`, `Alternate_Number`, `DofB`, `religion`, `gender`, `BlGroup`, `Domicile`, `MaritalStatus`, `NextofKin`, `NextofKinCellNumber`, `ContactPerson`, `CPCN`, `Employement_Group`, `Employee_Class`, `Employee_Group`, `Employee_Sub_Group`, `Employee_Quota`, `Salary_Bank`, `Salary_Branch`, `Account_No`, `Pay_Type`, `EOBI_No`, `Bill_Walved_Off`, `Weekly_Working_Days`, `Bill_Waived_Off`, `Employee_Pay_Classification`, `Grade`, `Department`, `Job_Tiltle`, `Salary_Mode`, `Status`, `EmployeeNo`, `Employee_Manager`, `Joining_Date`, `Contract_Expiry_Date`, `Last_Working_Date`, `Attendance_Supervisor`, `Duty_Location`, `Duty_Point`,`type`,  `DY_Supervisor`) VALUES ('$Image_name','$fName','$mName','$lName','$father_Name','$CNIC','$email','$pAddress','$cAddress','$city','$postAddress','$mNumber','$ofphNumber','$Alternate_Number','$DofB','$religion','$gender','$BlGroup','$Domicile','$MaritalStatus','$NextofKin','$NextofKinCellNumber','$ContactPerson','$CPCN','$Employement_Group','$Employee_Class','$Employee_Group','$Employee_Sub_Group','$Employee_Quota','$Salary_Bank','$Salary_Branch','$Account_No','$Pay_Type','$EOBI_No','$Bill_Walved_Off','$Weekly_Working_Days','$Bill_Waived_Off','$Employee_Pay_Classification','$Grade_tma','$Department','$Job_Tiltle','$Salary_Mode','$Employee_Status','$EmployeeNowssp','$Employee_Manager','$Joining_Date','$Contract_Expiry_Date','$Last_Working_Date','$Attendance_Supervisor','$Duty_Location','$Duty_Point','$Type', '$DY_Supervisor')";
$query= mysqli_query($conn,$insertquery);
if($query)
{
    echo '<script>alert("Data is inserted");</script>';
     ?>
            <script>
                location.replace('Qualification.php?updat=<?php echo $CNIC?>#section3');
            </script>
     <?php
}
else{
echo '<script>alert("Sorry Data is not inserted");</script>'; 
}
}else if(isset($_POST['submit_TMA']))
{
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
$Employement_Group = $_POST ["Employement_Group_TMA"];
$Employee_Class = $_POST["Employee_Class_TMA"];
$Employee_Group = $_POST ["Employee_Group_TMA"];
$Employee_Sub_Group = $_POST ["Employee_Sub_Group_TMA"];
$Employee_Quota = $_POST ["Employee_Quota_TMA"];
$Grade_tma = $_POST ["Grade_TMA"]; 
$Department = $_POST ["Department_TMA"];
$Job_Tiltle = $_POST ["Job_Tiltle_TMA"];
$Salary_Mode = $_POST ["Salary_Mode_TMA"];
$Employee_Status = $_POST ["Status_TMA"];
$EmployeeNowssp = $_POST ["EmployeeNo_TMA"];
$Employee_Manager = $_POST ["Employee_Manager_TMA"];
$Joining_Date = $_POST ["Joining_Date_TMA"];
$Contract_Expiry_Date = $_POST ["Contract_Expiry_Date_TMA"];
$Last_Working_Date = $_POST ["Last_Working_Date_TMA"];
$Attendance_Supervisor = $_POST ["Attendance_Supervisor_TMA"];
$Duty_Location = $_POST ["Duty_Location_TMA"];
$Duty_Point = $_POST ["Duty_Point_TMA"];
$Salary_Bank = $_POST['Salary_Bank_TMA'];
$Salary_Branch = $_POST['Salary_Branch_TMA'];
$Account_No = $_POST['Account_No_TMA'];
$Pay_Type = $_POST['Pay_Type_TMA'];
$EOBI_No = $_POST['EOBI_No_TMA'];
$Bill_Walved_Off = $_POST['Bill_Walved_Off_TMA'];
$Weekly_Working_Days = $_POST['Weekly_Working_Days_TMA'];
$Bill_Waived_Off = $_POST['Bill_Waived_Off_TMA'];
$Employee_Pay_Classification = $_POST['Employee_Pay_Classification_TMA'];
$Type=$_POST['Type_TMA'];
$DY_Supervisor=$_POST['DY_Supervisor_TMA'];
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
$insertquery = "INSERT INTO `employeedata`(`image`, `fName`, `mName`, `lName`, `father_Name`, `CNIC`, `email`, `pAddress`, `cAddress`, `city`, `postAddress`, `mNumber`, `ofphNumber`, `Alternate_Number`, `DofB`, `religion`, `gender`, `BlGroup`, `Domicile`, `MaritalStatus`, `NextofKin`, `NextofKinCellNumber`, `ContactPerson`, `CPCN`, `Employement_Group`, `Employee_Class`, `Employee_Group`, `Employee_Sub_Group`, `Employee_Quota`, `Salary_Bank`, `Salary_Branch`, `Account_No`, `Pay_Type`, `EOBI_No`, `Bill_Walved_Off`, `Weekly_Working_Days`, `Bill_Waived_Off`, `Employee_Pay_Classification`, `Grade`, `Department`, `Job_Tiltle`, `Salary_Mode`, `Status`, `EmployeeNo`, `Employee_Manager`, `Joining_Date`, `Contract_Expiry_Date`, `Last_Working_Date`, `Attendance_Supervisor`, `Duty_Location`, `Duty_Point`, `type`,  `DY_Supervisor`) VALUES ('$Image_name','$fName','$mName','$lName','$father_Name','$CNIC','$email','$pAddress','$cAddress','$city','$postAddress','$mNumber','$ofphNumber','$Alternate_Number','$DofB','$religion','$gender','$BlGroup','$Domicile','$MaritalStatus','$NextofKin','$NextofKinCellNumber','$ContactPerson','$CPCN','$Employement_Group','$Employee_Class','$Employee_Group','$Employee_Sub_Group','$Employee_Quota','$Salary_Bank','$Salary_Branch','$Account_No','$Pay_Type','$EOBI_No','$Bill_Walved_Off','$Weekly_Working_Days','$Bill_Waived_Off','$Employee_Pay_Classification','$Grade_tma','$Department','$Job_Tiltle','$Salary_Mode','$Employee_Status','$EmployeeNowssp','$Employee_Manager','$Joining_Date','$Contract_Expiry_Date','$Last_Working_Date','$Attendance_Supervisor','$Duty_Location','$Duty_Point','$Type', '$DY_Supervisor')";
$query= mysqli_query($conn,$insertquery);
if($query)
{
    echo '<script>alert("Data is inserted");</script>';
     ?>
            <script>
                location.replace('Qualification.php?updat=<?php echo $CNIC?>#section3');
            </script>
     <?php
}
else{
echo '<script>alert("Sorry Data is not inserted");</script>'; 
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
                          <label>First Name</label>
                          <input id="fName" type="text" name="fName" placeholder="First Name" class="form-control" autocomplete="off" >
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
                          <label>Father Name</label>
                          <input id="FatherName" type="text" name="father_Name" placeholder="Father Name" class="form-control" autocomplete="off" >
                        </div>
                      </div> 
                      <div class="col-md-4 my-2">
                        <div class="form-group">
                          <label>CNIC</label>
                          <input id="cNo" type="text" name="CNIC" placeholder="CNIC" class="form-control" autocomplete="off" >
                        </div>
                      </div>
                      <div class="col-md-4 my-2">
                        <div class="form-group">
                          <label>Email address</label>
                          <input id="email" type="Email" name="email" placeholder="Email" class="form-control" autocomplete="off" >
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
                          <input id="moNum" type="text" name="mNumber" placeholder="Mobile Number" class="form-control" autocomplete="off" >
                        </div>
                      </div>
                      <div class="col-md-4 my-2">
                        <div class="form-group">
                          <label>Office Phone Number</label>
                          <input id="OfPNum" type="text" name="ofphNumber" placeholder="Office Number" class="form-control" autocomplete="off" >
                        </div>
                      </div>
                      <div class="col-md-4 my-2">
                        <div class="form-group">
                          <label>Alternate Number</label>
                          <input id="ANum" type="text" name="Alternate_Number" placeholder="Alternate Number" class="form-control" autocomplete="off" >
                        </div>
                      </div>
                      <div class="col-md-4 my-2">
                        <div class="form-group">
                          <label>Date of Birth</label>
                          <input id="DofB" type="Date" name="DofB" class="form-control" autocomplete="off" >
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
                          <label>Gender</label>
                          <select id="Gender" name="gender" id="" class="form-control select2">
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
                          <input id="NextofKinCellNumber" type="text" name="NextofKinCellNumber" placeholder="Next of Kin Cell Number " class="form-control" autocomplete="off" >
                        </div>
                      </div>                   
                      <div class="col-md-4 my-2">
                        <div class="form-group">
                          <label>Contact Person</label>
                          <input id="ContactPerson" type="text" name="ContactPerson" placeholder="Contact Person " class="form-control" autocomplete="off" >
                        </div>
                      </div>                    
                      <div class="col-md-4 my-2">
                        <div class="form-group">
                          <label>Contact Person Cell Number</label>
                          <input id="CPCN" type="text" name="CPCN" placeholder="Contact Person Cell Number " class="form-control" autocomplete="off" >
                        </div>
                      </div>
                  </div>     
                  <div class=" text-end">
                      <button style="background-color: darkblue;" class="btn text-white shadow float-right" type="button" onclick="validateSection1()">Next</button>
                    </div>
                </div>
              </div>
              <div id="section2" style="display: none;">
           
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active bg-primary text-white" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">WSSC</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link bg-success text-white" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">TMA</button>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <div class="row my-4">
                      <div class="col-md-12 ">
                        <div class="card card-success border border-2 border-dark bg-light">
                       
                          <div style="background-color: darkblue;" class="card-header text-white fw-bold">
                            <div class="row">
                              <div class="col-sm-12 col-lg-5">
                                <div class="card-title text-white" style="width: fit-content;">Employement Information
                                </div>
                              </div>
                              <div class="col-sm-12 col-lg-7">
                                <h3 class="bg-primary p-2 rounded" style="width: fit-content;">WSSC</h3>
                              </div>
                            </div>  
                          </div>
                       
                          <br>
                          <div class="card-body ">
                            <div class="row">
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employement Group</label>
                                  <select id="EmpGroup" name="Employement_Group" class="form-control select2">
                                    <option value="">Choose CONTRACTUAL/CONTINGENT</option>
                                    <option value="WSSC CONTRACTUAL">WSSC CONTRACTUAL</option>
                                    <option value="WSSC CONTINGENT">WSSC CONTINGENT</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Class</label>
                                  <select id="Employee_Class" name="Employee_Class" class="form-control select2">
                                    <option value="Wssc Pay">Wssc Pay</option>
                                    <option value="TMA Pay">TMA Pay</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Group</label>
                                  <select id="Employee_Group" name="Employee_Group" class="form-control select2">
                                    
                                    <option value="WSSCS-ADMIN PAY">WSSCS-ADMIN PAY</option>
                                    <option value="WSSCS-COMMERCIAL">WSSCS-COMMERCIAL</option>
                                    <option value="WSSCS-MANAGEMENT">WSSCS-MANAGEMENT</option>
                                    <option value="WSSCS-MSW PAY">WSSCS-MSW PAY</option>
                                    <option value="WSSCS-WATER PAY">WSSCS-WATER PAY</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Sub Group</label>
                                  <select name="Employee_Sub_Group" class="form-control select2" >
                                    <option value="WSSCS-ADMIN-CONTINGENT PAY">WSSCS-ADMIN-CONTINGENT PAY</option>
                                    <option value="WSSCS-ADMIN-CONTRACTUAL PAY">WSSCS-ADMIN-CONTRACTUAL PAY</option>
                                    <option value="WSSCS-COMMERCIAL-CONTINGENT">WSSCS-COMMERCIAL-CONTINGENT</option>
                                    <option value="WSSCS-COMMERCIAL-CONTRACT">WSSCS-COMMERCIAL-CONTRACT</option>
                                    <option value="WSSCS-MANAGEMENT">WSSCS-MANAGEMENT</option>
                                    <option value="WSSCS-MSW-CONTINGENT PAY">WSSCS-MSW-CONTINGENT PAY</option>
                                    <option value="WSSCS-MSW-CONTINGENT PAY (EXT.)">WSSCS-MSW-CONTINGENT PAY (EXT.)</option>
                                    <option value="WSSCS-MSW-CONTRACTUAL PAY">WSSCS-MSW-CONTRACTUAL PAY</option>
                                    <option value="WSSCS-WATER-CONTINGENT PAY">WSSCS-WATER-CONTINGENT PAY</option>
                                    <option value="WSSCS-WATER-CONTRACTUAL PAY">WSSCS-WATER-CONTRACTUAL PAY</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Quota</label>
                                  <select id="Employee_Quota" name="Employee_Quota" class="form-control select2">
                                    <option value="DECEASED SON">DECEASED SON</option>
                                    <option value="DISABLED">DISABLED</option>
                                    <option value="LETTER OF INTEREST">LETTER OF INTEREST</option>
                                    <option value="MINORITIES">MINORITIES</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Salary Bank</label>
                                  <input type="text" class="form-control" name="Salary_Bank" placeholder="Salary Bank" id="">
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Salary Branch</label>
                                  <input type="text" class="form-control" name="Salary_Branch" placeholder="Salary Branch" id="">
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Account No</label>
                                  <input type="text" class="form-control" name="Account_No" placeholder="Account No" id="">
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Pay Type</label>
                                  <input type="text" class="form-control" name="Pay_Type" placeholder="Pay Type" id="">
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>EOBI No</label>
                                  <input type="text" class="form-control" name="EOBI_No" placeholder="EOBI No" id="">
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Bill Walved Off</label>
                                  <input type="text" class="form-control" name="Bill_Walved_Off" placeholder="Bill Walved Off" id="">
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Weekly Working Days</label>
                                  <input type="text" class="form-control" name="Weekly_Working_Days" placeholder="Weekly Working Days" id="">
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Bill Waived Off</label>
                                  <input type="text" class="form-control" name="Bill_Waived_Off" placeholder="Bill Waived Off" id="">
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Pay Classification</label>
                                  <input type="text" class="form-control" name="Employee_Pay_Classification" placeholder="Employee Pay Classification" id="">
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Grade</label>
                                  <select id="" name="Grade" class="form-control select2">
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
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Department</label>
                                  <select name="Department" id="Department" class="form-control select2">
                                    <option value="ADMINISTRATION" >ADMINISTRATION</option>
                                    <option value="COMMERCIAL" >COMMERCIAL</option>
                                    <option value="SANITATION" >SANITATION</option>
                                    <option value="WATER SUPPLY" >WATER SUPPLY</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Job Tiltle</label>
                                  <select name="Job_Tiltle" class="form-control select2">
                                    <option value="CHIEF EXECUTIVE OFFICER" >CHIEF EXECUTIVE OFFICER</option>
                                    <option value="CHIEF FINANCIAL OFFICER" >CHIEF FINANCIAL OFFICER</option>
                                    <option value="GM (HR, ADMIN & PROCUREMENT)" >GM (HR, ADMIN & PROCUREMENT)</option>
                                    <option value="GM OPERATIONS & ENGINEERING SERVICES" >GM OPERATIONS & ENGINEERING SERVICES</option>
                                    <option value="SENIOR MANAGER COMMERCIAL" >SENIOR MANAGER COMMERCIAL</option>
                                    <option value="MANAGER SOLID WASTE" >MANAGER SOLID WASTE</option>
                                    <option value="COMPLAINT MANAGEMENT OFFICER" >COMPLAINT MANAGEMENT OFFICER</option>
                                    <option value="MANAGER WATER SUPPLY OPERATIONS" >MANAGER WATER SUPPLY OPERATIONS</option>
                                    <option value="DY_MANAGER-ADMIN & PROCUREMENT" >DY.MANAGER-ADMIN & PROCUREMENT</option>
                                    <option value="DY_MANAGER-SOLID WASTE" >DY.MANAGER-SOLID WASTE</option>
                                    <option value="DY_MANAGER ACCOUNTS" >DY.MANAGER ACCOUNTS</option>
                                    <option value="ASST_MANAGER-WATER SUPPLY" >ASST.MANAGER-WATER SUPPLY</option>
                                    <option value="ASST_MANAGER FINANCE" >ASST.MANAGER FINANCE</option>
                                    <option value="ASST_MANAGER SOLID WASTE" >ASST.MANAGER SOLID WASTE</option>
                                    <option value="ASST_MANAGER HUMAN RESOURCE" >ASST.MANAGER HUMAN RESOURCE</option>
                                    <option value="PAYROLL OFFICER" >PAYROLL OFFICER</option>
                                    <option value="MECHANICAL OFFICER" >MECHANICAL OFFICER</option>
                                    <option value="ADMIN AND PROCUREMENT OFFICER" >ADMIN AND PROCUREMENT OFFICER</option>
                                    <option value="ACCOUNTS JUNIOR" >ACCOUNTS JUNIOR</option>
                                    <option value="BILLING OFFICER" >BILLING OFFICER</option>
                                    <option value="COMPUTER OPERATOR" >COMPUTER OPERATOR</option>
                                    <option value="ACCOUNTS OFFICER" >ACCOUNTS OFFICER</option>
                                    <option value="ASSOCIATE ENGINEER" >ASSOCIATE ENGINEER</option>
                                    <option value="FLEET CUM MECHANICAL OFFICER" >FLEET CUM MECHANICAL OFFICER</option>
                                    <option value="IT ASSISTANT" >IT ASSISTANT</option>
                                    <option value="BILLING OFFICER" >BILLING OFFICER</option>
                                    <option value="TECHNICAL EXPERT NETWORK & SYSTEMS" >TECHNICAL EXPERT NETWORK & SYSTEMS</option>
                                    <option value="RECEPTIONIST" >RECEPTIONIST</option>
                                    <option value="CAMERA MAN" >CAMERA MAN</option>
                                    <option value="LEGAL ADVISOR" >LEGAL ADVISOR</option>
                                    <option value="ADMIN ASSISTANT" >ADMIN ASSISTANT</option>
                                    <option value="DATA ENTRY ASSISTANT">DATA ENTRY ASSISTANT</option>
                                    <option value="MEDIA OFFICER" >MEDIA OFFICER</option>
                                    <option value="OFFICE BOY" >OFFICE BOY</option>
                                    <option value="DRIVER" >DRIVER</option>
                                    <option value="TW OPERATOR" >TW OPERATOR</option>
                                    <option value="LINE MAN" >LINE MAN</option>
                                    <option value="ASSIST TO MANAGER OPS" >ASSIST TO MANAGER OPS</option>
                                    <option value="VALVE MAN" >VALVE MAN</option>
                                    <option value="WELDER" >WELDER</option>
                                    <option value="BILLING SUPERVISOR" >BILLING SUPERVISOR</option>
                                    <option value="LINE INSPECTOR" >LINE INSPECTOR</option>
                                    <option value="HELPER" >HELPER</option>
                                    <option value="WATER SUPPLY INSPECTOR" >WATER SUPPLY INSPECTOR</option>
                                    <option value="BILLING BOY" >BILLING BOY</option>
                                    <option value="VALVE WOMAN" >VALVE WOMAN</option>
                                    <option value="SANITARY WORKER" >SANITARY WORKER</option>
                                    <option value="WATCHMAN" >WATCHMAN</option>
                                    <option value="SANITARY SUPERVISOR" >SANITARY SUPERVISOR</option>
                                    <option value="SANITARY CONDUCTOR" >SANITARY CONDUCTOR</option>
                                    <option value="INTERN-CIVIL ENGINEER" >INTERN-CIVIL ENGINEER</option>
                                    <option value="SANITARY DRIVER" >SANITARY DRIVER</option>
                                    <option value="STREAM INSPECTOR" >STREAM INSPECTOR</option>
                                    <option value="STREAM WORKER" >STREAM WORKER</option>
                                    <option value="DRIVER TO CEO" >DRIVER TO CEO</option>
                                    <option value="EXCAVATOR OPERATOR" >EXCAVATOR OPERATOR</option>
                                    <option value="INTERN-ASSOCIATE ENGINEER" >INTERN-ASSOCIATE ENGINEER</option>
                                    <option value="LEGAL ADVISOR" >LEGAL ADVISOR</option>
                                    <option value="LETIGATION CLER" >LETIGATION CLERK</option>
                                    <option value="MSW SORTING SPECIALIST" >MSW SORTING SPECIALIST</option>
                                    <option value="MANAGMENT TRAINEE OFFICER" >MANAGMENT TRAINEE OFFICER</option>
                                    <option value="COVID19 WORKER" >COVID19 WORKER</option>
                                    <option value="WELDER" >WELDER</option>
                                    <option value="HELPER TO PIPE FITTER" >HELPER TO PIPE FITTER</option>
                                    <option value="SANITARY DRIVER" >SANITARY DRIVER</option>
                                    <option value="BCC SUPERVISOR" >BCC SUPERVISOR</option>
                                    <option value="BCC COORDINATOR" >BCC COORDINATOR</option>
                                    <option value="INTERN-ELECTRICAL ENGINEER" >INTERN-ELECTRICAL ENGINEER</option>
                                    <option value="INTERN-MEDIA COMMUNICATION" >INTERN-MEDIA COMMUNICATION</option>
                                    <option value="WATER SUPPLY SPECIALIST" >WATER SUPPLY SPECIALIST</option>
                                    <option value="ASSOCIATE ENGINEER" >ASSOCIATE ENGINEER</option>
                                    <option value="VALVE MAN" >VALVE MAN</option>
                                    <option value="COOK" >COOK</option>
                                    <option value="OFFICE ASSISTANT" >OFFICE ASSISTANT</option>
                                    <option value="INTERNEE" >INTERNEE</option>      
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Type</label>
                                  <select name="Type" id="Status" class="form-control select2">
                                    <option value="CHIEF" >CHIEF</option>
                                    <option value="GM" >GM</option>
                                    <option value="MANAGER" >MANAGER</option>
                                    <option value="DY_MANAGER" >DY_MANAGER</option>
                                    <option value="ASST_MANAGER" >ASST_MANAGER</option>
                                    <option value="SUPERVISO" >SUPERVISO</option>
                                    <option value="PAYROLL" >PAYROLL</option>
                                    <option value="WORKER" >WORKER</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Salary Mode</label>
                                  <select name="Salary_Mode" class="form-control select2">
                                    <option value="BANK TRANSFER" >BANK TRANSFER</option>
                                    <option value="CHEQUE" >CHEQUE</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Status</label>
                                  <select name="Status" id="Status" class="form-control select2">
                                    <option value="CONTRACT EXP" >CONTRACT EXP</option>
                                    <option value="ON-DUTY" >ON-DUTY</option>
                                    <option value="OTHER" >OTHER</option>
                                    <option value="PROBATION" >PROBATION</option>
                                    <option value="REPATRIATED" >REPATRIATED</option>
                                    <option value="RESIGNED" >RESIGNED</option>
                                    <option value="RETIRED" >RETIRED</option>
                                    <option value="SALARY HOLD" >SALARY HOLD</option>
                                    <option value="TERMINATED" >TERMINATED</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee NO</label>
                                  <input type="text" id="EmployeeNowssp" name="EmployeeNo" placeholder="Employee NO" class="form-control" autocomplete="off" required >
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label class="form-label" >Manager ID No</label>
                                  <div>
                                    <select name="Employee_Manager" id="employee_no" class="form-control select2">
                                      </select>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label> Attendance Supervisor</label>
                                    <select name="Attendance_Supervisor" id="superviser" class="form-control select2">
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>DY.Supervisor </label>
                                    <select name="DY_Supervisor" id="DY_Supervisor" class="form-control select2">
                                    </select>
                                  </div>
                                </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Joining Date</label>
                                  <input type="date" name="Joining_Date" id="Joining_Date" placeholder="Joining Date" class="form-control" autocomplete="off" >
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Contract Expiry Date</label>
                                  <input type="date" name="Contract_Expiry_Date" placeholder="" class="form-control" autocomplete="off" >
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Last Working Date</label>
                                  <input type="date" name="Last_Working_Date" placeholder="" class="form-control" autocomplete="off" >
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
                  <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                    <div class="row my-4">
                      <div class="col-md-12 ">
                        <div class="card card-success border border-2 border-dark bg-light">
                          <div style="background-color: darkblue;" class="card-header text-white fw-bold">
                            <div class="row">
                              <div class="col-sm-12 col-lg-5">
                                <div class="card-title text-white" style="width: fit-content;">Employement Information</div>
                              </div>
                              <div class="col-sm-12 col-lg-7">
                                <h3 class="bg-success p-2 rounded" style="width: fit-content;">TMA</h3>
                              </div>
                            </div>
                          </div>
                          <br>
                          <div class="card-body ">
                            <div class="row">
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employement Group</label>
                                  <select name="Employement_Group_TMA" class="form-control select2">
                                    <option value="TMA PERMANENT" >TMA PERMANENT</option>
                                    <option value="TMA DAILY WAGES" >TMA DAILY WAGES</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Class</label>
                                  <select name="Employee_Class_TMA" id="Employee_Class" class="form-control select2">
                                    <option value="WsscPay" >Wssc Pay</option>
                                    <option value="TMA Pay" >TMA Pay</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Group</label>
                                  <select name="Employee_Group_TMA" id="Employee_Group" class="form-control select2">
                                    <option value="TMA-ADMIN PAY" >TMA-ADMIN PAY</option>
                                    <option value="TMA-COMMERCIAL" >TMA-COMMERCIAL</option>
                                    <option value="TMA-MSW PAY" >TMA-MSW PAY</option>
                                    <option value="TMA-WATER PAY" >TMA-WATER PAY</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Sub Group</label>
                                  <select name="Employee_Sub_Group_TMA" class="form-control select2">
                                    <option value="TMA-ADMIN-PERMANENT PAY" >TMA-ADMIN-PERMANENT PAY</option>
                                    <option value="TMA-COMMERCIAL-PERMANENT PAY" >TMA-COMMERCIAL-PERMANENT PAY</option>
                                    <option value="TMA-MSW-DAILY WAGES" >TMA-MSW-DAILY WAGES PAY</option>
                                    <option value="TMA-MSW-PARMANENT PAY" >TMA-MSW-PARMANENT PAY</option>
                                    <option value="TMA-WATER-DAILY WAGES PAY" >TMA-WATER-DAILY WAGES PAY</option>
                                    <option value="TMA-WATER-PERMANENT PAY" >TMA-WATER-PERMANENT PAY</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Quota</label>
                                  <select name="Employee_Quota_TMA" id="Employee_Quota_tma" class="form-control select2">
                                    <option value="DECEASED SON" >DECEASED SON</option>
                                    <option value="DISABLED" >DISABLED</option>
                                    <option value="LETTER OF INTEREST" >LETTER OF INTEREST</option>
                                    <option value="MINORITIES" >MINORITIES</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Salary Bank</label>
                                  <input type="text" class="form-control" name="Salary_Bank_TMA" placeholder="Salary Bank" id="">
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Salary Branch</label>
                                  <input type="text" class="form-control" name="Salary_Branch_TMA" placeholder="Salary Branch" id="">
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Account No</label>
                                  <input type="text" class="form-control" name="Account_No_TMA" placeholder="Account No" id="">
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Pay Type</label>
                                  <input type="text" class="form-control" name="Pay_Type_TMA" placeholder="Pay Type" id="">
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>EOBI No</label>
                                  <input type="text" class="form-control" name="EOBI_No_TMA" placeholder="EOBI No" id="">
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Bill Walved Off</label>
                                  <input type="text" class="form-control" name="Bill_Walved_Off_TMA" placeholder="Bill Walved Off" id="">
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Weekly Working Days</label>
                                  <input type="text" class="form-control" name="Weekly_Working_Days_TMA" placeholder="Weekly Working Days" id="">
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Bill Waived Off</label>
                                  <input type="text" class="form-control" name="Bill_Waived_Off_TMA" placeholder="Bill Waived Off" id="">
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Pay Classification</label>
                                  <input type="text" class="form-control" name="Employee_Pay_Classification_TMA" placeholder="Employee Pay Classification" id="">
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Grade</label>
                                  <select name="Grade_TMA" id="Grade" class="form-control select2">
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
                                  <label>Department</label>
                                  <select name="Department_TMA" id="Department_name" class="form-control select2">
                                    <option value="ADMINISTRATION" >ADMINISTRATION</option>
                                    <option value="COMMERCIAL" >COMMERCIAL</option>
                                    <option value="SANITATION" >SANITATION</option>
                                    <option value="WATER SUPPLY" >WATER SUPPLY</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div  class="form-group">
                                  <label>Job Tiltle</label>
                                  <select name="Job_Tiltle_TMA" id="Job_Tiltle" class="form-control select2">
                                    <option value="OFFICE ASSISTANT" >OFFICE ASSISTANT</option>
                                    <option value="CLER" >CLERK</option>
                                    <option value="JUNIOR CLERK" >JUNIOR CLERK</option>
                                    <option value="DRAFTSMAN" >DRAFTSMAN</option>
                                    <option value="DRIVER" >DRIVER</option>
                                    <option value="NAIB QASID" >NAIB QASID</option>
                                    <option value="SANITARY SUPERVISOR" >SANITARY SUPERVISOR</option>
                                    <option value="PIPE FITTER" >PIPE FITTER</option>
                                    <option value="LINE MAN" >LINE MAN</option>
                                    <option value="TW OPERATOR" >TW OPERATOR</option>
                                    <option value="VALVE MAN" >VALVE MAN</option>
                                    <option value="HELPER TO PIPE FITTER" >HELPER TO PIPE FITTER</option>
                                    <option value="WELDER" >WELDER</option>
                                    <option value="CHIEF SANITARY INSPECTOR" >CHIEF SANITARY INSPECTOR</option>
                                    <option value="ASSTT:SANITARY INSPECTOR" >ASSTT:SANITARY INSPECTOR</option>
                                    <option value="BLACKSMITH" >BLACKSMITH</option>
                                    <option value="SANITARY WORKER" >SANITARY WORKER</option>
                                    <option value="MALARIA INSPECTOR" >MALARIA INSPECTOR</option>
                                    <option value="MALARIA SUPERVISOR" >MALARIA SUPERVISOR</option>
                                    <option value="MOTOR TRANSPORT OFFICER" >MOTOR TRANSPORT OFFICER</option>
                                    <option value="WATER RATE COLLECTOR" >WATER RATE COLLECTOR</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Type</label>
                                  <select name="Type_TMA" id="Status" class="form-control select2">
                                    <option value="CHIEF" >CHIEF</option>
                                    <option value="GM" >GM</option>
                                    <option value="MANAGER" >MANAGER</option>
                                    <option value="DY_MANAGER" >DY_MANAGER</option>
                                    <option value="ASST_MANAGER" >ASST_MANAGER</option>      
                                    <option value="SUPERVISO" >SUPERVISO</option>
                                    <option value="PAYROLL" >PAYROLL</option>
                                    <option value="WORKER" >WORKER</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Salary Mode</label>
                                  <select name="Salary_Mode_TMA" id="Salary_Mode" class="form-control select2">
                                    <option value="BANK TRANSFER" >BANK TRANSFER</option>
                                    <option value="CHEQUE" >CHEQUE</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Status</label>
                                  <select name="Status_TMA" id="Status_tma" class="form-control select2">
                                    <option value="CONTRACT EXP" >CONTRACT EXP</option>
                                    <option value="ON-DUTY" >ON-DUTY</option>
                                    <option value="OTHER" >OTHER</option>
                                    <option value="PROBATION" >PROBATION</option>
                                    <option value="REPATRIATED" >REPATRIATED</option>
                                    <option value="RESIGNED" >RESIGNED</option>
                                    <option value="RETIRED" >RETIRED</option>
                                    <option value="SALARY HOLD" >SALARY HOLD</option>
                                    <option value="TERMINATED" >TERMINATED</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee NO</label>
                                  <input id="EmployeeNo"  type="text" name="EmployeeNo_TMA" placeholder="Employee NO" class="form-control" autocomplete="off" >
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Manager ID No</label>
                                  <div>
                                  <select name="Employee_Manager_TMA" id="employee_noTMA" class="form-control select2">
                                  </select>
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label> Attendance Supervisor</label>
                                    <select name="Attendance_Supervisor_TMA" id="superviserTMA" class="form-control select2">
                                    </select>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label> DY.Supervisor </label>
                                    <select name="DY_Supervisor_TMA" id="DY_Supervisor" class="form-control select2">
                                    </select>
                                  </div>
                                </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Joining Date</label>
                                  <input type="date" name="Joining_Date_TMA" placeholder="Joining Date" class="form-control" autocomplete="off" >
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Contract Expiry Date</label>
                                  <input type="date" name="Contract_Expiry_Date_TMA" id="Contract_Expiry_Date_tma" placeholder="" class="form-control" autocomplete="off" >
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Last Working Day</label>
                                  <input type="date" name="Last_Working_Date_TMA" id="Last_Working_Day" placeholder="" class="form-control" autocomplete="off" >
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Duty Location</label>
                                  <input type="text" name="Duty_Location_TMA" id="Duty_Location" placeholder="Duty Location" class="form-control" autocomplete="off" >
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                              <div class="form-group">
                                <label>Duty Point</label>
                                <input type="text" name="Duty_Point_TMA" placeholder="Duty Point" class="form-control" autocomplete="off" >
                              </div>
                            </div>
                              <div class="col-md-12 text-end mt-2">
                                <input style="background-color: darkblue;" onclick="backToSection1()" type="button" class="btn text-white  float-right shadow" value="Back">
                                <input style="background-color: darkblue;" name="submit_TMA" type="submit" class="btn text-white  float-right shadow" value="Submit">
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