<?php
session_start();
error_reporting(0);
// links to database
include ('link/desigene/db.php');
if (strlen($_SESSION['loginid']==0)) {
?>   <script>
location.replace('../logout.php')
</script><?php
  } else{
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
      <div class="row">
      
        <div class="col-lg-12">
          <div class="card card2 text-center bg-light">
            <div style="background-color: darkblue;" class="card-header ">
              <div class="card-title text-white">Employee Family Information</div>
            </div>
            <div class="container-fluid m-auto p-5 bg-light">
                <div class="row">
                    <?php
                    $CNIC = $_GET['id'];
                    $select = mysqli_query($conn,"SELECT * FROM `employeedata` WHERE `Id` = '$CNIC'");
                    while($see=mysqli_fetch_array($select)){
                    ?>
                    <div class="col-md-6 col-sm-12 col-lg-6">
                        <div class="row">
                            <div class="col-4"><img src="image/download.jfif" alt="" width="150px"></div>
                            <div class="col-8"><h4 class="fw-bold"><?php echo $see ['fName']?> <?php echo $see ['mName']?> <?php echo $see ['lName']?> </h4><h5>Designation</h5><h5 class="text-primary"><?php echo $see ['email']?> </h5><h5><?php echo $see ['EmployeeNo']?></h5></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-lg-6">
                        <div class="float-end bg-white">
                            <div class="card" style="width: 18rem;">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Action</li>
                                </ul>
                                <div class="card-footer">
                                    <a href="#" class="btn btn-primary">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <div class="col-12 bg-white mt-5 px-2">
                    <nav class="navbar bg-white">
                    <div class="container-fluid">
                        <h4>Basic Info</h4>
                    </div>
                    </nav>
                        <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12"><h5><?php echo $see['Id']?></h5></div>
                        <div class="col-md-6 col-lg-6 col-sm-12"><h5><?php echo $see['image']?></h5></div>
                        <div class="col-md-6 col-lg-6 col-sm-12"><h5><?php echo $see['fName']?></h5></div>
                        <div class="col-md-6 col-lg-6 col-sm-12"><h5><?php echo $see['mName']?></h5></div>
                        <div class="col-md-6 col-lg-6 col-sm-12"><h5><?php echo $see['lName']?></h5></div>
                        <div class="col-md-6 col-lg-6 col-sm-12"><h5><?php echo $see['father_Name']?></h5></div>
                        <div class="col-md-6 col-lg-6 col-sm-12"><h5><?php echo $see['CNIC']?></h5></div>
                        <div class="col-md-6 col-lg-6 col-sm-12"><h5><?php echo $see['email']?></h5></div>
                        <div class="col-md-6 col-lg-6 col-sm-12"><h5><?php echo $see['pAddress']?></h5></div>
                        <div class="col-md-6 col-lg-6 col-sm-12"><h5><?php echo $see['cAddress']?></h5></div>
                        <div class="col-md-6 col-lg-6 col-sm-12"><h5><?php echo $see['city']?></h5></div>
                        <div class="col-md-6 col-lg-6 col-sm-12"><h5><?php echo $see['postAddress']?></h5></div>
                        <div class="col-md-6 col-lg-6 col-sm-12"><h5><?php echo $see['mNumber']?></h5></div>
                        <div class="col-md-6 col-lg-6 col-sm-12"><h5><?php echo $see['ofphNumber']?></h5></div>
                        <div class="col-md-6 col-lg-6 col-sm-12"><h5><?php echo $see['Alternate_Number']?></h5></div>
                        <div class="col-md-6 col-lg-6 col-sm-12"><h5><?php echo $see['DofB']?></h5></div>
                        <div class="col-md-6 col-lg-6 col-sm-12"><h5><?php echo $see['religion']?></h5></div>
                        <div class="col-md-6 col-lg-6 col-sm-12"><h5><?php echo $see['gender']?></h5></div>
                        <div class="col-md-6 col-lg-6 col-sm-12"><h5><?php echo $see['BlGroup']?></h5></div>
                        <div class="col-md-6 col-lg-6 col-sm-12"><h5><?php echo $see['Domicile']?></h5></div>
                        <div class="col-md-6 col-lg-6 col-sm-12"><h5><?php echo $see['MaritalStatus']?></h5></div>
                        <div class="col-md-6 col-lg-6 col-sm-12"><h5><?php echo $see['NextofKin']?></h5></div>
                        <div class="col-md-6 col-lg-6 col-sm-12"><h5><?php echo $see['NextofKinCellNumber']?></h5></div>
                        </div>
                    </div>
                    <div class="col-12 bg-white mt-5 px-2">
                    <nav class="navbar bg-white">
                    <div class="container-fluid">
                        <h4>Employement Info</h4>
                    </div>
                    </nav>
                        <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12"></div>
                        <div class="col-md-6 col-lg-6 col-sm-12"></div>
                        </div>
                    </div>
                    <div class="col-12 bg-white mt-5 px-2">
                    <nav class="navbar bg-white">
                    <div class="container-fluid">
                        <h4>Qualification Info</h4>
                    </div>
                    </nav>
                        <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12"></div>
                        <div class="col-md-6 col-lg-6 col-sm-12"></div>
                        </div>
                    </div>
                    <div class="col-12 bg-white mt-5 px-2">
                    <nav class="navbar bg-white">
                    <div class="container-fluid">
                        <h4>Family Info</h4>
                    </div>
                    </nav>
                        <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12"></div>
                        <div class="col-md-6 col-lg-6 col-sm-12"></div>
                        </div>
                    </div>
                    <div class="col-12 bg-white mt-5 px-2">
                    <nav class="navbar bg-white">
                    <div class="container-fluid">
                        <h4>Training Info</h4>
                    </div>
                    </nav>
                        <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12"></div>
                        <div class="col-md-6 col-lg-6 col-sm-12"></div>
                        </div>
                    </div>
                    <div class="col-12 bg-white mt-5 px-2">
                    <nav class="navbar bg-white">
                    <div class="container-fluid">
                        <h4>Promotions Info</h4>
                    </div>
                    </nav>
                        <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12"></div>
                        <div class="col-md-6 col-lg-6 col-sm-12"></div>
                        </div>
                    </div>
                    <div class="col-12 bg-white mt-5 px-2">
                    <nav class="navbar bg-white">
                    <div class="container-fluid">
                        <h4>Transfer Info</h4>
                    </div>
                    </nav>
                        <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12"></div>
                        <div class="col-md-6 col-lg-6 col-sm-12"></div>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
          </div>
        </div>
        
        </div>
      </div>
    </div>
  </div>

 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

<?php include('link/desigene/script.php')?>
</body>
</html><?php }?>