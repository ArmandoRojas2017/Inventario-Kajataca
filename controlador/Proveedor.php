<?php 

	class ProveedorControlador extends Controlador
	{
		
		public function __construct(){

			parent::__construct(Proveedor::class);
		
			

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
				'select' => "select/selectUsuarios",
				'encabezado' => $encabezado,
				'contenido' => $modelo->get_tabla()

			);
			$this->vista("usuario",$datos);

		}

		public function ver(){

			$form =  $this->modelo->getById($_POST['id']);

			// toma los datos de la primera posicion
			$inputs = 	$form[0] ;
			$formulario = 'formularios/agregarUsuario';


			$datos =  array(
				
				'titulo' =>  $inputs['nick']

			);

		

			incluir_js("auxiliar",$inputs['id_roles']);
			js("editarUsuario");
			
			view("modal/usuario",compact('datos','formulario','inputs'));
		}


		


		public function getAgregar(){


			$modelo = $this->modelo;
		
		

			$datos = array(

					'titulo' => "Registrar un Nuevo Usuario",
					'icono' => 'plus-sign',
					'select' => "select/selectUsuarios",
					'formulario' => "formularios/agregarUsuario",

				);
			$this->vista("agregarUsuario",$datos);

		}

		// ajax

		public function addUsuario(){

			$modelo = $this->modelo;
		



			$datos = array( 
				"id"        => $_POST['id'] ,  
				"nick"      => $_POST['nick']  , 
				"nombre"    => $_POST['nombre']  , 
				"pregunta"  => $_POST['pregunta'] , 
				"respuesta" => $_POST['respuesta'] , 
				"clave"     => $_POST['clave'] , 
				"tipo"      => $_POST['rol'] 
				 );

			return $modelo->add($datos);

		}


		public function editar(){

			$modelo = $this->modelo;
		

			$datos = array( 
				"id"        => $_POST['id'] ,  
				"nick"      => $_POST['nick']  , 
				"nombre"    => $_POST['nombre']  , 
				"pregunta"  => $_POST['pregunta'] , 
				"respuesta" => $_POST['respuesta'] , 
				"clave"     => $_POST['clave'] , 
				"tipo"      => $_POST['tipo'] 
			);

			var_dump($datos);

			return $modelo->edit($datos) ;

		}


		public function eliminaro(){

			$modelo = $this->modelo;
		


			echo $modelo->deleteById($_POST['id']) ;

		}

		public function cambiarStatus(){

			$modelo = $this->modelo;
		
			echo $modelo->statusChangeById($_POST['id']); 

		}



		public function imprimir(){



			$encabezado = array("Id","Nombre y Apellido","Nick","Estado");


		
			$arreglo = $this->modelo->get_tabla_filtrado($_GET['rol'] , $_GET['status']);
			$datos = [];

			for ($i=0; $i < count($arreglo); $i++) { 
				
				$datos[$i][0] = $arreglo[$i]['id_usuarios'];
				$datos[$i][1] = $arreglo[$i]['nombre'];
				$datos[$i][2] = $arreglo[$i]['nick'];
				$datos[$i][3] = ($arreglo[$i]['status'] == 1) ? "ACTIVO" : "DESACTIVADO";
			}
			$dimension = array("31","62","52","40");
			
			$this->getReporte($encabezado ,$datos , $dimension ); 
		}


		public function filtrar(){


			$contenido = $this->modelo->get_tabla_filtrado($_POST['rol'] , $_POST['status']);

			$encabezado = array(

			array('texto' => 'Id' , 'filtro' => 'id' ),
			array('texto' => 'Nombre y Apellido' , 'filtro' => 'nombre' ),
			array('texto' => 'Nick' , 'filtro' => 'nick' ),
			array('texto' => 'Tipo' , 'filtro' => 'Rol' )
			
			);

			componentes("tabla",compact('contenido','encabezado'));
		}
		
	}



	


 

	

	 
 ?>