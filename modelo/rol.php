<?php 



	class Rol extends Modelo{

	
		//Declaración del constructor
		public function __construct(){
			//Dentro del constructor llama al constructor de la clase padre
			$this->tabla = "rol"; 

			$this->sql['get'] = "SELECT id_roles, descripcion, status FROM roles";
		}

		public function preparar_consulta(){

			$this->sql['get'] = "SELECT id_roles, descripcion FROM roles WHERE status=1";

		}
	}
 ?>