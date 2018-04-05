<?php 
	
	/*Script para validar usuarios */

	require_once '../../modelo/Usuario.php'; //llamar al modelo
	
	$modelo = new Usuario(); // instanciar el objecto
	$modelo->preparar_consulta();
	$datos = $modelo->consult(array( 'id' => $_POST['id']));


	switch ($_POST['opc']) {
		case '1':
			
			if(count($datos) > 0)
				echo "1";
			else 
				echo "-1";

			break;

		case '2':
			
			if(count($datos) > 0)
				echo "1";
			else 
				echo "-1";

			break;
		
	
	}




	
 ?>
