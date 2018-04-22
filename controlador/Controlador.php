<?php 
	/*controlador base*/
	require_once 'config/Rutas.php'; 
	require_once 'config/Errores.php'; 

	
	abstract class Controlador 
	{
		
		protected $menu;
		protected $controlador;

		function __construct()
		{	

			$array = glob(RUTAS['model']."*.php");
			foreach (  $array as $file  ) { 
		
				require $file;
			
			}

			$this->menu = new Menu(); 	
		}


		// funcion para agregar al compact,
		// el cual es utilizado para pasar variables a la vista 
		public function addToCompact($datos=array()){
		
		// Opciones del Menu para La Vista 
			$opciones = $this->menu->getOpciones();
		

			$x = array('opciones');

			if (count($datos) > 0 ){

				extract($datos);


				foreach ($datos as $key => $value) {
					
					array_push($x, $key);
				}

			}   
				

			return compact($x);
		}// fin de la funcion



	}


 ?>