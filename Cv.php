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
<!DOCTYPE html>
<html lang="en">
<head>
   <?php include ('link/links.php')?>
</head>
<body>
<div id="main">
<?php include('link/desigene/navbar.php')?>
<div class="container-fluid m-auto p-5 bg-light">
<div class="row">
    <div class="col-md-6 col-sm-12 col-lg-6">
        <div class="row">
            <div class="col-4"><img width="150px" src="image/download.jfif" alt=""></div>
            <div class="col-8"><h4 class="fw-bold">Name</h4><h5>Designer</h5><h5 class="text-primary">gmail@email.com</h5><h5>1111 111111</h5></div>
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
           <div class="col-md-6 col-lg-6 col-sm-12"></div>
           <div class="col-md-6 col-lg-6 col-sm-12"></div>
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
</div>

</div>
    
</div>


<?php include('link/desigene/script.php')?>
</body>
</html>
<?php }?>