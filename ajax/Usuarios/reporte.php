<?php 

require('../../modelo/ReportesFPDF.php');
require('../../modelo/Usuario.php');

$modelo = new Usuario();
$opc = $modelo->preparar_consulta_like($_GET);
$datos = [];
$arreglo = [];

if(!$opc)
	$arreglo = $modelo->get_array();
else 
	$arreglo = $modelo->consult($opc);

for ($i=0; $i < count($arreglo); $i++) { 
	
	$datos[$i][0] = $arreglo[$i]['id_usuarios'];
	$datos[$i][1] = $arreglo[$i]['nombre'];
	$datos[$i][2] = $arreglo[$i]['nick'];
	$datos[$i][3] = ($arreglo[$i]['status'] == 1) ? "ACTIVO" : "DESACTIVADO";
}


// Instanciation of inherited class
$pdf = new ReportesFPDF();
$encabezado = array("Id","Nombre y Apellido","Nick","Estado");

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->dimension(array("31","62","52","40"));
$pdf->FancyTable($encabezado, $datos);

$pdf->Output();


 ?>