<?php 
	require_once 'controlador/Menu.php'; 
	require_once 'modelo/Usuario.php'; 

	$opciones = $menu->getOpciones(); // obtener opciones del menus
	$usuario = new Usuario(); // creacion del objecto usuario


	



	view("home",compact('opciones','encabezado','contenido'));
	 
 ?>