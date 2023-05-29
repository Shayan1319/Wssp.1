
<?php
session_start();
error_reporting(0);
// links to database
include '../link/desigene/db.php';
if ($_SESSION['loginid'] == 0) {
?>   
    <script>
        location.replace('../logout.php')
    </script>
<?php
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include ('link/links.php')?>
</head>
<style>
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
</style>
<body>
    <div id="main">
        <?php include('link/desigene/navbar.php')?>
        <div class="container-fluid py-5">
            <div class="row">
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <label for="">Item</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Item </option>
                        <option value="HRMS Updated">HRMS Updatede</option>
                        <option value="EOBI Guidance ">EOBI Guidance </option>
                        <option value="Last Salary Payment">Last Salary Payment</option>
                        <option value="Leave Encashment">Leave Encashment</option>
                        <option value="Gratuity">Gratuity</option>
                      </select>
                </div>
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <label for="">Select Option</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Select option</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                </div>
                <div class="col-sm-12">
                    <label for="student">Remarks<span>*</span></label>
                    <textarea name="Remarks " id="description"></textarea>
                    <script>
                        CKEDITOR.replace('Remarks ');
                    </script>
                </div>
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <label for="">Verified</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Verified</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                </div>
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <label for="">Date</label>
                    <input class="form-control" type="date" name="" id="" placeholder="Date">
                </div>

                <div class="col-sm-12 col-lg-4 col-md-4">
                </div>

                <div class="col-sm-12 col-lg-4 col-md-4">
                </div>

                <div class="col-sm-12 col-lg-4 col-md-4">
                </div>

                <div class="col-sm-12 col-lg-4 col-md-4 ">
                    <button type="button" class="btn btn-primary align-content-end">Submit</button>
                </div>

            </div>
        </div>
    </div>


    <?php include('link/desigene/script.php')?>
</body>

</html>