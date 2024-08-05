<style>
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
      <?php }?>
  </div>

  </div>                
              <a href="index.php" class="nav-link mt-3">Dashboard (MIS)</a>
              <a href="Master_entries.php" class="nav-link">
              Master entries
                </a>
              <a class="dropbtn nav-link" href="signup.php">
                 Create Employee Login
                </a>
                <a href="EXITCLEARANCEFORM.php" class="nav-link">
                  Exit clearance form
                </a>
                <a href="EXITCLEARANCEFORM copy.php" class="nav-link">
                  Exit clearance Other
                </a>
                <a href="forgitlogin.php" class="nav-link">
                  Forget Password
                </a>
</div>
