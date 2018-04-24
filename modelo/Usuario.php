<?php 

class Usuario extends Modelo{


		public function get_tabla(){
			
			$this->sql = "select id_usuarios, nombre, nick, roles.descripcion as tipo, usuarios.status from Usuarios, roles WHERE roles.id_roles = usuarios.id_roles ";

			return $this->consult();

		}

		public function add($datos){

			$this->sql = "INSERT into usuarios (id_usuarios, nick, nombre,clave,pregunta,respuesta, id_roles) values(:id , :nick, :nombre, md5( :clave ) , :pregunta , md5( :respuesta ), :tipo )";

			return $this->consult($datos); 
		}

		public function __construct(){

			$this->tabla = "usuarios";
			
			$this->sql['get'] = "select * from usuarios";

			$this->sql['edit'] = 
				"UPDATE usuarios set nick=:nick , nombre=:nombre , clave=md5(:clave) , pregunta=:pregunta , respuesta=md5(:respuesta) , id_roles=:tipo, fecha_m=now() where id_usuarios= :id ";
		}




	

		public function preparar_consulta_status(){

			$this->sql['consult'] = "select * from Usuarios WHERE id_usuarios=:id ";

			$this->sql['edit'] = "UPDATE usuarios set status = :status where id_usuarios = :id";
		}



		public function preparar_consulta_like($post , $search = false){

			$sql = "SELECT id_usuarios, nombre, nick, roles.descripcion as tipo, usuarios.status FROM Usuarios, roles WHERE roles.id_roles = usuarios.id_roles ";

			if(!$search){

				if( ($post['rol'] == 0)  and  ($post['status'] == 3) ){

					$this->sql = $sql;
					return false;
				}

				elseif ( ($post['rol'] != 0)  and  ($post['status'] == 3)  ){

					$this->sql = $sql." AND Usuarios.id_roles = :rol ";
					return array( 'rol' => $post['rol'] );
				}
				
				elseif ( ($post['rol'] == 0)  and  ($post['status'] != 3)  ){

					$this->sql = $sql." and Usuarios.status = :status ";
					return array('status' => $post['status'] );
				}
				else{

					$this->sql =  $sql."AND Usuarios.status = :status AND  Usuarios.id_roles = :rol ";
					return array('status' => $post['status'] , 'rol' => $post['rol'] );
				}

			}// sin $search
			
		}

	

	}
 ?>