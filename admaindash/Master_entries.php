<?php
include('../link/desigene/db.php');
session_start();
error_reporting(0);
if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber']) || $_SESSION['Designation'] != 'Admin') {
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
<body>
    <?php include ('link/desigene/sidebar.php')?>
    <div id="main">
        <?php include('link/desigene/navbar.php')?>
        <div class="container-fluid m-auto p-5">
            <div id="section2" style="display: block;">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active bg-primary text-white" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">WSSC</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link bg-success text-white" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false" tabindex="-1">TMA</button>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <div class="row my-4">
                      <div class="col-md-12 ">
                        <div class="card card-success border border-2 border-dark bg-light">
                          <div style="background-color: darkblue;" class="card-header text-white fw-bold">
                            <div class="row">
                              <div class="col-sm-12 col-lg-5">
                                <div class="card-title text-white" style="width: fit-content;">Employement Information
                                </div>
                              </div>
                              <div class="col-sm-12 col-lg-7">
                                <h3 class="bg-primary p-2 rounded" style="width: fit-content;">WSSC</h3>
                              </div>
                            </div>  
                          </div>
                          <br><!-- /.card-header -->
                          <div class="card-body ">
                            <form action="" id="form" >
                            <div class="row">
                            <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employement Group</label>
                                  <div class="row my-2">
                                    <div class="col-9">
                                        <input class="form-control" type="text" placeholder="Add Option" name="EmpGroup" id="EmpGroup">
                                    </div>
                                    <div class="col-3">
                                        <button id="EmpGroup_btn" class="btn btn-primary" type=""><i class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="dropdown">
                                      <button type="button" class="btn bg-white border border-dark form-control dropdown-toggle" data-bs-toggle="dropdown">
                                      Select
                                      </button>
                                      <ul class="dropdown-menu" id="EmpGroup_drop" >

                                      </ul>
                                  </div>                                
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Class</label>
                                  <div class="row my-2">
                                    <div class="col-9">
                                        <input class="form-control" type="text" placeholder="Add Option" name="Employee_Class" id="Employee_Class">
                                    </div>
                                    <div class="col-3">
                                        <button id="Employee_Class_btn" class="btn btn-primary" type=""><i class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="dropdown">
                                      <button type="button" class="btn bg-white border border-dark form-control dropdown-toggle" data-bs-toggle="dropdown">
                                      Select
                                      </button>
                                      <ul class="dropdown-menu" id="Employee_Class_drop" >

                                      </ul>
                                  </div>                                
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Group</label>
                                  <div class="row my-2">
                                    <div class="col-9">
                                        <input class="form-control" type="text" placeholder="Add Option" name="Employee_Group" id="Employee_Group">
                                    </div>
                                    <div class="col-3">
                                        <button id="Employee_Group_btn" class="btn btn-primary" type=""><i class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="dropdown">
                                      <button type="button" class="btn bg-white border border-dark form-control dropdown-toggle" data-bs-toggle="dropdown">
                                      Select
                                      </button>
                                      <ul class="dropdown-menu" id="Employee_Group_drop" >

                                      </ul>
                                  </div>                                
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Sub Group</label>
                                  <div class="row my-2">
                                    <div class="col-9">
                                        <input class="form-control" type="text" placeholder="Add Option" name="Employee_Sub_Group" id="Employee_Sub_Group">
                                    </div>
                                    <div class="col-3">
                                        <button id="Employee_Sub_Group_btn" class="btn btn-primary" type=""><i class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="dropdown">
                                      <button type="button" class="btn bg-white border border-dark form-control dropdown-toggle" data-bs-toggle="dropdown">
                                      Select
                                      </button>
                                      <ul class="dropdown-menu" id="Employee_Sub_Group_drop" >

                                      </ul>
                                  </div>                                
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Quota</label>
                                  <div class="row my-2">
                                    <div class="col-9">
                                        <input class="form-control" type="text" placeholder="Add Option" name="Employee_Quota" id="Employee_Quota">
                                    </div>
                                    <div class="col-3">
                                        <button id="Employee_Quota_btn" class="btn btn-primary" type=""><i class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="dropdown">
                                      <button type="button" class="btn bg-white border border-dark form-control dropdown-toggle" data-bs-toggle="dropdown">
                                      Select
                                      </button>
                                      <ul class="dropdown-menu" id="Employee_Quota_drop" >

                                      </ul>
                                  </div>                                
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Grade</label>
                                  <div class="row my-2">
                                    <div class="col-9">
                                        <input class="form-control" type="text" placeholder="Add Option" name="Grade" id="Grade">
                                    </div>
                                    <div class="col-3">
                                        <button id="Grade_btn" class="btn btn-primary" type=""><i class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="dropdown">
                                      <button type="button" class="btn bg-white border border-dark form-control dropdown-toggle" data-bs-toggle="dropdown">
                                      Select
                                      </button>
                                      <ul class="dropdown-menu" id="Grade_drop" >

                                      </ul>
                                  </div>                                
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Department</label>
                                  <div class="row my-2">
                                    <div class="col-9">
                                        <input class="form-control" type="text" placeholder="Add Option" name="Department" id="Department">
                                    </div>
                                    <div class="col-3">
                                        <button id="Department_btn" class="btn btn-primary" type=""><i class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="dropdown">
                                      <button type="button" class="btn bg-white border border-dark form-control dropdown-toggle" data-bs-toggle="dropdown">
                                      Select
                                      </button>
                                      <ul class="dropdown-menu" id="Department_drop" >

                                      </ul>
                                  </div>                                
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Job Tiltle</label>
                                  <div class="row my-2">
                                    <div class="col-9">
                                        <input class="form-control" type="text" placeholder="Add Option" name="Job_Tiltle" id="Job_Tiltle">
                                    </div>
                                    <div class="col-3">
                                        <button id="Job_Tiltle_btn" class="btn btn-primary" type=""><i class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="dropdown">
                                      <button type="button" class="btn bg-white border border-dark form-control dropdown-toggle" data-bs-toggle="dropdown">
                                      Select
                                      </button>
                                      <ul class="dropdown-menu" id="Job_Tiltle_drop" >

                                      </ul>
                                  </div>                                
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Type</label>
                                  <div class="row my-2">
                                    <div class="col-9">
                                        <input class="form-control" type="text" placeholder="Add Option" name="Type" id="Type">
                                    </div>
                                    <div class="col-3">
                                        <button id="Type_btn" class="btn btn-primary" type=""><i class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="dropdown">
                                      <button type="button" class="btn bg-white border border-dark form-control dropdown-toggle" data-bs-toggle="dropdown">
                                      Select
                                      </button>
                                      <ul class="dropdown-menu" id="Type_drop" >

                                      </ul>
                                  </div>                                
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Salary Mode</label>
                                  <div class="row my-2">
                                    <div class="col-9">
                                        <input class="form-control" type="text" placeholder="Add Option" name="Salary_Mode" id="Salary_Mode">
                                    </div>
                                    <div class="col-3">
                                        <button id="Salary_Mode_btn" class="btn btn-primary" type=""><i class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="dropdown">
                                      <button type="button" class="btn bg-white border border-dark form-control dropdown-toggle" data-bs-toggle="dropdown">
                                      Select
                                      </button>
                                      <ul class="dropdown-menu" id="Salary_Mode_drop" >

                                      </ul>
                                  </div>                                
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Status</label>
                                  <div class="row my-2">
                                    <div class="col-9">
                                        <input class="form-control" type="text" placeholder="Add Option" name="Status" id="Status">
                                    </div>
                                    <div class="col-3">
                                        <button id="Status_btn" class="btn btn-primary" type=""><i class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="dropdown">
                                      <button type="button" class="btn bg-white border border-dark form-control dropdown-toggle" data-bs-toggle="dropdown">
                                      Select
                                      </button>
                                      <ul class="dropdown-menu" id="Status_drop" >

                                      </ul>
                                  </div>                                
                                </div>
                              </div>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                    <div class="row my-4">
                      <div class="col-md-12 ">
                        <div class="card card-success border border-2 border-dark bg-light">
                          <div style="background-color: darkblue;" class="card-header text-white fw-bold">
                            <div class="row">
                              <div class="col-sm-12 col-lg-5">
                                <div class="card-title text-white" style="width: fit-content;">Employement Information</div>
                              </div>
                              <div class="col-sm-12 col-lg-7">
                                <h3 class="bg-success p-2 rounded" style="width: fit-content;">TMA</h3>
                              </div>
                            </div>
                          </div>
                          <br>
                          <!-- /.card-header -->
                          <div class="card-body ">
                            <div class="row">
                            <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employement Group</label>
                                  <div class="row my-2">
                                    <div class="col-9">
                                        <input class="form-control" type="text" placeholder="Add Option" name="Employement_Group_TMA" id="Employement_Group_TMA">
                                    </div>
                                    <div class="col-3">
                                        <button id="Employement_Group_TMA_btn" class="btn btn-primary" type=""><i class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                                 <div class="dropdown">
                                      <button type="button" class="btn bg-white border border-dark form-control dropdown-toggle" data-bs-toggle="dropdown">
                                      Select
                                      </button>
                                      <ul class="dropdown-menu" id="Employement_Group_TMA_drop" >

                                      </ul>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Class</label>
                                  <div class="row my-2">
                                    <div class="col-9">
                                        <input class="form-control" type="text" placeholder="Add Option" name="Employee_Class_TMA" id="Employee_Class_TMA">
                                    </div>
                                    <div class="col-3">
                                        <button id="Employee_Class_TMA_btn" class="btn btn-primary" type=""><i class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                                 <div class="dropdown">
                                      <button type="button" class="btn bg-white border border-dark form-control dropdown-toggle" data-bs-toggle="dropdown">
                                      Select
                                      </button>
                                      <ul class="dropdown-menu" id="Employee_Class_TMA_drop" >

                                      </ul>
                                  </div>
                                   
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Group</label>
                                  <div class="row my-2">
                                    <div class="col-9">
                                        <input class="form-control" type="text" placeholder="Add Option" name="Employee_Group_TMA" id="Employee_Group_TMA">
                                    </div>
                                    <div class="col-3">
                                        <button id="Employee_Group_TMA_btn" class="btn btn-primary" type=""><i class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                                 <div class="dropdown">
                                      <button type="button" class="btn bg-white border border-dark form-control dropdown-toggle" data-bs-toggle="dropdown">
                                      Select
                                      </button>
                                      <ul class="dropdown-menu" id="Employee_Group_TMA_drop" >

                                      </ul>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Sub Group</label>
                                  <div class="row my-2">
                                    <div class="col-9">
                                        <input class="form-control" type="text" placeholder="Add Option" name="Employee_Sub_Group_TMA" id="Employee_Sub_Group_TMA">
                                    </div>
                                    <div class="col-3">
                                        <button id="Employee_Sub_Group_TMA_btn" class="btn btn-primary" type=""><i class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                                 <div class="dropdown">
                                      <button type="button" class="btn bg-white border border-dark form-control dropdown-toggle" data-bs-toggle="dropdown">
                                      Select
                                      </button>
                                      <ul class="dropdown-menu" id="Employee_Sub_Group_TMA_drop" >

                                      </ul>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Employee Quota</label>
                                  <div class="row my-2">
                                    <div class="col-9">
                                        <input class="form-control" type="text" placeholder="Add Option" name="Employee_Quota_TMA" id="Employee_Quota_TMA">
                                    </div>
                                    <div class="col-3">
                                        <button id="Employee_Quota_TMA_btn" class="btn btn-primary" type=""><i class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                                 <div class="dropdown">
                                      <button type="button" class="btn bg-white border border-dark form-control dropdown-toggle" data-bs-toggle="dropdown">
                                      Select
                                      </button>
                                      <ul class="dropdown-menu" id="Employee_Quota_TMA_drop" >

                                      </ul>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Grade</label>
                                  <div class="row my-2">
                                    <div class="col-9">
                                        <input class="form-control" type="text" placeholder="Add Option" name="Grade_TMA" id="Grade_TMA">
                                    </div>
                                    <div class="col-3">
                                        <button id="Grade_TMA_btn" class="btn btn-primary" type=""><i class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                                 <div class="dropdown">
                                      <button type="button" class="btn bg-white border border-dark form-control dropdown-toggle" data-bs-toggle="dropdown">
                                      Select
                                      </button>
                                      <ul class="dropdown-menu" id="Grade_TMA_drop">

                                      </ul>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Department</label>
                                  <div class="row my-2">
                                    <div class="col-9">
                                        <input class="form-control" type="text" placeholder="Add Option" name="Department_TMA" id="Department_TMA">
                                    </div>
                                    <div class="col-3">
                                        <button id="Department_TMA_btn" class="btn btn-primary" type=""><i class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                                 <div class="dropdown">
                                      <button type="button" class="btn bg-white border border-dark form-control dropdown-toggle" data-bs-toggle="dropdown">
                                      Select
                                      </button>
                                      <ul class="dropdown-menu" id="Department_TMA_drop" >

                                      </ul>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div  class="form-group">
                                  <label>Job Tiltle</label>
                                  <div class="row my-2">
                                    <div class="col-9">
                                        <input class="form-control" type="text" placeholder="Add Option" name="Job_Tiltle_TMA" id="Job_Tiltle_TMA">
                                    </div>
                                    <div class="col-3">
                                        <button id="Job_Tiltle_TMA_btn" class="btn btn-primary" type=""><i class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                                 <div class="dropdown">
                                      <button type="button" class="btn bg-white border border-dark form-control dropdown-toggle" data-bs-toggle="dropdown">
                                      Select
                                      </button>
                                      <ul class="dropdown-menu" id="Job_Tiltle_TMA_drop" >

                                      </ul>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Type</label>
                                  <div class="row my-2">
                                    <div class="col-9">
                                        <input class="form-control" type="text" placeholder="Add Option" name="Type_TMA" id="Type_TMA">
                                    </div>
                                    <div class="col-3">
                                        <button id="Type_TMA_btn" class="btn btn-primary" type=""><i class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                                 <div class="dropdown">
                                      <button type="button" class="btn bg-white border border-dark form-control dropdown-toggle" data-bs-toggle="dropdown">
                                      Select
                                      </button>
                                      <ul class="dropdown-menu" id="Type_TMA_drop" >

                                      </ul>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Salary Mode</label>
                                  <div class="row my-2">
                                    <div class="col-9">
                                        <input class="form-control" type="text" placeholder="Add Option" name="Salary_Mode_TMA" id="Salary_Mode_TMA">
                                    </div>
                                    <div class="col-3">
                                        <button id="Salary_Mode_TMA_btn" class="btn btn-primary" type=""><i class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                                 <div class="dropdown">
                                      <button type="button" class="btn bg-white border border-dark form-control dropdown-toggle" data-bs-toggle="dropdown">
                                      Select
                                      </button>
                                      <ul class="dropdown-menu" id="Salary_Mode_TMA_drop">

                                      </ul>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Status</label>
                                  <div class="row my-2">
                                    <div class="col-9">
                                        <input class="form-control" type="text" placeholder="Add Option" name="Status_TMA" id="Status_TMA">
                                    </div>
                                    <div class="col-3">
                                        <button id="Status_TMA_btn" class="btn btn-primary" type=""><i class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                                 <div class="dropdown">
                                      <button type="button" class="btn bg-white border border-dark form-control dropdown-toggle" data-bs-toggle="dropdown">
                                      Select
                                      </button>
                                      <ul class="dropdown-menu" id="Status_TMA_drop" >

                                      </ul>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 text-end mt-2">
                    <input style="background-color: darkblue;" onclick="backToSection1()" type="button" class="btn text-white  float-right shadow" value="Back">
                    <input style="background-color: darkblue;" onclick="validateSection2()" type="button" class="btn text-white  float-right shadow" value="Next">
                    
                  </div>
                </div>
              </div>
        </div>
    </div>
<?php include('link/desigene/script.php')?>

<script>
   $(document).ready(function(){
    $("#EmpGroup_btn").on("click",function(e){
        e.preventDefault();
        var EmpGroup = $("#EmpGroup").val();
        $.ajax({
          url:"ajex/EmpGroup.php",
          type:"Post", 
          data:{EmpGroup:EmpGroup},
          success:function(data){
            if(data == 1){
            loadEmpGroup();
            $("#form").trigger("reset"); 
            }
            else{
              alert ("Can't Save Record");
            }
          }

        });
            });
            $("#Employee_Class_btn").on("click",function(e){
        e.preventDefault();
        var Employee_Class = $("#Employee_Class").val();
        $.ajax({
          url:"ajex/Employee_Class.php",
          type:"Post", 
          data:{Employee_Class:Employee_Class},
          success:function(data){
            if(data == 1){
            loadEmployee_Class();
            $("#form").trigger("reset"); 
            }
            else{
              alert ("Can't Save Record");
            }
          }

        });
            });
            $("#Employee_Group_btn").on("click",function(e){
        e.preventDefault();
        var Employee_Group = $("#Employee_Group").val();
        $.ajax({
          url:"ajex/Employee_Group.php",
          type:"Post", 
          data:{Employee_Group:Employee_Group},
          success:function(data){
            if(data == 1){
            loadEmployee_Group();
            $("#form").trigger("reset"); 
            }
            else{
              alert ("Can't Save Record");
            }
          }

        });
            });
            $("#Employee_Sub_Group_btn").on("click",function(e){
        e.preventDefault();
        var Employee_Sub_Group = $("#Employee_Sub_Group").val();
        $.ajax({
          url:"ajex/Employee_Sub_Group.php",
          type:"Post", 
          data:{Employee_Sub_Group:Employee_Sub_Group},
          success:function(data){
            if(data == 1){
            loadEmployee_Sub_Group();
            $("#form").trigger("reset"); 
            }
            else{
              alert ("Can't Save Record");
            }
          }

        });
            });

            $("#Employee_Quota_btn").on("click",function(e){
        e.preventDefault();
        var Employee_Quota = $("#Employee_Quota").val();
        $.ajax({
          url:"ajex/Employee_Quota.php",
          type:"Post", 
          data:{Employee_Quota:Employee_Quota},
          success:function(data){
            if(data == 1){
            loadEmployee_Quota();
            $("#form").trigger("reset"); 
            }
            else{
              alert ("Can't Save Record");
            }
          }

        });
            });
            $("#Grade_btn").on("click",function(e){
        e.preventDefault();
        var Grade = $("#Grade").val();
        $.ajax({
          url:"ajex/Grade.php",
          type:"Post", 
          data:{Grade:Grade},
          success:function(data){
            if(data == 1){
            loadGrade();
            $("#form").trigger("reset"); 
            }
            else{
              alert ("Can't Save Record");
            }
          }

        });
            });
            $("#Department_btn").on("click",function(e){
        e.preventDefault();
        var Department = $("#Department").val();
        $.ajax({
          url:"ajex/Department.php",
          type:"Post", 
          data:{Department:Department},
          success:function(data){
            if(data == 1){
            loadDepartment();
            $("#form").trigger("reset"); 
            }
            else{
              alert ("Can't Save Record");
            }
          }

        });
            });
            $("#Job_Tiltle_btn").on("click",function(e){
        e.preventDefault();
        var Job_Tiltle = $("#Job_Tiltle").val();
        $.ajax({
          url:"ajex/Job_Tiltle.php",
          type:"Post", 
          data:{Job_Tiltle:Job_Tiltle},
          success:function(data){
            if(data == 1){
            loadJob_Tiltle();
            $("#form").trigger("reset"); 
            }
            else{
              alert ("Can't Save Record");
            }
          }

        });
            });
            $("#Type_btn").on("click",function(e){
        e.preventDefault();
        var Type = $("#Type").val();
        $.ajax({
          url:"ajex/Type.php",
          type:"Post", 
          data:{Type:Type},
          success:function(data){
            if(data == 1){
            loadType();
            $("#form").trigger("reset"); 
            }
            else{
              alert ("Can't Save Record");
            }
          }

        });
            });
            $("#Salary_Mode_btn").on("click",function(e){
        e.preventDefault();
        var Salary_Mode = $("#Salary_Mode").val();
        $.ajax({
          url:"ajex/Salary_Mode.php",
          type:"Post", 
          data:{Salary_Mode:Salary_Mode},
          success:function(data){
            if(data == 1){
            loadSalary_Mode();
            $("#form").trigger("reset"); 
            }
            else{
              alert ("Can't Save Record");
            }
          }

        });
            });
            $("#Status_btn").on("click",function(e){
        e.preventDefault();
        var Status = $("#Status").val();
        $.ajax({
          url:"ajex/Status.php",
          type:"Post", 
          data:{Status:Status},
          success:function(data){
            if(data == 1){
            loadStatus();
            $("#form").trigger("reset"); 
            }
            else{
              alert ("Can't Save Record");
            }
          }

        });
            });
            $("#Employement_Group_TMA_btn").on("click",function(e){
        e.preventDefault();
        var Employement_Group_TMA = $("#Employement_Group_TMA").val();
        $.ajax({
          url:"ajex/Employement_Group_TMA.php",
          type:"Post", 
          data:{Employement_Group_TMA:Employement_Group_TMA},
          success:function(data){
            if(data == 1){
            loadEmployement_Group_TMA();
            $("#form").trigger("reset"); 
            }
            else{
              alert ("Can't Save Record");
            }
          }

        });
            });
            $("#Employee_Class_TMA_btn").on("click",function(e){
        e.preventDefault();
        var Employee_Class_TMA = $("#Employee_Class_TMA").val();
        $.ajax({
          url:"ajex/Employee_Class_TMA.php",
          type:"Post", 
          data:{Employee_Class_TMA:Employee_Class_TMA},
          success:function(data){
            if(data == 1){
            loadEmployee_Class_TMA();
            $("#form").trigger("reset"); 
            }
            else{
              alert ("Can't Save Record");
            }
          }

        });
            });
            $("#Employee_Group_TMA_btn").on("click",function(e){
        e.preventDefault();
        var Employee_Group_TMA = $("#Employee_Group_TMA").val();
        $.ajax({
          url:"ajex/Employee_Group_TMA.php",
          type:"Post", 
          data:{Employee_Group_TMA:Employee_Group_TMA},
          success:function(data){
            if(data == 1){
            loadEmployee_Group_TMA();
            $("#form").trigger("reset"); 
            }
            else{
              alert ("Can't Save Record");
            }
          }

        });
            });
            $("#Employee_Sub_Group_TMA_btn").on("click",function(e){
        e.preventDefault();
        var Employee_Sub_Group_TMA = $("#Employee_Sub_Group_TMA").val();
        $.ajax({
          url:"ajex/Employee_Sub_Group_TMA.php",
          type:"Post", 
          data:{Employee_Sub_Group_TMA:Employee_Sub_Group_TMA},
          success:function(data){
            if(data == 1){
            loadEmployee_Sub_Group_TMA();
            $("#form").trigger("reset"); 
            }
            else{
              alert ("Can't Save Record");
            }
          }

        });
            });
            $("#Employee_Quota_TMA_btn").on("click",function(e){
        e.preventDefault();
        var Employee_Quota_TMA = $("#Employee_Quota_TMA").val();
        $.ajax({
          url:"ajex/Employee_Quota_TMA.php",
          type:"Post", 
          data:{Employee_Quota_TMA:Employee_Quota_TMA},
          success:function(data){
            if(data == 1){
            loadEmployee_Quota_TMA();
            $("#form").trigger("reset"); 
            }
            else{
              alert ("Can't Save Record");
            }
          }

        });
            });
            $("#Grade_TMA_btn").on("click",function(e){
        e.preventDefault();
        var Grade_TMA = $("#Grade_TMA").val();
        $.ajax({
          url:"ajex/Grade_TMA.php",
          type:"Post", 
          data:{Grade_TMA:Grade_TMA},
          success:function(data){
            if(data == 1){
            loadGrade_TMA();
            $("#form").trigger("reset"); 
            }
            else{
              alert ("Can't Save Record");
            }
          }

        });
            });
            $("#Department_TMA_btn").on("click",function(e){
        e.preventDefault();
        var Department_TMA = $("#Department_TMA").val();
        $.ajax({
          url:"ajex/Department_TMA.php",
          type:"Post", 
          data:{Department_TMA:Department_TMA},
          success:function(data){
            if(data == 1){
            loadDepartment_TMA();
            $("#form").trigger("reset"); 
            }
            else{
              alert ("Can't Save Record");
            }
          }

        });
            });
            $("#Job_Tiltle_TMA_btn").on("click",function(e){
        e.preventDefault();
        var Job_Tiltle_TMA = $("#Job_Tiltle_TMA").val();
        $.ajax({
          url:"ajex/Job_Tiltle_TMA.php",
          type:"Post", 
          data:{Job_Tiltle_TMA:Job_Tiltle_TMA},
          success:function(data){
            if(data == 1){
            loadJob_Tiltle_TMA();
            $("#form").trigger("reset"); 
            }
            else{
              alert ("Can't Save Record");
            }
          }

        });
            });
            $("#Type_TMA_btn").on("click",function(e){
        e.preventDefault();
        var Type_TMA = $("#Type_TMA").val();
        $.ajax({
          url:"ajex/Type_TMA.php",
          type:"Post", 
          data:{Type_TMA:Type_TMA},
          success:function(data){
            if(data == 1){
            loadType_TMA();
            $("#form").trigger("reset"); 
            }
            else{
              alert ("Can't Save Record");
            }
          }

        });
            });
            $("#Salary_Mode_TMA_btn").on("click",function(e){
        e.preventDefault();
        var Salary_Mode_TMA = $("#Salary_Mode_TMA").val();
        $.ajax({
          url:"ajex/Salary_Mode_TMA.php",
          type:"Post", 
          data:{Salary_Mode_TMA:Salary_Mode_TMA},
          success:function(data){
            if(data == 1){
            loadSalary_Mode_TMA();
            $("#form").trigger("reset"); 
            }
            else{
              alert ("Can't Save Record");
            }
          }

        });
            });
            $("#Status_TMA_btn").on("click",function(e){
        e.preventDefault();
        var Status_TMA = $("#Status_TMA").val();
        $.ajax({
          url:"ajex/Status_TMA.php",
          type:"Post", 
          data:{Status_TMA:Status_TMA},
          success:function(data){
            if(data == 1){
            loadStatus_TMA();
            $("#form").trigger("reset"); 
            }
            else{
              alert ("Can't Save Record");
            }
          }

        });
            });
    


            function loadEmpGroup(){ // renamed the function here
        $.ajax({
            url : "ajex/EmpGroup - Copy.php",
            type:"POST",
            success : function(data){
                $("#EmpGroup_drop").html(data);
            }
        });
    }
      loadEmpGroup();
      function loadEmployee_Class(){
        $.ajax({
          url : "ajex/Employee_Class - Copy.php",
          type:"POST",
          success : function(data){
            $("#Employee_Class_drop").html(data);
          }
        });
      }
      loadEmployee_Class();
      function loadEmployee_Group(){
        $.ajax({
          url : "ajex/Employee_Group - Copy.php",
          type:"POST",
          success : function(data){
            $("#Employee_Group_drop").html(data);
          }
        });
      }
      loadEmployee_Group();
      function loadEmployee_Sub_Group(){
        $.ajax({
          url : "ajex/Employee_Sub_Group - Copy.php",
          type:"POST",
          success : function(data){
            $("#Employee_Sub_Group_drop").html(data);
          }
        });
      }
      loadEmployee_Sub_Group();
      function loadEmployee_Quota(){
        $.ajax({
          url : "ajex/Employee_Quota - Copy.php",
          type:"POST",
          success : function(data){
            $("#Employee_Quota_drop").html(data);
          }
        });
      }
      loadEmployee_Quota();
      function loadGrade(){
        $.ajax({
          url : "ajex/Grade - Copy.php",
          type:"POST",
          success : function(data){
            $("#Grade_drop").html(data);
          }
        });
      }
      loadGrade();
      function loadDepartment(){
        $.ajax({
          url : "ajex/Department - Copy.php",
          type:"POST",
          success : function(data){
            $("#Department_drop").html(data);
          }
        });
      }
      loadDepartment();
      function loadJob_Tiltle(){
        $.ajax({
          url : "ajex/Job_Tiltle - Copy.php",
          type:"POST",
          success : function(data){
            $("#Job_Tiltle_drop").html(data);
          }
        });
      }
      loadJob_Tiltle();
      function loadType(){
        $.ajax({
          url : "ajex/Type - Copy.php",
          type:"POST",
          success : function(data){
            $("#Type_drop").html(data);
          }
        });
      }
      loadType();
      function loadSalary_Mode(){
        $.ajax({
          url : "ajex/Salary_Mode - Copy.php",
          type:"POST",
          success : function(data){
            $("#Salary_Mode_drop").html(data);
          }
        });
      }
      loadSalary_Mode();
      function loadStatus(){
        $.ajax({
          url : "ajex/Status - Copy.php",
          type:"POST",
          success : function(data){
            $("#Status_drop").html(data);
          }
        });
      }
      loadStatus();
      function loadEmployement_Group_TMA(){
        $.ajax({
          url : "ajex/Employement_Group_TMA - Copy.php",
          type:"POST",
          success : function(data){
            $("#Employement_Group_TMA_drop").html(data);
          }
        });
      }
      loadEmployement_Group_TMA();
      function loadEmployee_Class_TMA(){
        $.ajax({
          url : "ajex/Employee_Class_TMA - Copy.php",
          type:"POST",
          success : function(data){
            $("#Employee_Class_TMA_drop").html(data);
          }
        });
      }
      loadEmployee_Class_TMA();
      function loadEmployee_Group_TMA(){
        $.ajax({
          url : "ajex/Employee_Group_TMA - Copy.php",
          type:"POST",
          success : function(data){
            $("#Employee_Group_TMA_drop").html(data);
          }
        });
      }
      loadEmployee_Group_TMA();
      function loadEmployee_Sub_Group_TMA(){
        $.ajax({
          url : "ajex/Employee_Sub_Group_TMA - Copy.php",
          type:"POST",
          success : function(data){
            $("#Employee_Sub_Group_TMA_drop").html(data);
          }
        });
      }
      loadEmployee_Sub_Group_TMA();
      function loadEmployee_Quota_TMA(){
        $.ajax({
          url : "ajex/Employee_Quota_TMA - Copy.php",
          type:"POST",
          success : function(data){
            $("#Employee_Quota_TMA_drop").html(data);
          }
        });
      }
      loadEmployee_Quota_TMA();
       function loadGrade_TMA(){
        $.ajax({
          url : "ajex/Grade_TMA - Copy.php",
          type:"POST",
          success : function(data){
            $("#Grade_TMA_drop").html(data);
          }
        });
      }
      loadGrade_TMA();
      function loadDepartment_TMA(){
        $.ajax({
          url : "ajex/Department_TMA - Copy.php",
          type:"POST",
          success : function(data){
            $("#Department_TMA_drop").html(data);
          }
        });
      }
      loadDepartment_TMA();
      function loadJob_Tiltle_TMA(){
        $.ajax({
          url : "ajex/Job_Tiltle_TMA - Copy.php",
          type:"POST",
          success : function(data){
            $("#Job_Tiltle_TMA_drop").html(data);
          }
        });
      }
      loadJob_Tiltle_TMA();
      function loadType_TMA(){
        $.ajax({
          url : "ajex/Type_TMA - Copy.php",
          type:"POST",
          success : function(data){
            $("#Type_TMA_drop").html(data);
          }
        });
      }
      loadType_TMA();
      function loadSalary_Mode_TMA(){
        $.ajax({
          url : "ajex/Salary_Mode_TMA - Copy.php",
          type:"POST",
          success : function(data){
            $("#Salary_Mode_TMA_drop").html(data);
          }
        });
      }
      loadSalary_Mode_TMA();
      function loadStatus_TMA(){
        $.ajax({
          url : "ajex/Status_TMA - Copy.php",
          type:"POST",
          success : function(data){
            $("#Status_TMA_drop").html(data);
          }
        });
      }
      loadStatus_TMA();


      $(document).on("click", ".delete-btn", function() {
    var did = $(this).data('did');
    $.ajax({
        url: "ajex/deleteEmpGroup.php",
        type: "POST",
        data: { did: did },
        success: function(data) {
            if (data == 1) {
              loadEmpGroup();
              loadEmployee_Class();
              loadEmployee_Group();
              loadEmployee_Sub_Group();
              loadEmployee_Quota();
              loadGrade();
              loadDepartment();
              loadJob_Tiltle();
              loadType();
              loadSalary_Mode();
              loadStatus();
              loadEmployement_Group_TMA();
              loadEmployee_Class_TMA();
              loadEmployee_Group_TMA();
              loadEmployee_Sub_Group_TMA();
              loadEmployee_Quota_TMA();
              loadGrade_TMA();
              loadDepartment_TMA();
              loadJob_Tiltle_TMA();
              loadType_TMA();
              loadSalary_Mode_TMA();
              loadStatus_TMA(); // Refresh the list after deletion
            } else {
                alert("Can't Delete Record");
            }
        }
    });
});


   });
</script>

</body>
</html>
<?php 
  }
?>