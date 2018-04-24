<?php 

class Logs extends Modelo{


		public function add($datos){

			$this->sql = "INSERT into logs (id_usuarios, id_eventos, descripcion) values(:id , :evento, :descrip )";

			return $this->consult($datos); 
		}
	

		public function __construct(){

			$this->tabla = "logs";
			
		}


	}
 ?>