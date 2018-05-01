var verProducto = (val) =>{

		url = localStorage.ajax + 'verDistribuidora'

		consultaIndividual(val,url)
		
	}


$(document).ready(function() {

	//invocamos mejoras a las tablas
	tablas()

	// asignamos ruta
	$("#botonRegistrar").ruta("agregarDistribuidora")

	
	Menu()
});


