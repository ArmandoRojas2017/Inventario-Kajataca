<?php 
	
	/*Script para validar usuarios */
/**
	include '../modelo/Acceso.php'; 

	$acceso = new Acceso(); 

	if( $acceso->validarIngreso( $_POST['usuario'] , $_POST['clave']   ) > 0 )
		return 1; 
	else 
		return 0; **/

	echo "1"; 

 ?>