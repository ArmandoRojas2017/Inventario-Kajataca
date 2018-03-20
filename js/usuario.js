
	const verProducto = (val) =>{

		$.ajax({
			url: 'ajax/Usuarios/ver.php',
			type: 'POST',
			data: { id: val }
		})
		.done(function(request) {


			$("#modal_consulta").html(request)
			
			$(".cerrar").borrar("#modal_consulta")

			
		})
		.fail(function() {
			modalImagen(errorAlCargarPorAjax())
		})
		
		
	
	}


$(document).ready(function() {


	

	$("#dynatable-query-search-").addClass("form-control")

	var dynatable = $('#search-example').dynatable().data('dynatable');

/*
$('#search-year').change( function() {
  var value = $(this).val();
  if (value === "") {
    dynatable.queries.remove("year");
  } else {
    dynatable.queries.add("year",value);
  }
  dynatable.process();
});*/



	
	Menu()
});


