<?php 

class Empresas extends Modelo{


		public function get_tabla(){
			
			$this->sql = "SELECT id_empresas, descripcion, status from empresas ";

			return $this->consult();

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