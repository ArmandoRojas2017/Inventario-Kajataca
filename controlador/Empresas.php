<?php 

	class EmpresasControlador extends Controlador
	{
		
		public function __construct(){

			parent::__construct(Empresas::class);
			
			

		}

		public function get(){

			// validar el acceso
			$this->acceso(MODULOS['consultar_empresa']);

			$this->addLog(EVENTOS['ingreso_a'],' consulta de empresas');
			
			$modelo = $this->modelo;
		

			$encabezado = array(

			array('texto' => 'Rif' , 'filtro' => 'id' ),
			array('texto' => 'Nombre de la Empresa' , 'filtro' => 'nombre' ),
		
			
			);


			$datos = array(

				'titulo' => "Consultar Empresas",
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

			$this->addLog(EVENTOS['peticion_ajax'],' modulo empresas para ver detalladamente a la empresa '.$inputs['nombre']
);

			incluir_js("auxiliar",$inputs['id_roles']);
			js("editarEmpresa");
			
			view("modal/usuario",compact('datos','formulario','inputs'));
		}


		
		// ajax

		public function getAgregar(){

		$this->addLog(EVENTOS['ingreso_a'],' registrar empresas ');
			$modelo = $this->modelo;
		
		

			$datos = array(

					'titulo' => "Registrar una Nueva Empresa",
					'icono' => 'plus-sign',
					'formulario' => "formularios/agregarEmpresa",

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

	
				 );

			// respuesta 
			  echo $modelo->add($datos);
			/*
			if ($r == 1)
				$this->addLog(EVENTOS['genero_un'],' nueva Empresa con nombre '.$_POST['nombre']);
			else 
				$this->addLog(EVENTOS['intento'],' registrar una empresa con nombre '.$_POST['nombre']);
				*/
			
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



	


		
	}



	


 

	

	 
 ?>