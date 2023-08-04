<?php  
include 'link/desigene/db.php';

if (isset($_GET['id'])) {
  $employeeid = $_GET['id'];
  $query = "SELECT `id`, `fName`, `father_Name`, `Job_Tiltle`, `EmployeeNo`, `type`
  FROM `employeedata` WHERE `id` = :employeeid";

 $stmt = $con->prepare($query);
 $stmt->bindParam(':employeeid', $employeeid, PDO::PARAM_STR);
 $stmt->execute();
 $count = $stmt->rowCount();
    if ($count > 0) {
        $r = $stmt->fetch(PDO::FETCH_ASSOC);
        $data = array(
            'id' => $r['id'],
            'firstName' => $r['fName'],
            'fatherName' => $r['father_Name'],
            'jobTitle' => $r['Job_Tiltle'],
            'employeeNo' => $r['EmployeeNo'],
            'type' => $r['type'],
        );

        $json = json_encode($data);
        echo $json;
        exit;
    }
}
