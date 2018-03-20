<?php 
	
	/*Script para validar usuarios */
	require_once '../../include/Helpers.php';
	require_once '../../modelo/Usuario.php'; //llamar al modelo
	
	$modelo = new Usuario(); // instanciar el objecto

	$formulario = $modelo->getId($_POST['id']);

	$datos =  array(
				
				'titulo' =>  $formulario['nick']

			);



	view("modal/usuario",compact('datos','formulario'))
	
	
 ?>