<?php
include '../link/desigene/db.php';

$description_id = $_POST['id'];
$query = mysqli_query($conn, "
SELECT r.*, a.*, 
    (SELECT COUNT(*) FROM atandece at WHERE at.Employeeid = emp.EmployeeNo AND at.DDorOT = 'DOUBLE DUTY') AS DoubleDutyCount, 
    (SELECT COUNT(*) FROM atandece ot WHERE ot.Employeeid = emp.EmployeeNo AND ot.DDorOT = 'OVERTIME') AS OvertimeCount, 
    (SELECT COUNT(*) FROM atandece abs WHERE abs.Employeeid = emp.EmployeeNo AND abs.status = 'ABSENT') AS AbsentCount
FROM rate AS r
INNER JOIN allowances AS a ON r.allowances_id = a.id
LEFT JOIN employeedata AS emp ON emp.Id = $description_id
WHERE a.allowance_status = 'ACTIVE' AND r.employee_id = $description_id;
");

if (mysqli_num_rows($query)) {
    $a = 1;
    while ($row = mysqli_fetch_assoc($query)) {
?>
        <tr>
            <td><?php echo $a ?></td>
            <td><?php echo $row['allowance'] ?> <input type="text" value="<?php echo $row['allowances_id'] ?>" style="display: none;" name="allowances_id[]" id="allowances_id"> <input type="text" value="<?php echo $row['allowance'] ?>" style="display: none;" name="allowance[]" id="allowance"></td>
            <td><?php echo $row['fin_classification'] ?> <input type="text" value="<?php echo $row['fin_classification'] ?>" style="display: none;" name="fin_classification[]" id="fin_classification"> </td>
            <td><?php echo $row['rate_calc_mode'] ?> <input type="text" value="<?php echo $row['rate_calc_mode'] ?>" style="display: none;" name="rate_calc_mode[]" id="rate_calc_mode"></td>
            <td><?php echo $row['earning_deduction_fund'] ?> <input type="text" value="<?php echo $row['earning_deduction_fund'] ?>" style="display: none;" name="earning_deduction_fund[]" id="earning_deduction_fund"></td>
            <td><span id="rateDis<?php echo $a ?>"><?php echo $row['rate'] ?></span> <input type="text" value="<?php echo $row['rate'] ?>" style="display: none;" name="rate[]" id="rate<?php echo $a ?>"></td>
            <td><?php echo $row['price'] ?> <input type="text" value="<?php echo $row['price'] ?>" style="display: none;" name="price[]" id="price<?php echo $a ?>"></td>
            <td> <input type="number" name="total[]" id="total"> </td>
        </tr>
        
        <script>
            var rate = <?php echo $row['rate'] ?>;
            var rateDis = document.getElementById('rateDis<?php echo $a ?>');
            var rateInput = document.getElementById('rate<?php echo $a ?>');

            if (rate == 0.00 && '<?php echo $row['rate_calc_mode'] ?>' == 'RUNTIME VALUE') {
                rateInput.style.display = 'block';
                rateDis.style.display = 'none';
            }else if (rate == 0.00 && '<?php echo $row['rate_calc_mode'] ?>' == 'OFF PAY') {
                rateInput.style.display = 'block';
                rateDis.style.display = 'none';
                rateInput.value = <?php echo $row['AbsentCount'] ?>; 
            }else if (rate == 0.00 && '<?php echo $row['rate_calc_mode'] ?>' == 'DOUBLE DUTY') {
                rateInput.style.display = 'block';
                rateDis.style.display = 'none';
                rateInput.value = <?php echo $row['DoubleDutyCount'] ?>; 
            }else if (rate == 0.00 && '<?php echo $row['rate_calc_mode'] ?>' == 'OVERTIME') {
                rateInput.style.display = 'block';
                rateDis.style.display = 'none';
                rateInput.value = <?php echo $row['OvertimeCount'] ?>; 
            }  else {
                rateInput.style.display = 'none';
                rateDis.style.display = 'block';

            }
           
        </script>

<?php
        $a++;
    }
}
?>
