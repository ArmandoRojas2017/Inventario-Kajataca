/*
	Hora actualizable
 */


$(document).ready(function() {
	
// borrar el modal
$(".cerrar").borrar("#area")
	
$(".campo2").visibilidad(false)
$(".campo3").visibilidad(false)


$(".paso1").click( () => {

	ajax(   
			"ajax/Auth/cambiar_clave.php",
			(rsp) => {

				if (rsp == 1){

					$(".paso1").addClass('paso2').removeClass('paso1')

					$(".campo1").fadeOut('slow', function() {

				
							$(".campo2").visibilidad(true)

							obtenerPregunta()
					
					});

				}else

					modalImagen("¡¡¡NO EXISTE!!!")
				
			},

			{
				id : $("#cedula").val(),
				opc : 1
			}
		)
})





	var obtenerPregunta = () =>{

		ajax(
			"ajax/Auth/cambiar_clave.php", 
			(rsp) => {

				alert(rsp)
			},
				{
					id : $("#cedula").val(),
					opc : 2
				}
			)
	}


})










