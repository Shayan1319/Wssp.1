<?php
include '../link/desigene/db.php';

    $description_id = $_POST['id'];
    $query = mysqli_query($conn,"SELECT * FROM `allowances` WHERE `id` = $description_id");

    // $stmt = $conn->prepare($query);
    // $stmt->bindParam(':description_id', $description_id, PDO::PARAM_INT);
    // $stmt->execute();
    // $count = $stmt->rowCount();
    
    if (mysqli_num_rows($query)) {
     while($row=mysqli_fetch_assoc($query)){
        $data = array(
            'id' => $row['id'],
            'allowance' => $row['allowance'],
            'fin_classification' => $row['fin_classification'],
            'rate_calc_mode' => $row['rate_calc_mode'],
            'earning_deduction_fund' => $row['earning_deduction_fund'],
            'allowance_status' => $row['allowance_status']
        );
        $json = json_encode($data);
        echo $json;
        exit;
    }
}

?>
