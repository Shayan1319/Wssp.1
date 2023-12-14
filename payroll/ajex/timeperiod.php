<?php
include('../link/desigene/db.php');

$select = mysqli_query($conn, "SELECT * FROM `timeperiod` WHERE `HRStatus`='ACCEPT' ORDER BY `ID` DESC");

if (mysqli_num_rows($select) > 0) {
    ?>
    <option value="">Select</option>
    <?php
    while ($row = mysqli_fetch_assoc($select)) {
        // Format the date using date() function with the month in English
        $formattedDate = date('d-M-Y', strtotime($row['FromDate']));
        
        echo '<option value="' . $row['ID'] . '">' . $formattedDate . '</option>';
    }
} else {
    echo '<option value="">No time periods found</option>';
}
?>
