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


	class Proveedor{

		// Insertar Datos 
		public function insertar ($idDistribuidora, $idEmpresa, $idParroquia, $idCodigoTelefono, $descripcion, $direccion, $nombre, $apellido, $sexo, $fechaN, $telefono, $email){
		
			

			$bd = new DB();

			
			$status = 'a'; 


			$sql = "INSERT INTO Distribuidora VALUES ($idDistribuidora, $idEmpresa, $idParroquia, $idCodigoTelefono , '$descripcion' ,'$direccion',  '$nombre', '$apellido', '$sexo', '$fechaN', '$email', '$status'  , '$telefono' )";	

			$bd->consulta($sql);  

			$bd->cerrar(); 

	
		}

		//obtener la distribuidora por la Cedula
		public function getId($cedula){

			$bd = new DB();

/*
| Field            | Type        | Null | Key | Default | Extra |
+------------------+-------------+------+-----+---------+-------+
| idDistribuidora  | varchar(18) | NO   | PRI | NULL    |       |
| idEmpresa        | varchar(18) | YES  | MUL | NULL    |       |
| idParroquia      | int(11)     | YES  | MUL | NULL    |       |
| idCodigoTelefono | int(11)     | YES  | MUL | NULL    |       |
| descripcion      | varchar(45) | YES  |     | NULL    |       |
| direccion        | text        | YES  |     | NULL    |       |
| nombre           | varchar(45) | YES  |     | NULL    |       |
| apellido         | varchar(45) | YES  |     | NULL    |       |
| sexo             | char(1)     | Y
| fecha_n          | date        | YES  |     | NULL    |       |
| email            | varchar(45) | 
| status           | char(1)     |
| telefono         | varchar(45) |
+------------------+-------------+------+-----+---------+-------+

*/
			$bd->consulta("SELECT * FROM distribuidora WHERE idDistribuidora=$cedula");  

			$array['cedula'] = $bd->getResultado("idDistribuidora");
			$array['empresa'] = $bd->getResultado("idEmpresa");
			$array['parroquia'] = $bd->getResultado("idParroquia");
			$array['distribuidora'] = $bd->getResultado("descripcion");
			$array['nombre'] = $bd->getResultado("nombre");
			$array['apellido'] = $bd->getResultado("apellido");
			$array['sexo'] = $bd->getResultado("sexo");
			$array['fecha'] = $bd->getResultado("fecha_n");
			$array['email'] = $bd->getResultado("email");
			$array['status'] = $bd->getResultado("status");
			$array['telefono'] = $bd->getResultado("telefono");
			$array['codtelefono'] = $bd->getResultado("idCodigoTelefono");

			$bd->cerrar(); 

			return $array;


		}


	function consulta( $dato , $status  ) {
			$array; // declaracion de un arreglo
			$bd = new DB();

		 	// sentencia sql
			$sql = "SELECT * FROM  distribuidora ";


			if( $dato != "" and $status !="t" )
				$sql.= " WHERE idDistribuidora like '%$dato%'  AND status='$status' ";
			
			elseif ( $dato != "" and $status == "t" ) 
			 		$sql.= " WHERE idDistribuidora like '%$dato%'  like '%$dato%'  ";
			 
			 elseif ( $dato == "" and $status != "t" )

			 	$sql.= " WHERE status='$status' ";
			 

			 
			 
			 if (   $bd->consulta($sql,1)  ) {

			 	
			 	for ($i=0; $i <  $bd->getCantidad()  ; $i++) { 
			 	
				 	$array[$i]['cedula'] = $bd->getResultado("idDistribuidora",$i);
					$array[$i]['empresa'] = $bd->getResultado("idEmpresa",$i);
					$array[$i]['parroquia'] = $bd->getResultado("idParroquia",$i);
					$array[$i]['distribuidora'] = $bd->getResultado("descripcion",$i);
					$array[$i]['nombre'] = $bd->getResultado("nombre",$i);
					$array[$i]['apellido'] = $bd->getResultado("apellido",$i);
					$array[$i]['fecha'] = $bd->getResultado("fecha_n",$i);
					$array[$i]['email'] = $bd->getResultado("email",$i);
					$array[$i]['status'] = $bd->getResultado("status",$i);
					$array[$i]['telefono'] = $bd->getResultado("telefono",$i);
					$array[$i]['codtelefono'] = $bd->getResultado("idCodigoTelefono",$i);
				 
				 }




			 }

			 return $array; 
		}
	}

 ?>