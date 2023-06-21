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
  <?php include('link/links.php') ?>
</head>
<style>
  #fullDiv ul {
    margin: 0;
    padding: 0;
  }

  #fullDiv li {
    float: left;
    display: block;
    width: 14.2857%;
    text-align: center;
    list-style-type: none;
  }

  #fullDiv li:nth-child(n+1):nth-child(-n+7) {
    font-weight: 900;
    color: #e67e22;
  }

  #fullDiv li:nth-child(n+39),
  #fullDiv li:nth-child(n+8):nth-child(-n+16) {
    font-weight: 900;
    color: rgba(0, 0, 0, .3);
  }

  #fullDiv li:hover:nth-child(n+8):nth-child(-n+38),
  #fullDiv li:nth-child(17) {
    border-radius: 5px;
    background-color: #1abc9c;
    color: #ecf0f1;
  }

  .form-group label {
    font-weight: bold;
  }

  /* width */
  ::-webkit-scrollbar {
    width: 20px;
  }

  /* Track */
  ::-webkit-scrollbar-track {
    box-shadow: inset 0 0 5px grey;
    border-radius: 10px;
  }

  /* Handle */
  ::-webkit-scrollbar-thumb {
    background: red;
    border-radius: 10px;
  }

  /* Handle on hover */
  ::-webkit-scrollbar-thumb:hover {
    background: #b30000;
  }

  button {
    background-color: darkblue !important;
    color: white !important;
  
  }
</style>

<body>
  <div id="main">
    <?php include('link/desigene/navbar.php') ?>
    <div class="clearfix">&nbsp;</div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-success border border-2 border-dark bg-light">
            <div style="background-color: darkblue;" class="card-header text-white fw-bold">
              <div class="card-title text-white">Allowances Details</div>

            </div>
            <br>
            <!-- /.card-header -->
            <div class="card-body ">
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                <div class="row mt-2">
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Employee Type</label>
                      <input type="text" class="form-control" id="employee_no" name="employee_no">
                    </div>
                  </div>
                    <div class="clearfix">&nbsp;</div>
                    <div class="row">
                    <div class="col-md-2">
                    <div class="form-group">
                      <label>Allowance</label>
                      <input type="text" class="form-control" id="discription" name="discription">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Fin Classification</label>
                      <select name="fin_classification" id="fin_classification" class="form-control">
                        <option value="">GROSS PAY</option>
                        <option value="">LOAN-EE</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Rate Calc. Mode</label>
                      <select name="rate_calc_mode" id="rate_calc_mode" class="form-control">
                        <option value="">PRESENT RATE</option>
                        <option value="">RUNTIME VALUE</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Earning/Deduction/Fund</label>
                      <select name="earning_deduction_fund" id="earning_deduction_fund" class="form-control">
                        <option value="">Earning</option>
                        <option value="">Deduction</option>
                        <option value="">Fund</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Allowance Status</label>
                      <select name="allowance_status" id="allowance_status" class="form-control">
                        <option value="">Select Status</option>
                        <option value="">Active</option>
                      </select>
                    </div>
                  </div>
                  
                  <div class="col-md-2">
                    <div class="form-group">
                      <div class="clearfix">&nbsp;</div>
                      <button type="button" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                    </div>
                  </div>
                  <div class="clearfix">&nbsp;</div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
                    <table id="employee_pay" class="table table-bordered">
                      <thead>
                        <tr>
                          <th>S.No</th>
                          <th>Allowance</th>
                          <th>Fin Classification</th>
                          <th>Rate Calc. Mode</th>
                          <th>Earning/Deduction/Fund?</th>
                          <th>Allowance Status</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                    </div>
                </div>
                </div>
              </form>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- Col-12 -->
    </div>
  </div>
  <div class="clearfix">&nbsp;</div>
  <div class="clearfix">&nbsp;</div>
  <?php include('link/desigene/script.php') ?>
  <script>
    const triggerTabList = document.querySelectorAll('#myTab button')
    triggerTabList.forEach(triggerEl => {
      const tabTrigger = new bootstrap.Tab(triggerEl)

      triggerEl.addEventListener('click', event => {
        event.preventDefault()
        tabTrigger.show()
      })
    })

    // const triggerEl = document.querySelector('#myTab button[data-bs-target="#profile"]')
    // bootstrap.Tab.getInstance(triggerEl).show() // Select tab by name

    // const triggerFirstTabEl = document.querySelector('#myTab li:first-child button')
    // bootstrap.Tab.getInstance(triggerFirstTabEl).show() // Select first tab
  </script>
</body>

</html><?php
  }
?>