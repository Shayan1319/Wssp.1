<?php
include ('../link/desigene/db.php');
$select = mysqli_query($conn,"SELECT * FROM `master` WHERE `name`='Job_Tiltle_TMA'");
if(mysqli_num_rows($select)>0){
    while($row=mysqli_fetch_assoc($select)){
     ?>
     <li>
       <div class="row" >
         <div class="col-10"><?php echo $row['drop'] ?></div>
         <div class="col-2">
         <button type="button" id="delete" style="background-color: #a60000  !important;" data-did="<?php echo $row['id'] ?>" class="btn delete-btn"><i class="fa-solid fa-trash"></i></button> 
        </div>
       </div>
     </li>
     <?php   
    }
}
?>