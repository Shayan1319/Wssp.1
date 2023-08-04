<?php
include('link/desigene/db.php');

if (isset($_POST['update'])) {
  $id = $_POST["id"];
  $description = $_POST["description"];
  $fin_classification = $_POST["fin_classification"];
  $rate_calc_mode = $_POST["rate_calc_mode"];
  $earning_deduction_fund = $_POST["earning_deduction_fund"];
  $allowance_status = $_POST["allowance_status"];
  $message = '';
  try {
    $con->beginTransaction();

    // Prepare the update query
    $query = "UPDATE allowances SET allowance = '$description', fin_classification = '$fin_classification', 
              rate_calc_mode = '$rate_calc_mode', earning_deduction_fund = '$earning_deduction_fund', 
              allowance_status = $allowance_status WHERE id = $id";

    $statement = $con->prepare($query);
    $statement->execute();
    $con->commit();
    $message = 'Allowance has been updated successfully.';
  } catch (PDOException $ex) {
    $con->rollback();
    echo $ex->getMessage();
    echo $ex->getTraceAsString();
    exit;
  }
  $goto = "pay_allowances.php";
  header("location:congratulation.php?go_to=" . $goto . "&success_message=" . $message);
  exit;
}
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM allowances WHERE id = :id";
  $statement = $con->prepare($query);
  $statement->bindParam(':id', $id);
  $statement->execute();
  $allowance = $statement->fetch(PDO::FETCH_ASSOC);

  if (!$allowance) {
    header("Location: pay_allowances.php");
    exit();
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('link/links.php'); ?>
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

    button,
    #payroll_print {
      background-color: darkblue !important;
    }

    .form-group,
    .form-check {
      margin-top: 10px;
    }

    #payroll_print {
      font-size: 24px;
    }

    .select2-selection__rendered {
      line-height: 31px !important;

    }

    .select2-container .select2-selection--single {
      height: 35px !important;
      border: 1px solid #ced4da;
      border-radius: 0px;
    }

    .select2-selection__arrow {
      height: 34px !important;

    }
  </style>
</head>


<body>
  <div id="main">
    <?php include('link/desigene/navbar.php') ?>
    <div class="clearfix">&nbsp;</div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-success border border-2 border-dark bg-light">
            <div style="background-color: darkblue;" class="card-header text-white fw-bold">
              <div class="card-title text-white">Update Allowance</div>
            </div>
            <br>
            <div class="card-body ">
              <!-- Add your update form here with the necessary fields and pre-filled values from the $allowance array -->
              <form method="post">
                <input type="hidden" name="id" value="<?php echo $allowance['id']; ?>">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Allowance</label>
                      <input type="text" class="form-control" id="description" name="description" value="<?php echo $allowance['allowance']; ?>">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Fin Classification</label>
                      <select name="fin_classification" class="form-control">
                        <option value="">Select</option>
                        <option value="EOBI-EE" <?php if ($allowance['fin_classification'] === 'EOBI-EE') echo 'selected'; ?>>EOBI-EE</option>
                        <option value="EOBI-ER" <?php if ($allowance['fin_classification'] === 'EOBI-ER') echo 'selected'; ?>>EOBI-ER</option>
                        <option value="GROSS PAY" <?php if ($allowance['fin_classification'] === 'GROSS PAY') echo 'selected'; ?>>GROSS PAY</option>
                        <option value="LONE-EE" <?php if ($allowance['fin_classification'] === 'LONE-EE') echo 'selected'; ?>>LONE-EE</option>
                        <option value="OTH-DED" <?php if ($allowance['fin_classification'] === 'OTH-DED') echo 'selected'; ?>>OTH-DED</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Rate Calc. Mode</label>
                      <select name="rate_calc_mode" class="form-control">
                        <option value="">Select</option>
                        <option value="PRESET RATE" <?php if ($allowance['rate_calc_mode'] === 'PRESET RATE') echo 'selected'; ?>>PRESET RATE</option>
                        <option value="RUNTIME VALUE" <?php if ($allowance['rate_calc_mode'] === 'RUNTIME VALUE') echo 'selected'; ?>>RUNTIME VALUE</option>
                        <option value="RUNTIME DAILY RATE" <?php if ($allowance['rate_calc_mode'] === 'RUNTIME DAILY RATE rate') echo 'selected'; ?>>RUNTIME DAILY RATE</option>
                        <option value="PREVAILING RATE" <?php if ($allowance['rate_calc_mode'] === 'PREVAILING RATE') echo 'selected'; ?>>PREVAILING RATE</option>
                        <option value="EMPLOYEE PENSION" <?php if ($allowance['rate_calc_mode'] === 'EMPLOYEE PENSION') echo 'selected'; ?>>EMPLOYEE PENSION</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Earning/Deduction/Fund</label>
                      <select name="earning_deduction_fund" class="form-control">
                        <option value="">Select</option>
                        <option value="EARNING" <?php if ($allowance['earning_deduction_fund'] === 'EARNING') echo 'selected'; ?>>EARNING</option>
                        <option value="DEDUCTION" <?php if ($allowance['earning_deduction_fund'] === 'DEDUCTION') echo 'selected'; ?>>DEDUCTION</option>
                        <option value="FUND" <?php if ($allowance['earning_deduction_fund'] === 'FUND') echo 'selected'; ?>>FUND</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Allowance Status</label>
                      <select name="allowance_status" class="form-control">
                        <option value="">Select</option>
                        <option value="1" <?php if ($allowance['allowance_status'] == 1) echo 'selected'; ?>>Active</option>
                        <option value="0" <?php if ($allowance['allowance_status'] == 0) echo 'selected'; ?>>Inactive</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="clearfix">&nbsp;</div>
                <div class="row">
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" name="update">Update</button>
                    <a href="allowances.php" class="btn btn-secondary">Cancel</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include('link/desigene/script.php') ?>
    <?php include('link/desigene/footer.php') ?>
  </div>
  <script>
    $(document).ready(function() {
      $('#description').keyup(function() {
        $(this).val($(this).val().toUpperCase());
      });
    });
  </script>
</body>

</html>