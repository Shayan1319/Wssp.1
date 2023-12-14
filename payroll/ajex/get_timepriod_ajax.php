<?php
include '../link/desigene/db.php';
    $description_id = $_POST['id'];
    $query = mysqli_query($conn,"SELECT * FROM `timeperiod` WHERE `ID` = $description_id && `HRStatus`='PENDING' && `ChiefFinanceStaus`='PENDING' && `GMStatus`='' && `CEOStatus`='PENDING'");
    if (mysqli_num_rows($query)) {
     while($row=mysqli_fetch_assoc($query)){
        $data = array(
            'id' => $row['ID'],
            'fromdate' => $row['FromDate'],
            'todate' => $row['ToDate'],
            'workingdate' => $row['WrokingDays']
        );
        $json = json_encode($data);
        echo $json;
        exit;
    }
} else {
    echo '0';
}

?>
