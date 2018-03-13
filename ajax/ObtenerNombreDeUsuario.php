<?php 
	session_start(); 

	if ($_SESSION['auntenticado'] == 1)
		$resultado = $_SESSION['nombre'];
	else 
		$resultado = "<script> window.location.href='?url=index'</script>"; 
	
 ?>

 <?= $resultado ?>