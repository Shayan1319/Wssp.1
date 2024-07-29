<?php
session_start();
error_reporting(0);
// // links to database
include('link/desigene/db.php');
if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber']) || $_SESSION['Designation'] != 'HR manager') {
  // Log the unauthorized access attempt for auditing purposes
  error_log("Unauthorized access attempt. User: {$_SESSION['loginid']}");
  
  // Redirect to the logout page
  header("Location: ../logout.php");
  exit; // Ensure that the script stops execution after the header redirection
}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <?php include ('link/links.php')?>
</head>
<style>
label span{color: #ff0505;}

</style>
<body>
  <div class="container-fluid" style="padding: 0px !important;" >
  <?php include ('link/desigene/sidebar.php')?>
  <div id="main">
    <?php include('link/desigene/navbar.php')?>
    <div class="container-fluid py-5">
   
      <?php
      $CNIC = $_GET['updat'];
      $select = mysqli_query($conn,"SELECT * FROM `employeedata` WHERE `EmployeeNo` ='$CNIC' ");
      while($see=mysqli_fetch_array($select)){
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
                      <h4>Employment Information</h4>
                  </div>
                </nav>
                <div class="row">
                                <div class="col-md-4 my-2">
                                  <div class="form-group">
                                    <label>Employment Group</label>
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
                                    <label>Job Title</label>
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
              <div class="col-12 bg-white mt-5 px-2">
            <nav class="navbar bg-white">
               <div class="container-fluid">
                    <h4>Qualification Information</h4>
                  </div>
                </nav>
                <div>
                  <table class="table bg-light">
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
                      </tr>
                    </thead>
                    <tbody>
                      <?php   $CNIC = $_GET['updat'];
                      $select = mysqli_query($conn,"SELECT * FROM `qualification` WHERE `employee_id`= $CNIC" );
                      while($see=mysqli_fetch_array($select))
                      {
                      ?>
                      <tr>
                        <th scope="row">1</th>
                        <td><?php echo $see ['Qualification'] ?></td>
                        <td><?php echo $see ['Grade/Division'] ?></td>
                        <td><?php echo $see ['Passing Year of Degree'] ?></td>
                        <td><?php echo $see ['Last Institute'] ?></td>
                        <td><?php echo $see ['PEC Registration'] ?></td>
                        <td><?php echo $see ['Institute Address'] ?></td>
                        <td><?php echo $see ['Major Subject'] ?></td>
                      </tr>
                      <?php }?>
                    </tbody>
                  </table>
                </div>
              </div>    

            </div>

          </div>
          <?php }?>
        
        <div id="section4" >
                <div class="row my-4">
                  <!-- left column -->
                  <div class="col-md-12">
                    <div class="card card-success">
                      <div style="background-color: darkblue;" class="card-header  text-white fw-bold">
                        <div class="card-title text-white">Employee Training Information</div>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body bg-light">
                       <form id="formdata" action="#" method="post">
                         
                      <div class="row">
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>Training Serial Number<span>*</span></label>
                              <input type="text" name="Training_Serial_Number" id="Training_Serial_Number" placeholder="Training Serial Number" class="form-control" autocomplete="off" >
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>Training Name</label>
                              <input type="text" name="Training_Name" id="Training_Name" placeholder="Training Name" class="form-control" autocomplete="off" >
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>Institute</label>
                              <input type="text" name="Institute" id="Institute" placeholder="Institute" class="form-control" autocomplete="off" >
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>City</label>
                              <input type="text" name="City" id="City" placeholder="City" class="form-control" autocomplete="off" >
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>Institute Address</label>
                              <input type="text" name="Institute_Address" id="Institute_Address" placeholder="Institute Address" class="form-control" autocomplete="off" >
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>Oblige Sponsor</label>
                              <input type="text" name="Oblige_Sponsor" id="Oblige_Sponsor" placeholder="Oblige Sponsor" class="form-control" autocomplete="off" >
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>From</label>
                              <input type="text" name="From" id="From" class="form-control datepicker" placeholder="dd mm yyyy"  autocomplete="off" >
                            </div>
                          </div>
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>To</label>
                              <input type="text" name="To" id="To" class="form-control datepicker" placeholder="dd mm yyyy" autocomplete="off" >
                            </div>
                          </div> 
                          <div class="col-md-4 my-2">
                            <div class="form-group">
                              <label>Months Duration</label>
                              <input type="number" name="Duration" id="Duration" placeholder="Duration" class="form-control" autocomplete="off" >
                            </div>
                          </div>
                          <div class=" text-end">
                            <input type="button" name=""style="background-color: darkblue;" type="button" id="save" class="btn text-white shadow float-right" value="Add" >
                            <input style="background-color: red;" type="button" onclick="back()" class="btn text-white shadow float-right" value="Back">
                            <input style="background-color: darkblue;" type="button" onclick="backToSection2()" class="btn text-white shadow float-right" value="Next">
                            
                          </div>
                        </div>
                      
                       </form>
                      </div>
                      <!-- /.card-body -->
                      <div class="col-12 bg-white mt-5 px-2"> 
                <nav class="navbar bg-white">
                  <div class="container-fluid">
                    <h4>Training Information</h4>
                  </div>
                </nav>
                <div>
                            <table class="table bg-light">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Training Serial Number</th>
                                    <th scope="col">Training Name</th>
                                    <th scope="col">Institute</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Institute Address</th>
                                    <th scope="col">Oblige Sponsor</th>
                                    <th scope="col">From</th>
                                    <th scope="col">To</th>
                                    <th scope="col">Duration</th>
                                    <th scope="col">Update</th>
                                    <th scope="col">Delete</th>
                                </tr></thead>
                                
                                <tbody id="table-data">
                               
                                </tbody>
                            </table>
                        </div>
                    
               </div>
      
                    </div>
                      <!-- /.card -->
                  </div>
                  <!-- Col-12 -->
                </div>
                <!-- row -->
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
                      <form id="formdata" action="#" method="post">
                             <div class="my-2">
                               <div class="form-group">
                                 <label>Training Serial Number<span>*</span></label>
                                 <input type="text" name="Training_Serial_Number" id="Training_Serial_Number_update" placeholder="Training Serial Number" class="form-control" autocomplete="off" >
                                <input type="text" class="form-control" hidden id="id_update" name="">
                               </div>
                             </div>
                             <div class="my-2">
                               <div class="form-group">
                                 <label>Training Name</label>
                                 <input type="text" name="Training_Name" id="Training_Name_update" placeholder="Training Name" class="form-control" autocomplete="off" >
                               </div>
                             </div>
                             <div class="my-2">
                               <div class="form-group">
                                 <label>Institute</label>
                                 <input type="text" name="Institute" id="Institute_update" placeholder="Institute" class="form-control" autocomplete="off" >
                               </div>
                             </div>
                             <div class="my-2">
                               <div class="form-group">
                                 <label>City</label>
                                 <input type="text" name="City" id="City_update" placeholder="City" class="form-control" autocomplete="off" >
                               </div>
                             </div>
                             <div class="my-2">
                               <div class="form-group">
                                 <label>Institute Address</label>
                                 <input type="text" name="Institute_Address" id="Institute_Address_update" placeholder="Institute Address" class="form-control" autocomplete="off" >
                               </div>
                             </div>
                             <div class="my-2">
                               <div class="form-group">
                                 <label>Oblige Sponsor</label>
                                 <input type="text" name="Oblige_Sponsor" id="Oblige_Sponsor_update" placeholder="Oblige Sponsor" class="form-control" autocomplete="off" >
                               </div>
                             </div>
                             <div class="my-2">
                               <div class="form-group">
                                 <label>From</label>
                                 <input type="text" name="From" id="From_update" class="form-control datepicker" autocomplete="off" >
                               </div>
                             </div>
                             <div class="my-2">
                               <div class="form-group">
                                 <label>To</label>
                                 <input type="text" name="To" id="To_update" class="form-control datepicker" autocomplete="off" >
                               </div>
                             </div> 
                             <div class="my-2">
                               <div class="form-group">
                                 <label>Duration </label>
                                 <input type="text" name="Duration" id="Duration_update" placeholder="Duration" class="form-control" autocomplete="off" >
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
  </div>
  <script>
     $(document).ready(function() {
            // Initialize the datepicker with your desired format
            $(".datepicker").datepicker({
                dateFormat: 'dd mm yy'
            });
        });
      function backToSection2() {
        <?php $CNIC = $_GET['updat'];?>
        location.replace('Promotions.php?updat=<?php echo $CNIC?>#section5');
            }
            function back() {
        <?php $CNIC = $_GET['updat'];?>
        location.replace('Qualification.php?updat=<?php echo $CNIC?>#section3');
            }
      $(document).ready(function($) {       
    function loadTable() {
        var see = "<?php echo $_GET['updat'];?>";
        $.ajax({
            url: "ajex/see-emp-train-ajex.php",
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
        var Training_Serial_Number = $("#Training_Serial_Number").val();
        var Training_Name = $("#Training_Name").val();
        var Institute = $("#Institute").val();
        var City = $("#City").val();
        var Institute_Address = $("#Institute_Address").val();
        var Oblige_Sponsor = $("#Oblige_Sponsor").val();
        var From = $("#From").val();
        var To = $("#To").val();
        var Duration = $("#Duration").val();
        if (Training_Serial_Number.trim() !== "") {
        $.ajax({
            url: "ajex/insert_training.php",
            type: "POST",
            data: { employee_id:employee_id,Training_Serial_Number:Training_Serial_Number,Training_Name:Training_Name,Institute:Institute,City:City,Institute_Address:Institute_Address,Oblige_Sponsor:Oblige_Sponsor,From:From,To:To,Duration:Duration},
            success: function(data) {
              alert(data);
                    loadTable();
                    $("#formdata").trigger("reset");
            },
            error: function(jqXHR, textStatus, errorThrown) {
        console.log("AJAX Error:", textStatus, errorThrown);
        }});}
        else{
          alert("Entere the Training Serial Number");
        }
    });
    $(document).on("click", "#delete",function(){
        var delet = $(this).data("did");
      // alert(update);
        $.ajax({
          url : "ajex/delete_training_emp_ajax.php",
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
          url : "ajex/get_train_single_ajax.php",
          type:"POST",
          data : {id : update},
          success : function(data){
            var Training = JSON.parse(data);
            $("#id_update").val(Training.id);
            $("#Training_Serial_Number_update").val(Training.Training_Serial_Number);
            $("#Training_Name_update").val(Training.Training_Name);
            $("#Institute_update").val(Training.Institute);
            $("#City_update").val(Training.City);
            $("#Institute_Address_update").val(Training.Institute_Address);
            $("#Oblige_Sponsor_update").val(Training.Oblige_Sponsor);
            $("#From_update").val(Training.From);
            $("#To_update").val(Training.To);
            $("#Duration_update").val(Training.Duration);
          }
        });
      });
      $("#updatenow").on("click",function(e){
        e.preventDefault();
        var Training_Serial_Number =$("#Training_Serial_Number_update").val();
        var Training_Name =$("#Training_Name_update").val();
        var Institute =$("#Institute_update").val();
        var City =$("#City_update").val();
        var Institute_Address =$("#Institute_Address_update").val();
        var Oblige_Sponsor =$("#Oblige_Sponsor_update").val();
        var From =$("#From_update").val();
        var To =$("#To_update").val();
        var Duration =$("#Duration_update").val();
        var id_update = $("#id_update").val();
        // alert(id_update);
        if (Training_Serial_Number.trim() !== "") {

        $.ajax({
          url:"ajex/ajax-update-employee-train-allowance.php",
          type:"POST", 
          data:{id:id_update,Training_Serial_Number:Training_Serial_Number,Training_Name:Training_Name,Institute:Institute,City:City,Institute_Address:Institute_Address,Oblige_Sponsor:Oblige_Sponsor,From:From,To:To,Duration:Duration},
          success:function(data){
            if(data == 1){
            loadTable();
            }
            else{
              alert ("Can't Save Record");
            }
          } });}
        });
});

  </script>
</body>
</html>
<?php }?>