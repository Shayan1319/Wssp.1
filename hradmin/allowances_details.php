<?php
session_start();
error_reporting(0);
// // links to database
include('link/desigene/db.php');
if (strlen($_SESSION['loginid']==0)) {
?>   <script>
location.replace('../logout.php')
</script><?php
  } else{
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
  #fullDiv ul {
    margin: 0;
    padding: 0;
  }

  #fullDiv li {
    float: left;
    display: block;
    width: 14.2857%;
    text-align: center;
    list-style-type: none;
  }

  #fullDiv li:nth-child(n+1):nth-child(-n+7) {
    font-weight: 900;
    color: #e67e22;
  }

  #fullDiv li:nth-child(n+39),
  #fullDiv li:nth-child(n+8):nth-child(-n+16) {
    font-weight: 900;
    color: rgba(0, 0, 0, .3);
  }

  #fullDiv li:hover:nth-child(n+8):nth-child(-n+38),
  #fullDiv li:nth-child(17) {
    border-radius: 5px;
    background-color: #1abc9c;
    color: #ecf0f1;
  }

  .form-group label {
    font-weight: bold;
  }

  /* width */
  ::-webkit-scrollbar {
    width: 20px;
  }

  /* Track */
  ::-webkit-scrollbar-track {
    box-shadow: inset 0 0 5px grey;
    border-radius: 10px;
  }

  /* Handle */
  ::-webkit-scrollbar-thumb {
    background: red;
    border-radius: 10px;
  }

  /* Handle on hover */
  ::-webkit-scrollbar-thumb:hover {
    background: #b30000;
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
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Allowance</label>
                      <input type="text" class="form-control" id="discription" name="discription">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Fin Classification</label>
                      <select name="fin_classification" id="fin_classification" class="form-control">
                        <option value="GROSS PAY">GROSS PAY</option>
                        <option value="LOAN-EE">LOAN-EE</option>
                        <option value="EOBI-EE">EOBI-EE</option>
                        <option value="EOBI-ER">EOBI-ER</option>
                        <option value="OTH-DED">OTH-DED</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Rate Calc. Mode</label>
                      <select name="rate_calc_mode" id="rate_calc_mode" class="form-control">
                        <option value="PRESENT RATE">Present Rate</option>
                        <option value="RUNTIME VALUE">Runtime Value</option>
                        <option value="Prevailing Rate">Prevailing Rate</option>
                        <option value="Employee pension">Employee pension</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Earning/Deduction/Fund</label>
                      <select name="earning_deduction_fund" id="earning_deduction_fund" class="form-control">
                        <option value="EARNING">Earning</option>
                        <option value="DEDUCTION">Deduction</option>
                        <option value="FUND">Fund</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Allowance Status</label>
                      <select name="allowance_status" id="allowance_status" class="form-control">
                        <option value="">Select Status</option>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <div class="clearfix">&nbsp;</div>
                      <button type="submit" name="submit" id="save" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                    </div>
                  </div>
                  <div class="clearfix">&nbsp;</div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
                    <table id="employee_pay" class="table table-bordered">
                      <thead>
                        <tr>
                          <th>S.No</th>
                          <th>Allowance</th>
                          <th>Fin Classification</th>
                          <th>Rate Calc. Mode</th>
                          <th>Earning/Deduction/Fund?</th>
                          <th>Allowance Status</th>
                          <th>Update</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody id="table-data">

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </form>
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
                      <label>Allowance</label>
                      <input type="text" class="form-control" id="discription_update" name="discription">
                      <input type="text" class="form-control" hidden id="id_update" name="">
                    </div>
                    <div class="form-group">
                      <label>Fin Classification</label>
                      <select name="fin_classification" id="fin_classification_update" class="form-control">
                        <option value="GROSS PAY">GROSS PAY</option>
                        <option value="LOAN-EE">LOAN-EE</option>
                        <option value="EOBI-EE">EOBI-EE</option>
                        <option value="EOBI-ER">EOBI-ER</option>
                        <option value="OTH-DED">OTH-DED</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Rate Calc. Mode</label>
                      <select name="rate_calc_mode" id="rate_calc_mode_update" class="form-control">
                        <option value="PRESENT RATE">Present Rate</option>
                        <option value="RUNTIME VALUE">Runtime Value</option>
                        <option value="PREVAILING RATE">Prevailing Rate</option>
                        <option value="EMPLOYEE PENSION">Employee pension</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Earning/Deduction/Fund</label>
                      <select name="earning_deduction_fund" id="earning_deduction_fund_update" class="form-control">
                        <option value="EARNING">Earning</option>
                        <option value="DEDUCTION">Deduction</option>
                        <option value="FUND">Fund</option>
                      </select>
                    <div class="form-group">
                      <label>Allowance Status</label>
                      <select name="allowance_status" id="allowance_status_update" class="form-control">
                        <option value="">Select Status</option>
                        <option value="ACTIVE">Active</option>
                        <option value="INACTIVE">Inactive</option>
                      </select>
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
          url : "ajex/ajax-load-allowance.php",
          type:"POST",
          success : function(data){
            $("#table-data").html(data);
          }
        });
      }
      loadTable();
      
    //  code for update 
      
      $(document).on("click", "#update",function(){
        var update = $(this).data("eid");
      // alert(update);
        $.ajax({
          url : "ajex/get_allowances_ajax.php",
          type:"POST",
          data : {id : update},
          success : function(data){
            var allowanceData = JSON.parse(data);
            $("#discription_update").val(allowanceData.allowance);
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
      $("#updatenow").on("click",function(e){
        e.preventDefault();
        var discription_update = $("#discription_update").val();
        var id_update = $("#id_update").val();
        var fin_classification_update = $("#fin_classification_update").val();
        var rate_calc_mode_update = $("#rate_calc_mode_update").val();
        var earning_deduction_fund_update = $("#earning_deduction_fund_update").val();
        var allowance_status_update = $("#allowance_status_update").val();
        // alert(id_update);
        $.ajax({
          url:"ajex/ajax-update-allowance.php",
          type:"Post", 
          data:{id:id_update,discrip:discription_update,fin:fin_classification_update,rate:rate_calc_mode_update,earning:earning_deduction_fund_update,allowance:allowance_status_update},
          success:function(data){
            if(data == 1){
            loadTable();
            }
            else{
              alert ("Can't Save Record");
            }
          } });
            });
      //  loadTable();
      //  /code for update 
      $("#save").on("click",function(e){
        e.preventDefault();
        var employee_ = $("#employee_no").val();
        var discripti = $("#discription").val();
        var classification = $("#fin_classification").val();
        var calc_mode = $("#rate_calc_mode").val();
        var deduction_fund = $("#earning_deduction_fund").val();
        var allowance_status = $("#allowance_status").val();
        $.ajax({
          url:"ajex/ajax-inset-allowances.php",
          type:"Post", 
          data:{employee:employee_, discrip:discripti,fin:classification,rate:calc_mode,earning:deduction_fund,allowance:allowance_status},
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
            $("#updatenow").on("click",function(e){
        e.preventDefault();
        var discription_update = $("#discription_update").val();
        var id_update = $("#id_update").val();
        var fin_classification_update = $("#fin_classification_update").val();
        var rate_calc_mode_update = $("#rate_calc_mode_update").val();
        var earning_deduction_fund_update = $("#earning_deduction_fund_update").val();
        var allowance_status_update = $("#allowance_status_update").val();
        // alert(id_update);
        $.ajax({
          url:"ajex/ajax-update-allowance.php",
          type:"Post", 
          data:{id:id_update,discrip:discription_update,fin:fin_classification_update,rate:rate_calc_mode_update,earning:earning_deduction_fund_update,allowance:allowance_status_update},
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
</body>

</html><?php
  }
?>