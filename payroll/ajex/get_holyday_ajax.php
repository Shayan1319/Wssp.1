<?php
include '../link/desigene/db.php';
    $description_id = $_POST['id'];
    $query = mysqli_query($conn,"SELECT * FROM `holidays` WHERE `ID` = $description_id");
    if (mysqli_num_rows($query)) {
     while($row=mysqli_fetch_assoc($query)){
        $data = array(
            'idUpdate' => $row['ID'],
            'dateUpdate' => $row['Date'],
            'typeUpdate' => $row['Type']
        );
        $json = json_encode($data);
        echo $json;
        exit;
    }
} else {
    echo '0';
}

?>
