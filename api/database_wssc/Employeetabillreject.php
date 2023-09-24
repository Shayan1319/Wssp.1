            <?php
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-type, Access-Control-Allow-Methods, Authorization, X-requested-with');

$data = json_decode(file_get_contents("php://input"), true);

$empid = $data['EmployeeId'];
$currentDate = date('Y-m-d'); // Define $currentDate

include('../../link/desigene/db.php'); // Make sure to include your database connection file

$sql = "SELECT * FROM employeedata AS e  
INNER JOIN tabill AS t ON e.EmployeeNo = t.EmployeeNo
INNER JOIN travelrequest AS tr ON t.RequestNoTravel=tr.RequestNo
WHERE tr.Statusofmanger = 'ACCPET' AND tr.StatusofGM = 'ACCPET' AND t.Statusofmanger = 'REJECTED' AND t.DateofApply >= '$currentDate' AND e.Employee_Manager = $empid";
$result = mysqli_query($conn, $sql) or die("SQL query failed");

if (mysqli_num_rows($result) > 0) {
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);
} else {
    echo json_encode(array('message' => 'No Record Found', 'status' => false));
}

?>