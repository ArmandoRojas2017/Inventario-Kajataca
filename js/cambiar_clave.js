$(document).ready(function() {
	
	$("botonGuardar").disabled(true)

	$(".campo2").visibilidad(false)
	$(".campo3").visibilidad(false)	




	$(".modal-backdrop").addClass('modal-backdrop-kajataca')

	$(".cerrar").ruta("login")

	recuperar_validaciones()

	$(".paso1").click(() =>{

		
		ajax( localStorage.ajax + 'datos', 
			(rsp)=>{
				// verificar cedula

				if(rsp.trim() == 1){

					$(".paso1").addClass('paso2')
					$(".paso1").removeClass('paso1')
					$("#cedula").disabled(true)

					// cargar pregunta 

					ajax( localStorage.ajax + 'datos' , (rsp) => {

						$("#pregunta").html('¿'+rsp.trim()+'?')

					} ,  {id : $("#cedula").val() , opc: 2}  )


					$(".campo2").fadeIn('slow', () => {

							$(".paso2").click(() => {alert("mujer")});

					});


					


				}
				else mensajeNo({
					 'titulo' : 'Error en la cedula',
					'contenido' :'la cedula ingresada no existe, verifique'
				})
				


		},
		{id : $("#cedula").val() , opc: 1} )

	})






})