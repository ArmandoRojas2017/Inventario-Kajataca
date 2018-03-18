let Menu = function(){

 
	$("#home").animarBoton();

	/*------------ Rutas  --------*/
	$("#usuario").ruta("usuario")
	
	$("#ver").ruta("verPerfil")

	

	$("#cerrar").click(function() {

		localStorage.clear()	
		$("#cerrar").ruta("cerrar")
	});

	//-------------------------------------
	//
	/*----- No permite click derecho */
		clickDerecho();
	//------------------------------
	

	/*------------ Obtener Nombre de Usuario --------*/
		let obtenerUsuario = () => {
			$.ajax({
			url: 'ajax/Auth/ObtenerNombreDeUsuario.php',
			type: 'POST'
			})
			.done(function(resp) {
				
				if(resp == -1) {
					localStorage.clear()	

				}
				else 
					localStorage.nombre = resp
			
				verificar(localStorage.nombre)

				

			})
			.fail(function(request) {
				modalImagen("Error en el Server")
			})

		}

		obtenerUsuario()

		
	

	//-------------------------------------
	


	/*------------ Validar Login de Usuario --------*/

	let verificar = function(val){

		
	$.ajax({
		url: 'ajax/Auth/Verificar.php',
		type: 'POST',
		data: {nombre :val }
	})
	.done(function(resp) {
		
		
		if(resp == 1){ 
			// muestra mensaje
			mensajeNotify({  mensaje: "Usuario Verificado...."})
		}
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

		ajax("vista/modal/kajataca.php", function(request){
			$("#modal_kajataca").html(request)

			$(".close").borrar("#modal_kajataca")
			$(".cerrar").borrar("#modal_kajataca")


	} , null  )
		
	});




	videoDeAyuda(0)
	
	//-------------------------------------
	

	ajax("ajax/contenido/historia.html", function(e){
		alert(e)
	} , null  )


} 