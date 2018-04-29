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


		public function add($datos){

		$this->sql = "INSERT into empresas (id_empresas, descripcion) values(:id , :nombre )";

			echo $this->consult($datos); 

			

			
		}


		public function edit($datos){

			$this->sql = "UPDATE  {$this->tabla} SET   descripcion=:nombre , fecha_m = now() where id_{$this->tabla} = :id";

			return $this->consult($datos); 
		 
		}

	


		public function __construct(){

			$this->tabla = "empresas";
			
		}




	

	}
 ?>