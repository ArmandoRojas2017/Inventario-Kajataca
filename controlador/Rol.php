<?php 
	

	
	class RolControlador extends Controlador
	{
	
		function __construct(){
			parent::__construct(Rol::class);
		}

		function getSelect(){

			
			$data = $this->modelo->get_select(); 

			componentes("plantillaSelect", compact('data') );
			
		}

	}
 ?>


