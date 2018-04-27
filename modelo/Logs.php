<?php 

class Logs extends Modelo{


		public function add($datos){

			$this->sql = "INSERT into logs (id_usuarios, id_eventos, descripcion) values(:id , :evento, :descrip )";

			return $this->consult($datos); 
		}

		public function consultar(){

			$this->sql = "SELECT logs.fecha , nick , eventos.descripcion as evento , logs.descripcion as descripcion  from logs, usuarios, eventos where usuarios.id_usuarios = logs.id_usuarios AND logs.id_eventos = eventos.id_eventos   ";

			return $this->consult(); 
		}
	

		public function __construct(){

			$this->tabla = "logs";
			
		}


	}
 ?>