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
else
{
     echo "connected";
}
?>
<?php
$sql = "SELECT * FROM `employeedataupdate` WHERE `status`='IN PROCESS'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $a = 1;
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>
                <th scope='row'>{$a}</th>
                <td>{$row['EmployeeNoUpdate']}</td>
                <td><h5>{$row['fNameUpdate']} {$row['lNameUpdate']}</h5></td>
                <td>{$row['Job_TiltleUpdate']}</td>
                <td>{$row['CNICUpdate']}</td>
                <td>{$row['father_NameUpdate']}</td>
                <td>{$row['emailUpdate']}</td>
                <td>{$row['Employement_GroupUpdate']}</td>
                <td>{$row['GradeUpdate']}</td>
                <td>{$row['DepartmentUpdate']}</td>
                <td>{$row['Job_TiltleUpdate']}</td>
                <td>{$row['StatusUpdate']}</td>
                <td>{$row['Joining_DateUpdate']}</td>
                <td>{$row['Contract_Expiry_DateUpdate']}</td>
                <td><a class='btn btn-success text-white float-right shadow' href='update_singil_data.php?id={$row['Id']}'>See</a></td>
                <td><button data-acpt='{$row['Id']}' class='btn btn-success text-white float-right shadow accept-btn'>Accept</button></td>
                <td><button data-rejc='{$row['Id']}' class='btn bg-danger text-white float-right shadow reject-btn'>Reject</button></td>
              </tr>";
        $a++;
    }
} else {
    echo "<tr><td colspan='16'>0 results</td></tr>";
}
?>
