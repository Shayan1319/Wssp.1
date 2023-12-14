<?php
include ('../link/desigene/db.php');
$select = mysqli_query($conn,"SELECT * FROM `holidays`");
if(mysqli_num_rows($select)>0){
    while($row=mysqli_fetch_assoc($select)){
      
     ?>
     <tr>
        <td><?php echo $row['ID'] ?></td>
        <td><?php echo $row['Date'] ?></td>
        <td><?php echo $row['Day'] ?></td>
        <td><?php echo $row['Type'] ?></td>
        <td><button type="button" id="update" style="background-color: #00a65a !important;" data-eid="<?php echo $row['ID'] ?>" class="btn delete-btn text-white" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Update</button></td>
     </tr>
     <?php   
    }
}
?>