<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1); // Display errors for debugging

// links to database
include('link/desigene/db.php');

if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber']) || $_SESSION['Designation'] != 'Admin') {
    // Log the unauthorized access attempt for auditing purposes
    error_log("Unauthorized access attempt. User: {$_SESSION['loginid']}");
    
    // Redirect to the logout page
    header("Location: ../logout.php");
    exit; // Ensure that the script stops execution after the header redirection
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
        $date = date("Y-m-d");

        // Log the submitted values
        error_log("Form submitted with values: " . json_encode($_POST));

        $insertQuery = "UPDATE `employee_exit` SET 
            `Email_Suspension`='$HRMS_Updated', 
            `Email_Susp_Remarks`='$HRMS_UpdatedRemarks', 
            `Soft_Data`='$EOBI_Guidance', 
            `Soft_Data_Remarks`='$EOBI_GuidanceRemarks', 
            `Heard_Data`='$Last_Salary_Payment', 
            `Heard_Data_Remarks`='$Last_Salary_PaymentRemarks', 
            `IT_Other`='$Leave_Encashment', 
            `IT_Remarks`='$Leave_EncashmentRemarks', 
            `IT_Approved_Date`='$date' 
            WHERE `Id`=$id";

        // Log the query
        error_log("Update query: $insertQuery");

        // Execute the query
        $insertResult = mysqli_query($conn, $insertQuery);

        if ($insertResult) {
            echo "<script>
                alert('Data inserted successfully');
                location.replace('EXITCLEARANCEFORM.php');
            </script>";
        } else {
            // Log the error
            error_log("Query error: " . mysqli_error($conn));
            echo "<script>
                alert('Data not inserted: " . mysqli_error($conn) . "');
            </script>";
        }
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
                            <div class="card-title text-white">Exit Clearance Form</div>
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
                                                    <td>Email Suspension</td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="HRMS_Updated" value="Yes" id="HRMS_Updated1">
                                                            <label class="form-check-label" for="HRMS_Updated1">
                                                                Yes
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="HRMS_Updated" id="HRMS_Updated2" value="No" checked>
                                                            <label class="form-check-label" for="HRMS_Updated2">
                                                                No
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td colspan="4">
                                                        <textarea name="HRMS_UpdatedRemarks" class="form-control" placeholder="Remarks" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td>Soft Data</td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="EOBI_Guidance" value="Yes" id="EOBI_Guidance1">
                                                            <label class="form-check-label" for="EOBI_Guidance1">
                                                                Yes
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="EOBI_Guidance" id="EOBI_Guidance2" value="No" checked>
                                                            <label class="form-check-label" for="EOBI_Guidance2">
                                                                No
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td colspan="4">
                                                        <textarea name="EOBI_GuidanceRemarks" class="form-control" placeholder="Remarks" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">3</th>
                                                    <td>Hard Data</td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="Last_Salary_Payment" value="Yes" id="Last_Salary_Payment1">
                                                            <label class="form-check-label" for="Last_Salary_Payment1">
                                                                Yes
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="Last_Salary_Payment" value="No" id="Last_Salary_Payment2" checked>
                                                            <label class="form-check-label" for="Last_Salary_Payment2">
                                                                No
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td colspan="4">
                                                        <textarea name="Last_Salary_PaymentRemarks" class="form-control" placeholder="Remarks" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">4</th>
                                                    <td>Other</td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="Leave_Encashment" value="Yes" id="Leave_Encashment1">
                                                            <label class="form-check-label" for="Leave_Encashment1">
                                                                Yes
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="Leave_Encashment" id="Leave_Encashment2" value="No" checked>
                                                            <label class="form-check-label" for="Leave_Encashment2">
                                                                No
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td colspan="4">
                                                        <textarea name="Leave_EncashmentRemarks" class="form-control" placeholder="Remarks" id="exampleFormControlTextarea1" rows="3"></textarea>
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
