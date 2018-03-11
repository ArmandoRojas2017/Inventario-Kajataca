/*
	Hora actualizable
 */
setInterval(function(){

	$("#hora").html(miTiempo.hora_local())

}, 1000);

/*
	Imagen al cargar 

 */

modalImagen("Bienvenido al Sistema Kajataca de la Cervezeria la Preferida");


/*
	Validar Usuario y Clave 
 */



$.ajax({
	url: 'ajax/Autenticar',
	type: 'POST',
	data: { usuario: $("input[name=clave]").val()   },
})
.done(function() {
	alert(); 
	console.log("success");
})
.fail(function() {
	console.log("error");
})
.always(function() {
	console.log("complete");
});





