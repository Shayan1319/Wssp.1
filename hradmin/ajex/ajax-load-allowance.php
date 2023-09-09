<?php
include ('../link/desigene/db.php');
$select = mysqli_query($conn,"SELECT * FROM `allowances` ");
if(mysqli_num_rows($select)>0){
    while($row=mysqli_fetch_assoc($select)){
     ?>
     <tr>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['allowance'] ?></td>
        <td><?php echo $row['fin_classification'] ?></td>
        <td><?php echo $row['rate_calc_mode'] ?></td>
        <td><?php echo $row['earning_deduction_fund'] ?></td>
        <td><?php echo $row['allowance_status'] ?></td>
        <td><button type="button" id="update" style="background-color: #00a65a !important;" data-eid="<?php echo $row['id'] ?>" class="btn delete-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Update</button></td>
        <td><button type="button" id="delete" style="background-color: #a60000  !important;" data-did="<?php echo $row['id'] ?>" class="btn delete-btn">Delete</button></td>
     </tr>
     
     
     <?php   
    }
}
?>