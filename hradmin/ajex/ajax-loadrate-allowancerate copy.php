<?php
include ('../link/desigene/db.php');
$id= $_POST['id'];
$select = mysqli_query($conn,"SELECT * FROM `allowancesrateupdate` WHERE `allownce_id`='$id'");
if(mysqli_num_rows($select)>0){
    while($row=mysqli_fetch_assoc($select)){
     ?>
     <tr>
        <td><?php echo $row['ID'] ?></td>
        <td><?php 
            $timep = $row['timeperiod'];
            $selectT = mysqli_query($conn,"SELECT `FromDate` FROM `timeperiod` WHERE `ID`='$timep'");
            if($selectT && mysqli_num_rows($selectT) > 0) {
                $rowT = mysqli_fetch_assoc($selectT);
                echo date('d-M-Y', strtotime($rowT['FromDate']));
            } else {
                echo "No date available";
            }
        ?></td>
        <td><?php echo $row['discription'] ?></td>
        <td><?php echo $row['price'] ?></td>
        <td><?php echo $row['allownce_id'] ?></td>
     </tr>
     
     
     <?php   
    }
}
?>
