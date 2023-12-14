<?php
include ('../link/desigene/db.php');
$select = mysqli_query($conn,"SELECT * FROM `timeperiod`");
if(mysqli_num_rows($select)>0){
    while($row=mysqli_fetch_assoc($select)){
     if($row["HRStatus"]== "ACCEPT"){
                $status="Accepte by HR";
            }
        else{ $status="Pending";}
     ?>
     <tr>
        <td><?php echo $row['ID'] ?></td>
        <td><?php echo $row['DateOfSub'] ?></td>
        <td><?php echo $row['FromDate'] ?></td>
        <td><?php echo $row['ToDate'] ?></td>
        <td><?php echo $row['WrokingDays'] ?></td>
        <td><?php echo $status?></td>
        <td><button type="button" id="update" style="background-color: #00a65a !important;" data-eid="<?php echo $row['ID'] ?>" class="btn delete-btn text-white" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Update</button></td>
     </tr>
     <?php   
    }
}
?>