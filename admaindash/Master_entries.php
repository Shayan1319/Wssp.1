<?php
include('../link/desigene/db.php');
session_start();
error_reporting(0);
if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber']) || $_SESSION['Designation'] != 'Admin') {
  // Log the unauthorized access attempt for auditing purposes
  error_log("Unauthorized access attempt. User: {$_SESSION['loginid']}");
  
  // Redirect to the logout page
  header("Location: ../logout.php");
  exit;
   // Ensure that the script stops execution after the header redirection
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
                
                    <div class="row my-4">
                      <div class="col-md-12 ">
                        <div class="card card-success border border-2 border-dark bg-light">
                          <div style="background-color: darkblue;" class="card-header text-white fw-bold">
                            <div class="row">
                              <div class="col-sm-12 col-lg-5">
                                <div class="card-title text-white" style="width: fit-content;">Employment Information
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
                              
                            <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Parent</th>
                    <th>Child</th>
                    <th>Drop Down</th>
                    <th>Save</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                  <td colspan="4" class="text-center" ><h3>Religion</h3></td>
                </tr>
                <tr>
                  <td></td>
                  <td><label>Religion</label><input class="form-control" type="text" placeholder="Add Option" name="" id="Religion"></td>
                  <td><div class="dropdown"><button type="button" class="btn bg-white border border-dark form-control dropdown-toggle" data-bs-toggle="dropdown">Select</button><ul class="dropdown-menu" id="Religion_drop" ></ul></div></td>
                  <td><button id="Religion_btn" class="btn btn-primary" type=""><i class="fa-solid fa-plus"></i></button></td>
                </tr>
                <tr>
                  <td colspan="4" class="text-center" >
                    <h3>Employment data</h3>
                </td>
                </tr>
                
                  <tr>

                  <td>
                  </td>
                  <td><label>Employment Group</label><input class="form-control" type="text" placeholder="Add Option" name="EmpGroup" id="EmpGroup"></td>
                  <td><div class="dropdown"><button type="button" class="btn bg-white border border-dark form-control dropdown-toggle" data-bs-toggle="dropdown">Select</button><ul class="dropdown-menu" id="EmpGroup_drop" ></ul></div></td>
                  <td><button id="EmpGroup_btn" class="btn btn-primary" type=""><i class="fa-solid fa-plus"></i></button></td>
                </tr>
                <tr>
                  <td>
                    <label for="">Type Parent</label>
                    <select name="" class="form-select" id="Employee_Class_Parent">
                      <option value="">Select</option>
                      <option value="2">WSSC</option>
                      <option value="3">TMA</option>
                    </select>
                  </td>
                  <td><label>Employee Class</label><input class="form-control" type="text" placeholder="Add Option" name="Employee_Class" id="Employee_Class"></td>
                  <td><div class="dropdown"><button type="button" class="btn bg-white border border-dark form-control dropdown-toggle" data-bs-toggle="dropdown">Select</button><ul class="dropdown-menu" id="Employee_Class_drop" ></ul></div></td>
                  <td><button id="Employee_Class_btn" class="btn btn-primary" type=""><i class="fa-solid fa-plus"></i></button></td>
                </tr>
                <tr>
                  <td>
                  <label>Employee Class Parent</label>
                    <select name="" class="form-select" id="Employee_Group_Parent">
                    </select>
                  </td>
                  <td><label>Employee Group</label><input class="form-control" type="text" placeholder="Add Option" name="Employee_Group" id="Employee_Group"></td>
                  <td><div class="dropdown"><button type="button" class="btn bg-white border border-dark form-control dropdown-toggle" data-bs-toggle="dropdown">Select</button><ul class="dropdown-menu" id="Employee_Group_drop" ></ul></div></td>
                  <td><button id="Employee_Group_btn" class="btn btn-primary" type=""><i class="fa-solid fa-plus"></i></button></td>
                </tr>
                <tr>
                  <td>
                  <label>Employee Group Parent</label>
                    <select name="" class="form-select" id="Employee_Sub_Group_Parent">
                    </select>
                  </td>
                  <td><label>Employee Sub Group</label><input class="form-control" type="text" placeholder="Add Option" name="Employee_Sub_Group" id="Employee_Sub_Group"></td>
                  <td><div class="dropdown"><button type="button" class="btn bg-white border border-dark form-control dropdown-toggle" data-bs-toggle="dropdown">Select</button><ul class="dropdown-menu" id="Employee_Sub_Group_drop" ></ul></div></td>
                  <td><button id="Employee_Sub_Group_btn" class="btn btn-primary" type=""><i class="fa-solid fa-plus"></i></button></td>
                </tr>
                <tr>
                  <td></td>
                  <td><label>Employee Quota</label><input class="form-control" type="text" placeholder="Add Option" name="Employee_Quota" id="Employee_Quota"></td>
                  <td><div class="dropdown"><button type="button" class="btn bg-white border border-dark form-control dropdown-toggle" data-bs-toggle="dropdown">Select</button><ul class="dropdown-menu" id="Employee_Quota_drop" ></ul></div></td>
                  <td><button id="Employee_Quota_btn" class="btn btn-primary" type=""><i class="fa-solid fa-plus"></i></button></td>
                </tr>
                <tr>
                  <td></td>
                  <td><label>Salary Bank</label><input class="form-control" type="text" placeholder="Add Option" name="SalaryBank" id="SalaryBank"></td>
                  <td><div class="dropdown"><button type="button" class="btn bg-white border border-dark form-control dropdown-toggle" data-bs-toggle="dropdown">Select</button><ul class="dropdown-menu" id="SalaryBank_drop" ></ul></div></td>
                  <td><button id="SalaryBank_btn" class="btn btn-primary" type=""><i class="fa-solid fa-plus"></i></button></td>
                </tr>
                <tr>
                  <td>
                    <label>Salary Bank Parent</label>
                    <select name="" class="form-select" id="SalaryBankBranch_Parent">
                    </select>
                  </td>
                  <td><label>Salary Bank Branch</label><input class="form-control" type="text" placeholder="Add Option" name="" id="SalaryBankBranch"></td>
                  <td><div class="dropdown"><button type="button" class="btn bg-white border border-dark form-control dropdown-toggle" data-bs-toggle="dropdown">Select</button><ul class="dropdown-menu" id="SalaryBankBranch_drop" ></ul></div></td>
                  <td><button id="SalaryBankBranch_btn" class="btn btn-primary" type=""><i class="fa-solid fa-plus"></i></button></td>
                </tr>
                <tr>
                  <td></td>
                  <td><label>Pay Type</label><input class="form-control" type="text" placeholder="Add Option" name="PayType" id="PayType"></td>
                  <td><div class="dropdown"><button type="button" class="btn bg-white border border-dark form-control dropdown-toggle" data-bs-toggle="dropdown">Select</button><ul class="dropdown-menu" id="PayType_drop" ></ul></div></td>
                  <td><button id="PayType_btn" class="btn btn-primary" type=""><i class="fa-solid fa-plus"></i></button></td>
                </tr>
                <tr>
                  <td></td>
                  <td><label>Weekly Working Days</label><input class="form-control" type="text" placeholder="Add Option" name="WeeklyWorkingDays" id="WeeklyWorkingDays"></td>
                  <td>                                <div class="dropdown"><button type="button" class="btn bg-white border border-dark form-control dropdown-toggle" data-bs-toggle="dropdown">Select</button><ul class="dropdown-menu" id="WeeklyWorkingDays_drop" ></ul></div></td>
                  <td>                                        <button id="WeeklyWorkingDays_btn" class="btn btn-primary" type=""><i class="fa-solid fa-plus"></i></button></td>
                </tr>
                <tr>
                  <td></td>
                  <td><label>Employee Pay Classification</label><input class="form-control" type="text" placeholder="Add Option" name="Employee_Pay_Classification" id="Employee_Pay_Classification"></td>
                  <td><div class="dropdown"><button type="button" class="btn bg-white border border-dark form-control dropdown-toggle" data-bs-toggle="dropdown">Select</button><ul class="dropdown-menu" id="Employee_Pay_Classification_drop" ></ul></div></td>
                  <td><button id="Employee_Pay_Classification_btn" class="btn btn-primary" type=""><i class="fa-solid fa-plus"></i></button></td>
                </tr>
                <tr>
                  <td>
                  <label for="">Type Parent</label>
                    <select name="" class="form-select" id="Grade_Parent">
                    <option value="">Select</option>
                      <option value="2">WSSC</option>
                      <option value="3">TMA</option>
                    </select>
                  </td>
                  <td><label>Grade</label><input class="form-control" type="text" placeholder="Add Option" name="Grade" id="Grade"></td>
                  <td><div class="dropdown"><button type="button" class="btn bg-white border border-dark form-control dropdown-toggle" data-bs-toggle="dropdown">Select</button><ul class="dropdown-menu" id="Grade_drop" ></ul></div></td>
                  <td><button id="Grade_btn" class="btn btn-primary" type=""><i class="fa-solid fa-plus"></i></button></td>
                </tr>
                <tr>
                  <td>
                    <label for="">Type Parent</label>
                    <select name="" class="form-select" id="Department_Parent">
                      <option value="">Select</option>
                      <option value="2">WSSC</option>
                      <option value="3">TMA</option>
                    </select>
                  </td>
                  <td><label>Department</label><input class="form-control" type="text" placeholder="Add Option" name="Department" id="Department"></td>
                  <td><div class="dropdown"><button type="button" class="btn bg-white border border-dark form-control dropdown-toggle" data-bs-toggle="dropdown">Select</button><ul class="dropdown-menu" id="Department_drop" ></ul></div></td>
                  <td><button id="Department_btn" class="btn btn-primary" type=""><i class="fa-solid fa-plus"></i></button></td>
                </tr>
                <tr>
                  <td>
                    <label for="">Type Parent</label>
                    <select name="" class="form-select" id="Job_Tiltle_Parent">
                      <option value="">Select</option>
                      <option value="2">WSSC</option>
                      <option value="3">TMA</option>
                    </select>
                  </td>
                  <td><label>Job Title</label><input class="form-control" type="text" placeholder="Add Option" name="Job_Tiltle" id="Job_Tiltle"></td>
                  <td>                                <div class="dropdown"><button type="button" class="btn bg-white border border-dark form-control dropdown-toggle" data-bs-toggle="dropdown">Select</button><ul class="dropdown-menu" id="Job_Tiltle_drop" ></ul></div></td>
                  <td>                                        <button id="Job_Tiltle_btn" class="btn btn-primary" type=""><i class="fa-solid fa-plus"></i></button></td>
                </tr>
                <tr>
                  <td></td>
                  <td>                                  <label>Salary Mode</label><input class="form-control" type="text" placeholder="Add Option" name="Salary_Mode" id="Salary_Mode"></td>
                  <td>                                <div class="dropdown"><button type="button" class="btn bg-white border border-dark form-control dropdown-toggle" data-bs-toggle="dropdown">Select</button><ul class="dropdown-menu" id="Salary_Mode_drop" ></ul></div></td>
                  <td>                                        <button id="Salary_Mode_btn" class="btn btn-primary" type=""><i class="fa-solid fa-plus"></i></button></td>
                </tr>

                <!-- Status -->
                <tr>
                  <td></td>
                  <td> <label>Status</label><input class="form-control" type="text" placeholder="Add Option" name="Status" id="Status"></td>
                  <td>
                  <div class="dropdown"><button type="button" class="btn bg-white border border-dark form-control dropdown-toggle" data-bs-toggle="dropdown">Select</button><ul class="dropdown-menu" id="Status_drop" ></ul></div>                                
                  </td>
                  <td>
                  <button id="Status_btn" class="btn btn-primary" type=""><i class="fa-solid fa-plus"></i></button>
                  </td>
                </tr>
                <tr>
                  <td colspan="4" class="text text-center"><h4>Depended</h4></td>
                </tr>
                <tr>
                  <td></td>
                  <td><label>Depended name</label><input class="form-control" type="text" placeholder="Add Option" name="Dependertype" id="Dependertype"></td>
                  <td><div class="dropdown"><button type="button" class="btn bg-white border border-dark form-control dropdown-toggle" data-bs-toggle="dropdown">Select</button><ul class="dropdown-menu" id="Dependertype_drop" ></ul></div></td>
                  <td><button id="Dependertype_btn" class="btn btn-primary" type=""><i class="fa-solid fa-plus"></i></button></td>
                </tr>
                <tr>
                  <td colspan="4" class="text-center" >
                    <h3>Leave</h3>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td><label>Leave type</label><input class="form-control" type="text" placeholder="Add Option" name="leave" id="leave"></td>
                  <td><div class="dropdown"><button type="button" class="btn bg-white border border-dark form-control dropdown-toggle" data-bs-toggle="dropdown">Select</button><ul class="dropdown-menu" id="leave_drop" ></ul></div></td>
                  <td><button id="leave_btn" class="btn btn-primary" type=""><i class="fa-solid fa-plus"></i></button></td>
                </tr>
            </tbody>
        </table>


                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                 
                </div>
              </div>
        </div>
<?php include('link/desigene/script.php')?>

<script>
   $(document).ready(function(){
    $("#Religion_btn").on("click",function(e){
        e.preventDefault();
        var Religion = $("#Religion").val();
        $.ajax({
          url:"ajex/Religion.php",
          type:"Post", 
          data:{Religion:Religion},
          success:function(data){
            if(data == 1){
            loadReligion();
            $("#form").trigger("reset"); 
            }
            else{
              alert ("Can't Save Record");
            }
          }

        });
            });
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
            $("#Employee_Pay_Classification_btn").on("click",function(e){
        e.preventDefault();
        var Employee_Pay_Classification = $("#Employee_Pay_Classification").val();

        $.ajax({
          url:"ajex/Employee_Pay_Classification.php",
          type:"Post", 
          data:{Employee_Pay_Classification:Employee_Pay_Classification},
          success:function(data){
            alert(data);
            
            loadEmployee_Pay_Classification();
            $("#form").trigger("reset"); 
          }

        });
            });
            $("#Employee_Class_btn").on("click",function(e){
        e.preventDefault();
        var Employee_Class = $("#Employee_Class").val();
        var Employee_Class_Parent = $("#Employee_Class_Parent").val();
        $.ajax({
          url:"ajex/Employee_Class.php",
          type:"Post", 
          data:{Employee_Class:Employee_Class,Employee_Class_Parent:Employee_Class_Parent},
          success:function(data){
            if(data == 1){
            loadEmployee_Class();
            loadEmployee_Class_Parent();
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
        var Employee_Group_Parent = $("#Employee_Group_Parent").val();
        $.ajax({
          url:"ajex/Employee_Group.php",
          type:"Post", 
          data:{Employee_Group:Employee_Group,Employee_Group_Parent:Employee_Group_Parent},
          success:function(data){
            alert(data);
            loadEmployee_Group();
            Employee_Sub_Group_Parent();
            $("#form").trigger("reset"); 
           
          }
        });
            });
      
            $("#Employee_Sub_Group_btn").on("click", function(e) {
    e.preventDefault();
    var Employee_Sub_Group = $("#Employee_Sub_Group").val();
    var Employee_Sub_Group_Parent = $("#Employee_Sub_Group_Parent").val();

    $.ajax({
        url: "ajex/Employee_Sub_Group.php",
        type: "POST",
        data: {
            Employee_Sub_Group: Employee_Sub_Group,
            Employee_Sub_Group_Parent: Employee_Sub_Group_Parent
        },
        success: function(response) {
            loadEmployee_Sub_Group(); // Ensure this function is defined
            $("#form").trigger("reset"); 
            alert(response);
        },
        error: function(xhr, status, error) {
            console.error("AJAX Error:", status, error);
        }
    });
});

            
      function Employee_Sub_Group_Parent(){
        $.ajax({
          url : "ajex/Employee_Group - Copy copy.php",
          type:"POST",
          success : function(data){
            $("#Employee_Sub_Group_Parent").html(data);
          }
        });
      }
      Employee_Sub_Group_Parent();

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
            $("#PayType_btn").on("click",function(e){
        e.preventDefault();
        var PayType = $("#PayType").val();
        $.ajax({
          url:"ajex/PayType.php",
          type:"Post", 
          data:{PayType:PayType},
          success:function(data){
            if(data == 1){
            loadPayType();
            $("#form").trigger("reset"); 
            }
            else{
              alert ("Can't Save Record");
            }
          }

        });
            });
            $("#WeeklyWorkingDays_btn").on("click",function(e){
        e.preventDefault();
        var WeeklyWorkingDays = $("#WeeklyWorkingDays").val();
        $.ajax({
          url:"ajex/WeeklyWorkingDays.php",
          type:"Post", 
          data:{WeeklyWorkingDays:WeeklyWorkingDays},
          success:function(data){
            if(data == 1){
            loadWeeklyWorkingDays();
            $("#form").trigger("reset"); 
            }
            else{
              alert ("Can't Save Record");
            }
          }

        });
            });
            $("#SalaryBank_btn").on("click",function(e){
        e.preventDefault();
        var SalaryBank = $("#SalaryBank").val();
        $.ajax({
          url:"ajex/SalaryBank.php",
          type:"Post", 
          data:{SalaryBank:SalaryBank},
          success:function(data){
            if(data == 1){
            loadSalaryBank();
            loadSalaryBankBranch_Parant();
            $("#form").trigger("reset"); 
            }
            else{
              alert ("Can't Save Record");
            }
          }

        });
            });

            $("#SalaryBankBranch_btn").on("click",function(e){
        e.preventDefault();
        var SalaryBankBranch = $("#SalaryBankBranch").val();
        var SalaryBankBranch_Parent = $("#SalaryBankBranch_Parent").val();
        $.ajax({
          url:"ajex/SalaryBankBranch.php",
          type:"Post", 
          data:{SalaryBankBranch:SalaryBankBranch,SalaryBankBranch_Parent:SalaryBankBranch_Parent},
          success:function(data){
            if(data == 1){
              loadSalaryBankBranch();
              $("#form").trigger("reset"); 
            }
            else{
              alert ("Can't Save Record");
            }
          }
        });
            });
            function loadSalaryBankBranch_Parant(){
        $.ajax({
          url : "ajex/SalaryBankBranch - Copy copy.php",
          type:"POST",
          success : function(data){
            $("#SalaryBankBranch_Parent").html(data);
          }
        });
      }
      loadSalaryBankBranch_Parant();

            $("#Grade_btn").on("click",function(e){
        e.preventDefault();
        var Grade = $("#Grade").val();
        var Grade_Parent = $("#Grade_Parent").val();
        $.ajax({
          url:"ajex/Grade.php",
          type:"Post", 
          data:{Grade:Grade,Grade_Parent:Grade_Parent},
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
        var Department_Parent = $("#Department_Parent").val();
        $.ajax({
          url:"ajex/Department.php",
          type:"Post", 
          data:{Department:Department,Department_Parent:Department_Parent},
          success:function(data){
            if(data==1){
            loadDepartment();
            $("#form").trigger("reset");}
            else{
              alert ("Can't Save Record");
            } 
          }
        });
            });

            
            $("#Job_Tiltle_btn").on("click",function(e){

        e.preventDefault();
        var Job_Tiltle = $("#Job_Tiltle").val();
        var Job_Tiltle_Parent = $("#Job_Tiltle_Parent").val();
        $.ajax({
          url:"ajex/Job_Tiltle.php",
          type:"Post", 
          data:{Job_Tiltle:Job_Tiltle,Job_Tiltle_Parent:Job_Tiltle_Parent},
          success:function(data){
            alert(data);
            loadJob_Tiltle();
            $("#form").trigger("reset"); 
           
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
            $("#Dependertype_btn").on("click",function(e){
        e.preventDefault();
        var Dependertype = $("#Dependertype").val();
        $.ajax({
          url:"ajex/Dependertype.php",
          type:"Post", 
          data:{Dependertype:Dependertype},
          success:function(data){
            if(data == 1){
            loadDependertype();
            $("#form").trigger("reset"); 
            }
            else{
              alert ("Can't Save Record");
            }
          }

        });
            });
            $("#leave_btn").on("click",function(e){
        e.preventDefault();
        var leave = $("#leave").val();
        $.ajax({
          url:"ajex/leave.php",
          type:"Post", 
          data:{leave:leave},
          success:function(data){
            if(data == 1){
            loadleave();
            $("#form").trigger("reset"); 
            }
            else{
              alert ("Can't Save Record");
            }
          }

        });
            });
    


            function loadReligion(){ // renamed the function here
        $.ajax({
            url : "ajex/Religion - Copy.php",
            type:"POST",
            success : function(data){
                $("#Religion_drop").html(data);
            }
        });
    }
      loadReligion();
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
      
      function loadEmployee_Pay_Classification() {
    $.ajax({
        url: "ajex/Employee_Pay_Classification - Copy.php",
        type: "POST",
        success: function (data) {
            console.log("Data from Employee_Pay_Classification - Copy.php:", data);
            $("#Employee_Pay_Classification_drop").html(data);
        }
    });
}

      loadEmployee_Pay_Classification();
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
      function loadEmployee_Class_Parent(){
        $.ajax({
          url : "ajex/Employee_Class - Copy copy.php",
          type:"POST",
          success : function(data){
            $("#Employee_Group_Parent").html(data);
          }
        });
      }
      loadEmployee_Class_Parent();
      
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
      Employee_Sub_Group_Parent();
      loadEmployee_Class_Parent();
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

      function loadSalaryBank(){
        $.ajax({
          url : "ajex/SalaryBank - Copy.php",
          type:"POST",
          success : function(data){
            $("#SalaryBank_drop").html(data);
          }
        });
      }
      loadSalaryBank();
      function loadSalaryBankBranch(){
        $.ajax({
          url : "ajex/SalaryBankBranch - Copy.php",
          type:"POST",
          success : function(data){
            $("#SalaryBankBranch_drop").html(data);
          }
        });
      }
      loadSalaryBankBranch();
      function loadPayType(){
        $.ajax({
          url : "ajex/PayType - Copy.php",
          type:"POST",
          success : function(data){
            $("#PayType_drop").html(data);
          }
        });
      }
      loadPayType();
      function loadWeeklyWorkingDays(){
        $.ajax({
          url : "ajex/WeeklyWorkingDays - Copy.php",
          type:"POST",
          success : function(data){
            $("#WeeklyWorkingDays_drop").html(data);
          }
        });
      }
      loadWeeklyWorkingDays();

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

      function loadDependertype(){
        $.ajax({
          url : "ajex/dependertype - Copy.php",
          type:"POST",
          success : function(data){
            $("#Dependertype_drop").html(data);
          }
        });
      }
      loadDependertype();

      function loadleave(){
        $.ajax({
          url : "ajex/leave - Copy.php",
          type:"POST",
          success : function(data){
            $("#leave_drop").html(data);
          }
        });
      }
      loadleave();


      $(document).on("click", ".delete-btn", function() {
    var did = $(this).data('did');
    $.ajax({
        url: "ajex/deleteEmpGroup.php",
        type: "POST",
        data: { did: did },
        success: function(data) {
            if (data == 1) {
              loadReligion();
              loadEmpGroup();
              loadEmployee_Pay_Classification();
              loadEmployee_Class();
              loadEmployee_Group();
              loadEmployee_Class_Parent();
              loadEmployee_Sub_Group();
              Employee_Sub_Group_Parent();
              loadEmployee_Quota();
              loadSalaryBank();
              loadSalaryBankBranch();
              loadPayType();
              loadWeeklyWorkingDays();
              loadGrade();
              loadDepartment();
              loadDependertype();
              loadJob_Tiltle();
              loadSalary_Mode();
              loadStatus();
              Dependertype();// Refresh the list after deletion
              leave();// Refresh the list after deletion
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