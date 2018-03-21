<?php 
	
	
	class Rutas 
	{	

		protected $rutas;	
		protected $lista;	
		protected $controller;	
		protected $js;	



		/*Rutas*/

		protected function establecerRutas(){

			$this->rutas = array( 
				
				'index' => array( 'controller' => 'index' , 'js' => 'index'  ) ,
				'home' => array( 'controller' => 'home' , 'js' => 'home'  ) ,
				'usuario' => array( 'controller' => 'Usuarios/usuario' , 'js' => 'usuarios'  ) ,
				'agregarUsuario' => array( 'controller' => 'Usuarios/agregar' , 'js' => 'Usuarios/agregar'  ) ,
				'404' => array( 'controller' => '404') 

				); 


			/* Establecer lista de Rutas */

			$i = 0; 

			foreach ($this->rutas as $key => $value) 
				$this->lista[$i++] = $key;
		}

		// verifica si existe

		function __construct($url)
		{	
			$this->establecerRutas();

			$encontrado = null; 

			foreach ($this->lista as  $value){

				if ( $value ==  $url ) $encontrado= 1;  
			}
			
			if($encontrado != null){

				$this->js = $this->rutas[$url]['js'];
				$this->controller = $this->rutas[$url]['controller'];

			}else{

				$this->js = "";
				$this->controller = "404";
			}
					
		}

	

		public function getController(){
			return $this->controller; 
		}

		public function getJs(){
			return $this->js; 
		}

	


		
	}

	

	



 ?>