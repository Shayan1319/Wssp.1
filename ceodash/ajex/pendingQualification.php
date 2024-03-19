<?php
include('../link/desigene/db.php');
           
$sql = "SELECT tr.*, e.fName, e.mName, e.lName, e.father_Name, e.CNIC, e.email, e.pAddress, e.cAddress, e.city, e.postAddress, e.mNumber, e.ofphNumber, e.Alternate_Number, e.DofB, e.religion, e.gender, e.BlGroup, e.Domicile, e.MaritalStatus, e.NextofKin, e.NextofKinCellNumber, e.ContactPerson, e.CPCN, e.Employement_Group, e.Employee_Class, e.Employee_Group, e.Employee_Sub_Group, e.Employee_Quota, e.Salary_Bank, e.Salary_Branch, e.Account_No, e.Pay_Type, e.EOBI_No, e.Bill_Walved_Off, e.Weekly_Working_Days, e.Bill_Waived_Off, e.Employee_Pay_Classification, e.Grade, e.Department, e.Job_Tiltle, e.Salary_Mode, e.Status, e.EmployeeNo, e.Employee_Manager, e.Joining_Date, e.Contract_Expiry_Date, e.Last_Working_Date, e.Attendance_Supervisor, e.Duty_Location, e.Duty_Point, e.TypeEmp, e.type, e.DY_Supervisor, e.leaveAlreadyAvailed 
FROM qualification AS tr 
INNER JOIN employeedata AS e ON tr.employee_id = e.EmployeeNo 
WHERE tr.Status = 'PENDING'
";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
$a = 1;
while($row = mysqli_fetch_array($result)) {
?>
                            <tr>
                                <th scope="row"><?php echo $a?></th>
                                <td><?php echo $row['EmployeeNo'] ?></td>
                                <td><h5><?php echo $row['fName']?> <?php echo $row['lName']?></h5></td>
                                <td><?php echo $row['Qualification'] ?></td>
                                <td><?php echo $row['Grade/Division'] ?></td>
                                <td><?php echo $row['Passing Year of Degree'] ?></td>
                                <td><?php echo $row['Last Institute'] ?></td>
                                <td><?php echo $row['PEC Registration'] ?></td>
                                <td><?php echo $row['Institute Address'] ?></td>
                                <td><?php echo $row['Major Subject'] ?></td>
                                <td><?php echo $row['Remarks'] ?></td>
                                <td><input  type="submit" data-acpt="<?php echo $row['Id'] ?>" class="btn btn-success text-white float-right shadow" value="Accept" id="Accept" name="Accept"></td>
                                <td><input type="submit" data-rejc="<?php echo $row['Id'] ?>" class="btn bg-danger text-white float-right shadow" value="Reject" id="Reject" name="Reject"></td>
                            </tr>
                        <?php
                    $a++;} }
                            ?>