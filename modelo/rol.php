<?php 

	if(file_exists('../../modelo/Modelo.php')) 
		require_once ('../../modelo/Modelo.php');
	elseif (file_exists('../modelo/Modelo.php')) {
		require_once ('../modelo/Modelo.php');
	}
	elseif (file_exists('modelo/Modelo.php')   ) {
		require_once ('modelo/Modelo.php');
	}
	elseif (file_exists('../../../modelo/Modelo.php')   ) {
		require_once ('../../../modelo/Modelo.php');
	}
	else 
		exit("BASE DE DATOS NO ENCONTRADA EN ESTE SERVIDOR: LLAMAR AL 0414-5235969 PARA MAS INFORMACION");

	class Rol extends Modelo{

	
		//Declaración del constructor
		public function __construct(){
			//Dentro del constructor llama al constructor de la clase padre
			$this->tabla = "rol"; 

			$this->sql['get'] = "SELECT * FROM roles";
		}
	}
 ?>