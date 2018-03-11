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

	/*
| Field            | Type        | Null | Key | Default | Extra |
+------------------+-------------+------+-----+---------+-------+
| idPersona        | int(11)     | NO   | PRI | NULL    |       |
| idCodigoTelefono | int(11)     | YES  | MUL | NULL    |       |
| idParroquia      | int(11)     | YES  | MUL | NULL    |       |
| nombre           | varchar(50) | YES  |     | NULL    |       |
| apellido         | varchar(50) | YES  |     | NULL    |       |
| sexo             | char(1)     | YES  |     | NULL    |       |
| fechaN           | date        | YES  |     | NULL    |       |
| telefono         | varchar(12) | YES  |     | NULL    |       |
| direccion        | text        | YES  |     | NULL    |       |
| email            | varchar(20) | YES  |     | NULL    |       |
+------------------+-------------+------+-----+---------+-------+

	*/



	class Persona{
 
	// Insertar Datos 
		public function insertar ($idPersona, $idCodigoTelefono, $idParroquia, $nombre, $apellido, $sexo, $fechaN, $telefono, $direccion, $email){
		
			$sql = "INSERT INTO Persona VALUES ($idPersona, $idCodigoTelefono, $idParroquia, '$nombre', '$apellido', '$sexo', '$fechaN', '$telefono' , '$direccion' , '$email' )";	

			$bd = new DB();

			$bd->consulta($sql);  

			$bd->cerrar(); 

	
		}

		public function editar ($idPersona, $idCodigoTelefono, $idParroquia, $nombre, $apellido, $sexo, $fechaN, $telefono, $direccion, $email){
		
			$sql = "UPDATE  Persona set idCodigotelefono=$idCodigoTelefono, idParroquia=$idParroquia, nombre='$nombre', apellido='$apellido', sexo='$sexo', fechaN='$fechaN', telefono='$telefono' , direccion='$direccion' , email='$email' where idPersona=$idPersona";	

			$bd = new DB();

			$bd->consulta($sql);  
		
			$bd->cerrar(); 

	
		}
	// obtner personas usando LIKE, AJAX.

		function getPersonas( $dato , $status  ) {
			$array; // declaracion de un arreglo
			$bd = new DB();

		 	// sentencia sql
			$sql = "SELECT Persona.idPersona, Usuario.nombre , Persona.nombre , apellido, descripcion FROM Usuario, Persona, TiposUsuarios ";


			if( $dato != "" and $status !="t" )
				$sql.= " WHERE Persona.idPersona like '%$dato%'  AND Usuario.status='$status'AND Persona.idPersona = Usuario.idPersona AND Usuario.idTiposUsuarios = TiposUsuarios.idTiposUsuarios AND Usuario.status = TiposUsuarios.status ";
			
			elseif ( $dato != "" and $status == "t" ) 
			 		$sql.= " WHERE Persona.idPersona like '%$dato%' AND Persona.idPersona = Usuario.idPersona AND Usuario.idTiposUsuarios = TiposUsuarios.idTiposUsuarios  ";
			 
			 elseif ( $dato == "" and $status != "t" )

			 	$sql.= " WHERE Usuario.status='$status' AND Persona.idPersona = Usuario.idPersona AND Usuario.idTiposUsuarios = TiposUsuarios.idTiposUsuarios  ";
			 else
			 	$sql.=" WHERE Persona.idPersona = Usuario.idPersona AND Persona.idPersona = Usuario.idPersona AND Usuario.idTiposUsuarios = TiposUsuarios.idTiposUsuarios   ";

			 
			 
			 if (   $bd->consulta($sql,1)  ) {

			 	
			 	for ($i=0; $i <  $bd->getCantidad()  ; $i++) { 
			 	
				 	$array[$i]['cedula'] = $bd->getResultado("idPersona",$i);
				 	$array[$i]['nick'] = $bd->getResultado("usuario.nombre",$i);
				 	$array[$i]['nombre'] = $bd->getResultado("Persona.nombre",$i);
				 	$array[$i]['apellido'] = $bd->getResultado("apellido",$i);
				 	$array[$i]['tipo'] = $bd->getResultado("descripcion",$i);
				 
				 }




			 }

			 return $array; 
		}


// obtner una persona 
		function getPersona($id) {
			$array; // declaracion de un arreglo
			$bd = new DB();

		 	// sentencia sql
			$sql = "SELECT * from Persona, Usuario, TiposUsuarios where Persona.idPersona=$id limit 1 ";


			 if (   $bd->consulta($sql,1)  ) {

			 	
			 	for ($i=0; $i < count(  $bd->getCantidad() ) ; $i++) { 
			 	
				 	$array[$i]['cedula'] = $bd->getResultado("idPersona",$i);
				 	$array[$i]['nick'] = $bd->getResultado("usuario.nombre",$i);
				 	$array[$i]['nombre'] = $bd->getResultado("Persona.nombre",$i);
				 	$array[$i]['apellido'] = $bd->getResultado("apellido",$i);
				 	$array[$i]['email'] = $bd->getResultado("email",$i);
				 	$array[$i]['fecha'] = $bd->getResultado("fechaN",$i);
				 	$array[$i]['tipo'] = $bd->getResultado("descripcion",$i);
				 	$array[$i]['codtelefono'] = $bd->getResultado("idCodigoTelefono",$i);
				 	$array[$i]['sexo'] = $bd->getResultado("sexo",$i);
				 	$array[$i]['telefono'] = $bd->getResultado("telefono",$i);
				 	$array[$i]['direccion'] = $bd->getResultado("direccion",$i);
				 	$array[$i]['email'] = $bd->getResultado("email",$i);
				 	$array[$i]['parroquia'] = $bd->getResultado("idParroquia",$i);
				 	$array[$i]['idtipousuario'] = $bd->getResultado("idTiposUsuarios",$i);
				 
				 
				 }




			 }


			 

			 return $array; 
		}


	}


 ?>

