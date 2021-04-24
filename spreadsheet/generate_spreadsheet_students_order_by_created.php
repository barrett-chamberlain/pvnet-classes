<?php
require_once './Classes/PHPExcel.php';
include '../_includes/connect.php';
include 'readable_cols.php';
 
$result = array();
$sql = "SELECT students.id,students.dateadded,students.fname,students.lname,students.medical_cond_desc,students.dob, students.gradelevel,students.school,students.cell_phone,students.email as 'email1',students.linkedcustomer,customers.firstname,customers.lastname,customer_contact.phone1,customer_contact.email as 'email2',students.addr1,customer_contact.state,customer_contact.zipcode, students.gradeleveldate,students.gender,students.is_parent,students.is_student_adult,students.is_student_minor,students.is_relative,students.is_sibling,students.is_instructor,students.is_vol_adult,students.is_vol_minor,students.is_sponsor, students.is_alumni,students.medical_cond,students.medical_cond_life_threatening,students.addr2,students.Verified, students.password, students.is_Intern, students.internship_start_date, students.internship_end_date,students.goals  FROM pvnetclasses.students 
CROSS JOIN customers ON customers.id = students.linkedcustomer 
CROSS JOIN customer_contact ON customers.id = customer_contact.customer_id 
         order by students.dateadded desc";
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
foreach ($student_created_cols as $student_created_cols_val)
{
 //echo $row1['Field']."<br>"; 
 $objPHPExcel->getActiveSheet()->setCellValue($column1.$rowCount1, $student_created_cols_val['student_created_cols']); 
 
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