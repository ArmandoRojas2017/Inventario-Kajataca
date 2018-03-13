<?php 
	session_start(); 

	const NO_VERIFICADO = -1; 
	const VERIFICADO = -1; 

	if ($_SESSION['auntenticado'] == 1)
		$resultado = $_SESSION['nombre'];
	else 
		$resultado = "<script> window.location.href='?url=index'</script>"; 
	
 ?>

 <?= $resultado ?>