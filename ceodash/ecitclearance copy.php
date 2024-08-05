<?php
session_start();
error_reporting(0);
// links to database
include('link/desigene/db.php');

if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber'])) {
    header('Location: ../logout.php');
    exit();
} else {
    if (isset($_POST['submit'])) {
        $id = $_GET['id'];
        $HRMS_Updated = $_POST['HRMS_Updated'];
        $EOBI_Guidance = $_POST['EOBI_Guidance'];
        $Last_Salary_Payment = $_POST['Last_Salary_Payment'];
        $Leave_Encashment = $_POST['Leave_Encashment'];
        $HRMS_UpdatedRemarks = $_POST['HRMS_UpdatedRemarks'];
        $EOBI_GuidanceRemarks = $_POST['EOBI_GuidanceRemarks'];
        $Last_Salary_PaymentRemarks = $_POST['Last_Salary_PaymentRemarks'];
        $Leave_EncashmentRemarks = $_POST['Leave_EncashmentRemarks'];
        $date = date('Y-m-d');

        $updateQuery = "
            UPDATE `employee_exit` 
            SET 
                `Handover_File` = '$HRMS_Updated',
                `Handover_File_Remarks` = '$HRMS_UpdatedRemarks',
                `Handover_Info` = '$EOBI_Guidance',
                `Handover_Info_Remarks` = '$EOBI_GuidanceRemarks',
                `Capital_Equipment` = '$Last_Salary_Payment',
                `Capital_Remarks` = '$Last_Salary_PaymentRemarks',
                `HOD_Other` = '$Leave_Encashment',
                `HOD_Remarks` = '$Leave_EncashmentRemarks',
                `HOD_Approved_Date` = '$date' 
            WHERE 
                `Id` = $id
        ";

        $updateResult = mysqli_query($conn, $updateQuery);

        if ($updateResult) {
            echo "<script>alert('Data updated successfully'); location.replace('EXITCLEARANCEFORM.php');</script>";
        } else {
            echo "<script>alert('Data not updated');</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <?php include('link/links.php'); ?>
</head>
<body>
    <?php include('link/desigene/sidebar.php'); ?>
    <div id="main">
        <?php include('link/desigene/navbar.php'); ?>
        <div class="container-fluid py-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card2 text-center bg-light">
                        <div style="background-color: darkblue;" class="card-header">
                            <div class="card-title text-white">Exit Clearance Form</div>
                        </div>
                        <div class="container">
                            <form action="" method="post">
                                <?php 
                                $id=$_GET['id'];
                                $select =mysqli_query($conn,"SELECT * FROM `employee_exit` WHERE `Id`='$id'");
                                while($row=mysqli_fetch_array($select)){
                                ?>
                                <div class="row">
                                    <div class="col-md-12 my-2 text-start">
                                        <label for="empid">Employee Id</label>
                                        <h3>
                                            <?php echo $row['Employee_id'] ?>
                                        </h3>
                                        <label for="empid">Leaving date</label>
                                        <h3>
                                        <?php 
                                            // Assuming $row['Leaving_Date'] is in the format 'yyyy-mm-dd'
                                            $originalDate = $row['Leaving_Date'];
                                            $formattedDate = date("d-m-Y", strtotime($originalDate));
                                            echo $formattedDate;
                                        ?>
                                        </h3>
                                        <h4>Reason of leaving </h4>
                                        <?php echo $row['Reason_of_Leaving']?>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">Item</th>
                                                    <th scope="col">Yes/No</th>
                                                    <th scope="col" colspan="4">Remarks</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
        <th scope="row">1</th>
        <td>HRMS Updated</td>
        <td>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="HRMS_Updated" value="Yes" id="HRMS_Updated1" <?php if ($row['HRMS'] === 'Yes') echo 'checked'; ?>>
                <label class="form-check-label" for="HRMS_Updated1">Yes</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="HRMS_Updated" id="HRMS_Updated2" value="No" <?php if ($row['HRMS'] === 'No') echo 'checked'; ?>>
                <label class="form-check-label" for="HRMS_Updated2">No</label>
            </div>
        </td>
        <td colspan="4">
            <textarea name="HRMS_UpdatedRemarks" class="form-control" placeholder="Remarks" rows="3"><?php echo htmlspecialchars($row['HRMS_Remarks']); ?></textarea>
        </td>
    </tr>
    <tr>
        <th scope="row">2</th>
        <td>EOBI Guidance</td>
        <td>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="EOBI_Guidance" value="Yes" id="EOBI_Guidance1" <?php if ($row['EOBI'] === 'Yes') echo 'checked'; ?>>
                <label class="form-check-label" for="EOBI_Guidance1">Yes</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="EOBI_Guidance" id="EOBI_Guidance2" value="No" <?php if ($row['EOBI'] === 'No') echo 'checked'; ?>>
                <label class="form-check-label" for="EOBI_Guidance2">No</label>
            </div>
        </td>
        <td colspan="4">
            <textarea name="EOBI_GuidanceRemarks" class="form-control" placeholder="Remarks" rows="3"><?php echo htmlspecialchars($row['EOBI_Remarks']); ?></textarea>
        </td>
    </tr>
    <tr>
        <th scope="row">3</th>
        <td>Last Salary Payment</td>
        <td>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="Last_Salary_Payment" value="Yes" id="Last_Salary_Payment1" <?php if ($row['Last_Salary_Payment'] === 'Yes') echo 'checked'; ?>>
                <label class="form-check-label" for="Last_Salary_Payment1">Yes</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="Last_Salary_Payment" id="Last_Salary_Payment2" value="No" <?php if ($row['Last_Salary_Payment'] === 'No') echo 'checked'; ?>>
                <label class="form-check-label" for="Last_Salary_Payment2">No</label>
            </div>
        </td>
        <td colspan="4">
            <textarea name="Last_Salary_PaymentRemarks" class="form-control" placeholder="Remarks" rows="3"><?php echo htmlspecialchars($row['Last_Salary_PaymentRemarks']); ?></textarea>
        </td>
    </tr>
    <tr>
        <th scope="row">4</th>
        <td>Leave Encashment</td>
        <td>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="Leave_Encashment" value="Yes" id="Leave_Encashment1" <?php if ($row['Leve'] === 'Yes') echo 'checked'; ?>>
                <label class="form-check-label" for="Leave_Encashment1">Yes</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="Leave_Encashment" id="Leave_Encashment2" value="No" <?php if ($row['Leve'] === 'No') echo 'checked'; ?>>
                <label class="form-check-label" for="Leave_Encashment2">No</label>
            </div>
        </td>
        <td colspan="4">
            <textarea name="Leave_EncashmentRemarks" class="form-control" placeholder="Remarks" rows="3"><?php echo htmlspecialchars($row['Leve_Remarks']); ?></textarea>
        </td>
    </tr>
    <tr>
        <th scope="row">5</th>
        <td>Gratuity</td>
        <td>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="Gratuity" value="Yes" id="Gratuity1" <?php if ($row['Gratuity'] === 'Yes') echo 'checked'; ?>>
                <label class="form-check-label" for="Gratuity1">Yes</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="Gratuity" id="Gratuity2" value="No" <?php if ($row['Gratuity'] === 'No') echo 'checked'; ?>>
                <label class="form-check-label" for="Gratuity2">No</label>
            </div>
        </td>
        <td colspan="4">
            <textarea name="GratuityRemarks" class="form-control" placeholder="Remarks" rows="3"><?php echo htmlspecialchars($row['Gratuity_Remarks']); ?></textarea>
        </td>
    </tr>
    
<tr>
    <th scope="row">1</th>
    <td>Email Suspension</td>
    <td>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="Email_Suspension" value="Yes" id="Email_Suspension1" <?php if ($row['Email_Suspension'] === 'Yes') echo 'checked'; ?>>
            <label class="form-check-label" for="Email_Suspension1">Yes</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="Email_Suspension" id="Email_Suspension2" value="No" <?php if ($row['Email_Suspension'] === 'No') echo 'checked'; ?>>
            <label class="form-check-label" for="Email_Suspension2">No</label>
        </div>
    </td>
    <td colspan="4">
        <textarea name="Email_SuspensionRemarks" class="form-control" placeholder="Remarks" id="Email_SuspensionRemarks" rows="3"><?php echo htmlspecialchars($row['Email_Suspension_Remarks']); ?></textarea>
    </td>
</tr>
<tr>
    <th scope="row">2</th>
    <td>Soft Data</td>
    <td>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="Soft_Data" value="Yes" id="Soft_Data1" <?php if ($row['Soft_Data'] === 'Yes') echo 'checked'; ?>>
            <label class="form-check-label" for="Soft_Data1">Yes</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="Soft_Data" id="Soft_Data2" value="No" <?php if ($row['Soft_Data'] === 'No') echo 'checked'; ?>>
            <label class="form-check-label" for="Soft_Data2">No</label>
        </div>
    </td>
    <td colspan="4">
        <textarea name="Soft_DataRemarks" class="form-control" placeholder="Remarks" id="Soft_DataRemarks" rows="3"><?php echo htmlspecialchars($row['Soft_Data_Remarks']); ?></textarea>
    </td>
</tr>
<tr>
    <th scope="row">3</th>
    <td>Hard Data</td>
    <td>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="Heard_Data" value="Yes" id="Heard_Data1" <?php if ($row['Heard_Data'] === 'Yes') echo 'checked'; ?>>
            <label class="form-check-label" for="Heard_Data1">Yes</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="Heard_Data" id="Heard_Data2" value="No" <?php if ($row['Heard_Data'] === 'No') echo 'checked'; ?>>
            <label class="form-check-label" for="Heard_Data2">No</label>
        </div>
    </td>
    <td colspan="4">
        <textarea name="Heard_DataRemarks" class="form-control" placeholder="Remarks" id="Heard_DataRemarks" rows="3"><?php echo htmlspecialchars($row['Heard_Data_Remarks']); ?></textarea>
    </td>
</tr>
<tr>
    <th scope="row">4</th>
    <td>Other</td>
    <td>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="IT_Other" value="Yes" id="IT_Other1" <?php if ($row['IT_Other'] === 'Yes') echo 'checked'; ?>>
            <label class="form-check-label" for="IT_Other1">Yes</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="IT_Other" id="IT_Other2" value="No" <?php if ($row['IT_Other'] === 'No') echo 'checked'; ?>>
            <label class="form-check-label" for="IT_Other2">No</label>
        </div>
    </td>
    <td colspan="4">
        <textarea name="IT_OtherRemarks" class="form-control" placeholder="Remarks" id="IT_OtherRemarks" rows="3"><?php echo htmlspecialchars($row['IT_Remarks']); ?></textarea>
    </td>
</tr>


<tr>
    <th scope="row">1</th>
    <td>Handover Docs</td>
    <td>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="Handover_File" value="Yes" id="Handover_File1" <?php echo ($row['Handover_File'] === 'Yes') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="Handover_File1">Yes</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="Handover_File" id="Handover_File2" value="No" <?php echo ($row['Handover_File'] === 'No') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="Handover_File2">No</label>
        </div>
    </td>
    <td colspan="4">
        <textarea name="Handover_FileRemarks" class="form-control" placeholder="Remarks" id="Handover_FileRemarks" rows="3"><?php echo htmlspecialchars($row['Handover_File_Remarks']); ?></textarea>
    </td>
</tr>

<tr>
    <th scope="row">2</th>
    <td>Handover Info</td>
    <td>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="Handover_Info" value="Yes" id="Handover_Info1" <?php echo ($row['Handover_Info'] === 'Yes') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="Handover_Info1">Yes</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="Handover_Info" id="Handover_Info2" value="No" <?php echo ($row['Handover_Info'] === 'No') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="Handover_Info2">No</label>
        </div>
    </td>
    <td colspan="4">
        <textarea name="Handover_InfoRemarks" class="form-control" placeholder="Remarks" id="Handover_InfoRemarks" rows="3"><?php echo htmlspecialchars($row['Handover_Info_Remarks']); ?></textarea>
    </td>
</tr>

<tr>
    <th scope="row">3</th>
    <td>Capital Equipment</td>
    <td>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="Capital_Equipment" value="Yes" id="Capital_Equipment1" <?php echo ($row['Capital_Equipment'] === 'Yes') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="Capital_Equipment1">Yes</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="Capital_Equipment" id="Capital_Equipment2" value="No" <?php echo ($row['Capital_Equipment'] === 'No') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="Capital_Equipment2">No</label>
        </div>
    </td>
    <td colspan="4">
        <textarea name="Capital_EquipmentRemarks" class="form-control" placeholder="Remarks" id="Capital_EquipmentRemarks" rows="3"><?php echo htmlspecialchars($row['Capital_Remarks']); ?></textarea>
    </td>
</tr>

<tr>
    <th scope="row">4</th>
    <td>Other</td>
    <td>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="HOD_Other" value="Yes" id="HOD_Other1" <?php echo ($row['HOD_Other'] === 'Yes') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="HOD_Other1">Yes</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="HOD_Other" id="HOD_Other2" value="No" <?php echo ($row['HOD_Other'] === 'No') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="HOD_Other2">No</label>
        </div>
    </td>
    <td colspan="4">
        <textarea name="HOD_OtherRemarks" class="form-control" placeholder="Remarks" id="HOD_OtherRemarks" rows="3"><?php echo htmlspecialchars($row['HOD_Remarks']); ?></textarea>
    </td>
</tr>

<tr>
    <th scope="row">1</th>
    <td>Uniform & Staff ID Card</td>
    <td>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="Uniform" value="Yes" id="Uniform1" <?php echo ($row['Uniform'] === 'Yes') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="Uniform1">Yes</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="Uniform" id="Uniform2" value="No" <?php echo ($row['Uniform'] === 'No') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="Uniform2">No</label>
        </div>
    </td>
    <td colspan="4">
        <textarea name="UniformRemarks" class="form-control" placeholder="Remarks" id="UniformRemarks" rows="3"><?php echo htmlspecialchars($row['Uniform_Remarks']); ?></textarea>
    </td>
</tr>

<tr>
    <th scope="row">2</th>
    <td>Equipment</td>
    <td>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="Equipment" value="Yes" id="Equipment1" <?php echo ($row['Equipment'] === 'Yes') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="Equipment1">Yes</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="Equipment" id="Equipment2" value="No" <?php echo ($row['Equipment'] === 'No') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="Equipment2">No</label>
        </div>
    </td>
    <td colspan="4">
        <textarea name="EquipmentRemarks" class="form-control" placeholder="Remarks" id="EquipmentRemarks" rows="3"><?php echo htmlspecialchars($row['Equipment_Remarks']); ?></textarea>
    </td>
</tr>

<tr>
    <th scope="row">3</th>
    <td>Assets</td>
    <td>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="Assets" value="Yes" id="Assets1" <?php echo ($row['Assets'] === 'Yes') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="Assets1">Yes</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="Assets" value="No" id="Assets2" <?php echo ($row['Assets'] === 'No') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="Assets2">No</label>
        </div>
    </td>
    <td colspan="4">
        <textarea name="AssetsRemarks" class="form-control" placeholder="Remarks" id="AssetsRemarks" rows="3"><?php echo htmlspecialchars($row['Assets_Remarks']); ?></textarea>
    </td>
</tr>

<tr>
    <th scope="row">4</th>
    <td>Other</td>
    <td>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="Admin_Other" value="Yes" id="Admin_Other1" <?php echo ($row['Admin_Other'] === 'Yes') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="Admin_Other1">Yes</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="Admin_Other" id="Admin_Other2" value="No" <?php echo ($row['Admin_Other'] === 'No') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="Admin_Other2">No</label>
        </div>
    </td>
    <td colspan="4">
        <textarea name="Admin_OtherRemarks" class="form-control" placeholder="Remarks" id="Admin_OtherRemarks" rows="3"><?php echo htmlspecialchars($row['Admin_Remarks']); ?></textarea>
    </td>
</tr>

<tr>
    <th scope="row">1</th>
    <td>Loan Clearance</td>
    <td>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="Loan_Updated" value="Yes" id="Loan_Updated1" <?php echo ($row['Loan'] === 'Yes') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="Loan_Updated1">Yes</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="Loan_Updated" id="Loan_Updated2" value="No" <?php echo ($row['Loan'] === 'No') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="Loan_Updated2">No</label>
        </div>
    </td>
    <td colspan="4">
        <textarea name="Loan_UpdatedRemarks" class="form-control" placeholder="Remarks" rows="3"><?php echo htmlspecialchars($row['Loan_Remarks']); ?></textarea>
    </td>
</tr>

<tr>
    <th scope="row">2</th>
    <td>Overpayment</td>
    <td>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="OverPay_Guidance" value="Yes" id="OverPay_Guidance1" <?php echo ($row['OverPay'] === 'Yes') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="OverPay_Guidance1">Yes</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="OverPay_Guidance" id="OverPay_Guidance2" value="No" <?php echo ($row['OverPay'] === 'No') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="OverPay_Guidance2">No</label>
        </div>
    </td>
    <td colspan="4">
        <textarea name="OverPay_GuidanceRemarks" class="form-control" placeholder="Remarks" rows="3"><?php echo htmlspecialchars($row['OverPay_Remarks']); ?></textarea>
    </td>
</tr>

<tr>
    <th scope="row">3</th>
    <td>Other</td>
    <td>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="Leave_Encashment" value="Yes" id="Leave_Encashment1" <?php echo ($row['Finance_Other'] === 'Yes') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="Leave_Encashment1">Yes</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="Leave_Encashment" id="Leave_Encashment2" value="No" <?php echo ($row['Finance_Other'] === 'No') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="Leave_Encashment2">No</label>
        </div>
    </td>
    <td colspan="4">
        <textarea name="Leave_EncashmentRemarks" class="form-control" placeholder="Remarks" rows="3"><?php echo htmlspecialchars($row['Finance_Remarks']); ?></textarea>
    </td>
</tr>

                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                                <?php }?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('link/desigene/script.php'); ?>
</body>
</html>
<?php } ?>
