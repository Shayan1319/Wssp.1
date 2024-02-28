<?php   
include('../link/desigene/db.php');
$CNIC = $_POST['id'];
 $select = mysqli_query($conn,"SELECT * FROM `promotion` WHERE `employee_id` = '$CNIC'");
 while($see=mysqli_fetch_array($select))
 {
 ?>
   <tr>
      <th scope="row"><?php echo $see ['Id'] ?></th>
      <td><?php echo $see ['From_Designation'] ?></td>
      <td><?php echo $see ['To_Designation'] ?></td>
      <td><?php echo $see ['From_BPS'] ?></td>
      <td><?php echo $see ['ToBps'] ?></td>
      <td><?php echo $see ['Promotion_Date'] ?></td>
      <td><?php echo $see ['Promotion_Number'] ?></td>
      <td><?php echo $see ['Department1'] ?></td>
      <td><?php echo $see ['Acting'] ?></td>
      <td><a href="../CV/<?php echo $see ['file']?>"><i class="fa-solid fa-eye"></i></a></td>
      <td><?php echo $see ['Remarks'] ?></td>
      <td><button type="button" id="update" style="background-color: #00a65a !important;" data-eid="<?php echo $see['Id'] ?>" class="btn delete-btn text-white" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Update</button></td>
      <td><button type="button" id="delete" style="background-color: #a60000  !important;" data-did="<?php echo $see['Id'] ?>" class="btn delete-btn text-white ">Delete</button></td>
    </tr>
     <?php   
    }

?>