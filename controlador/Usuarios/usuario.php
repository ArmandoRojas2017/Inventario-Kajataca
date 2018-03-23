<?php 
	require_once 'controlador/Menu.php'; 
	require_once 'modelo/Usuario.php'; 

	$opciones = $menu->getOpciones(); // obtener opciones del menus
	$usuario = new Usuario(); // creacion del objecto usuario


	$titulo = "Consultar Usuarios"; // registrar un nuevo usuario
	$icono = "search"; // agregar icono

	

	$encabezado = array(

			array('texto' => 'Id' , 'filtro' => 'id' ),
			array('texto' => 'Nombre y Apellido' , 'filtro' => 'nombre' ),
			array('texto' => 'Nick' , 'filtro' => 'nick' ),
			array('texto' => 'Tipo' , 'filtro' => 'Rol' )
			
		);

	
	$contenido = $usuario->get_campos(" id_usuarios , nombre, nick , clave, status  "); // obtener array con los datos

	



	view("usuario",compact('opciones','titulo','icono','encabezado','contenido'));
	 
 ?>