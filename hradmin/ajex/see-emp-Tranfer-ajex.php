<?php   
include('../link/desigene/db.php');
$CNIC = $_POST['id'];
 $select = mysqli_query($conn,"SELECT * FROM `transfer` WHERE `employee_id` = '$CNIC'");
 while($see=mysqli_fetch_array($select))
 {
 ?>
   <tr>
      <th scope="row"><?php echo $see ['id'] ?></th>
      <td><?php echo $see ['Transfer_Order_Number'] ?></td>
      <td><?php echo $see ['Designation'] ?></td>
      <td><?php echo $see ['BPS'] ?></td>
      <td><?php echo $see ['From_Department'] ?></td>
      <td><?php echo $see ['To_Project'] ?></td>
      <td><?php echo $see ['From_Station'] ?></td>
      <td><?php echo $see ['To_Station'] ?></td>
      <td><?php echo $see ['Worked_From'] ?></td>
      <td><?php echo $see ['Transfer_Date'] ?></td>
      <td><button type="button" id="update" style="background-color: #00a65a !important;" data-eid="<?php echo $see['id'] ?>" class="btn delete-btn text-white" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Update</button></td>
      <td><button type="button" id="delete" style="background-color: #a60000  !important;" data-did="<?php echo $see['id'] ?>" class="btn delete-btn text-white ">Delete</button></td>
    </tr>
     <?php   
    }

?>