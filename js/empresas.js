var verProducto = (val) =>{

		url = localStorage.ajax + 'verEmpresa'

		consultaIndividual(val,url)
		
	}


$(document).ready(function() {


	
	//invocamos mejoras a las tablas
	tablas();


	// asignamos ruta
	$("#botonRegistrar").ruta("agregarEmpresa")

	
	Menu()
});


