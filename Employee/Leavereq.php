<?php
session_start();
error_reporting(0);
include('link/desigene/db.php');
if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber'])) {
    // Redirect to logout page if session variables are not set
    ?>
    <script>
        location.replace('../logout.php');
    </script>
    <?php
} else {
    if (isset($_POST['submit'])) {
        // Retrieve form data
        $Employee_number = $_SESSION['EmployeeNumber'];
        $Number = $_POST['Number'];
        $type = $_POST['type'];
        $Levefrom = $_POST['LeaveFrom'];
        $LeaveTo = $_POST['LeaveTo'];
        $NumberofDay = $_POST['NumberofDay'];
        $LeaveAlreadyAvailed = $_POST['LeaveAlreadyAvailed'];
        $Description = $_POST['Description'];
        $date = date("y-m-d");
        // Prepare and execute the SQL query
        $query = mysqli_query($conn, "INSERT INTO `leavereq`(`EmployeeNo`, `PhoneNumberOnLeave`, `LeaveType`, `LeaveFrom`, `LeaveTo`, `TotalDays`, `LeaveAvailed`, `Description`, `DateofApply`) VALUES ('$Employee_number', '$Number', '$type', '$Levefrom', '$LeaveTo', '$NumberofDay', '$LeaveAlreadyAvailed', '$Description', '$date')");
        if ($query) {
            // Insertion was successful
            ?>
            <script>
                alert("Data inserted successfully");
                location.replace("Leavereq.php");
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("Sorry, data was not inserted: <?php echo mysqli_error($conn); ?>");
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
<div id="main">
<?php include('link/desigene/navbar.php')?>
<div class="container-fluid m-auto py-5">
  <div class="row">
      <?php 

     // Get today's date
      $todate = date('Y-m-d');

      // Create a DateTime object for July 1st of the current year
      $julyFirst = new DateTime(date('Y') . '-07-01');

      // Check if today's date is before July 1st
      if (new DateTime($todate) < $julyFirst) {
          // If it is, set $fromdate to July 1st of the previous year
          $fromdate = (date('Y') - 1) . '-07-01';
      } else {
          // Otherwise, set $fromdate to July 1st of the current year
          $fromdate = date('Y') . '-07-01';
      }
      

         $Empod = $_SESSION['EmployeeNumber'];
         $select = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `EmployeeNo` = $Empod");
     
         if (mysqli_num_rows($select) > 0) {
             while ($row = mysqli_fetch_array($select)) {
                
      ?>
      <div class="col-md-12">
        <div class="card card-success">
          <div style="background-color: darkblue;" class="card-header  text-white fw-bold">
            <div class="card-title">Leave Request</div>
          </div>
          <!-- /.card-header -->
          <div class="card-body bg-light">
            <!-- form start -->
            <form method="post" enctype="multipart/form-data">
             <div class="row">
                <div class="col-4 my-2">
                  <div class="form-group">
                    <label>Employee No </label>
                    <input type="text" disabled name="Employee_number" value="<?php echo $row['EmployeeNo']?>" placeholder="Employee No" class="form-control" autocomplete="off" required="">
                  </div>
                </div>
                <div class="col-4 my-2">
                  <div class="form-group">
                    <label>Employee Name</label>
                    <input type="text" disabled value="<?php echo $row['fName']?>" placeholder="Name" class="form-control" autocomplete="off" required="">
                  </div>
                </div>
                <div class="col-4 my-2">
                  <div class="form-group">
                    <label>Father Name</label>
                    <input type="text" disabled value="<?php echo $row['father_Name']?>" placeholder="Father Name" class="form-control" autocomplete="off" required="">
                  </div>
                </div>
                <div class="col-4 my-2">
                  <div class="form-group">
                    <label>Employee ID</label>
                    <input type="text" disabled value="<?php echo $row['Id']?>" placeholder="Employee Id" class="form-control" autocomplete="off" required="">
                  </div>
                </div>
                <div class="col-4 my-2">
                  <div class="form-group">
                    <label>Designation</label>
                    <input type="text" disabled value="<?php echo $row['Job_Tiltle']?>" placeholder="Designation" class="form-control" autocomplete="off" required="">
                  </div>
                </div>
                <div class="col-4 my-2">
                  <div class="form-group">
                    <label for="">Employee Class</label>
                    <input type="text" disabled value="<?php echo $row['Employee_Class']?>" placeholder="Designation" class="form-control" autocomplete="off" required="" >
                  </div>
                </div>
                <div class="col-8 my-2">
                  <div class="form-group">
                    <h5 class="text-center fw-bold" style="font-size: 16px;" for="">Contact address while on leave</h5>
                    <textarea disabled style="width:100%;height:30px;" id="" cols="30" rows="10"><?php echo $row['cAddress']?></textarea>
                  </div>
                </div>
                <div class="col-4 my-2">
                  <div class="form-group">
                    <label>Phone number while on leave</label>
                    <input type="text" name="Number" value="<?php echo $row['mNumber']?>" placeholder="Mobile No" class="form-control" autocomplete="off" required="">
                  </div>
                </div>
                <div class="col-4 my-2">
                  <div class="form-group">
                    <label>Leave Type</label>
                    <select class="form-control select2" name="type" id="">
                    <option value="null" selected>Select Leave Type</option>
                    <?php $selectleave=mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='leave'");
                      while($row=mysqli_fetch_array($selectleave)){
                      echo "<option value='".$row['drop']."'>".$row['drop']."</option>";
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-4 my-2">
    <div class="form-group">
        <label>Leave From</label>
        <input type="date" name="LeaveFrom" id="LeaveFrom" placeholder="dd mm yyyy" class="form-control" autocomplete="off" required="">
    </div>
</div>
<div class="col-4 my-2">
    <div class="form-group">
        <label>Leave To</label>
        <input type="date" name="LeaveTo" id="LeaveTo" placeholder="dd mm yyyy" class="form-control" autocomplete="off" required="">
    </div>
</div>
<div class="col-4 my-2">
    <div class="form-group">
        <label>Total Number of Days</label>
        <input type="text" name="NumberofDay" id="NumberofDay" placeholder="Total Number of Days" class="form-control" autocomplete="off" required="" >
    </div>
</div>


                <div class="col-4 my-2">
                  <div class="form-group">
                    <label>Leave Already Availed</label>
                    <?php
                      include ('link/desigene/db.php');
                        $empid = $_SESSION['EmployeeNumber'];
                        $empleave=15;
                        // SQL query to calculate available leave days
                        $sql = "SELECT SUM(`TotalDays`) AS empleave FROM `leavereq` WHERE `EmployeeNo`=$empid AND `Statusofmanger`='ACCEPT' AND `StatusofGm`='ACCEPT' AND `LeaveTo` >= '$fromdate' AND `LeaveTo` <= '$todate';";

                        $result = $conn->query($sql);

                        if ($result) {
                                $rowleave = $result->fetch_assoc();
                                $leave=$rowleave['empleave'];
                                $totalDaysAfterSubtraction = $empleave-$leave;
                        }
                        else{
                          $totalDaysAfterSubtraction = $empleave;
                        }
                        ?>

                    <input type="number"  name="LeaveAlreadyAvailed" value="<?php  echo  $totalDaysAfterSubtraction;?>" placeholder="Leave Already Availed" class="form-control" autocomplete="off" disabled required="">
                  </div>
                </div>
                <div class="col-4 my-2">
                  <div class="form-group">
                    <label>Description</label>
                    <textarea name="Description" class="form-control"></textarea>
                  </div>
                </div>          
                <div class="col-md-12 text-end mt-2">
                  <input style="background-color: darkblue;" type="submit" class="btn text-white float-right shadow" value="submit" name="submit">
                </div>
              </div>
            </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      <table class="table">
        <thead class="text-white" style="background-color: darkblue;">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Date</th>
            <th scope="col">Leave Type</th>
            <th scope="col" colspan="4">Description</th>
            <th scope="col">Req,Status</th>
          </tr>
        </thead>
        <tbody>
        <?php 
                      $select = mysqli_query($conn, "SELECT * FROM `leavereq` WHERE `EmployeeNo` = $Empod");
     
                      if (mysqli_num_rows($select) > 0) {
                          $a=1;
                           while ($row = mysqli_fetch_array($select)) {
                            
                             if( $row['Statusofmanger']=='REJECTED'||$row['StatusofGm']=='REJECTED'){
                              $status="REJECTED";
                              $color= "btn-danger";
                             }else if( $row['Statusofmanger']=='ACCEPT' && $row['StatusofGm']=='ACCEPT'){
                              $status="Accepted";
                              $color= "btn-success";
                             }else{
                              $status="Pending";
                              $color= "btn-primary";
                             }
                            
                      ?>

                      <tr>
                        <td><?php echo $a?></td>
                        <td><?php echo $row['DateofApply']?></td>
                        <td><?php echo $row['LeaveType']?></td>
                        <td colspan="4"><?php echo $row['Description']?></td>
                      <td><button type="button" class="btn <?php echo $color?>"><?php echo $status?></button></td>
                      </tr>
                      <?php $a++; }}?>
        </tbody>
      </table>
    </div>
    <?php }}
    else{
      echo 'No record ';
    }
    ?>
    <!-- Col-12 -->
  </div>
</div>
<script>
$(document).ready(function() {
            // Initialize the datepicker with your desired format
            $(".datepicker").datepicker({
                dateFormat: 'dd mm yy'
            });
        });
</script>
</body>
</html>
<?php }?>