<?php 

/**
* Class that controls access to the application

	by: Armando Jose Rojas Querales - 2018
	@MrRojas 
*/
class AccesoControlador extends Controlador
{



	function pedirAcceso(){

		$this->controlador = new Acceso();

		if( $this->controlador->validarIngreso( $_POST['usuario'] , $_POST['clave']   ) > 0 )
		{
		   $this->addLog(EVENTOS['ingresar_sistema']);
			echo OK;
		
		} // affirmative answer
		else 
		echo  -1; // negative answer



	}

	function salir(){

		$_SESSION['id'] = -1; 
		$_SESSION['autenticado'] = -1; 
		$_SESSION['nombre'] = -1; 
		$_SESSION['nick'] = -1; 
		header('location:?url=login');
	}


	function obtenerUsuario(){

		$resultado = -1; 

		if($_SESSION['nombre'])
			 $resultado = $_SESSION['nombre']; 

		echo $resultado; 
	}

	function verificar_estado(){

		if (  $_SESSION['autenticado'] == 1  )echo VERIFICADO;
		else echo NO_VERIFICADO; 
	}
}

  





 ?>