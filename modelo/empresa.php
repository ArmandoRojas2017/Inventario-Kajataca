<?php 
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

	// Devolver arreglo bidimencional 
	// para mostrar los codigos telefonos

	// tabla -> codigoTelefono
	// 	atributo -> 
	/*		idCodigoTelefono (primary)
			descripcion 
	*/
	

	class Empresa{

		var $resultado;

		function Empresa(){

			// sentencia sql para consulta
			$sql = " SELECT * FROM empresa ";
			// llamar a  conexio a DB
			$db = new DB();

			//realizar consulta
			$db->consulta($sql);

			//declarando un array bidimencional
			$array; 

			for ($i=0; $i <  $db->getCantidad(); $i++) { 
				
				$array[$i]['id'] = $db->getResultado('idEmpresa' ,$i);
				$array[$i]['texto'] = $db->getResultado('descripcion' ,$i);
			}

			$this->resultado = $array;

			$db->cerrar();
		}

		function get(){

			return $this->resultado;		

		}


		function insertar($codigo){

			// llamar a  conexio a DB
			$db = new DB();

			$ultimoId =  $this->get()[count($this->get()) - 1]['id']  ;

			$ultimoId++; 

			$sql = "INSERT INTO CodigoTelefono values ($ultimoId,'$codigo','a')";

			$db->consulta($sql);

			$db->cerrar();

		}


	}

 ?>