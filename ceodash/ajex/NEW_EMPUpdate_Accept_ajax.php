<?php
include('../link/desigene/db.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "SELECT * FROM `employeedataupdate` WHERE `Id`=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_array($result);
    $IdUpdate=$row['IdUpdate'];
    $imageUpdate=$row['imageUpdate'];
    $fNameUpdate = $row ['fNameUpdate'];
    $mNameUpdate = $row ['mNameUpdate'];
    $lNameUpdate = $row ['lNameUpdate'];
    $father_NameUpdate = $row ['father_NameUpdate'];
    $CNICUpdate = $row ['CNICUpdate'];
    $emailUpdate = $row ['emailUpdate'];
    $pAddressUpdate = $row ['pAddressUpdate'];
    $cAddressUpdate = $row ['cAddressUpdate'];
    $cityUpdate = $row ['cityUpdate'];
    $postAddressUpdate = $row ['postAddressUpdate'];
    $mNumberUpdate = $row ['mNumberUpdate'];
    $ofphNumberUpdate = $row ['ofphNumberUpdate'];
    $Alternate_NumberUpdate = $row ['Alternate_NumberUpdate'];
    $DofBUpdate = $row ['DofBUpdate'];
    $religionUpdate = $row ['religionUpdate'];
    $genderUpdate = $row ['genderUpdate'];
    $BlGroupUpdate = $row ['BlGroupUpdate'];
    $DomicileUpdate = $row ['DomicileUpdate'];
    $MaritalStatusUpdate = $row ['MaritalStatusUpdate'];
    $NextofKinUpdate = $row ['NextofKinUpdate'];
    $NextofKinCellNumberUpdate = $row ['NextofKinCellNumberUpdate'];
    $ContactPersonUpdate = $row ['ContactPersonUpdate'];
    $CPCNUpdate = $row ['CPCNUpdate'];
    $Employement_GroupUpdate = $row ['Employement_GroupUpdate'];
    $Employee_ClassUpdate = $row['Employee_ClassUpdate'];
    $Employee_GroupUpdate = $row ['Employee_GroupUpdate'];
    $Employee_Sub_GroupUpdate = $row ['Employee_Sub_GroupUpdate'];
    $Employee_QuotaUpdate = $row ['Employee_QuotaUpdate'];
    $Salary_BankUpdate = $row ['Salary_BankUpdate']; 
    $Salary_BranchUpdate = $row ['Salary_BranchUpdate'];
    $Account_NoUpdate = $row ['Account_NoUpdate'];
    $Pay_TypeUpdate = $row ['Pay_TypeUpdate'];
    $EOBI_NoUpdate = $row ['EOBI_NoUpdate'];
    $Bill_Walved_OffUpdate = $row ['Bill_Walved_OffUpdate'];
    $Weekly_Working_DaysUpdate = $row ['Weekly_Working_DaysUpdate'];
    $Bill_Waived_OffUpdate = $row ['Bill_Waived_OffUpdate'];
    $Employee_Pay_ClassificationUpdate = $row ['Employee_Pay_ClassificationUpdate'];
    $GradeUpdate = $row ['GradeUpdate'];
    $DepartmentUpdate = $row ['DepartmentUpdate'];
    $Job_TiltleUpdate = $row ['Job_TiltleUpdate'];
    $Salary_ModeUpdate = $row ['Salary_ModeUpdate'];
    $StatusUpdate = $row['StatusUpdate'];
    $EmployeeNoUpdate = $row['EmployeeNoUpdate'];
    $Employee_ManagerUpdate = $row['Employee_ManagerUpdate'];
    $Joining_DateUpdate = $row['Joining_DateUpdate'];
    $Contract_Expiry_DateUpdate = $row['Contract_Expiry_DateUpdate'];
    $Last_Working_DateUpdate = $row['Last_Working_DateUpdate'];
    $Attendance_SupervisorUpdate = $row['Attendance_SupervisorUpdate'];
    $Duty_LocationUpdate = $row['Duty_LocationUpdate'];
    $Duty_PointUpdate = $row['Duty_PointUpdate'];
    $typeUpdate=$row['typeUpdate'];
   $DY_SupervisorUpdate=$row['DY_SupervisorUpdate'];
    // SQL query for insertion
    $insertquery = "UPDATE `employeedata` SET  `image`='$imageUpdate',`fName`='$fNameUpdate',`mName`='$mNameUpdate',`lName`='$lNameUpdate',`father_Name`='$father_NameUpdate',`CNIC`='$CNICUpdate',`email`='$emailUpdate',`pAddress`='$pAddressUpdate',`cAddress`='$cAddressUpdate',`city`='$cityUpdate',`postAddress`='$postAddressUpdate',`mNumber`='$mNumberUpdate',`ofphNumber`='$ofphNumberUpdate',`Alternate_Number`='$Alternate_NumberUpdate',`DofB`='$DofBUpdate',`religion`='$religionUpdate',`gender`='$genderUpdate',`BlGroup`='$BlGroupUpdate',`Domicile`='$DomicileUpdate',`MaritalStatus`='$MaritalStatusUpdate',`NextofKin`='$NextofKinUpdate',`NextofKinCellNumber`='$NextofKinCellNumberUpdate',`ContactPerson`='$ContactPersonUpdate',`CPCN`='$CPCNUpdate',`Employement_Group`='$Employement_GroupUpdate',`Employee_Class`='$Employee_ClassUpdate',`Employee_Group`='$Employee_GroupUpdate',`Employee_Sub_Group`='$Employee_Sub_GroupUpdate',`Employee_Quota`='$Employee_QuotaUpdate',`Salary_Bank`='$Salary_BankUpdate',`Salary_Branch`='$Salary_BranchUpdate',`Account_No`='$Account_NoUpdate',`Pay_Type`='$Pay_TypeUpdate',`EOBI_No`='$EOBI_NoUpdate',`Bill_Walved_Off`='$Bill_Walved_OffUpdate',`Weekly_Working_Days`='$Weekly_Working_DaysUpdate',`Bill_Waived_Off`='$Bill_Waived_OffUpdate',`Employee_Pay_Classification`='$Employee_Pay_ClassificationUpdate',`Grade`='$GradeUpdate',`Department`='$DepartmentUpdate',`Job_Tiltle`='$Job_TiltleUpdate',`Salary_Mode`='$Salary_ModeUpdate',`Status`='$StatusUpdate',`EmployeeNo`='$EmployeeNoUpdate',`Employee_Manager`='$Employee_ManagerUpdate',`Joining_Date`='$Joining_DateUpdate',`Contract_Expiry_Date`='$Contract_Expiry_DateUpdate',`Last_Working_Date`='$Last_Working_DateUpdate',`Attendance_Supervisor`='$Attendance_SupervisorUpdate',`Duty_Location`='$Duty_LocationUpdate',`Duty_Point`='$Duty_PointUpdate',`Status`='ON-DUTY',`type`='$typeUpdate',`DY_Supervisor`='$DY_SupervisorUpdate',`leaveAlreadyAvailed`='34' WHERE `Id`='$IdUpdate'";
    
    // Execute the query
    $query = mysqli_query($conn, $insertquery);
    
    // Check if the query was successful
    if ($query) {
      echo "Updated the employee data";
    } else {
        echo "Updated the employee data";
    }
} else {
    echo "No record exest";
}
}
?>