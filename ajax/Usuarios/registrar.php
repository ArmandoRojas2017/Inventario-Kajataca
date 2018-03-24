<?php 
	
	/*Script para validar usuarios */
	require_once '../../include/Helpers.php';
	require_once '../../modelo/Usuario.php'; //llamar al modelo
	
	$modelo = new Usuario(); // instanciar el objecto
	$modelo->preparar_consulta();

	$datos = array( "id" => $_POST['id'] ,  "nick" => $_POST['nick']  , "nombre" => $_POST['nombre']  , "pregunta" => $_POST['pregunta'] , "respuesta" => $_POST['respuesta'] , "clave" => $_POST['clave'] , "tipo" => 1 );

	$modelo->insert($datos);

	
	
	
 ?>