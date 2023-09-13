<?php
session_start();
error_reporting(0);
// links to database
include('link/desigene/db.php');
if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber'])) {
    ?>   <script>
        location.replace('../logout.php');
    </script><?php
  } else{
 $Empod = $_SESSION['EmployeeNumber'];
// Your database connection code here

// SQL query



// SQL query
if(isset($_POST['submit'])){
  $Employee_number=$_SESSION['EmployeeNumber'];
  $Number=$_POST['Number'];
  $type=$_POST['type'];
  $Levefrom=$_POST['Levefrom'];
  $LeaveTo=$_POST['LeaveTo'];
  $NumberofDay=$_POST['NumberofDay'];
  $LeaveAlreadyAvailed=$_POST['LeaveAlreadyAvailed'];
  $Description=$_POST['Description'];
  $date=date("Y-M-D");
  $query = mysqli_query($conn, "INSERT INTO `leavereq`(`EmployeeNo`, `PhoneNumberOnLeave`, `LeaveType`, `LeaveFrom`, `LeaveTo`, `TotalDays`, `LeaveAvailed`, `Description`, `DateofApply`) VALUES ('$Employee_number','$Number','$type','$Levefrom','$LeaveTo','$NumberofDay','$LeaveAlreadyAvailed','$Description','$date')");
if ($query) {
    // Insertion was successful
    ?>
    <script>
        alert("Data inserted successfully");
        location.replace("Leavereq.php");
    </script>
    <?php
} else {
    // Insertion failed
    echo '<script>alert("Sorry, data was not inserted: ' . mysqli_error($conn) . '");</script>';
}}




?><!DOCTYPE html>
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
<div class="container-fluid m-auto py-5">
  <div class="row">
      <!-- left column -->
      <?php 
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
                    <input type="text" disabled value="<?php echo $row['father_Name']?>" placeholder="Fasther Name" class="form-control" autocomplete="off" required="">
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
                      <option value="Annual">Annual</option>
                      <option value="Sick">Sick</option>
                      <option value="Maternity">Maternity</option>
                      <option value="Paternity">Paternity</option>
                      <option value="Casual">Casual</option>
                      <option value="Compassionate">Compassionate</option>
                      <option value="Without Pay">Without Pay</option>
                    </select>
                  </div>
                </div>
                <div class="col-4 my-2">
                  <div class="form-group">
                    <label>Leave From</label>
                    <input type="date" name="Levefrom"  placeholder="Leave From" class="form-control" autocomplete="off" required="">
                  </div>
                </div>
                <div class="col-4 my-2">
                  <div class="form-group">
                    <label>Leave To</label>
                    <input type="date" name="LeaveTo" placeholder="Leave To" class="form-control" autocomplete="off" required="">
                  </div>
                </div>
                <div class="col-4 my-2">
                  <div class="form-group">
                    <label>Total Number of Days</label>
                    <input type="number" name="NumberofDay"  placeholder="Total Number of Days" class="form-control" autocomplete="off" required="">
                  </div>
                </div>
                <div class="col-4 my-2">
                  <div class="form-group">
                    <label>Leave Already Availed</label>
                    <?php
                      // Include your database connection script

                      // Get the employee ID from the session
                      $empid = $_SESSION['EmployeeNumber'];

                      // SQL query to calculate available leave days
                      $sql = "SELECT SUM(lr.TotalDays) - ed.leaveAlreadyAvailed AS TotalDaysAfterSubtraction
                              FROM leavereq lr
                              INNER JOIN employeedata ed ON lr.EmployeeNo = ed.EmployeeNo
                              WHERE lr.Statusofmanger = 'ACCEPT' AND lr.StatusofGm = 'ACCEPT' AND YEAR(lr.DateofApply) = YEAR(CURRENT_DATE())
                              AND ed.EmployeeNo = $empid";

                      $result = $conn->query($sql);

                      if ($result) {
                          if ($result->num_rows > 0) {
                              $row = $result->fetch_assoc();
                              $totalDaysAfterSubtraction = $row['TotalDaysAfterSubtraction'];
                          } else {
                              // No leave request found, use the initial value from employeedata
                              $totalDaysAfterSubtraction = $row["leaveAlreadyAvailed"];
                          }
                      } else {
                          // Handle database query error
                          die('MySQL Error: ' . mysqli_error($conn));
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
                             }else if( $row['Statusofmanger']=='ACCPET' && $row['StatusofGm']=='ACCPET'){
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
<?php include('link/desigene/script.php')?>
</body>
</html><?php }?>