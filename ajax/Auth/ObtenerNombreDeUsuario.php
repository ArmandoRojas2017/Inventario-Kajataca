<?php 
	session_start(); 
	
	$resultado = -1; 

	if($_SESSION['nombre']) $resultado = $_SESSION['nombre']; 
 ?>

 <?= $resultado ?>