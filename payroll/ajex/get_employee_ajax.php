<?php  
include 'link/desigene/db.php';

if (isset($_GET['id'])) {
  $employeeid = $_GET['id'];
  $query = mysqli_query($conn, "SELECT `id`, `fName`, `father_Name`, `Job_Tiltle`, `EmployeeNo`, `type`
                                 FROM `employeedata` WHERE `id` = :employeeid");

  if (mysqli_num_rows($query) > 0) {
    $data = array(); // Create an array to store all rows' data

    while ($r = mysqli_fetch_assoc($query)) {
      $employeeData = array(
        'id' => $r['id'],
        'firstName' => $r['fName'],
        'fatherName' => $r['father_Name'],
        'jobTitle' => $r['Job_Tiltle'],
        'employeeNo' => $r['EmployeeNo'],
        'type' => $r['type'],
      );

      $data[] = $employeeData; // Append each row's data to the array
    }

    $json = json_encode($data);
    echo $json;
    exit;
  }
}
?>
