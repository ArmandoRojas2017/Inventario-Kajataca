let Menu = function(){


	$("#home").animarBoton();

	/*------------ Rutas  --------*/
	$("#usuario").ruta("usuario");

	//-------------------------------------
	
	/*------------ Validar Login de Usuario --------*/

	$.ajax({
		url: 'ajax/Verificar.php',
		type: 'POST'
	})
	.done(function(resp) {
		console.log("success")
		
		if(resp == 1) {

			mensajeNotify("Usuario Verificado....")
		}
		else 
			$("#verificar").html(resp)

	})
	.fail(function(request) {
		modalImagen("Error en el Server")
	})
	

	//-------------------------------------

	/*------------ Obtener Nombre de Usuario --------*/

	if(!localStorage.nombre)
		$.ajax({
			url: 'ajax/ObtenerNombreDeUsuario.php',
			type: 'POST'
		})
		.done(function(resp) {
			console.log("success")
			
			if(resp == -1) 
				localStorage.clear()	
			else 
				localStorage.nombre = resp.toString()

		})
		.fail(function(request) {
			modalImagen("Error en el Server")
		})
	

	//-------------------------------------

}