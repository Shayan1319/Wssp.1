<!DOCTYPE html>
<html lang="en">
<head>
   <?php include ('link/links.php')?>
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
</style>
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
                <div class="col-4 my-2">
                  <div class="form-group">
                    <label>Employee No </label>
                    <input type="text" name="" placeholder="Employee No" class="form-control" autocomplete="off" required="">
                  </div>
                </div>
                <div class="col-4 my-2">
                  <div class="form-group">
                    <label>Employee Name</label>
                    <input type="text" name="" placeholder="Name" class="form-control" autocomplete="off" required="">
                  </div>
                </div>
                <div class="col-4 my-2">
                  <div class="form-group">
                    <label>Father Name</label>
                    <input type="text" name="" placeholder="Fasther Name" class="form-control" autocomplete="off" required="">
                  </div>
                </div>
                <div class="col-4 my-2">
                  <div class="form-group">
                    <label>Employee ID</label>
                    <input type="text" name="" placeholder="Employee Id" class="form-control" autocomplete="off" required="">
                  </div>
                </div>
                <div class="col-4 my-2">
                  <div class="form-group">
                    <label>Duty Location</label>
                    <input type="text" name="" placeholder="Duty Location" class="form-control" autocomplete="off" required="">
                  </div>
                </div>
                <div class="col-4 my-2">
                  <div class="form-group">
                    <label>Designation</label>
                    <input type="text" name="" placeholder="Designation" class="form-control" autocomplete="off" required="">
                  </div>
                </div>
                <div class="col-4 my-2">
                  <div class="form-group">
                    <label for="">Employee Class</label>
                    <select class="form-control select2" name="" id="">
                      <option value="Null" selected>Select</option>
                      <option value="WSSP">WSSP</option>
                      <option value="TMA">TMA</option>
                    </select>
                  </div>
                </div>
                <div class="col-8 my-2">
                  <div class="form-group">
                    <h5 class="text-center fw-bold" style="font-size: 16px;" for="">Contact address while on leave</h5>
                    <textarea name="" style="width:100%;height:30px;" id="" cols="30" rows="10"></textarea>
                  </div>
                </div>
                <div class="col-4 my-2">
                  <div class="form-group">
                    <label>Phone number while on leave</label>
                    <input type="text" name="" placeholder="Mobile No" class="form-control" autocomplete="off" required="">
                  </div>
                </div>
                <div class="col-4 my-2">
                  <div class="form-group">
                    <label>Leave Type</label>
                    <select class="form-control select2" name="" id="">
                      <option value="null" selected>Select Leave Type</option>
                      <option value="Annual">Annual</option>
                      <option value="Sick">Sick</option>
                      <option value="Maternity">Maternity</option>
                      <option value="Paternity">Paternity</option>
                      <option value="Casual">Casual</option>
                      <option value="Compassionate">Compassionate</option>
                      <option value="Without Pay">Without Pay</option>
                    </select>
                  </div>
                </div>
                <div class="col-4 my-2">
                  <div class="form-group">
                    <label>Leave From</label>
                    <input type="date" name="" placeholder="Leave From" class="form-control" autocomplete="off" required="">
                  </div>
                </div>
                <div class="col-4 my-2">
                  <div class="form-group">
                    <label>Leave To</label>
                    <input type="date" name="" placeholder="Leave To" class="form-control" autocomplete="off" required="">
                  </div>
                </div>
                <div class="col-4 my-2">
                  <div class="form-group">
                    <label>Total Number of Days</label>
                    <input type="text" name="" placeholder="Total Number of Days" class="form-control" autocomplete="off" required="">
                  </div>
                </div>
                <div class="col-4 my-2">
                  <div class="form-group">
                    <label>Leaves Already Availed</label>
                    <input type="text" name="" placeholder="Leaves Already Availed" class="form-control" autocomplete="off" required="">
                  </div>
                </div>
                <div class="col-4 my-2">
                  <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control"></textarea>
                  </div>
                </div>          
                <div class="col-md-12 text-end mt-2">
                  <input style="background-color: darkblue;" type="submit" class="btn text-white float-right shadow" value="submit" name="saveUser1">
                </div>
              </div>
            </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- Col-12 -->
  </div>
</div>
<?php include('link/desigene/script.php')?>
</body>
</html>