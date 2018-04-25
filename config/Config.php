<?php 
/*
	
$_SESSION['nombre'] = $registro[0]['nombre'];
$_SESSION['id'] = $registro[0]['id_usuarios'];
$_SESSION['nick'] = $registro[0]['nick'];
$_SESSION['tipo'] = $registro[0]['descripcion'];
$_SESSION['id_roles'] = $registro[0]['id_roles'];
$_SESSION['autenticado'] = ENCONTRADO;
*/

	const RUTAS =  array(
		'direccion' => 'localhost/inventario/',
		'controller' => 'controlador/',
		'model' => 'modelo/',
		'vista' => 'vista/',
		'js' => 'js/',
		'css' => 'css/',
		'storage' => 'strorage/',
		'vendor' => 'vendor/',
		'ajax' => '?url='


	);

	const MODULOS = array(

		'consultar_usuario' => 1 , 
		'agregar_usuario' => 3,

	);

	const EVENTOS = array(

		'ingresar_sistema' => 1, 
		'salir_sistema' => 2, 
		'intento_ingresar' => 3, 
	);



	 const USER = "root";
	 const PASS = "12345678";
	 const HOST = "localhost";
	 const DATABASE = "Cerenis";

	 const ENCONTRADO = 1;
	 const NO_ENCONTRADO = -1; 

	 const ERROR = -1;
	 const OK = 1; 


	const NO_VERIFICADO = "<script>window.location.href = '?url=salir'</script>'"; 
	const VERIFICADO = 1; 



 ?>