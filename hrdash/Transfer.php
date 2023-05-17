<?php
include('../link/desigene/db.php');

if(isset($_POST['submit']))
{
$CNIC = $_GET['updat'];
$Transfer_Order_Number= $_POST[''];
$Designation= $_POST[''];
$BPS= $_POST[''];
$From_Department= $_POST[''];
$To_Project= $_POST[''];
$From_Station= $_POST[''];
$To_Station= $_POST[''];
$Worked_From= $_POST[''];
$Transfer_Date= $_POST[''];
$insertquery = "INSERT INTO `$CNIC d`( `Transfer_Order_Number`, `Designation`, `BPS`, `From_Department`, `To_Project`, `From_Station`, `To_Station`, `Worked_From`, `Transfer_Date`) VALUES ('$Transfer_Order_Number','$Designation','$BPS','$From_Department','$To_Project','$From_Station','$To_Station','$Worked_From','$Transfer_Date')";
$query= mysqli_query($conn,$insertquery);
if ($query)
{echo '<script>alert( "Data Insertaed");</script>';
    ?>
           <script>
               location.replace('employeePersonalInfo.php');
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
    <?php include ('link/desigene/sidebar.php')?>
    <div id="main">
    <?php include('link/desigene/navbar.php')?>
        <div class="container-fluid py-5">
        <div id="section6" style="display: none;">
                <div class="row my-4">
                  <!-- left column -->
                  <div class="col-md-12">
                    <div class="card card-success">
                      <div style="background-color: darkblue;" class="card-header  text-white fw-bold">
                        <div class="card-title">Employee Transfer</div>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body bg-light">
                        <div class="row">
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>Transfer Order Number </label>
                              <input type="text" name="Transfer_Order_Number" placeholder="Transfer Order Number" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>  
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>Designation</label>
                              <input type="text" name="Designation" placeholder="Designation" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>BPS</label>
                              <input type="text" name="BPS" placeholder="From BPS" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>From Department</label>
                              <input type="text" name="From_Department" placeholder="From Deparment" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label> To Project</label>
                              <input type="text" name="To_Project" placeholder="To Project" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>From Station</label>
                              <input type="text" name="From_Station" placeholder="From  Station" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>To Station</label>
                              <input type="text" name="To_Station" placeholder="To Station" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>Worked From</label>
                              <input type="text" name="Worked_From" placeholder="Worked From" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>Transfer Date</label>
                              <input type="Date" name="Transfer_Date" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="col-md-12 text-end mt-2">
                            <input style="background-color: darkblue;" type="button" onclick="backToSection5()" class="btn text-white float-right shadow" value="back">
                            <input style="background-color: darkblue;" type="submit" class="btn text-white float-right shadow" value="Submit" name="saveUser1">
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
              <!-- /.card -->
        </div>
    </div>
    <script>
     function backToSection2() {
        <?php $CNIC = $_GET['updat'];?>
        location.replace('employeePersonalInfo.php');
            }
</script>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

<?php include('link/desigene/script.php')?>
</body>
</html>