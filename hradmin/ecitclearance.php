<?php
session_start();
error_reporting(0);
// links to database
include('../hrdash/link/desigene/db.php');

if (strlen($_SESSION['loginid']==0)) {
?>   <script>
location.replace('../logout.php')
</script><?php
  } else{

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
        <div class="container-fluid py-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card2 text-center bg-light">
                        <div style="background-color: darkblue;" class="card-header ">
                            <div class="card-title text-white">Exitclearance Form</div>
                        </div>
                        <div class="container">
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-md-12 my-2">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                            <th scope="col"></th>
                                            <th scope="col">Item</th>
                                            <th scope="col">Yes/No</th>
                                            <th scope="col" colspan="4">Remarks</th>
                                            <th scope="col">Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>HRMS Updated </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="HRMS_Updated" value="HRMS Updated Yes" id="HRMS_Updated1">
                                                        <label class="form-check-label" for="HRMS_Updated1">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="HRMS_Updated" id="HRMS_Updated2" value="HRMS Updated No" checked>
                                                        <label class="form-check-label" for="HRMS_Updated2">
                                                            No
                                                         </label>
                                                        </div>
                                                    </td>
                                                <td colspan="4">
                                                    <textarea class="form-control" placeholder="Remarks" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                </td>
                                                <td><input type="date" name="" value=""></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>EOBI Guidance </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="EOBI_Guidance" value="EOBI Guidance Yes" id="EOBI_Guidance1">
                                                        <label class="form-check-label" for="EOBI_Guidance1">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="EOBI_Guidance" id="EOBI_Guidance2" value="EOBI Guidance No" checked>
                                                        <label class="form-check-label" for="EOBI_Guidance2">
                                                            No
                                                        </label>
                                                    </div>
                                                </td>
                                                <td colspan="4">
                                                    <textarea class="form-control" placeholder="Remarks" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                </td>
                                                <td><input type="date" name="" value=""></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Last Salary Payment</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="Last_Salary_Payment" value="Last Salary Payment Yes" id="Last_Salary_Payment1">
                                                        <label class="form-check-label" for="Last_Salary_Payment1">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="Last_Salary_Payment" value="Last Salary Payment No" id="Last_Salary_Payment2" checked>
                                                        <label class="form-check-label" for="Last_Salary_Payment2">
                                                            No
                                                        </label>
                                                    </div>
                                                </td>
                                                <td colspan="4">
                                                    <textarea class="form-control" placeholder="Remarks" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                </td>
                                                <td><input type="date" name="" value=""></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">4</th>
                                                <td>Leave Encashment</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="Leave_Encashment" value="Leave Encashment Yes" id="Leave_Encashment1">
                                                        <label class="form-check-label" for="Leave_Encashment1">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="Leave_Encashment" id="Leave_Encashment2" value="Leave Encashment No" checked>
                                                        <label class="form-check-label" for="Leave_Encashment2">
                                                            No
                                                        </label>
                                                    </div>
                                                </td>
                                                <td colspan="4">
                                                    <textarea class="form-control" placeholder="Remarks" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                </td>
                                                <td><input type="date" name="" value=""></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">5</th>
                                                <td>Gratuity</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="Gratuity" value="Gratuity Yes" id="Gratuity1">
                                                        <label class="form-check-label" for="Gratuity1">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="Gratuity" value="Gratuity No" id="Gratuity2" checked>
                                                        <label class="form-check-label" for="Gratuity2">
                                                            No
                                                        </label>
                                                    </div>
                                                </td>
                                                <td colspan="4">
                                                    <textarea class="form-control" placeholder="Remarks" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                </td>
                                                <td><input type="date" name="" value=""></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('link/desigene/script.php')?>
</body>
</html>
<?php }?>