<?php 
	require_once 'controlador/Menu.php'; 
	require_once 'modelo/Rol.php'; 

	$opciones = $menu->getOpciones(); // obtener opciones del menus
	$modelo = new Rol(); // creacion del objecto usuario

	


	$titulo = "Consultar Roles"; // registrar un nuevo usuario
	$icono = "search"; // agregar icono

	

	$encabezado = array(

			array('texto' => 'Id' , 'filtro' => 'id' ),
			array('texto' => 'Tipo de Rol' , 'filtro' => 'tipo' ),
		
			
		);

	
	$contenido = $modelo->get_array(); // obtener array con los datos

	



	view("usuario",compact('opciones','titulo','icono','encabezado','contenido'));
	 
 ?>