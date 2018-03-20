<?php 
	
	/*Script para validar usuarios */
	require_once '../../include/Helpers.php';
	require_once '../../modelo/Usuario.php'; //llamar al modelo
	
	$modelo = new Usuario(); // instanciar el objecto
	$modelo->consult_by("id_usuarios", $_POST['id'] );

	$formulario = $modelo->get_registros();

	$datos =  array(
				
				'titulo' =>  $formulario[0]['nick']

			);



	view("modal/usuario",compact('datos','formulario'))
	
	
 ?>