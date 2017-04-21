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
$excel->getActiveSheet()->SetCellValue('A1', 'Media anual de cada hotel');
$excel->getActiveSheet()->SetCellValue('B1', 'Año');
$excel->getActiveSheet()->SetCellValue('B2', $_POST['year_ocu']);
$excel->getActiveSheet()->SetCellValue('D1', 'Hoteles');
$excel->getActiveSheet()->SetCellValue('D2', 'Media %');

$excel->getActiveSheet()->SetCellValue('E1', 'Allegro Isora');
$excel->getActiveSheet()->SetCellValue('E2', $_POST['por_Allegro']);

$excel->getActiveSheet()->SetCellValue('F1', 'Bahía Flamengo');
$excel->getActiveSheet()->SetCellValue('F2', $_POST['por_Flamengo']);

$excel->getActiveSheet()->SetCellValue('G1', 'Ritz Carlton Abama');
$excel->getActiveSheet()->SetCellValue('G2', $_POST['por_Abama']);

$excel->getActiveSheet()->SetCellValue('H1', 'Palacio Isora');
$excel->getActiveSheet()->SetCellValue('H2', $_POST['por_Palacio']);

$excel->getActiveSheet()->SetCellValue('J1', 'Media total');
$excel->getActiveSheet()->SetCellValue('J2', $_POST['media_total']);



$excel->getActiveSheet()->setTitle('Simple');

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="ocupacion.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$objWriter->save('php://output');
exit;

//$excelwrite = new PHPExcel_Writer_Excel2007($excel);
//$excelwrite->save(str_replace('.php', '.xlsx', __FILE__))

 ?>
