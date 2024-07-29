<?php
session_start();
error_reporting(0);
// links to database
include('../hrdash/link/desigene/db.php');

if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber']) || $_SESSION['Designation'] != 'GM') {
    // Log the unauthorized access attempt for auditing purposes
    error_log("Unauthorized access attempt. User: {$_SESSION['loginid']}");
    
    // Redirect to the logout page
    header("Location: ../logout.php");
    exit; // Ensure that the script stops execution after the header redirection
  } else{

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include ('link/links.php')?>
</head>
<style>
    #fullDiv ul {
        margin: 0;
        padding: 0;
    }
    
    #fullDiv li {
        float: left;
        display: block;
        width: 14.2857%;
        text-align: center;
        list-style-type: none;
    }
    
    #fullDiv li:nth-child(n+1):nth-child(-n+7) {
        font-weight: 900;
        color: #e67e22;
    }
    
    #fullDiv li:nth-child(n+39),
    #fullDiv li:nth-child(n+8):nth-child(-n+16) {
        font-weight: 900;
        color: rgba(0, 0, 0, .3);
    }
    
    #fullDiv li:hover:nth-child(n+8):nth-child(-n+38),
    #fullDiv li:nth-child(17) {
        border-radius: 5px;
        background-color: #1abc9c;
        color: #ecf0f1;
    }
    
    .form-group label {
        font-weight: bold;
    }
    /* width */
    
     ::-webkit-scrollbar {
        width: 20px;
    }
    /* Track */
    
     ::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px grey;
        border-radius: 10px;
    }
    /* Handle */
    
     ::-webkit-scrollbar-thumb {
        background: red;
        border-radius: 10px;
    }
    /* Handle on hover */
    
     ::-webkit-scrollbar-thumb:hover {
        background: #b30000;
    }
</style>
<body>
    <div id="main">
        <?php include('link/desigene/navbar.php')?>
        <div class="container-fluid p-5">
            <table class="table table-striped table-hover">
                <thead style="background-color: #2A64C4; color: #fff;">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Employee ID #: </th>
                        <th scope="col">Designation</th>
                        <th scope="col">Department</th>
                        <th scope="col">Verify</th>
                    </tr>
                </thead>
                <tbody style="background-color: #61AFE4; color: #fff;">
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>
                            <a href="verified.php"><i class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>@mdo</td>
                        <td>
                            <a href="verified.php"><i class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    <?php include('link/desigene/script.php')?>
</body>

</html>
<?php }?>