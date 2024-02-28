<?php
session_start();
error_reporting(0);

include('link/desigene/db.php');
if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber']) || $_SESSION['Designation'] != 'HR manager') {
  // Log the unauthorized access attempt for auditing purposes
  error_log("Unauthorized access attempt. User: {$_SESSION['loginid']}");
  
  // Redirect to the logout page
  header("Location: ../logout.php");
  exit; // Ensure that the script stops execution after the header redirection
} else{
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include ('link/links.php')?>
  </head>
  <body>
      <?php include ('link/desigene/sidebar.php')?>
    <div id="main">
      <?php
      $CNIC = $_GET['updat'];
      $select = mysqli_query($conn,"SELECT * FROM `employeedata` WHERE `EmployeeNo` ='$CNIC' ");
      while($see=mysqli_fetch_array($select)){
        ?>
        <script>
          let id =<?php echo $see['Id']?>
        </script>
        <?php
      ?>
      <div class="container-fluid m-auto p-5 bg-light">
        <div class="row">
          <div class="col-md-6 col-sm-12 col-lg-6">
            <div class="row">
              <div class="col-4">
                <img src="../image/<?php echo $see ['image'] ?>" alt="" width="150px">
              </div>
              <div class="col-8">
                <h4 class="fw-bold"><?php echo $see ['fName'];?> <?php echo $see ['mName'];?> <?php echo $see ['lName']?></h4>
                <h5><?php echo $see ['ContactPerson']?></h5>
                <h5 class="text-primary"><?php echo $see ['email']?></h5>
                <h5><?php echo $see ['ofphNumber']?></h5>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-12 col-lg-6">
            <div class="float-end bg-white">
              <div class="card" style="width: 18rem;">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Action</li>
                </ul>
                <div class="card-footer">
                  <a href="#" class="btn btn-primary">Edit</a>
                </div>
              </div>
            </div>
          </div>
        <br>
        <hr>
        <div class="col-12 bg-white mt-5 px-2">
          <nav class="navbar bg-white">
            <div class="container-fluid">
              <h4>Basic Information</h4>
            </div>
          </nav>
          <div class="row mt-5 p-3">
            <div class="col-md-4 my-2">
              <div class="form-group">
                            <label>First Name</label>
                            <h5><?php echo $see ['fName'] ?></h5>
                          </div>
                        </div>
                        <div class="col-md-4 my-2">
                        <div class="form-group">
                          <label>Middle Name</label>
                          <h5><?php echo $see ['mName'] ?></h5>
                        </div>
                      </div>
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                            <label>Last Name</label>
                            <h5><?php echo $see ['lName'] ?></h5>
                          </div>
                        </div> 
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                            <label>Father Name</label>
                            <h5><?php echo $see ['father_Name'] ?></h5>
                          </div>
                        </div> 
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                            <label>CNIC</label>
                            <h5><?php echo $see ['CNIC'] ?></h5>
                          </div>
                        </div>
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                            <label>Email address</label>
                            <h5><?php echo $see ['email'] ?></h5>
                          </div>
                        </div>
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                            <label>Permenent Address</label>
                            <h5><?php echo $see ['pAddress'] ?></h5>
                          </div>
                        </div>
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                            <label>Current Address</label>
                            <h5><?php echo $see ['cAddress'] ?></h5>
                          </div>
                        </div>
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                            <label>City</label>
                            <h5><?php echo $see ['city'] ?></h5>
                          </div>
                        </div>
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                            <label>Postal Address</label>
                            <h5><?php echo $see ['postAddress'] ?></h5>
                          </div>
                        </div>
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                            <label>Mobile Number</label>
                            <h5><?php echo $see ['mNumber'] ?></h5>
                          </div>
                        </div>
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                            <label>Office Phone Number</label>
                            <h5><?php echo $see ['ofphNumber'] ?></h5>
                          </div>
                        </div>
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                            <label>Alternate Number</label>
                            <h5><?php echo $see ['Alternate_Number'] ?></h5>
                          </div>
                        </div>
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                            <label>Date of Birth</label>
                            <h5><?php echo $see ['DofB'] ?></h5>
                          </div>
                        </div>
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                            <label>Religion</label>
                            <h5><?php echo $see ['religion'] ?></h5>
                          </div>
                        </div>
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                            <label>Gender</label>
                            <h5><?php echo $see ['gender'] ?></h5>
                          </div>
                        </div>
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                            <label>Blood Group</label>
                            <h5><?php echo $see ['BlGroup'] ?></h5>
                          </div>
                        </div>
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                            <label>Domicile</label>
                            <h5><?php echo $see ['Domicile'] ?></h5>
                          </div>
                        </div>
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                            <label>Marital Status </label>
                            <h5><?php echo $see ['MaritalStatus'] ?></h5>
                          </div>
                        </div>
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                            <label>Next of Kin</label>
                            <h5><?php echo $see ['NextofKin'] ?></h5>
                          </div>
                        </div>
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                            <label>Next of Kin Cell Number</label>
                            <h5><?php echo $see ['NextofKinCellNumber'] ?></h5>
                          </div>
                        </div>                   
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                            <label>Contact Person</label>
                            <h5><?php echo $see ['ContactPerson'] ?></h5>
                          </div>
                        </div>                    
                        <div class="col-md-4 my-2">
                          <div class="form-group">
                            <label>Contact Person Cell Number</label>
                          <h5><?php echo $see ['CPCN'] ?></h5>
                          </div>
                        </div>
                    </div>
        </div>
            <div class="col-12 bg-white mt-5 px-2">
                <nav class="navbar bg-white">
                  <div class="container-fluid">
                      <h4>Employement Information</h4>
                  </div>
                </nav>
                <div class="row">
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Employement Group</label>
                                    <h5><?php echo $see ['Employement_Group'] ?></h5>
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Employee Class</label>
                                    <h5><?php echo $see ['Employee_Class'] ?></h5>
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Employee Sub Group</label>
                                    <h5><?php echo $see ['Employee_Group'] ?></h5>
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Employee Sub Group</label>
                                    <h5><?php echo $see ['Employee_Sub_Group'] ?></h5>
                                  
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Employee Quota</label>
                                    <h5><?php echo $see ['Employee_Quota'] ?></h5>
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Grade</label>
                                    <h5><?php echo $see ['Grade'] ?></h5>
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Department</label>
                                    <h5><?php echo $see ['Department'] ?></h5>
                                </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Job Tiltle</label>
                                    <h5><?php echo $see ['Job_Tiltle'] ?></h5>
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Salary Mode</label>
                                    <h5><?php echo $see ['Salary_Mode'] ?></h5>
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Status</label>
                                    <h5><?php echo $see ['Status'] ?></h5>
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Employee NO</label>
                                    <h5><?php echo $see ['EmployeeNo'] ?></h5>
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Employee Manager</label>
                                    <h5><?php echo $see ['Employee_Manager'] ?></h5>
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Employee Manager</label>
                                    <h5><?php echo $see ['Employee_Manager'] ?></h5>
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Joining Date</label>
                                    <h5><?php echo $see ['Joining_Date'] ?></h5>
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Contract Expiry Date</label>
                                    <h5><?php echo $see ['Contract_Expiry_Date'] ?></h5>
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Last Working Date</label>
                                    <h5><?php echo $see ['Last_Working_Date'] ?></h5>
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Attendance Supervisor</label>
                                    <h5><?php echo $see ['Attendance_Supervisor'] ?></h5>
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Duty Location</label>
                                    <h5><?php echo $see ['Duty_Location'] ?></h5>
                                  </div>
                                </div>
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Duty Point</label>
                                    <h5><?php echo $see ['Duty_Point'] ?></h5>
                                  </div>
                                </div>
                   </div>
              </div>
      
              <!-- <div class="col-12 bg-white mt-5 px-2"> 
              <nav class="navbar bg-white">
              <div class="container-fluid">
                  <h4>Qualification Info</h4>
              </div>
              </nav>
                  <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12"></div>
                    <div class="col-md-6 col-lg-6 col-sm-12"></div>
                  </div>
              </div>-->
              <!-- <div class="col-12 bg-white mt-5 px-2">
              <nav class="navbar bg-white">
              <div class="container-fluid">
                  <h4>Family Info</h4>
              </div>
              </nav>
                  <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12"></div>
                    <div class="col-md-6 col-lg-6 col-sm-12"></div>
                  </div>
              </div>
              <div class="col-12 bg-white mt-5 px-2">
              <nav class="navbar bg-white">
              <div class="container-fluid">
                  <h4>Training Info</h4>
              </div>
              </nav>
                  <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12"></div>
                    <div class="col-md-6 col-lg-6 col-sm-12"></div>
                  </div>
              </div>
              <div class="col-12 bg-white mt-5 px-2">
              <nav class="navbar bg-white">
              <div class="container-fluid">
                  <h4>Promotions Info</h4>
              </div>
              </nav>
                  <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12"></div>
                    <div class="col-md-6 col-lg-6 col-sm-12"></div>
                  </div>
              </div>
              <div class="col-12 bg-white mt-5 px-2">
              <nav class="navbar bg-white">
              <div class="container-fluid">
                  <h4>Transfer Info</h4>
              </div>
              </nav>
                  <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12"></div>
                    <div class="col-md-6 col-lg-6 col-sm-12"></div>
                  </div>
              </div> -->

            </div>

          </div>
          <?php }?>
         
             <div class="container-fluid py-5">
                <div id="section3" >
                  <div class="row my-4">
                     <form id="formdata">
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
                                <select id="Qualification" name="Qualification" class="form-select" >
                                    <option value="">Select</option>
                                    <option value="Matric">Matric</option>
                                    <option value="FSC">FSC</option>
                                    <option value="FA">FA</option>
                                    <option value="BS">BS</option>
                                    <option value="BSC">BSC</option>
                                    <option value="Master">Master</option>
                                    <option value="MPhil">MPhil</option>
                                    <option value="PhD">PhD</option>
                                </select>

                              </div>
                            </div>
                            <div class="col-md-4 my-2">
                              <div class="form-group">
                                <label>Grade/Division</label>
                                <input type="text" name="GradeDivision" placeholder="Grade/Division" id="GradeDivision" class="form-control" autocomplete="off" >
                              </div>
                            </div>
                            <div class="col-md-4 my-2">
                              <div class="form-group">
                                <label>Passing Year of Degree</label>
                                <input type="date" name="Passing_Year_of_Degree" id="Passing_Year_of_Degree" placeholder="Passing Year of Degree " class="form-control" autocomplete="off" >
                              </div>
                            </div>
                            <div class="col-md-4 my-2">
                              <div class="form-group">
                                <label>Last Institute</label>
                                <input type="text" name="Last_Institute" id="Last_Institute" placeholder="Last Institute" class="form-control" autocomplete="off" >
                              </div>
                            </div>
                            <div class="col-md-4 my-2">
                              <div class="form-group">
                                <label>PEC Registration</label>
                                <input type="text" name="PEC_Registration" id="PEC_Registration" placeholder="PEC Registration" class="form-control" autocomplete="off" >
                              </div>
                            </div>
                            <div class="col-md-4 my-2">
                              <div class="form-group">
                                <label>Institute Address</label>
                                <input type="text" name="Institute_AddressCV" id="Institute_Address" placeholder="Institute Address " class="form-control" autocomplete="off" >
                              </div>
                            </div>
                            <div class="col-md-4 my-2">
                              <div class="form-group">
                                <label>Major Subject</label>
                                <input type="text" name="Major_Subject" id="Major_Subject" placeholder="Major Subject" class="form-control" autocomplete="off" >
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
                            <input type="button" name=""style="background-color: darkblue;" type="button" id="save" class="btn text-white shadow float-right" value="Add" >
                            
                            <input style="background-color: darkblue;" type="button" onclick="backToSection2()" class="btn text-white shadow float-right" value="Next">
                          </div>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                    </div>
                    <!-- Col-12 -->
                    </form>
                 
                    <div class="card card2 text-center bg-light">
                        <div style="background-color: darkblue;" class="card-header ">
                          <div class="card-title text-white">Employee Qualification</div>
                        </div>
                        <div class="container">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Qualification</th>
                                    <th scope="col">Grade/Division</th>
                                    <th scope="col">Passing Year of Degree</th>
                                    <th scope="col">Last Institute</th>
                                    <th scope="col">PEC Registration</th>
                                    <th scope="col">Institute Address</th>
                                    <th scope="col">Major Subject</th>
                                    <th scope="col">Update</th>
                                    <th scope="col">Delete</th>
                                </tr></thead>
                                
                                <tbody id="table-data">
                               
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Employee Qualification Update</h1>
                        <button type="button" class="btn-close btn btn-dange" style="background-color: #ff0505 !important; color: #fff !important;" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <form id="formdata">
                            <div class="my-2">
                              <div class="form-group">
                                <label>Qualification</label>
                                <input type="text" name="Qualification" id="Qualification_update" placeholder="Qualification" class="form-control" autocomplete="off" >
                                <input type="text" class="form-control" hidden id="id_update" name="">
                              </div>
                            </div>
                            <div class="my-2">
                              <div class="form-group">
                                <label>Grade/Division</label>
                                <input type="text" name="GradeDivision" placeholder="Grade/Division" id="GradeDivision_update" class="form-control" autocomplete="off" >
                              </div>
                            </div>
                            <div class="my-2">
                              <div class="form-group">
                                <label>Passing Year of Degree</label>
                                <input type="text" name="Passing_Year_of_Degree" id="Passing_Year_of_Degree_update" placeholder="Passing Year of Degree " class="form-control" autocomplete="off" >
                              </div>
                            </div>
                            <div class="my-2">
                              <div class="form-group">
                                <label>Last Institute</label>
                                <input type="text" name="Last_Institute" id="Last_Institute_update" placeholder="Last Institute" class="form-control" autocomplete="off" >
                              </div>
                            </div>
                            <div class="my-2">
                              <div class="form-group">
                                <label>PEC Registration</label>
                                <input type="text" name="PEC_Registration" id="PEC_Registration_update" placeholder="Last Institute" class="form-control" autocomplete="off" >
                              </div>
                            </div>
                            <div class="my-2">
                              <div class="form-group">
                                <label>Institute Address</label>
                                <input type="text" name="Institute_AddressCV" id="Institute_Address_update" placeholder="Institute Address " class="form-control" autocomplete="off" >
                              </div>
                            </div>
                            <div class="my-2">
                              <div class="form-group">
                                <label>Major Subject</label>
                                <input type="text" name="Major_Subject" id="Major_Subject_update" placeholder="Major Subject" class="form-control" autocomplete="off" >
                              </div>
                            </div>
                            <div class="my-2">
                              <div class="form-group">
                                <label>Remarks</label>
                                <textarea name="RemarksCV" id="Remarks_update" class="form-control"></textarea>
                              </div>
                            </div>
                          </form>
                        </div>
                      
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="updatenow">Update</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        <?php include('../link/desigene/script.php') ?>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
      function backToSection2() {
          <?php $CNIC = $_GET['updat'];?>
          location.replace('Training.php?updat=<?php echo $CNIC?>#section4');
              }
      $(document).ready(function($) {       
    function loadTable() {
        var see = "<?php echo $_GET['updat']; ?>";
        $.ajax({
            url: "ajex/see-emp-qul-ajex.php",
            type: "POST",
            data: { id: see },
            success: function(data) {
                $("#table-data").html(data);
            }
        });
    }
    loadTable();
 
    $("#save").on("click", function(e) {
      e.preventDefault();
        var employee_id = "<?php echo $_GET['updat']; ?>";
        var Qualification = $("#Qualification").val();
        var GradeDivision = $("#GradeDivision").val();
        var Passing_Year_of_Degree = $("#Passing_Year_of_Degree").val();
        var Last_Institute = $("#Last_Institute").val();
        var PEC_Registration = $("#PEC_Registration").val();
        var Institute_Address = $("#Institute_Address").val();
        var Major_Subject = $("#Major_Subject").val();
        var Remarks = $("#Remarks").val();
        $.ajax({
            url: "insert_qualification.php",
            type: "POST",
            data: { employee_id:employee_id,Qualification:Qualification,GradeDivision:GradeDivision,Passing_Year_of_Degree:Passing_Year_of_Degree,Last_Institute:Last_Institute,PEC_Registration:PEC_Registration,Institute_Address:Institute_Address,Major_Subject:Major_Subject,Remarks:Remarks},
            success: function(data) {
                if (data == 1) {
                    loadTable();
                    $("#formdata").trigger("reset");
                } else {
                    alert("Can't Save Record");
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
        console.log("AJAX Error:", textStatus, errorThrown);
        }});
    });
    $(document).on("click", "#delete",function(){
        var delet = $(this).data("did");
      // alert(update);
        $.ajax({
          url : "ajex/delete_qual_emp_ajax.php",
          type:"POST",
          data : {id : delet},
          success : function(data){
            if(data == 1){
            loadTable();
            }
            else{
              alert ("Can't Save Record");
            }
          }
        });
      });
      $(document).on("click", "#update",function(){
        var update = $(this).data("eid");
      // alert(update);
        $.ajax({
          url : "ajex/get_qali_single_ajax.php",
          type:"POST",
          data : {id : update},
          success : function(data){
            var qualification = JSON.parse(data);
            $("#id_update").val(qualification.id);
            $("#Qualification_update").val(qualification.Qualification_update);
            $("#GradeDivision_update").val(qualification.GradeDivision_update);
            $("#Passing_Year_of_Degree_update").val(qualification.Passing_Year_of_Degree_update);
            $("#Last_Institute_update").val(qualification.Last_Institute_update);
            $("#PEC_Registration_update").val(qualification.PEC_Registration_update);
            $("#Institute_Address_update").val(qualification.Institute_Address_update);
            $("#Major_Subject_update").val(qualification.Major_Subject_update);
            $("#Remarks_update").val(qualification.Remarks_update);
            
          }
        });
      });
      $("#updatenow").on("click",function(e){
        e.preventDefault();
        var Qualification_update =$("#Qualification_update").val();
        var GradeDivision_update =$("#GradeDivision_update").val();
        var Passing_Year_of_Degree_update =$("#Passing_Year_of_Degree_update").val();
        var Last_Institute_update =$("#Last_Institute_update").val();
        var PEC_Registration_update =$("#PEC_Registration_update").val();
        var Institute_Address_update =$("#Institute_Address_update").val();
        var Major_Subject_update =$("#Major_Subject_update").val();
        var Remarks_update =$("#Remarks_update").val();
        var id_update = $("#id_update").val();
        // alert(id_update);
        $.ajax({
          url:"ajex/ajax-update-employee-qlific-allowance.php",
          type:"POST", 
          data:{id:id_update,Qualification:Qualification_update,GradeDivision:GradeDivision_update,Passing_Year_of_Degree:Passing_Year_of_Degree_update,Last_Institute:Last_Institute_update,PEC_Registration:PEC_Registration_update,Institute_Address:Institute_Address_update,Major_Subject:Major_Subject_update,Remarks:Remarks_update},
          success:function(data){
            if(data == 1){
            loadTable();
            }
            else{
              alert ("Can't Save Record");
            }
          } });
        });
});

  </script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

  <?php include('link/desigene/script.php')?>
  </body>
</html>
<?php }?>