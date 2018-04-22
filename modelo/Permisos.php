<?php 

	session_start();



	class Permisos extends Modelo{



		public function __construct(){

			$this->tabla = "permisos";
			
			$this->sql = "select * from permisos where  id_roles = :id and id_sub_modulos = :modulo ";
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