<?php
require_once './Classes/PHPExcel.php';
include '../_includes/connect.php';
include 'readable_cols.php';
 
$result = array();
$sql = "SELECT * FROM " . $table_student . " order by dateadded desc";
// echo $sql; exit;
$result_sql = mysqli_query($mysqli, $sql);
while ($rows = mysqli_fetch_assoc($result_sql))
{
 $result[] = $rows;
}
 
//echo "<pre>";
//print_r($result);
 
$objPHPExcel = new PHPExcel();
 
// Set the active Excel worksheet to sheet 0
 
$objPHPExcel->setActiveSheetIndex(0);
 
// Merge Columns for showing 'Student's Data' start---------------

 

 
// Merge Columns for showing 'Student's Data' close--------------->
 
// Initialise the Excel row number
 
$rowCount1 = 1;
$column1 = 'A';
$sql1 = "SHOW COLUMNS FROM " . $table_student . "";
$result1 = mysqli_query($mysqli,$sql1);
foreach ($student_cols as $student_cols_val)
{
 //echo $row1['Field']."<br>"; 
 $objPHPExcel->getActiveSheet()->setCellValue($column1.$rowCount1, $student_cols_val['student_cols']); 
 
 $styleArray = array(
 'font' => array(
 'bold' => true,
 'color' => array('rgb' => '3333FF'),
 'size' => 11,
 'name' => 'Verdana'
 ),
 'fill' => array( 
 'type' => PHPExcel_Style_Fill::FILL_SOLID,
 'color' => array('rgb' => '33F0FF')) 
 );
 
// $objPHPExcel->getActiveSheet()->getStyle('A2:E2')->applyFromArray($styleArray);
  
 $column1++;
}
//end of adding column names 
//start foreach loop to get data
 
$rowCount = 2;
foreach($result as $key => $values) 
{
 //start of printing column names as names of MySQL fields 
 $column = 'A';
 foreach($values as $value) 
 {
 //echo $value.'<br>';
 //echo $column.$rowCount.'<br>';
 
 $objPHPExcel->getActiveSheet()->setCellValue($column.$rowCount, $value);
 $column++; 
 } 
 $rowCount++;
}
 
// Redirect output to a client’s web browser (Excel5) 
header('Content-Type: application/vnd.ms-excel'); 
header('Content-Disposition: attachment;filename="Students_By_Created.xls"'); 
header('Cache-Control: max-age=0'); 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5'); 
$objWriter->save('php://output');
?>