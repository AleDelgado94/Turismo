<?php

require('../../fpdf/fpdf.php');


class PDF extends FPDF
{
    function cabeceraVertical($cabecera)
    {
        $this->SetXY(10, 30);
        $this->SetFont('Arial','B',10);
        foreach($cabecera as $columna)
        {
            //Parámetro con valor 2, hace que la cabecera sea vertical
            $this->Cell(50,7, utf8_decode($columna),1, 2 , 'L' );
            $this->SetFont('Arial','',10);
        }
    }

    function datosVerticales($datos)
    {
        $this->SetXY(60, 30); //40 = 10 posiciónX_anterior + 30ancho Celdas de cabecera
        $this->SetFont('Arial','B',10); //Fuente, Normal, tamaño
        foreach($datos as $columna)
        {
            $this->Cell(30,7, utf8_decode($columna),1, 2 , 'L' );
            $this->SetFont('Arial','',10);
        }
    }

    function cabeceraHorizontal($cabecera)
    {
        $this->SetXY(10, 100);
        $this->SetFont('Arial','B',10);
        foreach($cabecera as $fila)
        {
            //Atención!! el parámetro valor 0, hace que sea horizontal
            $this->Cell(24,7, utf8_decode($fila),1, 0 , 'L' );
        }
    }

    function datosHorizontal($datos)
    {
        $this->SetXY(10,107); // 77 = 70 posiciónY_anterior + 7 altura de las de cabecera
        $this->SetFont('Arial','',10); //Fuente, normal, tamaño
        foreach($datos as $fila)
        {
            //Atención!! el parámetro valor 0, hace que sea horizontal
            $this->Cell(24,7, utf8_decode($fila),1, 0 , 'L' );
        }
    }

} // FIN Class PDF


$desde = $_POST['desde'];
$hasta = $_POST['hasta'];
$nacionalidades = unserialize($_POST['arr1']);
$numero_personas = unserialize($_POST['arr2']);

//$pdf = new FPDF();
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10, utf8_decode('Cómo conocieron el municipio'));
$pdf->LN();
$pdf->Cell(50,10, 'Desde: ' . $desde . ' Hasta: ' . $hasta);
$pdf->LN();


$hoteles = array('Como conocieron');
$ocupacion = array(utf8_decode('Numero'));

for ($i=0; $i < count($nacionalidades); $i++) {
  array_push($hoteles, $nacionalidades[$i]);
}

for ($i=0; $i < count($numero_personas); $i++) {
  array_push($ocupacion, $numero_personas[$i]);
}


$nombre=$_POST["usuario_pdf"];


$pdf->cabeceraVertical($hoteles);
$pdf->datosVerticales($ocupacion);
$pdf->LN();
$pdf->Image("../../images/graficas/grafica"."$nombre".".png");

$pdf->Output('conocieron.pdf','D');


 ?>
