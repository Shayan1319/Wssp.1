<?php
include ('../link/desigene/db.php');
$id = $_POST['id'];
$select = mysqli_query($conn, "SELECT * FROM `employeedataupdate` WHERE `IdUpdate` = $id ORDER BY `Id` DESC");
    ?>
    <label for="date">Date</label>
    <select name="" id="date" class="form-select" >
    <option value="">Select</option>

        <?php
while ($row = mysqli_fetch_array($select)) {
    $updateDate = date("d-M-Y", strtotime($row['UpdateDate']));
    ?>
    <option value="<?php echo $row['Id']; ?>"><?php echo $updateDate; ?></option>
    <?php
}
?>
</select>
