var verProducto = (val) =>{

		url = localStorage.ajax + 'verUsuario'

		consultaIndividual(val,url)
		
	}


$(document).ready(function() {


	
	//invocamos mejoras a las tablas
	tablas();


	// asignamos ruta
	$("#botonRegistrar").ruta("agregarEmpresa")


	// asignar roles al select 
	ajax(localStorage.ajax+'selectRol',function(resp){

		$("#rol").append(resp)
	},null)

	// realizar busqueda por filtrado 
	
	$("#rol").change(()=>filtrado());
	$("#status").change(()=>filtrado());

	// filtrado de busqueda con los select de la tabla

	let filtrado = () =>{

		ajax(localStorage.ajax+'filtrarUsuario',function(rsp){

			$("#search-example").html(rsp)
		}, { rol: $("#rol").val() , status: $("#status").val() } )

	}



	/*Imprimir reporte*/

	$("#botonImprimir").click(()=> {
		
		let variables = "&status="+$("#status").val().toString()+"&rol="+$("#rol").val().toString()
		window.open( "?url=imprimirUsuario"+variables )
	});


	
	Menu()
});


