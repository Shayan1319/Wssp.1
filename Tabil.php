<!DOCTYPE html>
<html lang="en">
    <head>
    <?php include ('link/links.php')?>
    </head>
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
                <form method="post" enctype="multipart/form-data">
                    <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                        <label>Bill No</label>
                        <input type="text" name="" placeholder="Bill No" class="form-control" autocomplete="off" required="">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                        <label>Bill Date</label>
                        <input type="text" name="" placeholder="Bill Date" class="form-control" autocomplete="off" required="">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                        <label>Travel Allowance</label>
                        <input type="text" name="" placeholder="Travel Allowance" class="form-control" autocomplete="off" required="">
                        </div>
                    </div>  
                    <div class="col-4">
                        <div class="form-group">
                        <label>Daily Allowance</label>
                        <input type="date" name="" placeholder="Daily Allowance" class="form-control" autocomplete="off" required="">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                        <label>Night Allowance</label>
                        <input type="text" name="" placeholder="Night Allowance" class="form-control" autocomplete="off" required="">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                        <label>Bill Sratus</label>
                        <input type="text" name="" placeholder="To City" class="form-control" autocomplete="off" required="">
                        </div>
                    </div>
                    <div class="col-md-12 text-end mt-2">
                        <input style="background-color: darkblue;" type="submit" class="btn text-white float-right shadow" value="Submit" name="saveUser1">
                    </div>
                    </div>
                </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
            <!-- Col-12 -->
        </div>
        </div>
    </div>
    <?php include('link/desigene/script.php')?>
    </body>
</html>