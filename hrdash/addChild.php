<?php
session_start();
error_reporting(0);
// links to database
include('../hrdash/link/desigene/db.php');

if (strlen($_SESSION['loginid']==0)) {
?>   <script>
location.replace('../logout.php')
</script><?php
  } else{

?>
<?php
include('../link/desigene/db.php');

if(isset($_POST['submit']))
{
$CNIC = $_GET['updat'];
$Name= $_POST['Spouse_Name'];
$CNICC= $_POST['CNIC'];
$Date_of_B= $_POST['Date_of_B'];
$gender= $_POST['gender'];
$insertquery = "INSERT INTO `$CNIC`(`Child_Name`, `BForm`, `Date_Of_B`, `Gander`) VALUES ('$Name','$CNICC','$Date_of_B','$gender')";
$query= mysqli_query($conn,$insertquery);
if ($query)
{echo '<script>alert( "Data Insertaed");</script>';}
}
?><!DOCTYPE html>
<html lang="en">
<head>
   <?php include ('link/links.php')?>
</head>
<body>
    <?php include ('link/desigene/sidebar.php')?>
  <div id="main">
    <?php include('link/desigene/navbar.php')?>
    <div class="container-fluid py-5">
             <form action="" method="post">
             <div id="section6">
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
                              <label>Name</label>
                              <input type="text" name="Spouse_Name" placeholder="Name" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>  
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>CNIC</label>
                              <input type="text" name="CNIC" placeholder="CNIC" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>Date of birth</label>
                              <input type="date" name="Date_of_B" placeholder="Date of birth" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="col-md-4">
                          <label>Gender</label>
                            <select id="Gender" name="gender" id="" class="form-control select2">
                                <option value="">Choose</option>
                                <option value="">Male</option>
                                <option value="">Female</option>
                            </select>
                          </div>
                          <div class="col-md-12 text-end mt-2">
                          <button style="background-color: darkblue;" name="submit" type="submit" class="btn text-white shadow float-right"><i class="fa-solid fa-plus"></i></button>
                            <input style="background-color: darkblue;" type="button" onclick="backToSection2()" class="btn text-white shadow float-right" value="Skip">
                            <input type="button"  onclick="backToSection2()"  style="background-color: darkblue;" class="btn text-white shadow float-right" value="Submit" name="" id="">
                          </div>
                        </div>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
                  <!-- Col-12 -->
                  <div class="col-12">
                    <div class="card card-success">
                      <div style="background-color: darkblue;" class="card-header  text-white fw-bold">
                        <div class="card-title">Spouse Details</div>
                      </div>
                    </div>
                       <div>
                            <table class="table bg-light">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Spouse_Name</th>
                                    <th scope="col">CNIC</th>
                                    <th scope="col">Date of birth.</th>
                                    <th scope="col">Update</th>
                                    <th scope="col">Delete</th>
                                </tr></thead>
                                
                                <tbody>
                                <?php   $CNIC = $_GET['updat'];
                                  $select = mysqli_query($conn,"SELECT * FROM `$CNIC`");
                                  while($see=mysqli_fetch_array($select))
                                  { 
                                  ?>
                                    <tr>
                                    <th scope="row"><?php echo $see ['Id'] ?></th>
                                    <td><?php echo $see ['Child_Name'] ?></td>
                                    <td><?php echo $see ['BForm'] ?></td>
                                    <td><?php echo $see ['Date_Of_B'] ?></td>
                                    <td><?php echo $see ['Gander'] ?></td>
                                    
                                    <td><a href=""><i class="fa-solid fa-pen-to-square"></i></a></td>
                                    <td><a href=""><i class="fa-solid fa-trash"></i></a></td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                  </div>
               
                </div>
              </div>
             </form>
              <!-- /.card -->

        </div>
   
  </div>

 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

<?php include('link/desigene/script.php')?>
</body>
</html>
<?php
  }
?>