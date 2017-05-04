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

//$pdf = new FPDF();
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Media anual ' . $_POST['nombre_hotel'] . utf8_decode(" año ") . $_POST['year_ocu']);

//$fechas = "Año: " . $_POST['year_ocu'];

//$pdf->Cell(50,10, $fechas);

$meses = array('Meses', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre', 'Total');
$ocupacion = array('Media (%)', $_POST['por_Enero'], $_POST['por_Febrero'],$_POST['por_Marzo'],$_POST['por_Abril'],
                  $_POST['por_Mayo'],$_POST['por_Junio'],$_POST['por_Julio'],$_POST['por_Agosto'],$_POST['por_Septiembre'],
                  $_POST['por_Octubre'],$_POST['por_Noviembre'],$_POST['por_Diciembre'], $_POST['media_total']);



                  $nombre=$_POST["usuario_pdf"];


$pdf->cabeceraVertical($meses);
$pdf->datosVerticales($ocupacion);
$pdf->LN();
$pdf->Image("../../images/graficas/grafica"."$nombre".".png",null,null,200);


$pdf->Output('Ocupacion.pdf','D');


 ?>
