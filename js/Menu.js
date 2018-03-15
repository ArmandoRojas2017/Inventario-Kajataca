let Menu = function(){


	$("#home").animarBoton();

	/*------------ Rutas  --------*/
	$("#usuario").ruta("usuario")
	$("#cerrar").ruta("cerrar")
	$("#ver").ruta("verPerfil")

	//-------------------------------------
	

	/*------------ Obtener Nombre de Usuario --------*/

		$.ajax({
			url: 'ajax/ObtenerNombreDeUsuario.php',
			type: 'POST'
		})
		.done(function(resp) {
			
			if(resp == -1) 
				localStorage.clear()	
			else 
				localStorage.nombre = resp

			verificar()

		})
		.fail(function(request) {
			modalImagen("Error en el Server")
		})
	

	//-------------------------------------
	


	/*------------ Validar Login de Usuario --------*/

	let verificar = function(){

	$.ajax({
		url: 'ajax/Verificar.php',
		type: 'POST',
		data: {nombre :localStorage.nombre }
	})
	.done(function(resp) {
		
		if(resp == 1) 
			// muestra mensaje
			mensajeNotify({  mensaje: "Usuario Verificado...."})
		
		else{ 
			$("#verificar").html(resp) // agrega la respuesta negativa
			localStorage.clear() // limpiar


		}

	
	})
	.fail((request) =>
		// muestra mensaje en 
		modalImagen("Error en el Server")
	)

	}
	

	//-------------------------------------


}