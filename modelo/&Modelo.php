<?php 
	/*
	 	 Clase Padre para todos los modelos
		 by: Armando Jose Rojas Querales - 2018
	*/

// Buscar la configuracion



/*
	
	1 = Correcto
	-1 = Error 
	-2 = duplicado 

 */


abstract class Modelo{

		protected $conexion;
		protected $tabla;

		protected $sql; // sentencia SQL 
		protected $error; // mensaje de error 


		

		public function establecer_conexion($tipo_error){
			$this->conexion=new PDO("mysql:host=".HOST."; dbname=".DATABASE,USER,PASS);
			//Aquí establecemos el modo error en el modo que necesitemos
			$this->conexion->setAttribute(PDO::ATTR_ERRMODE,$tipo_error);
		}

		//Función que devuelve un array listo para ejecutar en una consulta preparada
		public function get_prepare_array($arreglo=array()){
			//Creamos un nuevo arreglo vacío
			$arreglo_preparado=array();
			//Recorremos el arreglo que le hemos pasado como parámetro con sus claves
			//y valores correspondientes

			//Por cada vuelta del siguiente bucle foreach vamos asignando claves y valores a nuestro
			//nuevo arreglo con el formato :clave=>valor para que pueda ser utilizado en la consulta
			//preparada
			foreach($arreglo as $dato=>$valor)
				$arreglo_preparado[':'.$dato]=$valor;
			//Y finalmente devolvemos un arreglo listo para ser usado dentro de nuestra consulta
			//preparada
			return $arreglo_preparado;
		}

		public function consult($datos=array()){


				//Creamos el sql
				$sql= $this->sql;

				try{
				//Establecemos la conexion con la función establecer_conexion
				$this->establecer_conexion(PDO::ERRMODE_WARNING);
		
				//Preparamos la consulta con la función prepare de PDO para así evitar inyecciones sql
				$resultado=$this->conexion->prepare($sql);
				//Ejecutamos la consulta pasándole el valor de búsqueda
				$resultado->execute($this->get_prepare_array($datos));

				if(strtoupper($sql[0]) == "S" )
					//Y luego almacenamos el resultado de la consulta en un array bidimensional
					$registros=$resultado->fetchAll(PDO::FETCH_ASSOC);
				else
					$registros = 1; 

				//Luego liberamos los recursos ocupados por el resultado
				$resultado->closeCursor();
						//Luego cerramos la conexión igualándola a null
				$this->conexion=null;
				//Y finalmente devolvemos los registros de la consulta
				return $registros;
					// captura el error 
				}catch(Exception $e){  
					
					return -1;  // codigo Error
				}

			
		}


		public function get_all(){

				//Creamos el sql
				$this->sql= "SELECT * FROM {$this->tabla}";
				return $this->consult();
			
		}

		public function getById($id){

				//Creamos el sql
				$this->sql= "SELECT * FROM {$this->tabla} where id_{$this->tabla} = :id";
				

				$array = array('id' => $id);
				
				return $this->consult($array);
			
		}


		public function deleteById($id){

				//Creamos el sql
				$this->sql= "DELETE FROM {$this->tabla} where id_{$this->tabla} = :id";
				
				$array = array('id' => $id);

				return $this->consult($array);
			
		}

		public function statusChangeById($id){

				

			$status = $this->getById($id)[0]['status'];
			echo $status;
			$status = ($status == 1) ? 0 : 1;
			echo $status;
			$array = array('id' => $id  , 'status' => $status );

					//Creamos el sql
				$this->sql= "UPDATE {$this->tabla} set status = :status  where id_{$this->tabla} = :id";

			
				return $this->consult($array);
			
		}


		public function __destruct(){unset($this);}
	}

 ?>