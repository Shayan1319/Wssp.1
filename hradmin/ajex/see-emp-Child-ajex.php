<?php   
include('../link/desigene/db.php');
$CNIC = $_POST['id'];
 $select = mysqli_query($conn,"SELECT * FROM `child` WHERE `MouterCNIC`= '$CNIC'");
 while($see=mysqli_fetch_array($select))
 {
 ?>
   <tr>
      <th scope="row"><?php echo $see ['id'] ?></th>
      <td><?php echo $see ['Name'] ?></td>
      <td><?php echo $see ['CNIC'] ?></td>
      <td><?php echo $see ['Date_of_B'] ?></td>
      <td><?php echo $see ['Gender'] ?></td>
      <td><button type="button" id="delete" style="background-color: #a60000  !important;" data-did="<?php echo $see['id'] ?>" class="btn delete-btn text-white ">Delete</button></td>
    </tr>
     <?php   
    }

?>