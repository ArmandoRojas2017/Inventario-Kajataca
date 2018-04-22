<?php 
	
	require 'modelo/&Modelo.php';


	class A extends Modelo
	{
		protected $tabla = "usuarios";		
	}

	$a = new A();


	var_dump($a->getById(3))


 ?>