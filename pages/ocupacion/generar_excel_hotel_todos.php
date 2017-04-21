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
$excel->getActiveSheet()->SetCellValue('A1', 'Media anual de '.$_POST['nombre_hotel']);
$excel->getActiveSheet()->SetCellValue('A2', 'Año');
$excel->getActiveSheet()->SetCellValue('B2', $_POST['year_ocu']);
$excel->getActiveSheet()->SetCellValue('A4', 'Mes');
$excel->getActiveSheet()->SetCellValue('B4', 'Media %');

$excel->getActiveSheet()->SetCellValue('A5', 'Enero');
$excel->getActiveSheet()->SetCellValue('B5', $_POST['por_Enero']);

$excel->getActiveSheet()->SetCellValue('A6', 'Febrero');
$excel->getActiveSheet()->SetCellValue('B6', $_POST['por_Febrero']);

$excel->getActiveSheet()->SetCellValue('A7', 'Marzo');
$excel->getActiveSheet()->SetCellValue('B7', $_POST['por_Marzo']);

$excel->getActiveSheet()->SetCellValue('A8', 'Abril');
$excel->getActiveSheet()->SetCellValue('B8', $_POST['por_Abril']);

$excel->getActiveSheet()->SetCellValue('A9', 'Mayo');
$excel->getActiveSheet()->SetCellValue('B9', $_POST['por_Mayo']);

$excel->getActiveSheet()->SetCellValue('A10', 'Junio');
$excel->getActiveSheet()->SetCellValue('B10', $_POST['por_Junio']);

$excel->getActiveSheet()->SetCellValue('A11', 'Julio');
$excel->getActiveSheet()->SetCellValue('B11', $_POST['por_Julio']);

$excel->getActiveSheet()->SetCellValue('A12', 'Agosto');
$excel->getActiveSheet()->SetCellValue('B12', $_POST['por_Agosto']);

$excel->getActiveSheet()->SetCellValue('A13', 'Septiembre');
$excel->getActiveSheet()->SetCellValue('B13', $_POST['por_Septiembre']);

$excel->getActiveSheet()->SetCellValue('A14', 'Octubre');
$excel->getActiveSheet()->SetCellValue('B14', $_POST['por_Octubre']);

$excel->getActiveSheet()->SetCellValue('A15', 'Noviembre');
$excel->getActiveSheet()->SetCellValue('B15', $_POST['por_Noviembre']);

$excel->getActiveSheet()->SetCellValue('A16', 'Diciembre');
$excel->getActiveSheet()->SetCellValue('B16', $_POST['por_Diciembre']);


$excel->getActiveSheet()->SetCellValue('A18', 'Media total');
$excel->getActiveSheet()->SetCellValue('B18', $_POST['media_total']);


header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="ocupacion.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$objWriter->save('php://output');
exit;

//$excelwrite = new PHPExcel_Writer_Excel2007($excel);
//$excelwrite->save(str_replace('.php', '.xlsx', __FILE__))

 ?>
