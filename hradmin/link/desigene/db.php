<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="database_wssc";
$conn = mysqli_connect($servername, $username, $password,$db);
if ($conn->connect_error) {
 ?><script>alert("Sorry not connect to database");</script><?php
}
?>