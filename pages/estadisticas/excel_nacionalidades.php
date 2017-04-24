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
$excel->getProperties()->setTitle("Nacionalidades");

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];
$nacionalidades = unserialize($_POST['nacionalidades']);
$numero_personas = unserialize($_POST['num_person_nacionalidad']);


$excel->setActiveSheetIndex(0);
$excel->getActiveSheet()->SetCellValue('A1', 'Número de personas según la nacionalidad');
$excel->getActiveSheet()->SetCellValue('A3', 'De:');
$excel->getActiveSheet()->SetCellValue('A4', 'Hasta:');

$excel->getActiveSheet()->SetCellValue('B3', $desde);
$excel->getActiveSheet()->SetCellValue('B4', $hasta);

$excel->getActiveSheet()->SetCellValue('A6', 'Nacionalidad');
$excel->getActiveSheet()->SetCellValue('B6', 'Número');


$pos_ini = 7;
for ($i=0; $i < count($nacionalidades); $i++) {
  $excel->getActiveSheet()->SetCellValue('A'.$pos_ini, $nacionalidades[$i]);
  $pos_ini++;
}

$pos_ini = 7;
for ($i=0; $i < count($numero_personas); $i++) {
  $excel->getActiveSheet()->SetCellValue('B'.$pos_ini, $numero_personas[$i]);
  $pos_ini++;
}



header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="nacionalidades.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$objWriter->save('php://output');
exit;

//$excelwrite = new PHPExcel_Writer_Excel2007($excel);
//$excelwrite->save(str_replace('.php', '.xlsx', __FILE__))

 ?>
