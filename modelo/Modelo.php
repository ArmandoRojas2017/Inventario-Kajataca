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

		public function consult_by($campo,$valor){

			if($this->sql['consult'] == -1)
				return $this->error;
			else {

				//Creamos el sql
				$sql= $this->sql['consult'];
				//Establecemos la conexion con la función establecer_conexion
				$this->establecer_conexion(PDO::ERRMODE_WARNING);
				//Preparamos la consulta con la función prepare de PDO para así evitar inyecciones sql
				$resultado=$this->conexion->prepare($sql);
				//Ejecutamos la consulta pasándole el valor de búsqueda
				$resultado->execute(array(':valor'=>$valor));
				//Y luego almacenamos el resultado de la consulta en un array bidimensional
				$registros=$resultado->fetchAll(PDO::FETCH_ASSOC);
				//Luego liberamos los recursos ocupados por el resultado
				$resultado->closeCursor();
				//Luego cerramos la conexión igualándola a null
				$this->conexion=null;
				//Y finalmente devolvemos los registros de la consulta
				return $registros;
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
		public function set_sql_array($sql){

			if($sql['get'] != "" ) $this->sql['get'] = $sql['get'];
			if($sql['consult'] != "" ) $this->sql['consult'] = $sql['consult'];
		
		}


		public function insertar($datos=array()){

			if($this->sql['insert'] == -1)
				return $this->error;
			else {
			//Creamos la consulta sql a ejecutar en nuestro caso una inserción
			$sql="INSERT INTO $this->tabla (descripcion)
			 VALUES (:descripcion)";
			 //Establecemos la conexión con la base de Datos
			 $this->establecer_conexion(PDO::ERRMODE_WARNING);
			 //Preparamos la consulta para que pueda ser ejecutada
			 $resultado=$this->conexion->prepare($sql);
			 //Y finalmente la ejecutamos
			 $resultado->execute(array(':descripcion'=>$datos['descripcion']));
			 //Luego liberamos los recursos ocupados por nuestro resultado
			 $resultado->closeCursor();
			 //Luego cerramos la conexión igualándola a null
			 $this->$conexion=null;
			}
		}


		public function modificar($datos=array()){
			//Creamos el sql de modificación
			if($this->sql['edit'] == -1)
				return $this->error;
			else {
			$sql="UPDATE $this->tabla SET descripcion=:descripcion,fecha_m=NOW(),estado=:estado WHERE id=:id";
			//Establecemos la conexión sql con un modo de error de alerta
			$this->establecer_conexion(PDO::ERRMODE_WARNING);
			//Preparamos la consulta
			$resultado=$this->conexion->prepare($sql);
			//Y la ejecutamos finalmente
			$resultado->execute($this->get_prepare_array($datos));
			//Liberamos los resursos ocupados por el resultado con la función closeCursor
			$resultado->closeCursor();
			//Y cerramos la conexión igualándola a null
			$this->conexion=null;
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