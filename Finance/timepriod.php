<?php
session_start();
error_reporting(0);
// links to database
include('link/desigene/db.php');
if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber']) || $_SESSION['Designation'] != 'FinanceAdmin') {
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
    <?php include('link/desigene/sidebar.php') ?>
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
            <!-- /.card-header -->
            <div class="card-body ">
                <div class="row mt-2">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
                      <table id="employee_pay" class="table table-bordered">
                        <thead>
                          <tr>
                            <th>S.No</th>
                            <th>Date of Submitting</th>
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
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
   <!-- Col-12 -->
  
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
      
      $(document).on("click", "#Accept",function(){
        var accept = $(this).data("accept");
      // alert(update);
        $.ajax({
          url : "ajex/accept_timepriod_ajax.php",
          type:"POST",
          data : {id : accept},
          success : function(data){
            if(data == 1){
            loadTable();
            }
            else{
              alert ("Can't Update Record");
            }
          }
        });
        
      });
       $(document).on("click", "#Reject",function(){
        var reject = $(this).data("reject");
        $.ajax({
          url : "ajex/reject_timepriod_ajax.php",
          type:"POST",
          data : {id : reject},
          success : function(data){
         if(data == 1){
            loadTable();
            }
            else{
              alert ("Can't Update Record");
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