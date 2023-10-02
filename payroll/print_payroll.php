<?php 
include('../pdflib/logics-builder-pdf.php');
$title = "EMPLOYEE PAY SLIP";

$today = date('d-M-Y');
$today = 'Generated On '.$today;
$pdf = new LB_PDF('P', false, $title, $today, '', true);
$pdf->SetMargins(15, 20, 13); //LTR, mm
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetWidths(array(15, 30, 30, 40, 30, 25));
$pdf->SetAligns(array('C', 'C', 'C', 'C', 'C', 'C'));
$titlesArr = array('S.No', 'Employee No', 'Name', 'CNIC', 'Job Title', 'Net Pay');
$pdf->AddTableHeader($titlesArr);
$pdf->SetAligns(array('L', 'L', 'L', 'L', 'L', 'R'));


$pdf->Output('I', 'employee_pay_slip.pdf');
?>