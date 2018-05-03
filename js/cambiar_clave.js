$(document).ready(function() {
	
	$("botonGuardar").disabled(true)

	$(".campo2").visibilidad(false)
	$(".campo3").visibilidad(false)	


	recuperar_validaciones() 

	$(".modal-backdrop").addClass('modal-backdrop-kajataca')

	$(".cerrar").ruta("login")
})