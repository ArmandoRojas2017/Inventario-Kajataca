<?php 
	if(file_exists('../../modelo/modelo_base.php')) 
		require_once ('../../modelo/modelo_base.php');
	elseif (file_exists('../modelo/modelo_base.php')) {
		require_once ('../modelo/modelo_base.php');
	}
	elseif (file_exists('modelo/modelo_base.php')   ) {
		require_once ('modelo/modelo_base.php');
	}
	elseif (file_exists('../../../modelo/modelo_base.php')   ) {
		require_once ('../../../modelo/modelo_base.php');
	}
	else 
		exit(-1); 

	// Devolver arreglo bidimencional 
	// para mostrar los codigos telefonos

	// tabla -> codigoTelefono
	// 	atributo -> 
	/*		idCodigoTelefono (primary)
			descripcion 
	*/
	

	class Usuario extends Modelo{

	

		protected $status;

		/*Constructor*/
		 function get(){

			// sentencia sql para consulta
			$sql = "SELECT * FROM usuarios, roles where usuarios.id_roles = roles.id_roles " ;
			// llamar a  conexio a DB
			$db = new DB();

			//realizar consulta
			$db->consulta($sql);

			//declarando un array bidimencional
			$array = NULL; 

			if(  $db->getCantidad() > 0) { 
				
				for ($i=0; $i < $db->getCantidad(); $i++) { 
					
					$array[$i]['id'] = $db->getResultado("id_usuarios" ,$i);
					$array[$i]['nombre'] = $db->getResultado('nombre' ,$i);
					$array[$i]['nick'] = $db->getResultado('nick' ,$i);
					$array[$i]['tipo'] = $db->getResultado('descripcion' ,$i);
					
					$this->status[$i] = $db->getResultado('status' ,$i);
				}


			}
			
			

			$db->cerrar();
			return $array; 
		}


		function getId($id){

			$sql = "SELECT * FROM usuarios, roles where usuarios.id_roles = roles.id_roles and  usuarios.id_usuarios = $id " ;

			$db = new DB(); 

			$db->consulta($sql);

			$array = null;

			if($db->getCantidad() > 0){

				$array['id'] = $db->getResultado('id');
				$array['nombre'] = $db->getResultado('nombre');
				$array['nick'] = $db->getResultado('nick');
				$array['rol'] = $db->getResultado('rol');
				$array['status'] = $db->getResultado('status');
			}

			$db->cerrar();

			return $array; 

		}

		function getStatus(){

			return $this->status;
		}


		function insertar( $idTiposUsuarios, $idPersona, $nombre, $clave){

			//sentencia para registrar
			$status = 'a';

			// llamar a  conexio a DB
			$db = new DB();

			$idUsuario = $db->getId("Usuario","idUsuario");

			$sql = "INSERT INTO usuario VALUES ( $idUsuario, $idTiposUsuarios, $idPersona, '$nombre', '$clave' , '$status' )";

			echo $sql;
			// usar el consultar
			$db->consulta($sql); 

			$db->cerrar(); 
		}

		function editar( $idTiposUsuarios, $idPersona, $nombre, $clave){

		

			// llamar a  conexio a DB
			$db = new DB();

			$db->consulta("SELECT * FROM usuario where idPersona=$idPersona ");
			$idUsuario= $db->getResultado("idUsuario");

			$sql = "UPDATE usuario set idTiposUsuarios=$idTiposUsuarios, idPersona=$idPersona, nombre='$nombre', clave='$clave' where idUsuario=$idUsuario";

			echo $sql;
			// usar el consultar
			$db->consulta($sql); 

			$db->cerrar(); 
		}


// obtener un usuario por la Cedula de la persona
		function buscar($id){

			$encontrado[1] = "Error en la clase Usuario()";
			
			$db = new DB();
			
			// cosnulta
			$db->consulta("SELECT * FROM usuarios where id_personas=$id ");

			// resultado 1. Nombre 2.ID 3.Stautus

			$encontrado[1] = $db->getResultado("nombre");
			$encontrado[0] = $db->getResultado("idUsuario");
			$encontrado[2] = $db->getResultado("status");


			return $encontrado;
		}

		function eliminar($id,$status){

			
			$db = new DB();
			
			// Ejecutar modificacion

			$db->consulta("UPDATE Usuario set status = '$status' where idUsuario=$id ");

		}

	


		


	}		

	




	

 ?>