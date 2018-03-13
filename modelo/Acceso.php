<?php 
//activar sesion
session_start();

if(file_exists('../../modelo/DB.php')) 
		require_once ('../../modelo/DB.php');
	elseif (file_exists('../modelo/DB.php')) {
		require_once ('../modelo/DB.php');
	}
	elseif (file_exists('modelo/DB.php')   ) {
		require_once ('modelo/DB.php');
	}
	elseif (file_exists('../../../modelo/DB.php')   ) {
		require_once ('../../../modelo/DB.php');
	}
	else 
		exit("-1");



	class Acceso
	{
		var $datos; 
		// ingreso al sistema 
		function validarIngreso(  $user  , $pass  ){

		// clave encriptada
			$pass = md5($pass); 
		//sentencia SQL
			$sql = "SELECT * FROM usuarios  where nombre='$user' AND clave='$pass' " ;
		// conexion a Base de Datos 
			$db = new DB();

		 	$db->consulta($sql ); 


		 	if  ($db->getCantidad() >  0) { 
		 		
		 		 $this->datos['id'] = $db->getResultado("id_usuarios");
		 		$this->datos['nombre'] = $db->getResultado("nombre");
		 		$this->datos['tipo'] = $db->getResultado("tipo_usuario");

		 		$_SESSION['Autenticado'] = ENCONTRADO;
		 		$_SESSION['id'] = $this->datos['id'];
		 		$_SESSION['control'] = md5($this->datos['nombre']);

		 			
		 	}else
		 		$_SESSION['Aunteticado'] = NO_ENCONTRADO; 


		 	return $db->getCantidad();
		}

		function get($dato){

			if ($dato == "id") return $this->datos['id']; 
			elseif ($dato == "nombre" ) return $this->datos['nombre']; 
			else return $this->datos['tipo']; 
		}
	}



 ?>