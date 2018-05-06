/*
	Hora actualizable
 */


$(document).ready(function() {
	
	setInterval(function(){

		$("#hora").html(miTiempo.hora_local())

	}, 1000);	
	

/*Imagen al cargar */



/*------ Ingreso al Sistema */

// al hacer click
$("#ingresar").click(function() {


	let objecto = {

		usuario : $("input[name=usuario]").val(),
		clave : $("input[name=clave]").val()

	}
	

	$.ajax({
	url: localStorage.ajax+'verifica',
	type: 'POST',
	data: objecto,
	
	})
	.done(function($request) {

		if($request.trim() == 1){
			
			mensajeNotify({mensaje:'Encontrado' })

			window.location.href = '?url=home'

		}
		else if($request.trim() == -1){

			mensajeNotify({mensaje:'Usuario o Clave Invalida', tipo:'danger'})

		}
		else{
			mensajeNotify({mensaje:'Error en el Server...', tipo:'warning'})
			modalImagen("LLamar al 0414-5235969 para solucionar el Error.."+$request.trim());

		}

		
	
	})
	.fail(function(e) {
		mensajeNotify({mensaje:'Error en la conexion', tipo:'danger'})

	})


});
//--------------------------------------------------------------------------------




/*---------Verificar si esta ya ingreso al sistema-------------------*/
	
	$.ajax({
		url: '?url=verificarEstado',
		type: 'POST'
	})
	.done(function(resp) {
		
		if(resp.trim() == 1) 
			// muestra mensaje
			window.location.href= '?url=home'
		
		else
			modalImagen("Bienvenido al Sistema Kajataca de la Cervezeria la Preferida")

	})
	.fail((request) =>
		// muestra mensaje en 
		modalImagen("Error en el Server")
	)

	
//------------------



footer()
login_validaciones()
tooltip_login()


// cambiar clave 

$("#cambiar").ruta("cambiar")


$("input[name=usuario]").attr('type', 'password');

localStorage.botonUsuario = 0
localStorage.botonClave = 0


$("#botonUsuario").click(()=>{
	
	if(localStorage.botonUsuario == 0){

		$("input[name=usuario]").attr('type', 'text')
		localStorage.botonUsuario = 1
	}else {
		$("input[name=usuario]").attr('type', 'password')
		localStorage.botonUsuario = 0
	}
})


$("#botonClave").click(()=>{
	
	if(localStorage.botonClave == 0){

		$("input[name=clave]").attr('type', 'text')
		localStorage.botonClave = 1
	}else {
		$("input[name=clave]").attr('type', 'password')
		localStorage.botonClave = 0
	}
})
	


});










