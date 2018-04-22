<?php 

/**
* Class that controls access to the application

	by: Armando Jose Rojas Querales - 2018
	@MrRojas 
*/
class Acceso extends Controlador
{

	
	function __construct()
	{
		$this->controlador = new Acceso();
	}

	function pedirAcceso($_POST){

		if( $this->controlador->validarIngreso( $_POST['usuario'] , $_POST['clave']   ) > 0 )
		return 1; // affirmative answer
	else 
		echo -1; // negative answer



	}
}







 ?>