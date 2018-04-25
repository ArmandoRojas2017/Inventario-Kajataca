<?php 


	class Error404 extends Controlador
	{
		
		function get()
		{
			if($_SESSION['autenticado'] == ENCONTRADO)
			$this->addLog(EVENTOS['intento_ingresar']," una pagina no disponible");
			view("404");
		}
	}
 ?>