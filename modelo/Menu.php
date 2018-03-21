<?php 
	
	/*Establecer Menu */

	Class Menu{  

		protected $id;
		protected $opciones; 
		protected $permisos; 

		// captura el id del usuario 
		public function __construct($id){

			$this->id = $id; 
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

		public function getOpciones($id = 0){

				// modificar posteriormente
				
				$operaciones = $this->operaciones();

				$opciones =  array( 
						$operaciones 
					 ,

					 	 array('titulo' => 'Gestion', 
					 	 	'icono' => 'paperclip',
					 		'contenido' => array( 
					 								"usuario" => array( 'texto' => 'Usuarios' , 
					 													 'icono' => 'user'  
					 													) ,

													"proveedor" => array( 'texto' => 'Proveedores' , 
					 													 'icono' => 'folder-close'  
					 													),
													"articulo" => array( 'texto' => 'Articulos' , 
					 													 'icono' => 'barcode'  
					 													)
					 							 )  
					 		),

					 	  array('titulo' => 'Reportes', 
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
					 		),


					 	   array('titulo' => 'Informacion', 
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
					 		),




				
					 ); 

				return $opciones; 
		}


	}

 ?>