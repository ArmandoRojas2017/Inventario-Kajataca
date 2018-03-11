<?php 
	
	/*Establecer Menu */

	Class Menu{  

		public function getOpciones($id = 0){

				// modificar posteriormente
				$opciones =  array( 

					 array('titulo' => 'Operaciones', 
					 		'icono' => 'usd',
					 		'contenido' => array( 
					 								"cuentas1" => array( 'texto' => 'Ir a Despacho' , 
					 													 'icono' => 'piggy-bank' 
					 													 ),

													"cuentas2" => array( 'texto' => 'Abastecer Despacho' , 
					 													 'icono' => 'piggy-bank'  
					 													) , 
					 												
													"cuentas3" => array( 'texto' => 'Ir a Inventario' , 
					 													 'icono' => 'briefcase'  
					 													) ,  
													"cuentas4" => array( 'texto' => 'Abastecer Inventario' , 
					 													 'icono' => 'credit-card'  
					 													) 
					 							 )  
					 		),

					 	 array('titulo' => 'Usuarios', 
					 	 	'icono' => 'paperclip',
					 		'contenido' => array( 
					 								"otros1" => array( 'texto' => 'Registrar Usuario' , 
					 													 'icono' => 'envelope'  
					 													) ,

													"otros2" => array( 'texto' => 'Consultar Usuarios' , 
					 													 'icono' => 'open-file'  
					 													)
					 							 )  
					 		),

					 	  array('titulo' => 'Configuracion', 
					 	  	'icono' => 'cog',
					 		'contenido' => array( 
					 								"config1" => array( 'texto' => 'Registrar Empresas' , 
					 													 'icono' => 'eye-open'  
					 													) ,
													"config2" => array( 'texto' => 'Consultar Empresas' , 
					 													 'icono' => 'heart-empty'  
					 													) ,  
													"config3" => array( 'texto' => 'Regisrar Proveedor' , 
					 													 'icono' => 'bitcoin'  
					 													) ,
													"config4" => array( 'texto' => 'Consultar Proveedor' , 
					 													 'icono' => 'user'  
					 													),
													"config4" => array( 'texto' => 'Adicionar Presentacion' , 
					 													 'icono' => 'user'  
					 													),
																		
													"config4" => array( 'texto' => 'Consultar Presentaciones' , 
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