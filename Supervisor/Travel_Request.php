<?php
session_start();
error_reporting(0);
// links to database
include('link/desigene/db.php');
if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber'])) {
    // Redirect to the logout page
    header("Location: ../logout.php");
    exit;
} else {
    // Your code for logged-in users goes here
    if(isset($_POST['submit'])){
      $EmployeeNo=$_SESSION['EmployeeNumber'];
      $Name=$_POST['Name'];
      $RequestNo=$_POST['RequestNo'];
      $RequestDate=date('d m y');
      $FromCity=$_POST['FromCity'];
      $ToCity=$_POST['ToCity'];
      $DepartuerDate=$_POST['DepartuerDate'];
      $ReturnDate=$_POST['ReturnDate'];
      $Travel=$_POST['Travel'];
      $Justification=$_POST['Justification'];
      $insert=mysqli_query($conn,"INSERT INTO `travelrequest`(`EmployeeNo`, `RequestNo`, `RequestDate`, `FromCity`, `ToCity`, `DepartureOn`, `ReturnDate`, `TravelMode`, `Justification`) VALUES ('$EmployeeNo','$RequestNo','$RequestDate','$FromCity','$ToCity','$DepartuerDate','$ReturnDate','$Travel','$Justification')");
      if ($insert) {
        // Insertion was successful
        ?>
        <script>
            alert("Data inserted successfully");
            location.replace("Travel_Request.php");
        </script>
        <?php
    } else {
        // Insertion failed
        echo '<script>alert("Sorry, data was not inserted: '. mysqli_error($conn) .'");</script>';
    }  

      
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>

   <meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">

<title>WSSC</title>
<meta content="" name="description">
<meta content="" name="keywords">

<!-- Favicons -->
<link href="assets/img/apple-touch-icon.png" rel="icon">
<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Dosis:300,400,500,,600,700,700i|Lato:300,300i,400,400i,700,700i" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/49d698e135.js" crossorigin="anonymous"></script>

<!-- CKEditor -->
<script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

<!-- Vendor CSS Files -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="../dist/select2/select2.min.css">
<link rel="stylesheet" href="../dist/sweat-alerts/sweetalert.css">

<!-- Chart.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<!-- Custom CSS -->
<link href="css/style.css" rel="stylesheet">

<!-- Roboto Mono Font -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&display=swap" rel="stylesheet">

<!-- jQuery and jQuery UI -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
  <div id="main">
    <?php include('link/desigene/navbar.php')?>
    <div class="container-fluid m-auto py-5">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="card card-success">
            <div style="background-color: darkblue;" class="card-header  text-white fw-bold">
              <div class="card-title">Travel Request</div>
            </div>
            <!-- /.card-header -->
            <div class="card-body bg-light">
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
              <?php 
                  $Empod = $_SESSION['EmployeeNumber'];
                  $select = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `EmployeeNo` = $Empod");
                  if (mysqli_num_rows($select) > 0) {
                      while ($row = mysqli_fetch_array($select)) {
                          
                ?>
                <div class="row">
                  <div class="col-4">
                    <div class="form-group">
                      <label>Employee No </label>
                      <input type="text" name="EmployeeNo" disabled value="<?php echo $row['EmployeeNo']?>" placeholder="Employee No" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>From City</label>
                      <input type="text" name="FromCity" placeholder="From City" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>To City</label>
                      <input type="text" name="ToCity" placeholder="To City" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Departure ON</label>
                      <input type="text" name="DepartuerDate" placeholder="dd mm yyyy" class="form-control datepicker" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Return Date</label>
                      <input type="text" name="ReturnDate" placeholder="dd mm yyyy" class="form-control datepicker" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Travel Mode</label>
                      <input type="text" name="Travel" placeholder="Travel Mode" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Justification</label>
                      <textarea name="Justification" class="form-control"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12 text-end mt-2">
                    <input style="background-color: darkblue;" type="submit" class="btn text-white float-right shadow" value="Submit" name="submit">
                  </div>
                </div>
                <?php }}?>
              </form>
              <div class="row my-3">
                <div class="col-12">
                  <table class="table">
                    <thead class="text-white" style="background-color: darkblue; color:white !important">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col" colspan="4">Travel Description</th>
                        <th scope="col">Req,Status</th>
                        <th scope="col">Bill Status</th>
                        <th scope="col">Add TA Bill</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $select = mysqli_query($conn, "SELECT * FROM `travelrequest` WHERE `EmployeeNo` = $Empod");
     
                      if (mysqli_num_rows($select) > 0) {
                          $a=1;
                           while ($row = mysqli_fetch_array($select)) {
                            
                             if( $row['Statusofmanger']=='REJECTED'||$row['StatusofGm']=='REJECTED'){
                              $status="REJECTED";
                              $color= "btn-danger";
                              $tabill="none";
                             }else if( $row['Statusofmanger']=='ACCPET' && $row['StatusofGm']=='ACCPET'){
                              $status="Accepted";
                              $color= "btn-success";
                              $tabill="block";
                             }else if( $row['Statusofmanger']=='PENDING' || $row['StatusofGm']=='PENDING'){
                              $status="Pending";
                              $color= "btn-primary";
                              $tabill="none";
                             }
                            
                      ?>
                      <tr>
                        <th scope="row"><?php echo $a?></th>
                        <td><?php echo date('d M Y', strtotime($row['RequestDate'])) ?></td>
                        <td colspan="4"><?php echo $row['Justification']?></td>
                        <td><button type="button" class="btn <?php echo $color?>"><?php echo $status?></button></td>
                        <td>
                          <?php
                           $resst=$row['RequestNo'];
                           $query = mysqli_query($conn, "SELECT * FROM `tabill` WHERE `RequestNoTravel`=$resst AND `EmployeeNo`=$Empod");
                           if (mysqli_num_rows($query) > 0) {
                            while ($data = mysqli_fetch_array($query)) {
                              if( $data['Statusofmanger']=='REJECTED'||$data['StatusofGm']=='REJECTED'){
                                $datastatus="REJECTED";
                                $datacolor= "btn-danger";
                                $tabill="none";
                               }else if( $data['Statusofmanger']=='ACCPET' && $data['StatusofGm']=='ACCPET'){
                                $datastatus="Accepted";
                                $datacolor= "btn-success";
                                $tabill="none";
                               }else{
                                $datastatus="Pending";
                                $datacolor= "btn-primary";
                                $tabill="none";
                               }}}else{
                                $datastatus="Empty";
                                $datacolor= "btn-secondary";
                               }
                          ?>
                        <button type="button" class="btn <?php echo $datacolor?>"><?php echo $datastatus?></button>
                        </td>
                        <td><a style="display: <?php echo $tabill ?>;" href="Tabil.php?Rid=<?php echo $row['id'];?>">TABill</a></td>
                      </tr>
                      <?php }}?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- Col-12 -->
      </div>
    </div>
  </div>
  <script>
  $(document).ready(function() {
    // Initialize the datepicker with the correct date format
    $(".datepicker").datepicker({
        dateFormat: 'dd mm yy', // Adjust format if needed
        changeMonth: true,
        changeYear: true
    });
});
  </script>

</body>
</html>
<?php }?>