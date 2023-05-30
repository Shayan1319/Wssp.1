<?php 
include('../link/desigene/db.php');

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
$Employee_Class = $_POST ["Employee_Class"];
$Employee_Group = $_POST ["Employee_Group"];
$Employee_Sub_Group = $_POST ["Employee_Sub_Group"];
$Employee_Quota = $_POST ["Employee_Quota"];
$Grade_tma = $_POST ["Grade_tma"];
$Department = $_POST ["Department"];
$Job_Tiltle = $_POST ["Job_Tiltle"];
$Salary_Mode = $_POST ["Salary_Mode"];
$Employee_Status = $_POST ["Status"];
$EmployeeNowssp = $_POST ["EmployeeNowssp"];
$Employee_Manager = $_POST ["Employee_Manager"];
$Joining_Date = $_POST ["Joining_Date"];
$Contract_Expiry_Date = $_POST ["Contract_Expiry_Date"];
$Last_Working_Date = $_POST ["Last_Working_Date"];
$Attendance_Supervisor = $_POST ["Attendance_Supervisor"];
$Duty_Location = $_POST ["Duty_Location"];
$Duty_Point = $_POST ["Duty_Point"];
$EmpGrupTma = $_POST ["EmpGrupTma"];
$Employee_Class_tma = $_POST ["Employee_Class_tma"];
$Employee_Group_tma = $_POST ["Employee_Group_tma"];
$Employee_Sub_Group_tma = $_POST ["Employee_Sub_Group_tma"];
$Employee_Quota_tma = $_POST ["Employee_Quota_tma"];
$Grande_tma = $_POST ["Grande_tma"];
$Department_name = $_POST ["Department_name"];
$Job_Tiltle_tma = $_POST ["Job_Tiltle_tma"];
$Salary_Mode_tma = $_POST ["Salary_Mode_tma"];
$Status_tma = $_POST ["Status_tma"];
$EmployeeNo_tma = $_POST ["EmployeeNo_tma"];
$Employee_Manager_tma = $_POST ["Employee_Manager_tma"];
$Joining_Date_tma = $_POST ["Joining_Date_tma"];
$Contract_Expiry_Date_tma = $_POST ["Contract_Expiry_Date_tma"];
$Last_Working_Day = $_POST ["Last_Working_Day"];
$Attendance_Supervisor_tma = $_POST ["Attendance_Supervisor_tma"];
$Duty_Location_tma = $_POST ["Duty_Location_tma"];
$Duty_Point_tma = $_POST ["Duty_Point_tma"];
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
$insertquery = "INSERT INTO `employeeinfo`( `image`, `fName`, `mName`, `lName`, `father_Name`, `CNIC`, `email`, `pAddress`, `cAddress`, `city`, `postAddress`, `mNumber`, `ofphNumber`, `Alternate_Number`, `DofB`, `religion`, `gender`, `BlGroup`, `Domicile`, `MaritalStatus`, `NextofKin`, `NextofKinCellNumber`, `ContactPerson`, `CPCN`, `Employement_Group`, `Employee_Class`, `Employee_Group`, `Employee_Sub_Group`, `Employee_Quota`, `Grade_tma`, `Department`, `Job_Tiltle`, `Salary_Mode`, `Employee_Status`, `EmployeeNowssp`, `Employee_Manager`, `Joining_Date`, `Contract_Expiry_Date`, `Last_Working_Date`, `Attendance_Supervisor`, `Duty_Location`, `Duty_Point`, `EmpGrupTma`, `Employee_Class_tma`, `Employee_Group_tma`, `Employee_Sub_Group_tma`, `Employee_Quota_tma`, `Grande_tma`, `Department_name`, `Job_Tiltle_tma`, `Salary_Mode_tma`, `Status_tma`, `EmployeeNo_tma`, `Employee_Manager_tma`, `Joining_Date_tma`, `Contract_Expiry_Date_tma`, `Last_Working_Day`, `Attendance_Supervisor_tma`, `Duty_Location_tma`, `Duty_Point_tma`, `Status`) VALUES ('$Image_name','$fName','$mName','$lName','$father_Name','$CNIC','$email','$pAddress','$cAddress','$city','$postAddress','$mNumber','$ofphNumber','$Alternate_Number','$DofB','$religion','$gender','$BlGroup','$Domicile','$MaritalStatus','$NextofKin','$NextofKinCellNumber','$ContactPerson','$CPCN','$Employement_Group','$Employee_Class','$Employee_Group','$Employee_Sub_Group','$Employee_Quota','$Grade_tma','$Department','$Job_Tiltle','$Salary_Mode','$Employee_Status','$EmployeeNowssp','$Employee_Manager','$Joining_Date','$Contract_Expiry_Date','$Last_Working_Date','$Attendance_Supervisor','$Duty_Location','$Duty_Point','$EmpGrupTma','$Employee_Class_tma','$Employee_Group_tma','$Employee_Sub_Group_tma','$Employee_Quota_tma','$Grande_tma','$Department_name','$Job_Tiltle_tma','$Salary_Mode_tma','$Status_tma','$EmployeeNo_tma','$Employee_Manager_tma','$Joining_Date_tma','$Contract_Expiry_Date_tma','$Last_Working_Day','$Attendance_Supervisor_tma','$Duty_Location_tma','$Duty_Point_tma','Block')";
$query= mysqli_query($conn,$insertquery);
if($query)
{
    echo '<script>alert("Data is inserted");</script>';
    $sqlA = "CREATE TABLE `database_wssc`.`$CNIC A`(
    Id INT PRIMARY KEY AUTO_INCREMENT,
    Qualification  VARCHAR(255),
    GradeDivision VARCHAR(255),
    Passing_Year_of_Degree VARCHAR(255),
    Last_Institute VARCHAR(255),
    PEC_Registration VARCHAR(255),
    CV VARCHAR(255),
    Institute_AddressCV VARCHAR(255),
    Major_Subject VARCHAR(255),
    RemarksCV VARCHAR(255)
    )";
     $sqlB = "CREATE TABLE `database_wssc`.`$CNIC B`(
        Id INT PRIMARY KEY AUTO_INCREMENT,
        Training_Serial_Number VARCHAR(255),
        Training_Name VARCHAR(255),
        Institute VARCHAR(255),
        City VARCHAR(255),
        Institute_Address VARCHAR(255),
        Oblige_Sponsor VARCHAR(255),
        From_Date DATE,
        To_Date DATE,
        Duration VARCHAR(255)
      )";
      $sqlC = "CREATE TABLE `database_wssc`.`$CNIC C`(
          Id INT PRIMARY KEY AUTO_INCREMENT,
          From_Designation VARCHAR(255),
          To_Designation VARCHAR(255),
          From_BPS VARCHAR(255),
          ToBps VARCHAR(255),
          Promotion_Date VARCHAR(255),
          Promotion_Number VARCHAR(255),
          Department1 VARCHAR(255),
          Acting VARCHAR(255),
          Remarks VARCHAR(255)
      )";
      $sqlD = "CREATE TABLE `database_wssc`.`$CNIC D`(
        Id INT PRIMARY KEY AUTO_INCREMENT,
        Transfer_Order_Number VARCHAR(255),
        Designation VARCHAR(255),
        BPS VARCHAR(255),
        From_Department VARCHAR(255),
        To_Project VARCHAR(255),
        From_Station VARCHAR(255),
        To_Station VARCHAR(255),
        Worked_From VARCHAR(255),
        Transfer_Date VARCHAR(255)
    )";
    $sqlE = "CREATE TABLE `database_wssc`.`$CNIC E`(
      Id INT PRIMARY KEY AUTO_INCREMENT,
      Spouse_Name VARCHAR(255),
      CNIC VARCHAR(255),
      Date_of_B VARCHAR(255)
  )";
    $tableA = $conn->query($sqlA);
    $tableB = $conn->query($sqlB);
    $tableC = $conn->query($sqlC);
    $tableD = $conn->query($sqlD);
    $tableE = $conn->query($sqlE);

     if ( $tableA === TRUE && $tableB === TRUE && $tableC === TRUE && $tableD === TRUE && $tableD === TRUE) {
      echo '<script>alert( "Table created successfully");</script>';
     ?>
            <script>
                location.replace('Qualification.php?updat=<?php echo $CNIC?>');
            </script>
     <?php
    } else {
      echo "Error creating table: " ;
    }
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
                    <!-- /.card-header -->
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
                          <label>Permenent Address</label>
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
                              <option value="">Male</option>
                              <option value="">Female</option>
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
                              <option value=""> Married</option>
                              <option value=""> Unmarried</option>
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
                          <br><!-- /.card-header -->
                          <div class="card-body ">
                            <div class="row">
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employement Group</label>
                                  <select id="EmpGroup" name="Employement_Group" class="form-control">
                                    <option>Choose CONTRACTUAL/CONTINGENT</option>
                                    <option>WSSC CONTRACTUAL</option>
                                    <option>WSSC CONTINGENT</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Class</label>
                                  <select id="Employee_Class" name="Employee_Class" class="form-control">
                                    <option>Select</option>
                                    <option>Wssc Pay</option>
                                    <option>TMA Pay</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Group</label>
                                  <select id="Employee_Group" name="Employee_Group" class="form-control">
                                    <option>Select</option>
                                    <option>WSSCS-ADMIN PAY</option>
                                    <option>WSSCS-COMMERCIAL</option>
                                    <option>WSSCS-MANAGEMENT</option>
                                    <option>WSSCS-MSW PAY</option>
                                    <option>WSSCS-WATER PAY</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Sub Group</label>
                                  <select name="Employee_Sub_Group" class="form-control">
                                    <option>Select</option>
                                    <option>WSSCS-ADMIN-CONTINGENT PAY</option>
                                    <option>WSSCS-ADMIN-CONTRACTUAL PAY</option>
                                    <option>WSSCS-COMMERCIAL-CONTINGENT</option>
                                    <option>WSSCS-COMMERCIAL-CONTRACT</option>
                                    <option>WSSCS-MANAGEMENT</option>
                                    <option>WSSCS-MSW-CONTINGENT PAY</option>
                                    <option>WSSCS-MSW-CONTINGENT PAY (EXT.)</option>
                                    <option>WSSCS-MSW-CONTRACTUAL PAY</option>
                                    <option>WSSCS-WATER-CONTINGENT PAY</option>
                                    <option>WSSCS-WATER-CONTRACTUAL PAY</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Quota</label>
                                  <select id="Employee_Quota" name="Employee_Quota" class="form-control">
                                    <option>Select</option>
                                    <option>DECEASED SON</option>
                                    <option>DISABLED</option>
                                    <option>LETTER OF INTEREST</option>
                                    <option>MINORITIES</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Grade</label>
                                  <select id="" name="Grade_tma" class="form-control">
                                    <option>Select</option>
                                    <option>CONTINGENT</option>
                                    <option>COVID-19</option>
                                    <option>DAILY WAGE</option>
                                    <option>INTERNSHIP</option>
                                    <option>M–1</option>
                                    <option>M–3</option>
                                    <option>M–4</option>
                                    <option>M–5</option>
                                    <option>M–6</option>
                                    <option>M–7</option>
                                    <option>S–1</option>
                                    <option>S–2</option>
                                    <option>S–3</option>
                                    <option>S–4</option>
                                    <option>STREAM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Department</label>
                                  <select name="Department" id="Department" class="form-control">
                                    <option>Select</option>
                                    <option>ADMINISTRATION</option>
                                    <option>COMMERCIAL</option>
                                    <option>SANITATION</option>
                                    <option>WATER SUPPLY</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Job Tiltle</label>
                                  <select name="Job_Tiltle" class="form-control">
                                    <option>Select</option>
                                    <option>CHIEF EXECUTIVE OFFICER</option>
                                    <option>GM (HR, ADMIN &amp; PROCUREMENT)</option>
                                    <option>MANAGER SOLID WASTE</option>
                                    <option>SENIOR MANAGER COMMERCIAL</option>
                                    <option>DY.MANAGER-ADMIN &amp; PROCUREMENT</option>
                                    <option>AM-WATER SUPPLY</option>
                                    <option>DY.MANAGER-SOLID WASTE</option>
                                    <option>MANAGER WATER SUPPLY OPERATIONS</option>
                                    <option>COMPLAINT MANAGEMENT OFFICER</option>
                                    <option>MECHANICAL OFFICER</option>
                                    <option>ASST.MANAGER HUMAN RESOURCE</option>
                                    <option>CHIEF FINANCIAL OFFICER</option>
                                    <option>DY.MANAGER ACCOUNTS</option>
                                    <option>ADMIN AND PROCUREMENT OFFICER</option>
                                    <option>AM-WATER SUPPLY</option>
                                    <option>ACCOUNTS JUNIOR</option>
                                    <option>BILLING OFFICER</option>
                                    <option>COMPUTER OPERATOR</option>
                                    <option>ACCOUNTS OFFICER</option>
                                    <option>ASSOCIATE ENGINEER</option>
                                    <option>FLEET CUM MECHANICAL OFFICER</option>
                                    <option>IT ASSISTANT</option>
                                    <option>AM-SOLID WASTE</option>
                                    <option>BILLING OFFICER</option>
                                    <option>ADMIN AND PROCUREMENT OFFICER</option>
                                    <option>TECHNICAL EXPERT NETWORK &amp; SYSTEMS</option>
                                    <option>RECEPTIONIST</option>
                                    <option>CAMERA MAN</option>
                                    <option>LEGAL ADVISOR</option>
                                    <option>ADMIN ASSISTANT</option>
                                    <option>DATA ENTRY ASSISTANT</option>
                                    <option>AM–FINANCE</option>
                                    <option>MEDIA OFFICER</option>
                                    <option>OFFICE BOY</option>
                                    <option>PAYROLL OFFICER</option>
                                    <option>DRIVER</option>
                                    <option>GM OPERATIONS &amp; ENGINEERING SERVICES</option>
                                    <option>TW OPERATOR</option>
                                    <option>LINE MAN</option>
                                    <option>ASSIST TO MANAGER OPS</option>
                                    <option>VALVE MAN</option>
                                    <option>WELDER</option>
                                    <option>BILLING SUPERVISOR</option>
                                    <option>LINE INSPECTOR</option>
                                    <option>HELPER</option>
                                    <option>WATER SUPPLY INSPECTOR</option>
                                    <option>BILLING BOY</option>
                                    <option>VALVE WOMAN</option>
                                    <option>SANITARY WORKER</option>
                                    <option>WATCHMAN</option>
                                    <option>SANITARY SUPERVISOR</option>
                                    <option>SANITARY CONDUCTOR</option>
                                    <option>INTERN-CIVIL ENGINEER</option>
                                    <option>SANITARY DRIVER</option>
                                    <option>STREAM INSPECTOR</option>
                                    <option>STREAM WORKER</option>
                                    <option>DRIVER TO CEO</option>
                                    <option>EXCAVATOR OPERATOR</option>
                                    <option>INTERN-ASSOCIATE ENGINEER</option>
                                    <option>LEGAL ADVISOR</option>
                                    <option>LETIGATION CLERK</option>
                                    <option>MSW SORTING SPECIALIST</option>
                                    <option>MANAGMENT TRAINEE OFFICER</option>
                                    <option>COVID19 WORKER</option>
                                    <option>WELDER</option>
                                    <option>HELPER TO PIPE FITTER</option>
                                    <option>SANITARY DRIVER</option>
                                    <option>HELPER</option>
                                    <option>BCC SUPERVISOR</option>
                                    <option>BCC COORDINATOR</option>
                                    <option>INTERN-ELECTRICAL ENGINEER</option>
                                    <option>INTERN-MEDIA COMMUNICATION</option>
                                    <option>WATER SUPPLY SPECIALIST</option>
                                    <option>ASSOCIATE ENGINEER</option>
                                    <option>VALVE MAN</option>
                                    <option>COOK</option>
                                    <option>OFFICE ASSISTANT</option>
                                    <option>INTERNEE</option>      
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Salary Mode</label>
                                  <select name="Salary_Mode" class="form-control">
                                    <option>Select</option>
                                    <option>BANK TRANSFER</option>
                                    <option>CHEQUE</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Status</label>
                                  <select name="Status" id="Status" class="form-control">
                                    <option>Select</option>
                                    <option>CONTRACT EXP</option>
                                    <option>ON-DUTY</option>
                                    <option>OTHER</option>
                                    <option>PROBATION</option>
                                    <option>REPATRIATED</option>
                                    <option>RESIGNED</option>
                                    <option>RETIRED</option>
                                    <option>SALARY HOLD</option>
                                    <option>TERMINATED</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee NO</label>
                                  <input type="text" id="EmployeeNowssp" name="EmployeeNowssp" placeholder="Employee NO" class="form-control" autocomplete="off" >
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Manager</label>
                                  <input type="text" name="Employee_Manager"
                                  id="Employee_Manager" placeholder="Employee Manager" class="form-control" autocomplete="off" >
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
                                  <label>Attendance Supervisor</label>
                                  <input type="text" class="form-control" placeholder="Attendance Supervisor" name="Attendance_Supervisor" id="Attendance_Supervisor">
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
                          <!-- /.card-header -->
                          <div class="card-body ">
                            <div class="row">
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employement Group</label>
                                  <select name="EmpGrupTma" class="form-control">
                                    <option>Choose Permanent/Daily Wages</option>
                                    <option>TMA PERMANENT</option>
                                    <option>TMA DAILY WAGES</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Class</label>
                                  <select name="Employee_Class_tma" id="Employee_Class_Tma" class="form-control">
                                    <option>Select</option>
                                    <option>Wssc Pay</option>
                                    <option>TMA Pay</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Group</label>
                                  <select name="Employee_Group_tma" id="Employee_Group" class="form-control">
                                    <option>Select</option>
                                    <option>TMA-ADMIN PAY</option>
                                    <option>TMA-COMMERCIAL</option>
                                    <option>TMA-MSW PAY</option>
                                    <option>TMA-WATER PAY</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Sub Group</label>
                                  <select name="Employee_Sub_Group_tma" class="form-control">
                                    <option>Select</option>
                                    <option>TMA-ADMIN-PERMANENT PAY</option>
                                    <option>TMA-COMMERCIAL-PERMANENT PAY</option>
                                    <option>TMA-MSW-DAILY WAGES PAY</option>
                                    <option>TMA-MSW-PARMANENT PAY</option>
                                    <option>TMA-WATER-DAILY WAGES PAY</option>
                                    <option>TMA-WATER-PERMANENT PAY</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Quota</label>
                                  <select name="Employee_Quota_tma" id="Employee_Quota_tma" class="form-control">
                                    <option>Select</option>
                                    <option>DECEASED SON</option>
                                    <option>DISABLED</option>
                                    <option>LETTER OF INTEREST</option>
                                    <option>MINORITIES</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Grade</label>
                                  <select name="Grande_tma" id="Grande_tma" class="form-control">
                                    <option>Select</option>
                                    <option>BPS-2</option>
                                    <option>BPS-3</option>
                                    <option>BPS-4</option>
                                    <option>BPS-5</option>
                                    <option>BPS-6</option>
                                    <option>BPS-7</option>
                                    <option>BPS-9</option>
                                    <option>BPS-11</option>
                                    <option>BPS-14</option>
                                    <option>BPS-16</option>
                                    <option>BPS-17</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Department</label>
                                  <select name="Department_name" id="Department_name" class="form-control">
                                    <option>Select</option>
                                    <option>ADMINISTRATION</option>
                                    <option>COMMERCIAL</option>
                                    <option>SANITATION</option>
                                    <option>WATER SUPPLY</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div  class="form-group">
                                  <label>Job Tiltle</label>
                                  <select name="Job_Tiltle_tma" id="Job_Tiltle" class="form-control">
                                    <option>Select</option>
                                    <option>OFFICE ASSISTANT</option>
                                    <option>CLERK</option>
                                    <option>JUNIOR CLERK</option>
                                    <option>DRAFTSMAN</option>
                                    <option>DRIVER</option>
                                    <option>NAIB QASID</option>
                                    <option>SANITARY SUPERVISOR</option>
                                    <option>PIPE FITTER</option>
                                    <option>LINE MAN</option>
                                    <option>TW OPERATOR</option>
                                    <option>VALVE MAN</option>
                                    <option>HELPER TO PIPE FITTER</option>
                                    <option>WELDER</option>
                                    <option>CHIEF SANITARY INSPECTOR</option>
                                    <option>ASSTT:SANITARY INSPECTOR</option>
                                    <option>BLACKSMITH</option>
                                    <option>SANITARY WORKER</option>
                                    <option>MALARIA INSPECTOR</option>
                                    <option>MALARIA SUPERVISOR</option>
                                    <option>MOTOR TRANSPORT OFFICER</option>
                                    <option>WATER RATE COLLECTOR</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Salary Mode</label>
                                  <select name="Salary_Mode_tma" id="Salary_Mode" class="form-control">
                                    <option>Select</option>
                                    <option>BANK TRANSFER</option>
                                    <option>CHEQUE</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Status</label>
                                  <select name="Status_tma" id="Status_tma" class="form-control">
                                    <option>Select</option>
                                    <option>CONTRACT EXP</option>
                                    <option>ON-DUTY</option>
                                    <option>OTHER</option>
                                    <option>PROBATION</option>
                                    <option>REPATRIATED</option>
                                    <option>RESIGNED</option>
                                    <option>RETIRED</option>
                                    <option>SALARY HOLD</option>
                                    <option>TERMINATED</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee NO</label>
                                  <input id="EmployeeNo_tma"  type="text" name="EmployeeNo_tma" placeholder="Employee NO" class="form-control" autocomplete="off" >
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Manager</label>
                                  <input type="text" name="Employee_Manager_tma" id="Employee_Manager" placeholder="Employee Manager" class="form-control" autocomplete="off" >
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Joining Date</label>
                                  <input type="date" name="Joining_Date_tma" placeholder="Joining Date" class="form-control" autocomplete="off" >
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Contract Expiry Date</label>
                                  <input type="date" name="Contract_Expiry_Date_tma" id="Contract_Expiry_Date_tma" placeholder="" class="form-control" autocomplete="off" >
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Last Working Day</label>
                                  <input type="date" name="Last_Working_Day" id="Last_Working_Day" placeholder="" class="form-control" autocomplete="off" >
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label> Attendance Supervisor</label>
                                  <input class="form-control" type="text" placeholder="Attendance Supervisor" name="Attendance_Supervisor_tma" id="">
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Duty Location</label>
                                  <input type="text" name="Duty_Location_tma" id="Duty_Location" placeholder="Duty Location" class="form-control" autocomplete="off" >
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                              <div class="form-group">
                                <label>Duty Point</label>
                                <input type="text" name="Duty_Point_tma" placeholder="Duty Point" class="form-control" autocomplete="off" >
                              </div>
                            </div>
                          </div>
                          </div>
                      </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 text-end mt-2">
                    <input style="background-color: darkblue;" onclick="backToSection1()" type="button" class="btn text-white  float-right shadow" value="Back">
                    <input style="background-color: darkblue;" name="submit" type="submit" class="btn text-white  float-right shadow" value="Submit">
                    
                  </div>
                </div>
              </div>
            </div>
            <!-- Col-12 -->
          </div>
        </div>
      </form>
    </div>
    <script>
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