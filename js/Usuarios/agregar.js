$(document).ready(function() {

var interruptor = 0
	
Menu(); //invocamos los scripts del menu 

insertar_Hora_NombreDeUsuario("#mi_reloj" , "#nombre_usuario")

let nombre = $("#inputNombre")
let cedula = $("#inputCedula")
let nick = $("#inputNick")
let clave = $("#inputClave")
let clave2 = $("#inputClave2")
let pregunta = $("#inputPregunta")
let respuesta1 = $("#inputRespuesta1")
let respuesta2 = $("#inputRespuesta2")

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

/*Mensaje en pantalla*/
//modalImagen("Todos los campos del formulario son obligatorios")

// cambiar los iconos a modo botones	
$(".glyphicon-eye-open").css('cursor', 'pointer');


/*Verifica los campos*/
setInterval( () =>{

		if(
			(cedula.val().length > 7 ) &&
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

		}
		else {
			$("#botonGuardar").disabled(true);
			interruptor = 0
		}

} , 500  )

$("#botonGuardar").click(() => {



});



});
