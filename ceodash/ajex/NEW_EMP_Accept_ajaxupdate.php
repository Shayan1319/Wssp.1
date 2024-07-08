<?php
include('../link/desigene/db.php');
$id=$_POST['id'];
$date=date('Y-M-D');
$update=mysqli_query($conn,"UPDATE `employeedata` SET `Online Status`='ACCPET' WHERE `Id`=$id");
if($update){
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_array($result);
        $IdUpdate = $row['Id'];
        $imageUpdate = $row['image'];
        $fName = $row['fName'];
        $mName = $row['mName'];
        $lName = $row['lName'];
        $father_Name = $row['father_Name'];
        $CNIC = $row['CNIC'];
        $email = $row['email'];
        $pAddress = $row['pAddress'];
        $cAddress = $row['cAddress'];
        $city = $row['city'];
        $postAddress = $row['postAddress'];
        $mNumber = $row['mNumber'];
        $ofphNumber = $row['ofphNumber'];
        $Alternate_Number = $row['Alternate_Number'];
        $DofB = $row['DofB'];
        $religion = $row['religion'];
        $gender = $row['gender'];
        $BlGroup = $row['BlGroup'];
        $Domicile = $row['Domicile'];
        $MaritalStatus = $row['MaritalStatus'];
        $NextofKin = $row['NextofKin'];
        $NextofKinCellNumber = $row['NextofKinCellNumber'];
        $ContactPerson = $row['ContactPerson'];
        $CPCN = $row['CPCN'];
        $Employement_Group = $row['Employement_Group'];
        $Employee_Class = $row['Employee_Class'];
        $Employee_Group = $row['Employee_Group'];
        $Employee_Sub_Group = $row['Employee_Sub_Group'];
        $Employee_Quota = $row['Employee_Quota'];
        $Salary_Bank = $row['Salary_Bank'];
        $Salary_Branch = $row['Salary_Branch'];
        $Account_No = $row['Account_No'];
        $Pay_Type = $row['Pay_Type'];
        $EOBI_No = $row['EOBI_No'];
        $Bill_Walved_Off = $row['Bill_Walved_Off'];
        $Weekly_Working_Days = $row['Weekly_Working_Days'];
        $Bill_Waived_Off = $row['Bill_Waived_Off'];
        $Employee_Pay_Classification = $row['Employee_Pay_Classification'];
        $Grade = $row['Grade'];
        $Department = $row['Department'];
        $Job_Tiltle = $row['Job_Tiltle'];
        $Salary_Mode = $row['Salary_Mode'];
        $Status = $row['Status'];
        $EmployeeNo = $row['EmployeeNo'];
        $Employee_Manager = $row['Employee_Manager'];
        $Joining_Date = $row['Joining_Date'];
        $Contract_Expiry_Date = $row['Contract_Expiry_Date'];
        $Last_Working_Date = $row['Last_Working_Date'];
        $Attendance_Supervisor = $row['Attendance_Supervisor'];
        $Duty_Location = $row['Duty_Location'];
        $Duty_Point = $row['Duty_Point'];
        $type = $row['type'];
        $DY_Supervisor = $row['DY_Supervisor'];     
        $leaveAlreadyAvailed = $row['leaveAlreadyAvailed'];

        
        // Initialize query variable
        $query = false;
        
        // SQL query for insertion
        $insertquery = "INSERT INTO `employeedataupdate`(
            `IdUpdate`, `imageUpdate`, `fNameUpdate`, `mNameUpdate`, `lNameUpdate`, `father_NameUpdate`, `CNICUpdate`, `emailUpdate`, `pAddressUpdate`, `cAddressUpdate`, `cityUpdate`, `postAddressUpdate`, `mNumberUpdate`, `ofphNumberUpdate`, `Alternate_NumberUpdate`, `DofBUpdate`, `religionUpdate`, `genderUpdate`, `BlGroupUpdate`, `DomicileUpdate`, `MaritalStatusUpdate`, `NextofKinUpdate`, `NextofKinCellNumberUpdate`, `ContactPersonUpdate`, `CPCNUpdate`, `Employement_GroupUpdate`, `Employee_ClassUpdate`, `Employee_GroupUpdate`, `Employee_Sub_GroupUpdate`, `Employee_QuotaUpdate`, `Salary_BankUpdate`, `Salary_BranchUpdate`, `Account_NoUpdate`, `Pay_TypeUpdate`, `EOBI_NoUpdate`, `Bill_Walved_OffUpdate`, `Weekly_Working_DaysUpdate`, `Bill_Waived_OffUpdate`, `Employee_Pay_ClassificationUpdate`, `GradeUpdate`, `DepartmentUpdate`, `Job_TiltleUpdate`, `Salary_ModeUpdate`, `StatusUpdate`, `EmployeeNoUpdate`, `Employee_ManagerUpdate`, `Joining_DateUpdate`, `Contract_Expiry_DateUpdate`, `Last_Working_DateUpdate`, `Attendance_SupervisorUpdate`, `Duty_LocationUpdate`, `Duty_PointUpdate`, `UpdateDate`, `typeUpdate`, `DY_SupervisorUpdate`, `leaveAlreadyAvailedUpdate`
        ) VALUES (
            '$IdUpdate', '$imageUpdate', '$fName', '$mName', '$lName', '$father_Name', '$CNIC', '$email', '$pAddress', '$cAddress', '$city', '$postAddress', '$mNumber', '$ofphNumber', '$Alternate_Number', '$DofB', '$religion', '$gender', '$BlGroup', '$Domicile', '$MaritalStatus', '$NextofKin', '$NextofKinCellNumber', '$ContactPerson', '$CPCN', '$Employement_Group', '$Employee_Class', '$Employee_Group', '$Employee_Sub_Group', '$Employee_Quota', '$Salary_Bank', '$Salary_Branch', '$Account_No', '$Pay_Type', '$EOBI_No', '$Bill_Walved_Off', '$Weekly_Working_Days', '$Bill_Waived_Off', '$Employee_Pay_Classification', '$Grade', '$Department', '$Job_Tiltle', '$Salary_Mode', '$Status', '$EmployeeNo', '$Employee_Manager', '$Joining_Date', '$Contract_Expiry_Date', '$Last_Working_Date', '$Attendance_Supervisor', '$Duty_Location', '$Duty_Point', '$date', '$type', '$DY_Supervisor', '$leaveAlreadyAvailed'
        )";
        
        // Execute the query
        $queryupadfer = mysqli_query($conn, $insertquery);
    }
    echo 1;
}
else{
    echo 0;
}
?>