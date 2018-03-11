<?php 
	
	/*Establecer Menu */

	Class Menu{  

		public function getOpciones($id = 0){

				// modificar posteriormente
				$opciones =  array( 

					 array('titulo' => 'Operaciones', 
					 		'icono' => 'usd',
					 		'contenido' => array( 
					 								"cuentas1" => array( 'texto' => 'Inventario' , 
					 													 'icono' => 'piggy-bank' 
					 													 ),

													"cuentas2" => array( 'texto' => 'Despacho' , 
					 													 'icono' => 'piggy-bank'  
					 													) , 
					 												
													"cuentas3" => array( 'texto' => 'Orden de Compra' , 
					 													 'icono' => 'briefcase'  
					 													)
					 							 )  
					 		),

					 	 array('titulo' => 'Gestion', 
					 	 	'icono' => 'paperclip',
					 		'contenido' => array( 
					 								"otros1" => array( 'texto' => 'Usuarios' , 
					 													 'icono' => 'envelope'  
					 													) ,

													"otros2" => array( 'texto' => 'Proveedores' , 
					 													 'icono' => 'open-file'  
					 													),
													"otros3" => array( 'texto' => 'Articulos' , 
					 													 'icono' => 'open-file'  
					 													)
					 							 )  
					 		),

					 	  array('titulo' => 'Reportes', 
					 	  	'icono' => 'cog',
					 		'contenido' => array( 
					 								"config1" => array( 'texto' => 'Stock de Articulos' , 
					 													 'icono' => 'eye-open'  
					 													) ,
													"config2" => array( 'texto' => 'Flujo de Despacho' , 
					 													 'icono' => 'heart-empty'  
					 													) ,  
													"config3" => array( 'texto' => 'Regisro de Movimientos' , 
					 													 'icono' => 'bitcoin'  
					 													) ,
													"config4" => array( 'texto' => 'Logs del Sistema' , 
					 													 'icono' => 'user'  
					 													),
												
					 							 )  
					 		),


					 	   array('titulo' => 'Informacion', 
					 	  	'icono' => 'cog',
					 		'contenido' => array( 
					 								"config1" => array( 'texto' => 'Acerca de la Cervezeria la Preferida' , 
					 													 'icono' => 'eye-open'  
					 													) ,
													"config2" => array( 'texto' => 'Acerca del Software' , 
					 													 'icono' => 'heart-empty'  
					 													) ,  
													"config3" => array( 'texto' => 'Manual de Usuario' , 
					 													 'icono' => 'bitcoin'  
					 													) ,
													"config4" => array( 'texto' => 'Manual del Sistema' , 
					 													 'icono' => 'user'  
					 													),
												
					 							 )  
					 		),




				
					 ); 

				return $opciones; 
		}


	}

	$menu = new Menu(); 
		

	
 ?>	