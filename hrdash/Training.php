<?php
include('../link/desigene/db.php');

if(isset($_POST['submit']))
{
    $CNIC = $_GET['updat'];
    $Training_Serial_Number = $_POST['Training_Serial_Number'];
    $Training_Name = $_POST['Training_Name'];
    $Institute = $_POST['Institute'];
    $City = $_POST['City'];
    $Institute_Address = $_POST['Institute_Address'];
    $Oblige_Sponsor = $_POST['Oblige_Sponsor'];
    $From = $_POST['From'];
    $To = $_POST['To'];
    $Duration = $_POST['Duration'];
$insertquery = "INSERT INTO `$CNIC b`(`Training_Serial_Number`, `Training_Name`, `Institute`, `City`, `Institute_Address`, `Oblige_Sponsor`, `From_Date`, `To_Date`, `Duration`) VALUES ('$Training_Serial_Number','$Training_Name','$Institute','$City','$Institute_Address','$Oblige_Sponsor','$From','$To','$Duration')";
$query= mysqli_query($conn,$insertquery);
if ($query)
{echo '<script>alert( "Data Insertaed");</script>';
    ?>
           <script>
               location.replace('Promotions.php?updat=<?php echo $CNIC?>');
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
        <div id="section4" >
                <div class="row my-4">
                  <!-- left column -->
                  <div class="col-md-12">
                    <div class="card card-success">
                      <div style="background-color: darkblue;" class="card-header  text-white fw-bold">
                        <div class="card-title text-white">Employee Training Information</div>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body bg-light">
                        <div class="row">
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>Training Serial Number</label>
                              <input type="text" name="Training_Serial_Number" placeholder="Training Serial Number" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>Training Name</label>
                              <input type="text" name="Training_Name" id="Training_Name" placeholder="Training Name" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>Institute</label>
                              <input type="text" name="Institute" placeholder="Institute" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>City</label>
                              <input type="text" name="City" placeholder="City" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>Institute Address</label>
                              <input type="text" name="Institute_Address" placeholder="Institute Address" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>Oblige Sponsor</label>
                              <input type="text" name="Oblige_Sponsor" placeholder="Oblige Sponsor" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>From</label>
                              <input type="Date" name="From" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>To</label>
                              <input type="Date" name="To" class="form-control" autocomplete="off" required="">
                            </div>
                          </div> 
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>Duration </label>
                              <input type="text" name="Duration" placeholder="Duration" class="form-control" autocomplete="off" required="">
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
                <!-- row -->
              </div>
           </div>
        </div>
<script>
     function backToSection2() {
        <?php $CNIC = $_GET['updat'];?>
        location.replace('Promotions.php?updat=<?php echo $CNIC?>');
            }
</script>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

<?php include('link/desigene/script.php')?>
</body>
</html>