<?php 
	
	

	/*Establecer Menu */

	

	Class Menu{  

		protected $id;
		protected $opciones; 
		protected $permisos; 


		// captura el id del usuario 
		public function __construct(){

			if(isset($_SESSION['id'] ))
				$this->id = $_SESSION['id'];
			else 
				$this->id = 0;
			
			$this->permisos = new Permisos();
		}

		// devuelve las opciones del usuario 
		public function get(){

			return $this->opciones;

		}

		protected function operaciones(){

			return 
				array(
					'titulo' => 'Operaciones', 
					 'icono' => 'list-alt',
					 'contenido' => array( 
					 								"inventario" => array( 'texto' => 'Inventario' , 
					 													 'icono' => 'tag' 
					 													 ),

													"despacho" => array( 'texto' => 'Despacho' , 
					 													 'icono' => 'tags'  
					 													) , 
					 												
													"compra" => array( 'texto' => 'Orden de Compra' , 
					 													 'icono' => 'briefcase'  
					 													)
					 							 )  
					 		);

		}

		protected function gestion(){
			/*
				1 = sub modulo consultar usuarios
			 */
			$usuario = 0;
			$id_usuario = "no";

			if($this->permisos->consultar(MODULOS['consultar_usuario']) == -1 ){
				$usuario =  array( 'texto' => 'Usuarios' , 'icono' => 'user'  );
				$id_usuario =  "usuario";
			}


			$empresa = 0;
			$id_empresa = "no";

			if($this->permisos->consultar(MODULOS['consultar_empresa']) == -1 ){
				$empresa =  array( 'texto' => 'Empresas' , 'icono' => 'user'  );
				$id_empresa =  "empresas";
			}

			


			return  array('titulo' => 'Gestion', 
					 	 	'icono' => 'paperclip',
					 		'contenido' => array( 
					 								"$id_usuario" => $usuario ,

													"proveedor" => array( 'texto' => 'Distribuidora' , 
					 													 'icono' => 'folder-close'  
					 													),
													"articulo" => array( 'texto' => 'Articulos' , 
					 													 'icono' => 'barcode'  
					 													),
													"roles" => array(
															'texto' => "Roles de Usuarios",
															'icono' => "eye-open"
														),

													"$id_empresa" => $empresa ,
					 							 )  
					 		);


		}

		protected function reportes(){

			return array('titulo' => 'Reportes', 
					 	  	'icono' => 'print',
					 		'contenido' => array( 
					 								"reporte1" => array( 'texto' => 'Stock de Articulos' , 
					 													 'icono' => 'duplicate'  
					 													) ,
													"reporte2" => array( 'texto' => 'Flujo de Despacho' , 
					 													 'icono' => 'stats'  
					 													) ,  
													"reporte3" => array( 'texto' => 'Regisro de Movimientos' , 
					 													 'icono' => 'retweet'  
					 													) ,
													"reporte4" => array( 'texto' => 'Logs del Sistema' , 
					 													 'icono' => 'transfer'  
					 													),
												
					 							 )  
					 		);
		}

		public function informacion(){

			return    array('titulo' => 'Informacion', 
					 	  	'icono' => 'exclamation-sign',
					 		'contenido' => array( 
					 								"config1" => array( 'texto' => 'Acerca de la Cervezeria la Preferida' , 
					 													 'icono' => 'eye-open'  
					 													) ,
													"config2" => array( 'texto' => 'Acerca del Software' , 
					 													 'icono' => 'phone'  
					 													) ,  
													"config3" => array( 'texto' => 'Manual de Usuario' , 
					 													 'icono' => 'heart'  
					 													) ,
													"config4" => array( 'texto' => 'Manual del Sistema' , 
					 													 'icono' => 'book'  
					 													),
												
					 							 )  
					 		);
		}

		public function getOpciones($id = 0){

				// modificar posteriormente
			

				return  array( 
						
						$this->operaciones(), $this->gestion(),  
						$this->reportes()  ,  $this->informacion()
			
					 ); 

			
		}


	}

 ?>