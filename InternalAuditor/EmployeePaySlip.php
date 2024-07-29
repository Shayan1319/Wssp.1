<?php
session_start();
error_reporting(0);
// links to database
include('../link/desigene/db.php');
if (!isset($_SESSION['loginid']) || !isset($_SESSION['EmployeeNumber']) || $_SESSION['Designation'] != 'Internal Auditor') {
  // Log the unauthorized access attempt for auditing purposes
  error_log("Unauthorized access attempt. User: {$_SESSION['loginid']}");
  header("Location: ../logout.php");
  exit; // Ensure that the script stops execution after the header redirection
} else{
?><!DOCTYPE html>
<html lang="en">
  <head>
    <?php include ('link/links.php')?>
  </head>
  <body>
    <div class="container-fluid m-auto p-0">
    <?php include ('link/desigene/sidebar.php')?>
  <div id="main">
    <?php include('link/desigene/navbar.php')?>
    <?php include ('link/desigene/sidebar copy.php')?>
    
  </div>
    </div>
      <?php include('link/desigene/script.php')?>
  </div>
  <div class="clearfix">&nbsp;</div>
  <div class="clearfix">&nbsp;</div>
<script>
    var addSerial = 0;
    $(function() {
      $(".select2").select2();
    });
$(document) .ready(function(){
  function loadTable(){
    $.ajax({
      url : "ajex/empidpay.php",
      type : "POST",
    success : function(data){
    $("#employee_no") .html(data) ;
    }});
    }
    loadTable(); 
});
</script>
  
</script>
  </body>
</html><?php }?>