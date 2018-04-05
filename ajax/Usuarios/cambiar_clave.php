<?php 
	
	/*Script para validar usuarios */
	require_once '../../include/Helpers.php';



	$datos =  array(
				
				'titulo' =>  "Cambiar de Contraseña"

			);

	$formulario = 'formularios/cambiarClave';
	$botonera = 'botoneraCambio';



	view("modal/usuario",compact('datos','formulario','botonera'))
	
	
 ?>

 <script src="js/Usuarios/cambiar_clave.js" > </script>

