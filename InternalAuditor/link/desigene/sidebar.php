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
      $empid= $_SESSION['EmployeeNumber'];
      $select=mysqli_query($conn,"SELECT * FROM `employeedata` WHERE `EmployeeNo`='$empid'");
      while($row=mysqli_fetch_array($select)){
      ?>
      <img src="../image/<?php echo $row['image']?>" alt="">
      <h3> <?php echo $row['fName']?> <?php echo $row['lName']?></h3>
      <h4> <?php echo $row['Job_Tiltle']?></h4>
      <?php }?>
    </div>
  </div>                
   <a href="index.php" class="nav-link mt-3">Dashboard (MIS)</a>
   <a href="employeeCountotal.php" class="nav-link">
   Employee salary
   </a>
   <a href="EmployeePaySlip.php" class="nav-link">
   Employee Pay slip
   </a>
</div>
