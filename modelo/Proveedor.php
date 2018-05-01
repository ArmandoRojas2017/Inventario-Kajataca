<?php 

class Proveedor extends Modelo{


		public function get_tabla(){
			
			$this->sql = "SELECT id_distribuidora as id , empresas.descripcion as empresa , distribuidora.descripcion as distribuidora , nombre , telefono , distribuidora.status from distribuidora, empresas where distribuidora.id_empresas=empresas.id_empresas";



			return $this->consult();

		}
		


	


		public function add($datos){

			$this->sql = "INSERT into {$this->tabla} (id_{$this->tabla}, id_empresas, nombre, telefono) values(:id , :empresa , :nombre , :telefono )";

			return $this->consult($datos); 

			
		}


		public function edit($datos){

			$this->sql = "UPDATE  {$this->tabla} SET   descripcion=:nombre , fecha_m = now() where id_{$this->tabla} = :id";

			return $this->consult($datos); 
		 
		}


	

		


		public function __construct(){

			$this->tabla = "Proveedorr";
			
		}




	

	}
 ?>