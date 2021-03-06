<?php 

class Distribuidora extends Modelo{


		public function get_tabla(){
			
			$this->sql = "SELECT id_distribuidora as id , empresas.descripcion as empresa , distribuidora.descripcion as distribuidora , nombre , telefono , distribuidora.status from distribuidora, empresas where distribuidora.id_empresas=empresas.id_empresas";



			return $this->consult();

		}
		


	


		public function add($datos){

			$this->sql = "INSERT into {$this->tabla} (id_{$this->tabla}, id_empresas, descripcion, nombre, telefono) values(:id , :empresa , :distribuidora, :nombre , :telefono )";

			return $this->consult($datos); 

			
		}


		public function edit($datos){

			$this->sql = "UPDATE  {$this->tabla} SET   descripcion=:distribuidora , fecha_m = now() where id_{$this->tabla} = :id";

			return $this->consult($datos); 
		 
		}


	

		


		public function __construct(){

			$this->tabla = "distribuidora";
			
		}




	

	}
 ?>