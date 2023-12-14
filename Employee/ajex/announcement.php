<?php 
include ('../link/desigene/db.php');
$id=$_POST['id'];
$select = mysqli_query($conn,"SELECT * FROM `announcement` WHERE `id`='$id'");
while($row=mysqli_fetch_array($select)){
    ?>
    <span class="h3"><?php echo $row['Subject']?></span><span class="float-end text-warning " ><?php echo $row['ceodata']?></span>
    <p><?php echo $row['Q1']?></p>
    <?php
}
?>