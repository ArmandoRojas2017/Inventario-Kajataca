<?php 


	class Galeria
	{
		protected $rutas;
		protected $imagenes; 

		function __construct($ruta = "images/")
		{
			$this->rutas = $ruta; 
			$this->imagenes();
			$this->addRuta(); 
		}

		function setImagenes($arreglo){

			$this->imagenes($arreglo);
			$this->addRuta();
		}

		function get(){

			return $this->imagenes; 
		}

		protected function imagenes($arreglo = false){

			if(!$arreglo)
				$this->imagenes =  array( "Negocio.jpg" , "ar.jpg" , "kajataca.jpg"  );
			else 
				$this->imagenes =  $arreglo;

		}

		// adicionar ruta a las imagenes de la galeria 
		protected function addRuta(){

			for ($i=0; $i < count($this->imagenes ); $i++) 

				$this->imagenes[$i] = $this->rutas . $this->imagenes[$i]; 
			
		}

	}

 ?>