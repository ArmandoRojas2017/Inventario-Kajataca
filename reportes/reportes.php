<?php 

require_once('../libs/fpdf/Reporte.php');
require_once('../modelo/UbicacionGeografica.php');

$modelo = new UbicacionGeografica();
$data = $modelo->getEstado();

$titulo = array("Armando","rojas");
// Instanciation of inherited class
$pdf = new PDF();
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->Estado($data,$titulo);
$pdf->Output();
	
	
?>