<?php   
include('../link/desigene/db.php');
$CNIC = $_POST['id'];
 $select = mysqli_query($conn,"SELECT * FROM `training` WHERE `employee_id` = '$CNIC'");
 while($see=mysqli_fetch_array($select))
 {
 ?>
   <tr>
      <th scope="row"><?php echo $see ['Id'] ?></th>
      <td><?php echo $see ['Training_Serial_Number'] ?></td>
      <td><?php echo $see ['Training_Name'] ?></td>
      <td><?php echo $see ['Institute'] ?></td>
      <td><?php echo $see ['City'] ?></td>
      <td><?php echo $see ['Institute_Address'] ?></td>
      <td><?php echo $see ['Oblige_Sponsor'] ?></td>
      <td><?php echo $see ['From'] ?></td>
      <td><?php echo $see ['To'] ?></td>
      <td><?php echo $see ['Duration'] ?></td>
      <td><button type="button" id="update" style="background-color: #00a65a !important;" data-eid="<?php echo $see['Id'] ?>" class="btn delete-btn text-white" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Update</button></td>
      <td><button type="button" id="delete" style="background-color: #a60000  !important;" data-did="<?php echo $see['Id'] ?>" class="btn delete-btn text-white ">Delete</button></td>
    </tr>
     <?php   
    }

?>