<style>
.red-dot {
    height: 10px;
    width: 10px;
    background-color: red;
    border-radius: 50%;
    display: inline-block;
    position: absolute;
    top: 0;
    left: 0;
    transform: translate(-50%, -50%);
}
.nav-link {
    position: relative;
    padding-left: 20px; /* Adjust the padding to make space for the dot */
}


/* Existing dropdown styles */
.dropdown .dropbtn { 
  outline: none;
}

.dropdown-content {
  display: none;
  z-index: 1;
}

.dropdown-content a {
  float: none;
  display: block;
  text-align: left;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>

<div id="mySidenav" class="sidenav">
  <div class="row w-100">
    <div class="profile col-12">
      <?php 
      $emil= $_SESSION['EmployeeNumber'];
      include('../link/desigene/db.php');
      $selectsession=mysqli_query($conn,"SELECT * FROM `employeedata` WHERE `EmployeeNo`='$emil'");
      while($row=mysqli_fetch_array($selectsession)){
      ?>
      <img src="../image/<?php echo $row['image']?>" alt="">
      <h3> <?php echo $row['fName']?> <?php echo $row['lName']?></h3>
      <h4> <?php echo $row['Job_Tiltle']?></h4>
      <?php }
      $seletgart=mysqli_query($conn,"SELECT * FROM `gratuity` WHERE `CEO_Status`='accept' AND `Finance_Status` = 'pending'");
      $seletencash=mysqli_query($conn,"SELECT * FROM `encasement` WHERE `CEO_Status`='accept' AND `Finance_Status` = 'pending'");
      ?>
    </div>
  </div>                

  <a href="index.php" class="nav-link mt-3">Dashboard (MIS)</a>
  <a href="EXITCLEARANCEFORM.php" class="nav-link">
    Exit clearance form
  </a>
  <a href="employeeCountotal.php" class="nav-link">
    Employee salary
  </a>
  <a href="GratuityPending.php" class="nav-link">
    Gratuity Pending
    <?php 
    if(mysqli_num_rows($seletgart)) {
        echo '<span class="red-dot"></span>';
    }
    ?>
  </a>
  <a href="GratuityPending copy.php" class="nav-link">
    Gratuity Pending
    <?php 
    if(mysqli_num_rows($seletencash)) {
        echo '<span class="red-dot"></span>';
    }
    ?>
  </a>
  <a href="EmployeePaySlip.php" class="nav-link">
    Employee Pay slip
  </a>
</div>
