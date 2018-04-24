<?php 

/*

	Generados de PDF dinamicos, utilizando libreria FPDF
	clase hijo de FPDF.

	by: Armando Jose Rojas Querales - 2018

 */

require("libs/fpdf/fpdf.php");


class ReportesFPDF extends FPDF
{

	protected $dimension;


// Page header
function Header()
{
	// Logo
	$this->Image('../../images/logo.jpeg',10,6,185);
	// Arial bold 15
	$this->SetFont('Arial','B',15);
	// Move to the right
	$this->Cell(80);
	
	/*
	// Title
	$this->Cell(30,10,'Title',1,0,'C');
	*/
	// Line break
	$this->Ln(50);
}

// Page footer
function Footer()
{
	// Position at 1.5 cm from bottom
	$this->SetY(-15);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// Page number
	$this->Cell(0,10,'Pagina '.$this->PageNo().' de {nb}',0,0,'C');
}

// Colored table
function FancyTable($header, $data)
{
    // Colors, line width and bold font
    $this->SetFillColor(0, 132, 255);
    $this->SetTextColor(255);
    $this->SetDrawColor(0, 132, 255);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    // Header
    $w = $this->dimension;
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    // Color and font restoration
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Data
    $fill = false;
    foreach($data as $row)
    {	
    	 for( $i = 0; $i<count($row); $i++)
        	$this->Cell($w[$i],6,$row[$i],'LR',0,'L',$fill);
       
        $this->Ln();
        $fill = !$fill;
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}

	function dimension($arreglo){

		$this->dimension = $arreglo;
	}

}


 ?>