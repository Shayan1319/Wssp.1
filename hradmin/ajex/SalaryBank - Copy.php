<?php
include ('../link/desigene/db.php');
$select = mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='SalaryBank'");
if(mysqli_num_rows($select)>0){
  ?>
     <option value="">Select</option>
  <?php
    while($row=mysqli_fetch_assoc($select)){
     ?>
     <option value="<?php echo $row['drop'] ?>"><?php echo $row['drop'] ?></option>
     <?php   
    }
}
?>