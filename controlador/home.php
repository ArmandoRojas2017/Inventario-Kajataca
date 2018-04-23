<?php 


	class Principal extends Controlador
	{
		
		function get()
		{
			$galeria = new Galeria();
			

			view("home",$this->addToCompact(array( 'imagenes' => $galeria->get() ) ));
		}
	}
 ?>