<?php
// session_start();
session_start();
error_reporting(0);
// links to database
include('../api/app Ak S api.php/config.php');


if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber']) || $_SESSION['Designation'] != 'AppAdminAppAdmin') {
    // Log the unauthorized access attempt for auditing purposes
    error_log("Unauthorized access attempt. User: {$_SESSION['loginid']}");
    
    // Redirect to the logout page
    header("Location: ../logout.php");
    exit; // Ensure that the script stops execution after the header redirection
  }else{

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
<div class="container-fluid m-auto p-5">
                <section class="vh-100 gradient-custom">
                    <div class="container py-5 h-100">
                        <div class="row justify-content-center align-items-center h-100">
                            <div class="">
                                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                                    <div class="card-body p-4 p-md-5">
                                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">New Consumer</h3>
                                    </div>
                                    <div class="my-5">
                                    <table class="table">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>CNIC</th>
                                                <th>Mobile Number</th>
                                                <th>Consumer Type</th>
                                                <th>Email</th>
                                                <th>Date Time</th>
                                                <th>Address</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
    <?php
    $select = mysqli_query($conn, "SELECT * FROM `complane`");
    while ($see = mysqli_fetch_array($select)) {
        $aid = $see['Id']; // Assuming 'Id' is the unique identifier for each complaint

        // Define button styles based on the complaint's status
        $style = "";
        $reject = "";
        if ($see['Status'] == 'Pending') {
            $style = "background-color: #BA0F30 !important;";
            $reject = "background-color: #BA0F30 !important;";
        } else if ($see['Status'] == "accept") {
            $style = "background-color: #81B622;";
            $reject = "background-color: #BA0F30;";
        } else if ($see['Status'] == "reject") {
            $style = "background-color: #BA0F30;";
            $reject = "background-color: #81B622;";
        }
    ?>
        <tr>
            <td> <?php echo $see['CNIC'] ?></td>
            <td> <?php echo $see['Mobile'] ?></td>
            <td> <?php echo $see['Consumer Type'] ?></td>
            <td> <?php echo $see['Email'] ?></td>
            <td> <?php echo $see['DateTime'] ?></td>
            <td>Moh : <?php echo $see['Mohalla'] ?> House : <?php echo $see['House'] ?> UC : <?php echo $see['UC'] ?> Phase : <?php echo $see['Phase'] ?></td>
            <td>
                <?php
                if (isset($_POST[$aid])) {
                    $Id = $see['Id'];
                    $insert = mysqli_query($conn, "UPDATE `complane` SET `Status`='accept' WHERE `Id`=$Id");
                    if ($insert) {
                        echo '<script>alert("Accepted");</script>';
                        echo "<script>window.location.href='Customer.php'</script>";
                    } else {
                        echo '<script>alert("Data Not Accepted");</script>';
                    }
                } else if (isset($_POST['reject' . $aid])) {
                    $Id = $see['Id'];
                    $insert = mysqli_query($conn, "UPDATE `complane` SET `Status`='reject' WHERE `Id`=$Id");
                    if ($insert) {
                        echo '<script>alert("Rejected");</script>';
                        echo "<script>window.location.href='Customer.php'</script>";
                    } else {
                        echo '<script>alert("Data Not Rejected");</script>';
                    }
                }
                ?>
                <form method="post">
                    <button name="<?php echo $aid ?>" style="<?php echo $style ?>" class="text-white fw-bolder btn">
                        Accept
                    </button>
                    <button style="<?php echo $reject ?>" class="text-white fw-bolder btn" name="reject<?php echo $aid; ?>">Reject</button>
                </form>
            </td>
        </tr>
    <?php
    }
    ?>
</tbody>

                                    </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>  
            </div>


<?php include('link/desigene/script.php')?>
</body>
</html>
<?php 
}
?>