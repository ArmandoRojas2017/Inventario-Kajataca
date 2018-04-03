<?php 
	/*controlador base*/
	require_once 'modelo/Menu.php'; 

	
	abstract class Controlador 
	{
		
		protected $menu;

		function __construct($id = 0)
		{
			$this->menu = new Menu($id); 
		}
	}


 ?>