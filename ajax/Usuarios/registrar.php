<?php 
	
	/*Script para validar usuarios */
	require_once '../../include/Helpers.php';
	require_once '../../modelo/Usuario.php'; //llamar al modelo
	
	$modelo = new Usuario(); // instanciar el objecto
	$modelo->preparar_consulta();

	$datos = array(   );

	$form = $modelo->insert($datos);



	$inputs = 	$form[0] ; 

	$datos =  array(
				
				'titulo' =>  $form[0]['nick']

			);

	$formulario = 'formularios/agregarUsuario';



	view("modal/usuario",compact('datos','formulario','form','inputs'))
	
	
 ?>