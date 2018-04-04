<?php 

	require_once '../../modelo/Usuario.php'; 


	$modelo = new Usuario(); // creacion del objecto usuario
	$modelo->preparar_consulta_status();

	$datos = $modelo->consult(array('id' => $_POST['id']) );
	$estado = "";

	if($datos[0]['status'] == 1 )

		$estado = '0';
		 
	else 
		 $estado = '1';

	
	$modelo->modify(array( 'status' => $estado , 'id' => $_POST['id']  ));


 ?>

 <script>
 	window.location.href = '?url=usuario'
 </script>


