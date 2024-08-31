<?php
include('../link/desigene/db.php');

// Query to select distinct Perant values where name is 'Department'
$select = mysqli_query($conn, "SELECT DISTINCT Perant FROM master WHERE name='Department'");

if (mysqli_num_rows($select) > 0) {
    while ($row = mysqli_fetch_assoc($select)) {
        $id = $row['Perant'];
        
        // Fetch and display Perant
        $selectParent = mysqli_query($conn, "SELECT * FROM master WHERE id='$id'");
        if (mysqli_num_rows($selectParent) > 0) {
            while ($rowParent = mysqli_fetch_assoc($selectParent)) {
                ?>
                <!-- Display Perant -->
                <li>
                    <h5><?php echo htmlspecialchars($rowParent['drop']); ?></h5>
                </li>
                <hr>
                <?php
            }
        }
        
        // Query to select all drops for the current Perant
        $selectdrop = mysqli_query($conn, "SELECT * FROM master WHERE name='Department' AND Perant='$id'");
        if (mysqli_num_rows($selectdrop) > 0) {
            while ($rowdrop = mysqli_fetch_assoc($selectdrop)) {
                ?>
                <!-- Display drop and delete button -->
                <li>
                    <div class="row">
                        <div class="col-10"><?php echo htmlspecialchars($rowdrop['drop']); ?></div>
                        <div class="col-2">
                            <button type="button" id="delete" style="background-color: #a60000 !important;" data-did="<?php echo $rowdrop['id']; ?>" class="btn delete-btn">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </li>
                <?php
            }
        }
    }
}
?>
