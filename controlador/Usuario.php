<?php 

	class UsuariosControlador extends Controlador
	{
		
		public function __construct(){

			parent::__construct(Usuario::class);
			// validar el acceso
			$this->acceso(MODULOS['modulo_usuario']);
			

		}

		public function get(){

	

			$modelo = $this->modelo;
		

			$encabezado = array(

			array('texto' => 'Id' , 'filtro' => 'id' ),
			array('texto' => 'Nombre y Apellido' , 'filtro' => 'nombre' ),
			array('texto' => 'Nick' , 'filtro' => 'nick' ),
			array('texto' => 'Tipo' , 'filtro' => 'Rol' )
			
			);


			$datos = array(

				'titulo' => "Consultar Usuarios",
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
			js("Usuarios/editar");
			
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
				"tipo"      => 1 );

			return $modelo->add($datos);

		}


		public function editUsuario(){

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