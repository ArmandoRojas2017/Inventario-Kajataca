/*
	Hora actualizable
 */


$(document).ready(function() {
	
	setInterval(function(){

		$("#hora").html(miTiempo.hora_local())

	}, 1000);	
	

/*Imagen al cargar */

//modalImagen("Bienvenido al Sistema Kajataca de la Cervezeria la Preferida");

/* Bloquear Boton de Ingresar */

	$("#ingresar").disabled(true)
//--------------------------------





/*----- Validar Campos de Usuario y Clave  -------------*/

  $("input").noCopiar() // no copiar y pegar 

  $("input[name=usuario]").mayuscula() // texto en mayuscula 
  
  $("input[name=usuario]").validCampo(soloLetras_Numeros()) // solo acepta letras y numeros 
  
  $("input[name=clave]").validCampo(soloClaves()) // solo acepta letras y numeros 

  $("input[name=usuario]").longitud($("#ingresar") , {max:45,min:4})

  $("input[name=clave]").longitud($("#ingresar") , {max:45,min:4})



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
	url: 'ajax/Autenticar.php',
	type: 'POST',
	data: objecto,
	
	})
	.done(function($request) {

		if($request == 1){
			
			mensajeNotify({mensaje:'Encontrado' })

			window.location.href = '?url=home'

		}
		else if($request == -1){
			mensajeNotify({mensaje:'Usuario o Clave Invalida', tipo:'danger'})

		}
		else{
			mensajeNotify({mensaje:'Error en el Server...', tipo:'warning'})
			modalImagen("LLamar al 0414-5235969 para solucionar el Error.."+$request);
		}

	
	})
	.fail(function() {
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
				titulo:"¡¡¡Haz Click Aqui!!!" ,
				contenido: "Si haces click aqui verificara tu usuario y clave, si son correctos ingresaras al sistema" 
			}
		)

$("#cambiar")
.tooltip(
			{
				titulo:"¡¡¡Haz Click Aqui!!!" ,
				contenido: "¿Haz olvidado tu clave? no te preocupes, haz click aqui para ingresar al sistema de recuperacion de claves" 
			}
		)


// -------------------------------------------------------------

	

});










