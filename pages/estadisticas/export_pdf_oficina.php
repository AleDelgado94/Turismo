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

//$pdf = new FPDF();
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Oficina');
$pdf->LN();
$pdf->Cell(50,10, 'Desde: ' . $desde . ' Hasta: ' . $hasta);
$pdf->LN();

//$fechas = "Año: " . $_POST['year_ocu'];

//$pdf->Cell(50,10, $fechas);

$hoteles = array('Oficina', utf8_decode('Guía Casco'), utf8_decode('Alcalá'), utf8_decode('Playa de San Juan'));
$ocupacion = array(utf8_decode('Numero'), $_POST['ofi1'], $_POST['ofi2'], $_POST['ofi3']);


$nombre=$_POST["usuario_pdf"];

$pdf->cabeceraVertical($hoteles);
$pdf->datosVerticales($ocupacion);
$pdf->LN();
$pdf->Image("../../images/graficas/grafica"."$nombre".".png");

$pdf->Output('Oficina.pdf','D');


 ?>
