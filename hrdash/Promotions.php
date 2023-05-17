<?php
include('../link/desigene/db.php');

if(isset($_POST['submit']))
{
$CNIC = $_GET['updat'];
$From_Designation = $_POST[''];
$To_Designation = $_POST[''];
$From_BPS = $_POST[''];
$ToBps = $_POST[''];
$Promotion_Date = $_POST[''];
$Promotion_Number = $_POST[''];
$Department1 = $_POST[''];
$Acting = $_POST[''];
$Remarks = $_POST[''];
$insertquery = "INSERT INTO `$CNIC c`(`From_Designation`, `To_Designation`, `From_BPS`, `ToBps`, `Promotion_Date`, `Promotion_Number`, `Department1`, `Acting`, `Remarks`) VALUES ('$From_Designation','$To_Designation','$From_BPS','$ToBps','$Promotion_Date','$Promotion_Number','$Department1','$Acting','$Remarks'";
$query= mysqli_query($conn,$insertquery);
if ($query)
{echo '<script>alert( "Data Insertaed");</script>';
    ?>
           <script>
               location.replace('Transfer.php?updat=<?php echo $CNIC?>');
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
        <div id="section5" >
                <div class="row my-4">
                  <!-- left column -->
                  <div class="col-12">
                    <div class="card card-success">
                      <div style="background-color: darkblue;" class="card-header  text-white fw-bold">
                        <div class="card-title">Employee Promotions</div>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body bg-light">
                        <!-- form start -->
                        <div class="row">
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>From Designation </label>
                              <input type="text" name="From_Designation" placeholder="From Designation" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>To Designation</label>
                              <input type="text" name="To_Designation" placeholder="To Designation" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>From BPS</label>
                              <input type="text" name="From_BPS" placeholder="From BPS" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>To BPS</label>
                              <input type="text" name="ToBps" placeholder="To BPS" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>Promotion Date</label>
                              <input type="Date" name="Promotion_Date" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>Promotion Number</label>
                              <input type="text" name="Promotion_Number" placeholder="Promotion Number" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>Department</label>
                              <input type="text" name="Department1" placeholder="Department" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>Acting</label>
                              <select name="Acting" class="form-control">
                                <option>Choose</option>
                                <option>Regular</option>
                                <option>OPS</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>Remarks</label>
                              <input type="text" name="Remarks" placeholder="Remarks" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="col-md-12 text-end mt-2">
                          <input style="background-color: darkblue;" type="button" onclick="backToSection2()" class="btn text-white shadow float-right" value="Skip" >
                          <input style="background-color: darkblue;"  type="submit" onclick="validateSection3()" class="btn text-white shadow float-right" value="Submit" >
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
    </div>
    <script>
     function backToSection2() {
        <?php $CNIC = $_GET['updat'];?>
        location.replace('Transfer.php?updat=<?php echo $CNIC?>');
            }
</script>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

<?php include('link/desigene/script.php')?>
</body>
</html>