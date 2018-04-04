var usuarios_validaciones = function usuarios_validaciones( ){

	let interruptor = 0

	
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
	ajax("ajax/Roles/select.php",function(resp){

		$("#rol").html(resp)
	},null)


	/*No Copiar y pegar */
		$("input").noCopiar()

		/*solo letras mayusculas*/
		$("input").mayuscula()


	/*Longitud Permitida*/
	nombre.longitudMax(40)
	nick.longitudMax(12)
	cedula.longitudMax(10)
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
		if(cedula.val().length < 5){
			$("#error1").html(mensajes.alerta1)
			cedula.sombra("red")
		}
		else {
			$("#error1").html("")
			cedula.sombra(false)
		}


		//valida nombre  
		if(nombre.val().length < 5){
			$("#error2").html(mensajes.alerta2)
			nombre.sombra("red")
		}
		else {
			$("#error2").html("")
			nombre.sombra(false)
		}


		//valida nick 
		if(nick.val().length < 5){
			$("#error3").html(mensajes.alerta3)
			nick.sombra("red")
		}
		else {
			$("#error3").html("")
			nick.sombra(false)
		}


		//valida clave
		if(clave.val().length < 7){
			$("#error5").html(mensajes.alerta4)
			clave.sombra("red")
		}
		else {
			$("#error5").html("")
			clave.sombra(false)
		}


		//valida clave2
		if(clave.val() != clave2.val() ){
			$("#error6").html(mensajes.alerta5)
			clave2.sombra("red")
		}
		else {
			$("#error6").html("")
			clave2.sombra(false)
		}


		//pregunta secreta
		if(pregunta.val().length < 10 ){
			$("#error7").html(mensajes.alerta6)
			pregunta.sombra("red")
		}
		else {
			$("#error7").html("")
			pregunta.sombra(false)
		}

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
				mensajeNotify( {mensaje: "Listo..."} )
				interruptor = 1
			}

			alert()

		}
		else {

			$("#botonGuardar").disabled(true);
			interruptor = 0
		}

		//---------------------------------------




} , 500  )


}