$(document).ready(function() {



//boton salir para volver al consultar
$("#botonSalir").ruta("usuario")

	
Menu(); //invocamos los scripts del menu 
usuarios_validaciones(); //invocamos los scripts del menu 

insertar_Hora_NombreDeUsuario("#mi_reloj" , "#nombre_usuario")

let nombre = $("#inputNombre")
let cedula = $("#inputCedula")
let nick = $("#inputNick")
let clave = $("#inputClave")
let clave2 = $("#inputClave2")
let pregunta = $("#inputPregunta")
let respuesta1 = $("#inputRespuesta1")
let respuesta2 = $("#inputRespuesta2")
let rol = $("#rol")




/*Mensaje en pantalla*/
modalImagen("Todos los campos del formulario son obligatorios")





$("#botonGuardar").click(() => {

	ajax( localStorage.ajax+'usuarioNuevo' , function(resp){
	
	}, { 

		id        : cedula.val(),
		nombre    : nombre.val(),
		nick      : nick.val(),
		clave     : clave.val(),
		pregunta  : pregunta.val(),
		respuesta : respuesta1.val(),
		rol       : rol.val()
	})

});



});
