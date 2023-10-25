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
}else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php include ('link/links.php')?>
   <style>
    h4, h3 {
      text-align: center;
    }

   </style>
</head>
<body>
  <div id="main">
    <?php include('link/desigene/navbar.php')?>
    <div class="container-fluid m-auto p-5">
        <div class="row my-3">
            <div class="col-12 table-responsive">
                <table class="table">
                  <thead class="text-white" style="background-color: darkblue;">
                      <tr>
                          <th scope="col">#</th>
                          <th scope="col">EmployeeNo No</th>
                          <th scope="col">fName Name</th>
                          <th scope="col">Job Tiltle</th>
                          <th scope="col">CNIC Class</th>
                          <th scope="col">father Name Date</th>
                          <th scope="col">email City</th>
                          <th scope="col">Employement Group City</th>
                          <th scope="col">Grade Date</th>
                          <th scope="col">Department Date</th>
                          <th scope="col">Job Tiltle</th>
                          <th scope="col">Status</th>
                          <th scope="col">Joining Date</th>
                          <th scope="col">Contract Expiry Date</th>
                          <th scope="col">See</th>
                      </tr>
                  </thead>
                  <tbody id="table-data" >
                    <?php
                    include('../link/desigene/db.php');
                    $sql = "SELECT * FROM `employeedataupdate`";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $a=1;
                          while($row=mysqli_fetch_array($result)){
                            if(isset($_POST['AcceptWSSC PAY'.$a])){
                            $IdUpdate=$_POST['Id'];
                            $ImageUpdate=$_POST['ImageUpdate'];
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
                            // SQL query for insertion
                            $insertquery = "UPDATE `employeedata` SET  `image`='$ImageUpdate',`fName`='$fName',`mName`='$mName',`lName`='$lName',`father_Name`='$father_Name',`CNIC`='$CNIC',`email`='$email',`pAddress`='$pAddress',`cAddress`='$cAddress',`city`='$city',`postAddress`='$postAddress',`mNumber`='$mNumber',`ofphNumber`='$ofphNumber',`Alternate_Number`='$Alternate_Number',`DofB`='$DofB',`religion`='$religion',`gender`='$gender',`BlGroup`='$BlGroup',`Domicile`='$Domicile',`MaritalStatus`='$MaritalStatus',`NextofKin`='$NextofKin',`NextofKinCellNumber`='$NextofKinCellNumber',`ContactPerson`='$ContactPerson',`CPCN`='$CPCN',`Employement_Group`='$Employement_Group',`Employee_Class`='$Employee_Class',`Employee_Group`='$Employee_Group',`Employee_Sub_Group`='$Employee_Sub_Group',`Employee_Quota`='$Employee_Quota',`Salary_Bank`='$Salary_Bank',`Salary_Branch`='$Salary_Branch',`Account_No`='$Account_No',`Pay_Type`='$Pay_Type',`EOBI_No`='$EOBI_No',`Bill_Walved_Off`='$Bill_Walved_Off',`Weekly_Working_Days`='$Weekly_Working_Days',`Bill_Waived_Off`='$Bill_Waived_Off',`Employee_Pay_Classification`='$Employee_Pay_Classification',`Grade`='$Grade_tma',`Department`='$Department',`Job_Tiltle`='$Job_Tiltle',`Salary_Mode`='$Salary_Mode',`Status`='$Employee_Status',`EmployeeNo`='$EmployeeNowssp',`Employee_Manager`='$Employee_Manager',`Joining_Date`='$Joining_Date',`Contract_Expiry_Date`='$Contract_Expiry_Date',`Last_Working_Date`='$Last_Working_Date',`Attendance_Supervisor`='$Attendance_Supervisor',`Duty_Location`='$Duty_Location',`Duty_Point`='$Duty_Point',`Online Status`='ACCEPT',`type`='$Type',`DY_Supervisor`='$DY_Supervisor',`leaveAlreadyAvailed`='34' WHERE `Id`='$IdUpdate'";
                            
                            // Execute the query
                            $query = mysqli_query($conn, $insertquery);
                            
                            // Check if the query was successful
                            if ($query) {
                                $deleteid=$_POST['deletid'];
                                $deletequery = mysqli_query( $conn,'DELETE FROM `employeedataupdate` WHERE `Id`=$deleteid');
                                if ($deletequery) {
                                  echo '<script>alert("Data is inserted and deleted");</script>';
                                  header("Location: new_employeeupdate.php");
                                  } else{echo '<script>alert("Error");</script>';}
                                  
                            } else {
                                echo "Error: " . mysqli_error($conn);
                            }
                            }
                            else if(isset($_POST['RejectWSSC PAY'.$a])){
                                $deleteid=$_POST['deletid'];
                                $deletequery = mysqli_query( $conn,'DELETE FROM `employeedataupdate` WHERE `Id`=$deleteid');
                                if ($deletequery) {
                                echo '<script>alert("Rejected");</script>';
                                  header("Location: new_employeeupdate.php");
                                } else {echo '<script>alert("Error");</script>';}
                            }
                            else if(isset($_POST['AcceptTMA PAY'.$a])){
                              $IdUpdate=$_POST['Id'];
                              $ImageUpdate=$_POST['ImageUpdate'];
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
                              // SQL query for insertion
                              $insertquery = "UPDATE `employeedata` SET `image`='$ImageUpdate',`fName`='$fName',`mName`='$mName',`lName`='$lName',`father_Name`='$father_Name',`CNIC`='$CNIC',`email`='$email',`pAddress`='$pAddress',`cAddress`='$cAddress',`city`='$city',`postAddress`='$postAddress',`mNumber`='$mNumber',`ofphNumber`='$ofphNumber',`Alternate_Number`='$Alternate_Number',`DofB`='$DofB',`religion`='$religion',`gender`='$gender',`BlGroup`='$BlGroup',`Domicile`='$Domicile',`MaritalStatus`='$MaritalStatus',`NextofKin`='$NextofKin',`NextofKinCellNumber`='$NextofKinCellNumber',`ContactPerson`='$ContactPerson',`CPCN`='$CPCN',`Employement_Group`='$Employement_Group',`Employee_Class`='$Employee_Class',`Employee_Group`='$Employee_Group',`Employee_Sub_Group`='$Employee_Sub_Group',`Employee_Quota`='$Employee_Quota',`Salary_Bank`='$Salary_Bank',`Salary_Branch`='$Salary_Bank',`Account_No`='$Account_No',`Pay_Type`='$Pay_Type',`EOBI_No`='$EOBI_No',`Bill_Walved_Off`='$Bill_Walved_Off',`Weekly_Working_Days`='$Weekly_Working_Days',`Bill_Waived_Off`='$Bill_Waived_Off',`Employee_Pay_Classification`='$Employee_Pay_Classification',`Grade`='$Grade_tma',`Department`='$Department',`Job_Tiltle`='$Job_Tiltle',`Salary_Mode`='$Salary_Mode',`Status`='$Employee_Status',`EmployeeNo`='$EmployeeNowssp',`Employee_Manager`='$Employee_Manager',`Joining_Date`='$Joining_Date',`Contract_Expiry_Date`='$Contract_Expiry_Date',`Last_Working_Date`='$Last_Working_Date',`Attendance_Supervisor`='$Attendance_Supervisor',`Duty_Location`='$Duty_Location',`Duty_Point`='$Duty_Point',`Online Status`='ACCPET',`type`='$Type',`DY_Supervisor`='$DY_Supervisor',`leaveAlreadyAvailed`='34' WHERE `Id`='$IdUpdate'";
                              
                              // Execute the query
                              $query = mysqli_query($conn, $insertquery);
                              
                              // Check if the query was successful
                              if ($query) {
                                  
                                  $deleteid=$_POST['deletid'];
                                  $deletequery = mysqli_query( $conn,'DELETE FROM `employeedataupdate` WHERE `Id`=$deleteid');
                                  if ($deletequery) {
                                    echo '<script>alert("Accepted");</script>';
                                  header("Location: new_employeeupdate.php");
                                    } else{echo '<script>alert("Error");</script>';}
                              } else {
                                  echo "Error: " . mysqli_error($conn);
                              }
                            }
                            else if(isset($_POST['RejectTMA PAY'.$a])){
                              $deleteid=$_POST['deletid'];
                              $deletequery = mysqli_query( $conn,'DELETE FROM `employeedataupdate` WHERE `Id`=$deleteid');
                              if ($deletequery) {
                                echo '<script>alert("Rejected");</script>';
                                  header("Location: new_employeeupdate.php");
                                } else{echo '<script>alert("Error");</script>';}
                            }

                            ?>
                          <form method="post" enctype="multipart/form-data">
                            <tr>
                                <th scope="row"><?php echo $a?></th>
                                <td><?php echo $row['EmployeeNoUpdate'] ?></td>
                                <td><h5><?php echo $row['fNameUpdate']?> <?php echo $row['lNameUpdate']?></h5></td>
                                <td><?php echo $row['Job_TiltleUpdate'] ?></td>
                                <td><?php echo $row['CNICUpdate'] ?></td>
                                <td><?php echo $row['father_NameUpdate'] ?></td>
                                <td><?php echo $row['emailUpdate'] ?></td>
                                <td><?php echo $row['Employement_GroupUpdate'] ?></td>
                                <td><?php echo $row['GradeUpdate'] ?></td>
                                <td><?php echo $row['DepartmentUpdate'] ?></td>
                                <td><?php echo $row['Job_TiltleUpdate'] ?></td>
                                <td><?php echo $row['StatusUpdate'] ?></td>
                                <td><?php echo $row['Joining_DateUpdate'] ?></td>
                                <td><?php echo $row['Contract_Expiry_DateUpdate'] ?></td>
                                <td><a class="btn btn-success text-white float-right shadow" href="update_singil_data.php?id=<?php echo $row['Id']?>" >See</a></td>
                            </tr>
                            <tr id="data<?php echo $a?>" style="display: none;">
                                <td colspan="16"  id="section1" style="display: none;">
                                <div class="container-fluid">
                              <div class="row my-4">
                                <div class="col-md-12 ">
                                  <?php
                                  $id = $row['Id']; 
                                  $select = mysqli_query($conn,"SELECT * FROM `employeedataupdate` WHERE `Id`=$id");
                                  while($fetchdata = mysqli_fetch_array($select)){
                                  ?>
                                <div >
                                    <div  class="card card-success border border-2 border-dark bg-light">
                                      <div style="background-color: darkblue;" class="card-header text-white fw-bold">
                                        <div class="card-title text-white">Employee Personal Information</div>
                                      </div>
                                        <br>
                                      <div class="row mt-5 p-3">
                                          <div class="col-md-4 my-2">
                                            <div class="form-group">
                                                <label>Upload Image</label>
                                                <input id="imageUpload" type="file" accept="image/*" class="form-control" name="image" style="overflow: hidden;" placeholder="Insert Your Image">
                                                <input id="imageText" name="ImageUpdate" type="text" class="form-control" style="overflow: hidden;" placeholder="Insert Your Image" value="<?php echo $fetchdata['ImageUpdate']?>">
                                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                        <script>
                                            // Listen for changes in the file input
                                            $('#imageUpload').on('change', function() {
                                                var fileName = $(this).val().split('\\').pop(); // Get only the file name
                                                $('#imageText').val(fileName); // Set the value of the text input
                                            });
                                        </script>

                                            </div>
                                          </div>
                                          <div class="col-md-4 my-2"></div>
                                          <div class="col-md-4 my-2 ">
                                            <div class="form-group mr-3 mt-0">
                                              <img id="log1" class="shadow" style="border: 1px blue solid; border-radius: 10%; margin-top: -4%" src="../images/<?php echo $fetchdata['imageUpdate']?>" width="120px;" height="130px">
                                            </div>
                                          </div>
                                          <div class="col-md-4 my-2">
                                            <div class="form-group">
                                              <label>First Name</label>
                                              <input value="<?php echo $fetchdata['fNameUpdate']?>" id="fName" type="text" name="fName" placeholder="First Name" class="form-control" autocomplete="off" >
                                              <input type="number"  name="Id" readonly  value="<?php  echo $fetchdata['IdUpdate'];?>">
                                            </div>
                                          </div>
                                          <div class="col-md-4 my-2">
                                            <div class="form-group">
                                              <label>Middle Name</label>
                                              <input value="<?php echo $fetchdata['mNameUpdate']?>" id="mName" type="text" name="mName" placeholder="Middle Name" class="form-control" autocomplete="off">
                                            </div>
                                          </div>
                                          <div class="col-md-4 my-2">
                                            <div class="form-group">
                                              <label>Last Name</label>
                                              <input value="<?php echo $fetchdata['lNameUpdate']?>" id="lName" type="text" name="lName" placeholder="Last Name" class="form-control" autocomplete="off" >
                                            </div>
                                          </div> 
                                          <div class="col-md-4 my-2">
                                            <div class="form-group">
                                              <label>Father Name</label>
                                              <input value="<?php echo $fetchdata['father_NameUpdate']?>" id="FatherName" type="text" name="father_Name" placeholder="Father Name" class="form-control" autocomplete="off" >
                                            </div>
                                          </div> 
                                          <div class="col-md-4 my-2">
                                            <div class="form-group">
                                              <label>CNIC</label>
                                              <input value="<?php echo $fetchdata['CNICUpdate']?>" id="cNo" type="text" name="CNIC" placeholder="CNIC" class="form-control" autocomplete="off" >
                                            </div>
                                          </div>
                                          <div class="col-md-4 my-2">
                                            <div class="form-group">
                                              <label>Email address</label>
                                              <input value="<?php echo $fetchdata['emailUpdate']?>" id="email" type="Email" name="email" placeholder="Email" class="form-control" autocomplete="off" >
                                            </div>
                                          </div>
                                          <div class="col-md-4 my-2">
                                            <div class="form-group">
                                              <label>Permanent Address</label>
                                              <input value="<?php echo $fetchdata['pAddressUpdate']?>" id="PAddress" type="text" name="pAddress" placeholder="Permenent Address" class="form-control" autocomplete="off" >
                                            </div>
                                          </div>
                                          <div class="col-md-4 my-2">
                                            <div class="form-group">
                                              <label>Current Address</label>
                                              <input value="<?php echo $fetchdata['cAddressUpdate']?>" id="CAddress" type="text" name="cAddress" placeholder="Current Address" class="form-control" autocomplete="off" >
                                            </div>
                                          </div>
                                          <div class="col-md-4 my-2">
                                            <div class="form-group">
                                              <label>City</label>
                                              <input value="<?php echo $fetchdata['cityUpdate']?>" id="city" type="text" name="city" placeholder="City" class="form-control" autocomplete="off" >
                                            </div>
                                          </div>
                                          <div class="col-md-4 my-2">
                                            <div class="form-group">
                                              <label>Postal Address</label>
                                              <input value="<?php echo $fetchdata['postAddressUpdate']?>" id="PAddress" type="text" name="postAddress" placeholder="Postal Address" class="form-control" autocomplete="off" >
                                            </div>
                                          </div>
                                          <div class="col-md-4 my-2">
                                            <div class="form-group">
                                              <label>Mobile Number</label>
                                              <input value="<?php echo $fetchdata['mNumberUpdate']?>" id="moNum" type="text" name="mNumber" placeholder="Mobile Number" class="form-control" autocomplete="off" >
                                            </div>
                                          </div>
                                          <div class="col-md-4 my-2">
                                            <div class="form-group">
                                              <label>Office Phone Number</label>
                                              <input value="<?php echo $fetchdata['ofphNumberUpdate']?>" id="OfPNum" type="text" name="ofphNumber" placeholder="Office Number" class="form-control" autocomplete="off" >
                                            </div>
                                          </div>
                                          <div class="col-md-4 my-2">
                                            <div class="form-group">
                                              <label>Alternate Number</label>
                                              <input value="<?php echo $fetchdata['Alternate_NumberUpdate']?>" id="ANum" type="text" name="Alternate_Number" placeholder="Alternate Number" class="form-control" autocomplete="off" >
                                            </div>
                                          </div>
                                          <div class="col-md-4 my-2">
                                            <div class="form-group">
                                              <label>Date of Birth</label>
                                              <input value="<?php echo $fetchdata['DofBUpdate']?>" id="DofB" type="Date" name="DofB" class="form-control" autocomplete="off" >
                                            </div>
                                          </div>
                                          <div class="col-md-4 my-2">
                                            <div class="form-group">
                                              <label>Religion</label>
                                              <input value="<?php echo $fetchdata['religionUpdate']?>" id="Religion" type="text" name="religion" placeholder="Religion" class="form-control" autocomplete="off" >
                                            </div>
                                          </div>
                                          <div class="col-md-4 my-2">
                                            <div class="form-group">
                                              <label>Gender</label>
                                              <select name="gender" id="" class="form-control ">
                                                  <option <?php echo ($fetchdata['genderUpdate'] =='') ? 'selected' : ''; ?> value="">Choose</option>
                                                  <option <?php echo ($fetchdata['genderUpdate'] =='Male') ? 'selected' : ''; ?> value="Male">Male</option>
                                                  <option <?php echo ($fetchdata['genderUpdate'] =='Female') ? 'selected' : ''; ?> value="Female">Female</option>
                                              </select>
                                            </div>
                                          </div>
                                          <div class="col-md-4 my-2">
                                            <div class="form-group">
                                              <label>Blood Group</label>
                                              <input value="<?php echo $fetchdata['BlGroupUpdate']?>" id="BlGroup" type="text" name="BlGroup" placeholder="Blood Group" class="form-control" autocomplete="off" >
                                            </div>
                                          </div>
                                          <div class="col-md-4 my-2">
                                            <div class="form-group">
                                              <label>Domicile</label>
                                              <input value="<?php echo $fetchdata['DomicileUpdate']?>" id="Domicile" type="text" name="Domicile" placeholder="Domicile" class="form-control" autocomplete="off" >
                                            </div>
                                          </div>
                                          <div class="col-md-4 my-2">
                                            <div class="form-group">
                                              <label>Marital Status </label>
                                              <select name="MaritalStatus" id="MaritalStatus" class="form-control ">
                                                  <option <?php echo ($fetchdata['MaritalStatusUpdate'] == '') ? 'selected' : ''; ?> value="">Choose</option>
                                                  <option <?php echo ($fetchdata['MaritalStatusUpdate'] == 'Married') ? 'selected' : ''; ?> value=" Married"> Married</option>
                                                  <option <?php echo ($fetchdata['MaritalStatusUpdate'] == 'Unmarried') ? 'selected' : ''; ?> value=" Unmarried"> Unmarried</option>
                                              </select>
                                            </div>
                                          </div>
                                          <div class="col-md-4 my-2">
                                            <div class="form-group">
                                              <label>Next of Kin</label>
                                              <input value="<?php echo $fetchdata['NextofKinUpdate']?>" id="NextofKin" type="text" name="NextofKin" placeholder="Next of Kin" class="form-control" autocomplete="off" >
                                            </div>
                                          </div>
                                          <div class="col-md-4 my-2">
                                            <div class="form-group">
                                              <label>Next of Kin Cell Number</label>
                                              <input value="<?php echo $fetchdata['NextofKinCellNumberUpdate']?>" id="NextofKinCellNumber" type="text" name="NextofKinCellNumber" placeholder="Next of Kin Cell Number " class="form-control" autocomplete="off" >
                                            </div>
                                          </div>                   
                                          <div class="col-md-4 my-2">
                                            <div class="form-group">
                                              <label>Name of Contact Person</label>
                                              <input value="<?php echo $fetchdata['ContactPersonUpdate']?>" id="ContactPerson" type="text" name="ContactPerson" placeholder="Contact Person " class="form-control" autocomplete="off" >
                                            </div>
                                          </div>                    
                                          <div class="col-md-4 my-2">
                                            <div class="form-group">
                                              <label>Contact Person Cell Number</label>
                                              <input value="<?php echo $fetchdata['CPCNUpdate']?>" id="CPCN" type="text" name="CPCN" placeholder="Contact Person Cell Number " class="form-control" autocomplete="off" >
                                            </div>
                                          </div>
                                      </div>
                                    </div>
                                  </div>
                                  <?php }?>
                                    <div  class="tab-content" id="myTabContent">
                                        <div class="row my-4">
                                        <?php 
                                            $id = $row['Id']; 
                                            $select = mysqli_query($conn,"SELECT * FROM `employeedataupdate` WHERE `Employee_ClassUpdate`='WSSC PAY' AND `Id`=$id");
                                            while($fetchdata=mysqli_fetch_array($select)){
                                            ?> 
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
                                                            <option value="" <?php echo ($fetchdata['Employement_GroupUpdate'] == '') ? 'selected' : ''; ?>>Select</option>
                                                        <?php
                                                            while($row=mysqli_fetch_assoc($select)){
                                                            ?>
                                                            <option <?php echo ($fetchdata['Employement_GroupUpdate'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
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
                                                            <option value="" <?php echo ($fetchdata['Employee_ClassUpdate'] == '') ? 'selected' : ''; ?>>Select</option>
                                                        <?php
                                                            while($row=mysqli_fetch_assoc($select)){
                                                            ?>
                                                            <option <?php echo ($fetchdata['Employee_ClassUpdate'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
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
                                                            <option value="" <?php echo ($fetchdata['Employee_GroupUpdate'] == '') ? 'selected' : ''; ?>>Select</option>
                                                        <?php
                                                            while($row=mysqli_fetch_assoc($select)){
                                                            ?>
                                                            <option <?php echo ($fetchdata['Employee_GroupUpdate'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
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
                                                            <option value="" <?php echo ($fetchdata['Employee_Sub_GroupUpdate'] == '') ? 'selected' : ''; ?>>Select</option>
                                                        <?php
                                                            while($row=mysqli_fetch_assoc($select)){
                                                            ?>
                                                            <option <?php echo ($fetchdata['Employee_Sub_GroupUpdate'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
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
                                                            <option value="" <?php echo ($fetchdata['Employee_QuotaUpdate'] == '') ? 'selected' : ''; ?>>Select</option>
                                                        <?php
                                                            while($row=mysqli_fetch_assoc($select)){
                                                            ?>
                                                            <option <?php echo ($fetchdata['Employee_QuotaUpdate'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
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
                                                      <input value="<?php echo $fetchdata['Salary_BankUpdate']?>" type="text" class="form-control" name="Salary_Bank" placeholder="Salary Bank" >
                                                    </div>
                                                  </div>
                                                  <div class="col-md-4 my-2">
                                                    <div class="form-group">
                                                      <label>Salary Bank Branch</label>
                                                      <input value="<?php echo $fetchdata['Salary_BranchUpdate']?>" type="text" class="form-control" name="Salary_Branch" placeholder="Salary Branch">
                                                    </div>
                                                  </div>
                                                  <div class="col-md-4 my-2">
                                                    <div class="form-group">
                                                      <label>Account No</label>
                                                      <input value="<?php echo $fetchdata['Account_NoUpdate']?>" type="text" class="form-control" name="Account_No" placeholder="Account No" >
                                                    </div>
                                                  </div>
                                                  <div class="col-md-4 my-2">
                                                    <div class="form-group">
                                                      <label>Pay Type</label>
                                                      <input value="<?php echo $fetchdata['Pay_TypeUpdate']?>" type="text" class="form-control" name="Pay_Type" placeholder="Pay Type">
                                                    </div>
                                                  </div>
                                                  <div class="col-md-4 my-2">
                                                    <div class="form-group">
                                                      <label>EOBI No</label>
                                                      <input value="<?php echo $fetchdata['EOBI_NoUpdate']?>" type="text" class="form-control" name="EOBI_No" placeholder="EOBI No" >
                                                    </div>
                                                  </div>
                                                  <div class="col-md-4 my-2">
                                                    <div class="form-group">
                                                      <label>Bill Walved Off</label>
                                                      <input value="<?php echo $fetchdata['Bill_Walved_OffUpdate']?>" type="text" class="form-control" name="Bill_Walved_Off" placeholder="Bill Walved Off" >
                                                    </div>
                                                  </div>
                                                  <div class="col-md-4 my-2">
                                                    <div class="form-group">
                                                      <label>Weekly Working Days</label>
                                                      <input value="<?php echo $fetchdata['Weekly_Working_DaysUpdate']?>" type="text" class="form-control" name="Weekly_Working_Days" placeholder="Weekly Working Days" >
                                                    </div>
                                                  </div>
                                                  <div class="col-md-4 my-2">
                                                    <div class="form-group">
                                                      <label>Bill Waived Off</label>
                                                      <input value="<?php echo $fetchdata['Bill_Waived_OffUpdate']?>" type="text" class="form-control" name="Bill_Waived_Off" placeholder="Bill Waived Off" >
                                                    </div>
                                                  </div>
                                                  <div class="col-md-4 my-2">
                                                    <div class="form-group">
                                                      <label>Employee Pay Classification</label>
                                                      <input value="<?php echo $fetchdata['Employee_Pay_ClassificationUpdate']?>" type="text" class="form-control" name="Employee_Pay_Classification" placeholder="Employee Pay Classification" >
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
                                                            <option value="" <?php echo ($fetchdata['GradeUpdate'] == '') ? 'selected' : ''; ?>>Select</option>
                                                        <?php
                                                            while($row=mysqli_fetch_assoc($select)){
                                                            ?>
                                                            <option <?php echo ($fetchdata['GradeUpdate'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
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
                                                            <option value="" <?php echo ($fetchdata['DepartmentUpdate'] == '') ? 'selected' : ''; ?>>Select</option>
                                                        <?php
                                                            while($row=mysqli_fetch_assoc($select)){
                                                            ?>
                                                            <option <?php echo ($fetchdata['DepartmentUpdate'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
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
                                                            <option value="" <?php echo ($fetchdata['Job_TiltleUpdate'] == '') ? 'selected' : ''; ?>>Select</option>
                                                        <?php
                                                            while($row=mysqli_fetch_assoc($select)){
                                                            ?>
                                                            <option <?php echo ($fetchdata['Job_TiltleUpdate'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
                                                            <?php   
                                                            }
                                                        }
                                                        ?>   
                                                    </select>
                                                    </div>
                                                  </div>
                                                  <div class="col-md-4 my-2">
                                                    <div class="form-group">
                                                      <label>Type</label>
                                                      <select name="Type" id="Type_drop" class="form-control ">
                                                    <?php
                                                        include ('../link/desigene/db.php');
                                                        $select = mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='type'");
                                                        if(mysqli_num_rows($select)>0){
                                                        ?>
                                                            <option value="" <?php echo ($fetchdata['typeUpdate'] == '') ? 'selected' : ''; ?>>Select</option>
                                                        <?php
                                                            while($row=mysqli_fetch_assoc($select)){
                                                            ?>
                                                            <option <?php echo ($fetchdata['typeUpdate'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
                                                            <?php   
                                                            }
                                                        }
                                                        ?>  
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
                                                            <option value="" <?php echo ($fetchdata['Salary_ModeUpdate'] == '') ? 'selected' : ''; ?>>Select</option>
                                                        <?php
                                                            while($row=mysqli_fetch_assoc($select)){
                                                            ?>
                                                            <option <?php echo ($fetchdata['Salary_ModeUpdate'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
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
                                                        <select name="Status" id="Status_drop" class="form-control ">
                                                    <?php
                                                        include ('../link/desigene/db.php');
                                                        $select = mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='Status'");
                                                        if(mysqli_num_rows($select)>0){
                                                        ?>
                                                            <option value="" <?php echo ($fetchdata['StatusUpdate'] == '') ? 'selected' : ''; ?>>Select</option>
                                                        <?php
                                                            while($row=mysqli_fetch_assoc($select)){
                                                            ?>
                                                            <option <?php echo ($fetchdata['StatusUpdate'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
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
                                                      <input value="<?php echo $fetchdata['EmployeeNoUpdate']?>" type="text" id="EmployeeNowssp" name="EmployeeNo" placeholder="Employee NO" class="form-control" autocomplete="off" required >
                                                    </div>
                                                  </div>
                                                  <div class="col-md-4 my-2">
                                                    <div class="form-group">
                                                      <label class="form-label" >Manager ID No</label>
                                                      <div>
                                                        <select name="Employee_Manager" id="" class="form-control ">
                                                        <?php
                                                        include ('../link/desigene/db.php');
                                                        $select = mysqli_query($conn,"SELECT * FROM `employeedata` WHERE `type`='MANAGER' ");
                                                        if(mysqli_num_rows($select)>0){
                                                            ?><option value="">select</option><?php
                                                            while($row=mysqli_fetch_assoc($select)){
                                                            ?>
                                                        <option <?php echo ($fetchdata['Employee_ManagerUpdate'] ==  $row['EmployeeNo'] ) ? 'selected' : ''; ?> value="<?php echo $row['EmployeeNo']?>">
                                                            
                                                            
                                                            <h4><?php echo $row['fName']?> <?php echo $row['mName']?> <?php echo $row['lName']?></h4> 
                                                        
                                                        </option>
                                                            
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
                                                        <select name="Attendance_Supervisor" id="superviser" class="form-control ">
                                                        <?php
                                                      include ('../link/desigene/db.php');
                                                      $select = mysqli_query($conn,"SELECT * FROM `employeedata` WHERE `type`='SUPERVISO' ");
                                                      if(mysqli_num_rows($select)>0){
                                                          ?><option value="">select</option><?php
                                                          while($row=mysqli_fetch_assoc($select)){
                                                          ?>
                                                      <option <?php echo ($fetchdata['Attendance_SupervisorUpdate'] ==  $row['EmployeeNo'] ) ? 'selected' : ''; ?> value="<?php echo $row['EmployeeNo']?>">
                                                          
                                                          
                                                          <h4><?php echo $row['fName']?> <?php echo $row['mName']?> <?php echo $row['lName']?></h4> 
                                                      
                                                      </option>
                                                          
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
                                                        <select name="DY_Supervisor" id="DY_Supervisor" class="form-control ">
                                                      <?php include ('../link/desigene/db.php');
                                                        $select = mysqli_query($conn,"SELECT * FROM `employeedata` WHERE `type`='DY_MANAGER' ");
                                                        if(mysqli_num_rows($select)>0){
                                                            ?><option value="">select</option><?php
                                                            while($row=mysqli_fetch_assoc($select)){
                                                            ?>
                                                        <option <?php echo ($fetchdata['DY_SupervisorUpdate'] ==  $row['EmployeeNo'] ) ? 'selected' : ''; ?> 
                                                        value="<?php echo $row['EmployeeNo']?>">
                                                            
                                                            
                                                            <h4><?php echo $row['fName']?> <?php echo $row['mName']?> <?php echo $row['lName']?></h4> 
                                                        
                                                        </option>
                                                            
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
                                                      <input value="<?php echo $fetchdata['Joining_DateUpdate']?>" type="date" name="Joining_Date" id="Joining_Date" placeholder="Joining Date" class="form-control" autocomplete="off" >
                                                    </div>
                                                  </div>
                                                  <div class="col-md-4 my-2">
                                                    <div class="form-group">
                                                      <label>Contract Expiry Date</label>
                                                      <input value="<?php echo $fetchdata['Contract_Expiry_DateUpdate']?>" type="date" name="Contract_Expiry_Date" placeholder="" class="form-control" autocomplete="off" >
                                                    </div>
                                                  </div>
                                                  <div class="col-md-4 my-2">
                                                    <div class="form-group">
                                                      <label>Last Working Date</label>
                                                      <input value="<?php echo $fetchdata['Last_Working_DateUpdate']?>" type="date" name="Last_Working_Date" placeholder="" class="form-control" autocomplete="off" >
                                                    </div>
                                                  </div>
                                                  <div class="col-md-4 my-2">
                                                    <div class="form-group">
                                                      <label>Duty Location</label>
                                                      <input value="<?php echo $fetchdata['Duty_LocationUpdate']?>" type="text" name="Duty_Location" id="Duty_Location" placeholder="Duty Location" class="form-control" autocomplete="off" >
                                                    </div>
                                                  </div>
                                                  <div class="col-md-4 my-2">
                                                    <div class="form-group">
                                                      <label>Duty Point</label>
                                                      <input value="<?php echo $fetchdata['Duty_PointUpdate']?>" type="text" name="Duty_Point" id="Duty_Point" placeholder="Duty Point" class="form-control" autocomplete="off" >
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <tr>
                                            <td><input  type="submit" data-acpt="<?php echo $row['IdUpdate'] ?>" class="btn btn-success text-white float-right shadow" value="Accept" id="Accept" name="Accept<?php echo $row['Employee_ClassUpdate']?><?php echo $a?>"></td>
                                            <td><input type="submit" data-rejc="<?php echo $row['IdUpdate'] ?>" class="btn bg-danger text-white float-right shadow" value="Reject" id="Reject" name="Reject<?php echo $row['Employee_ClassUpdate']?><?php echo $a?>"> 
                                              <input type="number" readonly hidden name="deletid" value="<?php echo $row['Id']?>" id="">      
                                            </td>
                                            <td colspan="15"></td>
                                        </tr>
                                          <?php }
                                        $id = $row['Id']; 
                                          $select = mysqli_query($conn,"SELECT * FROM `employeedataupdate` WHERE `Employee_ClassUpdate`='TMA PAY' AND `Id`='$id'");
                                          while($fetchdata=mysqli_fetch_array($select)){
                                          ?>
                                          <div class="col-md-12 ">
                                            <div class="card card-success border border-2 border-dark bg-light">
                                              <div style="background-color: darkblue;" class="card-header text-white fw-bold">
                                                <div class="row">
                                                  <div class="col-sm-12 col-lg-5">
                                                    <div class="card-title text-white" style="width:fit-content;">Employement Information</div>
                                                  </div>
                                                  <div class="col-sm-12 col-lg-7">
                                                    <h3 class="bg-success p-2 rounded" style="width:fit-content;">TMA</h3>
                                                  </div>
                                                </div>
                                              </div>
                                              <br>
                                              <div class="card-body ">
                                                <div class="row">
                                                  <div class="col-md-4 my-2">
                                                    <div class="form-group">
                                                      <label>Employement Group</label>
                                                      <select name="Employement_Group_TMA" id="Employement_Group_TMA_drop" class="form-control ">
                                                      
                                                    <?php
                                                        include ('../link/desigene/db.php');
                                                        $select = mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='EmpGroup'");
                                                        if(mysqli_num_rows($select)>0){
                                                        ?>
                                                            <option value="" <?php echo ($fetchdata['Employement_GroupUpdate'] == '') ? 'selected' : ''; ?>>Select</option>
                                                        <?php
                                                            while($row=mysqli_fetch_assoc($select)){
                                                            ?>
                                                            <option <?php echo ($fetchdata['Employement_GroupUpdate'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
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
                                                      <select name="Employee_Class_TMA" id="Employee_Class_TMA_drop" class="form-control ">
                                                      
                                                    <?php
                                                        include ('../link/desigene/db.php');
                                                        $select = mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='Employee_Class'");
                                                        if(mysqli_num_rows($select)>0){
                                                        ?>
                                                            <option value="" <?php echo ($fetchdata['Employee_ClassUpdate'] == '') ? 'selected' : ''; ?>>Select</option>
                                                        <?php
                                                            while($row=mysqli_fetch_assoc($select)){
                                                            ?>
                                                            <option <?php echo ($fetchdata['Employee_ClassUpdate'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
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
                                                        <select name="Employee_Group_TMA" id="Employee_Group_TMA_drop" class="form-control ">
                                                    <?php
                                                        include ('../link/desigene/db.php');
                                                        $select = mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='Employee_Group'");
                                                        if(mysqli_num_rows($select)>0){
                                                        ?>
                                                            <option value="" <?php echo ($fetchdata['Employee_GroupUpdate'] == '') ? 'selected' : ''; ?>>Select</option>
                                                        <?php
                                                            while($row=mysqli_fetch_assoc($select)){
                                                            ?>
                                                            <option <?php echo ($fetchdata['Employee_GroupUpdate'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
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
                                                      <select name="Employee_Sub_Group_TMA" id="" class="form-control ">
                                                    <?php
                                                        include ('../link/desigene/db.php');
                                                        $select = mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='Employee_Sub_Group'");
                                                        if(mysqli_num_rows($select)>0){
                                                        ?>
                                                            <option value="" <?php echo ($fetchdata['Employee_Sub_GroupUpdate'] == '') ? 'selected' : ''; ?>>Select</option>
                                                        <?php
                                                            while($row=mysqli_fetch_assoc($select)){
                                                            ?>
                                                            <option <?php echo ($fetchdata['Employee_Sub_GroupUpdate'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
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
                                                        <select name="Employee_Quota_TMA" id="Employee_Quota_TMA_drop" class="form-control ">
                                                      
                                                    <?php
                                                        include ('../link/desigene/db.php');
                                                        $select = mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='Employee_Quota'");
                                                        if(mysqli_num_rows($select)>0){
                                                        ?>
                                                            <option value="" <?php echo ($fetchdata['Employee_QuotaUpdate'] == '') ? 'selected' : ''; ?>>Select</option>
                                                        <?php
                                                            while($row=mysqli_fetch_assoc($select)){
                                                            ?>
                                                            <option <?php echo ($fetchdata['Employee_QuotaUpdate'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
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
                                                      <input value="<?php echo $fetchdata['Salary_BankUpdate']?>" type="text" class="form-control" name="Salary_Bank_TMA" placeholder="Salary Bank">
                                                    </div>
                                                  </div>
                                                  <div class="col-md-4 my-2">
                                                    <div class="form-group">
                                                      <label>Salary Bank Branch</label>
                                                      <input value="<?php echo $fetchdata['Salary_BranchUpdate']?>" type="text" class="form-control" name="Salary_Branch_TMA" placeholder="Salary Branch">
                                                    </div>
                                                  </div>
                                                  <div class="col-md-4 my-2">
                                                    <div class="form-group">
                                                      <label>Account No</label>
                                                      <input value="<?php echo $fetchdata['Account_NoUpdate']?>" type="text" class="form-control" name="Account_No_TMA" placeholder="Account No">
                                                    </div>
                                                  </div>
                                                  <div class="col-md-4 my-2">
                                                    <div class="form-group">
                                                      <label>Pay Type</label>
                                                      <input value="<?php echo $fetchdata['Pay_TypeUpdate']?>" type="text" class="form-control" name="Pay_Type_TMA" placeholder="Pay Type">
                                                    </div>
                                                  </div>
                                                  <div class="col-md-4 my-2">
                                                    <div class="form-group">
                                                      <label>EOBI No</label>
                                                      <input value="<?php echo $fetchdata['EOBI_NoUpdate']?>" type="text" class="form-control" name="EOBI_No_TMA" placeholder="EOBI No">
                                                    </div>
                                                  </div>
                                                  <div class="col-md-4 my-2">
                                                    <div class="form-group">
                                                      <label>Bill Walved Off</label>
                                                      <input value="<?php echo $fetchdata['Bill_Walved_OffUpdate']?>" type="text" class="form-control" name="Bill_Walved_Off_TMA" placeholder="Bill Walved Off">
                                                    </div>
                                                  </div>
                                                  <div class="col-md-4 my-2">
                                                    <div class="form-group">
                                                      <label>Weekly Working Days</label>
                                                      <input value="<?php echo $fetchdata['Weekly_Working_DaysUpdate']?>" type="text" class="form-control" name="Weekly_Working_Days_TMA" placeholder="Weekly Working Days">
                                                    </div>
                                                  </div>
                                                  <div class="col-md-4 my-2">
                                                    <div class="form-group">
                                                      <label>Bill Waived Off</label>
                                                      <input value="<?php echo $fetchdata['Bill_Waived_OffUpdate']?>" type="text" class="form-control" name="Bill_Waived_Off_TMA" placeholder="Bill Waived Off">
                                                    </div>
                                                  </div>
                                                  <div class="col-md-4 my-2">
                                                    <div class="form-group">
                                                      <label>Employee Pay Classification</label>
                                                      <input value="<?php echo $fetchdata['Employee_Pay_ClassificationUpdate']?>" type="text" class="form-control" name="Employee_Pay_Classification_TMA" placeholder="Employee Pay Classification">
                                                    </div>
                                                  </div>
                                                  <div class="col-md-4 my-2">
                                                    <div class="form-group">
                                                      <label>Grade</label>
                                                      <select name="Grade_TMA" id="Grade_TMA_drop" class="form-control ">
                                                    <?php
                                                        include ('../link/desigene/db.php');
                                                        $select = mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='Grade'");
                                                        if(mysqli_num_rows($select)>0){
                                                        ?>
                                                            <option value="" <?php echo ($fetchdata['GradeUpdate'] == '') ? 'selected' : ''; ?>>Select</option>
                                                        <?php
                                                            while($row=mysqli_fetch_assoc($select)){
                                                            ?>
                                                            <option <?php echo ($fetchdata['GradeUpdate'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
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
                                                      <select name="Department_TMA" id="Department_TMA_drop" class="form-control ">
                                                    <?php
                                                        include ('../link/desigene/db.php');
                                                        $select = mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='Department'");
                                                        if(mysqli_num_rows($select)>0){
                                                        ?>
                                                            <option value="" <?php echo ($fetchdata['DepartmentUpdate'] == '') ? 'selected' : ''; ?>>Select</option>
                                                        <?php
                                                            while($row=mysqli_fetch_assoc($select)){
                                                            ?>
                                                            <option <?php echo ($fetchdata['DepartmentUpdate'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
                                                            <?php   
                                                            }
                                                        }
                                                        ?>  
                                                    </select>
                                                    </div>
                                                  </div>
                                                  <div class="col-md-4 my-2">
                                                    <div  class="form-group">
                                                      <label>Job Tiltle</label>
                                                      <select name="Job_Tiltle_TMA" id="Job_Tiltle_TMA_drop" class="form-control ">
                                                    <?php
                                                        include ('../link/desigene/db.php');
                                                        $select = mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='Job_Tiltle'");
                                                        if(mysqli_num_rows($select)>0){
                                                        ?>
                                                            <option value="" <?php echo ($fetchdata['Job_TiltleUpdate'] == '') ? 'selected' : ''; ?>>Select</option>
                                                        <?php
                                                            while($row=mysqli_fetch_assoc($select)){
                                                            ?>
                                                            <option <?php echo ($fetchdata['Job_TiltleUpdate'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
                                                            <?php   
                                                            }
                                                        }
                                                        ?>   
                                                    </select>
                                                    </div>
                                                  </div>
                                                  <div class="col-md-4 my-2">
                                                    <div class="form-group">
                                                      <label>Type</label>
                                                        <select name="Type_TMA" id="Type_TMA_drop" class="form-control ">
                                                    <?php
                                                        include ('../link/desigene/db.php');
                                                        $select = mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='type'");
                                                        if(mysqli_num_rows($select)>0){
                                                        ?>
                                                            <option value="" <?php echo ($fetchdata['typeUpdate'] == '') ? 'selected' : ''; ?>>Select</option>
                                                        <?php
                                                            while($row=mysqli_fetch_assoc($select)){
                                                            ?>
                                                            <option <?php echo ($fetchdata['typeUpdate'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
                                                            <?php   
                                                            }
                                                        }
                                                        ?>  
                                                    </select>
                                                    </div>
                                                  </div>
                                                  <div class="col-md-4 my-2">
                                                    <div class="form-group">
                                                      <label>Salary Mode</label>
                                                        <select name="Salary_Mode_TMA" id="Salary_Mode_TMA_drop" id="Salary_Mode" class="form-control ">
                                                    <?php
                                                        include ('../link/desigene/db.php');
                                                        $select = mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='Salary_Mode'");
                                                        if(mysqli_num_rows($select)>0){
                                                        ?>
                                                            <option value="" <?php echo ($fetchdata['Salary_ModeUpdate'] == '') ? 'selected' : ''; ?>>Select</option>
                                                        <?php
                                                            while($row=mysqli_fetch_assoc($select)){
                                                            ?>
                                                            <option <?php echo ($fetchdata['Salary_ModeUpdate'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
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
                                                      <select name="Status_TMA" id="Status_TMA_drop" id="Status_tma" class="form-control ">
                                                    <?php
                                                        include ('../link/desigene/db.php');
                                                        $select = mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='Status'");
                                                        if(mysqli_num_rows($select)>0){
                                                        ?>
                                                            <option value="" <?php echo ($fetchdata['StatusUpdate'] == '') ? 'selected' : ''; ?>>Select</option>
                                                        <?php
                                                            while($row=mysqli_fetch_assoc($select)){
                                                            ?>
                                                            <option <?php echo ($fetchdata['StatusUpdate'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
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
                                                      <input value="<?php echo $fetchdata['']?>"Update id="EmployeeNo"  type="text" name="EmployeeNo_TMA" placeholder="Employee NO" class="form-control" autocomplete="off" >
                                                    </div>
                                                  </div>
                                                  <div class="col-md-4 my-2">
                                                    <div class="form-group">
                                                      <label>Manager ID No</label>
                                                      <div>
                                                      <select name="Employee_Manager_TMA" id="employee_noTMA" class="form-control ">
                                                    <?php
                                                        include ('../link/desigene/db.php');
                                                        $select = mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='Employee_Manager'");
                                                        if(mysqli_num_rows($select)>0){
                                                        ?>
                                                            <option value="" <?php echo ($fetchdata['Employee_ManagerUpdate'] == '') ? 'selected' : ''; ?>>Select</option>
                                                        <?php
                                                            while($row=mysqli_fetch_assoc($select)){
                                                            ?>
                                                            <option <?php echo ($fetchdata['Employee_ManagerUpdate'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
                                                            <?php   
                                                            }
                                                        }
                                                        ?>  
                                                    </select>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-4 my-2">
                                                      <div class="form-group">
                                                        <label> Attendance Supervisor</label>
                                                        <select name="Attendance_Supervisor_TMA" id="superviserTMA" class="form-control ">
                                                    <?php
                                                        include ('../link/desigene/db.php');
                                                        $select = mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='Attendance_Supervisor'");
                                                        if(mysqli_num_rows($select)>0){
                                                        ?>
                                                            <option value="" <?php echo ($fetchdata['Attendance_SupervisorUpdate'] == '') ? 'selected' : ''; ?>>Select</option>
                                                        <?php
                                                            while($row=mysqli_fetch_assoc($select)){
                                                            ?>
                                                            <option <?php echo ($fetchdata['Attendance_SupervisorUpdate'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
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
                                                        <label> DY.Manager </label>
                                                        <select name="DY_Supervisor_TMA" id="DY_Supervisor" class="form-control ">
                                                    <?php
                                                        include ('../link/desigene/db.php');
                                                        $select = mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='DY_Supervisor'");
                                                        if(mysqli_num_rows($select)>0){
                                                        ?>
                                                            <option value="" <?php echo ($fetchdata['DY_SupervisorUpdate'] == '') ? 'selected' : ''; ?>>Select</option>
                                                        <?php
                                                            while($row=mysqli_fetch_assoc($select)){
                                                            ?>
                                                            <option <?php echo ($fetchdata['DY_SupervisorUpdate'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
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
                                                      <input value="<?php echo $fetchdata['Joining_DateUpdate']?>" type="date" name="Joining_Date_TMA" placeholder="Joining Date" class="form-control" autocomplete="off" >
                                                    </div>
                                                  </div>
                                                  <div class="col-md-4 my-2">
                                                    <div class="form-group">
                                                      <label>Contract Expiry Date</label>
                                                      <input value="<?php echo $fetchdata['Contract_Expiry_DateUpdate']?>" type="date" name="Contract_Expiry_Date_TMA" id="Contract_Expiry_Date_tma" placeholder="" class="form-control" autocomplete="off" >
                                                    </div>
                                                  </div>
                                                  <div class="col-md-4 my-2">
                                                    <div class="form-group">
                                                      <label>Last Working Day</label>
                                                      <input value="<?php echo $fetchdata['Last_Working_DateUpdate']?>" type="date" name="Last_Working_Date_TMA" id="Last_Working_Day" placeholder="" class="form-control" autocomplete="off" >
                                                    </div>
                                                  </div>
                                                  <div class="col-md-4 my-2">
                                                    <div class="form-group">
                                                      <label>Duty Location</label>
                                                      <input value="<?php echo $fetchdata['Duty_LocationUpdate']?>" type="text" name="Duty_Location_TMA" id="Duty_Location" placeholder="Duty Location" class="form-control" autocomplete="off" >
                                                    </div>
                                                  </div>
                                                  <div class="col-md-4 my-2">
                                                  <div class="form-group">
                                                    <label>Duty Point</label>
                                                    <input value="<?php echo $fetchdata['Duty_PointUpdate']?>" type="text" name="Duty_Point_TMA" placeholder="Duty Point" class="form-control" autocomplete="off" >
                                                  </div>
                                                </div>
                                              </div>
                                              </div>
                                          </div>
                                          </div>
                                            <tr>
                                              <td colspan="15"></td>
                                              <td><input  type="submit" data-acpt="<?php echo $row['IdUpdate'] ?>" class="btn btn-success text-white float-right shadow" value="Accept" id="Accept" name="Accept<?php echo $row['Employee_ClassUpdate']?><?php echo $a?>"></td>
                                              <td><input type="submit" data-rejc="<?php echo $row['IdUpdate'] ?>" class="btn bg-danger text-white float-right shadow" value="Reject" id="Reject" name="Reject<?php echo $row['Employee_ClassUpdate']?><?php echo $a?>"> 
                                                <input type="number" readonly hidden name="deletid" value="<?php echo $row['Id']?>" id="">      
                                              </td>
                                          </tr>
                                          <?php } ?>
                                        </div>
                                    </div>
                                  
                                </div>
                              </div>
                            </div>
                                </td>
                              </tr>
                              
                          </form>
                        <?php
                    $a++;} }
                            ?>
                  </tbody>
                </table>
        </div>
    </div>
    </div>
  </div>
<?php include('link/desigene/script.php')?>
<?php include('../link/desigene/script.php') ?>
  <!-- jequery  -->
  <script>
    $(document).ready(function(){
      function loadTable(){
        $.ajax({
          url : "ajex/new_employeeupdate.php",
          type:"POST",
          success : function(data){
            $("#table-data").html(data);
          }
        });
      }
      loadTable();
      $(document).on("click", "#Accept",function(){
        var accept = $(this).data("acpt");
    //   alert(accept);
        $.ajax({
          url : "ajex/NEW_EMP_Accept_ajax.php",
          type:"POST",
          data : {id : accept},
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
      $(document).on("click", "#Reject",function(){
        var Reject = $(this).data("rejc");
    //   alert(Reject);
        $.ajax({
          url : "ajex/NEW_EMP_Reject_ajax.php",
          type:"POST",
          data : {id : Reject},
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
    });
    
    </script>
</body>
</html>
<?php }?>