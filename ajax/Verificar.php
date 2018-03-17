<?php 
	/*Verificar Usuario*/
	session_start(); 

	const NO_VERIFICADO = "<script>window.location.href = '?url=cerrar'</script>'"; 
	const VERIFICADO = 1; 


	if ( 
		 $_SESSION['autenticado'] == 1  )

		echo VERIFICADO;

	else 
		echo NO_VERIFICADO; 
	
 ?>




