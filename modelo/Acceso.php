<?php 



	class Acceso extends Modelo
	{
		
		// ingreso al sistema 
		function validarIngreso(  $user  , $pass  ){

	
		
		// datos a consultar 
			$arreglo = array( "nick" => $user , "clave" => $pass  ); 

		// verificar 
			$registro = $this->consult($arreglo);

		

		 	if ( count($registro) > 0  ) 
		 	{ 
		 		// almacenar datos 
			 		
			 		$_SESSION['nombre'] = $registro[0]['nombre'];
			 		$_SESSION['id'] = $registro[0]['id_usuarios'];
			 		$_SESSION['nick'] = $registro[0]['nick'];
			 		$_SESSION['tipo'] = $registro[0]['descripcion'];
			 		$_SESSION['id_roles'] = $registro[0]['id_roles'];

			 		$_SESSION['autenticado'] = ENCONTRADO;
			 	
			 		return 1;
		 		
		 			
		 	}else{
		 		$_SESSION['aunteticado'] = NO_ENCONTRADO; 
		 		return -1; 
		 	}


		}// fin de la funcion


		public function cambiar($opc , $datos){

			switch ($opc) {
				
				case 1:
					$this->sql = "SELECT pregunta , id_usuarios from usuarios where id_usuarios = :id"; 


					 return $this->consult($datos); 

				break;

				
			}

		}

		public function __construct(){

			//sentencia SQL
			$this->sql = "SELECT id_usuarios, nombre, nick, descripcion, usuarios.id_roles FROM usuarios, roles where nick = :nick AND clave = md5(:clave) AND usuarios.status = 1 " ;

			
		}

		

		
	}



 ?>