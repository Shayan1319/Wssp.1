<?php
include('../link/desigene/db.php');
$Rid = $_POST['id'];
$select = mysqli_query($conn, "SELECT * FROM `tabill` WHERE `RequestNoTravel` = '$Rid'");
while ($see = mysqli_fetch_array($select)) {
    $statusColor = ''; // Variable to hold button color
    $statusText = ''; // Variable to hold button text
    // Check if both StatusofGm and Statusofmanger are 'ACCPET'
    if ($see['StatusofGm'] == 'ACCEPT' && $see['Statusofmanger'] == 'ACCEPT') {
        $statusColor = 'background-color: #00a65a !important;';
        $statusText = 'Accepted';
    } else if ($see['StatusofGm'] == 'PENDING' || $see['Statusofmanger'] == 'PENDING') {
        // If any one of StatusofGm or Statusofmanger is 'PENDING'
        $statusColor = 'background-color: #007bff !important;';
        $statusText = '<i class="fa fa-spinner fa-spin"></i>';
    } else {
        // If any one of Status Gm or Status of manger is 'REJECTED'
        $statusColor = 'background-color: #a60000 !important;';
        $statusText = 'Rejected';
    }
?>
    <tr>
        <th scope="row"><?php echo $see['TAid'] ?></th>
        <td><?php echo $see['BillNo'] ?></td>
        <td><?php echo $see['BillDate'] ?></td>
        <td><?php echo $see['TravelAllowance'] ?></td>
        <td><?php echo $see['DailyAllowance'] ?></td>
        <td><?php echo $see['NightAllowance'] ?></td>
        <td><?php echo $see['BillStatus'] ?></td>
        <td>
            <button type="button" id="status" class="btn text-white" style="<?php echo $statusColor; ?>"><?php echo $statusText; ?></button>
        </td>
        <td>
            <button type="button" id="update" style="background-color: #00a65a !important;" data-eid="<?php echo $see['TAid'] ?>" class="btn delete-btn text-white" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Update</button>
        </td>
        <td>
            <button type="button" id="delete" style="background-color: #a60000  !important;" data-did="<?php echo $see['TAid'] ?>" class="btn delete-btn text-white">Delete</button>
        </td>
    </tr>
<?php
}
?>
