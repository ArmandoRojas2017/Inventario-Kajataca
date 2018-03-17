<?php 
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
		exit(-1); 

	// Devolver arreglo bidimencional 
	// para mostrar los codigos telefonos

	// tabla -> codigoTelefono
	// 	atributo -> 
	/*		idCodigoTelefono (primary)
			descripcion 
	*/
	

	class Usuario{

	

	

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
				
				}
			}
			
			

			$db->cerrar();
			return $array; 
		}

/*

Usuario
+-----------------+--------------+------+-----+---------+-------+
| Field           | Type         | Null | Key | Default | Extra |
+-----------------+--------------+------+-----+---------+-------+
| idUsuario       | int(11)      | NO   | PRI | NULL    |       |
| idTiposUsuarios | int(11)      | YES  | MUL | NULL    |       |
| idPersona       | int(11)      | YES  | MUL | NULL    |       |
| nombre          | varchar(45)  | YES  |     | NULL    |       |
| clave           | varchar(100) | YES  |     | NULL    |       |
| status          | char(1)      | YES  |     | NULL    |       |
+-----------------+--------------+------+-----+---------+-------+*/
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
			$db->consulta("SELECT * FROM usuarios where id_persona=$id ");

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