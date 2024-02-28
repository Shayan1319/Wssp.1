<?php   
include('../link/desigene/db.php');
$CNIC = $_POST['id'];
 $select = mysqli_query($conn,"SELECT * FROM `spouse` WHERE `employee_id` = '$CNIC'");
 while($see=mysqli_fetch_array($select))
 {
 ?>
   <tr>
      <th scope="row"><?php echo $see ['id'] ?></th>
      <td><?php echo $see ['Spouse_Name'] ?></td>
      <td><?php echo $see ['CNIC'] ?></td>
      <td><?php echo date('d-m-Y', strtotime($see['Date_of_B'])); ?></td>
      <td><?php echo $see ['Father_name'] ?></td>
      <td><?php echo $see ['type'] ?></td>
      <td><button type="button" id="update" style="background-color: #00a65a !important;" data-eid="<?php echo $see['id'] ?>" class="btn delete-btn text-white" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Update</button></td>
      <td><button type="button" id="delete" style="background-color: #a60000  !important;" data-did="<?php echo $see['id'] ?>" class="btn delete-btn text-white ">Delete</button></td>
    </tr>
     <?php   
    }

?>