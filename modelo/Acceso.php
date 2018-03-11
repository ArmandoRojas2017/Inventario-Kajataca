<?php 
//activar sesion
session_start();

if(file_exists('../../include/DB.php')) 
		require_once ('../../include/DB.php');
	elseif (file_exists('../include/DB.php')) {
		require_once ('../include/DB.php');
	}
	elseif (file_exists('include/DB.php')   ) {
		require_once ('include/DB.php');
	}
	elseif (file_exists('../../../include/DB.php')   ) {
		require_once ('../../../include/DB.php');
	}
	else 
		exit("No EXISTE LA CONEXION CON EL MODELO");



	class Acceso
	{
		var $datos; 
		// ingreso al sistema 
		function validarIngreso(  $user  , $pass  ){

		// clave encriptada
			$pass = md5($pass); 
		//sentencia SQL
			$sql = "SELECT * FROM usuario , tiposusuarios where nombre='$user' AND clave='$pass'" ;
		// conexion a Base de Datos 
			$db = new DB();

		 	$db->consulta($sql ); 

		 	if  ($db->getCantidad() >  0) { 
		 		
		 		$this->datos['id'] = $db->getResultado("idUsuario");
		 		$this->datos['nombre'] = $db->getResultado("nombre");
		 		$this->datos['tipo'] = $db->getResultado("descripcion");
		 			
		 	}


		 	return $db->getCantidad();
		}

		function get($dato){

			if ($dato == "id") return $this->datos['id']; 
			elseif ($dato == "nombre" ) return $this->datos['nombre']; 
			else return $this->datos['tipo']; 
		}
	}
 ?>