<?php
include 'link/desigene/db.php';

if (isset($_GET['id'])) {
    $description_id = $_GET['id'];
    $query = "SELECT id, allowance, fin_classification, rate_calc_mode, earning_deduction_fund, allowance_status 
              FROM `allowances` WHERE `id` = :description_id";

    $stmt = $con->prepare($query);
    $stmt->bindParam(':description_id', $description_id, PDO::PARAM_INT);
    $stmt->execute();
    $count = $stmt->rowCount();
    
    if ($count > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
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
