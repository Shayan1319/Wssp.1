<?php
session_start();
error_reporting(0);
include('link/desigene/db.php');

if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber']) || $_SESSION['Designation'] != 'Admin') {
    error_log("Unauthorized access attempt. User: {$_SESSION['loginid']}");
    header("Location: ../logout.php");
    exit;
} else {
?><!DOCTYPE html>
<html lang="en">
<head>
   <?php include('link/links.php')?>
</head>
<body>
    <?php include('link/desigene/sidebar.php')?>
    <div id="main">
        <?php include('link/desigene/navbar.php')?>
        <div class="container-fluid m-auto p-5">
            <div class="card-body">
                <div class="row mt-2">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
                      <table id="employee" class="table table-bordered">
                        <thead>
                          <tr>
                            <th>S.No</th>
                            <th>Employee Number</th>
                            <th>Employee Name</th>
                            <th>Employee Email</th>
                            <th>Mobile Number</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody id="table-data">
                           
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>

            <!-- Modal for Update -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Promotion Update</h1>
                            <button type="button" class="btn-close btn btn-danger" style="background-color: #ff0505 !important; color: #fff !important;" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="formdata" action="#" method="post">
                                <div class="row">
                                    <div class="mb-4">
                                        <div class="form-outline">
                                            <input type="number" id="Id" name="Id" hidden >
                                            <input type="number" id="IdUpdateemp" name="IdUpdateemp" hidden >
                                            <label class="form-label" for="firstName">Full Name</label>
                                            <input type="text" id="FullName" name="FullName" class="form-control form-control-lg" />
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="form-outline">
                                            <label class="form-label">Gender</label>
                                            <select id="Gender" name="Gender" class="form-control select2" tabindex="-1" aria-hidden="true">
                                                <option value="">Choose</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-4 pb-2">
                                        <div class="form-outline">
                                            <label class="form-label" for="emailAddress">Email</label>
                                            <input type="email" name="Email" id="Email" class="form-control form-control-lg" required />
                                            <input type="email" hidden name="Gmailemp" id="Gmailemp" class="form-control form-control-lg" required />
                                        </div>
                                    </div>
                                    <div class="mb-4 pb-2">
                                        <div class="form-outline">
                                            <label class="form-label" for="password">Password</label>
                                            <input type="text" id="Password" name="Password" class="form-control form-control-lg" value="Wssc@123" required />
                                        </div>
                                    </div>
                                    <div class="mb-4 pb-2">
                                        <div class="form-outline">
                                            <label class="form-label" for="Employeenumber">Employee Number</label>
                                            <input type="text" name="EmployeeNumber" id="EmployeeNumber" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label select-label">Designation</label>
                                        <select class="select form-control" id="Designation" name="Designation" required>
                                            <option disabled>Designation.</option>
                                            <option value="HR manager">Humans Resource Manager.</option>
                                            <option value="Payroll manager">Payroll Manager.</option>
                                            <option value="Manager">Manager</option>
                                            <option value="DYManager">DYManager</option>
                                            <option value="CEO">CEO</option>
                                            <option value="GM">GM</option>
                                            <option value="AppAdmin">App Admin</option>
                                            <option value="FinanceAdmin">Finance Admin</option>
                                            <option value="Employee">Employee</option>
                                            <option value="Internal Auditor">Internal Auditor</option>
                                        </select>
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
<?php include('link/desigene/script.php')?>

<script>
$(document).ready(function(){
      function loadTable(){
        $.ajax({
          url : "ajex/ajax-load-forgetpassword.php",
          type:"POST",
          success : function(data){
            $("#table-data").html(data);
          },
          error: function(xhr, status, error) {
              console.error("Error: " + status + " " + error);
          }
        });
      }
      
      // Initial load of the table
      loadTable();
      
    // Populate the modal with the relevant employee data when the "Update" button is clicked
    $(document).on('click', '#update', function() {
        var employeeNO = $(this).data('eid');
        var Gmail= $('#Gmail').val();
        var IdUpdate= $('#IdUpdate').val();
        $.ajax({
            url: 'ajex/fetch_employee_data.php', // A PHP file to fetch employee data based on employeeNO
            type: 'POST',
            data: {employeeNO: employeeNO, Gmail:Gmail, IdUpdate:IdUpdate},
            dataType: 'json',
            success: function(data) {
                $('#Id').val(data.Id);
                $('#FullName').val(data.FullName);
                $('#Gender').val(data.Gender);
                $('#Email').val(data.Email);
                $('#Gmailemp').val(data.Gmail);
                $('#Password').val(data.Password);
                $('#EmployeeNumber').val(data.EmployeeNumber);
                $('#Designation').val(data.Designation);
                $('#IdUpdateemp').val(data.IdUpdate);
                
            },
            error: function(xhr, status, error) {
                console.error("Error: " + status + " " + error);
            }
        });
    });
    $("#updatenow").on("click",function(e){
        e.preventDefault();
        var Id = $("#Id").val();
        var FullName = $("#FullName").val();
        var Gender = $("#Gender").val();
        var Email = $("#Email").val();
        var Gmailemp = $("#Gmailemp").val();
        var Password = $("#Password").val();
        var EmployeeNumber = $("#EmployeeNumber").val();
        var Designation = $("#Designation").val();
        var IdUpdateemp = $("#IdUpdateemp").val();
        // alert(id_update);
        $.ajax({
          url:"ajex/ajax-update-login.php",
          type:"POST", 
          data:{Id:Id,
                Email:Email,
                Gmailemp:Gmailemp,
                Password:Password,
                IdUpdateemp:IdUpdateemp},
          success:function(data){
            alert(data);
            loadTable();
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
