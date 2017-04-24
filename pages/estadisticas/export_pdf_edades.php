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
$pdf->Cell(40,10,'Edades');
$pdf->LN();
$pdf->Cell(50,10, 'Desde: ' . $desde . ' Hasta: ' . $hasta);
$pdf->LN();

//$fechas = "Año: " . $_POST['year_ocu'];

//$pdf->Cell(50,10, $fechas);

$hoteles = array('Years', utf8_decode('0 to 12 years'), utf8_decode('13 to 30 years'), utf8_decode('31 to 50 years'), utf8_decode('50 or more years'));
$ocupacion = array('Average (%)', $_POST['edad1'], $_POST['edad2'], $_POST['edad3'], $_POST['edad4']);




$pdf->cabeceraVertical($hoteles);
$pdf->datosVerticales($ocupacion);
$pdf->LN();
$pdf->Image("../../images/graficas/grafica1.png");

$pdf->Output('Ocupacion.pdf','D');


 ?>
