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

		$("#rol").html(resp)
	},null)

	// realizar busqueda por filtrado 
	
	$("#rol").change(function(event) {
		
		ajax("ajax/Usuarios/consultar.php",function(rsp){

			alert(rsp)
		},null)
	});


	
	Menu()
});


