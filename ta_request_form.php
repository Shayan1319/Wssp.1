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
              <div class="card-title text-white">TA REQUEST FORM</div>
            </div>
            <br>
            <!-- /.card-header -->
            <div class="card-body ">
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Employee ID</label>
                      <input type="text" class="form-control" id="employee_no" name="employee_no" placeholder="Employee ID">
                    </div>
                  </div>
                 
                  <div class="col-4">
                    <div class="form-group">
                      <label>Employee Name</label>
                      <input type="text" name="name" id="name" placeholder="Employee Name" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>

                  <div class="col-4">
                    <div class="form-group">
                      <label>Employee Father Name</label>
                      <input type="text" name="father_name" id="father_name" placeholder="Employee Father Name" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>

                  <div class="col-4">
                    <div class="form-group">
                      <label>Employee Source</label>
                      <input type="text" name="employee_source" id="employee_source" placeholder="Employee Source" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>

                  <div class="col-4">
                    <div class="form-group">
                      <label>Travel Start Time</label>
                      <input type="text" name="travel_start_time" id="travel_start_time" placeholder="Travel Start Time" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Travel End Time</label>
                      <input type="text" name="travel_start_time" id="travel_start_time" placeholder="Travel End Time" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Destination</label>
                      <input type="text" name="destination" id="destination" placeholder="Destination" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Purpose Of Travel</label>
                      <input type="text" name="purpose_of_travel" id="purpose_of_travel" placeholder="Purpose Of Travel" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Mode Of Transportation</label>
                      <input type="text" name="mode_of_transportation" id="mode_of_transportation" placeholder="Mode Of Transportation" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Expected Return Date</label>
                      <input type="text" name="expected_return_date" id="expected_return_date" placeholder="Expected Return Date" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Accommodation Details</label>
                      <input type="text" name="accommodation_details" id="accommodation_details" placeholder="Accommodation Details" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Travel Expenses</label>
                      <input type="text" name="travel_expenses" id="travel_expenses" placeholder="Travel Expenses" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Comments</label>
                      <input type="text" name="comments" id="comments" placeholder="Comments" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Attach Supporting Documents</label>
                      <input type="file" name="attach_supporting_documents" id="attach_supporting_documents" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <div class="clearfix">&nbsp;</div>
                      <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
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
  </div>
  <div class="clearfix">&nbsp;</div>
  <div class="clearfix">&nbsp;</div>
  <?php include('link/desigene/script.php') ?>
</body>

</html>