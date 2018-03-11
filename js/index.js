/*
	Hora actualizable
 */


$(document).ready(function() {
	
	setInterval(function(){

		$("#hora").html(miTiempo.hora_local())

	}, 1000);	
	

/*Imagen al cargar */

//modalImagen("Bienvenido al Sistema Kajataca de la Cervezeria la Preferida");


/*----- Validar Campos de Usuario y Clave  -------------*/

  $("input").noCopiar() // no copiar y pegar 

  $("input[name=usuario]").mayuscula() // texto en mayuscula 
  
  $("input[name=usuario]").validCampo(soloLetras_Numeros()) // solo acepta letras y numeros 

//----------------------------------------------------------------------------------------

/* ------------- Mensajes tooltip de ayuda -------------------- */

$("input[name=usuario]").tooltip({titulo:"¡¡¡Escribe Aqui!!!", contenido:"Ingresa tu nombre de Usuario"})

$("input[name=clave]").tooltip({titulo:"¡¡¡Escribe Aqui!!!", contenido:"Ingresa tu clave super secreta"})

// -------------------------------------------------------------


// al hacer click
$("#ingresar").click(function() {

	let objecto = {

		usuario : $("input[name=usuario]").val(),
		clave : $("input[name=clave]").val()

	}
	

	$.ajax({
	url: 'ajax/Autenticar.php',
	type: 'POST',
	data: objecto,
	
	})
	.done(function($request) {
		alert($request); 
		console.log("success");
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});



});

	

});










