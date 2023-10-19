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
      $RequestDate=date('Y-M-d');
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
   <?php include ('link/links.php')?>
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
                      <input type="date" name="DepartuerDate" placeholder="Departure ON" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Return Date</label>
                      <input type="date" name="ReturnDate" placeholder="" class="form-control" autocomplete="off" required="">
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
                        <td><?php echo $row['RequestDate']?></td>
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
                        <td><a style="display: <?php echo $tabill ?>;" href="Tabil.php?Rid=<?php echo $row['RequestNo'];?>">TABill</a></td>
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
  <?php include('link/desigene/script.php')?>
</body>
</html>
<?php }?>