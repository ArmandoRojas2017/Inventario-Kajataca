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


	class Usuario extends Modelo{



		public function __construct(){

			$this->tabla = "usuarios";
			
			$this->sql['get'] = "select * from usuarios";
		}

		public function preparar_consulta(){
			
			$this->sql['get'] = "select id_usuarios, nombre, nick, roles.descripcion as tipo, usuarios.status from Usuarios, roles WHERE roles.id_roles = usuarios.id_roles ";
			
			$this->sql['consult'] = "select * from Usuarios, roles WHERE roles.id_roles = usuarios.id_roles AND id_usuarios=:id ";

		}

		

	}
 ?>