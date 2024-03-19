<?php
include('../link/desigene/db.php');
           
$sql = "SELECT 
tr.*,e.fName,e.mName,e.lName,e.father_Name,e.CNIC,e.email,e.pAddress,e.cAddress,e.city,e.postAddress,e.mNumber,e.ofphNumber,e.Alternate_Number,e.DofB,e.religion,e.gender,e.BlGroup,e.Domicile,e.MaritalStatus,e.NextofKin,e.NextofKinCellNumber,e.ContactPerson,e.CPCN,e.Employement_Group,e.Employee_Class,e.Employee_Group,e.Employee_Sub_Group,e.Employee_Quota,e.Salary_Bank,e.Salary_Branch,e.Account_No,e.Pay_Type,e.EOBI_No,e.Bill_Walved_Off,e.Weekly_Working_Days,e.Bill_Waived_Off,e.Employee_Pay_Classification,e.Grade,e.Department,e.Job_Tiltle,e.Salary_Mode,e.Status,e.EmployeeNo,e.Employee_Manager,e.Joining_Date,e.Contract_Expiry_Date,e.Last_Working_Date,e.Attendance_Supervisor,e.Duty_Location,e.Duty_Point,e.TypeEmp,e.type,e.DY_Supervisor,e.leaveAlreadyAvailed
FROM 
spouse AS tr 
INNER JOIN 
employeedata AS e ON tr.employee_id = e.EmployeeNo 
WHERE 
tr.Status = 'PENDING'
";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
$a = 1;
while($row = mysqli_fetch_array($result)) {
?>
                           <tr>
          <th scope="row"><?php echo $a?></th>
          <td><?php echo $row ['fName']. $row ['lName'] ?></td>
          <td><?php echo $row ['Spouse_Name'] ?></td>
          <td><?php echo $row ['Father_name'] ?></td>
          <td><?php echo $row ['CNIC'] ?></td>
          <td><?php echo date('d-m-Y', strtotime($see['Date_of_B'])); ?></td>

      <td><?php echo $row ['type'] ?></td>
          </tr>
                        <?php
                    $a++;} }
                            ?>