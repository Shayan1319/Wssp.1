<?php
session_start();
error_reporting(0);
// links to database
include('link/desigene/db.php');
if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber'])) {
    // Redirect to the logout page
    header("Location: ../logout.php");
    exit;
} else {
    
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <?php include ('link/links.php')?>
    </head>
    <style>
        label span{
            color: red;
        }
    </style>
    <body>
    <div id="main">
        <?php include('link/desigene/navbar.php')?>
        <div class="container-fluid m-auto py-5">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
            <div class="card card-success">
                <div style="background-color: darkblue;" class="card-header  text-white fw-bold">
                <div class="card-title">TA Bill</div>
                </div>
                <!-- /.card-header -->
                <div class="card-body bg-light">
                <!-- form start -->
                <form method="post" id="form" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                            <label>Bill No<span>*</span></label>
                            <input type="text" id="BillNo" name="BillNo" placeholder="Bill No" class="form-control" autocomplete="off" required="">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                            <label>Bill Date<span>*</span></label>
                            <input type="text" id="BillDate" name="BillDate" placeholder="dd-mm-yyyy" class="form-control datepicker" autocomplete="off" required="">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                            <label>Travel Allowance</label>
                            <input type="number" id="TravelAllowance" name="TravelAllowance" placeholder="Travel Allowance" class="form-control" autocomplete="off" >
                            </div>
                        </div>  
                        <div class="col-4">
                            <div class="form-group">
                            <label>Daily Allowance</label>
                            <input type="number" id="DailyAllowance" name="DailyAllowance" placeholder="Daily Allowance" class="form-control" autocomplete="off" >
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                            <label>Night Allowance</label>
                            <input type="number" id="NightAllowance" name="NightAllowance" placeholder="Night Allowance" class="form-control" autocomplete="off" >
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                            <label>Bill Status</label>
                            <input type="text" id="BillStatus" name="BillStatus" placeholder="Bill Status" class="form-control" autocomplete="off"\>
                            </div>
                        </div>
                        <div class="col-md-12 text-end mt-2">
                            <input style="background-color: darkblue;" type="submit" class="btn text-white float-right shadow" value="Submit" id="submit" name="submit">
                        </div>
                    </div>
                </form>
                </div>
                <!-- /.card-body -->
            </div>

            <div class="card card-success mt-3">
                <div style="background-color: darkblue;" class="card-header  text-white fw-bold">
                <div class="card-title">TA Bill</div>
                </div>
                <!-- /.card-header -->
                <div class="card-body bg-light table-responsive">
                <!-- form start -->
                 <table class="table" >
                    <thead style="background-color: darkblue; color:white;" >
                        <tr >
                            <th class="text-white" >TA Bill No</th>
                            <th class="text-white" >Bill No</th>
                            <th class="text-white" >Bill Date</th>
                            <th class="text-white" >Travel Allowance</th>
                            <th class="text-white" >Daily Allowance</th>
                            <th class="text-white" >Night Allowance</th>
                            <th class="text-white" >Bill Status</th>
                            <th class="text-white" >Status</th>
                            <th class="text-white" >Update</th>
                            <th class="text-white" >Delete</th>
                        </tr>
                    </thead>
                    <tbody id="table-data"></tbody>
                 </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">TA Bill Update</h1>
                        <button type="button" class="btn-close btn btn-dange" style="background-color: #ff0505 !important; color: #fff !important;" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                      <form id="formdata" action="#" method="post">
                        <input type="text" class="form-control" hidden id="id_update" name="">
                        <div class="my-2">
                            <div class="form-group">
                                <label>Bill No<span>*</span></label>
                                <input type="text" id="BillNoUpdate" name="BillNo" placeholder="Bill No" class="form-control" autocomplete="off" required="">
                            </div>
                        </div>
                          <div class="my-2">
                          <div class="form-group">
                            <label>Bill Date<span>*</span></label>
                            <input type="text" id="BillDateUpdate" name="BillDate" placeholder="dd-mm-yyyy" class="form-control datepicker" autocomplete="off" required="">
                            </div>
                          </div>
                          <div class="my-2">
                          <div class="form-group">
                            <label>Travel Allowance</label>
                            <input type="number" id="TravelAllowanceUpdate" name="TravelAllowance" placeholder="Travel Allowance" class="form-control" autocomplete="off" >
                            </div>
                          </div>
                          <div class="my-2">
                          <div class="form-group">
                            <label>Daily Allowance</label>
                            <input type="number" id="DailyAllowanceUpdate" name="DailyAllowance" placeholder="Daily Allowance" class="form-control" autocomplete="off" >
                            </div>
                            </div>
                            <div class="my-2">
                            <div class="form-group">
                            <label>Night Allowance</label>
                            <input type="number" id="NightAllowanceUpdate" name="NightAllowance" placeholder="Night Allowance" class="form-control" autocomplete="off" >
                            </div>
                            </div>
                            <div class="my-2">
                            <div class="form-group">
                            <label>Bill Status</label>
                            <input type="text" id="BillStatusUpdate" name="BillStatus" placeholder="Bill Status" class="form-control" autocomplete="off"\>
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
            <!-- Col-12 -->
        </div>
        </div>
    </div>
    <script>
   $(document).ready(function() {
    $(".datepicker").datepicker({
        dateFormat: 'D d-M-yy'
    });

    function loadTable() {
        var see = "<?php echo $_GET['Rid'];?>";
        $.ajax({
            url: "ajex/ta_bill.php",
            type: "POST",
            data: { id: see },
            success: function(data) {
                $("#table-data").html(data);
            }
        });
    }
    loadTable();
    $("#submit").on("click", function(e) {
        e.preventDefault();
        var employNo = "<?php echo $_SESSION['EmployeeNumber']?>";
        var Requestid = "<?php echo $_GET['Rid']?>"; 
        var BillNo = $("#BillNo").val(); 
        var BillDate = $("#BillDate").val(); 
        var TravelAllowance = $("#TravelAllowance").val(); 
        var DailyAllowance = $("#DailyAllowance").val(); 
        var NightAllowance = $("#NightAllowance").val(); 
        var BillStatus = $("#BillStatus").val(); 
        
        $.ajax({
            url: "ajex/process_ta_bill.php",
            type: "POST",
            data: { 
                employNo: employNo, 
                Requestid: Requestid,
                BillNo: BillNo,
                BillDate: BillDate,
                TravelAllowance: TravelAllowance,
                DailyAllowance: DailyAllowance,
                NightAllowance: NightAllowance,
                BillStatus: BillStatus
            },
            success: function(data) {
                alert(data); 
                loadTable();
                $("#form")[0].reset();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log("AJAX Error:", textStatus, errorThrown);
            }
        });
    });

    $(document).on("click", "#update", function() {
    var update = $(this).data("eid");

    $.ajax({
        url: "ajex/get_Tabill_single_ajax.php",
        type: "POST",
        data: { id: update },
        success: function(data) {
            var Tabill = JSON.parse(data);
            $("#id_update").val(Tabill.id);
            $("#BillNoUpdate").val(Tabill.BillNo);
            $("#BillDateUpdate").val(Tabill.BillDate);
            $("#TravelAllowanceUpdate").val(Tabill.TravelAllowance);
            $("#DailyAllowanceUpdate").val(Tabill.DailyAllowance);
            $("#NightAllowanceUpdate").val(Tabill.NightAllowance);
            $("#BillStatusUpdate").val(Tabill.BillStatus);
        }
    });
});
    $("#updatenow").on("click",function(e){
        e.preventDefault();
        var id_update = $("#id_update").val();
        var employNo = "<?php echo $_SESSION['EmployeeNumber']?>";
        var Requestid = "<?php echo $_GET['Rid']?>"; 
        var BillNo = $("#BillNoUpdate").val(); 
        var BillDate = $("#BillDateUpdate").val(); 
        var TravelAllowance = $("#TravelAllowanceUpdate").val(); 
        var DailyAllowance = $("#DailyAllowanceUpdate").val(); 
        var NightAllowance = $("#NightAllowanceUpdate").val(); 
        var BillStatus = $("#BillStatusUpdate").val(); 
        
        // alert(id_update);
        $.ajax({
          url:"ajex/ajax_update_tabill.php",
          type:"POST", 
          data:{
            id_update : id_update,
            employNo : employNo,
            Requestid : Requestid,
            BillNo : BillNo,
            BillDate : BillDate,
            TravelAllowance : TravelAllowance,
            DailyAllowance : DailyAllowance,
            NightAllowance : NightAllowance,
            BillStatus : BillStatus
          },
          success:function(data){
            alert(data);
            loadTable();
          } });
        });

    $(document).on("click", "#delete",function(){
        var delet = $(this).data("did");
        $.ajax({
          url : "ajex/delete_Ta_bill.php",
          type:"POST",
          data : {id : delet},
          success : function(data){
            alert(data)
            loadTable();
          }
        });
      });
});

        </script>
    </body>
</html>
<?php }?>