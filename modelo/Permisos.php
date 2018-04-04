<?php 

	session_start();

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


	if($_SESSION['autenticado'] == -1) header("location:?url=index&msg=1");

	class Permisos extends Modelo{



		public function __construct(){

			$this->tabla = "permisos";
			
			$this->sql['get'] = "select * from permisos";
		}

		function consultar( $permisos){

			$_SESSION['tipo']
		}





			
		

		

	}
 ?>