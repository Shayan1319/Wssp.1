<?php
include ('../link/desigene/db.php');
$select = mysqli_query($conn,"SELECT * FROM `timeperiod` ORDER BY `timeperiod`.`ID` DESC ");
if(mysqli_num_rows($select)>0){
    while($row=mysqli_fetch_assoc($select)){
       
         if($row["CEOStatus"]== "ACCEPT"){
                $accept="#a60000";
                $reject = "#00a65a";
            }
            else if($row["CEOStatus"]== "REJECT"){
                $accept="#00a65a";
                $reject = "#a60000";
            }
        else{ $accept="#00a65a"; $reject = "#00a65a";}
     ?>
     <tr>
        <td><?php echo $row['ID'] ?></td>
        <td><?php echo $row['DateOfSub'] ?></td>
        <td><?php echo $row['FromDate'] ?></td>
        <td><?php echo $row['ToDate'] ?></td>
        <td><?php echo $row['WrokingDays'] ?></td>
        <td><button type="button" id="Accept" style="background-color: <?php echo $accept?> !important;" data-accept="<?php echo $row['ID'] ?>" class="btn text-white">Accept</button></td>
        <td><button type="button" id="Reject" style="background-color: <?php echo $reject?> !important;" data-reject="<?php echo $row['ID'] ?>" class="btn text-white">Reject</button></td>
     </tr>
     <?php   
    }
}
?>