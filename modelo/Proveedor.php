<?php 

class Proveedor extends Modelo{


		public function get_tabla(){
			
			$this->sql = "SELECT id_distribuidora as id , empresas.descripcion as empresa , distribuidora.descripcion as distribuidora , nombre , telefono , distribuidora.status from distribuidora, empresas where distribuidora.id_empresas=empresas.id_empresas";



			return $this->consult();

		}
		

		public function get_tabla_filtrado($rol , $status){
			
			$sql = "select id_usuarios, nombre, nick, roles.descripcion as tipo, usuarios.status from Usuarios, roles WHERE roles.id_roles = usuarios.id_roles ";

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

		public function add($datos){

			$this->sql = "INSERT into usuarios (id_usuarios, nick, nombre,clave,pregunta,respuesta, id_roles) values(:id , :nick, :nombre, md5( :clave ) , :pregunta , md5( :respuesta ), :tipo )";

			return $this->consult($datos); 
		}


		public function edit($datos){

			$this->sql = "UPDATE  usuarios SET   nick=:nick, nombre=:nombre, clave = md5( :clave ), pregunta = :pregunta, respuesta=md5( :respuesta ) , id_roles=:tipo where id_usuarios = :id";

			return $this->consult($datos); 
		}

	

		


		public function __construct(){

			$this->tabla = "Proveedorr";
			
		}




	

	}
 ?>