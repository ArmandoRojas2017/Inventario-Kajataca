<?php 

	require_once '../../include/Helpers.php'; 
	require_once '../../modelo/Usuario.php'; 


	$modelo = new Usuario(); // creacion del objecto usuario

	$titulo = "Consultar Usuarios"; // registrar un nuevo usuario
	$icono = "search"; // agregar icono
	$menu = false;	
	

	$encabezado = array(

			array('texto' => 'Id' , 'filtro' => 'id' ),
			array('texto' => 'Nombre y Apellido' , 'filtro' => 'nombre' ),
			array('texto' => 'Nick' , 'filtro' => 'nick' ),
			array('texto' => 'Tipo' , 'filtro' => 'Rol' )
			
		);

	
	$contenido = $modelo->get_array(); // obtener array con los datos

	



	view("template/tabla",compact('opciones','titulo','icono','encabezado','contenido','menu'))

	;
	 
 ?>