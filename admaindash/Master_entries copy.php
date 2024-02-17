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
                                  <label>Salary Bank</label>
                                  <div class="row my-2">
                                    <div class="col-9">
                                        <input class="form-control" type="text" placeholder="Add Option" name="SalaryBank" id="SalaryBank">
                                    </div>
                                    <div class="col-3">
                                        <button id="SalaryBank_btn" class="btn btn-primary" type=""><i class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="dropdown">
                                      <button type="button" class="btn bg-white border border-dark form-control dropdown-toggle" data-bs-toggle="dropdown">
                                      Select
                                      </button>
                                      <ul class="dropdown-menu" id="SalaryBank_drop" >

                                      </ul>
                                  </div>                                
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Salary Bank Branch</label>
                                  <div class="row my-2">
                                    <div class="col-9">
                                        <input class="form-control" type="text" placeholder="Add Option" name="" id="SalaryBankBranch">
                                    </div>
                                    <div class="col-3">
                                        <button id="SalaryBankBranch_btn" class="btn btn-primary" type=""><i class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="dropdown">
                                      <button type="button" class="btn bg-white border border-dark form-control dropdown-toggle" data-bs-toggle="dropdown">
                                      Select
                                      </button>
                                      <ul class="dropdown-menu" id="SalaryBankBranch_drop" >

                                      </ul>
                                  </div>                                
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Pay Type</label>
                                  <div class="row my-2">
                                    <div class="col-9">
                                        <input class="form-control" type="text" placeholder="Add Option" name="PayType" id="PayType">
                                    </div>
                                    <div class="col-3">
                                        <button id="PayType_btn" class="btn btn-primary" type=""><i class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="dropdown">
                                      <button type="button" class="btn bg-white border border-dark form-control dropdown-toggle" data-bs-toggle="dropdown">
                                      Select
                                      </button>
                                      <ul class="dropdown-menu" id="PayType_drop" >

                                      </ul>
                                  </div>                                
                                </div>
                              </div>
                              <div class="col-md-4 my-2">
                                <div class="form-group">
                                  <label>Weekly Working Days</label>
                                  <div class="row my-2">
                                    <div class="col-9">
                                        <input class="form-control" type="text" placeholder="Add Option" name="WeeklyWorkingDays" id="WeeklyWorkingDays">
                                    </div>
                                    <div class="col-3">
                                        <button id="WeeklyWorkingDays_btn" class="btn btn-primary" type=""><i class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="dropdown">
                                      <button type="button" class="btn bg-white border border-dark form-control dropdown-toggle" data-bs-toggle="dropdown">
                                      Select
                                      </button>
                                      <ul class="dropdown-menu" id="WeeklyWorkingDays_drop" >

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
        $.ajax({
          url:"ajex/SalaryBankBranch.php",
          type:"Post", 
          data:{SalaryBankBranch:SalaryBankBranch},
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
              loadSalaryBank();
              loadSalaryBankBranch();
              loadPayType();
              loadWeeklyWorkingDays();
              loadGrade();
              loadDepartment();
              loadJob_Tiltle();
              loadType();
              loadSalary_Mode();
              loadStatus();// Refresh the list after deletion
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