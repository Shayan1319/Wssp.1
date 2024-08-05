<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "database_wssc";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
 ?>
 <script>
      alert("Sorry not connect to database");
 </script>
<?php }
?>