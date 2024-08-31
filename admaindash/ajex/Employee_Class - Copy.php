<?php
include('../link/desigene/db.php');

// Query to select distinct Perant values where name is 'Employee_Class'
$select = mysqli_query($conn, "SELECT DISTINCT `Perant` FROM `master` WHERE `name`='Employee_Class'");

if (mysqli_num_rows($select) > 0) {
    while ($row = mysqli_fetch_assoc($select)) {
        ?>
        <li><h5><?php  $id = $row['Perant'];
        
        // Fetch and display Perant
        $selectParent = mysqli_query($conn, "SELECT * FROM master WHERE id='$id'");
        if (mysqli_num_rows($selectParent) > 0) {
            while ($rowParent = mysqli_fetch_assoc($selectParent)) {
                ?>
                <!-- Display Perant -->
                <li>
                    <h5><?php echo htmlspecialchars($rowParent['drop']); ?></h5>
                </li>
                
                <?php
            }
        } ?></h5></li>
        <hr>
        <?php
        $selectdrop = mysqli_query($conn, "SELECT * FROM `master` WHERE `name`='Employee_Class' AND `Perant`='" . $row['Perant'] . "'"); 

        if (mysqli_num_rows($selectdrop) > 0) {
            while ($rowdrop = mysqli_fetch_assoc($selectdrop)) {
                ?>
                
     <li>
       <div class="row" >
         <div class="col-10"><?php echo $rowdrop['drop'] ?></div>
         <div class="col-2">
         <button type="button" id="delete" style="background-color: #a60000  !important;" data-did="<?php echo $rowdrop['id'] ?>" class="btn delete-btn"><i class="fa-solid fa-trash"></i></button> 
        </div>
       </div>
     </li>
                
                <?php   
            }
        }   
        echo '<hr>';
    }
}
?>
