<?php
session_start();
header('Content-Type: application/json');
error_reporting(0);

// Include the database connection file
include 'link/desigene/db.php';

$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Email = $_POST['Email'] ?? '';
    $Password = $_POST['Password'] ?? '';
    $loginas = $_POST['loginas'] ?? '';

    if (empty($Email) || empty($Password) || empty($loginas)) {
        $response['status'] = 'error';
        $response['message'] = 'All fields are required.';
        echo json_encode($response);
        exit();
    }

    $email_search = mysqli_query($conn, "SELECT * FROM `login` WHERE `Email`='$Email' AND `Password`='$Password'");
    $row = mysqli_fetch_array($email_search);

    if ($row) {
        $_SESSION['loginid'] = $row['Id'];
        $_SESSION['EmployeeNumber'] = $row['EmployeeNumber'];
        $_SESSION['Designation'] = $row['Designation'];
        $_SESSION['name'] = $row['FullName'];
        $_SESSION['Email'] = $row['Email'];

        switch ($row["Designation"]) {
            case "Admin":
            case "HR manager":
            case "Internal Auditor":
            case "Payroll manager":
            case "CEO":
            case "AppAdmin":
            case "FinanceAdmin":
            case "Manager":
            case "DYManager":
            case "GM":
            case "Supervisor":
                if ($loginas == "Admin") {
                    $response['status'] = 'success';
                    $response['redirect'] = strtolower(str_replace(' ', '', $row["Designation"])) . "/index.php";
                } else {
                    $response['status'] = 'error';
                    $response['message'] = 'Invalid login type.';
                }
                break;

            case "Employee":
                if ($loginas == "Employee") {
                    $response['status'] = 'success';
                    $response['redirect'] = "Employee/index.php";
                } else {
                    $response['status'] = 'error';
                    $response['message'] = 'Invalid login type.';
                }
                break;

            default:
                $response['status'] = 'error';
                $response['message'] = 'Invalid designation.';
                break;
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Invalid email or password.';
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Invalid request method.';
}

echo json_encode($response);
?>
<!-- curl -X POST -d "Email=user@example.com&Password=yourpassword&loginas=Admin" http://yourdomain.com/login_api.php -->
<!-- {
  "status": "success",
  "redirect": "admindash/index.php"
} -->
