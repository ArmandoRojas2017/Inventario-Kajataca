<?php 
	/*
	 	 Clase Padre para todos los modelos
		 by: Armando Jose Rojas Querales - 2018
	*/

// Buscar la configuracion

if(file_exists('../../config/DB.php')) 
		require_once ('../../config/DB.php');
	elseif (file_exists('../config/DB.php')) {
		require_once ('../config/DB.php');
	}

	elseif (file_exists('../../../config/DB.php')   ) {
		require_once ('../../../config/DB.php');
	}
	elseif (file_exists('../config/DB.php')   ) {
		require_once ('../config/DB.php');
	}
	elseif (file_exists('config/DB.php')   ) {
		require_once ('config/DB.php');
	}
	else 
		exit("NO EXISTE LA CONEXION CON LA CONFIGURACION");

/*
	
	1 = Correcto
	-1 = Error 
	-2 = duplicado 

 */


abstract class Modelo{

		protected $conexion;
		protected $tabla;

		/* Array con Sentencia SQl para las distintas operaciones a realizar*/
		protected $sql;
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

			if($this->sql['consult'] == -1)
				return $this->error;
			else {

				//Creamos el sql
				$sql= $this->sql['consult'];
				try{
				//Establecemos la conexion con la función establecer_conexion
				$this->establecer_conexion(PDO::ERRMODE_WARNING);
				//Preparamos la consulta con la función prepare de PDO para así evitar inyecciones sql
				$resultado=$this->conexion->prepare($sql);
				//Ejecutamos la consulta pasándole el valor de búsqueda
				$resultado->execute($this->get_prepare_array($datos));
				//Y luego almacenamos el resultado de la consulta en un array bidimensional
				$registros=$resultado->fetchAll(PDO::FETCH_ASSOC);
				//Luego liberamos los recursos ocupados por el resultado
				$resultado->closeCursor();
						//Luego cerramos la conexión igualándola a null
				$this->conexion=null;
				//Y finalmente devolvemos los registros de la consulta
				return $registros;
					// captura el error 
				}catch(Exception $e){  return -1;  }

			}
		}

		public function get_array(){

			if($this->sql['get'] == -1)
				return $this->error;
			else {
			//Creamos la consulta tipo SELECT
			$sql=$this->sql['get'];
			//Luego establecemos la conexión con la base de Datos
			$this->establecer_conexion(PDO::ERRMODE_WARNING);
			//Preparamos la consulta
			$resultado=$this->conexion->prepare($sql);
			//Luego ejecutamos la consulta
			$resultado->execute(array());
			//Y después almacenamos los registros devueltos por la misma
			$registros=$resultado->fetchAll(PDO::FETCH_ASSOC);
			//Liberamos los recursos ocupados por el resultado
			$resultado->closeCursor();
			//Y luego cerramos la conexión
			$this->conexion=null;
			//Para finalmente devolver los registros
			return $registros;
			}
		}

		//modificar las consultas 
		protected function set_sql_array($sql){

			if($sql['get'] != "" ) $this->sql['get'] = $sql['get'];
			if($sql['consult'] != "" ) $this->sql['consult'] = $sql['consult'];
			if($sql['insert'] != "" ) $this->sql['insert'] = $sql['insert'];
			if($sql['edit'] != "" ) $this->sql['edit'] = $sql['edit'];
		
		}


		public function insert($datos=array()){

			if($this->sql['insert'] == -1)
				return $this->error;
			else {

				try{
					//Creamos la consulta sql a ejecutar en nuestro caso una inserción
					$sql=$this->sql['insert'];
					 //Establecemos la conexión con la base de Datos
					 $this->establecer_conexion(PDO::ERRMODE_WARNING);
					 //Preparamos la consulta para que pueda ser ejecutada
					 $resultado=$this->conexion->prepare($sql);
					 //Y finalmente la ejecutamos
					 $resultado->execute($this->get_prepare_array($datos));
					 //Luego liberamos los recursos ocupados por nuestro resultado
					 $resultado->closeCursor();
			

					 return 1;

				}catch(Exception $e){
					return -1; 
				}
			}
		}


		public function modificar($datos=array()){
			//Creamos el sql de modificación
			if($this->sql['edit'] == -1)
				return $this->error;
			else {
			$sql="UPDATE $this->tabla SET descripcion=:descripcion,fecha_m=NOW(),estado=:estado WHERE id=:id";
			
			$this->establecer_conexion(PDO::ERRMODE_EXCEPTION);
				//Luego hacemos un try catch para capturar el error en caso de que ocurra
				try{
					//Preparamos la consulta
					$resultado=$this->conexion->prepare($sql);
					//Para luego ejecutarla
					$resultado->execute($this->get_prepare_array($datos));
					//Liberamos los recursos ocupados por el resultado
					$resultado->closeCursor();
					//Y luego cerramos la conexión
					$conexion=null;
					//Y en caso de que todo haya ido bién devolvemos un mensaje notificando la situación
					return 1;

				}catch(Exception $e){
					//En caso de que haya una nueva cédula y esta exista
					if ($e->getMessage()=="SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry '".$datos['ci']."' for key 'PRIMARY'")
						return -2;
					//En caso de otro tipo de error
					return -1;
				}

			}
		}

		public function __construct(){
			
			// definir mensaje de error 
			$this->error = "Sentencia SQL no declarada en el Array SQL";

			/* Inicializar sentencia sql */
			$this->$sql['insert'] = -1; 
			$this->$sql['edit'] = -1; 
			$this->$sql['consult'] = -1; 
			$this->$sql['get'] = -1; 
		}

		public function __destruct(){unset($this);}
	}

 ?>