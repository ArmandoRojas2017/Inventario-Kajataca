<?php 
	class Permiso extends Modelo{
		//Función que registra un nuevo Permiso
		public function insertar($datos=array()){
			//Creamos la consulta sql
			$sql="INSERT INTO $this->tabla VALUES (:id_rol,:id_modulo)";
			//Luego establecemos la conexión
			$this->establecer_conexion(PDO::ERRMODE_EXCEPTION);
			//Hacemos un try catch para capturar el error
			//y verificar si se ha repetido el registro
			try{
				//Para después preparar laconsulta
				$resultado=$this->conexion->prepare($sql);
				//Luego ejecutamos la consulta
				$resultado->execute($this->get_prepare_array($datos));
				//Después de ejecutar la consulta liberamos los recursos ocupados por el resultado
				$resultado->closeCursor();
				//Para fnalmente cerrar la conexión
				$this->conexion=null;
				//En caso de registro exitoso retornamos un mensaje para notificar
				return "Registro exitoso";
			}catch(Exception $e){
				//En caso de que haya un rol ya asociado a un módulo
				if ($e->getMessage()=="SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry '".$datos['id_rol']."-".$datos['id_modulo']."' for key 'PRIMARY'")
					return "Ya hay un rol asociado a ese módulo";
				//En el caso de otro tipo de error
				return $e->getMessage();
			}
		}

		//Función que modifica un permiso
		public function modificar($datos=array()){
			//Creamos una consulta de tipo update
			$sql="UPDATE $this->tabla SET id_rol=:id_rol,id_modulo=:id_modulo WHERE id_rol=:id_rol_m AND id_modulo=:id_modulo_m";
			//Establecemos la conexión
			$this->establecer_conexion(PDO::ERRMODE_EXCEPTION);
			//Usamos un try catch para capturar ek error
			try{
				//Luego preparamos la consulta
				$resultado=$this->conexion->prepare($sql);
				//Para después ejecutarla
				$resultado->execute($this->get_prepare_array($datos));
				//Luego liberamos los recursos ocupados por el resultado
				$resultado->closeCursor();
				//Para después cerrar la conexión
				$this->conexion=null;
				//En caso de una modificación exitosa retornamos un mensaje notificando
				return "Modificación exitosa";
			}catch(Exception $e){
				//En caso de que haya un rol ya asociado a un módulo
				if ($e->getMessage()=="SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry '".$datos['id_rol']."-".$datos['id_modulo']."' for key 'PRIMARY'")
					return "Ya hay un rol asociado a ese módulo";
				//En el caso de otro tipo de error
				return $e->getMessage();
			}
		}

		//Acá sobreescribimos la función get_all que esta clase hereda de Modelo porque esta la implementará
		//de forma diferente
		public function get_all(){
			//Establecemos la nueva consulta tipo select en donde se puedan ver los nombres de cada módulo y rol y más no su id
			$sql="SELECT {$this->tabla}.id,modulo.descripcion,rol.descripcion FROM {$this->tabla},rol,modulo WHERE id_rol=rol.id AND id_modulo=modulo.id";
			//Luego establecemos la conexión
			$this->establecer_conexion(PDO::ERRMODE_WARNING);
			//Para después preparar la consulta
			$resultado=$this->conexion->prepare($sql);
			//Luego la ejecutamos
			$resultado->execute(array());
			//Para luego almacenar los registros devueltos por la consulta
			$registros=$resultado->fetchAll(PDO::FETCH_ASSOC);
			//Finalmente liberamos los recursos ocupados por resultado
			$resultado->closeCursor();
			//Para después cerrar la conexión
			$this->conexion=null;
			//Y finalmente devolvemos los registros de la consulta
			return $registros;
		}

		public function __construct(){
			parent::__construct("permiso");
		}
	}

 ?>