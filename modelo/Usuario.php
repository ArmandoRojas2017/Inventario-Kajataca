<?php 
	if(file_exists('../../modelo/modelo_base.php')) 
		require_once ('../../modelo/modelo_base.php');
	elseif (file_exists('../modelo/modelo_base.php')) {
		require_once ('../modelo/modelo_base.php');
	}
	elseif (file_exists('modelo/modelo_base.php')   ) {
		require_once ('modelo/modelo_base.php');
	}
	elseif (file_exists('../../../modelo/modelo_base.php')   ) {
		require_once ('../../../modelo/modelo_base.php');
	}
	else 
		exit(-1); 

	// Devolver arreglo bidimencional 
	// para mostrar los codigos telefonos

	// tabla -> codigoTelefono
	// 	atributo -> 
	/*		idCodigoTelefono (primary)
			descripcion 
	*/
	

	class Usuario extends Modelo{

	

		protected $status;


	
	//Declaración del constructor
		public function __construct(){
			//Dentro del constructor llama al constructor de la clase padre
			parent::__construct("usuarios");
		}
	

		


	}		

	



	

 ?>