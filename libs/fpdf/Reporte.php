<?php
require('fpdf.php');
require('makefont/makefont.php');

class PDF extends FPDF
{


function AccesoriosTitulo(){

	// Colors, line width and bold font
	$this->SetFillColor(255,0,0);
	$this->SetTextColor(255);
	$this->SetDrawColor(128,0,0);
	$this->SetLineWidth(.3);
	$this->SetFont('','B');

}

function AccesoriosContenido(){


	// Color and font restoration
	$this->SetFillColor(224,235,255);
	$this->SetTextColor(0);
	$this->SetFont('');

}


// colored table




function FancyTable($data)
{
	

	// tamaño de los cuadros 
	$w = array(40, 60, 93);
	
	
	
	// Data
	$fill = false;

	$this->Cell(80);
	$this->Image('../libs/fpdf/logo.png',-2);
	$this->Cell(80);
	$this->Ln();
	

	foreach($data as $row)
	{

	

		$this->Cell($w[0],6,$row['id'],'LR',0,'L',$fill);
		$this->Cell($w[1],6,$row['texto'],'LR',0,'L',$fill);

	
		$this->Ln();
		$fill = !$fill;
	}
	// Closing line
	$this->Cell(array_sum($w),0,'','T');
}



function Estado($data,$cabezera)
{
	


	// tamaño de los cuadros 
	$w = array(10, 130);
	
	
	
	// Data
	$fill = false;

	$this->Cell(80);
	$this->Image('../libs/fpdf/logo.png',-2);
	$this->Cell(80);
	$this->Ln();


	$this->AccesoriosTitulo();
			$this->Cell($w[0],7,"ID",1,0,'C',true);  
			$this->Cell($w[1],7,"Estado",1,0,'C',true);  
	

			$this->Ln();
			$this->AccesoriosContenido();

	for ($i=0; $i < count($data); $i++) 
	{

	

		$this->Cell($w[0],6,$data[$i]['id'],'LR',0,'L',$fill);
		$this->Cell($w[1],6,$data[$i]['texto'],'LR',0,'L',$fill);

	
		$this->Ln();
		$fill = !$fill;
	}
	// Closing line
	$this->Cell(array_sum($w),0,'','T');
}



}

?>
