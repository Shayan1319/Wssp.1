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
?><!DOCTYPE html>
<html lang="en">

<head>
  <?php include('payroll_links/links.php') ?>
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
    <?php include('payroll_links/desigene/navbar.php') ?>
    <div class="clearfix">&nbsp;</div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-success border border-2 border-dark bg-light">
            <div style="background-color: darkblue;" class="card-header text-white fw-bold">
              <div class="card-title text-white">Employee Pay</div>

            </div>
            <br>
            <!-- /.card-header -->
            <div class="card-body ">
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Employee No</label>
                      <input type="text" class="form-control" id="employee_no" name="employee_no">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Type</label>
                      <input type="text" class="form-control" id="type" name="type">
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Father Name</label>
                      <input type="text" class="form-control" id="father_name" name="father_name">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Job Title</label>
                      <input type="text" class="form-control" id="job_title" name="job_title">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Fund(Employer+Employe Contrib)</label>
                      <input type="text" class="form-control" id="type" name="type">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Gross Pay</label>
                      <input type="text" class="form-control" id="gross_pay" name="gross_pay">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Deduction</label>
                      <input type="text" class="form-control" id="deduction" name="deduction">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Net Pay</label>
                      <input type="text" class="form-control" id="net_pay" name="net_pay">
                    </div>
                  </div>
                  <div class="clearfix">&nbsp;</div>
                  <!-- start -->
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Earning</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Deduction</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Fund</button>
                    </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <div class="clearfix">&nbsp;</div>
                    <div class="row">
                    <div class="col-md-2">
                    <div class="form-group">
                      <label>Discription</label>
                      <input type="text" class="form-control" id="discription" name="discription">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Allowance Calc. Mode</label>
                      <select name="allowance_calc_mode" id="allowance_calc_mode" class="form-control">
                        <option value="">RUNTIME VALUE</option>
                        <option value="">PRESENT RATE</option>
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
                      <label>Rate</label>
                      <input type="text" class="form-control" id="rate" name="rate">
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
                          <th>Discription</th>
                          <th>Allowance Calc. Mode</th>
                          <th>Earning/Deduction/Fund</th>
                          <th>Rate</th>
                          <th>Amount</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                    </div>
                    </div>
                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                    <div class="row">&nbsp;</div>
                    <div class="row">
                    <div class="col-md-2">
                    <div class="form-group">
                      <label>Discription</label>
                      <input type="text" class="form-control" id="discription" name="discription">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Allowance Calc. Mode</label>
                      <select name="allowance_calc_mode" id="allowance_calc_mode" class="form-control">
                        <option value="">RUNTIME VALUE</option>
                        <option value="">PRESENT RATE</option>
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
                      <label>Rate</label>
                      <input type="text" class="form-control" id="rate" name="rate">
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
                          <th>Discription</th>
                          <th>Allowance Calc. Mode</th>
                          <th>Earning/Deduction/Fund</th>
                          <th>Rate</th>
                          <th>Amount</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                    </div>
                    </div>
                    <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                   <div class="clearfix">&nbsp;</div>
                    <div class="row">
                   <div class="col-md-2">
                    <div class="form-group">
                      <label>Discription</label>
                      <input type="text" class="form-control" id="discription" name="discription">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Allowance Calc. Mode</label>
                      <select name="allowance_calc_mode" id="allowance_calc_mode" class="form-control">
                        <option value="">RUNTIME VALUE</option>
                        <option value="">PRESENT RATE</option>
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
                      <label>Rate</label>
                      <input type="text" class="form-control" id="rate" name="rate">
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
                          <th>Discription</th>
                          <th>Allowance Calc. Mode</th>
                          <th>Earning/Deduction/Fund</th>
                          <th>Rate</th>
                          <th>Amount</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                    </div>
                    </div>
                   </div>
                  </div>

                  <!-- end -->


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

</html><?php }?>