<?php 
	class Rol extends Modelo{

		//Función que devuelve un array listo para ejecutar en una consulta preparada
		public function get_prepare_array($arreglo=array()){
			//Creamos un nuevo arreglo vacío
			$arreglo_preparado=array();
			//Recorremos el arreglo que le hemos pasado como parámetro con sus claves
			//y valores correspondientes

			//Por cada vuelta del siguiente bucle foreach vamos asignando claves y valores a nuestro
			//nuevo arreglo con el formato :clave=>valor para que pueda ser utilizadp en la consulta
			//preparada
			foreach($arreglo as $dato=>$valor)
				$arreglo_preparado[':'.$dato]=$valor;
			//Y finalmente devolvemos un arreglo listo para ser usado dentro de nuestra consulta
			//preparada
			return $arreglo_preparado;
		}

		public function insertar($datos=array()){
			//Creamos la consulta sql a ejecutar en nuestro caso una inserción
			$sql="INSERT INTO $this->tabla (descripcion)
			 VALUES (:descripcion)";
			 //Establecemos la conexión con la base de Datos
			 $this->establecer_conexion();
			 //Preparamos la consulta para que pueda ser ejecutada
			 $resultado=$this->conexion->prepare($sql);
			 //Y finalmente la ejecutamos pasándole como parámetro el array devuelto por la función
			 //get_prepare_array
			 $resultado->execute($this->get_prepare_array($datos));
		}

		public function modificar($datos=array()){
			//Creamos el sql de modificación
			$sql="UPDATE $this->tabla SET descripcion=:descripcion,fecha_m=CURRENT_TIMESTAMP(),estado=:estado";
			//Establecemos la conexión sql
			$this->establecer_conexion();
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