<?php   
include('../link/desigene/db.php');
$CNIC = $_POST['id'];
 $select = mysqli_query($conn,"SELECT * FROM `qualification` WHERE `Employee_id` = '$CNIC'");
 while($see=mysqli_fetch_array($select))
 {
 ?>
   <tr>
      <th scope="row"><?php echo $see ['Id'] ?></th>
      <td><?php echo $see ['Qualification'] ?></td>
      <td><?php echo $see ['Grade/Division'] ?></td>
      <td><?php echo $see ['Passing Year of Degree'] ?></td>
      <td><?php echo $see ['Last Institute'] ?></td>
      <td><?php echo $see ['PEC Registration'] ?></td>
      <td><?php echo $see ['Institute Address'] ?></td>
      <td><?php echo $see ['Major Subject'] ?></td>
      <td><button type="button" id="update" style="background-color: #00a65a !important;" data-eid="<?php echo $see['Id'] ?>" class="btn delete-btn text-white" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Update</button></td>
      <td><button type="button" id="delete" style="background-color: #a60000  !important;" data-did="<?php echo $see['Id'] ?>" class="btn delete-btn text-white ">Delete</button></td>
    </tr>
     <?php   
    }

?>