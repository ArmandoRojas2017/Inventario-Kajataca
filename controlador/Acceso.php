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
		
		$this->addLog(EVENTOS['ingresar_sistema']);
		
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

	function cambiar_clave(){

			//$form =  $this->modelo->getById($_POST['id']);

			// toma los datos de la primera posicion
			//$inputs = 	$form[0] ;
			
			$formulario = 'formularios/cambiarClave';
			$botonera = 'botoneraModalAceptar';


			$datos =  array(
				
				'titulo' =>  "Recuperar Clave..."

			);

			//$this->addLog(EVENTOS['peticion_ajax'],' modulo usuarios para ver detalladamente al usuario '.$inputs['nick']


	
		view("modal/usuario",compact('datos','formulario','inputs','botonera'));
	}
}

  





 ?>