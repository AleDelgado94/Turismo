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
$excel->getProperties()->setTitle("Tramo horario");

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];



$excel->setActiveSheetIndex(0);
$excel->getActiveSheet()->SetCellValue('A1', 'Tramo Horario');
$excel->getActiveSheet()->SetCellValue('A3', 'De:');
$excel->getActiveSheet()->SetCellValue('A4', 'Hasta:');

$excel->getActiveSheet()->SetCellValue('B3', $desde);
$excel->getActiveSheet()->SetCellValue('B4', $hasta);

$excel->getActiveSheet()->SetCellValue('A6', 'Tramo');
$excel->getActiveSheet()->SetCellValue('B6', 'Número visitas');

$excel->getActiveSheet()->SetCellValue('A7', '9 a 11');
$excel->getActiveSheet()->SetCellValue('B7', $_POST['tramo1']);
$excel->getActiveSheet()->SetCellValue('A8', '11 a 13');
$excel->getActiveSheet()->SetCellValue('B8', $_POST['tramo2']);
$excel->getActiveSheet()->SetCellValue('A9', '13 a 15');
$excel->getActiveSheet()->SetCellValue('B9', $_POST['tramo3']);




header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="tramos_horarios.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$objWriter->save('php://output');
exit;

//$excelwrite = new PHPExcel_Writer_Excel2007($excel);
//$excelwrite->save(str_replace('.php', '.xlsx', __FILE__))

 ?>
