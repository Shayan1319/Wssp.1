<?php
session_start();
error_reporting(0);
// // links to database
include('link/desigene/db.php');
if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber']) || $_SESSION['Designation'] != 'Payroll manager') {
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
  <?php include('link/links.php') ?>
</head>


<body>
  <div class="container-fluid p-0">
  <div id="main">
    <?php include('link/desigene/navbar.php') ?>
    <div class="container">
      <div class="row">
      <div class="col-md-12 my-5">
          <div class="card card-success border border-2 border-dark bg-light">
            <div style="background-color: darkblue;" class="card-header text-white fw-bold">
              <div class="card-title text-white">Time Period</div>
            </div>
            <br>
            <form action="" id="formdata" method="post">
              <!-- /.card-header -->
            <div class="card-body ">
                <div class="row mt-2">
                    <div class="col-sm-12 col-md-4">
                      <label for="" class="form-label">Form Date</label>
                      <input type="date" name="" id="fromdate" class="form-control">
                    </div>
                    <div class="col-sm-12 col-md-4">
                      <label for="" class="form-label">To Date</label>
                      <input type="date" name="" id="todate" class="form-control">
                    </div>
                    <div class="col-sm-12 col-md-4">
                      <label for="" class="form-label">Working Days</label>
                      <input type="number" name=""  min="1" id="workingdate" class="form-control">
                    </div>
                    <div class="text-end">
                    <div class="form-group">
                      <div class="clearfix">&nbsp;</div>
                      <button type="submit" name="submit" id="save" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                    </div>
                  </div>
                </div>
            </div>
            </form>
          </div>
        </div>
        <div class="col-md-12">
          <div class="card card-success border border-2 border-dark bg-light">
            <div style="background-color: darkblue;" class="card-header text-white fw-bold">
              <div class="card-title text-white">Time Period</div>
            </div>
            <br>
            <div class="card-body ">
                <div class="row mt-2">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
                      <table id="employee_pay" class="table table-bordered">
                        <thead>
                          <tr>
                            <th>S.No</th>
                            <th>Date of Submiting</th>
                            <th>Form Date</th>
                            <th>To Date</th>
                            <th>Working Days</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody id="table-data">
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>  
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
              <button type="button" class="btn-close btn btn-dange" style="background-color: #ff0505 !important; color: #fff !important;" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                      <div class="modal-body">
                        <form id="formdata" enctype="multipart/form-data">
                          <div class="form-group"> 
                            <label for="" class="form-label">Form Date</label>
                            <input type="date" name="" id="fromdateUpdate" class="form-control">
                          <input type="text" class="form-control" hidden id="idUpdate" name="">
                          </div>
                          <div class="form-group"> 
                            <label for="" class="form-label">To Date</label>
                            <input type="date" name="" id="todateUpdate" class="form-control">
                          </div>
                          <div class="form-group"> 
                            <label for="" class="form-label">Working Days</label>
                            <input type="number" name=""  min="1" id="workingdateUpdate" class="form-control">
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
  <div class="clearfix">&nbsp;</div>
  <div class="clearfix">&nbsp;</div>
  </div>
  
  </div>
  <?php include('../link/desigene/script.php') ?>
  <!-- jequery  -->
  <script>
    $(document).ready(function(){
      function loadTable(){
        $.ajax({
          url : "ajex/ajax-loadrate-timepriod.php",
          type:"POST",
          success : function(data){
            $("#table-data").html(data);
          }
        });
      }
      loadTable();
      $("#save").on("click",function(e){
        e.preventDefault();
        var fromdate = $("#fromdate").val();
        var todate = $("#todate").val();
        var workingdate = $("#workingdate").val();
        $.ajax({
          url:"ajex/ajax-inset-timepriod.php",
          type:"Post", 
          data:{fromdate:fromdate, todate:todate,workingdate:workingdate},
          success:function(data){
            if(data == 1){
            loadTable();
            $("#formdata").trigger("reset"); 
            }
            else{
              alert ("Can't Save Record");
            }
          }
        });
      });
    //  code for update 
      
      $(document).on("click", "#update",function(){
        var update = $(this).data("eid");
      // alert(update);
        $.ajax({
          url : "ajex/get_timepriod_ajax.php",
          type:"POST",
          data : {id : update},
          success : function(data){
            if(data==0){
              alert ("Record is under procedure you can't update it");
            }
            var allowanceData = JSON.parse(data);
            $("#fromdateUpdate").val(allowanceData.fromdate);
            $("#todateUpdate").val(allowanceData.todate);
            $("#id_update").val(allowanceData.id);
            $("#workingdateUpdate").val(allowanceData.workingdate);
          }

        });
        
      });
      
      $("#updatenow").on("click",function(e){
        e.preventDefault();
        var fromdateUpdate = $("#fromdateUpdate").val();
        var idUpdate = $("#idUpdate").val();
        var todateUpdate = $("#todateUpdate").val();
        var workingdateUpdate = $("#workingdateUpdate").val();
        // alert(id_update);
        $.ajax({
          url:"ajex/ajax-update-timepriod.php",
          type:"Post", 
          data:{
            fromdateUpdate:fromdateUpdate,
            idUpdate:idUpdate,
            todateUpdate:todateUpdate,
            workingdateUpdate:workingdateUpdate,
           },
          success:function(data){
            if(data == 1){
            loadTable();
            }
            else{
              alert ("Can't Update Record");
            }
          } });
            });
      $(document).on("click", "#delete",function(){
        var delet = $(this).data("did");
      // alert(update);
        $.ajax({
          url : "ajex/delete_allowances_ajax.php",
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
       loadTable();
   
    });
  </script>
</body>

</html><?php
  }
?>