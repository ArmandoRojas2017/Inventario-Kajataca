const verProducto = (val) =>{

		url = 'ajax/Usuarios/ver.php'
		consultaIndividual(val,url)
		
	}


$(document).ready(function() {


	
	//invocamos mejoras a las tablas
	tablas();


	// asignamos ruta
	$("#botonRegistrar").ruta("agregarUsuario")


	// asignar roles al select 
	ajax("ajax/Roles/select.php",function(resp){

		$("#rol").append(resp)
	},null)

	// realizar busqueda por filtrado 
	
	$("#rol").change(()=>filtrado());
	$("#status").change(()=>filtrado());

	// filtrado de busqueda con los select de la tabla

	let filtrado = () =>{

		ajax("ajax/Usuarios/consultar.php",function(rsp){

			$("#search-example").html(rsp)
		}, { rol: $("#rol").val() , status: $("#status").val() } )

	}



	/*Imprimir reporte*/

	$("#botonImprimir").click(()=> {
		
		let buscador = "&search="+$("#dynatable-query-search-search-example").val().toString();
		let variables = "status="+$("#status").val().toString()+"&rol="+$("#rol").val().toString()
		window.open("ajax/Usuarios/reporte.php"+"?"+variables)
	});


	
	Menu()
});


