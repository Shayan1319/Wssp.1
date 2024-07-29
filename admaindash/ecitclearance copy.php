<?php
session_start();
error_reporting(0);
// links to database
include('../hrdash/link/desigene/db.php');
if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber']) || $_SESSION['Designation'] != 'Admin') {
    // Log the unauthorized access attempt for auditing purposes
    error_log("Unauthorized access attempt. User: {$_SESSION['loginid']}");
    
    // Redirect to the logout page
    header("Location: ../logout.php");
    exit; // Ensure that the script stops execution after the header redirection
} else{
  if(isset($_POST['submit'])){
    $id = $_GET ['id'];
    $Uniform= $_POST['Uniform'];
    $UniformRemarks= $_POST['UniformRemarks'];
    $Equipment= $_POST['Equipment'];
    $EquipmentRemarks= $_POST['EquipmentRemarks'];
    $Assets= $_POST['Assets'];
    $AssetsRemarks= $_POST['AssetsRemarks'];
    $Outher= $_POST['Outher'];
    $OutherRemarks= $_POST['OutherRemarks'];
    $date= date("Y-m-d");
    $insertQuery = "UPDATE `employee_exit` SET `Uniform`='$Uniform',`Uniform_Remarks`='$UniformRemarks',`Equipment`='$Equipment',`Equipment_Remarks`='$EquipmentRemarks',`Assets`='$Assets',`Assets_Remarks`='$AssetsRemarks',`Admin_Other`='$Outher',`Admin_Remarks`='$OutherRemarks',`Admin_Approved_Date`='$date' WHERE `Id`=$id";
    $insertResult = mysqli_query($conn, $insertQuery);

    if ($insertResult) {
        ?>
        <script>
            alert("Data inserted successfully");
            location.replace("EXITCLEARANCEFORM.php")
        </script>
        <?php
    } else {
        ?>
        <script>
            alert("Data not inserted");
        </script>
        <?php
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
        <div class="container-fluid py-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card2 text-center bg-light">
                        <div style="background-color: darkblue;" class="card-header ">
                            <div class="card-title text-white">Exit clearance Form</div>
                        </div>
                        <div class="container">
                            <form action="" method="post">
                                <div class="row">
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
                                                <td>Uniform & Staff ID Card</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="Uniform" value="Yes" id="HRMS_Updated1">
                                                        <label class="form-check-label" for="HRMS_Updated1">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="Uniform" id="HRMS_Updated2" value="No" checked>
                                                        <label class="form-check-label" for="HRMS_Updated2">
                                                            No
                                                         </label>
                                                        </div>
                                                    </td>
                                                <td colspan="4">
                                                    <textarea name="UniformRemarks" class="form-control" placeholder="Remarks" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                </td>
                                               
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Equipment </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="Equipment" value="Yes" id="EOBI_Guidance1">
                                                        <label class="form-check-label" for="EOBI_Guidance1">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="Equipment" id="EOBI_Guidance2" value="No" checked>
                                                        <label class="form-check-label" for="EOBI_Guidance2">
                                                            No
                                                        </label>
                                                    </div>
                                                </td>
                                                <td colspan="4">
                                                    <textarea name="EquipmentRemarks" class="form-control" placeholder="Remarks" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                </td>
                                               
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Assets </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="Assets" value="Yes" id="Last_Salary_Payment1">
                                                        <label class="form-check-label" for="Last_Salary_Payment1">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="Assets" value="No" id="Last_Salary_Payment2" checked>
                                                        <label class="form-check-label" for="Last_Salary_Payment2">
                                                            No
                                                        </label>
                                                    </div>
                                                </td>
                                                <td colspan="4">
                                                    <textarea name="AssetsRemarks" class="form-control" placeholder="Remarks" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                </td>
                                               
                                            </tr>
                                            <tr>
                                                <th scope="row">4</th>
                                                <td>Other</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="Outher" value="Yes" id="Leave_Encashment1">
                                                        <label class="form-check-label" for="Leave_Encashment1">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="Outher" id="Leave_Encashment2" value="No" checked>
                                                        <label class="form-check-label" for="Leave_Encashment2">
                                                            No
                                                        </label>
                                                    </div>
                                                </td>
                                                <td colspan="4">
                                                    <textarea name="OutherRemarks" class="form-control" placeholder="Remarks" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                </td>
                                               
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                    <div class="col-md-12 text-end mt-2">
                                        <input style="background-color: darkblue;" type="submit" class="btn text-white float-right shadow" value="Submit" name="submit">
                                    </div>
                                    </div>
                                </div>
                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('link/desigene/script.php')?>
</body>
</html>
<?php }?>