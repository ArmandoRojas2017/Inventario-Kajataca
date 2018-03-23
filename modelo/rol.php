<?php 
	class Rol extends Modelo{

		public function insertar($datos=array()){
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

		public function modificar($datos=array()){
			//Creamos el sql de modificación
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

		//Declaración del constructor
		public function __construct(){
			//Dentro del constructor llama al constructor de la clase padre
			parent::__construct("rol");
		}
	}
 ?>