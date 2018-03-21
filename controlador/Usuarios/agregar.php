<?php 
	require_once 'controlador/Menu.php'; 
	require_once 'modelo/Usuario.php'; 

	$opciones = $menu->getOpciones(); // obtener opciones del menus

	$usuario = new Usuario(); // creacion del objecto usuario

	$titulo = "Registrar un Nuevo Usuario"; // registrar un nuevo usuario
	$icono = "plus-sign"; // agregar icono
	$formulario = "formularios/agregarUsuario"; // invocar la direccion del formulario


	



	view("agregarUsuario",compact('opciones','titulo','icono','formulario'));
	 
 ?>