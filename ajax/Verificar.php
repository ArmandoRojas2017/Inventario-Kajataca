<?php 
	session_start(); 

	const NO_VERIFICADO = "<script>window.location.href = '?url=cerrar</script>'"; 
	const VERIFICADO = 1; 

	if ( ($_SESSION['auntenticado'] == 1) and 
		 ($_SESSION['control'] == md5($_POST['nombre']))  )

	$resultado = VERIFICADO;

	else 
		$resultado = NO_VERIFICADO; 
	
 ?>

 <?= $resultado ?>