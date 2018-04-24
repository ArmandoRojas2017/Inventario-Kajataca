<?php 

	class UsuariosControlador extends Controlador
	{
		
	
		public function get(){

		
			// validar el acceso
			$this->acceso(MODULOS['consultar_usuario']);

			$modelo = new Usuario();
		

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


		


		public function getAgregar(){


			$modelo = new Usuario(); // creacion del objecto usuario
			// validar el acceso
			$this->acceso(MODULOS['agregar_usuario']);

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

			$modelo = new Usuario(); // instanciar el objecto
			$this->acceso(MODULOS['agregar_usuario']);


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
		
	}



	


 

	

	 
 ?>