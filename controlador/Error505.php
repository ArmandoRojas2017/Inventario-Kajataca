<?php 


	class Error505 extends Controlador
	{
		
		function get()
		{
			if($_SESSION['autenticado'] == ENCONTRADO)
			$this->addLog(EVENTOS['intento_ingresar'],"no permitida");
			view("505");
		}
	}
 ?>