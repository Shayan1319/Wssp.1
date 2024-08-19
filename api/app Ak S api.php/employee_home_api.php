<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

// Function to convert image to base64


$data = json_decode(file_get_contents("php://input"), true);
if (json_last_error() === JSON_ERROR_NONE && isset($data['employeeNO'])) {
    include("link/db.php");
    $emil = $data['employeeNO'];

    $response = [];

    $selecttime = mysqli_query($conn, "SELECT `ID`, `FromDate`, `ToDate`, `WrokingDays` FROM `timeperiod` ORDER BY `ID` DESC LIMIT 1");

    if ($rowtime = mysqli_fetch_assoc($selecttime)) {
        $fromdate = $rowtime['FromDate'];
        $todate = $rowtime['ToDate'];

        $query = "SELECT COUNT(*) as total_attendees FROM atandece WHERE `Employeeid`='$emil' AND `Date`>='$fromdate' AND `Date`<='$todate' AND `status`='PTESENT'";
        $resultatd = mysqli_query($conn, $query);
        $response['total_attendees'] = ($rowatd = mysqli_fetch_assoc($resultatd)) ? $rowatd['total_attendees'] : 0;

        $sqltrl = "SELECT COUNT(*) AS TravelReq FROM `travelrequest` WHERE `DepartureOn`>='$fromdate' AND `DepartureOn`<='$todate' AND `EmployeeNo`='$emil'";
        $resulttrl = $conn->query($sqltrl);
        $response['TravelReq'] = ($rowtrl = $resulttrl->fetch_assoc()) ? $rowtrl['TravelReq'] : 0;

        $sqlleave = "SELECT COUNT(*) as totalAcceptLeaves FROM atandece WHERE `Employeeid`='$emil' AND `Date`>='$fromdate' AND `Date`<='$todate' AND `status`='LEAVE'";
        $resultleave = $conn->query($sqlleave);
        $response['totalAcceptLeaves'] = ($rowleave = $resultleave->fetch_assoc()) ? $rowleave['totalAcceptLeaves'] : 0;

        $sql = "SELECT COUNT(*) as employeeCountOVERTIME FROM atandece WHERE `Employeeid`='$emil' AND `Date`>='$fromdate' AND `Date`<='$todate' AND `DDorOT`='OVERTIME'";
        $result = $conn->query($sql);
        $response['employeeCountOVERTIME'] = ($row = $result->fetch_assoc()) ? $row['employeeCountOVERTIME'] : 0;

        $sql = "SELECT COUNT(*) as employeeCountDDorOT FROM atandece WHERE `Employeeid`='$emil' AND `Date`>='$fromdate' AND `Date`<='$todate' AND `DDorOT`='DOUBLE DUTY'";
        $result = $conn->query($sql);
        $response['employeeCountDDorOT'] = ($row = $result->fetch_assoc()) ? $row['employeeCountDDorOT'] : 0;
    }

    $select = mysqli_query($conn, "SELECT * FROM `employeedata` WHERE `EmployeeNo` = $emil");
    if (mysqli_num_rows($select) > 0) {
        if ($row = mysqli_fetch_assoc($select)) {
            $imagePath = 'http://72.255.20.2:8181/Wssp.1/image/' . $row["image"]; // Adjust this path accordingly
            $response['employeeData'] = [
                "image" =>$imagePath,
                "fName" => $row["fName"],
                "mName" => $row["mName"],
                "lName" => $row["lName"],
                "email" => $row["email"],
                "mNumber" => $row["mNumber"],
                "pAddress" => $row["pAddress"],
                "religion" => $row["religion"],
                "BlGroup" => $row["BlGroup"],
                "Joining_Date" => $row["Joining_Date"],
                "Contract_Expiry_Date" => $row["Contract_Expiry_Date"],
                "Last_Working_Date" => $row["Last_Working_Date"],
                "DofBc" => $row["DofB"],
                "Job_Tiltle"=>$row["Job_Tiltle"],
                "Weekly_Working_Days" => $row["Weekly_Working_Days"]
            ];
        }
    }

    $response['status'] = true;
    echo json_encode($response);

} else {
    echo json_encode(array('message' => 'Invalid Login', 'status' => false));
}

?>
