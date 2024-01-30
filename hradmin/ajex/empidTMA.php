<?php
include ('../link/desigene/db.php');
$select = mysqli_query($conn,"SELECT * FROM `employeedata`");
if(mysqli_num_rows($select)>0){
    ?><option value="">select</option><?php
    while($row=mysqli_fetch_assoc($select)){
     ?>
     <option value="<?php echo $row['EmployeeNo']?>"><h4><?php echo $row['fName']?> <?php echo $row['mName']?> <?php echo $row['lName']?></h4> </option>
    
     <?php   
    }
}
?>