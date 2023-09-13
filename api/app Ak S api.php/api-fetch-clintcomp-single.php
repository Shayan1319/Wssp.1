<?php
// header('Content-type: application/json');
// header('Acces-Control-Allow-Origin: *');
// // $data=jsaon-decode(file-get-contents("php://input"), true);
// $data = json_decode(file_get_contents("php://input"), true);
// $signin_id=$data['clintcomp_id'];

// include "config.php";
// $sql= "SELECT * FROM `clintcomp` WHERE Id={'clintcomp_id'}";
// $result=mysqli_query($conn,$sqli )or die("sql query failed");
// // if(mysqli_num_row($result)> 0){
//     if(mysqli_num_rows($result)>0){
// $output=mysqli_fetch_all($result, MYSQLI_ASSOC);
// // echo jason_encode($output);
// echo json_encode($output);

// }else{
//     // echo jason_encode(array('message' =>'No Record Found', 'status'=> false)); 
//     echo json_encode(array('message' =>'No Record Found', 'status'=> false));
// }

?>
<?php
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
$data = json_decode(file_get_contents("php://input"), true);
$clintcomp_id = $data['clintcomp_id'];

include "config.php";

// Use double quotes for interpolation
$sql = "SELECT * FROM `clintcomp` WHERE Id = '$clintcomp_id'";
$result = mysqli_query($conn, $sql) or die("SQL query failed");

if (mysqli_num_rows($result) > 0) {
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);
} else {
    echo json_encode(array('message' => 'No Record Found', 'status' => false));
}
?>

