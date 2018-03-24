<?php 

	require_once '../../include/Helpers.php'; 
	require_once '../../modelo/Usuario.php'; 


	$modelo = new Usuario(); // creacion del objecto usuario

	$titulo = "Consultar Usuarios"; // registrar un nuevo usuario
	$icono = "search"; // agregar icono
	$menu = false;	
	$contenido = [];
	

	$encabezado = array(

			array('texto' => 'Id' , 'filtro' => 'id' ),
			array('texto' => 'Nombre y Apellido' , 'filtro' => 'nombre' ),
			array('texto' => 'Nick' , 'filtro' => 'nick' ),
			array('texto' => 'Tipo' , 'filtro' => 'Rol' )
			
		);

	$opc = $modelo->preparar_consulta_like($_POST);

	if(!$opc)
		$contenido = $modelo->get_array();
	else 

	 // obtener array con los datos
		$contenido = $modelo->consult($opc); // obtener array con los datos

	



	view("template/tabla",compact('opciones','titulo','icono','encabezado','contenido','menu'))

	;
	 
 ?>