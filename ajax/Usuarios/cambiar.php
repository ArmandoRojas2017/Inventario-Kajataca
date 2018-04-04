<?php 
	// llamar a la Clase Modelo
	require_once '../../modelo/Usuario.php'; 


	$modelo = new Usuario(); // instanciar objecto del Modelo

	// asignar el array con los datos a cambiar
	$datos = array(

		'id' => $_POST['id'],
		'nick' => $_POST['nick'],
		'nombre' => $_POST['nombre'],
		'pregunta' => $_POST['pregunta'],
		'respuesta' => $_POST['respuesta'],
		'clave' => $_POST['clave'],
		'tipo' => $_POST['tipo']

		);


	$modelo->modify( $datos  ); 

 ?>

 <script>
 	window.location.href = '?url=usuario'
 </script>


