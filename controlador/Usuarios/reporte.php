<?php 	
require_once('../../libs/fpdf/Reporte.php');
require_once('../../modelo/Usuario.php');

$modelo = new Usuario();
$data = $modelo->get_array();

$titulo = array("Armando","rojas","123","sadas","dad","dsd");
// Instanciation of inherited class
$pdf = new PDF();
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->Estado($data,$titulo);
$pdf->Output();
	


 ?>