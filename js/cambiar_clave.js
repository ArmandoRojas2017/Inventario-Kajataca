$(document).ready(function() {
	
	$("botonGuardar").disabled(true)

	$(".campo2").visibilidad(false)
	$(".campo3").visibilidad(false)	

	$(".paso2").visibilidad(false)
	$(".paso3").visibilidad(false)

	localStorage.paso = 1


	$(".modal-backdrop").addClass('modal-backdrop-kajataca')

	$(".cerrar").ruta("login")

	recuperar_validaciones(localStorage.paso)

	$(".paso1").click(() =>{

		
		ajax( localStorage.ajax + 'datos', 
			(rsp)=>{
				// verificar cedula

				if(rsp.trim() != -1){

					$(".paso1").visibilidad(false)
					$(".paso2").visibilidad(true)
					$("#cedula").disabled(true)

					// cargar pregunta 

				

					$("#pregunta").html('¿'+JSON.parse(rsp.trim())[0].pregunta+'?')

					


					$(".campo2").fadeIn('slow', () => {

						localStorage.paso = 2
						recuperar_validaciones(localStorage.paso)
					});
			
				

				}
				else mensajeNo({
					 'titulo' : 'Error en la cedula',
					'contenido' :'la cedula ingresada no existe, verifique'
				})
				


		},
		{id : $("#cedula").val() , opc: 1} )

	})


		


		botonRespuesta = 0


		$("#botonRespuesta").click(()=>{
			
			if(localStorage.botonRespuesta == 0){

				$("#respuesta").attr('type', 'text')
				localStorage.botonRespuesta = 1
			}else {
				$("#respuesta").attr('type', 'password')
				localStorage.botonRespuesta = 0
			}
		})


		$(".paso2").click(() => {


			ajax( localStorage.ajax + 'datos', 
			(rsp)=>{
				// verificar cedula

				if(rsp.trim() != -1){

					$(".paso2").visibilidad(false)
					$(".paso3").visibilidad(true)
					$("#pregunta").fadeOut('slow')
					$("#respuesta").fadeOut('slow')
					$(".input-group").fadeOut('slow')

					$("#respuesta").disabled(true)

					// cargar pregunta 

				

					$("#nick").val(JSON.parse(rsp.trim())[0].nick)
					$("#nick").disabled(true)

					


					$(".campo3").fadeIn('slow', () => {

						localStorage.paso = 3
						recuperar_validaciones(localStorage.paso)
					});
			
				

				}
				else mensajeNo({
					 'titulo' : '¡NO!',
					'contenido' :'Disculpe la Respuesta es Incorrecta'
				})
				


		},
		{id : $("#cedula").val() , respuesta: $("#respuesta").val() , opc: 2} )
					

		
		});



		$(".paso3").click(() => {


			ajax( localStorage.ajax + 'datos', 
			(rsp)=>{
				// verificar cedula

				if(rsp.trim() != -1){

					$(".paso2").visibilidad(false)
					$(".paso3").visibilidad(true)
					$("#pregunta").fadeOut('slow')
					$("#respuesta").fadeOut('slow')
					$(".input-group").fadeOut('slow')

					$("#respuesta").disabled(true)

					// cargar pregunta 

				

					$("#nick").val(JSON.parse(rsp.trim())[0].nick)
					$("#nick").disabled(true)

					
				

				}
				else mensajeNo({
					 'titulo' : '¡ERROR!',
					'contenido' :'No se puede cambiar la clave...'
				})
				


		},
		{id : $("#cedula").val() , respuesta: $("#respuesta").val() , clave: $("#inputClave")  , opc: 2} )
					

		
		});

	





})