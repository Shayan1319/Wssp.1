<nav class="navbar header">
  <div class="row w-100">
    <div class="col-md-3 col-lg-2 col-sm-12 mx-auto">
      <img src="../image/1662096718940.jpg" width="180px" alt="">
    </div>
    <div class="col-md-6 col-sm-12 col-lg-8 mx-auto">
      <h4 class="text-white text-center m-5" style="text-shadow: 0px 6px 15px #111;">WSSC SWAT HRMIS</h4>
    </div>
    <div class="col-md-3 col-lg-2 col-sm-12 mx-auto">
      <img src="../image/image-removebg-preview.png" width="128px" alt="">
    </div>
  </div>
</nav>
<nav class="navbar header">
  <div class="row w-100">
    <div class="col-lg-11 col-md-11 col-sm-12"></div>
      <div class="col-lg-1 col-md-1 col-sm-12">
        <div class="dropstart">
            <button type="button" class="btn text-white" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-ellipsis-vertical"></i>
            </button>
            <ul class="dropdown-menu">
              <?php 
include('../link/desigene/db.php');

              $id = $_SESSION['EmployeeNumber'];
              $insert = mysqli_query($conn,"SELECT * FROM `employeedata` WHERE `EmployeeNo`='$id'");
              while($row = mysqli_fetch_array($insert)){
              ?>
              <li><a class="dropdown-item" href="profile.php?updat=<?php echo $row['CNIC']?>">See Profile</a></li>
              <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
              <?php }?>
            </ul>
          </div>
    </div>
  </div>
</nav>