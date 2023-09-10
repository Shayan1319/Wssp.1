<?php
session_start();
error_reporting(0);
// links to database
include('../hrdash/link/desigene/db.php');
// if (strlen($_SESSION['loginid']==0)) {
// ?>   <script>
// location.replace('../logout.php')
// </script><?php
//   } else{
?><!DOCTYPE html>
<html lang="en">

<head>
  <?php include('link/links.php') ?>

</head>

<body>
  <div id="main">
    <?php include('link/desigene/navbar.php') ?>
    <div class="container-fluid m-auto py-5">
      <div class="row" id="emp_card">
        <div class="content">
          <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-3">
                  <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                      <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="image/image-removebg-preview.png" alt="User profile picture">
                      </div>
                      <h3 class="profile-username text-center">Sharafat Ali Khan</h3>
                      <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                          <b>Employee Id:</b> <b class="float-right">01</b>
                        </li>
                        <li class="list-group-item">
                          <b>Source:</b> <b class="float-right">WSSC</b>
                        </li>
                        <li class="list-group-item">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                              Double Duty
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                              Over Time
                            </label>
                          </div>
                        </li>
                      </ul>
                      <a href="#" class="btn btn-primary btn-block"><b>Employee Details</b></a>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                      <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="image/image-removebg-preview.png" alt="User profile picture">
                      </div>
                      <h3 class="profile-username text-center">Sharafat Ali Khan</h3>
                      <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                          <b>Employee Id:</b> <b class="float-right">01</b>
                        </li>
                        <li class="list-group-item">
                          <b>Source:</b> <b class="float-right">WSSC</b>
                        </li>
                        <li class="list-group-item">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                              Double Duty
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                              Over Time
                            </label>
                          </div>
                        </li>
                      </ul>
                      <a href="#" class="btn btn-primary btn-block"><b>Employee Details</b></a>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                      <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="image/image-removebg-preview.png" alt="User profile picture">
                      </div>
                      <h3 class="profile-username text-center">Sharafat Ali Khan</h3>
                      <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                          <b>Employee Id:</b> <b class="float-right">01</b>
                        </li>
                        <li class="list-group-item">
                          <b>Source:</b> <b class="float-right">WSSC</b>
                        </li>
                        <li class="list-group-item">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                              Double Duty
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                              Over Time
                            </label>
                          </div>
                        </li>
                      </ul>
                      <a href="#" class="btn btn-primary btn-block"><b>Employee Details</b></a>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                      <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="image/image-removebg-preview.png" alt="User profile picture">
                      </div>
                      <h3 class="profile-username text-center">Sharafat Ali Khan</h3>
                      <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                          <b>Employee Id:</b> <b class="float-right">01</b>
                        </li>
                        <li class="list-group-item">
                          <b>Source:</b> <b class="float-right">WSSC</b>
                        </li>
                        <li class="list-group-item">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                              Double Duty
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                              Over Time
                            </label>
                          </div>
                        </li>
                      </ul>
                      <a href="#" class="btn btn-primary btn-block"><b>Employee Details</b></a>
                    </div>
                  </div>
                </div>


                  
        </div>
        <?php include('link/desigene/script.php') ?>
</body>

</html>
<?php //}?>