let Menu = function(){


	$("#home").animarBoton();

	/*------------ Rutas  --------*/
	$("#usuario").ruta("usuario")
	$("#cerrar").ruta("cerrar")
	$("#ver").ruta("verPerfil")

	//-------------------------------------
	//
	/*----- No permite click derecho */
		clickDerecho();
	//------------------------------
	

	/*------------ Obtener Nombre de Usuario --------*/

		$.ajax({
			url: 'ajax/Auth/ObtenerNombreDeUsuario.php',
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
		url: 'ajax/Auth/Verificar.php',
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
	
	/*----------CArgar Modal--------------*/

	$("#config1").click(function(event) {

		$.ajax({url: 'vista/modal/cerveza.php'})
		.done(function(request) {
			$("#modal_cervezeria").html(request)

			$(".close").borrar("#modal_cervezeria")
			$(".cerrar").borrar("#modal_cervezeria")

		})
		.fail(function() {
			modalImagen("Error en el Server al Cargar Pagina")
		})
		
	});
	
	
	
	$("#config2").click(function(event) {

		$.ajax({url: 'vista/modal/kajataca.php'})
		.done(function(request) {
			$("#modal_kajataca").html(request)

			$(".close").borrar("#modal_kajataca")
			$(".cerrar").borrar("#modal_kajataca")

		})
		.fail(function() {
			modalImagen("Error en el Server al Cargar Pagina")
		})
		
	});


	videoDeAyuda(0)
	
	//-------------------------------------


} 