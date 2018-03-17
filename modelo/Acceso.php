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
			$sql = "SELECT * FROM usuarios, roles  where nick='$user' AND clave='$pass'  AND usuarios.id_roles = roles.id_roles" ;
		// conexion a Base de Datos 
			$db = new DB();

		// realiza consulta
		 	$db->consulta($sql ); 

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

		function get($dato){

			if ($dato == "id") return $this->datos['id']; 
			elseif ($dato == "nombre" ) return $this->datos['nombre']; 
			else return $this->datos['tipo']; 
		}
	}



 ?>