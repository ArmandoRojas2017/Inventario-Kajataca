<?php 
	class Usuario extends Modelo{

		public function insertar($datos=array()){
			//Primero creamos la consulta sql tipo INSERT
			$sql="INSERT INTO $this->tabla (ci,nombre,nick,clave,id_rol) VALUES (:ci,:nombre,:nick,:clave,:id_rol)";
			//Luego establecemos la conexion en modo de error excepción
			$this->establecer_conexion(PDO::ERRMODE_EXCEPTION);
			//Hacemos un try catch porque en el caso de que haya un usuario con el mismo nombre de usuario el objeto
			//e perteneciente a la clase exception tiene que devolver un error y así notificar al usuario
			try{
				//Luego preparamos la consulta
				$resultado=$this->conexion->prepare($sql);
				//Para luego ejecutarla
				$resultado->execute($this->get_prepare_array($datos));
				//Liberanos los recursos ocupados por el resultado
				$resultado->closeCursor();
				//Y finalmente cerramos la conexión
				$this->conexion=null;
				//Luego devolvemos un mensaje para indicar que el usuario haya sido registrado con éxito
				return "Usuario registrado con éxito";
			}catch(Exception $e){
				//En el caso de que la cédula a registrar ya exista
				if ($e->getMessage()=="SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry '".$datos['ci']."' for key 'PRIMARY'")
					return "Ya existe una persona con esta cédula";
				//En caso de que sea otro tipo de error
				return $e->getMessage();
			}
		}

		//Función que se encarga de modificar un usuario
		public function modificar($datos=array()){
			//Primero creamos el sql tipo UPDATE
			$sql="UPDATE $this->tabla SET ci=:ci,nombre=:nombre,nick=:nick,clave=:clave,id_rol=:id_rol,estado=:estado,fecha_m=NOW() WHERE ci=:cedula_modificar";
			//Luego establecemos la conexión
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
				return "Datos modificados con éxito";
			}catch(Exception $e){
				//En caso de que haya una nueva cédula y esta exista
				if ($e->getMessage()=="SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry '".$datos['ci']."' for key 'PRIMARY'")
					return "Ya existe una persona con esta cédula";
				//En caso de otro tipo de error
				return $e->getMessage();
			}
		}

		public function get_all(){
			//Creamos la consulta sql
			$sql="SELECT ci,nombre,nick,{$this->tabla}.fecha_c,{$this->tabla}.fecha_m,{$this->tabla}.estado,descripcion AS rol FROM {$this->tabla},rol WHERE id_rol=id";
			//Establecemos la conexión
			$this->establecer_conexion(PDO::ERRMODE_WARNING);
			//Luego preparamos la consulta
			$resultado=$this->conexion->prepare($sql);
			//Para luego ejecutarla
			$resultado->execute(array());
			//Luego almacenamos el resultado en la variable registro
			$registros=$resultado->fetchAll(PDO::FETCH_ASSOC);
			//Liberamos los recursos ocupados por el resultado y cerramos la conexión
			$resultado->closeCursor();
			$this->conexion=null;
			//Y finalmente devolvemos los registros devueltos por la consulta
			return $registros;
		}

		public function get_usuario($nick,$clave){
			//Creamos la consulta sql
			$sql="SELECT ci,nombre,nick,{$this->tabla}.fecha_c,{$this->tabla}.fecha_m,{$this->tabla}.estado,descripcion AS rol FROM {$this->tabla},rol WHERE id_rol=id AND nick=:nick AND clave=:clave";
			//Luego establecemos la conexión con la base de Datos
			$this->establecer_conexion(PDO::ERRMODE_WARNING);
			//Para después preparar la consulta
			$resultado=$this->conexion->prepare($sql);
			$resultado->execute(array(':nick'=>$nick,':clave'=>$clave));
			//Luego almacenamos el registro que nos devuelva la consulta
			$registro=$resultado->fetchAll(PDO::FETCH_ASSOC);
			//Luego liberamos recursos
			$resultado->closeCursor();
			$conexion=null;
			//Y finalmente devolvemos el registro
			return $registro;
		}

		public function __construct(){
			parent::__construct("usuario");
		}
	}
 ?>