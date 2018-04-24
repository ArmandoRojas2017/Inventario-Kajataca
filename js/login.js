/*
	Hora actualizable
 */


$(document).ready(function() {
	
	setInterval(function(){

		$("#hora").html(miTiempo.hora_local())

	}, 1000);	
	

/*Imagen al cargar */


/* Bloquear Boton de Ingresar */

	$("#ingresar").disabled(true)
//--------------------------------





/*----- Validar Campos de Usuario y Clave  -------------*/


  $("input[name=usuario]").mayuscula().longitudMax(12) // texto en mayuscula 
  $("input[name=clave]").mayuscula().longitudMax(12) // texto en mayuscula 
  
  $("input[name=usuario]").validCampo(soloLetras_Numeros()) // solo acepta letras y numeros 
  
  $("input[name=clave]").validCampo(soloClaves()) // solo acepta letras y numeros 

  $("input[name=usuario]").longitud($("#ingresar") , {max:12,min:4})

  $("input[name=clave]").longitud($("#ingresar") , {max:12,min:4})



//----------------------------------------------------------------------------------------


/*------ Ingreso al Sistema */

// al hacer click
$("#ingresar").click(function() {

	if ( ( $("input[name=usuario]").val() != "" ) &&  ($("input[name=clave]").val() != "" ) ){

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
	
}else
	modalImagen("Campos vacios... Termina de escribir en todos los campos")

});
//--------------------------------------------------------------------------------


/* ------------- Mensajes tooltip de ayuda -------------------- */

$("input[name=usuario]").tooltip({titulo:"¡¡¡Escribe Aqui!!!", contenido:"Ingresa tu nombre de Usuario"})

$("input[name=clave]").tooltip({titulo:"¡¡¡Escribe Aqui!!!", contenido:"Ingresa tu clave super secreta"})

$("#ingresar")
.tooltip(
			{
				titulo:mensajesIndex.tituloBoton ,
				contenido: "Si haces click aqui verificara tu usuario y clave, si son correctos ingresaras al sistema" 
			}
		)

$("#cambiar")
.tooltip(
			{
				titulo:mensajesIndex.tituloBoton ,
				contenido: "¿Haz olvidado tu clave? no te preocupes, haz click aqui para ingresar al sistema de recuperacion de claves" 
			}
		)


// -------------------------------------------------------------

/*---------Verificar si esta ya ingreso al sistema-------------------*/
	
	$.ajax({
		url: '?url=verificarEstado',
		type: 'POST'
	})
	.done(function(resp) {
		
		if(resp == 1) 
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


setInterval( function(){

 if (  ($("input[name=usuario]").val().length > 4) && ($("input[name=clave]").val().length > 4) )
 	$("#ingresar").disabled(false);


}   , 100);
	


});










