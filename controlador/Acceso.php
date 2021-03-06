<?php 

/**
* Class that controls access to the application

	by: Armando Jose Rojas Querales - 2018
	@MrRojas 
*/
class AccesoControlador extends Controlador
{

	function __construct(){

		parent::__construct(Acceso::class);
	}


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

	/*
		Datos para el cambio de clave 
	*/
	function datos(){

		$modelo = new Usuario();

		$datos = []; 
		$registro = [];

		switch ($_POST['opc']) {
				
				case 1:	// verificar cedula

					// formatea el id
					$datos = array( 'id' => $_POST['id'] );

				break;
				
				case 2: // cargar pregunta 

					// formatea el id y la respuesta 
					$datos = array( 'id' => $_POST['id'] , 'respuesta' =>  $_POST['respuesta']);
				
				break;
			
		}

	$registro = $this->modelo->cambiar($_POST['opc'] , $datos);
	// verifica la cantidad de registros
	if(count($registro) > 0)
	 	echo json_encode($registro); 

	else echo -1; // error 



		
	}

	function cambiar_clave(){

			
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