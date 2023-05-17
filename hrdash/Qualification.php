<?php
include('../link/desigene/db.php');

if(isset($_POST['submit']))
{
$CNIC = $_GET['updat'];
$Qualification = $_POST ['Qualification'];
$GradeDivision = $_POST ['GradeDivision'];
$Passing_Year_of_Degree = $_POST ['Passing_Year_of_Degree'];
$Last_Institute = $_POST ['Last_Institute'];
$PEC_Registration = $_POST ['PEC_Registration'];
$CV = $_FILES ['CV'];
$Institute_AddressCV = $_POST ['Institute_AddressCV'];
$Major_Subject = $_POST ['Major_Subject'];
$RemarksCV = $_POST ['RemarksCV'];
$CV_name =$CV['name'];
$CV_path = $CV['tmp_name'];
$CV_error = $CV['error'];
if($CV_error==0)
{
    $CV_save='../CV/'.$CV_name;
    // echo $CV_save;
    move_uploaded_file($CV_path, $CV_save);  
}else{
    echo '<script>alert("Picture is not uploaded Kindli update");</script>';
}
$insertquery = "INSERT INTO `$CNIC a`( `Qualification`, `GradeDivision`, `Passing_Year_of_Degree`, `Last_Institute`, `PEC_Registration`, `CV`, `Institute_AddressCV`, `Major_Subject`, `RemarksCV`) VALUES ('$Qualification','$GradeDivision','$Passing_Year_of_Degree','$Last_Institute','$PEC_Registration','$CV_name','$Institute_AddressCV','$Major_Subject','$RemarksCV')";
$query= mysqli_query($conn,$insertquery);
if ($query)
{echo '<script>alert( "Data Insertaed");</script>';
    ?>
           <script>
               location.replace('Training.php?updat=<?php echo $CNIC?>');
           </script>
    <?php
    }

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
            <div id="section3" >
                <div class="row my-4">
                  <div class="col-md-12">
                    <div class="card card-success bg-light">
                      <div style="background-color: darkblue;" class="card-header text-white fw-bold">
                        <div class="card-title">Employee Qualification</div>
                      </div>
                      <br>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>Qualification</label>
                              <input type="text" name="Qualification" id="Qualification" placeholder="Qualification" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>Grade/Division</label>
                              <input type="text" name="GradeDivision" placeholder="Grade/Division" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>Passing Year of Degree</label>
                              <input type="text" name="Passing_Year_of_Degree" id="Passing_Year_of_Degree" placeholder="Passing Year of Degree " class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>Last Institute</label>
                              <input type="text" name="Last_Institute" placeholder="Last Institute" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>PEC Registration</label>
                              <input type="text" name="PEC_Registration" placeholder="Last Institute" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="col-md-4 my-2 mt-4">
                            <div class="form-group">
                              <div class="custom-file">
                                <input type="file" name="CV" class="custom-file-input" id="CV">
                                  <label class="custom-file-label" for="customFile">CV Attachment(Optional) </label>
                                  <span id="n1" class="text-danger"></span>
                                  </div>
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>Institute Address</label>
                              <input type="text" name="Institute_AddressCV" id="Institute_Address" placeholder="Institute Address " class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>Major Subject</label>
                              <input type="text" name="Major_Subject" placeholder="Major Subject" class="form-control" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>Remarks</label>
                              <textarea name="RemarksCV" id="Remarks" class="form-control"></textarea>
                            </div>
                          </div>
                        </div>
                        <div class=" text-end">
                          <input style="background-color: darkblue;" type="button" onclick="backToSection2()" class="btn text-white shadow float-right" value="Skip" >
                          <input style="background-color: darkblue;"  type="submit" onclick="validateSection3()" class="btn text-white shadow float-right" value="Submit" >
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
        </div>
<script>
     function backToSection2() {
        <?php $CNIC = $_GET['updat'];?>
        location.replace('Training.php?updat=<?php echo $CNIC?>');
            }
</script>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

<?php include('link/desigene/script.php')?>
</body>
</html>