$(document).ready(function() {
	
	$("botonGuardar").disabled(true)

	$(".campo2").visibilidad(false)
	$(".campo3").visibilidad(false)	

	$(".paso2").visibilidad(false)
	$(".paso3").visibilidad(false)




	$(".modal-backdrop").addClass('modal-backdrop-kajataca')

	$(".cerrar").ruta("login")

	recuperar_validaciones()

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

						

					});


					
				

				}
				else mensajeNo({
					 'titulo' : 'Error en la cedula',
					'contenido' :'la cedula ingresada no existe, verifique'
				})
				


		},
		{id : $("#cedula").val() , opc: 1} )

	})


		$(".paso2").click(() => {
						alert("mujer")
					});






})