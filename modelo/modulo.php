<?php 
	class Modulo extends Modelo{
		//Función que inserta un nuevo módulo
		public function insertar($datos=array()){
			//Creamos la Consulta sql
			$sql="INSERT INTO $this->tabla (descripcion) VALUES (:descripcion)";
			//Luego establecemos la conexión
			$this->establecer_conexion(PDO::ERRMODE_WARNING);
			//Luego preparamos la consulta almacenando la consulta preparada en la variable resultado
			$resultado=$this->conexion->prepare($sql);
			//Para finalmente ser Ejecutada
			$resultado->execute(array(':descripcion'=>$datos['descripcion']));
			//Luego liberamos los recursos ocupados por el resultado
			$resultado->closeCursor();
			//Para finalmente cerrar la conexión
			$this->conexion=null;
		}

		//Función que modifica un módulo
		public function modificar($datos=array()){
			//Creamos la consulta de tipo update
			$sql="UPDATE $this->tabla SET descripcion=:descripcion,fecha_m=NOW(),estado=:estado WHERE id=:id";
			//Luego establecemos la conexión
			$this->establecer_conexion(PDO::ERRMODE_WARNING);
			//Luego preparamos la consulta
			$resultado=$this->conexion->prepare($sql);
			//Para después ejecutarla
			$resultado->execute($this->get_prepare_array($datos));
			//Luego liberamos los recursos ocupados por resultado
			$resultado->closeCursor();
			//Para finalmente cerrar la conexión
			$this->conexion=null;
		}

		//Función que devuelve los módulos pertenecientes a un rol
		public function get_modulos($ci){
			//Creamos la consulta sql
			$sql="SELECT * FROM $this->tabla WHERE {$this->tabla}.id IN (SELECT id_modulo FROM permiso WHERE permiso.id_rol IN (SELECT usuario.id_rol FROM usuario WHERE ci=:ci))";
			//Y Luego establecemos la conexión con la base de Datos
			$this->establecer_conexion(PDO::ERRMODE_WARNING);
			//Luego preparamos la consulta
			$resultado=$this->conexion->prepare($sql);
			//Para después ejecutarla
			$resultado->execute(array(':ci'=>$ci));
			//Y almacenamos los registros devueltos en un array
			$registros=$resultado->fetchAll(PDO::FETCH_ASSOC);
			//Luego liberamos los recursos ocupados por el resultado y la conexión
			$resultado->closeCursor();
			$this->conexion=null;
			//Finalmente devolvemos los registros
			return $registros;
		}

		public function __construct(){
			parent::__construct("modulo");
		}
	}
 ?>