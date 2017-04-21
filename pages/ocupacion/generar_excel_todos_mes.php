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
$excel->getActiveSheet()->SetCellValue('A1', 'Mes');
$excel->getActiveSheet()->SetCellValue('B1', $_POST['mes_ocu']);
$excel->getActiveSheet()->SetCellValue('A2', 'Año');
$excel->getActiveSheet()->SetCellValue('B2', $_POST['year_ocu']);
$excel->getActiveSheet()->SetCellValue('A4', 'Hoteles');
$excel->getActiveSheet()->SetCellValue('B4', 'Media %');

$excel->getActiveSheet()->SetCellValue('A5', 'Allegro Isora');
$excel->getActiveSheet()->SetCellValue('B5', $_POST['por_Allegro']);

$excel->getActiveSheet()->SetCellValue('A6', 'Bahía Flamengo');
$excel->getActiveSheet()->SetCellValue('B6', $_POST['por_Flamengo']);

$excel->getActiveSheet()->SetCellValue('A7', 'Ritz Carlton Abama');
$excel->getActiveSheet()->SetCellValue('B7', $_POST['por_Abama']);

$excel->getActiveSheet()->SetCellValue('A8', 'Palacio Isora');
$excel->getActiveSheet()->SetCellValue('B8', $_POST['por_Palacio']);

$excel->getActiveSheet()->SetCellValue('A10', 'Media total');
$excel->getActiveSheet()->SetCellValue('B10', $_POST['media_total']);


header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="ocupacion.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$objWriter->save('php://output');
exit;


 ?>
