var validaciones_generales = function validaciones_generales(){



 	 $("input").noCopiar() // no copiar y pegar 
 	 clickDerecho() // no permite clcik derecho 
}



var login_validaciones = function login_validaciones(){

	



/*----- Validar Campos de Usuario y Clave  -------------*/
  
  // texto en mayuscula, longitud maxima 12 y validacion solo acepta letras
  $("input[name=usuario]").mayuscula().longitudMax(12)
  $("input[name=usuario]").validCampo(soloLetras_Numeros()) 
  // texto en mayuscula, longitud maxima 12 y no acpeta caracteres especiales
  $("input[name=clave]").mayuscula().longitudMax(12)
  $("input[name=clave]").validCampo(soloLetras_Numeros()) 
  

 //----------------------------------------------------------------------------------------


	localStorage.control = 0

 	/* Validacion del sistema*/
 setInterval( function(){

 	

	$("input[name=usuario]").campoVacio("#error1")
	$("input[name=clave]").campoVacio("#error2")
	$("input[name=usuario]").longitud("#error1",8)
	$("input[name=clave]").longitud("#error2",8)




 if ( localStorage.control == 1  ){

 	 	$("#ingresar").disabled(false);
 	 	$("#error1").html("");
 	 	$("#error2").html("");
 
 }else


 	/* Bloquear Boton de Ingresar */

	$("#ingresar").disabled(true)
	//--------------------------------
 



}   , 0500)




	 validaciones_generales()

}


var usuarios_validaciones = function usuarios_validaciones( ){

	 localStorage.interruptor = 0

	validaciones_generales()
	// mensajes 
	let mensajes = {

	alerta1 : "La Cédula debe ser mayor a 5 numeros",
	alerta2 : "El nombre debe llevar al menos 3 caracteres ",
	alerta3 : "El nick debe tener al menos 8 caracteres ",
	alerta4 : "La contraseña debe poseer al menos 8 caracteres",
	alerta5 : "La contraseña no coinciden",
	alerta6 : "La pregunta secreta debe llevar al menos 10 caracteres",
	alerta7 : "Respuesta secreta debe poseer al menos 3 caracteres",
	alerta8 : "No coinciden las respuestas secretas",

	}

	// campos 
	let nombre = $("#inputNombre")
	let cedula = $("#inputCedula")
	let nick = $("#inputNick")
	let clave = $("#inputClave")
	let clave2 = $("#inputClave2")
	let pregunta = $("#inputPregunta")
	let respuesta1 = $("#inputRespuesta1")
	let respuesta2 = $("#inputRespuesta2")


	// asignar roles al select 
	ajax("?url=selectRol",function(resp){

		$("#rol").html(resp)
	},null)


	/*No Copiar y pegar */
		$("input").noCopiar()

		/*solo letras mayusculas*/
		$("input").mayuscula()
 

	/*Longitud Permitida*/
	nombre.longitudMax(40)
	nick.longitudMax(12)
	cedula.longitudMax(8)
	clave.longitudMax(12)
	clave2.longitudMax(12)

	pregunta.longitudMax(20)
	respuesta1.longitudMax(20)
	respuesta2.longitudMax(20)

	/*valida teclado*/
	nombre.validCampo(soloLetras())
	cedula.validCampo(soloNumeros())
	nick.validCampo(soloLetras_Numeros())
	clave.validCampo(soloLetras_Numeros())
	respuesta1.validCampo(soloLetras_Numeros())
	respuesta2.validCampo(soloLetras_Numeros())
	clave2.validCampo(soloLetras_Numeros())
	pregunta.validCampo(soloLetras())


	// cambiar los iconos a modo botones	
	$(".glyphicon-eye-open").css('cursor', 'pointer');



/*Verifica los campos*/
setInterval( () =>{


		/*Valida Minima cantidad de carecteres */
		
		//valida la cedula 
		cedula.longitud("#error1",7)
		nombre.longitud("#error2",3)
		nick.longitud("#error3",8)
		clave.longitud("#error5",8)
		clave2.sombra("red").comparar(clave,"#error6")ç
		pregunta.longitud("#error7",3)
		
	



		//respuesta secreta
		if(respuesta1.val().length < 10 ){
			$("#error8").html(mensajes.alerta7)
			respuesta1.sombra("red")
		}
		else {
			$("#error8").html("")
			respuesta1.sombra(false)
		}

		//respuesta secreta 2
		if(respuesta2.val() != respuesta1.val() ){
			$("#error9").html(mensajes.alerta8)
			respuesta2.sombra("red")
		}
		else {
			$("#error9").html("")
			respuesta2.sombra(false)
		}





		//---------------------------------------

		

		/* Activar el boton de guardar */
		if(
			(cedula.val().length > 5 ) &&
			(nombre.val().length > 2 ) &&
			(nick.val().length > 8 ) &&
			(clave.val().length > 8 ) &&
			(clave.val() == clave2.val() ) 

			){


			$("#botonGuardar").disabled(false)

			if(interruptor == 0){
				mensajeNotify( {mensaje: "Presione el boton Ingresar..."} )
				 localStorage.interruptor = 1
			}

			

		}
		else {

			$("#botonGuardar").disabled(true);
			 localStorage.interruptor = 0
		}

		//---------------------------------------




} , 500  )


}