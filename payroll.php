<?php 
include('../link/desigene/db.php');
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
  button, #payroll_print {
    background-color: darkblue !important;
  }
  .form-group, .form-check{
    margin-top: 10px;
  }
  #payroll_print {
    font-size: 24px;
  }
</style>

<body>
  <div id="main">
    <?php include('payroll/link/desigene/navbar.php') ?>
    <div class="clearfix">&nbsp;</div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-success border border-2 border-dark bg-light">
            <div style="background-color: darkblue;" class="card-header text-white fw-bold">
              <div class="card-title text-white">Employee Details</div>
            </div>
            <br>
            <!-- /.card-header -->
            <div class="card-body ">
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Employee No</label>
                      <input type="text" class="form-control" id="employee_no" name="employee_no">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="clearfix">&nbsp;</div>
                      <button type="button" class="btn btn-primary">search</button>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" name="name" id="name" placeholder="Name" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>

                  <div class="col-4">
                    <div class="form-group">
                      <label>Father Name</label>
                      <input type="text" name="father_name" id="father_name" placeholder="Father Name" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>

                  <div class="col-4">
                    <div class="form-group">
                      <label>CNIC</label>
                      <input type="text" name="cnic" id="cnic" placeholder="cnic" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>

                  <div class="col-4">
                    <div class="form-group">
                      <label>Date Of Birth</label>
                      <input type="text" name="date_of_birth" id="date_of_birth" placeholder="Date Of Birth" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Gender</label>
                      <input type="text" name="gender" id="gender" placeholder="Gender" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Marital Status</label>
                      <input type="text" name="matrial_status" id="matrial_status" placeholder="Marital Status" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Type</label>
                      <input type="text" name="type" id="type" placeholder="Type" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Job Title</label>
                      <input type="text" name="job_title" id="job_title" placeholder="Job Title" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Domecile</label>
                      <input type="text" name="domecile" id="domecile" placeholder="Domecile" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Blood Group</label>
                      <input type="text" name="blood_group" id="blood_group" placeholder="Blood Group" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Status</label>
                      <input type="text" name="status" id="status" placeholder="Status" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  
                </div>
              </form>
              <div class="clearfix">&nbsp;</div>
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
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">

        <div class="card card-success">
          <div class="card card-success border border-2 border-dark bg-light">
            <div style="background-color: darkblue;" class="card-header  text-white fw-bold">
              <div class="card-title">Employee Contect Details</div>
            </div>
            <!-- /.card-header -->
            <div class="card-body bg-light">
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-4">
                    <div class="form-group">
                      <label>Address Line</label>
                      <input type="text" name="address_line" id="address_line" placeholder="Address Line" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Official Email</label>
                      <input type="text" name="official_email" id="official_email" placeholder="Official Email" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Personal Email</label>
                      <input type="text" name="personal_email" id="personal_email" placeholder="Personal Email" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Contect Person</label>
                      <input type="text" name="contect_person" id="contect_person" placeholder="Contect Person" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Next Of Kin</label>
                      <input type="text" name="next_of_kin" id="next_of_kin" placeholder="Next Of Kin" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Cell No</label>
                      <input type="text" name="cell_no" id="cell_no" placeholder="Cell No" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Phone No</label>
                      <input type="text" name="phone_no" id="phone_no" placeholder="Phone No" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Contect Person Cell No</label>
                      <input type="text" name="contect_person_cell_no" id="contect_person_cell_no" placeholder="Contect Person Cell No" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                </div>
              </form>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <div class="clearfix">&nbsp;</div>
        <div class="card card-success">
          <div class="card card-success border border-2 border-dark bg-light">
            <div style="background-color: darkblue;" class="card-header  text-white fw-bold">
              <div class="card-title">Employment Details</div>
            </div>
            <!-- /.card-header -->
            <div class="card-body bg-light">
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-4">
                    <div class="form-group">
                      <label>Joining Date</label>
                      <input type="text" name="joining_date" id="joining_date" placeholder="Joining Date" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Employment Type</label>
                      <input type="text" name="employment_type" id="employment_type" placeholder="Employment Type" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Department</label>
                      <input type="text" name="department" id="department" placeholder="Department" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Contrect Expire Date</label>
                      <input type="text" name="contrect_expire_date" id="contrect_expire_date" placeholder="Contrect Expire Date" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Fild Attendence</label>
                      <input type="text" name="fild_attendence" id="fild_attendence" placeholder="Fild Attendence" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Repatriate Date</label>
                      <input type="text" name="repatriate_date" id="repatriate_date" placeholder="Repatriate Date" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Job Title</label>
                      <input type="text" name="job_title" id="job_title" placeholder="Job Title" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Grade</label>
                      <input type="text" name="grade" id="grade" placeholder="Grade" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Duty Location</label>
                      <input type="text" name="duty_location" id="duty_location" placeholder="Duty Location" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Duty Point</label>
                      <input type="text" name="duty_point" id="duty_point" placeholder="Duty Point" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Employment Quota</label>
                      <input type="text" name="employment_quota" id="employment_quota" placeholder="Employment Quota" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Employee Manager</label>
                      <input type="text" name="employee_manager" id="employee_manager" placeholder="Employee Manager" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                </div>
              </form>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <div class="clearfix">&nbsp;</div>
        <div class="card card-success">
          <div class="card card-success border border-2 border-dark bg-light">
            <div style="background-color: darkblue;" class="card-header  text-white fw-bold">
              <div class="card-title">Salary Imbursement</div>
            </div>
            <!-- /.card-header -->
            <div class="card-body bg-light">
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-3">
                    <div class="form-group">
                      <label>Payment Mode</label>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-check">
                      <input type="radio" class="form-check-input" id="radio1" name="radio1" value="option1">
                      <label class="form-check-label" for="radio1">Bank Transfer</label>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-check">
                      <input type="radio" class="form-check-input" id="radio2" name="radio2" value="option2">
                      <label class="form-check-label" for="radio1">Cross Cheque</label>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-check">
                      <input type="radio" class="form-check-input" id="radio3" name="radio3" value="option3">
                      <label class="form-check-label" for="radio1">Cash Payment</label>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Employee Pay Group </label>
                      <input type="text" name="" placeholder="Employee Pay Group" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Employee Pay Sub Group </label>
                      <input type="text" name="" placeholder="Employee Pay Sub Group" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Employee Pay Classification</label>
                      <input type="text" name="employee_pay_classification" id="employee_pay_classification" placeholder="Employee Pay Classification" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Salary Bank</label>
                      <select name="salary_bank" id="salary_bank" class="form-control">
                        <option value="">Select Salary Bank</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Salary Branch</label>
                      <input type="text" name="salary_branch" id="salary_branch" placeholder="Salary Branch" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Account No</label>
                      <input type="text" name="account_no" id="account_no" placeholder="Account No" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Pay Type</label>
                      <input type="text" name="pay_type" id="pay_type" placeholder="Pay Type" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>EOBI No</label>
                      <input type="text" name="eobi_no" id="eobi_no" placeholder="EOBI No" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Bill Walved Off</label>
                      <input type="text" name="bill_walved_off" id="bill_walved_off" placeholder="Bill Walved Off" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Weekly Working Days</label>
                      <select name="salary_bank" id="salary_bank" class="form-control">
                        <option value="">Select Working Days</option>
                        <option value="">6-Days Week</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Bill Waived Off</label>
                      <input type="text" name="bill_walved_off" id="bill_walved_off" placeholder="Bill Walved Off" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Remarks</label>
                      <textarea class="form-control"></textarea>
                    </div>
                  </div>
                </div>
              </form>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <div class="clearfix">&nbsp;</div>
        <div class="card card-success">
          <div class="card card-success border border-2 border-dark bg-light">
            <div style="background-color: darkblue;" class="card-header  text-white fw-bold">
              <div class="card-title">Employe Pay</div>
            </div>
            <!-- /.card-header -->
            <div class="card-body bg-light">
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Fund(Employer+Employe Contrib)</label>
                      <input type="text" class="form-control" id="type" name="type">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Gross Pay</label>
                      <input type="text" class="form-control" id="gross_pay" name="gross_pay">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Deduction</label>
                      <input type="text" class="form-control" id="deduction" name="deduction">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Net Pay</label>
                      <input type="text" class="form-control" id="net_pay" name="net_pay">
                    </div>
                  </div>
                </div>
              </form>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <div class="clearfix">&nbsp;</div>
        <div class="card card-success">
          <div class="card card-success border border-2 border-dark bg-light">
            <div style="background-color: darkblue;" class="card-header  text-white fw-bold">
              <div class="card-title">Earning/Deduction/Fund</div>
            </div>
            <!-- /.card-header -->
            <div class="card-body bg-light">
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
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
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Rate</label>
                      <input type="text" class="form-control" id="rate" name="rate">
                    </div>
                  </div>
                  <div class="col-md-1">
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
                  <div class="col-md-1">
                    <div class="form-group">
                      <div class="clearfix">&nbsp;</div>
                      <a href="print_payroll.php">
                        <i class="btn btn-primary fa fa-print" id="payroll_print"></i>
                      </a>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="form-group">
                      <div class="clearfix">&nbsp;</div>
                      <button type="button" class="btn btn-primary">Save</button>
                    </div>
                  </div>
                    </div>
                    </div>
                </div>
              </form>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- Col-12 -->
      </div>
      <!-- row -->
    </div>
  </div>
  <div class="clearfix">&nbsp;</div>
  <div class="clearfix">&nbsp;</div>
  <?php include('link/desigene/script.php') ?>
</body>

</html>