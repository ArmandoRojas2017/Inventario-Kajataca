<?php 
	require_once '../modelo/Usuario.php'; 

	$modelo = new Usuario();

	$datos = array(

		'id' => 2,
		'nick' => "ARMANDITO",
		'nombre' => "ARMANDO ROJAS 2",
		'pregunta' => "PERROS?",
		'respuesta' => 'muchos perros',
		'clave' => '123456789',
		'tipo' => 1


		);

	echo $modelo->modify( $datos  ); 
 ?>