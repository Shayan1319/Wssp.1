<!DOCTYPE html>
<html lang="en">
<head>
   <?php include ('link/links.php')?>
</head>
<body>
  <div id="main">
    <?php include('link/desigene/navbar.php')?>
    <div class="container-fluid m-auto py-5">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="card card-success">
            <div style="background-color: darkblue;" class="card-header  text-white fw-bold">
              <div class="card-title">Leave Request</div>
            </div>
            <!-- /.card-header -->
            <div class="card-body bg-light">
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-4">
                    <div class="form-group">
                      <label>Employee No </label>
                      <input type="text" name="" placeholder="Employee No" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>

                  <div class="col-4">
                    <div class="form-group">
                      <label>Name </label>
                      <input type="text" name="" placeholder="Name" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Request No</label>
                      <input type="text" name="" placeholder="Request No" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>  
                  <div class="col-4">
                    <div class="form-group">
                      <label>Request Date</label>
                      <input type="date" name="" placeholder="Request Date" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>From City</label>
                      <input type="text" name="" placeholder="From City" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>To City</label>
                      <input type="text" name="" placeholder="To City" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Departure ON</label>
                      <input type="date" name="" placeholder="Departure ON" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Return Date</label>
                      <input type="date" name="" placeholder="" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Travel Mode</label>
                      <input type="text" name="" placeholder="Travel Mode" class="form-control" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Justification</label>
                      <textarea class="form-control"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12 text-end mt-2">
                    <input style="background-color: darkblue;" type="submit" class="btn text-white float-right shadow" value="Submit" name="saveUser1">
                  </div>
                </div>
              </form>
              <div class="row my-3">
                <div class="col-12">
                  <table class="table">
                    <thead class="text-white" style="background-color: darkblue;">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col" colspan="4">Travel Description</th>
                        <th scope="col">Req,Status</th>
                        <th scope="col">Bill Status</th>
                        <th scope="col">Add TA Bill</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td></td>
                        <td colspan="4"></td>
                        <td></td>
                        <td></td>
                        <td><a href="Tabil.php"><i class="fa-solid fa-file-invoice-dollar"></i></a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
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
  <?php include('link/desigene/script.php')?>
</body>
</html>