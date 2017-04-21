<?php
//ERROR REPORTING
error_reporting(E_ALL);

//INCLUDE PATH
//ini_set('include_path', ini_get('include_path').';../../Classes/');

//PHPExcel
include '../../Classes/PHPExcel.php';
include '../../Classes/PHPExcel/Writer/Excel2007.php';


$excel = new PHPExcel();
$excel->getProperties()->setCreator("Ayto. Guía de Isora");
$excel->getProperties()->setTitle("Ocupación");


$excel->setActiveSheetIndex(0);
$excel->getActiveSheet()->SetCellValue('A1', 'Hotel');
$excel->getActiveSheet()->SetCellValue('B1', $_POST['hotel']);
$excel->getActiveSheet()->SetCellValue('A2', 'Año');
$excel->getActiveSheet()->SetCellValue('B2', $_POST['year_ocu']);
$excel->getActiveSheet()->SetCellValue('A4', 'Mes');
$excel->getActiveSheet()->SetCellValue('B4', 'Media %');

$excel->getActiveSheet()->SetCellValue('A5', $_POST['mes1']);
$excel->getActiveSheet()->SetCellValue('B5', $_POST['mes1_ocu']);

$excel->getActiveSheet()->SetCellValue('A6', $_POST['mes2']);
$excel->getActiveSheet()->SetCellValue('B6', $_POST['mes2_ocu']);

$excel->getActiveSheet()->SetCellValue('A7', $_POST['mes3']);
$excel->getActiveSheet()->SetCellValue('B7', $_POST['mes3_ocu']);
/*
$excel->getActiveSheet()->SetCellValue('A10', 'Media total');
$excel->getActiveSheet()->SetCellValue('B10', $_POST['media_total']);
*/

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="ocupacion.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$objWriter->save('php://output');
exit;


 ?>
