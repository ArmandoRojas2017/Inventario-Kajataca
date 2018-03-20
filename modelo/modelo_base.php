<?php 

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
		protected $registros;
		protected $adicionar;

		public function establecer_conexion(){
			$this->conexion=new PDO("mysql:host=".HOST."; dbname=".DATABASE,USER,PASS);
			//Aquí establecemos el modo de error en modo warning osea que nos aparezca una ventana
			//en caso de que ocurra un error
			$this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
		}

		public function get_registros(){return $this->registros;}

		public function consult_by($campo,$valor){
			//Creamos el sql
			$sql="SELECT * FROM $this->tabla WHERE $campo=:valor ";
			//Establecemos la conexion con la función establecer_conexion
			$this->establecer_conexion();
			//Preparamos la consulta con la función prepare de PDO para así evitar inyecciones sql
			$resultado=$this->conexion->prepare($sql);
			//Ejecutamos la consulta pasándole el valor de búsqueda
			$resultado->execute(array(':valor'=>$valor));
			//Y luego almacenamos el resultado de la consulta en un array bidimensional
			$this->registros=$resultado->fetchAll(PDO::FETCH_ASSOC);
			//Luego liberamos los recursos ocupados por el resultado
			$resultado->closeCursor();
			//Luego cerramos la conexión igualándola a null
			$this->conexion=null;
		}

		public function delete_by($campo,$valor){
			//Creamos la consulta sql a ejecutar en este caso una tipo DELETE
			$sql=="DELETE FROM $this->tabla WHERE $campo=:valor $this->adicionar";
			//Establecemos la conexión con la base de Datos
			$this->establecer_conexion();
			//Preparamos la consulta sql
			$resultado=$this->conexion->prepare($sql);
			//Luego la ejecutamos
			$resultado->execute(array(':valor'=>$valor));
			//Después Liberamos los recursos ocupados por el resultado
			$resultado->closeCursor();
			//Y luego cerramos la conexión igualándola a null
			$this->conexion=null;
		}

		public function get_all(){
			//Creamos la consulta tipo SELECT
			$sql="SELECT * FROM $this->tabla $this->adicionar";
			//Luego establecemos la conexión con la base de Datos
			$this->establecer_conexion();
			//Preparamos la consulta
			$resultado=$this->conexion->prepare($sql);
			//Luego ejecutamos la consulta
			$resultado->execute(array());
			//Y después almacenamos los registros devueltos por la misma
			$this->registros=$resultado->fetchAll(PDO::FETCH_ASSOC);
			//Liberamos los recursos ocupados por el resultado
			$resultado->closeCursor();
			//Y luego cerramos la conexión
			$this->conexion=null;

			return $this->registros;
		}

		public function get_all_campos($campos){
			//Creamos la consulta tipo SELECT
			//
			$sql="SELECT $campos FROM $this->tabla" ;
			if($this->adicionar != "")
				$sql="SELECT $campos FROM $this->tabla and $adicionar" ;
			
			//Luego establecemos la conexión con la base de Datos
			$this->establecer_conexion();
			//Preparamos la consulta
			$resultado=$this->conexion->prepare($sql);
			//Luego ejecutamos la consulta
			$resultado->execute(array());
			//Y después almacenamos los registros devueltos por la misma
			$this->registros=$resultado->fetchAll(PDO::FETCH_ASSOC);
			//Liberamos los recursos ocupados por el resultado
			$resultado->closeCursor();
			//Y luego cerramos la conexión
			$this->conexion=null;

			return $this->registros;
		}

		/* alterar la tabla a consultar */

		public function setTable($table){
			$this->tabla = $table; 
		}

		public function addConsulta($adicionar){

			$this->adicionar = $adicionar; 
		}



		public function __construct($tabla){
			$this->tabla=$tabla;
			$this->adicionar = "";
		}

		public function __destruct(){unset($this);}
	}
 ?> 