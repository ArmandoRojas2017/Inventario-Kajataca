<?php 


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
			// encontro registros
			if (count($registro) > 0)
				return 1;
			else // no encontro registros
				return -1;
		}


	}


 ?>