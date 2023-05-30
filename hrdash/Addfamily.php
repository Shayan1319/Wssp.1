<?php
session_start();
error_reporting(0);
// links to database
include '../link/desigene/db.php';
if ($_SESSION['loginid'] == 0) {
?>   
    <script>
        location.replace('../logout.php')
    </script>
<?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <?php include ('link/links.php')?>
</head>
<body>
    <?php include ('link/desigene/sidebar.php')?>
  <div id="main">
    <?php include('link/desigene/navbar.php')?>
    <div class="container-fluid py-5">
      <div class="row">
        <div class="col-lg-12">
          <div class="card card2 text-center bg-light">
            <div style="background-color: darkblue;" class="card-header ">
              <div class="card-title text-white">Employee Family Information</div>
            </div>
            <div class="container">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">CNIC</th>
                        <th scope="col">Employee NO</th>
                        <th scope="col">Employee Manager</th>
                        <th scope="col">Number of Wife</th>
                        <th scope="col">Add Wife</th>
                        <th scope="col">See Profile</th>
                        <th scope="col">Update Profile</th>
                        <th scope="col">Delete Profile</th>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">1</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><a href="seewife.php"><i class="bi bi-people-fill"></i></a></td>
                        <td><a href="famly.php"><i class="bi bi-person-add"></i></a></td>
                        <td><a href="profile.php"><i class="fa-solid fa-eye"></i></a></td>
                        <td><a href=""><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td><a href=""><i class="fa-solid fa-trash"></i></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
      </div>
    </div>
  </div>

 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

<?php include('link/desigene/script.php')?>
</body>
</html>