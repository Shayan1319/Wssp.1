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
        $Employee_number = $_POST['empid'];
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
            <form id="leaveRequestForm" method="post" enctype="multipart/form-data">
             <div class="row">
             <div class="col-md-4 my-2">
                <label for="empid">Employee Id</label>
                <select name="empid" id="empid" class="form-control select2">
                    <?php
                    $Employee_Manager = $_SESSION['EmployeeNumber'];
                    $selectempdata = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `Status`='ON-DUTY' AND `Attendance_Supervisor`=$Employee_Manager");
                    if (mysqli_num_rows($selectempdata) > 0) {
                        echo '<option value="" selected>Search</option>';
                        while ($rowempdata = mysqli_fetch_assoc($selectempdata)) {
                            echo '<option value="' . $rowempdata['EmployeeNo'] . '">' . $rowempdata['EmployeeNo'] . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
                <div class="col-4 my-2">
                  <div class="form-group">
                    <label>Employee Name</label>
                    <input type="text" id="empName" disabled placeholder="Name" class="form-control" autocomplete="off" required="">
                  </div>
                </div>
                <div class="col-4 my-2">
                  <div class="form-group">
                    <label>Father Name</label>
                    <input type="text" id="fatherName" disabled placeholder="Father Name" class="form-control" autocomplete="off" required="">
                  </div>
                </div>
                <div class="col-4 my-2">
                  <div class="form-group">
                    <label>Employee ID</label>
                    <input type="text" id="employeeID" disabled placeholder="Employee Id" class="form-control" autocomplete="off" required="">
                  </div>
                </div>
                <div class="col-4 my-2">
                  <div class="form-group">
                    <label>Designation</label>
                    <input type="text" id="designation" disabled placeholder="Designation" class="form-control" autocomplete="off" required="">
                  </div>
                </div>
                <div class="col-4 my-2">
                  <div class="form-group">
                    <label for="">Employee Class</label>
                    <input type="text" id="empClass" disabled placeholder="Designation" class="form-control" autocomplete="off" required="" >
                  </div>
                </div>
                <div class="col-8 my-2">
                  <div class="form-group">
                    <h5 class="text-center fw-bold" style="font-size: 16px;" for="">Contact address while on leave</h5>
                    <textarea id="contactAddress" disabled style="width:100%;height:30px;" cols="30" rows="10"></textarea>
                  </div>
                </div>
                <div class="col-4 my-2">
                  <div class="form-group">
                    <label>Phone number while on leave</label>
                    <input type="text" name="Number" id="phoneNumber" placeholder="Mobile No" class="form-control" autocomplete="off" required="">
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
                        <input type="text" name="NumberofDay" id="NumberofDay" placeholder="Total Number of Days" class="form-control" autocomplete="off" required="">
                    </div>
                </div>
                <div class="col-4 my-2">
                    <div class="form-group">
                        <label>Leave Already Availed</label>
                        <input type="number" name="LeaveAlreadyAvailed" id="LeaveAlreadyAvailed" placeholder="Leave Already Availed" class="form-control" autocomplete="off" disabled required="">
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
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>$(document).ready(function() {
    $('#empid').on('change', function() {
        var empid = $(this).val();
        if (empid) {
            // Fetch employee data
            $.ajax({
                type: 'POST',
                url: 'ajex/get_employee_data.php',
                data: { empid: empid },
                success: function(response) {
                    console.log(response); // Debugging line
                    var data = JSON.parse(response);
                    $('#empName').val(data.fName);
                    $('#fatherName').val(data.father_Name);
                    $('#employeeID').val(data.Id);
                    $('#designation').val(data.Job_Tiltle);
                    $('#empClass').val(data.Employee_Class);
                    $('#contactAddress').val(data.cAddress);
                    $('#phoneNumber').val(data.mNumber);
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error: " + status + ", " + error);
                }
            });

            // Fetch leave data
            $.ajax({
                type: 'POST',
                url: 'ajex/get_employee_leave_data.php',
                data: { empid: empid },
                success: function(response) {
                    console.log(response); // Debugging line
                    $('#LeaveAlreadyAvailed').val(response);
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error: " + status + ", " + error);
                }
            });
        } else {
            $('#empName').val('');
            $('#fatherName').val('');
            $('#employeeID').val('');
            $('#designation').val('');
            $('#empClass').val('');
            $('#contactAddress').val('');
            $('#phoneNumber').val('');
            $('#LeaveAlreadyAvailed').val('');
        }
    });
});

</script>
</body>
</html>

<?php }?>