<?php 
	
	
	class Rutas 
	{	

		protected $rutas;	
		protected $lista;	
		protected $controller;	
		protected $js;	
		protected $method;	

		/* load drivers */

		protected function loadDrivers(){

			$array = glob(RUTAS['controller']."*.php");
			
			foreach (  $array as $file  ) { 
		
				require_once $file;
			
			}

		}

		/*Rutas*/

		protected function establecerRutas(){

			$this->rutas = array( 
				
				'login' => array( 
					'controller' => 'login' , 
					'js' 	 	 => 'login' ,
					'method' 	 => 'get' 
				) ,
				'home' => array( 
					'controller' => 'Principal' , 
					'js' => 'home',
					'method' 	 => 'get' 
				),
				'usuario' => array( 
					'controller' => 'UsuariosControlador' , 
					'js' => 'usuario',
					'method' 	 => 'get' 
				),
				'agregarUsuario' => array( 
					'controller' => 'UsuariosControlador' , 
					'js' => 'Usuarios/agregar',
					'method' 	 => 'getAgregar' 
				),
				// Verifica usuario y clave por Ajax 
				'verifica' => array( 
					'controller' => 'AccesoControlador' , 
					'js' => 'no',
					'method' 	 => 'pedirAcceso' 
				),
				'salir' => array( 
					'controller' => 'AccesoControlador' , 
					'method' 	 => 'salir' 
				) ,

			
				); 


			/* Establecer lista de Rutas */

			$i = 0; 

			foreach ($this->rutas as $key => $value) 
				$this->lista[$i++] = $key;
		}

		// verifica si existe

		function __construct()
		{	

			$url = empty($_GET['url']) ?  'login':$_GET['url'];
			$this->establecerRutas();
			$this->loadDrivers();

			$encontrado = null; 

			foreach ($this->lista as  $value){

				if ( $value ==  $url ) $encontrado= 1;  
			}
			
			if($encontrado != null){

				$this->js = $this->rutas[$url]['js'];
				$this->controller = $this->rutas[$url]['controller'];
				$this->method = $this->rutas[$url]['method'];

			}else{

				$this->js = "";
				$this->controller = "404";
			}
					
		}

	

		public function getController(){
			//controller name
			$controller = $this->controller; 
			//name of the method
			$method = $this->method; 

			// create the object 
			$object = new $controller();

			//call method
			$object->$method();
		}

		public function getJs(){
			return $this->js; 
		}


		
	}

	

	$rutas = new Rutas();



 ?>