<?php
include('link/desigene/db.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include('link/links.php');
  ?>


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
    <?php include('link/desigene/navbar.php'); ?>
    <div class="clearfix">&nbsp;</div>
    <div class="container-fluid">

    </div>
  </div>
  </div>
  </div>
  </div>
  <?php include('link/desigene/script.php'); ?>
  <?php include('link/desigene/footer.php'); ?>
  </div>
  <div class="clearfix">&nbsp;</div>
  <div class="clearfix">&nbsp;</div>

</body>

</html>