<?php 
function getEmployee($conn, $employeeId = 0) {
  $query= "select `id`, `fName`, `father_name`, 
  `job_tiltle`, `EmployeeNo` from employeedata;";
  $stmt = $conn->prepare($query);
  $stmt->execute();

  $data = '<option value="">Select Employee</option>';
  while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
    if($r['id'] == $employeeId) {
      $data = $data.'<option selected value="'.$r['id'].'">'.$r['EmployeeNo'].'</option>';
    } else {
    $data = $data.'<option value="'.$r['id'].'">'.$r['EmployeeNo'].'</option>';
  }
}
  
  return $data;
}

function getAllowances($conn, $allowancesId = 0) {
  $query= "select `id`, `allowance` from allowances;";
  $stmt = $conn->prepare($query);
  $stmt->execute();

  $data = '<option value="">Select Description</option>';
  while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
    if($r['id'] == $allowancesId) {
      $data = $data.'<option selected value="'.$r['id'].'">'.$r['allowance'].'</option>';
    } else {
      $data = $data.'<option value="'.$r['id'].'">'.$r['allowance'].'</option>';
  }
}
  
  return $data;
}

?>