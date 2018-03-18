<?php 
	
	/*Script para validar usuarios */
	require_once '../../include/Helpers.php';
	require_once '../../modelo/Usuario.php'; //llamar al modelo
	
	$modelo = new Usuario(); // instanciar el objecto

	view("modal/usuario")
	
	
 ?>