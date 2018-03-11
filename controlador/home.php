<?php 
	require_once 'controlador/Menu.php'; 
	$opciones = $menu->getOpciones();

	view("home",compact('opciones'));
	 
 ?>