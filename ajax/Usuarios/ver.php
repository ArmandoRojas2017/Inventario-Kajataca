<?php 
	
	/*Script para validar usuarios */
	require_once '../../include/Helpers.php';
	require_once '../../modelo/Usuario.php'; //llamar al modelo
	
	$modelo = new Usuario(); // instanciar el objecto

	$datos =  array(
				
				'titulo' => "Usuario con ID -> "

			);
	view("modal/usuario",compact('datos'))
	
	
 ?>