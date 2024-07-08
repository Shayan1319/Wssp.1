<style>
.links:hover {
    color: #000 !important;
    background-color: #f1f1f1;
}
</style>
<nav id="header" class="navbar header">
    <div class="row w-100">
        <div class="col-md-3 col-lg-2 col-sm-12 mx-auto">
            <img class="float-end" src="../image/1662096718940.jpg" width="180px" alt="">
        </div>
        <div class="col-md-6 col-sm-12 col-lg-8 mx-auto">
        <h4 class="text-white text-center m-5" style="text-shadow: 0px 6px 15px #111;">HRMIS WSSC SWAT </h4>
        </div>
        <div class="col-md-3 col-lg-2 col-sm-12 mx-auto">
            <img src="../image/image-removebg-preview.png" width="128px" alt="">
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-lg bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand text-light" href="index.php">Dashbord</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav w-100">
        
     
        <li class="nav-item dropdown">
          <a class="nav-link text-center rounded-pill active text-light m-auto links dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Payroll
          </a>
          <ul class=" dropdown-menu">
            <li><a class="dropdown-item" href="payroll.php">Payroll</a></li>
            <li><a class="dropdown-item" href="new_employeeupdate copy.php">All Payroll</a></li>
          </ul>
        </li>
        <li class="nav-item w-100">
          <a class="nav-link text-center rounded-pill active text-light  m-auto links" href="employeeCountotal.php">Attendance</a>
        </li> 
        <li class="nav-item w-100">
        <a class="nav-link text-center rounded-pill active text-light  m-auto links" href="timepriod.php">Time Priod</a>
        </li>
        <li class="nav-item w-100">
        <a class="nav-link text-center rounded-pill active text-light m-auto links" href="holyday.php">Holyday</a>
        </li>    
        <li class="nav-item dropdown">
          <a class="nav-link text-center rounded-pill active text-light m-auto links dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Monthly payroll
          </a>
          <ul class=" dropdown-menu">
            <li><a class="dropdown-item" href="payrollgen.php">Salary of employee</a></li>
            <li><a class="dropdown-item" href="payrollgen copy.php">Salary in process</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="payrollgen copy 2.php">Salary rejected</a></li>
          </ul>
        </li>
        <li class="nav-item w-100">
        <a class="nav-link text-center rounded-pill active text-light  m-auto links" href="EmployeePaySlip.php">Employee Pay Slip</a>
        </li>   
        <li class="nav-item w-100">
        <a class="nav-link text-center rounded-pill active text-light  m-auto links" href="All payroll.php">All Payroll</a>
        </li> 
        <div class="dropstart">
            <button type="button" class="btn text-white" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-ellipsis-vertical"></i>
            </button>
            <ul class="dropdown-menu">
              <?php 
              $id = $_SESSION['EmployeeNumber'];
              $insert = mysqli_query($conn,"SELECT * FROM `employeedata` WHERE `EmployeeNo`='$id'");
              while($row = mysqli_fetch_array($insert)){
              ?>
              <li><a class="dropdown-item" href="profile.php?updat=<?php echo $row['CNIC']?>">See Profile</a></li>
              <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
              <?php }?>
            </ul>
          </div>       
      </ul>
    </div>
  </div>
</nav>