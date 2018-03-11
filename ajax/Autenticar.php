<?php 
	
	/*Script para validar usuarios */

	include '../modelo/Acceso.php'; 
	include '../config/DB.php'; 

	$acceso = new Acceso(); 

	if( $acceso->validarIngreso( $_POST['usuario'] , $_POST['clave']   ) > 0 )
		echo 1; 
	else 
		echo -1; 

	
	exit();
 ?>