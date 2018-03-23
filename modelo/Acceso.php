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
		var $datos; 
		// ingreso al sistema 
		function validarIngreso(  $user  , $pass  ){

		// clave encriptada
			$pass = md5($pass); 
		
			
		// conexion a Base de Datos 
			

		// realiza consulta
		 	

		//verifica si a un usuario 

		 	if  ($db->getCantidad() >  0) { 
		 		// almacenar datos 
		 		$this->datos['id'] = $db->getResultado("id_usuarios");
		 		$this->datos['nombre'] = $db->getResultado("nombre");
		 		$this->datos['nick'] = $db->getResultado("nick");
		 		$this->datos['tipo'] = $db->getResultado("descripcion");
		 	

		 		$_SESSION['autenticado'] = ENCONTRADO;
		 		$_SESSION['nombre'] = $this->datos['nombre'];
		 		$_SESSION['id'] = $this->datos['id'];
		 		$_SESSION['nick'] = $this->datos['nick'];
		 		$_SESSION['tipo'] = $this->datos['tipo'];
		 	

		 			
		 	}else
		 		$_SESSION['aunteticado'] = NO_ENCONTRADO; 


		 	return $db->getCantidad();
		}

		public function __construct(){

			parent::__construct();
			//sentencia SQL
			$sql = "SELECT id_usuarios, nombre, nick, descripcion FROM usuarios, roles  where nick=:nick AND clave= :pass  AND usuarios.id_roles = roles.id_roles" ;
			// modificar el metodo insert 
			$this->set_sql_array(array( 'consult' => $sql ));
		}

		
	}



 ?>