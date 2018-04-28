<?php 

class Empresas extends Modelo{


		public function get_tabla(){
			
			$this->sql = "SELECT id_empresas, descripcion, status from empresas ";

			return $this->consult();

		}
		

		public function get_tabla_filtrado($rol , $status){
			
			$sql = "SELECT id_usuarios, nombre, nick, roles.descripcion as tipo, usuarios.status from usuarios, roles WHERE roles.id_roles = usuarios.id_roles ";

			$datos = []; 

			if($rol != -3 )
				$sql .= " and roles.id_roles = :rol"; 
				

			if($status != -3 )
				$sql .= " and usuarios.status = :status"; 
			
			
			$this->sql = $sql;


			if( $rol == -3  && $status == -3) 
				$datos = array();
			elseif($rol != -3 && $status != -3)
				$datos = array('rol' => $rol , 'status' => $status);
			elseif ($rol != 3 && $status == -3)
				$datos = array('rol' => $rol );
			else
				$datos = array( 'status' => $status);


			return $this->consult($datos);

		}


		public function verificar($id , $nick){

			$array = array( 'id' => $id , 'nick' => $nick );

			$this->sql = "SELECT * from usuarios where id_usuarios = :id or nick=:nick";

			return $this->consult($array);
		}

		public function add($datos){

			$control = $this->verificar($datos['id'] , $datos['nick']); 

			if(count($control) > 1){

				return -1; //nick o cedula registrada  

			}else {

				$this->sql = "INSERT into usuarios (id_usuarios, nick, nombre,clave,pregunta,respuesta, id_roles) values(:id , :nick, :nombre, md5( :clave ) , :pregunta , md5( :respuesta ), :tipo )";

			return $this->consult($datos); 

			}

			
		}


		public function edit($datos){

			$control = $this->verificar($datos['id'] , $datos['nick']); 

			if(count($control) > 1){

				return -1; //nick o cedula registrada  

			}else {
			$this->sql = "UPDATE  usuarios SET   nick=:nick, nombre=:nombre, clave = md5( :clave ), pregunta = :pregunta, respuesta=md5( :respuesta ) , id_roles=:tipo where id_usuarios = :id";

			return $this->consult($datos); 
		 }
		}

	


		public function __construct(){

			$this->tabla = "empresas";
			
		}




	

	}
 ?>