<?php 

	//activar sesion
session_start();

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


	// Status 
	// true = 1
	// false = 0



	abstract class Modelo{

		protected $conexion;
		protected $tabla;

		//Declaración de funciones abstractas de inserción y modificación ya que las diferentes
		//clases que hereden de modelo la implementarán de formas distintas
		public abstract function insertar($datos=array());
		public abstract function modificar($datos=array());
		//Fin de declaración de funciones abstractas

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
			//Creamos el sql
			$sql="SELECT * FROM $this->tabla WHERE $campo=:valor";
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

		public function get_all(){
			//Creamos la consulta tipo SELECT
			$sql="SELECT * FROM $this->tabla";
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

		public function __construct($tabla){
			$this->tabla=$tabla;
		}

		public function __destruct(){unset($this);}
	}
 ?> 