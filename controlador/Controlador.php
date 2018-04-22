<?php 
	/*controlador base*/
	require_once 'config/Rutas.php'; 
	require_once 'config/Errores.php'; 

	
	abstract class Controlador 
	{
		
		protected $menu;

		function __construct()
		{	

			$array = glob(RUTAS['model']."*.php");
			foreach (  $array as $file  ) { 
		
				require $file;
			
			}	
		}
	}


 ?>