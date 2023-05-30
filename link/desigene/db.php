<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $db="database_wssc";
// // if i change the database name so 
// // Create connection
// $conn = mysqli_connect($servername, $username, $password,$db);

// // Check connection
// if ($conn->connect_error) {
//      echo "connection error";
//      exit;
// }



$host = "localhost";

//db user
$user = "wssc";
//db user password
$password = "wssc";

$db = "database_wssc";

date_default_timezone_set('Asia/Karachi');

$con = new PDO("mysql:dbname=$db;port=3306;host=$host", $user, $password);
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

session_start();
//$_SESSION


?>