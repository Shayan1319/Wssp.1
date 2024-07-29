<style>
.report {

    width: 250px;
    position: absolute;
    background-color: #0f1286;
    overflow-x: auto;
    transition: 0.5s;
    padding-top: 10px;
    padding-bottom: 10px;
}

.report a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 10px !important;
    color: #fff;
    display: block;
    transition: 0.3s;
    background-color: #1873e8;
    margin-left: 20px;
    margin-right: 10px;
    margin-top: 10px;
    border-radius: 12px;
    font-size: large !important;
}
.report .nav-link
{
    text-decoration: none;
    color: #fff;
    display: block;
    transition: 0.3s;
    background-color: #1873e8;
    font-size: large !important;
}
.report a:hover {
    color: #000;
    background-color: #f1f1f1;
}
.report .nav-link:hover {
    color: #000;
    background-color: #f1f1f1;
}

.report .closebtn {

    margin-left: 50px;
}

#main {
    transition: margin-left .5s;
    margin-left: 250px;
}

@media screen and (max-height: 450px) {
    .report {
        padding-top: 15px;
    }
    .report a {
        font-size: 18px;
    }
}

.close {
    background-color: #1873e8;
    color: #fff;
}

.header {
    background-color: #0f1286;
}

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
<div id="myreport" class="report">
  <div class="row w-100">
  <div class="profile col-12">

    <h4>Reports</h4>
  </div>

  </div>
  <a href="new_employeeupdate copy.php">
    Payroll Backup
  </a>
  <a href="All payroll copy.php">
  Payroll Details
  </a>
  <a href="All payroll copy 2.php">
  Pay Sub-Group
  </a>
  <a href="All payroll copy 3.php">
  Bank Credit Advice
  </a>
  <a href="All payroll copy 4.php">
  Cheque Payment
  </a>
  <a href="All payroll copy 5.php">
    Department Payment
  </a>
  <a href="All payroll copy 6.php">
  EOBI Payment
  </a>

  <a href="EmployeePaySlip.php">
  Employee Pay Slip
  </a>
  <a href="All payroll copy 7.php">
  Leave Details
  </a>
  <form action="../ContractExp.php" method="POST"  target="_blank">
<a href="">
  <button type="submit" class="btn nav-link" name="Headcounts" id="Headcounts">Employees Count</button>
</a>
</form>

<form action="../ContractExp.php" method="POST"  target="_blank">
<a href="">
  <button type="submit" class="btn nav-link" name="ContractExp" id="ContractExp">Employee Contact Expiry</button>
</a>
</form>
                  
</div>
