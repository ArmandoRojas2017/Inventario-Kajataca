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


	if($_SESSION['autenticado'] == -1) 
		echo "<script> window.location.href='?url=index'  </script>";

	class Permisos extends Modelo{



		public function __construct(){

			$this->tabla = "permisos";
			
			$this->sql['consult'] = "select * from permisos where  id_roles = :id and id_sub_modulos = :modulo ";
		}

		function consultar( $id_sub_modulo ){

			$registro = 
				$this->consult(array(  
					'id' => $_SESSION['id_roles'] , 
					'modulo' => $id_sub_modulo 
					));

				



			if (count($registro) > 0)
				return 1;
			else 
				return -1;
		}

		function validaPantalla($id_sub_modulo){
				// denegar servicio
			if($this->consultar($id_sub_modulo) != -1) {
				view("505");
				exit();
			}
		}


	}


 ?>