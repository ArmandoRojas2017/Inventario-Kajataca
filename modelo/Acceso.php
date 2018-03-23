<?php 
//activar sesion
session_start();

if(file_exists('../../modelo/Usuario.php')) 
		require_once ('../../modelo/Usuario.php');
	elseif (file_exists('../modelo/Usuario.php')) {
		require_once ('../modelo/Usuario.php');
	}
	elseif (file_exists('modelo/Usuario.php')   ) {
		require_once ('modelo/Usuario.php');
	}
	elseif (file_exists('../../../modelo/Usuario.php')   ) {
		require_once ('../../../modelo/Usuario.php');
	}
	else 
		exit("BASE DE DATOS NO ENCONTRADA EN ESTE SERVIDOR: LLAMAR AL 0414-5235969 PARA MAS INFORMACION");



	class Acceso extends Usuario
	{
		
		// ingreso al sistema 
		function validarIngreso(  $user  , $pass  ){

		// clave encriptada
			$pass = md5($pass); 
		
		// datos a consultar 
			$arreglo = array( "nick" => $user , "clave" => $pass  ); 

		// verificar 
			$registro = $this->consult($arreglo);
			

			$registro[0]['nombre'];
		//verifica si existe un usuario 

		 	if ( (count($arreglo) >  0 ) and ( $registro[0]['id_usuarios'] != "")  ) { 
		 		// almacenar datos 
			 		
			 		$_SESSION['nombre'] = $registro[0]['nombre'];
			 		$_SESSION['id'] = $registro[0]['id_usuarios'];
			 		$_SESSION['nick'] = $registro[0]['nick'];
			 		$_SESSION['tipo'] = $registro[0]['descripcion'];

			 		$_SESSION['autenticado'] = ENCONTRADO;
			 	
			 		return 1;
		 		
		 			
		 	}else{
		 		$_SESSION['aunteticado'] = NO_ENCONTRADO; 
		 		return -1; 
		 	}


		}

		public function __construct(){

			parent::__construct();
			//sentencia SQL
			$sql = "SELECT id_usuarios, nombre, nick, descripcion FROM usuarios, roles  where nick=:nick AND clave= :clave" ;
			// modificar el metodo insert 
			$this->set_sql_array(array( 'consult' => $sql ));
		}

		
	}



 ?>