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
			
				// pantalla de acceso
				'login' => array( 
					'controller' => 'login' , 
					'js' 	 	 => 'login' ,
					'method' 	 => 'get' 
				) ,
				// pantalla de inicio
				'home' => array( 
					'controller' => 'Principal' , 
					'js' => 'home',
					'method' 	 => 'get' 
				),
				// pantalla de inicio
				'selectRol' => array( 
					'controller' => 'RolControlador' , 
					'js' => 'no',
					'method' 	 => 'getSelect' 
				),
				// pantalla de consulta general de usuarios
				'usuario' => array( 
					'controller' => 'UsuariosControlador' , 
					'js' => 'usuario',
					'method' 	 => 'get' 
				),
				// pantalla de consulta general de usuarios
				'imprimirUsuario' => array( 
					'controller' => 'UsuariosControlador' , 
					'js' => 'no',
					'method' 	 => 'imprimir' 
				),
				//filtrar datos de usuario
				'filtrarUsuario' => array( 
					'controller' => 'UsuariosControlador' , 
					'js' => 'no',
					'method' 	 => 'filtrar' 
				),

				'verUsuario' => array( 
					'controller' => 'UsuariosControlador' , 
					'js' => 'no',
					'method' 	 => 'ver' 
				),

				'editarUsuario' => array( 
					'controller' => 'UsuariosControlador' , 
					'js' => 'no',
					'method' 	 => 'editUsuario' 
				),

				'eliminarUsuario' => array( 
					'controller' => 'UsuariosControlador' , 
					'js' => 'no',
					'method' 	 => 'deleteUsuario' 
				),

				'cambiarStatusUsuario' => array( 
					'controller' => 'UsuariosControlador' , 
					'js' => 'no',
					'method' 	 => 'cambiarStatusUsuario' 
				),



				// formulario de usuarios
				'agregarUsuario' => array( 
					'controller' => 'UsuariosControlador' , 
					'js' => 'agregarUsuario',
					'method' 	 => 'getAgregar' 
				),
				// Verifica usuario y clave por Ajax 
				'verifica' => array( 
					'controller' => 'AccesoControlador' , 
					'js' => 'no',
					'method' 	 => 'pedirAcceso' 
				),
				// cambiar clave con un modal
				'cambiar' => array( 
					'controller' => 'AccesoControlador' , 
					'js' => 'cambiar_clave',
					'method' 	 => 'cambiar_clave' 
				),
				// salir del sistema por ajax
				'salir' => array( 
					'controller' => 'AccesoControlador' , 
					'method' 	 => 'salir' 
				) ,

				// salir del sistema por ajax
				'datos' => array( 
					'controller' => 'AccesoControlador' , 
					'method' 	 => 'datos' ,
					'js' => 'no'
				) ,






				// agregar un nuevo usuario por ajax
				'usuarioNuevo' => array( 
					'controller' => 'UsuariosControlador' , 
					'js' => 'no',
					'method' 	 => 'addUsuario' 
				),
				// obtener nombre de usuario por ajax
				'nombreDeUsuario' => array( 
					'controller' => 'AccesoControlador' , 
					'js' => 'no',
					'method' 	 => 'obtenerUsuario' 
				),
				// verificar usuario por Ajax 
				'verificarEstado' => array( 
					'controller' => 'AccesoControlador' , 
					'js' => 'no',
					'method' 	 => 'verificar_estado' 
				),

					// verificar usuario por Ajax 
				'logs' => array( 
					'controller' => 'LogsControlador' , 
					'js' => 'logs',
					'method' 	 => 'get' 
				),

				'Error404' => array(

					'controller' => 'Error404',
					'js' => '',
					'method' => 'get'
				),

				'Error505' => array(

					'controller' => 'Error505',
					'js' => '',
					'method' => 'get'
				),




				'distribuidora' => array( 
					'controller' => 'DistribuidoraControlador' , 
					'js' => 'proveedor',
					'method' 	 => 'get' 
				),

				'agregarDistribuidora' => array( 
					'controller' => 'DistribuidoraControlador' , 
					'js' => 'agregarProveedor',
					'method' 	 => 'getAgregar' 
				),
				// registra usuario por Ajax
				'nuevaDistribuidora' => array( 
					'controller' => 'DistribuidoraControlador' , 
					'js' => 'no',
					'method' 	 => 'add' 
				),


				'verDistribuidora' => array( 
					'controller' => 'DistribuidoraControlador' , 
					'js' => 'no',
					'method' 	 => 'ver' 
				),

				'editarDistribuidora' => array( 
					'controller' => 'DistribuidoraControlador' , 
					'js' => 'no',
					'method' 	 => 'editar' 
				),

				'eliminarDistribuidora' => array( 
					'controller' => 'DistribuidoraControlador' , 
					'js' => 'no',
					'method' 	 => 'eliminar' 
				),

				'statusDistribuidora' => array( 
					'controller' => 'DistribuidoraControlador' , 
					'js' => 'no',
					'method' 	 => 'cambiarStatus' 
				),

				'selectDistribuidora' => array( 
					'controller' => 'DistribuidoraControlador' , 
					'js' => 'no',
					'method' 	 => 'select' 
				),







				'empresas' => array( 
					'controller' => 'EmpresasControlador' , 
					'js' => 'empresas',
					'method' 	 => 'get' 
				),
				'agregarEmpresa' => array( 
					'controller' => 'EmpresasControlador' , 
					'js' => 'agregarEmpresa',
					'method' 	 => 'getAgregar' 
				),
				// registra usuario por Ajax
				'nuevaEmpresa' => array( 
					'controller' => 'EmpresasControlador' , 
					'js' => 'no',
					'method' 	 => 'add' 
				),


				'verEmpresa' => array( 
					'controller' => 'EmpresasControlador' , 
					'js' => 'no',
					'method' 	 => 'ver' 
				),

				'editarEmpresa' => array( 
					'controller' => 'EmpresasControlador' , 
					'js' => 'no',
					'method' 	 => 'editar' 
				),

				'eliminarEmpresa' => array( 
					'controller' => 'EmpresasControlador' , 
					'js' => 'no',
					'method' 	 => 'eliminar' 
				),

				'statusEmpresa' => array( 
					'controller' => 'EmpresasControlador' , 
					'js' => 'no',
					'method' 	 => 'cambiarStatus' 
				),

				'selectEmpresa' => array( 
					'controller' => 'EmpresasControlador' , 
					'js' => 'no',
					'method' 	 => 'select' 
				),





			
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

				$this->js = " ";
				$this->controller = "Error404";
				$this->method = "get";
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