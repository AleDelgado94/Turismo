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
$excel->getProperties()->setTitle("Oficina");

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];



$excel->setActiveSheetIndex(0);
$excel->getActiveSheet()->SetCellValue('A1', 'Oficinas');
$excel->getActiveSheet()->SetCellValue('A3', 'De:');
$excel->getActiveSheet()->SetCellValue('A4', 'Hasta:');

$excel->getActiveSheet()->SetCellValue('B3', $desde);
$excel->getActiveSheet()->SetCellValue('B4', $hasta);

$excel->getActiveSheet()->SetCellValue('A6', 'Oficina');
$excel->getActiveSheet()->SetCellValue('B6', 'Número visitas');

$excel->getActiveSheet()->SetCellValue('A7', 'Guía Casco');
$excel->getActiveSheet()->SetCellValue('B7', $_POST['ofi1']);
$excel->getActiveSheet()->SetCellValue('A8', 'Alcalá');
$excel->getActiveSheet()->SetCellValue('B8', $_POST['ofi2']);
$excel->getActiveSheet()->SetCellValue('A9', 'Playa de San Juan');
$excel->getActiveSheet()->SetCellValue('B9', $_POST['ofi3']);




header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="oficinas.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$objWriter->save('php://output');
exit;

//$excelwrite = new PHPExcel_Writer_Excel2007($excel);
//$excelwrite->save(str_replace('.php', '.xlsx', __FILE__))

 ?>
