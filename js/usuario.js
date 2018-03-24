const verProducto = (val) =>{

		url = 'ajax/Usuarios/ver.php'
		consultaIndividual(val,url)
		
	}


$(document).ready(function() {


	
	//invocamos mejoras a las tablas
	tablas();


	// asignamos ruta
	$("#botonRegistrar").ruta("agregarUsuario")


	ajax("ajax/Roles/select.php",function(resp){

		$("#rol").html(resp)
	},null)
	
	Menu()
});


