<?php 
	
	/*Script para validar usuarios */
	require_once '../../include/Helpers.php';
	require_once '../../modelo/Roles.php'; //llamar al modelo
	
	$modelo = new Roles(); // instanciar el objecto
	$modelo->consult($_POST['id'] );

	$formulario = $modelo->get_registros();

	$datos =  array(
				
				'titulo' =>  $formulario[0]['nick']

			);



	view("modal/usuario",compact('datos','formulario'))
	
	
 ?>