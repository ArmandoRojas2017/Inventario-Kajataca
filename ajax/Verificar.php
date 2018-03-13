<?php 
	session_start(); 

	const NO_VERIFICADO = -1; 
	const VERIFICADO = 1; 

	if ( ($_SESSION['auntenticado'] == 1) and 
		 ($_SESSION['control'] == md5($_POST['usuario']))  )

	$resultado = VERIFICADO;

	else 
		$resultado = NO_VERIFICADO; 
	
 ?>

 <?= $resultado ?>