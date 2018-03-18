<?php 
	session_start();
	
	$_SESSION['id'] = -1; 
	$_SESSION['autenticado'] = -1; 
	$_SESSION['nombre'] = -1; 
	$_SESSION['nick'] = -1; 



	header('location:?url=index')
	
 ?>