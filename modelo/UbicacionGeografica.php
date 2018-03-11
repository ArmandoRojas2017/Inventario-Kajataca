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
	

	class UbicacionGeografica{

		var $estado;
		var $municipio;
		var $parroquia;

		/*Constructor*/

		function UbicacionGeografica(){

			// requiere de su metodo consultar(tabla)
			// asigna el resultado de la consulta a las propiedades

			$this->estado = $this->consultar("estado");
			$this->municipio = $this->consultar("municipio");
			$this->parroquia = $this->consultar("parroquia");

		}

		/* 
			Funcion para hacer busqueda en la base de datos 
			segun la tabla (estado, municipio, parroquia)

		*/

		private function consultar($tabla){

			// sentencia sql para consulta
			$sql = " SELECT * FROM $tabla " ;
			// llamar a  conexio a DB
			$db = new DB();

			//realizar consulta
			$db->consulta($sql);

			//declarando un array bidimencional
			$array; 

			for ($i=0; $i <  $db->getCantidad(); $i++) { 
				
				$array[$i]['id'] = $db->getResultado("id$tabla" ,$i);
				$array[$i]['texto'] = $db->getResultado('descripcion' ,$i);
				$array[$i]['status'] = $db->getResultado('status' ,$i);
			}

			

			$db->cerrar();
			return $array; 
		}

		 function consultarWhere($tabla,$id){

			// sentencia sql para consulta
			$sql = " SELECT * FROM $tabla where id$tabla = '$id' and status='a' " ;
			// llamar a  conexio a DB
			$db = new DB();

			//realizar consulta
			$db->consulta($sql);

			//declarando un array bidimencional
			$array; 

			for ($i=0; $i <  $db->getCantidad(); $i++) { 
				
				$array[$i]['id'] = $db->getResultado("id$tabla" ,$i);
				$array[$i]['texto'] = $db->getResultado('descripcion' ,$i);
				$array[$i]['status'] = $db->getResultado('status' ,$i);
			}

			

			$db->cerrar();
			return $array; 
		}


		function consultarLike($tabla, $descripcion, $dato, $status){

			// sentencia sql para consulta
			$sql;
			if ($status != "t")
				$sql = " SELECT * FROM $tabla WHERE $descripcion LIKE '%".$dato."%' AND status='$status' " ;
			else 
				$sql = " SELECT * FROM $tabla WHERE $descripcion LIKE '%".$dato."%'  " ;
			// llamar a  conexio a DB
			$db = new DB();

			//realizar consulta
			$db->consulta($sql);

			//declarando un array bidimencional
			$array; 

			for ($i=0; $i <  $db->getCantidad(); $i++) { 
				
				$array[$i]['id'] = $db->getResultado("id$tabla",$i);
				$array[$i]['texto'] = $db->getResultado('descripcion' ,$i);

				if($tabla == 'municipio'){
					$array[$i]['idEstado'] = $db->getResultado('idEstado' ,$i);

				}
			}

			

			$db->cerrar();
			return $array; 
		}


		function consultarMuncipioPorEstado( $idEstado ){

			// sentencia sql para consulta
			$sql;
			
			$sql = " SELECT * FROM municipio WHERE  AND idEstado=$idEstado AND status='a' " ;
		
			// llamar a  conexio a DB
			$db = new DB();

			//realizar consulta
			$db->consulta($sql);

			//declarando un array bidimencional
			$array; 

			for ($i=0; $i <  $db->getCantidad(); $i++) { 
				
				$array[$i]['id'] = $db->getResultado("id$tabla",$i);
				$array[$i]['texto'] = $db->getResultado('descripcion' ,$i);
			}

			

			$db->cerrar();
			return $array; 
		}


		// devolver los arreglos respectivamente bidimencionales 
		// con [0] posicion
		// con [id] [texto] atributo
		function getEstado(){
			return $this->estado;		
		}

		function getMunicipio(){
			return $this->municipio;		
		}

		function getParroquia(){
			return $this->parroquia;		
		}

		/*Buscar datos*/

		function buscarEstado($id){

			$encontrado[1] = "Error en la clase UbicacionGeografica()";

			for ($i=0; $i < count($this->getEstado()) ; $i++) { 

				if($id == $this->getEstado()[$i]['id'] ){

					$encontrado[1] = $this->getEstado()[$i]['texto']; 
					$encontrado[0] = $this->getEstado()[$i]['id']; 
					$encontrado[2] = $this->getEstado()[$i]['status']; 
					
					$i = count($this->getEstado()) +  1;
				}	
			}

			return $encontrado;
		}

		function buscarMunicipio($id){

			$encontrado[1] = "Error en la clase UbicacionGeografica()";

			for ($i=0; $i < count($this->getMunicipio()) ; $i++) { 

				if($id == $this->getMunicipio()[$i]['id'] ){

					$encontrado[1] = $this->getMunicipio()[$i]['texto']; 
					$encontrado[0] = $this->getMunicipio()[$i]['id']; 
					$encontrado[2] = $this->getMunicipio()[$i]['status']; 
					$encontrado[3] = $this->getMunicipio()[$i]['idEstado']; 
					
					$i = count($this->getMunicipio()) +  1;
				}	
			}

			return $encontrado;
		}




		/*insertar datos*/
		function insertar($codigo,$tabla="estado"){

			// llamar a  conexio a DB
			$db = new DB();
			$sql = ""; // inicializar

			$ultimoId;

			if($tabla = "estado") 

				$ultimoId =  $this->getEstado()[count($this->getEstado()) - 1]['id']  ;
			elseif($tabla = "municipio") 

				$ultimoId =  $this->getMunicipio()[count($this->getMunicipio()) - 1]['id']  ;
			else 
				$ultimoId =  $this->getParroquia()[count($this->getParroquia()) - 1]['id']  ;

			$ultimoId++; 

			$sql = "INSERT INTO $tabla values ($ultimoId,'$codigo','a')";

			$db->consulta($sql);

			$db->cerrar();

		}

		function insertarMunicipio($dato,$idEstado){

			// llamar a  conexio a DB
			$db = new DB();

			$tabla = "municipio";
			
			$ultimoId =  $this->getMunicipio()[count($this->getMunicipio()) - 1]['id']  ;
		

			$ultimoId++; 

			$sql = "INSERT INTO $tabla values ($ultimoId, $idEstado , '$dato', 'a')";

			$db->consulta($sql);

			$db->cerrar();

		}


		function modificar($id, $codigo, $tabla="estado"){

			// llamar a  conexio a DB
			$db = new DB();


			$sql = "UPDATE  $tabla set descripcion= ' $codigo ' where id$tabla = $id  ";

			$db->consulta($sql);

			$db->cerrar();

		}


		function eliminar($id, $tabla="estado"){

			// llamar a  conexio a DB
			$db = new DB();

			$db->consulta("SELECT * FROM $tabla WHERE  id$tabla =  '$id' ");

			$status = $db->getResultado("status");


			if($status == 'a') $status = 'd'; 
			else $status = 'a';



			$sql = "UPDATE  $tabla set status = '$status' where id$tabla = $id  ";

			$db->consulta($sql);

			$db->cerrar();

		}



	}





	

 ?>