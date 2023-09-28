<?php
include ('../link/desigene/db.php');
$select = mysqli_query($conn,"SELECT * FROM `allowances`");
if(mysqli_num_rows($select)>0){
    ?>
    <option selected>Select</option>
    <?php
    while($row=mysqli_fetch_assoc($select)){
     ?>
     <option value="<?php echo $row['id']?>"><?php echo $row['allowance']?></option>
    
     <?php   
    }
}
?>