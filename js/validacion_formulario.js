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
  $("input[name=clave]").longitudMax(12)
  $("input[name=clave]").validCampo(soloLetras_Numeros()) 
  

 //----------------------------------------------------------------------------------------


	

 	/* Validacion del sistema*/
 setInterval( function(){

 	localStorage.control = 1

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


	tooltip_usuario();

	/*Longitud Permitida*/
	nombre.mayuscula().longitudMax(40)
	nick.mayuscula().longitudMax(12)
	cedula.longitudMax(8)
	clave.longitudMax(12)
	clave2.longitudMax(12)

	pregunta.mayuscula().longitudMax(20)
	respuesta1.mayuscula().longitudMax(20)
	respuesta2.mayuscula().longitudMax(20)

	/*valida teclado*/
	nombre.validCampo(soloLetras())
	cedula.validCampo(soloNumeros())
	nick.validCampo(soloLetras_Numeros())
	clave.validCampo(soloLetras_Numeros())
	respuesta1.validCampo(soloLetras())
	respuesta2.validCampo(soloLetras())
	clave2.validCampo(soloLetras_Numeros())
	pregunta.validCampo(soloLetras())


	// cambiar los iconos a modo botones	
	$(".glyphicon-eye-open").css('cursor', 'pointer');

	



/*Verifica los campos*/
setInterval( () =>{

		localStorage.control = 1
		/*Valida Minima cantidad de carecteres */
		
		//valida la cedula 
		cedula.longitud("#error1",7)
		nombre.longitud("#error2",3)
		nick.longitud("#error3",8)
		clave.longitud("#error5",8)

		

		clave2.comparar(clave,"#error6")
		pregunta.longitud("#error7",6)
		respuesta1.longitud("#error8",3)
		respuesta2.comparar(respuesta1,"#error9")
		
	






		//---------------------------------------

		

		/* Activar el boton de guardar */
		if(localStorage.control == 1 ){


			$("#botonGuardar").disabled(false)

			 

			if(localStorage.interruptor == 0){
				mensajeNotify( {mensaje: "Presione el boton Guarda (boton de color Azul)..."} )
				 localStorage.interruptor = 1
				 nombre.quitarEspacio()
				 pregunta.quitarEspacio()

			}

				

		}
		else {

			$("#botonGuardar").disabled(true);
			 localStorage.interruptor = 0
		}

		//---------------------------------------




} , 500  )


}



var proveedor_validaciones = function proveedor_validaciones( ){

	 localStorage.interruptor = 0

	validaciones_generales()
	// mensajes 


	// campos 
	let nombre = $("#nombre")
	let rif = $("#rif")
	let distribuidora = $("#distribuidora")
	let empresa = $("#empresa")
	let telefono = $("#telefono")


	


	/*No Copiar y pegar */
		$("input").noCopiar()

		/*solo letras mayusculas*/
		$("input").mayuscula()
 

	/*Longitud Permitida*/
	nombre.longitudMax(40)
	telefono.longitudMax(11)
	distribuidora.longitudMax(40)
	rif.longitudMax(12)
	



	/*valida teclado*/
	nombre.validCampo(soloLetras())
	distribuidora.validCampo(soloLetras2())
	rif.validCampo(soloNumeros())
	telefono.validCampo(soloNumeros())




/*Verifica los campos*/
setInterval( () =>{

		localStorage.control = 1
		/*Valida Minima cantidad de carecteres */
		
		rif.longitud("#error1",7)
		distribuidora.longitud("#error2",3)
		nombre.longitud("#error4",3)
		telefono.longitud("#error5",11)
		
		

		//---------------------------------------

		

		/* Activar el boton de guardar */
		if(localStorage.control == 1 ){


			$("#botonGuardar").disabled(false)

			 

			if(localStorage.interruptor == 0){
				mensajeNotify( {mensaje: "Presione el boton Guarda (boton de color Azul)..."} )
				 localStorage.interruptor = 1
				 nombre.quitarEspacio()


			}

				

		}
		else {

			$("#botonGuardar").disabled(true);
			 localStorage.interruptor = 0
		}

		//---------------------------------------




} , 500  )


}


// validar recuperacion de clave 
var recuperar_validaciones = function recuperar_validaciones(paso){

	 localStorage.interruptor = 0

	validaciones_generales()
	// mensajes 


	// campos 
	let nick = $("#nick")
	let cedula = $("#cedula")
	let distribuidora = $("#pregunta")
	let respuesta = $("#respuesta")
	let clave = $("#inputClave")
	let clave2 = $("#inputClave2")
	var boton = $(".paso"+paso)





	/*Longitud Permitida*/

	cedula.longitudMax(8)
	clave.longitudMax(12)
	clave2.longitudMax(12)


	respuesta.mayuscula().longitudMax(20)



	cedula.validCampo(soloNumeros())
	clave.validCampo(soloLetras_Numeros())
	respuesta.validCampo(soloLetras())
	clave2.validCampo(soloLetras_Numeros())




/*Verifica los campos*/
setInterval( () =>{

		localStorage.control = 1
		/*Valida Minima cantidad de carecteres */
		
		if(paso == 1)
			cedula.longitud("#error1",7)

		else if(paso == 2)
			respuesta.longitud("#error2",3)
		

		else {

			clave.longitud("#error3",8)
			clave2.comparar(clave,"#error4")

		}
		//---------------------------------------

		

		/* Activar el boton de guardar */
		if(localStorage.control == 1 ){

			
				boton.disabled(false)

	

			 

			if(localStorage.interruptor == 0){
				 localStorage.interruptor = 1
				


			}

				

		}
		else {

			boton.disabled(true);
			 localStorage.interruptor = 0
		}

		//---------------------------------------




} , 500  )


}