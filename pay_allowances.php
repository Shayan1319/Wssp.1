<?php
include('link/desigene/db.php');

if (isset($_POST['submit'])) {
  $discription = $_POST["description"];
  $fin_classification = $_POST["fin_classification"];
  $rate_calc_mode = $_POST["rate_calc_mode"];
  $earning_deduction_fund = $_POST["earning_deduction_fund"];
  $allowance_status = $_POST["allowance_status"];
  $message = '';
  try {
    $conn->beginTransaction();

    $query = "INSERT INTO allowances (allowance, fin_classification, rate_calc_mode, earning_deduction_fund, allowance_status)
              VALUES ( '$discription', '$fin_classification', '$rate_calc_mode', '$earning_deduction_fund', $allowance_status)";

    $statement = $conn->prepare($query);
    $statement->execute();
    $conn->commit();
    $message = 'Allowance has been saved successfully.';
  } catch (PDOException $ex) {
    $conn->rollback();
    echo $ex->getMessage();
    echo $ex->getTraceAsString();
  }
  $goto = "pay_allowances.php";
  header("location:congratulation.php?go_to=" . $goto . "&success_message=" . $message);
  exit;
};
if (isset($_POST['delete']) && isset($_POST['id'])) {
  $id = $_POST['id'];
  $message = '';

  try {
    $conn->beginTransaction();

    // Prepare the delete query
    $query = "DELETE FROM allowances WHERE id = :id";
    $statement = $con->prepare($query);
    $statement->bindParam(':id', $id);
    $statement->execute();
    $conn->commit();
    $message = 'Allowance has been deleted successfully.';
  } catch (PDOException $ex) {
    $conn->rollback();
    echo $ex->getMessage();
    echo $ex->getTraceAsString();
    exit;
  }
  $goto = "pay_allowances.php";
  header("location:congratulation.php?go_to=" . $goto . "&success_message=" . $message);
  exit;
}

$query = "SELECT * FROM allowances";
$statement = $conn->prepare($query);
$statement->execute();
$allAllowances = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('link/links.php'); ?>
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

  button {

    color: white !important;

  }
</style>

<body>
  <div id="main">
    <?php include('link/desigene/navbar.php') ?>
    <div class="clearfix">&nbsp;</div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-success border border-2 border-dark bg-light">
            <div style="background-color: darkblue;" class="card-header text-white fw-bold">
              <div class="card-title text-white">Allowances Details</div>
            </div>
            <br>
            <div class="card-body ">
              <form method="post" enctype="multipart/form-data" id="allowance_form">
                <div class="clearfix">&nbsp;</div>
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Allowance</label>
                      <input type="text" class="form-control" id="description" name="description">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Fin Classification</label>
                      <select name="fin_classification" id="fin_classification" class="form-control">
                        <option value="">Select</option>
                        <option value="EOBI-EE">EOBI-EE</option>
                        <option value="EOBI-ER">EOBI-ER</option>
                        <option value="GROSS PAY">GROSS PAY</option>
                        <option value="LONE-EE">LONE-EE</option>
                        <option value="OTH-DED">OTH-DED</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Rate Calc. Mode</label>
                      <select name="rate_calc_mode" id="rate_calc_mode" class="form-control">
                        <option value="">Select</option>
                        <option value="PRESET RATE">PRESET RATE</option>
                        <option value="RUNTIME VALUE">RUNTIME VALUE</option>
                        <option value="PREVAILING RATE">PREVAILING RATE</option>
                        <option value="EMPLOYEE PENSION">EMPLOYEE PENSION</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Earning/Deduction/Fund</label>
                      <select name="earning_deduction_fund" id="earning_deduction_fund" class="form-control">
                        <option value="">Select</option>
                        <option value="EARNING">EARNING</option>
                        <option value="DEDUCTION">DEDUCTION</option>
                        <option value="FUND">FUND</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Allowance Status</label>
                      <select name="allowance_status" id="allowance_status" class="form-control">
                        <option value="">Select</option>
                        <option value="1">ACTIVE</option>
                        <option value="0">INACTIVE</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="clearfix">&nbsp;</div>
                <div class="col-md-3">
                  <div class="form-group">
                    <button class="btn btn-success" style="background-color: darkblue;" type="submit" id="submit" name="submit">Save</button>
                  </div>
                </div>
            </div>

            <div class="clearfix">&nbsp;</div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
              <table id="pay_allowances" name="pay_allowances" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Description</th>
                    <th>Allowance Calc. Mode</th>
                    <th>Earning/Deduction/Fund</th>
                    <th>Rate</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $count = 1;
                  foreach ($allAllowances as $aa) {
                  ?>
                    <tr>
                      <td><?php echo $count; ?></td>
                      <td><?php echo $aa['allowance']; ?></td>
                      <td><?php echo $aa['fin_classification']; ?></td>
                      <td><?php echo $aa['rate_calc_mode']; ?></td>
                      <td><?php echo $aa['earning_deduction_fund']; ?></td>
                      <td><?php echo ($aa['allowance_status'] == 1) ? 'Active' : 'Inactive'; ?></td>
                      <td>
                        <a href="update_pay_allowances.php?id=<?php echo $aa['id']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                        <!-- Add a form to handle deletion -->
                        <form method="post" style="display: inline;">
                          <input type="hidden" name="id" value="<?php echo $aa['id']; ?>">
                          <button class="btn btn-sm btn-danger" type="submit" name="delete">
                            <i class="fa fa-trash"></i>
                          </button>
                        </form>
                      </td>
                    </tr>
                  <?php
                    $count++;
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <?php include('link/desigene/script.php') ?>
            <?php include('link/desigene/footer.php') ?>

          </div>
          <div class="clearfix">&nbsp;</div>
          <div class="clearfix">&nbsp;</div>

          <script>
            $(document).ready(function() {
              $('#description').keyup(function() {
                $(this).val($(this).val().toUpperCase());
              });
            });
          </script>
</body>

</html>