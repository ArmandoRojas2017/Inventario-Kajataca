<?php 
	
	/*Script para validar usuarios */
/**
	include '../modelo/Acceso.php'; 

	$acceso = new Acceso(); 

	if( $acceso->validarIngreso( $_POST['usuario'] , $_POST['clave']   ) > 0 )
		return 1; 
	else 
		return 0; **/


	if($_POST['usuario'] == 'ARMANDO2018' and $_POST['clave'] == '12345678' )

		echo "1"; 
	
	else echo "-1";

 ?>