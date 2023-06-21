
<?php 
function getEmployee($con) {
  $query= "SELECT `Id`,`fName`,`father_Name`,`CNIC`,`email`,`pAddress`,`mNumber`,`ofphNumber`,`Alternate_Number`,
  `DofB`,`religion`,`gender`,`BlGroup`,`Domicile`,`MaritalStatus`,`NextofKin`,`ContactPerson`,`CPCN`,
  `Employement_Group`,`Employee_Class`,`Employee_Group`,`Employee_Sub_Group`,`Employee_Quota`,
  `Grade_tma`,`Department`,`Job_Tiltle`,`Salary_Mode`,`Employee_Status`,`EmployeeNowssp`,
  `Employee_Manager`,`Contract_Expiry_Date`,`Duty_Location`,`Duty_Point`
  FROM `employeeinfo`;";
  $stmt = $con->prepare($query);
  $stmt->execute();

  $data = '<option value="">Select Employee</option>';
  while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $p = $r['fName'];
      $data = $data.'<option value="'.$r['id'].'">'.$p.'</option>';
  }
  
  return $data;
}

?>