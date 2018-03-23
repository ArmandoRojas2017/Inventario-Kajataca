<?php 
	require_once 'controlador/Menu.php'; 
	require_once 'modelo/Usuario.php'; 

	$opciones = $menu->getOpciones(); // obtener opciones del menus
	$modelo = new Usuario(); // creacion del objecto usuario

	$modelo->preparar_consulta();


	$titulo = "Consultar Usuarios"; // registrar un nuevo usuario
	$icono = "search"; // agregar icono

	

	$encabezado = array(

			array('texto' => 'Id' , 'filtro' => 'id' ),
			array('texto' => 'Nombre y Apellido' , 'filtro' => 'nombre' ),
			array('texto' => 'Nick' , 'filtro' => 'nick' ),
			array('texto' => 'Tipo' , 'filtro' => 'Rol' )
			
		);

	
	$contenido = $modelo->get_array(); // obtener array con los datos

	



	view("usuario",compact('opciones','titulo','icono','encabezado','contenido'));
	 
 ?>