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
$excel->getProperties()->setTitle("Edades");

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];



$excel->setActiveSheetIndex(0);
$excel->getActiveSheet()->SetCellValue('A1', 'Edades');
$excel->getActiveSheet()->SetCellValue('A3', 'De:');
$excel->getActiveSheet()->SetCellValue('A4', 'Hasta:');

$excel->getActiveSheet()->SetCellValue('B3', $desde);
$excel->getActiveSheet()->SetCellValue('B4', $hasta);

$excel->getActiveSheet()->SetCellValue('A6', 'Rango de edad');
$excel->getActiveSheet()->SetCellValue('B6', 'Número');

$excel->getActiveSheet()->SetCellValue('A7', '0 a 12 años');
$excel->getActiveSheet()->SetCellValue('B7', $_POST['edad1']);
$excel->getActiveSheet()->SetCellValue('A8', '13 a 30 años');
$excel->getActiveSheet()->SetCellValue('B8', $_POST['edad2']);
$excel->getActiveSheet()->SetCellValue('A9', '31 a 50 años');
$excel->getActiveSheet()->SetCellValue('B9', $_POST['edad3']);
$excel->getActiveSheet()->SetCellValue('A10', '50 o más años');
$excel->getActiveSheet()->SetCellValue('B10', $_POST['edad4']);




header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="edades.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$objWriter->save('php://output');
exit;

//$excelwrite = new PHPExcel_Writer_Excel2007($excel);
//$excelwrite->save(str_replace('.php', '.xlsx', __FILE__))

 ?>
