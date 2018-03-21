<?php 
	require_once 'controlador/Menu.php'; 
	require_once 'modelo/Galeria.php';

	$galeria = new Galeria(); 

	$imagenes = $galeria->get();  
	
	$opciones = $menu->getOpciones();

	view("home",compact('opciones','imagenes'));
	 
 ?>