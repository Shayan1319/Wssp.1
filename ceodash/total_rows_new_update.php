<?php
session_start();
error_reporting(0);
// links to database
include('link/desigene/db.php');
if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber']) || $_SESSION['Designation'] != 'CEO') {
  // Log the unauthorized access attempt for auditing purposes
  error_log("Unauthorized access attempt. User: {$_SESSION['loginid']}");
  
  // Redirect to the logout page
  header("Location: ../logout.php");
  exit; // Ensure that the script stops execution after the header redirection
} else {
    // Your code for logged-in users goes here
    $currentDate = date('Y-m-d');

// Get the number of rows where Status is PENDING for the 'transfer' table
$transferQuery = "SELECT COUNT(*) AS pending_transfer FROM transfer WHERE Status = 'PENDING'";
$transferResult = $conn->query($transferQuery);
$pendingTransfer = $transferResult->fetch_assoc()['pending_transfer'];

// Get the number of rows where Status is PENDING for the 'training' table
$trainingQuery = "SELECT COUNT(*) AS pending_training FROM training WHERE Status = 'PENDING'";
$trainingResult = $conn->query($trainingQuery);
$pendingTraining = $trainingResult->fetch_assoc()['pending_training'];

// Get the number of rows where Status is PENDING for the 'spouse' table
$spouseQuery = "SELECT COUNT(*) AS pending_spouse FROM spouse WHERE Status = 'PENDING'";
$spouseResult = $conn->query($spouseQuery);
$pendingSpouse = $spouseResult->fetch_assoc()['pending_spouse'];

// Get the number of rows where Status is PENDING for the 'qualification' table
$qualificationQuery = "SELECT COUNT(*) AS pending_qualification FROM qualification WHERE Status = 'PENDING'";
$qualificationResult = $conn->query($qualificationQuery);
$pendingQualification = $qualificationResult->fetch_assoc()['pending_qualification'];

// Get the number of rows where Status is PENDING for the 'promotion' table
$promotionQuery = "SELECT COUNT(*) AS pending_promotion FROM promotion WHERE Status = 'PENDING'";
$promotionResult = $conn->query($promotionQuery);
$pendingPromotion = $promotionResult->fetch_assoc()['pending_promotion'];

// Get the number of rows where Status is PENDING for the 'child' table
$childQuery = "SELECT COUNT(*) AS pending_child FROM child WHERE Status = 'PENDING'";
$childResult = $conn->query($childQuery);
$pendingChild = $childResult->fetch_assoc()['pending_child'];


?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <?php include ('link/links.php')?>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
      h5, h3 {
        text-align: center;
      }
      a{
        text-decoration: none;
      }
  </style>
  <body>
    <div id="main">
        <?php include('link/desigene/navbar.php')?>
        <div class="container px-3 py-5">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <h3>Employee Status</h3>
            </div>
            <div class="col-md-3 col-xs-12">
              <!-- small box -->
              <a href="pendingTransfer.php">
              <div style="background-color: #6471d3; text-decoration:none;" class="small-box py-2 text-white">
                <div class="inner">
                <h3><?php echo $pendingTransfer?></h3>
                  <h5>Pending Transfer</h5>
                </div>
                
              </div>
              </a>
            </div><!-- ./col -->
            <div class="col-md-3 col-xs-12">
              <a href="pendingTraining.php">
                <!-- small box -->
              <div style="background-color: #6471d3; text-decoration:none;" class="small-box py-2 text-white">
                <div class="inner">
                  <h3><?php echo $pendingTraining?></h3>
                  <h5>Pending Training</h5>
                </div>
              </div>
              </a>
            </div><!-- ./col -->
            <div class="col-md-3 col-xs-12">
              <!-- small box -->
              <a href="pendingSpouse.php">
              <div style="background-color: #6471d3; text-decoration:none;" class="small-box py-2 text-white">
                <div class="inner">
                  <h3><?php echo $pendingSpouse?></h3>
                  <h5>Pending Spouse</h5>
                </div>
              </div>
              </a>
            </div><!-- ./col -->
            <div class="col-md-3 col-xs-12">
              <a href="pendingQualification.php" style>
                <!-- small box -->
              <div style="background-color: #6471d3; text-decoration:none;" class="small-box py-2 text-white">
                <div class="inner">
                  <h3><?php echo $pendingQualification?></h3>
                  <h5>Pending Qualification</h5>
                </div>
              </div>
              </a>
            </div><!-- ./col -->

            <div class="col-md-3 col-xs-12">
              <a href="pendingPromotion.php" >
                <!-- small box -->
              <div style="background-color: #6471d3; text-decoration:none;" class="small-box py-2 text-white">
                <div class="inner">
                  <h3><?php echo $pendingPromotion?></h3>
                  <h5>Pending Promotion</h5>
                </div>
              </div>
              </a>
            </div>

            <div class="col-md-3 col-xs-12">
              <a href="pendingChild.php" style>
                <!-- small box -->
              <div style="background-color: #6471d3; text-decoration:none;" class="small-box py-2 text-white">
                <div class="inner">
                  <h3><?php echo $pendingChild?></h3>
                  <h5>Pending Child</h5>
                </div>
              </div>
              </a>
            </div>
          </div>
        </div>
    </div>
    <?php include('link/desigene/script.php')?>
  </body>
</html>
<?php
  }
?>