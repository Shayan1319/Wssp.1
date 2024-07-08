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
  <?php include('link/links.php') ?>
</head>
<style>
  .container-fluid{
    padding: 0px !important;
  }
  
  button {
    background-color: darkblue !important;
    color: white !important;
  
  }
</style>

<body>
  <div class="container-fluid">
  <div id="main">
    <?php include ('link/desigene/sidebar.php')?>
    <?php include('link/desigene/navbar.php') ?>
    <div class="clearfix">&nbsp;</div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-success border border-2 border-dark bg-light">
            <div style="background-color: darkblue;" class="card-header text-white fw-bold">
            <div class="card-title text-white">Allowances Details</div>
          </div>
          <br>
          <!-- /.card-header -->
          <div class="card-body ">
             <!-- form start -->
             <form id="formdata" enctype="multipart/form-data">
              <div class="row mt-2">
                <div class="clearfix">&nbsp;</div>
                <div class="row">
                  <div class="clearfix">&nbsp;</div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
                    <table id="employee_pay" class="table table-bordered">
                      <thead>
                        <tr>
                          <th>S.No</th>
                          <th>Allowance</th>
                          <th>Fin Classification</th>
                          <th>Rate Calc.Mode</th>
                          <th>Earning/Deduction/Fund?</th>
                          <th>Allowance Status</th>
                          <th>Rate</th>
                          <th>Update</th>
                        </tr>
                      </thead>
                      <tbody id="table-data">

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
   <!-- Col-12 -->
  
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
        <button type="button" class="btn-close btn btn-dange" style="background-color: #ff0505 !important; color: #fff !important;" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formdata" enctype="multipart/form-data">
          <div class="form-group">
            <label>Time Period</label>
            <select name="timeperiod" required id="timepertod" class="form-control select2">
            </select>
          </div>
          <div class="form-group">
            <label>Allowance</label>
            <input type="text" class="form-control" id="discription_update" name="discription">
            <input type="text" class="form-control" hidden id="id_update" name="">
          </div>
           <div class="form-group">
            <label>Rate</label>
            <input type="text" class="form-control" id="price" name="price">
          </div>
        </form>
        <table id="employee_pay" class="table table-bordered">
          <thead>
            <tr>
              <th>ID.No</th>
              <th>Time Period</th>
              <th>Allowance</th>
              <th>Price</th>
              <th>Allownce Id</th>
            </tr>
          </thead>
          <tbody id="table-time">

          </tbody>
        </table>
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
  <?php include('../link/desigene/script.php') ?>
  <!-- jequery  -->
  <script>
     $(document) .ready(function(){
       $(function() {
         $(".select2").select2();
       });
     function loadTable(){
       $.ajax({
         url : "ajex/timeperiod.php",
         type : "POST",
       success : function(data){
       $("#timepertod") .html(data) ;
       }});
       }
       loadTable();
      });
    $(document).ready(function(){
      function loadTable(){
        $.ajax({
          url : "ajex/ajax-loadrate-allowancerate.php",
          type:"POST",
          success : function(data){
            $("#table-data").html(data);
          }
        });
      }
      loadTable();
      $(document).on("click", "#update",function(){
        var update = $(this).data("eid");
        $.ajax({
          url : "ajex/ajax-loadrate-allowancerate copy.php",
          type:"POST",
          data : {id : update},
          success : function(data){
            $("#table-time") .html(data) ;
          }
        });
      });
      $(document).on("click", "#update",function(){
        var update = $(this).data("eid");
        $.ajax({
          url : "ajex/get_allowances_ajax.php",
          type:"POST",
          data : {id : update},
          success : function(data){
            var allowanceData = JSON.parse(data);
            $("#discription_update").val(allowanceData.allowance);
            $("#price").val(allowanceData.price);
            $("#id_update").val(allowanceData.id);
            $("#fin_classification_update").val(allowanceData.fin_classification);
            // Assuming you have fetched data from the database as an ID
            var fin_class = (allowanceData.fin_classification);
            // Replace with the actual ID from the database
            var Sfin = document.getElementById('fin_classification_update');
            $("#rate_calc_mode_update").val(allowanceData.rate_calc_mode);
            // Assuming you have fetched data from the database as an ID
            var rate_calc = (allowanceData.rate_calc_mode);
            // Replace with the actual ID from the database
            var Sfin = document.getElementById('rate_calc_mode_update');
            $("#earning_deduction_fund_update").val(allowanceData.earning_deduction_fund);
            // Assuming you have fetched data from the database as an ID
            var earning_deduction = (allowanceData.earning_deduction_fund);
            // Replace with the actual ID from the database
            var Sfin = document.getElementById('earning_deduction_fund_update');
            $("#allowance_status_update").val(allowanceData.allowance_status);
            // Assuming you have fetched data from the database as an ID
            var allowance = (allowanceData.allowance_status);
            // Replace with the actual ID from the database
            var Sfin = document.getElementById('allowance_status_update');
          }
        });
      });
      $(document).on("click", "#delete",function(){
        var delet = $(this).data("did");
        $.ajax({
          url : "ajex/delete_allowances_ajax.php",
          type:"POST",
          data : {id : delet},
          success : function(data){
            if(data == 1){
            loadTable();
            }
            else{
              alert ("Can't Delete Record");
            }
          }
        });
      });
      $("#updatenow").on("click",function(e){
        e.preventDefault();
        var discription_update = $("#discription_update").val();
        var id_update = $("#id_update").val();
        var timepertod = $("#timepertod").val();
        var price = $("#price").val();
        $.ajax({
          url:"ajex/ajax-update-allowance copy.php",
          type:"Post", 
          data:{id:id_update,discrip:discription_update,timepertod:timepertod,price:price},
          success:function(data){
            if(data == 1){
            loadTable();
            }
            else{
              alert ("Can't Save Record");
            }
          } });
            });
       loadTable();
       loadTabletime();
    });
  </script>
</body>

</html><?php
  }
?>