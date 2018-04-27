let Menu = function(){

 
	$("#home").animarBoton();

	/*------------ Rutas  --------*/
	$("#usuario").ruta("usuario")
	$("#ver").ruta("verPerfil")
	$("#roles").ruta("roles")
	$("#reporte4").ruta("logs")
	$("#proveedor").ruta("distribuidora")

	

	$("#cerrar").click(function() {

		localStorage.clear()	
		window.location.href = '?url=salir';
	});

	//-------------------------------------
	

	//
	/*----- No permite click derecho */
		clickDerecho();
	//------------------------------
	

	/*------------ Obtener Nombre de Usuario --------*/
		let obtenerUsuario = () => {
			$.ajax({
			url: localStorage.ajax +'nombreDeUsuario',
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
		url: '?url=verificarEstado',
		type: 'POST',
		data: {nombre :val }
	})
	.done(function(resp) {
		
		
		if(resp != 1){ 

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


	$("#config1").click( () =>

		ajax(
			"vista/modal/cerveza.php", 
			
			(request)=>{

				$("#modal_cervezeria").html(request)
				$(".cerrar").borrar("#modal_cervezeria")
				
			} , null  ) 
		);
	
	
	
	$("#config2").click( () =>

		ajax(
			"vista/modal/kajataca.php", 
			
			(request)=>{

				$("#modal_kajataca").html(request)
				$(".cerrar").borrar("#modal_kajataca")

			} , null  ) 
		);




	videoDeAyuda(0)
	
	//-------------------------------------
	
	footer()
	insertar_Hora_NombreDeUsuario("#Hora" , "#Nombre_Usuario")
	


} 