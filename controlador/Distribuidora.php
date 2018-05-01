<?php 

	class DistribuidoraControlador extends Controlador
	{
		
		public function __construct(){

			parent::__construct(Distribuidora::class);
		
			

		}

		public function get(){

	
			$this->addLog(EVENTOS['ingreso_a'],'consulta de usuarios');
			
			$modelo = $this->modelo;
		

			$encabezado = array(

			array('texto' => 'Rif o Cedula' , 'filtro' => 'id' ),
			array('texto' => 'Empresa' , 'filtro' => 'empresa' ),
			array('texto' => 'Distribuidora' , 'filtro' => 'distribuidora' ),
			array('texto' => 'Nombre y Apellido' , 'filtro' => 'nombre' ),
			array('texto' => 'Telefono' , 'filtro' => 'telefono' )
			
			);


			$datos = array(

				'titulo' => "Consultar Distribuidora",
				'icono' => 'search',
				'encabezado' => $encabezado,
				'botonera'  => "botoneraTablaImprimir",
				'contenido' => $modelo->get_tabla()

			);
			$this->vista("usuario",$datos);

		}


		// cargar por ajax modal
		public function ver(){



			$form =  $this->modelo->getById($_POST['id']);

			// toma los datos de la primera posicion
			$inputs = 	$form[0] ;
			$formulario = 'formularios/agregarEmpresa';


			$datos =  array(
				
				'titulo' =>  $inputs['descripcion']

			);

			$this->addLog(EVENTOS['peticion_ajax'],' modulo distribuidora para ver detalladamente a la distribuidora '.$inputs['descripcion']
);

		
			js("editarProveedor");
			
			view("modal/usuario",compact('datos','formulario','inputs'));
		}


		
		// ajax

		public function getAgregar(){

		$this->addLog(EVENTOS['ingreso_a'],' registrar empresas ');
			$modelo = $this->modelo;
		
		

			$datos = array(

					'titulo' => "Registrar un Nueva Distribuidora",
					'icono' => 'plus-sign',
					'formulario' => "formularios/agregarDistribuidora",

				);
			$this->vista("agregarUsuario",$datos);

		}

		// ajax

		public function add(){

			$modelo = $this->modelo;
			$this->addLog(EVENTOS['peticion_ajax'],' modulo empresas para registrar un nueva empresa con nombre '.$_POST['nombre']);
		


			$datos = array( 
				"id"        => $_POST['id'] ,   
				"nombre"    => $_POST['nombre']  , 
				"distribuidora"    => $_POST['distribuidora']  , 
				"empresa"    => $_POST['empresa']  , 
				"telefono"    => $_POST['telefono']  , 

				 );

			// respuesta 
			  echo $modelo->add($datos);
		
			
			}


		

		// ajax
		public function editar(){

			$modelo = $this->modelo;

			$this->addLog(EVENTOS['peticion_ajax'],' modulo Empresas para editar una empresa '.$_POST['nombre']);
		

				$datos = array( 
				"id"        => $_POST['id'] ,   
				"nombre"    => $_POST['nombre']  , 
	
				 );

			echo $modelo->edit($datos) ;

		}

		// ajax
		public function eliminar(){

			$modelo = $this->modelo;
			
			$this->addLog(EVENTOS['peticion_ajax'],' modulo empresas para eliminar un usuario con rif '.$_POST['id']);


			echo $modelo->deleteById($_POST['id']) ;

		}

		public function cambiarStatus(){

			$modelo = $this->modelo;

			$this->addLog(EVENTOS['peticion_ajax'],' modulo empresas para cambiar de estado un empresa con rif '.$_POST['id']);
		
			echo $modelo->statusChangeById($_POST['id']); 

		}

		public function select(){

			
			$data = $this->modelo->get_select(); 

			componentes("plantillaSelect", compact('data') );
			
		}

		
	}



	


 

	

	 
 ?>