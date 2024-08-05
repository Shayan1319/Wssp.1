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
              <a href="EmployementData.php" class="nav-link">
                  Employee
                </a>
              <a class="dropbtn nav-link" href="employeePersonalInfo.php">
                  Add Employee
                </a>
                <a href="allowances_details.php" class="nav-link">
                  Allowances
                </a>
                <a href="allowancepay.php" class="nav-link">
                 Add Allowances Rate
                </a>
                <a href="employeeCountotal.php" class="nav-link">
                 Employee salaries
                </a>
                <a href="timepriod.php" class="nav-link">
                 Time Period
                </a>
                <a href="EXITCLEARANCEFORM.php" class="nav-link">
                  Exit clearance form
                </a>
                <a href="Gratuity.php">
                Gratuity & Leave Encasement
                </a>
                <a href="Leaves.php" class="nav-link">
                  Reports
                </a>

              </div>
