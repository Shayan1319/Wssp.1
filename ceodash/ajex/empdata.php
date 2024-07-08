<?php
include ('../link/desigene/db.php');
$id = $_POST['id'];
$date = isset($_POST['date']) ? $_POST['date'] : '';

if ($date != '') {
$select = mysqli_query($conn, "SELECT * FROM `employeedataupdate` WHERE `IdUpdate` = $id && `Id`=$date ORDER BY `Id` DESC LIMIT 1");
}
else{
$select = mysqli_query($conn, "SELECT * FROM `employeedataupdate` WHERE `IdUpdate` = $id ORDER BY `Id` DESC LIMIT 1");
}
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
                <input value="<?php echo $fetchdata['imageUpdate']?>" id="file1" name="image" onchange="document.getElementById('log1').src = window.URL.createObjectURL(this.files[0])" type="file" accept="image/*" class="form-control" style="overflow: hidden;" placeholder="Insert Your Image">
            </div>
          </div>
          <div class="col-md-4 my-2"></div>
          <div class="col-md-4 my-2 ">
            <div class="form-group mr-3 mt-0">
              <img id="log1" class="shadow" style="border: 1px blue solid; border-radius: 10%; margin-top: -4%" src="../image/<?php echo $fetchdata['imageUpdate']?>" width="120px;" height="130px">
            </div>
          </div>
          <div class="col-md-4 my-2">
            <div class="form-group">
              <label>First Name</label>
              <input value="<?php echo $fetchdata['fNameUpdate']?>" id="fName" type="text" name="fName" placeholder="First Name" class="form-control" autocomplete="off" >
              <input type="number"  name="Id" readonly hidden value="<?php  echo $fetchdata['IdUpdate'];?>">
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
              <input value="<?php echo $fetchdata['DofBUpdate']?>" id="DofB" type="text" name="DofB" class="form-control datepicker" autocomplete="off" >
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
                    <option <?php echo ($fetchdata['religionUpdate'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
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
                  <option <?php echo ($fetchdata['MaritalStatusUpdate'] == 'Married') ? 'selected' : ''; ?> value="Married"> Married</option>
                  <option <?php echo ($fetchdata['MaritalStatusUpdate'] == 'Unmarried') ? 'selected' : ''; ?> value="Unmarried"> Unmarried</option>
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
  <div id="section2" >
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
                                  <select name="Salary_Bank" id="SalaryBank_drop" class="form-control ">
                                <?php
                                    include ('../link/desigene/db.php');
                                    $select = mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='SalaryBank'");
                                    if(mysqli_num_rows($select)>0){
                                    ?>
                                        <option value="" <?php echo ($fetchdata['Salary_BankUpdate'] == '') ? 'selected' : ''; ?>>Select</option>
                                    <?php
                                        while($row=mysqli_fetch_assoc($select)){
                                        ?>
                                        <option <?php echo ($fetchdata['Salary_BankUpdate'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
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
                                        <option value="" <?php echo ($fetchdata['Salary_BranchUpdate'] == '') ? 'selected' : ''; ?>>Select</option>
                                    <?php
                                        while($row=mysqli_fetch_assoc($select)){
                                        ?>
                                        <option <?php echo ($fetchdata['Salary_BranchUpdate'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
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
                                  <input value="<?php echo $fetchdata['Account_NoUpdate']?>" type="text" class="form-control" name="Account_No" placeholder="Account No" >
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
                                        <option value="" <?php echo ($fetchdata['Pay_TypeUpdate'] == '') ? 'selected' : ''; ?>>Select</option>
                                    <?php
                                        while($row=mysqli_fetch_assoc($select)){
                                        ?>
                                        <option <?php echo ($fetchdata['Pay_TypeUpdate'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
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
                                  <input value="<?php echo $fetchdata['EOBI_NoUpdate']?>" type="text" class="form-control" name="EOBI_No" placeholder="EOBI No" >
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                  <div class="form-group">
                                      <label>Bill Waived Off</label>
                                      <select name="Bill_Waived_Off" id="Bill_Waived_Off" class="form-control select2" onchange="toggleVisibility()">
                                          <option value="NO" <?php echo ($fetchdata['Bill_Waived_OffUpdate'] == 'NO') ? 'selected' : ''; ?>>NO</option>
                                          <option value="YES" <?php echo ($fetchdata['Bill_Waived_OffUpdate'] == 'YES') ? 'selected' : ''; ?>>YES</option>
                                      </select>
                                  </div>
                              </div>


                              <div class="col-md-4 my-2" id="billWiaivedoff">
                                  <div class="form-group">
                                      <label>Bill Waived Off</label>
                                      <input type="text" class="form-control" value="<?php echo $fetchdata['Bill_Walved_OffUpdate']?>" name="Bill_Walved_Off" placeholder="Bill Waived Off">
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
                                  <input value="<?php echo $fetchdata['Weekly_Working_DaysUpdate']?>" type="text" class="form-control" name="Weekly_Working_Days" placeholder="Weekly Working Days" >
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
                                        <option <?php echo ($fetchdata['Employee_Pay_ClassificationUpdate'] == $row['drop'] ) ? 'selected' : ''; ?> value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>

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
                              <!-- <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Type Accordingly login</label>
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
                              </div> -->
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Department Type<span>*</span></label>
                                  <select name="DepartmentType" required id="" class="form-control select2">
                                    <option <?php echo ($fetchdata['TypeEmpUpdate'] == 'WSSC') ? 'selected' : ''; ?> value="WSSC">WSSC</option>
                                    <option <?php echo ($fetchdata['TypeEmpUpdate'] == 'TMA') ? 'selected' : ''; ?> value="TMA">TMA</option>
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
                                    <?php
                                    if($fetchdata['StatusUpdate']=="NEW"){
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
                                    $select = mysqli_query($conn,"SELECT * FROM `employeedata` ");
                                    if(mysqli_num_rows($select)>0){
                                        ?><option value="">select</option><?php
                                        while($row=mysqli_fetch_assoc($select)){
                                        ?>
                                    <option <?php echo ($fetchdata['Employee_ManagerUpdate'] ==  $row['EmployeeNo'] ) ? 'selected' : ''; ?> value="<?php echo $row['EmployeeNo']?>"><?php echo $row['EmployeeNo']?></option>
                                        
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
                                   <option <?php echo ($fetchdata['Attendance_SupervisorUpdate'] ==  $row['EmployeeNo'] ) ? 'selected' : ''; ?> value="<?php echo $row['EmployeeNo']?>"> <?php echo $row['EmployeeNo']?> </option>
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
                                    <option <?php echo ($fetchdata['DY_SupervisorUpdate'] ==  $row['EmployeeNo'] ) ? 'selected' : ''; ?> 
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
                                  <input value="<?php echo $fetchdata['Joining_DateUpdate']?>" type="text" name="Joining_Date" id="Joining_Date" placeholder="Joining Date" class="form-control datepicker" autocomplete="off" >
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Contract Expiry Date</label>
                                  <input value="<?php echo $fetchdata['Contract_Expiry_DateUpdate']?>" type="text" name="Contract_Expiry_Date" placeholder="" class="form-control datepicker" autocomplete="off" >
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Last Working Date</label>
                                  <input value="<?php echo $fetchdata['Last_Working_DateUpdate']?>" type="text" name="Last_Working_Date" placeholder="" class="form-control datepicker" autocomplete="off" >
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

                    </div>
                </div>
              </div>
<?php } ?>

